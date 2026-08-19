<?php

declare(strict_types=1);

namespace cinghie\fontawesome\tests;

use cinghie\fontawesome\FontAwesomeAsset;
use cinghie\fontawesome\FontAwesomeMinifyAsset;
use PHPUnit\Framework\TestCase;
use yii\web\AssetBundle;

/**
 * Yii2 and package-level best-practice regression checks.
 */
final class Yii2BestPracticesTest extends TestCase
{
    public function testAssetBundlesUseSourcePath(): void
    {
        foreach ([FontAwesomeAsset::class, FontAwesomeMinifyAsset::class] as $class) {
            $bundle = new $class();

            self::assertInstanceOf(AssetBundle::class, $bundle);
            self::assertNotEmpty($bundle->sourcePath, $class . ' should define sourcePath');
        }
    }

    public function testMinifiedBundleExtendsStandardBundle(): void
    {
        self::assertTrue(is_subclass_of(FontAwesomeMinifyAsset::class, FontAwesomeAsset::class));
    }

    /**
     * `use Yii;` in non-namespaced files is a no-op / warning.
     * Namespaced files may import Yii only when they reference Yii::.
     */
    public function testUseYiiImportIsNotImproperOrUnused(): void
    {
        $root = dirname(__DIR__);
        $useYii = '/^use\s+\\\\?Yii\s*;/m';
        $namespace = '/^namespace\s+/m';
        $yiiCall = '/(?<![\w\\\\])Yii::/';

        $improper = [];
        $unused = [];

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($root, \FilesystemIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            /** @var \SplFileInfo $file */
            if (!$file->isFile() || $file->getExtension() !== 'php') {
                continue;
            }

            $relativePath = str_replace('\\', '/', substr($file->getPathname(), strlen($root) + 1));
            if (strpos($relativePath, 'tests/') === 0 || strpos($relativePath, 'vendor/') === 0) {
                continue;
            }

            $source = file_get_contents($file->getPathname());
            if ($source === false || !preg_match($useYii, $source)) {
                continue;
            }

            $hasNamespace = (bool) preg_match($namespace, $source);
            $usesYii = (bool) preg_match($yiiCall, $source);

            if (!$hasNamespace) {
                $improper[] = $relativePath;
            } elseif (!$usesYii) {
                $unused[] = $relativePath;
            }
        }

        self::assertSame(
            [],
            $improper,
            'Do not use `use Yii;` in non-namespaced PHP: ' . implode(', ', $improper)
        );
        self::assertSame(
            [],
            $unused,
            '`use Yii;` is unused (no Yii:: reference) in: ' . implode(', ', $unused)
        );
    }

    public function testUseStatementsAreAlphabeticallySortedCaseSensitive(): void
    {
        $root = dirname(__DIR__);
        $violations = [];

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($root, \FilesystemIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            /** @var \SplFileInfo $file */
            if (!$file->isFile() || $file->getExtension() !== 'php') {
                continue;
            }

            $relativePath = str_replace('\\', '/', substr($file->getPathname(), strlen($root) + 1));
            if (strpos($relativePath, 'tests/') === 0 || strpos($relativePath, 'vendor/') === 0) {
                continue;
            }

            $statements = $this->extractTopLevelUseStatements($file->getPathname());
            if ($statements === null || $statements === []) {
                continue;
            }

            $expected = $statements;
            usort($expected, [$this, 'compareUseStatements']);

            if ($statements !== $expected) {
                $violations[] = $relativePath
                    . "\n  actual:   " . implode(', ', $statements)
                    . "\n  expected: " . implode(', ', $expected);
            }
        }

        self::assertSame(
            [],
            $violations,
            "Unsorted `use` imports (case-sensitive):\n" . implode("\n", $violations)
        );
    }

    public function testComposerAutoloadPsr4(): void
    {
        $composer = $this->readComposerJson();

        self::assertSame(
            ['cinghie\\fontawesome\\' => ''],
            $composer['autoload']['psr-4'] ?? null
        );
        self::assertSame(
            ['cinghie\\fontawesome\\tests\\' => 'tests/'],
            $composer['autoload-dev']['psr-4'] ?? null
        );
    }

    public function testComposerDeclaresSupportedRuntimePolicy(): void
    {
        $composer = $this->readComposerJson();

        self::assertSame('>=7.4', $composer['require']['php'] ?? null);
        self::assertSame('^2.0.14', $composer['require']['yiisoft/yii2'] ?? null);
        self::assertSame('^5.15.4', $composer['require']['bower-asset/fontawesome'] ?? null);
    }

    /**
     * @return array<string, mixed>
     */
    private function readComposerJson(): array
    {
        $contents = file_get_contents(dirname(__DIR__) . '/composer.json');
        self::assertNotFalse($contents);

        return json_decode($contents, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @return string[]|null
     */
    private function extractTopLevelUseStatements(string $path): ?array
    {
        $lines = file($path, FILE_IGNORE_NEW_LINES);
        if ($lines === false) {
            return [];
        }

        $statements = [];
        $started = false;

        foreach ($lines as $line) {
            if (preg_match('/^(abstract\s+|final\s+)?(class|interface|trait)\s+/', $line)) {
                break;
            }

            if (preg_match('/^use\s+/', $line)) {
                $started = true;
                if (strpos($line, '{') !== false) {
                    return null;
                }
                if (!preg_match('/^use\s+(.+?)\s*;\s*$/', $line, $matches)) {
                    return null;
                }
                $statements[] = $matches[1];
                continue;
            }

            if ($started && trim($line) === '') {
                continue;
            }

            if ($started) {
                break;
            }
        }

        return $statements;
    }

    private function compareUseStatements(string $a, string $b): int
    {
        $rank = static function (string $statement): int {
            if (strpos($statement, 'function ') === 0) {
                return 1;
            }
            if (strpos($statement, 'const ') === 0) {
                return 2;
            }

            return 0;
        };

        $rankA = $rank($a);
        $rankB = $rank($b);
        if ($rankA !== $rankB) {
            return $rankA <=> $rankB;
        }

        return strcmp($a, $b);
    }
}
