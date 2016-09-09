
<section class="content-header">
    <h1>
        <?php echo Yii::t('app', 'Update') . ' ' . GxHtml::encode($model->label()); ?>
    </h1>


</section>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo Yii::t('app', 'Please fill the details here'); ?></h3>
                </div>
                <div class="box-body">
                    <!--  form code start here -->
                    <div class="form col-md-8">


                        <?php
                        $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
                            'id' => 'user-form',
                            'type' => 'horizontal',
                            'enableAjaxValidation' => true,
//'enableClientValidation'=>true,
                            'clientOptions' => array('validateOnSubmit' => true),
                            'htmlOptions' => array('enctype' => 'multipart/form-data'),
                        ));
                        ?>
                        <p class="help-block" align="right">
                            Fields with <span class="required">*</span> are required.
                        </p>

                        <?php //echo $form->errorSummary($model);  ?>
                        <?php
                        if (!Yii::app()->user->isAdmin)
                            {
                            ?>
                            <div class="form-group">

                                <?php echo $form->labelEx($model, "email", array('class' => 'col-md-3  control-label'))
                                ?>
                                <div class="col-md-9 border-class"><?php echo $model->email; ?> </div>
                            </div>

                        <?php
                            }
                        else
                            {
                            ?>
                            <?php echo $form->textFieldGroup($model, 'email', array('class' => 'form-control', 'placeHolder' => 'Email')); ?>

                        <?php }
                        ?>
                        <div class = "clearfix"></div>
<?php echo $form->textFieldGroup($model, 'first_name', array('class' => 'form-control', 'maxlength' => 512, 'placeHolder' => 'First Name'));
?>


                        <?php // echo $form->textFieldGroup($model,'phone_no',array('class'=>'form-control','placeHolder'=>'Contact Number')); ?>
<?php // echo $form->textAreaGroup($model,'about_me',array('class'=>'form-control','placeHolder'=>'About Us'));     ?>
<?php //echo $form->fileFieldGroup($model,'image_file',array('class'=>'form-control','placeHolder'=>'Image File'));     ?>


                        <div class="form-group">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <?php
//                $this->widget('booster.widgets.TbButton', array(
//			'buttonType'=>'submit',
//			'label'=>'Save',
//			'context'=>'success',
//		));
                                ?> 
                                <div class="form-group">
                                    <button class="btn btn-default" id="yw1" type="submit" name="yt0">Save</button>
                                </div>
                            </div>



                        </div>

                    </div>

<?php $this->endWidget(); ?>

                </div>
                <div class="clearfix"></div>
                <!-- form code ends here -->
            </div>

        </div>
    </div>
</div>






<!-- form code ends here -->


















