<?php if(Yii::app()->user->isGuest) {?>
<style>
.navbar-static-top {
border:none;
}
	
</style>
<section class="banner-container">
	    <div class="container">
	    	   <div class="carousel-caption">
        <h1>Welcome! to Organic Juniper Tree</h1>
        <!--  
        <a target="_blank" class="btn btn-get" href="<?php //echo Yii::app()->createUrl('user/login');?>">Login</a>-->
        </div>
    </div>
    
  
    
    
    
</section>






<section class="services">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 ">
                <div class="service-inner text-center">
                  	  
                     <i class="fa fa-user icon-md"></i>
     					<div class="info-box">
                       		 <h3>User management</h3>
                             <p>Manage all user's and their tasks.</p>
                   		</div>
                </div>
            </div><!--/.col-md-4-->
            
            
            <div class="col-md-4 col-sm-6">
                   <div class="service-inner text-center">
                    
                        <i class="fa fa-book icon-md"></i>
                    	<div class="info-box">
                   
                        <h3>Post management</h3>
                        <p>All the jobs postes bu user are manage via admin.</p>
                        </div>
           </div>
            </div><!--/.col-md-4-->
            
            
            <div class="col-md-4 col-sm-6">
               <div class="service-inner text-center">
                 
                        <i class="fa fa-leaf icon-md"></i>
                   
                   	<div class="info-box">
                        <h3>Contact Us</h3>
                        <p>You can freely contact us.</p>
                    </div>
                
            </div><!--/.col-md-4-->
        </div>
    </div>
</section>


<?php } else {?>


<section class="content-header">


	<ol class="breadcrumb">
		<li><a href="<?php echo Yii::app()->createUrl('dashboard/index');?>">
				<i class="fa fa-dashboard"></i> Home
		</a></li>
	</ol>
</section>
<br/>
<div class="content">

	<div class="row">
		<div class="col-md-12 ">
			<div class="box box-primary">
				<div class="box-header with-border">
					<div class="pull-right">
				
					</div>
					<br /> <br /> <br />


					<center>
						<h3>
						Welcome to Organic Juniper Tree
						</h3>

					</center>
					<br /> <br /> <br /> <br /> <br />
				</div>

				<div class="box-body"></div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>




<?php }?>









