<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\RegistrationCenter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registration-center-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'RegistrationCenterName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RegistrationCenterType')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CountyID')->textInput() ?>

    <?= $form->field($model, 'ConstituencyID')->textInput() ?>

    <?= $form->field($model, 'RegistrationCenterEmail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RegisteredBy')->textInput() ?>

    <?= $form->field($model, 'RegistrationDate')->textInput() ?>

    <?= $form->field($model, 'RegistrationUpdateDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
