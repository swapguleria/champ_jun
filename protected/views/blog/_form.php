<!--  form code start here -->
<div class="form well">


<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id' => 'blog-form',
	'type'=>'horizontal',
	'enableAjaxValidation' => true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
));
?>

<?php echo $form->errorSummary($model); ?>


<?php echo $form->textFieldGroup($model,'title',array('class'=>'form-control','maxlength'=>256)); ?>


<?php echo  '';$code = $this->richTextEditor() ;

					if ($code == 1) echo $form->html5EditorGroup($model,'content', array('class'=>'form-control', 'rows'=>5, 'height'=>'200', 'options'=>array('color'=>true)));

					else if ($code == 2) echo $form->redactorGroup($model,'content', array('class'=>'form-control', 'rows'=>5));

					else if ($code == 3) echo $form->ckEditorGroup($model,'content', array('options'=>array('fullpage'=>'js:true', 'width'=>'640', 'resize_maxWidth'=>'640','resize_minWidth'=>'320')));

					else echo $form->textAreaGroup($model,'content',  array('class'=>'form-control', 'rows'=>5));; ?>

<?php
if($this->action->id == 'update') {
	
		echo isset($model->thumbnail_file) ? CHtml::image(Yii::app()->createUrl('user/download',
		array('file'=>$model->thumbnail_file,'id'=>$model->create_user_id))) :
		CHtml::image(Yii::app()->createUrl('user/download',
		array('file'=>'blog.jpg')))
		;
}
	?>
<?php echo $form->fileFieldGroup($model, 'thumbnail_file'); ?>







	<div class="form-group">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'label'=>'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form code ends here -->