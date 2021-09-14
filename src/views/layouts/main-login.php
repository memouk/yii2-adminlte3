<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;

\memouk\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700');
$this->registerCssFile('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
\memouk\adminlte3\assets\PluginAsset::register($this)->add(['fontawesome', 'icheck-bootstrap']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SID - LOGIN</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body class="hold-transition login-page">
<?php  $this->beginBody() ?>
<div class="row login-box justify-content-center">
    <div class="login-logo">
        <?= Html::img('@web/imgs/logo-cargranel.png', ['alt'=>'Cargranel',"height"=>"200", "width"=>"500"]);?>
<!--        <a href="<?=Yii::$app->homeUrl?>"><b>Admin</b>LTE</a>-->
    </div>
</div>
<div class="login-box justify-content-center">
    <!-- /.login-logo -->

    <?= $content ?>
</div>
<!-- /.login-box -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>