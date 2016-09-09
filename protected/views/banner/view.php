
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
                                <blockquote> <h1><?php echo $model->url->name; ?></h1></blockquote>
                                <div class="row">
                                    <div class="col-sm-5">                       
                                        <div class="form-group  col-sm-12">
                                            <div class="col-sm-5">
                                                <label>Page name</label>
                                            </div>
                                            <div class="col-sm-7">
<?php echo $model->url->name; ?>
                                            </div>
                                        </div>    
                                        <div class="form-group  col-sm-12">
                                            <div class="col-sm-5">
                                                <label>Page title</label>
                                            </div>
                                            <div class="col-sm-7">
<?php echo $model->name; ?>
                                            </div>
                                        </div>    
                                        <div class="form-group  col-sm-12">                                                                     
                                            <div class="col-sm-5">
                                                <label>Page Tag Line</label>
                                            </div>
                                            <div class="col-sm-7">
<?php echo $model->tagline; ?>
                                            </div> 

                                        </div>
                                    </div>                                    
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-sm-5"> 
                                                <label>Background Image </label>
                                            </div>
                                            <div class="col-sm-7">
                                                <img height="100px" width="200px" src='<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $model->image; ?>' >

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
</div>