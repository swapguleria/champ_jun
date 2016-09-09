


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
                        <!--  form code start here -->
                        <div class="form">


                            <?php
                            $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
                                'id' => 'contact-details-form',
                                'type' => 'horizontal',
                                'enableAjaxValidation' => true,
                                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                            ));
                            ?>
                            <p class="help-block" align="right">Fields with <span class="required">*</span> are required.</p>

                            <?php echo $form->errorSummary($model); ?>

                            <div class="about-panel">
                                <h1>Contact Us </h1>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Facebook </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <?php echo $model->facebook; ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Twitter </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <?php echo $model->twitter; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Google Plus </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <?php echo $model->google_plus; ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Instagram </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <?php echo $model->instagram; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Youtube </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <?php echo $model->youtube; ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Email </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <?php echo $model->email; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Working Days </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <?php echo $model->working_days; ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Working Hours </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <?php echo $model->working_hours; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Address </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <?php echo $model->address; ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>City </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <?php echo $model->city; ?> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Country </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <?php echo $model->country; ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Zip Code </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <?php echo $model->zip_code; ?> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Logo </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <img height="100px" width="180px"  src='<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $model->logo; ?>' >
                                    </div> 
                                    <div class="col-sm-3">
                                        <label>Footer Image </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <img height="100px" width="180px" src='<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $model->footer_image; ?>' >
                                    </div>

                                </div> 

                            </div>
                            <hr>
                            <div class="about-panel">
                                <h1>Contact Us Page</h1>
<!--                                <div class="col-sm-6">
                                
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Title </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <?php // echo $model->page_title; ?>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-sm-3">
                                        <label>Sub Title </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <?php // echo $model->page_sub_title; ?> 
                                    </div>
                                </div>
                                    </div>-->
<!--                                <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Page Image </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <img height="100px" width="300px" src='<?php // echo Yii::app()->request->baseUrl, '/wdir/uploads/', $model->page_image; ?>' >
                                    </div>

                                </div>
                                </div>-->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Map </label>
                                    </div>
                                    <div class="col-sm-8" style="overflow: hidden">
                                        <div class="col-md-12" style="padding-left: 0px; overflow: hidden">
                                            <span ><?php echo $model->map; ?> </span>
                                        </div>
                                        
                                    </div>

                                </div>

                            </div>


                            <?php $this->endWidget(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


