<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\RegistrationCenter */

$this->title = 'Update Registration Center: ' . $model->RegistrationCenterID;
$this->params['breadcrumbs'][] = ['label' => 'Registration Centers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->RegistrationCenterID, 'url' => ['view', 'id' => $model->RegistrationCenterID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="registration-center-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
