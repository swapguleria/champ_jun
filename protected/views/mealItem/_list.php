
<?php $this->widget('booster.widgets.TbGridView', array(
'id' => 'meal-item-grid',
'type'=>'bordered condensed striped',
'selectionChanged'=>"function(id){window.location='" . Yii::app()->createAbsoluteUrl('mealItem/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
'dataProvider' => $dataProvider,
'columns' => array(
		'id',
		array(
			'name'=>'meal_id',
			'value'=>'GxHtml::valueEx($data->meal)',
			'filter'=>GxHtml::listDataEx(Meal::model()->findAllAttributes(null, true)),
			),
		'title',
		'sub_title',
		'price',
//		'image',
		/*
		'background_image',
		array(
				'name' => 'state_id',
				'value'=>'$data->getStatusOptions($data->state_id)',
				'filter'=>MealItem::getStatusOptions(),
				),
		array(
				'name' => 'type_id',
				'value'=>'$data->getTypeOptions($data->type_id)',
				'filter'=>MealItem::getTypeOptions(),
				),
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