<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\RegistrationCenter */

$this->title = $model->RegistrationCenterID;
$this->params['breadcrumbs'][] = ['label' => 'Registration Centers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="registration-center-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->RegistrationCenterID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->RegistrationCenterID], [
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
            'RegistrationCenterID',
            'RegistrationCenterName',
            'RegistrationCenterType',
            'CountyID',
            'ConstituencyID',
            'RegistrationCenterEmail:email',
            'RegisteredBy',
            'RegistrationDate',
            'RegistrationUpdateDate',
        ],
    ]) ?>

</div>
