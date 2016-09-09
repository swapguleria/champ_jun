<section class="content-header">

    <h1><?php echo Yii::t('app', 'Please Enter your New Password'); ?>.</h1>


</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> <?php echo Yii::t('app', 'Enter your email '); ?></h3>
                    <div class="box-tools pull-right">
                        <button data-widget="collapse" class="btn btn-box-tool">
                            <i class="fa fa-minus"></i>
                        </button>
                        <div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-box-tool dropdown-toggle">
                                <i class="fa fa-wrench"></i>
                            </button>
                            <!-- 							<ul role="menu" class="dropdown-menu"> -->
                            <!-- 								<li><a href="#">Action</a></li> -->
                            <!-- 								<li><a href="#">Another action</a></li> -->
                            <!-- 								<li><a href="#">Something else here</a></li> -->
                            <!-- 								<li class="divider"></li> -->
                            <!-- 								<li><a href="#">Separated link</a></li> -->
                            <!-- 							</ul> -->
                        </div>
                        <!-- 						<button data-widget="remove" class="btn btn-box-tool"> -->
                        <!-- 							<i class="fa fa-times"></i> -->
                        <!-- 						</button> -->
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">	
                    <?php if (Yii::app()->user->hasFlash('success'))
                        { ?>
                        <div class="alert alert-success">
                            <?php echo Yii::app()->user->getFlash('success');
                            ?>
                        </div>

                    <?php } ?>
                    <div class="col-md-8">




                        <?php
                        $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
                            'id' => 'user-form',
                            'type' => 'horizontal',
                            //	'enableAjaxValidation' => false,
                            'enableClientValidation' => true,
                            'clientOptions' => array('validateOnSubmit' => true),
                            'htmlOptions' => array('enctype' => 'multipart/form-data'),
                        ));
                        ?>


                        <div class="form-group">
<?php echo $form->labelEx($model, "email", array('class' => 'col-md-3  control-label')) ?>
                            <div class="col-md-9 border-class"><?php echo $model->email; ?> </div>
                        </div>
                        <div class="form-group">
<?php echo $form->labelEx($model, "username", array('class' => 'col-md-3  control-label')) ?>
                            <div class="col-md-9 border-class"><?php echo $model->username; ?> </div>
                        </div>
                        <div class="clearfix"></div>	

                        <div class="">
                            <?php echo $form->passwordFieldGroup($model, 'password', array('class' => 'form-control col-md-12', 'placeholder' => 'New Password')); ?>
<?php echo $form->error($model, 'password'); ?>
                        </div>

                        <div class="">
                            <?php echo $form->passwordFieldGroup($model, 'password_2', array('class' => 'form-control col-md-12', 'placeholder' => 'Confirm New Password')); ?>
<?php echo $form->error($model, 'password_2'); ?>
                        </div>
                        <div class="clearfix"></div>

                        <div class="form-group">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <button class="btn btn-default" id="yw1" type="submit" name="yt0">Save</button>
                                </div><?php
//				$this->widget('booster.widgets.TbButton', array(
//'buttonType'=>'submit',
//'context' => 'success',
//'htmlOptions'=>array('class'=>''),
//'label'=>' Save ',
//
//				));   
                                ?>
                            </div>
<?php $this->endWidget(); ?>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</section>
