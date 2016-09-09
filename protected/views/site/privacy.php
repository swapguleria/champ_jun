<div class="container page_content">
<div class="row-fluid manage-table background">
<div class="white_bg">
	

<?php if(Yii::app()->user->isAdmin()){
	if($page) {?>
<a
			href="<?php echo Yii::app()->createUrl('page/update',array('id'=>$page->id));?>"
			class="btn btn-success pull-right"><i class="fa fa-plus"></i> Update</a>
			<?php } }?>
<?php if($page) {?>
	<h3 class="page-header">
		<i class="fa fa-clipboard"></i> <?php echo $page->title;?>
	</h3><br>
		<p><?php echo $page->description;?></p>

	<hr>
	<?php  } else {?>
<center><?php echo 'No Content Available'?></center>
<?php }?>
</div>
</div>
