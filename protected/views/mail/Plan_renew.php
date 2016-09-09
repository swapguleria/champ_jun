<?php include 'header.php';?>
<?php $link = $model->getRecoverUrl();?>
<p>
	Dear <b><?php
	if($model->role_id == User::ROLE_ADMIN)
	{
		echo $model->first_name;
	}
	else 
	{
// 		echo $model->company_name;
	}?> </b>
	<br />
	<b>Email: <?php echo $model->email;?> </b>
</p>

<p>  You have just notified that your plan is going to be expire Within two days . 
Kindly renew it. <br />
 </p>
<p>
</p>

<?php include 'footer.php';?>


