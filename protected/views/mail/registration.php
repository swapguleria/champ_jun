<style>
 body{
  background:#fff;
  font-family:nanumGothic;
 }

.mail-box{
 width:350px;
 margin:auto;
}

.mail-header{
  background:#F68B20;
  color:#fff;
  padding:10px;
  font-weight:bold;
}

.user-name{
 font-weight:bold;
 text-transform:capitalize;
  }

.mail-content{
  font-size:14px;
  padding:10px;
}
.mail-footer{
  background:#F68B20;
  color:#fff;
  padding:10px;
  text-align:center;
  font-weight:bold;
  font-size:12px;
}

.mail-logo{
  width: 40px;
  background:#fff;
  border-radius:2px;
}


.mail-header p{
 text-align:right;
 float:right;
 margin:10px 0;
}

</style>
<?php include 'header.php';?>
   <div class="mail-box">

<div class="mail-content">
<?php $link = $model->createUser->getActivationUrl();?>
<p>
	Dear <b><?php echo $model->createUser->first_name;?> </b>
</p>

<p>
	Thank you for registering with Organic Juniper Tree!
	Please.</br>
<a class="btn" href="<?php echo $link;?>">Click here</a> to verify your email address and activate your account.
</p>

<p>
	You may also copy the below link and Paste it into the web browser.<br /><br />
	<?php echo $link;?>
</p>

</div>
</div>
<?php include 'footer.php';?>
