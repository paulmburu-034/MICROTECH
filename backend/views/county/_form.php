<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\County */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="county-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CountyName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CountyDescription')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'CreatedDate')->textInput() ?>

    <?= $form->field($model, 'CreatedBy')->textInput() ?>

    <?= $form->field($model, 'UpdatedDate')->textInput() ?>

    <?= $form->field($model, 'UpdatedBy')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
