<?php

namespace ektp\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
 class AppAsset extends AssetBundle
 {
     public $basePath = '@webroot';
     public $baseUrl = '@web';
     public $depends = [
         'yii\web\YiiAsset',
         'yii\bootstrap\BootstrapAsset',
     ];

     // public function init()
     // {
     //     parent::init();

     //     $this->js = [
     //     ];
     // }
 }