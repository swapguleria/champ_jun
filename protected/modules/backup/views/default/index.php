<?php
$this->breadcrumbs=array(
	'Manage'=>array('index'),
);?>
<?php   $this->widget('booster.widgets.TbButtonGroup', array(
		'buttons'=>$this->actions,
	
		'size'=>'mini',
		'htmlOptions'=>array('class'=>'pull-right')
));
?>


<?php if(Yii::app()->user->hasFlash('success')): ?>
<div class="alert alert-success">
<?php echo Yii::app()->user->getFlash('success'); ?>
</div>
<?php endif; ?>

<h1> Manage database backup files</h1>

<?php $this->renderPartial('_list', array(
		'dataProvider'=>$dataProvider,
));
?>
