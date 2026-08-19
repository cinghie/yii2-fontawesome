<?php

declare(strict_types=1);

namespace cinghie\fontawesome\tests;

use cinghie\fontawesome\FontAwesomeAsset;
use cinghie\fontawesome\FontAwesomeMinifyAsset;
use PHPUnit\Framework\TestCase;
use Yii;
use yii\web\Application;
use yii\web\View;

final class FontAwesomeAssetTest extends TestCase
{
    public function testStandardAssetConfiguration(): void
    {
        $asset = new FontAwesomeAsset();

        self::assertSame('@bower/fontawesome', $asset->sourcePath);
        self::assertSame(['css/all.css'], $asset->css);
        self::assertSame([], $asset->depends);
    }

    public function testMinifiedAssetConfiguration(): void
    {
        $asset = new FontAwesomeMinifyAsset();

        self::assertSame('@bower/fontawesome', $asset->sourcePath);
        self::assertSame(['css/all.min.css'], $asset->css);
        self::assertSame([], $asset->depends);
    }

    public function testFontAwesomeDistributionFilesExist(): void
    {
        self::assertFileExists(Yii::getAlias('@bower/fontawesome/css/all.css'));
        self::assertFileExists(Yii::getAlias('@bower/fontawesome/css/all.min.css'));
        self::assertFileExists(Yii::getAlias('@bower/fontawesome/webfonts/fa-brands-400.woff2'));
        self::assertFileExists(Yii::getAlias('@bower/fontawesome/webfonts/fa-regular-400.woff2'));
        self::assertFileExists(Yii::getAlias('@bower/fontawesome/webfonts/fa-solid-900.woff2'));
    }

    public function testAssetBundleRegistersAndPublishesThroughAssetManager(): void
    {
        $runtimePath = sys_get_temp_dir() . '/yii2-fontawesome-' . bin2hex(random_bytes(8));
        $assetPath = $runtimePath . '/assets';
        mkdir($assetPath, 0777, true);

        $application = new Application([
            'id' => 'yii2-fontawesome-tests',
            'basePath' => dirname(__DIR__),
            'runtimePath' => $runtimePath,
            'components' => [
                'assetManager' => [
                    'basePath' => $assetPath,
                    'baseUrl' => '/assets',
                ],
            ],
        ]);

        try {
            $view = new View();
            $bundle = FontAwesomeAsset::register($view);

            self::assertInstanceOf(FontAwesomeAsset::class, $bundle);

            $bundle->publish($application->assetManager);

            self::assertNotNull($bundle->basePath);
            self::assertDirectoryExists($bundle->basePath);
            self::assertFileExists($bundle->basePath . '/css/all.css');
            self::assertFileExists($bundle->basePath . '/webfonts/fa-solid-900.woff2');
        } finally {
            Yii::$app = null;
            $this->removeDirectory($runtimePath);
        }
    }

    private function removeDirectory(string $path): void
    {
        if (!is_dir($path)) {
            return;
        }

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path, \FilesystemIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($iterator as $item) {
            if ($item->isDir()) {
                rmdir($item->getPathname());
            } else {
                unlink($item->getPathname());
            }
        }

        rmdir($path);
    }
}
