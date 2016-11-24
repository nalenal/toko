<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author zainal
 * 
 */
class TokoAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.css',
        'css/bootstrap-responsive.css',
        'css/docs.css',
        'css/style.css',
        'js/google-code-prettify/prettify.css',
    ];
    public $js = [
        'js/application.js',
        'js/bootsshoptgl.js',
        'js/bootstrap.js',
        'js/bootstrap-affix.js',
        'js/bootstrap-alert.js',
        'js/bootstrap-button.js',
        'js/bootstrap-carousel.js',
        'js/bootstrap-collapse.js',
        'js/bootstrap-dropdown.js',
        'js/bootstrap-modal.js',
        'js/bootstrap-popover.js',
        'js/bootstrap-scrollspy.js',
        'js/bootstrap-tab.js',
        'js/bootstrap-tooltip.js',
        'js/bootstrap-transition.js',
        'js/bootstrap-typeahead.js',
        'js/jquery.js',
        'js/jquery.lightbox-0.5.js',
        'js/jquery.ui.custom.js',
        'js/google-code-prettify/prettify.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
     //   'yii\bootstrap\BootstrapAsset',
    ];
}
