
<?php $this->widget('booster.widgets.TbGridView', array(
'id' => 'about-grid',
'type'=>'bordered condensed striped',
'selectionChanged'=>"function(id){window.location='" . Yii::app()->createAbsoluteUrl('about/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
'dataProvider' => $dataProvider,
'columns' => array(
		'id',
		'tab_1_title',
		'tab_1_sub_title',
		'tab_1_image',
		'tab_2_title',
		'tab_2_sub_title',
		/*
		'tab_2_description:html',
		'tab_2_image',
		'box_1_image_logo',
		'box_1_title',
		'box_1_description',
		'box_2_image_logo',
		'box_2_title',
		'box_2_description',
		'box_3_image_logo',
		'box_3_title',
		'box_3_description',
		'tab_4_title',
		'tab_4_sub_title',
		array(
				'name' => 'state_id',
				'value'=>'$data->getStatusOptions($data->state_id)',
				'filter'=>About::getStatusOptions(),
				),
		array(
				'name' => 'type_id',
				'value'=>'$data->getTypeOptions($data->type_id)',
				'filter'=>About::getTypeOptions(),
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