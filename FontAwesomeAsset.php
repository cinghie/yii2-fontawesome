<?php

/**
* @copyright Copyright &copy; Gogodigital Srls
* @company Gogodigital Srls - Wide ICT Solutions 
* @website http://www.gogodigital.it
* @github https://github.com/cinghie/yii2-fontawesome
* @license GNU GENERAL PUBLIC LICENSE VERSION 3
* @package yii2-fontawesome
* @version 1.3.2
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
        'css/font-awesome.css'
    ];
    
    /**
     * @inherit
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];

    /**
     * Initializes the bundle
     */
    public function init()
    {
        parent::init();

        $this->publishOptions['beforeCopy'] = function ($from, $to) {
            return preg_match('%(/|\\\\)(fonts|css)%', $from);
        };
    }
}
