<?php

use dosamigos\chartjs\ChartJs;
use yii\helpers\Html;

$this->title = 'Bienvenidos a Cargranel';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12" align="center">
                <?=Html::img(Yii::getAlias('@web').'/imgs/logo-cargranel.png', ['alt' => 'Cargranel', 'class'=>'img-fluid']);?>
            </div>
        </div>
    </div>
</div>