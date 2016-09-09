



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
                        <div class="about-panel">
                            <h1>Book Table Section</h1>



                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Title 1 </label>
                                </div>
                                <div class="col-sm-3">
                                    <?php echo $model->tab_1_title; ?>
                                </div>
                                <div class="col-sm-3">
                                    <label>Title 2</label>
                                </div>
                                <div class="col-sm-3">
                                    <?php echo $model->tab_2_title; ?> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Description 1 </label>
                                </div>
                                <div class="col-sm-3">
                                    <?php echo $model->tab_1_desc; ?>
                                </div>
                                <div class="col-sm-3">
                                    <label>Description 2 </label>
                                </div>
                                <div class="col-sm-3">
                                    <?php echo $model->tab_2_desc; ?> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Image 1 </label>
                                </div>
                                <div class="col-sm-3">
                                    <img style="height: 100px;width: 200px"  src='<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $model->tab_1_image; ?>' >
                                </div>
                                <div class="col-sm-3">
                                    <label>Image 2 </label>
                                </div>
                                <div class="col-sm-3">
                                    <img style="height: 100px;width: 200px"  src='<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $model->tab_2_image; ?>' >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Page Description </label>
                                </div>
                                <div class="col-sm-3">
                                    <?php echo $model->description; ?>
                                </div>
                                <div class="col-sm-3">
                                    <label>Subscribe Text</label>
                                </div>
                                <div class="col-sm-3">
                                    <?php echo $model->subscribe; ?> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Book Now Button Text  </label>
                                </div>
                                <div class="col-sm-3">
                                    <?php echo $model->button_1_text; ?>
                                </div>
                                <div class="col-sm-3">
                                    <label>Enquire Now Button Text</label>
                                </div>
                                <div class="col-sm-3">
                                    <?php echo $model->button_2_text; ?> 
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-sm-3">
                                    <label>Background Image Left </label>
                                </div>
                                <div class="col-sm-3">
                                    <img style="height: 100px;width: 200px"  src='<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $model->image_left; ?>' >
                                </div>
                                <div class="col-sm-3">
                                    <label>Background Image Right </label>
                                </div>
                                <div class="col-sm-3">
                                    <img style="height: 100px;width: 200px"  src='<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $model->image_right; ?>' >
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="about-panel">
                            <h1>Choose Time Section</h1>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Sidebar Image </label>
                                </div>
                                <div class="col-sm-3">
                                    <img style="height: 100px;width: 200px"  src='<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $model->img_tr; ?>' >
                                </div>
                                <div class="col-sm-6">
                                    <div class="row"> 
                                        <div class="col-sm-6">
                                            <label>Sidebar Title </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <?php echo $model->title_tr; ?>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-sm-6">
                                            <label>Sidebar Map Text </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <?php echo $model->map_title_tr; ?>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-sm-6">
                                            <label>Sidebar Description </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <?php echo $model->tag_line_tr; ?>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-3">
                                    <label>Page Title </label>
                                </div>
                                <div class="col-sm-3">
                                    <?php echo $model->page_title_tr; ?>
                                </div>
                                <div class="col-sm-3">
                                    <label>Page Sub Title </label>
                                </div>
                                <div class="col-sm-3">
                                    <?php echo $model->page_tag_line_tr; ?>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-sm-3">
                                    <label>Page Description </label>
                                </div>
                                <div class="col-sm-3">
                                    <?php echo $model->desc_tr; ?>
                                </div>
                                <div class="col-sm-3">
                                    <label>Sidebar Map Link </label>
                                </div>
                                <div class="col-sm-3">
                                    <?php echo $model->map_content_tr; ?>
                                </div>

                            </div>


                        </div>
                        <hr>
                        <div class="about-panel">
                            <h1>Add User Info Section</h1>

                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Description  </label>
                                </div>
                                <div class="col-sm-9">
                                    <?php echo $model->cnf_descp; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Checkbox Text  </label>
                                </div>
                                <div class="col-sm-9">
                                    <?php echo $model->cnf_checkbox_text; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Button Text  </label>
                                </div>
                                <div class="col-sm-9">
                                    <?php echo $model->cnf_btn_text; ?>
                                </div>
                            </div>



                        </div>
                        <hr>

                        <div class="about-panel">
                            <h1>Booking Sucessful Section</h1>


                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Title  </label>
                                </div>
                                <div class="col-sm-9">
                                    <?php echo $model->thankyou_title; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Tag Line  </label>
                                </div>
                                <div class="col-sm-9">
                                    <?php echo $model->thankyou_tagline; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Description  </label>
                                </div>
                                <div class="col-sm-9">
                                    <?php echo $model->thankyou_descp; ?>
                                </div>
                            </div>


                        </div>
                        <hr>
                        <div class="about-panel">
                            <h1>Cancel Booking Section</h1>


                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Title  </label>
                                </div>
                                <div class="col-sm-9">
                                    <?php echo $model->cancel_title; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Tag Line  </label>
                                </div>
                                <div class="col-sm-9">
                                    <?php echo $model->cancel_tagline; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>Description  </label>
                                </div>
                                <div class="col-sm-9">
                                    <?php echo $model->cancel_descp; ?>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>