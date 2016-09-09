
<?php $this->widget('booster.widgets.TbGridView', array(
	'id' => 'auth-session-grid',
	'type'=>'bordered condensed striped',
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->createAbsoluteUrl('dashboard/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
	'dataProvider' => $dataProvider,
	'columns' => array(
		'id',
		'auth_code',
		'device_token',
		array(
				'name' => 'type_id',
				'value'=>'$data->getTypeOptions($data->type_id)',
				'filter'=>Dashboard::getTypeOptions(),
				),
		'update_time:datetime',
		array(
			'class' => 'CxButtonColumn',
		),
	),
)); ?>