<?php

$this->breadcrumbs = array(
	User::label(2),
	Yii::t('app', 'Index'),
);
?>

<div class="page-header">
<h1><?php echo GxHtml::encode(User::label(2)); ?></h1>
</div>



<?php   $this->widget('booster.widgets.TbButtonGroup', array(
	'buttons'=>$this->actions,
	'htmlOptions'=>array('class'=> 'pull-right'),
	));
?>
<?php $this->renderPartial('_list', array(
		'dataProvider'=>$dataProvider,
));

