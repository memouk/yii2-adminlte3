<?php

use dosamigos\chartjs\ChartJs;
use yii\helpers\Html;

$this->title = $tipo=='administrador' ? 'DashBoard' : "Bienvenidos a Cargranel";
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
<?php if($tipo=="administrador") {?>
    <div class="row">
        <div class="col-md-4">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?php echo "$ ". number_format($dashboard['pendientexfacturar']['total_pendiente'], 2, '.', ',')?></h3>
                    <p>Total Pendiente por Facturar</p>
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
        <!-- ./col -->
        
        <!-- ./col -->
    </div>


    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable ui-sortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Remesas Liquidadas vs Facturadas
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                            </li>
                        </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 320px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <?=ChartJs::widget([
                                'type' => 'line',
                                'options' => [
                                    'height' => 120,
                                    'width' => 280
                                ],
                                'data' => [
                                    'labels' => ["January", "February", "March", "April", "May", "June", "July"],
                                    'datasets' => [
                                        [
                                            'label' => "Liquidaciones",
                                            'backgroundColor' => "rgba(179,181,198,0.2)",
                                            'borderColor' => "rgba(179,181,198,1)",
                                            'pointBackgroundColor' => "rgba(179,181,198,1)",
                                            'pointBorderColor' => "#fff",
                                            'pointHoverBackgroundColor' => "#fff",
                                            'pointHoverBorderColor' => "rgba(179,181,198,1)",
                                            'data' => [65, 59, 90, 81, 56, 55, 40]
                                        ],
                                        [
                                            'label' => "Facturación",
                                            'backgroundColor' => "rgba(255,99,132,0.2)",
                                            'borderColor' => "rgba(255,99,132,1)",
                                            'pointBackgroundColor' => "rgba(255,99,132,1)",
                                            'pointBorderColor' => "#fff",
                                            'pointHoverBackgroundColor' => "#fff",
                                            'pointHoverBorderColor' => "rgba(255,99,132,1)",
                                            'data' => [28, 48, 40, 19, 96, 27, 100]
                                        ]
                                    ]
                                ]
                            ]);
                        ?>  
                        </div>
                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">

                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable ui-sortable">


            <!-- solid sales graph -->
            <div class="card bg-gradient-info">
                <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title">
                        <i class="fas fa-th mr-1"></i>
                        Sales Graph
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas class="chart chartjs-render-monitor" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 434px;" width="868" height="500"></canvas>
                </div>
                <!-- /.card-body -->
                <div class="card-footer bg-transparent">
                    <div class="row">
                        <div class="col-4 text-center">
                            <div style="display:inline;width:60px;height:60px;"><canvas width="120" height="120" style="width: 60px; height: 60px;"></canvas><input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;"></div>

                            <div class="text-white">Mail-Orders</div>
                        </div>
                        <!-- ./col -->
                        <div class="col-4 text-center">
                            <div style="display:inline;width:60px;height:60px;"><canvas width="120" height="120" style="width: 60px; height: 60px;"></canvas><input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;"></div>

                            <div class="text-white">Online</div>
                        </div>
                        <!-- ./col -->
                        <div class="col-4 text-center">
                            <div style="display:inline;width:60px;height:60px;"><canvas width="120" height="120" style="width: 60px; height: 60px;"></canvas><input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;"></div>

                            <div class="text-white">In-Store</div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->

            <!-- Calendar -->

            <!-- /.card -->
        </section>
        <!-- right col -->
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