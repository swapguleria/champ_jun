
<?php $this->widget('booster.widgets.TbGridView', array(
'id' => 'opening-time-grid',
'type'=>'bordered condensed striped',
'selectionChanged'=>"function(id){window.location='" . Yii::app()->createAbsoluteUrl('openingTime/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
'dataProvider' => $dataProvider,
'columns' => array(
		'id',
		array(
			'name'=>'offer_id',
			'value'=>'GxHtml::valueEx($data->offer)',
			'filter'=>GxHtml::listDataEx(Offers::model()->findAllAttributes(null, true)),
			),
		'name',
		'image',
		array(
				'name' => 'state_id',
				'value'=>'$data->getStatusOptions($data->state_id)',
				'filter'=>OpeningTime::getStatusOptions(),
				),
		array(
				'name' => 'type_id',
				'value'=>'$data->getTypeOptions($data->type_id)',
				'filter'=>OpeningTime::getTypeOptions(),
				),
		/*
		'update_time:datetime',
		*/
array(
'header' => '<a>Actions</a>',
'class' => 'booster.widgets.TbButtonColumn',
'htmlOptions' => array(
'nowrap' => 'nowrap'
)
)
),
)); ?>