<?php
$this->widget ( 'booster.widgets.TbGridView', array (
		'id' => 'message-grid',
		'type' => 'bordered condensed striped',
		'selectionChanged' => "function(id){window.location='" . Yii::app ()->createAbsoluteUrl ( 'message/default/view/id/' ) . "/' + $.fn.yiiGridView.getSelection(id);}",
		'dataProvider' => $dataProvider,
		'columns' => array (
				'id' => 'id',
						
				
				array (
						'header' => 'From',
						'name' => 'from_id',
						'type' => 'raw',
						'value' => '$data->from->email' 
				),
				array (
						'header' => 'Received On',
						'name' => 'create_time',
						'type' => 'raw',
// 						'value' => 'create_time'
				),
// 				'content',
				
			//	'object',
// 				'create_time:date',
		
				array(
						'name' => 'read',
						'value' => '($data->read == 0) ? Yii::t(\'app\', \'Unread\') : Yii::t(\'app\', \'Read\')',
						'filter' => array('0' => Yii::t('app', 'Unread'), '1' => Yii::t('app', 'Read')),
				),
				array(
						'header' => '<a>Actions</a>',
						'class' => 'CButtonColumn',
				
						'template' => '{reply} {view} {delete} ',
						'buttons' => array(
								'reply' => array(
												'url' => 'Yii::app()->controller->createUrl("default/reply",array( "id"=>$data->id))'
								),
								'view' => array(
										'url' => 'Yii::app()->controller->createUrl("default/view", array( "id"=>$data->id))'
								),
				
								
								'delete' => array(
									'url' => 'Yii::app()->controller->createUrl("default/delete",array( "id"=>$data->id))'
								),
							
				
							
						),
				),
		)
		 
) );
?>


<script>			
function act()
{
	var idList    = $('input[type=checkbox]:checked').serialize();
	if(idList)
	{
	if(confirm('Are you sure want to delete?'))
	{
	$.post('outboxdeleteAll',idList,function(response){
	$.fn.yiiGridView.update('message-grid');
	});
	}
	}
	}
							</script>
