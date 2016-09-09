<div class="login-page">
	<div class="container">
		<div class="col-md-12">
		<br />
		<?php if(Yii::app()->user->hasFlash('error')){?>
			<div class="alert alert-danger">
			<?php echo Yii::app()->user->getFlash('error'); ?>
			</div>
			<?php }?>
			<div>
				<a class="btn btn-primary"
					href="<?php echo Yii::app()->createUrl('install/default/step3')?>">Reload</a>
				<a class="btn btn-warning"
					href="<?php echo Yii::app()->createUrl('install/default/step4')?>">Skip</a>
			</div>

		</div>
	</div>
</div>
