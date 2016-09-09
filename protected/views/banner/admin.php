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
                        <h1><?php echo Yii::t('app', 'Manage') . ' : ' . GxHtml::encode($model->label(2)); ?></h1>
                    </section> 


                    <?php
                    $this->widget('booster.widgets.TbMenu', array(
                        'type' => 'navbar',
                        'items' => $this->actions,
                        'htmlOptions' => array('class' => 'pull-right btn-group'),
                    ));
                    ?>
                </div>    <div class="box-body">

                    <div class="table-outer">

                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'id' => 'banner-grid',
                            'type' => 'striped bordered condensed',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                'id',
                              array(
			'name'=>'url_id',
			'value'=>'GxHtml::valueEx($data->url)',
			'filter'=>GxHtml::listDataEx(Url::model()->findAllAttributes(null, true)),
			),
                                'name',
//                                'tagline',
//                                'image',
                                array(
                                    'header' => '<a>Image </a>',
                                    'type' => 'raw',
                                    'value' => 'CHtml::image($data->get_image(),"",array("height"=>100))'
                                ),
//		array(
//				'name' => 'state_id',
//				'value'=>'$data->getStatusOptions($data->state_id)',
//				'filter'=>Banner::getStatusOptions(),
//				),
                                /*
                                  array(
                                  'name' => 'type_id',
                                  'value'=>'$data->getTypeOptions($data->type_id)',
                                  'filter'=>Banner::getTypeOptions(),
                                  ),
                                  'update_time:datetime',
                                 */
//                                array(
//                                    'class' => 'booster.widgets.TbButtonColumn',
//                                    'htmlOptions' => array('nowrap' => 'nowrap'),
//                                ),
                                 array(
                                    'header' => '<a>Actions</a>',
                                    'class' => 'CButtonColumn',
                                   // 'template' => '{view}{update}',
                                    'template' => '{view}{update}  ',
                                    'buttons' => array(
                                        'update' => array(
                                            'url' => 'Yii::app()->controller->createUrl("banner/update",array( "id"=>$data->id))'
                                        ),
                                        'view' => array(
                                            'url' => 'Yii::app()->controller->createUrl("banner/view", array( "id"=>$data->id))'
                                        ), 
//                                        'delete' => array(
//                                            'url' => 'Yii::app()->controller->createUrl("enquiry/delete",array( "id"=>$data->id))'
//                                        ),
                                    ),
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
