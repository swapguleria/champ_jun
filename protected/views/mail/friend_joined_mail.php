<?php include 'header.php';?>

<div class="white_bg">
	<p>
		Dear <span class="user-name"><?php echo $user->full_name; ?> </span>
	</p>
	<p>
		congatulations! Your friend
		<?php echo $model->full_name; ?>
		has joined Organic Juniper Tree .So,you got <?php echo Yii::app()->params['invite_credit'] ?>
		free cards.
	</p>

</div>
</div>

		<?php include 'footer.php';?>

