<?php

/**
* @copyright Copyright &copy; Gogodigital Srls
* @company Gogodigital Srls - Wide ICT Solutions 
* @website http://www.gogodigital.it
* @github https://github.com/cinghie/yii2-fontawesome
* @license GNU GENERAL PUBLIC LICENSE VERSION 3
* @package yii2-fontawesome
* @version 1.4.0
*/

namespace cinghie\fontawesome;

use yii\web\AssetBundle;

/**
 * Class FontAwesomeAsset
 * @package cinghie\fontawesome
 */
class FontAwesomeAsset extends AssetBundle
{

    /**
     * @inherit
     */
	public $sourcePath = '@bower/fontawesome';

    /**
     * @inherit
     */
    public $css = [
        'web-fonts-with-css/css/fontawesome-all.css'
    ];
    
    /**
     * @inherit
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];

}
