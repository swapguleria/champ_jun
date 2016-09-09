<?php include 'header.php';?>
<div class="mail-box">

	<div class="mail-content">
	<?php $link = $model->getActivationUrl();?>
		<p>
			Dear <b><?php echo $model->first_name;?> </b>
		</p>

		<p>
			Thank You! To verify your email on a
			<?php echo Yii::app()->params['adminEmail'];?>
			. In order to verify it, please click on the link below: <br /> <a
				class="btn btn-primary" href="<?php echo $link;?>">Activate</a>
		</p>

		<p>
			If above link isn't working, please copy and paste it directly in you
			browser's URL field to get started.<br />
			<?php echo $link;?>
		</p>
	</div>
</div>
			<?php include 'footer.php';?>
