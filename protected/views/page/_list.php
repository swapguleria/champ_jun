
<?php $this->widget('booster.widgets.TbGridView', array(
	'id' => 'page-grid',
	'dataProvider' => $dataProvider,
	'columns' => array(
		'id',
		'title',
		array(
						'name' => 'description',
						'value'=>'$data->getShortDescription($data->description)',
						'filter'=>'$data->getShortDescription()',
					),
		
		array(
			'class' => 'CxButtonColumn',
		),
	),
)); ?>