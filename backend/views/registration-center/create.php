<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\RegistrationCenter */

$this->title = 'Create Registration Center';
$this->params['breadcrumbs'][] = ['label' => 'Registration Centers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registration-center-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
