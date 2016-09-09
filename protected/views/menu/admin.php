
<section class="content-header"> 
	<h1>
<?php echo Yii::t('app', 'Manage') . ' : ' . GxHtml::encode($model->label(2)); ?>
	<small>Detail</small>
	</h1>

	<ol class="breadcrumb">
		<li><a href="<?php echo Yii::app()->createUrl('site/index');?>">
				<i class="fa fa-dashboard"></i> Home
		</a></li>
		<li class="active"><?php echo Yii::t('app', 'Manage') . ' : ' . GxHtml::encode($model->label(2)); ?>
	</li>
	</ol>
</section>
<div class="content">

	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				
				<div class="box-body">
					<div class="table-outer">


<?php // $this->widget('booster.widgets.TbGridView', array(
// 	'id' => 'user-grid',
// 	'type'=>'striped bordered condensed',
// 	'dataProvider' => $model->search(),
// 	'filter' => $model,
// 	'columns' => array(
// 		'id',
// 		'full_name',
// 		'email',
// 		'contact_no',
// 		'address:html',
// 		'city',
// 			'image_file',
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
// 		array(
// 			'class'=>'booster.widgets.TbButtonColumn',
// 			'htmlOptions' => array('nowrap'=>'nowrap'),
// 		),
// 	),
//)); ?>
<?php
				
				 $this->widget('booster.widgets.TbGridView', array(
	'id' => 'menu-grid',
	'type'=>'striped bordered condensed',
	'dataProvider' => $model->search(),
	'filter' => $model,
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
			'class'=>'booster.widgets.TbButtonColumn',
			'htmlOptions' => array('nowrap'=>'nowrap'),
		),
	),
)); 
				?>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

// $this->breadcrumbs = array(
// 	$model->label(2) => array('index'),
// 	Yii::t('app', 'Manage'),
// );

// ?>
<!-- <div class="page-header"> 
	<h1><?php // echo Yii::t('app', 'Manage') . ' : ' . GxHtml::encode($model->label(2)); ?></h1>
<!-- </div> -->











