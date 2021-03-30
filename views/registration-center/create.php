<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model backend\models\RegistrationCenter */

$this->title = 'Create Registration Center';
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
								<h4 class="card-title text-center"><b><u><?= $this->title; ?></u></b></h4>
								<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
								
								
							</div>
							<div class="card-content collapse show">
								<div class="card-body card-dashboard">
									<!-- content -->
									<div class="registration-center-create">
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