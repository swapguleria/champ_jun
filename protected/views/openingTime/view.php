



<!--<div class="page-header">-->
<!--<h1> echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>-->
<!--</div>-->

<div class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <section class="content-header pull-left">

                        <h1><?php  echo ucfirst(GxHtml::encode(GxHtml::valueEx($model))); ?></h1>
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
                        <?php $this->widget('booster.widgets.TbDetailView', array(
                        'data' => $model,
                        'attributes' => array(
                        'id',
array(
			'name' => 'offer',
			'type' => 'raw',
			'value' => $model->offer !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->offer)), array('offers/view', 'id' => GxActiveRecord::extractPkValue($model->offer, true))) : null,
			),
'name',
'description',
'image',
array(
				'name' => 'state_id',
				'type' => 'raw',
				'value'=>$model->getStatusOptions($model->state_id),
				),
array(
				'name' => 'type_id',
				'type' => 'raw',
				'value'=>$model->getTypeOptions($model->type_id),
				),
'create_time:datetime',
'update_time:datetime',
array(
			'name' => 'createUser',
			'type' => 'raw',
			'value' => $model->createUser !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->createUser)), array('user/view', 'id' => GxActiveRecord::extractPkValue($model->createUser, true))) : null,
			),
                        ),
                        )); ?>

                                                                                                
<?php   $this->widget('CommentPortlet', array(
                        'model' => $model,
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>