<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\County;

$county = County::find()->orderBy('CountyID','Asc')->all();

/* @var $this yii\web\View */
/* @var $model backend\models\Constituency */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="constituency-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ConstituencyName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ConstituencyDescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CountyID')->dropDownList(ArrayHelper::map($county,'CountyID','CountyName'),['prompt'=>'Select County','data-validation'=>'required'])->label('<b>County Name</b>'); ?>

    <!-- <?= $form->field($model, 'CreatedDate')->textInput() ?>

    <?= $form->field($model, 'CreatedBy')->textInput() ?>

    <?= $form->field($model, 'UpdatedDate')->textInput() ?>

    <?= $form->field($model, 'UpdatedBy')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
