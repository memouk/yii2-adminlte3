
<?php
$assetDir = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>


<div class="wrapper">
   
    <?= $this->render('content', ['content' => $content, 'assetDir' => $assetDir]) ?>
    <!-- /.content-wrapper -->

</div>
