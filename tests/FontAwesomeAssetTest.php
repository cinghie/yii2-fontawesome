<?php

declare(strict_types=1);

namespace cinghie\fontawesome\tests;

use cinghie\fontawesome\FontAwesomeAsset;
use cinghie\fontawesome\FontAwesomeMinifyAsset;
use PHPUnit\Framework\TestCase;
use Yii;

final class FontAwesomeAssetTest extends TestCase
{
    public function testStandardAssetConfiguration(): void
    {
        $asset = new FontAwesomeAsset();

        self::assertSame('@bower/fontawesome', $asset->sourcePath);
        self::assertSame(['css/all.css'], $asset->css);
    }

    public function testMinifiedAssetConfiguration(): void
    {
        $asset = new FontAwesomeMinifyAsset();

        self::assertSame('@bower/fontawesome', $asset->sourcePath);
        self::assertSame(['css/all.min.css'], $asset->css);
    }

    public function testFontAwesomeCssFilesExist(): void
    {
        self::assertFileExists(Yii::getAlias('@bower/fontawesome/css/all.css'));
        self::assertFileExists(Yii::getAlias('@bower/fontawesome/css/all.min.css'));
    }
}
