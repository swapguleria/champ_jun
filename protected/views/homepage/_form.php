<!--  form code start here -->
<div class="form">


    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'homepage-form',
        'type' => 'horizontal',
        'enableAjaxValidation' => true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>
    <p class="help-block" align="right">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="about-panel">
        <h1>About Us </h1>
        <div class="row">
            <div class="col-sm-6">
                <?php echo $form->textFieldGroup($model, 'tab_1_title', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textFieldGroup($model, 'tab_1_sub_title', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->fileFieldGroup($model, 'tab_1_image', array('class' => 'form-control', 'placeHolder' => 'Image File')); ?> 
            </div>
            <div class="col-sm-6">
                <?php echo $form->textAreaGroup($model, 'tab_1_description', array('class' => 'form-control', 'placeHolder' => 'Description')); ?>

            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <?php echo $form->textFieldGroup($model, 'box_1_title', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textAreaGroup($model, 'box_1_description', array('class' => 'form-control', 'placeHolder' => 'Description')); ?>
                <?php echo $form->textFieldGroup($model, 'box_1_button_text', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textFieldGroup($model, 'box_1_link', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->fileFieldGroup($model, 'box_1_background', array('class' => 'form-control', 'placeHolder' => 'Image File')); ?>
            </div>
            <div class="col-sm-6">

                <?php echo $form->textFieldGroup($model, 'box_2_title', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textAreaGroup($model, 'box_2_description', array('class' => 'form-control', 'placeHolder' => 'Description')); ?>
                <?php echo $form->textFieldGroup($model, 'box_2_button_text', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textFieldGroup($model, 'box_2_link', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->fileFieldGroup($model, 'box_2_background', array('class' => 'form-control', 'placeHolder' => 'Image File')); ?>
            </div>
        </div> 
    </div><!--about-panel-->

    <div class="perfect-panel">
        <h2>The Perfect </h2>
        <div class="row">
            <div class="col-sm-6">
                <?php echo $form->textFieldGroup($model, 'tab_2_title', array('class' => 'form-control', 'maxlength' => 255)); ?>

                <?php echo $form->textFieldGroup($model, 'tab_2_text', array('class' => 'form-control', 'maxlength' => 255)); ?>

                <?php echo $form->textFieldGroup($model, 'tab_2_link', array('class' => 'form-control', 'maxlength' => 255)); ?>
            </div>
            <div class="col-sm-6">
                <?php echo $form->textFieldGroup($model, 'tab_2_button_text', array('class' => 'form-control', 'maxlength' => 255)); ?>

                <?php echo $form->fileFieldGroup($model, 'tab_2_background', array('class' => 'form-control', 'placeHolder' => 'Image File')); ?>
            </div>
        </div>
    </div><!--perfect-panel-->


        <div class="form-group">
            <?php
            $this->widget('booster.widgets.TbButton', array(
                'buttonType' => 'submit',
                'label' => 'Save',
                'context' => 'success',
            ));
            ?>
        </div>

        <?php $this->endWidget(); ?>

    
    <!-- form code ends here -->