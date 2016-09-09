
<?php $this->widget('booster.widgets.TbGridView', array(
'id' => 'offers-grid',
'type'=>'bordered condensed striped',
'selectionChanged'=>"function(id){window.location='" . Yii::app()->createAbsoluteUrl('offers/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
'dataProvider' => $dataProvider,
'columns' => array(
		'id',
		'name',
                'description',
		//'image',
//		array(
//				'name' => 'state_id',
//				'value'=>'$data->getStatusOptions($data->state_id)',
//				'filter'=>Offers::getStatusOptions(),
//				),
//		array(
//				'name' => 'type_id',
//				'value'=>'$data->getTypeOptions($data->type_id)',
//				'filter'=>Offers::getTypeOptions(),
//				),
//		'update_time:datetime',
array(
'header' => '<a>Action</a>',
'class' => 'booster.widgets.TbButtonColumn',
'htmlOptions' => array(
'nowrap' => 'nowrap'
)
)
),
)); ?>