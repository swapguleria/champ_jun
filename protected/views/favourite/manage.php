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


<?php $this->widget('booster.widgets.TbExtendedGridView', array(
	'id' => 'favourite-grid',
	'type'=>'striped bordered condensed',
	'dataProvider' => $model->search(),
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->createAbsoluteUrl('favourite/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
	//'rowCssClassExpression' => '($data->isDelayed())?"especial":"normal"',
	'filter' => $model,
	'htmlOptions' => array(
       'style' => 'cursor: pointer;',
	   'class'=>'table table-hover'
    ),
	'columns' => array(
		'id',
		array(
			'name'=>'job_id',
			'value'=>'GxHtml::valueEx($data->job)',
			'filter'=>GxHtml::listDataEx(Job::model()->findAllAttributes(null, true)),
			),
		array(
				'class' => 'LabelColumn',
				'name' => 'state_id',
				'value'=>'$data->getStatusOptions($data->state_id)',
				'labels' => Favourite::getLabelOptions(),
				'filter'=>Favourite::getStatusOptions(),
			
                
				
				),
		array(
				'name' => 'type_id',
				'value'=>'$data->getTypeOptions($data->type_id)',
				'filter'=>Favourite::getTypeOptions(),
				),
		array(
			 'header'=>'<a>Actions</a>',
			'class'=>'CxButtonColumn',
			'htmlOptions' => array('nowrap'=>'nowrap'),
		),
	),
)); ?>