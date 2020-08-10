<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registration Centers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registration-center-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Registration Center', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'RegistrationCenterID',
            'RegistrationCenterName',
            'RegistrationCenterType',
            'CountyID',
            'ConstituencyID',
            //'RegistrationCenterEmail:email',
            //'RegisteredBy',
            //'RegistrationDate',
            //'RegistrationUpdateDate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
