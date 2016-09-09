<!-- <div class="col-md-12 bord-bot">
	<div class="profile-2nd">
		<div class="row ">
			<div class="col-md-6">
				<div class="profile-name ">
					<h2></h2>
				</div>
			</div>

		</div>
	</div>

</div>
 -->


<section class="content-header">
		<h1>Send Message</h1>

</section>

<div class="content">
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"></h3>
</div>
			<div class="box-body ">

	

<?php if(Yii::app()->user->hasFlash('create')) { ?>
<div class="clearfix"></div>
	
	<div class="alert alert-success">
	<?php
	
	echo Yii::app ()->user->getFlash ( 'create' );
	
	?>
	</div>
<?php

} else {
	?>
<!--  form code start here -->
	
	
<div class="col-md-8">	
<?php
	
	$form = $this->beginWidget ( 'booster.widgets.TbActiveForm', array (
			'id' => 'message-form',
			'type' => 'horizontal',
			'enableAjaxValidation' => true,
			'htmlOptions' => array (
					'enctype' => 'multipart/form-data' 
			) 
	) );
	?>
	
	<?php
// 	$model->from_id = $email;
// 	echo $form->textFieldGroup ( $model, 'from_id', array (
// 			'class' => 'form-control, -editable false;' 
// 	) );
	?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'from_id',array('class'=>'col-md-3  control-label'))?>
					<div class="col-md-9 border-class"><?php echo $email ;?> </div>
		</div>

	<?php //echo $form->textFieldGroup($model,'object',array('class'=>'form-control')); ?>

<?php echo $form->textAreaGroup($model,'content',array('class'=>'form-control')); ?>
	










	<div class="form-group">
		<div class="col-md-3"></div>
		<div class="col-md-9">
		<?php

		$this->widget ( 'booster.widgets.TbButton', array (
				'buttonType' => 'submit',
				'label' => Yii::t('app','Save'),
				'context'=>'success'
		) );
		?>
		</div>
	</div>

<?php $this->endWidget(); ?>

	<!-- form code ends here -->
<?php }?>

</div>

<div class="clearfix"></div>

</div>
</div>
</div>
</div>
</div>




