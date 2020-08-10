<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Birth Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="birth-details-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Birth Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'BirthCertNo',
            'FullName',
            'DateofBirth',
            'MothersName',
            'FathersName',
            //'Gender',
            //'CountyID',
            //'ConstituencyID',
            //'DocumentofRegistration',
            //'DocumentNumber',
            //'IsDead',
            //'CreatedBy',
            //'CreatedDate',
            //'UpdatedDate',
            //'UpdatedBy',
            //'RegistrationCenterID',
            //'PersonID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
