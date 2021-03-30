<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\County;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\RegistrationCenter */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="registration-center-form">
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
                <?= $form->field($model, 'RegistrationCenterName')->textInput(['data-validation'=>'required','maxlength' => true])->label('<b>Registration Center Name</b>') ?>
            </div>
            <div class="col-md-6">
                 <?= $form->field($model, 'RegistrationCenterType')->dropDownList(['Police Station'=>'Police Station','Dispensary'=>'Dispensary','Hospital'=>'Hospital','Office of Registrar of Births and Deaths'=>'Office of Registrar of Births and Deaths'],['prompt'=>'Select Registration Center Type','data-validation'=>'required'])->label('<b>Registration Center Type</b>') ?>  
            </div> 
        </div>
        <div class="row">
            <div class="col-md-6">
                <?=  $form->field($model, 'CountyID')->dropDownList(
                    ArrayHelper::map(County::find()->all(), 'CountyID', 'CountyName'),
                    [
                        'id'=>'isoperational',
                        'prompt'=>'Select County',
                        'onchange' => 
                          '$.get("'. Yii::$app->homeUrl.'registration-center/figs?id='.'"+$(this).val(),function( data ) 
                                           {
                                            $("' . "#appendersa" . '").html(data);
                                            });',
                    
                    ]
                )->label('Name of County'); ?>
            </div>
            <div class='col-md-6'>   
                 <?= $form->field($model, 'ConstituencyID')->dropDownList(
                    [],
                    [
                        'prompt' => 'Select Constituency',
                        'id' => 'appendersa',
                    ]
                )->label('Name Constituency'); ?>
            </div> 
        </div>
        <div class="row">
            <div class="col-md-6">
                 <?= $form->field($model, 'RegistrationCenterEmail')->textInput(['maxlength' => true])->label('<b>Registration Center Email</b>') ?>
            </div>  
        </div>
        <div class="card-footer">
            <?= Html::a('<i class="ft-x-circle"></i> Cancel', ['index'], ['class' => 'btn btn-default pull-left']) ?>
            <?= Html::submitButton('<i class="la la-check-circle-o"></i> Save', ['class' => 'btn btn-success pull-right']) ?>
            <span class="clearfix"></span>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    </div>
</div>