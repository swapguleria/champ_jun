	
<div class="container page_content">
<div class="white_bg">
<?php if(Yii::app()->user->isAdmin){  
	if($page) {
?>
<a
			href="<?php echo Yii::app()->createUrl('page/update',array('id'=>$page->id));?>"
			class="btn btn-success pull-right"><i class="fa fa-plus"></i> Update</a>
			<?php } }?>
<?php if($page) {?>
<div class="page-header-text">
<h3><?php echo $page->title;?></h3>
</div>
<p>

<?php echo $page->description;?>
</p>

<?php  } else {?>
<br/>
<div class = "clearfix"></div>
<center><?php echo 'No Content Available'?></center>
<?php }?>
</div>
</div>