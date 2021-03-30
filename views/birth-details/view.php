<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\BirthDetails */

$this->title = 'View Birth Details for : ' . $model->FullName;
// $this->params['breadcrumbs'][] = ['label' => 'Birth Details', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="birth-details-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->PersonID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->PersonID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'BirthCertNo',
            'FullName',
            'DateofBirth',
            'MothersName',
            'FathersName',
            'Gender',
            'CountyID',
            'ConstituencyID',
            'DocumentofRegistration',
            'DocumentNumber',
            'IsDead',
            'CreatedBy',
            'CreatedDate',
            'UpdatedDate',
            'UpdatedBy',
            'RegistrationCenterID',
            'PersonID',
        ],
    ]) ?>

</div>
