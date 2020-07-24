<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\DeathDetails */

$this->title = 'Create Death Details';
$this->params['breadcrumbs'][] = ['label' => 'Death Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="death-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
