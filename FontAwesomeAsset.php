<?php

namespace cinghie\fontawesome;

use yii\web\AssetBundle;

/**
 * Font Awesome asset bundle.
 */
class FontAwesomeAsset extends AssetBundle
{
    /**
     * @inheritDoc
     */
    public $sourcePath = '@bower/fontawesome';

    /**
     * @inheritDoc
     */
    public $css = [
        'css/all.css',
    ];
}
