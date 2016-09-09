<div class="login-page">
	<div class="container">
		<div class="col-md-12">
		<br />
		<?php if(Yii::app()->user->hasFlash('success')){?>
			<div class="alert alert-success">
			<?php echo Yii::app()->user->getFlash('success'); ?>
			</div>
			<?php }?>
			<a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('install/default/step4?remove=1');?>">Remove Installer</a>

		</div>
	</div>
</div>