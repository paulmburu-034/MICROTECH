<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\County */

$this->title = 'Update County: ' . $model->CountyID;
$this->params['breadcrumbs'][] = ['label' => 'Counties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CountyID, 'url' => ['view', 'id' => $model->CountyID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="county-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
