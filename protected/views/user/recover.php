<div style="min-height: 670px;" class="container">
  <div class="login-box col-md-6 col-md-offset-3"> 
		<div class="login-inner">
			
			<h2 class="login-title text-center">
				<?php echo Yii::t('app', 'Recover Your Account' ); ?>
			</h2>

			<!-- Form Code Starts here -->
			<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
			'id' => 'recover-form',
			'enableClientValidation'=>true,
			'htmlOptions'=>array('class' => 'recover-form'),
			'focus'=>array($model,'email'),
			'clientOptions'=>array(
			'validateOnSubmit'=>true,
			'enableAjaxValidation' => true,	
		)));
		?>


								<?php if(isset($_GET['action'])) echo CHtml::hiddenField('returnUrl', urldecode($_GET['action'])); ?>

								<?php if(Yii::app()->user->hasFlash('recover')) { ?>

			<div class="alert alert-success">
			<?php echo Yii::app()->user->getFlash('recover'); ?>


			</div>

			<?php } ?>
	
			<div class="form-group login-icons">
					<i class="fa fa-envelope"></i>
			<?php
			echo $form->textField($model,'email',array('class' => 'form-control','placeholder'=>'Email'));
		
			?>
			</div>

			<div class="clearfix"></div><br/>
			
			<div class="form-group">
			<?php echo CHtml::submitButton('Recover my account',array('class'=>'btn btn-primary btn-block'));  ?>
			</div>

			<?php $this->endWidget(); ?>

			<div class="clearfix"></div>
		</div>
	</div>
	</div>
