<?php if(Yii::$app->session->getFlash('msg')):?>
	<?php
		if(Yii::$app->session->getFlash('error_msg')){
			$class = 'danger';
		} else {
			$class = 'success';
		}
		$msg = Yii::$app->session->getFlash('msg');
	?>
	<div class="alert alert-<?=$class?>">
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    	<?=$msg?>
    </div>
<?php endif;?>