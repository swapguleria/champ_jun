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

<p>  You have just requested to change Password on Organic Juniper Tree with email  "<?php echo $model->email; ?>". 
In order to Change Password, please click  on the link below: <br />
 
<a class="btn" href="<?php echo $link;?>">Change Password</a>
</p>
<p>
	If above link isn't working, please copy and paste it directly in you browser's URL field to get started.<br />
	<?php echo $link;?>
</p>

<?php include 'footer.php';?>


