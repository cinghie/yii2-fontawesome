<?php

/**
* @copyright Copyright &copy; Gogodigital Srls
* @company Gogodigital Srls - Wide ICT Solutions 
* @website http://www.gogodigital.it
* @github https://github.com/cinghie/yii2-fontawesome
* @license GNU GENERAL PUBLIC LICENSE VERSION 3
* @package yii2-fontawesome
* @version 1.4.1
*/

namespace cinghie\fontawesome;

use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Class FontAwesomeAsset
 * @package cinghie\fontawesome
 */
class FontAwesomeMinifyAsset extends AssetBundle
{

    /**
     * @inherit
     */
    public $sourcePath = '@bower/fontawesome';

    /**
     * @inherit
     */
    public $css = [
	    'css/all.min.css'
    ];
    
    /**
     * @inherit
     */
    public $depends = [
	    YiiAsset::class,
	    BootstrapAsset::class,
	    BootstrapPluginAsset::class
    ];

}
