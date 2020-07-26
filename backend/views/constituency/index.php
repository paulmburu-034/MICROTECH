<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Constituencies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="constituency-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Constituency', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CounstituencyID',
            'ConstituencyName',
            'ConstituencyDescription',
            'CountyID',
            'CreatedDate',
            //'CreatedBy',
            //'UpdatedDate',
            //'UpdatedBy',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
