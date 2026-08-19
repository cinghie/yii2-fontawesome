<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/vendor/yiisoft/yii2/Yii.php';

$vendorPath = dirname(__DIR__) . '/vendor';
$bowerCandidates = [
    $vendorPath . '/bower',
    $vendorPath . '/bower-asset',
];

foreach ($bowerCandidates as $bowerPath) {
    if (is_dir($bowerPath . '/fontawesome')) {
        Yii::setAlias('@bower', $bowerPath);
        break;
    }
}

if (Yii::getAlias('@bower', false) === false) {
    throw new RuntimeException('Unable to locate the Composer-installed bower asset directory.');
}
