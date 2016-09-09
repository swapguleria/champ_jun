
<section class="content-header"> 
	<h1>
Outbox
	<small></small>
	</h1>

	
</section>
<div class="content">

	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				

				<div class="box-body">
					<div class="table-outer">


<?php ?>
<?php
$this->widget ( 'booster.widgets.TbGridView', array (
		'id' => 'message-grid',
		'type' => 'bordered condensed striped',
		'selectionChanged' => "function(id){window.location='" . Yii::app ()->createAbsoluteUrl ( 'message/default/view/id/' ) . "/' + $.fn.yiiGridView.getSelection(id);}",
		'dataProvider' => $dataProvider,
		'emptyText' => 'No Result Found',
		'columns' => array (
						'id',
				array (
						'header'=>'To',
						'name' => 'to_id',
						'type' => 'raw',
						'value' => '$data->to->email'
				),
				
				array (
						'header'=>'Send On ',
						'name' => 'create_time',
						'type' => 'raw',
// 						'value' => 'create_time:date'
				),
				
				//	'object',
// 				'create_time:date',

// 					array (
// 						'header' => 'View',
// 						'class' => 'CButtonColumn',
// 						'template' => '{view}',
// 						'buttons' => array (
// 								'Reply' => array (
				
// 										'url' => 'Yii::app()->controller->createUrl("default/view")'
// 								)
// 						)
							
// 				),
// 				array (
// 						'header' => 'Delete',
// 						'class' => 'CButtonColumn',
// 						'template' => '{delete}',
// 						'buttons' => array (
// 								'delete' => array (

// 										'url' => 'Yii::app()->controller->createUrl("default/Fromdelete",array( "id"=>$data->id))'
// 								)
// 						)
							
// 				),
				array(
						'header' => '<a>Actions</a>',
						'class' => 'CButtonColumn',
				
						'template' => '{view} {delete} ',
						'buttons' => array(
								
								'view' => array(
										'url' => 'Yii::app()->controller->createUrl("default/view", array( "id"=>$data->id))'
								),
				
				
								'delete' => array(
									'url' => 'Yii::app()->controller->createUrl("default/Fromdelete",array( "id"=>$data->id))'
								),
									
				
									
						),
				),
			
		)
			
) );
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
































