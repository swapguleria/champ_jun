
<div class="white_bg">
<?php

$form = $this->beginWidget ( 'booster.widgets.TbActiveForm', array (
		'id' => 'page-form',
		'enableAjaxValidation' => true,
		'htmlOptions' => array (
				'enctype' => 'multipart/form-data' 
		) 
) );
?>
	<?php echo $form->errorSummary($model); ?>


		<div class="form-group">
		<?php echo $form->textFieldGroup($model,'title',array('class'=>' form-control','maxlength'=>256)); ?>
		</div>
	<div class="form-group">
	<?php
	
echo $form->ckEditorGroup ( $model, 'description', array (
			'options' => array (
					'class' => 'form-control',
					'fullpage' => 'js:true',
					'resize_maxWidth' => '640',
					'resize_minWidth' => '320' 
			) 
	) );
	
	?>

</div>

	<br />
				<?php echo CHtml::submitButton('save',array('class'=>'btn btn-success'));  ?>
				<?php $this->endWidget(); ?>

</div>
