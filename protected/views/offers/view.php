

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
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Offer Name </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <?php echo $model->name; ?>
                                    </div>
                                    </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Offer Description</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <?php echo $model->description; ?>
                                    </div>
                                </div>
                              
<!--                                <div class="row"> 
                                    <div class="col-sm-5">
                                        <label>Offer Image </label>
                                    </div>
                                    <div class="col-sm-7">
                                        <img height="100px" width="100px" src='<?php //echo Yii::app()->request->baseUrl, '/wdir/uploads/', $model->image; ?>' >
                                    </div> 
                                </div> -->
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
       