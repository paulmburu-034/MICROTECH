<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\AuthItem;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItemChild */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-child-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent')->dropDownList(ArrayHelper::map(AuthItem::find()->all(),'name','name'),['prompt'=>'Select Parent Item']) ?>

    <?= $form->field($model, 'child')->dropDownList(ArrayHelper::map(AuthItem::find()->all(),'name','name'),['prompt'=>'Select Child Item']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
