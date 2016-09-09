



<!--<div class="page-header">-->
<!--<h1> echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>-->
<!--</div>-->

<div class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <section class="content-header pull-left">

                        <h1><?php echo ucfirst(GxHtml::encode(GxHtml::valueEx($model))); ?></h1>
                    </section>

                    <?php
                    $this->widget('booster.widgets.TbMenu', array(
                        'type' => 'navbar',
                        'items' => $this->actions,
                        'htmlOptions' => array('class' => 'pull-right btn-group'),
                    ));
                    ?>
                </div>
                <div class="box-body">

                    <div class="table-outer">
                        <div class="row"> 
                        <div class="col-md-4 user_img"> 
                            <?php echo CHtml::image($model->getImage(), 'image', array('height' => 200)); ?>
                        </div> 
                        
                          <div class="col-md-8">    <?php
                            $this->widget('booster.widgets.TbDetailView', array(
                                'data' => $model,
                                'attributes' => array(
                                    'id',
                                    'title',
//'sub_title',
//'description:html',
                                    'days',
                                    'timings',
//                                    'image',
                                    'background_image',
//array(
//				'name' => 'state_id',
//				'type' => 'raw',
//				'value'=>$model->getStatusOptions($model->state_id),
//				),
//array(
//				'name' => 'type_id',
//				'type' => 'raw',
//				'value'=>$model->getTypeOptions($model->type_id),
//				),
//array(
//			'name' => 'createUser',
//			'type' => 'raw',
//			'value' => $model->createUser !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->createUser)), array('user/view', 'id' => GxActiveRecord::extractPkValue($model->createUser, true))) : null,
//			),
//'create_time:datetime',
//'update_time:datetime',
                                ),
                            ));
                            ?>

                            <?php $this->StartPanel(); ?>
                            <?php $this->AddPanel($model->getRelationLabel('mealItems'), $model->getRelatedDataProvider('mealItems'), 'mealItems', 'mealItem'); ?>
                            <?php $this->EndPanel(); ?>

                            <?php
                            //   $this->widget('CommentPortlet', array(
//                        'model' => $model,
//                        ));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>