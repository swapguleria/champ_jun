
<?php $this->widget('booster.widgets.TbGridView', array(
'id' => 'homepage-grid',
'type'=>'bordered condensed striped',
'selectionChanged'=>"function(id){window.location='" . Yii::app()->createAbsoluteUrl('homepage/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
'dataProvider' => $dataProvider,
'columns' => array(
		'id',
		'tab_1_title',
		'tab_1_sub_title',
		'tab_1_description:html',
		'tab_1_image',
		'box_1_title',
		/*
		'box_1_description:html',
		'box_1_button_text',
		'box_1_link',
		'box_1_background',
		'box_2_title',
		'box_2_description:html',
		'box_2_button_text',
		'box_2_link',
		'box_2_background',
		'tab_2_title',
		'tab_2_text',
		'tab_2_link',
		'tab_2_button_text',
		'tab_2_background',
		'tab_3_title_1',
		'tab_3_sub_title_1',
		'tab_3_description:html',
		'tab_3_title_2',
		'tab_3_sub_title_2',
		'tab_3_background',
		array(
				'name' => 'state_id',
				'value'=>'$data->getStatusOptions($data->state_id)',
				'filter'=>Homepage::getStatusOptions(),
				),
		array(
				'name' => 'type_id',
				'value'=>'$data->getTypeOptions($data->type_id)',
				'filter'=>Homepage::getTypeOptions(),
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