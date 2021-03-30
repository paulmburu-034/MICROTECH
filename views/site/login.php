<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="col-md-6 col-md-offset-3">
        <h1><b><?= Html::encode($this->title) ?></b></h1>

        <p>Please fill out the following fields to login:</p>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <div class="col-md-12">
                    <div style="color:#999;margin:1em 0" class="col-md-4 col-md-offset-1">
                        <?= Html::a('Forgot Password', ['site/request-password-reset']) ?>.
                        <br>
                        <?= Html::a('Resend verification', ['site/resend-verification-email']) ?>
                    </div>
                    <div class="col-md-4 col-md-offset-1">
                        <div class="form-group">
                            <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>Don't have an Account ?</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4 col-md-offset-1">
                        <div class="form-group">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-1">
                        <div class="form-group"><?= Html::a('Register', ['signup'], ['class' => 'btn btn-danger btn-block', 'name' => 'login-button']) ?>
                        </div>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
