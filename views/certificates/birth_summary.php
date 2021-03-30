<?php
    use yii\helpers\Html;
	use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(['enableClientScript' => false,'options'=>['class'=>'']]); ?>
<div class="births-view">
    <center><a target="_blank" class="btn btn-primary" href="/certificates/print-birth?id=<?=$person->BirthCertNo;?>"><i class="material-icons">print</i> Print</a></center>
    <br>
    <?=$this->render('birth_cert',['person'=>$person]); ?>
</div>
<span class="clearfix"></span>
<?php ActiveForm::end();?>