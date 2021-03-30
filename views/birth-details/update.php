<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BirthDetails */

$this->title = 'Update Birth Details for : ' . $model->FullName;
// $this->params['breadcrumbs'][] = ['label' => 'Birth Details', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->PersonID, 'url' => ['view', 'id' => $model->PersonID]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="birth-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
