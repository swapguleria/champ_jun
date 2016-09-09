

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

                    <div class="about-panel">
                                <h1>Contact Us </h1> 
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Title </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <?php echo $model->title; ?>
                                    </div>
                                    </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Sub Title</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <?php echo $model->sub_title; ?>
                                    </div>
                                </div>
                                <div class="row">
                                 <div class="col-sm-3">
                                        <label>Created By </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <?php echo $model->created_by; ?> 
                                    </div>
                                </div>   
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-3">
                                        <label>Description </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <?php echo $model->description; ?>
                                    </div>
                                    
                                   
                                        </div>
                                       <div class="row">
                                   
                                    <div class="col-sm-3">
                                        <label>Footer Image </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <img height="100px" width="180px" src='<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $model->image; ?>' >
                                    </div>

                                </div>
                                        </div>
                                </div> 
                            </div>
                        


                                                
<?php //   $this->widget('CommentPortlet', array(
//                        'model' => $model,
//                        ));
                        ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
                        
