<?php

use dosamigos\chartjs\ChartJs;
use yii\helpers\Html;

$this->title = $tipo=='administrador' ? 'DashBoard' : "Bienvenidos a Cargranel (SID";
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>

<div class="container-fluid">
<?php if($tipo=="administrador") {?>
    <div class="row">
        <div class="col-md-4">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?php echo "$ ". number_format($dashboard['pendientexfacturar']['total_pendiente'], 2, '.', ',')?></h3>
                    <p>Total Pendiente por Facturar (Mes)</p>
                    <h3><?php echo $dashboard['pendientexfacturar']['remesas_pendiente']?></h3>
                    <p>Remesas Pendientes por Facturar</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-bag"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?php echo "$ ".number_format($dashboard['dia']['anticipos']['total'], 2, '.', ',');?></sup></h3>
                    <p>Total Anticipos del Dia</p>
                    <h3><?php echo $dashboard['dia']['anticipos']['generados']?></sup></h3>
                    <p>Anticipos Generados del Dia</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?php echo "$ ".number_format($dashboard['dia']['pendientexliquidar']['total_pendiente'], 2, '.', ',');?></sup></h3>
                    <p>Total Pendiente por Liquidar Dia</p>
                    <h3><?php echo $dashboard['dia']['pendientexliquidar']['manifiestos_pendiente']?></sup></h3>
                    <p>Manifiestos Pendientes por Liquidar Dia</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?php echo "$ ".number_format($dashboard['dia']['facturado'], 2, '.', ',');?></sup></h3>
                    <p>Total Facturado del Dia</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-md-4">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?= Yii::$app->db->createCommand("SELECT count(*) from manifiestos WHERE estado!=-1 and date(fecha_creacion)>='2023-01-01' and manifiesto NOT IN (SELECT manifiesto FROM cumplidos)")->queryScalar();?></h3>

                    <p>Manifiestos pendientes x cumplir</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?php echo Yii::$app->db->createCommand("SELECT count(*) from manifiestos where date_format(fecha_creacion, '%Y%m')>=date_format(now(), '%Y%m')")->queryScalar(); ?><sup style="font-size: 20px"></sup></h3>

                    <p>Total Manifiestos Creados este mes</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        
        <!-- ./col -->
        
        <!-- ./col -->
    </div>
    <p>Clientes con Mayor Facturacion (Mes) </p>
    <div class="row">
        <div class="col-md-2">
            <div class="alert alert-primary" role="alert">
                <p style="font-size: 12px;"><?php echo $dashboard['mes']['topclientes'][0]['cliente'].": "."<br><b>$ ".number_format($dashboard['mes']['topclientes'][0]['total'], 2, '.', ',')."</b>";?></p>
            </div>  
        </div>
        <div class="col-md-3">
            <div class="alert alert-secondary" role="alert">
                <p style="font-size: 12px;"><?php echo $dashboard['mes']['topclientes'][1]['cliente'].": "."<br><b>$ ".number_format($dashboard['mes']['topclientes'][1]['total'], 2, '.', ',')."</b>";?></p>
            </div>  
        </div>
        <div class="col-md-2">
            <div class="alert alert-success" role="alert">
                <p style="font-size: 12px;"><?php echo $dashboard['mes']['topclientes'][2]['cliente'].": "."<br><b>$ ".number_format($dashboard['mes']['topclientes'][2]['total'], 2, '.', ',')."</b>";?></p>
            </div>  
        </div>
        <div class="col-md-2">
            <div class="alert alert-info" role="alert">
                <p style="font-size: 12px;"><?php echo $dashboard['mes']['topclientes'][3]['cliente'].": "."<br><b>$ ".number_format($dashboard['mes']['topclientes'][3]['total'], 2, '.', ',')."</b>";?></p>
            </div>  
        </div>
        <div class="col-md-2">
            <div class="alert alert-dark" role="alert">
                <p style="font-size: 12px;"><?php echo $dashboard['mes']['topclientes'][4]['cliente'].": "."<br><b>$ ".number_format($dashboard['mes']['topclientes'][4]['total'], 2, '.', ',')."</b>";?></p>
            </div>  
        </div>
    </div>
<?php } else { ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12" align="center">
                <?=Html::img(Yii::getAlias('@web').'/imgs/logo-cargranel.png', ['alt' => 'Cargranel', 'class'=>'img-fluid']);?>
            </div>
        </div>
    </div>
<?php } ?>

</div>