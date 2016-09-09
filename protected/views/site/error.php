<?php
$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
		'Error',
);
?>

<div class="clearfix"></div><br />

<div class="alert alert-error">
	<?php echo CHtml::encode($message); ?>
</div>
<div class="alert alert-warning">
	<?php 

	if ( $code == 403)
	{
		?>

	<p>This error usually happens when you do not have access permission to
		perform given action.</p>
	<ul>
		<li>If you are trying to post a job or training, you must have valid
			verified employer account.
		
		<li>If you are trying to update quiz or post, you must have permission
			as Editor or Manager of that section.
	
	</ul>


		<?php
}
if ( $code == 404)
{
	?>

	<p>This error usually happens when required content is missing.</p>
	<ul>
		<li>If you are trying to access some old post, then its ok, we misght have removed it lately.
		<li>If you are trying to access a recent page, we might have moved it. Please try searching it by title.
	
	</ul>
<?php
}
else
{
	?>
	<p>Its our bad, We shall fix it soon.</p>
<?php 
}
?>
	
</div>
