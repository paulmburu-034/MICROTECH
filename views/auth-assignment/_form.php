<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\AuthItem;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-assignment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item_name')->dropDownList(ArrayHelper::map(AuthItem::find()->all(),'name','name'),['prompt'=>'Select Auth Item'])->label('Auth Item') ?>

    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User::find()->all(),'id','username'),['prompt'=>'Select User Name'])->label('User Name') ?>

    <!-- <?= $form->field($model, 'created_at')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
