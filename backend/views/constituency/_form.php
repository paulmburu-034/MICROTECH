<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Constituency */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="constituency-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ConstituencyName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ConstituencyDescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CountyID')->textInput() ?>

    <?= $form->field($model, 'CreatedDate')->textInput() ?>

    <?= $form->field($model, 'CreatedBy')->textInput() ?>

    <?= $form->field($model, 'UpdatedDate')->textInput() ?>

    <?= $form->field($model, 'UpdatedBy')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
