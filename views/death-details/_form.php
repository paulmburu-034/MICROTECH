<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\BirthDetails */
/* @var $form yii\widgets\ActiveForm */
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
    <div class="card-content collapse show">
        <div class="card-body">

        <?php $form = ActiveForm::begin(['options'=>['class'=>'','enctype'=>'multipart/form-data']]); ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'PersonID')->textInput(['data-validation'=>'required','maxlength' => true])->label('<b>Birth Cert No.</b>') ?>
            </div>
        </div>
        <div class="card-footer">
            <?= Html::a('<i class="ft-x-circle"></i> Cancel', ['index'], ['class' => 'btn btn-default pull-left']) ?>
            <?= Html::submitButton('<i class="la la-check-circle-o"></i> Search', ['class' => 'btn btn-primary pull-right']) ?>
            <span class="clearfix"></span>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    </div>
</div>