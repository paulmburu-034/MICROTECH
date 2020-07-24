<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Death Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="death-details-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Death Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'DateofDeath',
            'CountyID',
            'ConstituencyID',
            'RegistrationCenterID',
            //'Status',
            //'CauseofDeath',
            //'Occupation',
            //'DeathCertificateNo',
            //'CreatedBy',
            //'CreationDate',
            //'UpdatedBy',
            //'UpdateDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
