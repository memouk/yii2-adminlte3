<?php
use yii\helpers\Html;
?>
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Sistema Integrado de Despachos <b>SID</b><br>Iniciar Sesión</p>

        <?php $form = \yii\bootstrap4\ActiveForm::begin(['id' => 'login-form']) ?>
        <?= $form->field($model,'username', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-user"></span></div></div>',
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-3']
        ])
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Usuario')]) ?>

        <?= $form->field($model, 'password', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>',
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-3']
        ])
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('Contraseña')]) ?>

        <div class="row justify-content-center">
<!--            <div class="col-8">
                <? $form->field($model, 'rememberMe')->checkbox([
                    'template' => '<div class="icheck-primary">{input}{label}</div>',
                    'labelOptions' => [
                        'class' => ''
                    ],
                    'uncheck' => null
                ]) ?>
            </div>-->
            <div class="col-md-4 ">
                <center>
                <?= Html::submitButton('Ingresar', ['class' => 'btn btn-primary btn-block']) ?>
                </center>
            </div>
        </div>

        <?php \yii\bootstrap4\ActiveForm::end(); ?>
<!--        <p class="mb-0">
            <a href="register.html" class="text-center"></a>
        </p>-->
        <div class="row justify-content-center">
            <p class="mt-2">
                <a href="forgot-password.html">Olvidaste tu contraseña</a>
            </p>
        </div>
    </div>
    <!-- /.login-card-body -->
</div>
