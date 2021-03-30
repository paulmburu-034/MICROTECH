<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model backend\models\NumberSeries */

$this->title = 'Update Number Series: ' . $model->Module;
//$this->params['breadcrumbs'][] = ['label' => 'Number Series', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="app-content content">
	<div class="content-header"></div>
	<div class="content-wrapper">
		<?=Yii::$app->controller->renderPartial('//layouts/alert');?>
		<div class="content-body">
			<section class="flexbox-container">
					<div class="content-body">
						<div class="card">
							<div class="card-header card--header">
								<h4 class="card-title"><?= $this->title; ?></h4>
								<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
								<div class="heading-elements">
									<ul class="list-inline list-actions">
										<li><?= Html::encode($this->title) ?></li>
										<li></li>
									</ul>
								</div>
							</div>
							<div class="card-content collapse show">
								<div class="card-body card-dashboard">
									<!-- content -->
                                    <div class="number-series-update">

                                        <?= $this->render('_form', [
                                            'model' => $model,
                                        ]) ?>

                                    </div>
								</div>
							</div>
						</div>
					</div>
			</section>
		</div>
	</div>
</div>
