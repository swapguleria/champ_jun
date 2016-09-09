
<?php include 'header.php';?>



<div class="white_bg">
	<p>
		Dear <span class="user-name"><?php echo $model->name; ?> </span>
	</p>
	<p>
		Hurry up !! Join us today and <br />
		<?php echo CHtml::link('Sign Up ',Yii::app()->createAbsoluteUrl('user/signup'));?>
	</p>
</div>
</div>

		<?php include 'footer.php';?>
