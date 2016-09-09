
<?php $this->widget('booster.widgets.TbGridView', array(
	'id' => 'comment-grid',
	'type'=>'bordered condensed striped',
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->createAbsoluteUrl('comment/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
	'dataProvider' => $dataProvider,
	'columns' => array(
		'id',
		'model_id',
		array(
				'name' => 'model_type',
				'value'=>'$data->getTypeOptions($data->model_type)',
				'filter'=>Comment::getTypeOptions(),
				),
		'comment:html',
		'rate',
		array(
				'name' => 'state_id',
				'value'=>'$data->getStatusOptions($data->state_id)',
				'filter'=>Comment::getStatusOptions(),
				),
		array(
			'class' => 'CxButtonColumn',
		),
	),
)); ?>