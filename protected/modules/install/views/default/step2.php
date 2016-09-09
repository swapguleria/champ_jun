<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */


?>
<div class="login-page">
	<div class="container">
		<div class="col-md-12">

			<h1>Set up Db</h1>

			<p>Please fill the database Configuration.</p>

			<div class="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
			),
			)); ?>

				<p class="note">
					Fields with <span class="required">*</span> are required.
				</p>



				<div class="">
				<?php //echo $form->textFieldRow($model,'host',array('class'=>'form-control','maxlength'=>256)); ?>
				<?php echo $form->labelEx($model,'host'); ?>
				<?php echo $form->textField($model,'host', array('class' => 'form-control')); ?>
				<?php echo $form->error($model,'host'); ?>

				</div>
				
				
				<div class="">
				<?php //echo $form->textFieldRow($model,'host',array('class'=>'form-control','maxlength'=>256)); ?>
				<?php echo $form->labelEx($model,'port'); ?>
				<?php echo $form->textField($model,'port', array('class' => 'form-control')); ?>
				<?php echo $form->error($model,'port'); ?>

				</div>
				
				
				<div class="">
				<?php echo $form->labelEx($model,'db_name'); ?>
				<?php echo $form->textField($model,'db_name', array('class' => 'form-control')); ?>
				<?php echo $form->error($model,'db_name'); ?>

				</div>


				<div class="">
				<?php echo $form->labelEx($model,'username'); ?>
				<?php echo $form->textField($model,'username', array('class' => 'form-control')); ?>
				<?php echo $form->error($model,'username'); ?>
				</div>

				<div class="">
				<?php echo $form->labelEx($model,'password'); ?>
				<?php echo $form->textField($model,'password', array('class' => 'form-control')); ?>
				<?php echo $form->error($model,'password'); ?>

				</div>
				
				<div class="">
				<?php echo $form->labelEx($model,'table_prefix'); ?>
				<?php echo $form->textField($model,'table_prefix', array('class' => 'form-control')); ?>
				<?php echo $form->error($model,'table_prefix'); ?>

				</div>


				<br />
				<div class="col-md-3">
				<?php echo CHtml::submitButton('Submit', array('class' => 'form-control btn btn-primary')); ?>
				</div>

				<?php $this->endWidget(); ?>
			</div>
			<!-- form -->
		</div>
	</div>
</div>
