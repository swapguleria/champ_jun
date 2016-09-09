
<?php $this->widget('booster.widgets.TbGridView', array(
	'id' => 'menu-grid',
	'type'=>'bordered condensed striped',
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->createAbsoluteUrl('menu/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
	'dataProvider' => $dataProvider,
	'columns' => array(
		'id',
		'title',
		array(
			'name'=>'page_id',
			'value'=>'GxHtml::valueEx($data->page)',
			'filter'=>GxHtml::listDataEx(Page::model()->findAllAttributes(null, true)),
			),
		array(
				'name' => 'state_id',
				'value'=>'$data->getStatusOptions($data->state_id)',
				'filter'=>Menu::getStatusOptions(),
				),
		array(
				'name' => 'type_id',
				'value'=>'$data->getTypeOptions($data->type_id)',
				'filter'=>Menu::getTypeOptions(),
				),
		'update_time:datetime',
		array(
			'class' => 'CxButtonColumn',
		),
	),
)); ?>