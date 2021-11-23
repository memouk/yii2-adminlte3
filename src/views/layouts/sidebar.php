<?php

use yii\helpers\Html;
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= \yii\helpers\Url::home() ?>" class="brand-link">
        
        
<!--        <span class="brand-text font-weight-light">-->
        <center>
        <?= Html::img('@web/imgs/logo-cargranel.png', ['alt' => 'Cargranel', "height" => "60"]); ?>
        </center>
<!--        </span>-->
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!--        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= $assetDir ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo yii::$app->user->identity->username ?></a>
                    </div>
                </div>-->


        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <?php
            $json = [
                'items' => [
                    [
                        'label' => 'Starter Pages',
                        'icon' => 'tachometer-alt',
                        'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
                            ['label' => 'Inactive Page', 'iconStyle' => 'far'],
                        ]
                    ],
                    ['label' => 'Simple Link', 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],
                    ['label' => 'Yii2 PROVIDED', 'header' => true],
                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Gii', 'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                    ['label' => 'MULTI LEVEL EXAMPLE', 'header' => true],
                    ['label' => 'Level1'],
                    [
                        'label' => 'Level1',
                        'items' => [
                            ['label' => 'Level2', 'iconStyle' => 'far'],
                            [
                                'label' => 'Level2',
                                'iconStyle' => 'far',
                                'items' => [
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
                                ]
                            ],
                            ['label' => 'Level2', 'iconStyle' => 'far']
                        ]
                    ],
                    ['label' => 'Level1'],
                    ['label' => 'LABELS', 'header' => true],
                    ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
                    ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
                    ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                ],
            ];

            /////////////////////
//            echo \hail812\adminlte3\widgets\Menu::widget(
//                  $json
//            );
//            
            ?>

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php echo arbolmenu(NULL) ?>
            </ul>


        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<?php

function arbolmenu($idpadre) {

    $sql = $idpadre == null ? "parent is null" : "parent=$idpadre ";

    $Query = \app\models\Menu::find()->where($sql)->orderBy(['order' => SORT_ASC])->all();

    foreach ($Query as $record) {
        $sql2 = "parent=$record->id";
        $Query2 = \app\models\Menu::find()->where($sql2)->all();

        $sql = "select child from auth_item_child,auth_assignment where auth_assignment.user_id=" . yii::$app->user->identity->id . " and auth_item_child.parent like auth_assignment.item_name  and child like '" . $record->route . "'";
        $authtip = Yii::$app->db->createCommand($sql)->queryOne();

        if (count($Query2) > 0) {
            ?>


            <li class="nav-item has-treeview">
                <a class="nav-link " href="#">
                    <i class="<?php echo $record->icono != NULL ? $record->icono : "nav-icon fas fa-circle" ?>"></i><p><?php echo $record->name ?> <i class="right fas fa-angle-left"></i> </p></a>  
            </a>
            <ul class="nav nav-treeview">
                <?php arbolmenu($record->id) ?>
            </ul>
            </li>    
            <?php
        } else {

            if ($authtip["child"] ??!= "") {
                ?>

                <li class="nav-item"><a class="nav-link " href="<?php echo Yii::$app->homeUrl ?><?php echo $record->route ?>"><i class="<?php echo $record->icono != NULL ? $record->icono : "nav-icon fas fa-th" ?>" ></i> <p><?php echo $record->name ?></p></a></li>

                <?php
            }
        }
        ?>   


        <?php
    }
}
?>
