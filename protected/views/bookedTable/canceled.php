<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

?>
<div class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <section class="content-header pull-left">
                        <h1><?php echo "Canceled booking"; ?></h1>
                    </section> 
           

                <?php   $this->widget('booster.widgets.TbMenu', array(
                'type' => 'navbar',
                'items'=>$this->actions,
                'htmlOptions'=>array('class'=> 'pull-right btn-group'),
                ));
                ?>
            </div>    <div class="box-body">

                <div class="table-outer">

                    <?php $this->widget('booster.widgets.TbGridView', array(
                    'id' => 'booked-table-grid',
                    'type'=>'striped bordered condensed',
                    'dataProvider' => $model->searchCanceled(),
                    'filter' => $model,
                    'columns' => array(
                    		'id',
                                'first_name',
                                'last_name',
                                'date:date',
                                'time:time',
                                'party_size',
		
		/*
		'email',
		'phone_no',
		'special_request:html',
		'email_subscription',
		array(
				'name' => 'state_id',
				'value'=>'$data->getStatusOptions($data->state_id)',
				'filter'=>BookedTable::getStatusOptions(),
				),
		array(
				'name' => 'type_id',
				'value'=>'$data->getTypeOptions($data->type_id)',
				'filter'=>BookedTable::getTypeOptions(),
				),
		'update_time:datetime',
		*/
                    array(
                                    'header' => '<a>Actions</a>',
                                    'class' => 'CButtonColumn',
                                   // 'template' => '{view}{update}',
                                    'template' => '{view} ',
                                    'buttons' => array(
//                                        'update' => array(
//                                            'url' => 'Yii::app()->controller->createUrl("banner/update",array( "id"=>$data->id))'
//                                        ),
                                        'view' => array(
                                            'url' => 'Yii::app()->controller->createUrl("bookedTable/views", array( "id"=>$data->id))'
                                        ), 
//                                        'delete' => array(
//                                            'url' => 'Yii::app()->controller->createUrl("enquiry/delete",array( "id"=>$data->id))'
//                                        ),
                                    ),
                                ),   
                    ),
                    )); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
