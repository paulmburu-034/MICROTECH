<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\BirthDetails */
/* @var $form yii\widgets\ActiveForm */
//var_dump(Yii::$app->homeUrl).exit();
?>
<div class="death-details-form">
<div class="card">
    <div class="card-header card--header">
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li></li>
            </ul>
        </div>
    </div>
    <p style="color: red;"><?= Yii::$app->session->getFlash('message'); ?></p>
    <div class="card-content collapse show">
        <div class="card-body">

        <?php $form = ActiveForm::begin(['action'=>'test', 'options'=>['class'=>'','enctype'=>'multipart/form-data']]); ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($person, 'BirthCertNo')->textInput()->label('<b>Birth Cert No.</b>') ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($person, 'FullName')->textInput()->label('<b>Full Name</b>') ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'Occupation')->textInput(['data-validation'=>'required','maxlength' => true])->label('<b>Occupation</b>') ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'DateofDeath')->textInput(['data-validation'=>'required','type'=>'date','max'=>date('Y-m-d')])->label('<b>Date of Death</b>') ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'CauseofDeath')->textInput(['maxlength' => true])->label('<b>Cause of Death</b>') ?>
            </div> 
            <div class="col-md-6">
            </div> 
        </div>
        <div class="row">
             
        </div>
        <div class="card-footer">
            <?= Html::a('<i class="ft-x-circle"></i> Cancel', ['index'], ['class' => 'btn btn-default pull-left']) ?>
            <?= Html::submitButton('<i class="la la-check-circle-o"></i> Submit', ['class' => 'btn btn-primary pull-right']) ?>
            <span class="clearfix"></span>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    </div>
</div>