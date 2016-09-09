<div class="login_outer login_inactive">
<div class="login-overlay"></div>     
<div class="container">

<!--  form code start here -->
<div class="col-md-10 col-md-offset-1 signup_inner">
<div class="content_inner">
<!-- signup_steps -->

<div class="clearfix"></div>
<br>

<div class="alert alert-success">
<center>
<?php /*?>
	<h4 class="orange"><i class="fa fa-thumbs-o-up"></i></h4> 
<?php */?>

    <h4><?php
        if (Yii::app()->user->hasFlash('register'))
            {

            echo Yii::app()->user->getFlash('register');
            }
        ?>
<?php 


Yii::app ()->user->logout (); ?>
 
 
 <a href="<?php echo Yii::app()->createUrl('user/login');?>"> Login</a>.</h4>

</center>
  
</div>

<div class="clearfix"></div>
<br>


</div>
</div>
</div>
<!-- form code ends here -->
</div>
</div> <!--  -->

