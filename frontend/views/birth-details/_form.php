<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BirthDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="birth-details-form">
<div class="card">
    <div class="card-header card--header">
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li></li>
            </ul>
        </div>
    </div>
    <div class="card-content collapse show">
        <div class="card-body">

        <?php $form = ActiveForm::begin(['options'=>['class'=>'','enctype'=>'multipart/form-data']]); ?>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'FullName')->textInput(['data-validation'=>'required','maxlength' => true])->label('<b>Full Name</b>') ?>
            </div>
            <div class="col-md-6">
                 <?= $form->field($model, 'Gender')->dropDownList(['Male'=>'Male','Female'=>'Female'],['prompt'=>'Select Gender','data-validation'=>'required'])->label('<b>Gender</b>') ?>  
            </div> 
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'MothersName')->textInput(['maxlength' => true])->label('<b>Mothers Name</b>') ?>
            </div>
            <div class="col-md-6">
                 <?= $form->field($model, 'FathersName')->textInput(['maxlength' => true])->label('<b>Fathers Name</b>') ?>
            </div>   
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'DateofBirth')->textInput(['data-validation'=>'required','type'=>'date','max'=>date('Y-m-d')])->label('<b>Date of Birth</b>') ?>
            </div>  
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'CountyID')->textInput(['maxlength' => true])->label('<b>County Name</b>') ?>
            </div>
            <div class="col-md-6">
                 <?= $form->field($model, 'ConstituencyID')->textInput(['maxlength' => true])->label('<b>Constituency Name</b>') ?>
            </div>   
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'DocumentofRegistration')->dropDownList(['IDCard'=>'Indentity Card','Notification'=>'Birth Notification'],['prompt'=>'Select Document of Registration','data-validation'=>'required'])->label('<b>Document of Registration</b>') ?>
            </div>
            <div class="col-md-6">
                 <?= $form->field($model, 'DocumentNumber')->textInput(['maxlength' => true])->label('<b>Document Number</b>') ?>
            </div>  
        </div>
        <div class="card-footer">
            <?= Html::a('<i class="ft-x-circle"></i> Cancel', ['index'], ['class' => 'btn btn-default pull-left']) ?>
            <?= Html::submitButton('<i class="la la-check-circle-o"></i> Save', ['class' => 'btn btn-primary pull-right']) ?>
            <span class="clearfix"></span>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    </div>
</div>