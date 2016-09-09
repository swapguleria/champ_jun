<?php

$this->breadcrumbs = array(
                            $model->label(2) => array('index'),
                            Yii::t('app', 'Manage'),  ); ?>
<div class="content"> 
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <section class="content-header pull-left">
                        <h1><?php echo Yii::t('app', 'Manage') . ' : ' . GxHtml::encode($model->label(2)); ?></h1>
                    </section> 
           

                <?php   $this->widget('booster.widgets.TbMenu', array(
                'type' => 'navbar',
                'items'=>$this->actions,
                'htmlOptions'=>array('class'=> 'pull-right btn-group'),
                ));
                ?>
            </div>
        <div class="box-body">
                <div class="table-outer">
                    <?php $this->widget('booster.widgets.TbGridView', array(
                    'id' => 'enquiry-grid',
                    'type'=>'striped bordered condensed',
                    'dataProvider' => $model->search(),
                    'filter' => $model,
                    'columns' => array(
                    		'id',
                                'first_name',
                                'last_name',
                                'phone',
                                'email',
                                'booking_date:date',

                                'booking_time:time',
                                'party_size',
		/*
                        'terms',
		array(
				'name' => 'state_id',
				'value'=>'$data->getStatusOptions($data->state_id)',
				'filter'=>Enquiry::getStatusOptions(),
				),
		array(
				'name' => 'type_id',
				'value'=>'$data->getTypeOptions($data->type_id)',
				'filter'=>Enquiry::getTypeOptions(),
				),
		'update_time:datetime',
		*/
//                    array(
//                    'class'=>'booster.widgets.TbButtonColumn',
//                    'htmlOptions' => array('nowrap'=>'nowrap'),
//                    ),
                        
                        
                array(
                                    'header' => '<a>Actions</a>',
                                    'class' => 'CButtonColumn',
                                   // 'template' => '{view}{update}',
                                    'template' => '{view}{delete}  ',
                                    'buttons' => array(
//                                        'update' => array(
//                                            'url' => 'Yii::app()->controller->createUrl("url/update",array( "id"=>$data->id))'
//                                        ),
                                        'view' => array(
                                            'url' => 'Yii::app()->controller->createUrl("enquiry/view", array( "id"=>$data->id))'
                                        ), 
                                        'delete' => array(
                                            'url' => 'Yii::app()->controller->createUrl("enquiry/delete",array( "id"=>$data->id))'
                                        ),
                                    ),
                                )        
                        
                        
                        
                        
                    ),
                    )); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
