



<!--<div class="page-header">-->
<!--<h1> echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>-->
<!--</div>-->

<div class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <section class="content-header pull-left">

                        <h1>Our Chef </h1>
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
                        <!--  form code start here -->
                        <div class="form">

                           <div class="about-panel">
                                <h1>Our Chef  </h1>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Title 1 </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <?php echo $model->tab_3_title_1; ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Title 2</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <?php echo $model->tab_3_sub_title_1; ?>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-sm-3">
                                        <label>Sub Title 1 </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <?php echo $model->tab_3_sub_title_1; ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Sub Title 2</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <?php echo $model->tab_3_sub_title_2; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Description</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <?php echo $model->tab_3_description; ?>
                                    </div>                                    
                                </div>
                                <br>
                                 
                              
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Left Image</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <img height="100px" width="200px"  src='<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $model->tab_3_background; ?>' >
                                    </div>


                                    <div class="col-sm-3">
                                        <label>Right Image</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <img height="100px" width="200px" src='<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $model->tab_3_background_right; ?>' >
                                    </div>

                                </div>


                            </div>
                           

                            <?php // $this->endWidget(); ?>

                        </div>
                    </div>
                    <!--                    <div class="table-outer">
                                            <div class="form">-->
                    <?php
//                        $this->widget('booster.widgets.TbDetailView', array(
//                            'data' => $model,
//                            'attributes' => array(
//                                'id',
//                                'tab_1_title',
//                                'tab_1_sub_title',
//                                'tab_1_description:html',
//                                'tab_1_image',
//                                'box_1_title',
//                                'box_1_description:html',
//                                'box_1_button_text',
////                                'box_1_link',
//                                'box_1_background',
//                                'box_2_title',
//                                'box_2_description:html',
//                                'box_2_button_text',
////                                'box_2_link',
//                                'box_2_background',
//                                'tab_2_title',
//                                'tab_2_text',
////                                'tab_2_link',
//                                'tab_2_button_text',
//                                'tab_2_background',
//                                'tab_3_title_1',
//                                'tab_3_sub_title_1',
//                                'tab_3_description:html',
//                                'tab_3_title_2',
//                                'tab_3_sub_title_2',
//                                'tab_3_background',
//                                'tab_3_background_right',
////                                array(
////                                    'name' => 'state_id',
////                                    'type' => 'raw',
////                                    'value' => $model->getStatusOptions($model->state_id),
////                                ),
////                                array(
////                                    'name' => 'type_id',
////                                    'type' => 'raw',
////                                    'value' => $model->getTypeOptions($model->type_id),
////                                ),
////                                'create_time:datetime',
////                                'update_time:datetime',
////                                'create_user_id',
//                            ),
//                        ));
                    ?>


                    <?php
//                        $this->widget('CommentPortlet', array(
//                            'model' => $model,
//                        ));
                    ?>
                    <!--                    </div>
                                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>
