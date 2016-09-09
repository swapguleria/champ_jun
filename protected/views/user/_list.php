
<?php $this->widget('booster.widgets.TbGridView', array(
	'id' => 'user-grid',
	'type'=>'bordered condensed striped',
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->createAbsoluteUrl('user/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
	'dataProvider' => $dataProvider,
	'columns' => array(
		'id',
		'full_name',
		'email',
		'address:html',
		'city',
		/*
		'country',
		'zipcode',
		array(
				'name' => 'currency_type',
				'value'=>'$data->getTypeOptions($data->currency_type)',
				'filter'=>User::getTypeOptions(),
				),
		'timezone',
		'date_of_birth',
		'about_me:html',
		'image_file',
		'lat',
		'long',
		'tos',
		'role_id',
		array(
				'name' => 'state_id',
				'value'=>'$data->getStatusOptions($data->state_id)',
				'filter'=>User::getStatusOptions(),
				),
		'last_visit_time',
		'last_action_time',
		'last_password_change',
		'login_error_count',
		*/
		array(
			'class' => 'CxButtonColumn',
		),
	),
)); ?>