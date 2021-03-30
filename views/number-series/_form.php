<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\NumberSeries */
/* @var $form yii\widgets\ActiveForm */
$range = range(2016, 2026);
?>

<div class="number-series-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Module')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'No_')->textInput() ?>

    <?= $form->field($model, 'Year')->dropDownList($model->getYearsList()) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
