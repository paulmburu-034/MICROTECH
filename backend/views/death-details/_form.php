<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DeathDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="death-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DateofDeath')->textInput() ?>

    <?= $form->field($model, 'CountyID')->textInput() ?>

    <?= $form->field($model, 'ConstituencyID')->textInput() ?>

    <!-- <?= $form->field($model, 'RegistrationCenterID')->textInput() ?> -->

    <?= $form->field($model, 'Status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CauseofDeath')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Occupation')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'DeathCertificateNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CreatedBy')->textInput() ?>

    <?= $form->field($model, 'CreationDate')->textInput() ?>

    <?= $form->field($model, 'UpdatedBy')->textInput() ?>

    <?= $form->field($model, 'UpdateDate')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
