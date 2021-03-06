<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use app\assets\AppAssetClassicTopBarBlank;
use yii\helpers\Url;

AppAssetClassicTopBarBlank::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="<?= Yii::$app->language ?>">
<!-- Etiqueta head -->
<?=$this->render("//components/head")?>
<body class="animsition <?=isset($this->params['classBody'])?$this->params['classBody']:''?>">

  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

  <?php $this->beginBody();?>
  

  <div class="page" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content">
      <?=$content?>
    </div>

    <div class="login-footer">
      <div class="login-footer-copyright">
        <p>© Regalado y Galindo Abogados 2018 </p>
      </div>
      <div class="login-footer-author">
        <img src="<?=Url::base()?>/webAssets/images/2gom.png" alt="">
      </div>
    </div>
    
  </div>  

  <?php $this->endBody();?>

  <script>
  (function(document, window, $) {
    'use strict';
    var Site = window.Site;
    $(document).ready(function() {
      Site.run();
    });
  })(document, window, jQuery);
  </script>
</body>
</html>
<?php $this->endPage() ?>
