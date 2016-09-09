<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

?>
<div class="page-header">
	<h1><?php echo Yii::t('app', 'Manage') . ' : ' . GxHtml::encode($model->label(2)); ?></h1>
</div>

<?php   $this->widget('booster.widgets.TbMenu', array(
    'type' => 'navbar',
	'items'=>$this->actions,
	'htmlOptions'=>array('class'=> 'pull-right'),
	));
?>


<?php $this->widget('booster.widgets.TbGridView', array(
	'id' => 'comment-grid',
	'type'=>'striped bordered condensed',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		'model_id',
//		array(
//				'name' => 'model_type',
//				'value'=>'$data->getTypeOptions($data->model_type)',
//				'filter'=>Comment::getTypeOptions(),
//				),
		'comment:html',
		'rate',
//		array(
//				'name' => 'state_id',
//				'value'=>'$data->getStatusOptions($data->state_id)',
//				'filter'=>Comment::getStatusOptions(),
//				),
		array(
			'class'=>'booster.widgets.TbButtonColumn',
			'htmlOptions' => array('nowrap'=>'nowrap'),
		),
	),
)); ?>