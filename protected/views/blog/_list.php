
<?php $this->widget('booster.widgets.TbGridView', array(
	'id' => 'blog-grid',
	'type'=>'bordered condensed striped',
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->createAbsoluteUrl('blog/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
	'dataProvider' => $dataProvider,
	'columns' => array(
		'id',
		'title',
		'thumbnail_file',
		array(
				'name' => 'state_id',
				'value'=>'$data->getStatusOptions($data->state_id)',
				'filter'=>Blog::getStatusOptions(),
				),
		array(
				'name' => 'type_id',
				'value'=>'$data->getTypeOptions($data->type_id)',
				'filter'=>Blog::getTypeOptions(),
				),
		'update_time:datetime',
		array(
			'class' => 'CxButtonColumn',
		),
	),
)); ?>