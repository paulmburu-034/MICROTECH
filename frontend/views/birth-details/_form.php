<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BirthDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="birth-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'BirthCertNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FullName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DateofBirth')->textInput() ?>

    <?= $form->field($model, 'MothersName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FathersName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CountyID')->textInput() ?>

    <?= $form->field($model, 'ConstituencyID')->textInput() ?>

    <?= $form->field($model, 'DocumentofRegistration')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DocumentNumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IsDead')->textInput() ?>

    <?= $form->field($model, 'CreatedBy')->textInput() ?>

    <?= $form->field($model, 'CreatedDate')->textInput() ?>

    <?= $form->field($model, 'UpdatedDate')->textInput() ?>

    <?= $form->field($model, 'UpdatedBy')->textInput() ?>

    <?= $form->field($model, 'RegistrationCenterID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
