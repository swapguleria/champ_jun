<?php

$this->breadcrumbs = array(
	Blog::label(2),
	Yii::t('app', 'Index'),
);
?>

<div class="page-header">
<h1><?php echo GxHtml::encode(Blog::label(2)); ?></h1>
</div>


<?php   $this->widget('booster.widgets.TbMenu', array(
    'type' => 'navbar',
	'items'=>$this->actions,
	'htmlOptions'=>array('class'=> 'pull-right'),
	));
?>
<?php if ( 1) $this->renderPartial('_list', array(
		'dataProvider'=>$dataProvider,
));

else $this->renderPartial('_list', array(
		'dataProvider'=>$dataProvider,
));

