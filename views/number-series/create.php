<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model backend\models\NumberSeries */

$this->title = 'Create Number Series';
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
										<li></li>
										<li></li>
									</ul>
								</div>
							</div>
							<div class="card-content collapse show">
								<div class="card-body card-dashboard">
									<!-- content -->
                                    <div class="number-series-create">
                                        <p style="color: red;"><?= Yii::$app->session->getFlash('message'); ?></p>
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
