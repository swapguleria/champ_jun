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
                            <div class="about-panel">
                                <blockquote> <h1>Page Description</h1></blockquote>
                                <div class="row">
                                    <div class="col-sm-5">                       
                                        <div class="form-group  col-sm-12">
                                            <div class="col-sm-5">
                                                <label>Page Title</label>
                                            </div>
                                            <div class="col-sm-7">
<?php echo $model->tab_2_title; ?>
                                            </div>
                                        </div>    
                                        <div class="form-group  col-sm-12">                                                                     
                                            <div class="col-sm-5">
                                                <label>Page Tag Line</label>
                                            </div>
                                            <div class="col-sm-7">
<?php echo $model->tab_2_sub_title; ?>
                                            </div> 
                                        </div> 
                                    </div>                                    
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-sm-5"> 
                                                <label>Background Image </label>
                                            </div>
                                            <div class="col-sm-7">
                                                <img height="130px" width="300px" src='<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $model->tab_2_image; ?>' >

                                            </div>
                                        </div>                    
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group col-sm-12">                                                                     
                                            <div class="col-sm-5">
                                                <label>Page Description</label>
                                            </div>
                                            <div class="col-sm-7">
<?php echo $model->tab_2_description; ?>
                                            </div> 

                                        </div>
                                    </div>

                                </div>

                            </div>              
                            <hr> 


                            <div class="about-panel">
                                <blockquote><h1>Page Post Section </h1></blockquote>                    
                                <div class="row">
                                    <div class="col-sm-4">                       
                                        <div class="form-group  col-sm-12">
                                            <div class="col-sm-5">
                                                <label>Title</label>
                                            </div>
                                            <div class="col-sm-7">
<?php echo $model->box_1_title; ?>
                                            </div>
                                        </div>    
                                        <div class="form-group  col-sm-12">                           

                                            <div class="col-sm-5">
                                                <label>Description</label>
                                            </div>
                                            <div class="col-sm-7">
<?php echo $model->box_1_description; ?>
                                            </div> 

                                        </div>
                                        <div class="form-group  col-sm-12">                                                                     
                                            <div class="col-sm-5">
                                                <label>Image</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <img height="100px" width="150px" src='<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $model->box_1_image_logo; ?>' >

                                            </div> 

                                        </div>
                                    </div>                                    

                                    <div class="col-sm-4">                       
                                        <div class="form-group  col-sm-12">
                                            <div class="col-sm-5">
                                                <label>Title</label>
                                            </div>
                                            <div class="col-sm-7">
<?php echo $model->box_2_title; ?>
                                            </div>
                                        </div>    
                                        <div class="form-group  col-sm-12">                           

                                            <div class="col-sm-5">
                                                <label>Description</label>
                                            </div>
                                            <div class="col-sm-7">
<?php echo $model->box_2_description; ?>
                                            </div> 

                                        </div>
                                        <div class="form-group  col-sm-12">                                                                     
                                            <div class="col-sm-5">
                                                <label>Image</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <img height="100px" width="150px" src='<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $model->box_2_image_logo; ?>' >
                                            </div> 
                                        </div>
                                    </div>  
                                    <div class="col-sm-4">                       
                                        <div class="form-group  col-sm-12">
                                            <div class="col-sm-5">
                                                <label>Title</label>
                                            </div>
                                            <div class="col-sm-7">
<?php echo $model->box_3_title; ?>
                                            </div>
                                        </div>    
                                        <div class="form-group  col-sm-12">                           

                                            <div class="col-sm-5">
                                                <label>Description</label>
                                            </div>
                                            <div class="col-sm-7">
<?php echo $model->box_3_description; ?>
                                            </div> 

                                        </div>
                                        <div class="form-group  col-sm-12">                                                                     
                                            <div class="col-sm-5">
                                                <label>Image</label>
                                            </div>
                                            <div class="col-sm-7">
                                                <img height="100px" width="150px" src='<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $model->box_3_image_logo; ?>' >

                                            </div> 

                                        </div>
                                    </div> 
                                </div> 
                            </div>               
                            <hr> 


                            <div class="about-panel">
                                <blockquote><h1>Team Description</h1></blockquote>            
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="form-group  col-sm-12">
                                            <div class="col-sm-5">
                                                <label>Our Team Title</label>
                                            </div>
                                            <div class="col-sm-7"> <?php echo $model->tab_4_title; ?> </div>
                                        </div>
                                        <div class="form-group  col-sm-12">
                                            <div class="col-sm-5">
                                                <label>Our Team Tag Line</label>
                                            </div>
                                            <div class="col-sm-7"> <?php echo $model->tab_4_sub_title; ?> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>