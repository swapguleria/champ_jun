
<?php $this->widget('booster.widgets.TbExtendedGridView', array(
	'id' => 'favourite-grid',
	'type'=>'bordered condensed striped',
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->createAbsoluteUrl('favourite/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
	'dataProvider' => isset($model) ? $model->search(): $dataProvider,
	//'rowCssClassExpression' => '($data->isDelayed())?"especial":"normal"',
	'filter' => isset($model) ? $model : null,
	'htmlOptions' => array(
       'style' => 'cursor: pointer;',
	    'class'=>'table table-hover'
    ),
	'columns' => array(
		'id',
		array(
			'name'=>'job_id',
			'value'=>'GxHtml::valueEx($data->job)',
			'filter'=>GxHtml::listDataEx(Job::model()->findAllAttributes(null, true)),
			),
		array(
				'class' => 'LabelColumn',
				'name' => 'state_id',
				'value'=>'$data->getStatusOptions($data->state_id)',
				'labels' => Favourite::getLabelOptions(),
				'filter'=>Favourite::getStatusOptions(),
			
                
				
				),
		array(
				'name' => 'type_id',
				'value'=>'$data->getTypeOptions($data->type_id)',
				'filter'=>Favourite::getTypeOptions(),
				),
		array(
                  'header'=>'<a>Actions</a>',
			'class' => 'CxButtonColumn',
		),
	),
)); ?>