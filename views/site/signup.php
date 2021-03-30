<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <div class="col-md-6 col-md-offset-4">
        <h1><b><?= Html::encode($this->title) ?></b></h1>

        <p>Please fill out the following fields to signup:</p>
    </div>
    

    <div class="row">
        <div class="col-md-6 col-md-offset-4">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'password_repeat')->passwordInput() ?>
                <div class="col-md-12">
                    <div class="col-md-4 col-md-offset-1">
                        <div class="form-group">
                            <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-1">
                        <div class="form-group">
                            <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>Already have an Account ?</span></p>
                        </div>
                        <div class="form-group"><?= Html::a('Login', ['login'], ['class' => 'btn btn-outline-danger btn-block', 'name' => 'login-button']) ?>
                        </div>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
