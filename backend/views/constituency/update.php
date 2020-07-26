<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Constituency */

$this->title = 'Update Constituency: ' . $model->CounstituencyID;
$this->params['breadcrumbs'][] = ['label' => 'Constituencies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CounstituencyID, 'url' => ['view', 'id' => $model->CounstituencyID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="constituency-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
