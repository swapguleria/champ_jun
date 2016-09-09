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
            <div class="col-sm-6">
                
                <?php echo $form->textFieldGroup($model, 'facebook', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textFieldGroup($model, 'twitter', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textFieldGroup($model, 'google_plus', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textFieldGroup($model, 'instagram', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textFieldGroup($model, 'youtube', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textFieldGroup($model, 'email', array('class' => 'form-control', 'maxlength' => 128)); ?>
                <?php echo $form->textFieldGroup($model, 'phone_no', array('class' => 'form-control', 'maxlength' => 11)); ?>
                <?php echo $form->fileFieldGroup($model, 'logo', array('class' => 'form-control', 'placeHolder' => 'Image File')); ?>
                <?php echo $form->fileFieldGroup($model, 'footer_image', array('class' => 'form-control', 'placeHolder' => 'Image File')); ?>
            </div>
            <div class="col-sm-6">
                <?php echo $form->textFieldGroup($model, 'working_days', array('class' => 'form-control', 'maxlength' => 256)); ?>
                <?php echo $form->textFieldGroup($model, 'working_hours', array('class' => 'form-control', 'maxlength' => 256)); ?>
                <?php echo $form->textFieldGroup($model, 'address', array('class' => 'form-control', 'maxlength' => 256)); ?>
                <?php echo $form->textFieldGroup($model, 'city', array('class' => 'form-control', 'maxlength' => 256)); ?>
                <?php echo $form->textFieldGroup($model, 'country', array('class' => 'form-control', 'maxlength' => 256)); ?>
                <?php echo $form->textFieldGroup($model, 'zip_code', array('class' => 'form-control')); ?>
            </div>


        </div>
        <hr>





    </div>
    <div class="about-panel">
        <h1>Contact Page</h1>
        <div class="row">
            <!--<div class="col-sm-6">-->
                <?php // echo $form->textFieldGroup($model, 'page_title', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php // echo $form->textFieldGroup($model, 'page_sub_title', array('class' => 'form-control', 'maxlength' => 255)); ?>

            <!--</div>-->
            <div class="col-sm-12">
                <?php echo $form->textAreaGroup($model, 'map', array('class' => 'form-control', 'maxlength' => 256)); ?>
                <?php // echo $form->fileFieldGroup($model, 'page_image', array('class' => 'form-control', 'maxlength' => 256,'value'=>'sad')); ?>
            </div>


        </div>
        <hr>





    </div>
    <!--about-panel-->





    <?php // echo $form->textAreaGroup($model, 'map', array('class' => 'form-control', 'placeHolder' => 'Description')); ?>


    <?php // echo $form->dropDownListGroup($model,'type_id', array('widgetOptions'=>array('data'=>$model->getTypeOptions(), 'htmlOptions'=>array('class'=>'input-large'))));   ?>


    <?php // echo $form->dropDownListGroup($model,'state_id', array('widgetOptions'=>array('data'=>$model->getStatusOptions(), 'htmlOptions'=>array('class'=>'input-large'))));   ?>




    <div class="form-group">
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'submit',
            'label' => 'Save',
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div>
<!-- form code ends here -->