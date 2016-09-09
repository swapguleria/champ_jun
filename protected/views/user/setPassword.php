<div class="container" style="min-height: 670px;">
  <div class="login-box col-md-6 col-md-offset-3"> 
	    <div class="login-inner">
  		<h2 class="login-title text-center"> <?php echo Yii::t('app', 'Change Password ' ); ?></h2>

		<!-- Form Code Starts here -->
		<?php 

$form = $this->beginWidget ( 'booster.widgets.TbActiveForm', array (
				'id' => 'change-password-form',
				'type' => 'horizontal',
				'enableAjaxValidation' => true,
				'action' => $this->createUrl ( 'user/setPassword', array (
						'id' => $model->id,
						'key' => $key 
				) ),
				'enableClientValidation' => true,
						/* 'clientOptions'=>array(
								'validateOnSubmit'=>true,
		), */
					//'htmlOptions'=>array('enctype'=>'multipart/form-data'),
		) );
		?>

		<?php if(Yii::app()->user->hasFlash('changePassword')) { ?>
		<div class="alert alert-success">
		<?php echo Yii::app()->user->getFlash('changePassword'); ?>
		</div>
		<?php  }?>

		<!-- form-group -->
		<div class="form-group">
		<?php echo $form->labelEx($model,"password" ,array('class'=>'col-md-3 control-label'))?>
			<div class="col-md-9">
			<?php echo $form->passwordField($model, 'password', array('class'=>'form-control','placeholder'=>'New Password')); ?>
			<?php echo $form->error($model,'password',array('style'=>'color:red;')); ?>
			</div>
		</div>

		<!-- form-group -->
		<div class="form-group">
		<?php echo $form->labelEx($model,"password_2",array('class'=>'col-md-3 control-label'))?>
		
			<div class="col-md-9">
			<?php echo $form->passwordField($model, 'password_2', array('class'=>'form-control','placeholder'=>'Retype Password')); ?>
			<?php echo $form->error($model,'password_2',array('style'=>'color:red;')); ?>
			</div>
		</div>		<div class="clearfix"></div>
<br/>
		
		<div class="form-group">
		<div class="col-md-3"></div>
		<div class="col-md-9">
                <?php $this->widget('booster.widgets.TbButton', array(
					'buttonType'=>'submit',
					
					'label'=>'Change Password',
					'htmlOptions' => array('class' => 'btn btn-primary'),
				)); ?>		
		
				<button data-dismiss="modal" type="reset" id="user_form_cancel" class="btn btn-primary">Cancel</button>
				 <div class="clearfix"></div>
				
				 <div class="clearfix"></div>
				</div>
			
				<?php $this->endWidget(); ?>
		<div class="clearfix"></div>
	</div>
</div>
</div>
</div>

<div class="clearfix"></div>
