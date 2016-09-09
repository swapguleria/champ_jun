<!--  form code start here -->
<div class="form">
    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'book-page-form',
        'type' => 'horizontal',
        'enableAjaxValidation' => true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>
    <p class="help-block" align="right">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>
    <div class="perfect-panel">
        <h2>Book Table Section </h2>
        <div class="row">
            <div class="col-sm-6">
                <?php echo $form->textFieldGroup($model, 'tab_2_title', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->fileFieldGroup($model, 'tab_2_image', array('class' => 'form-control', 'placeHolder' => 'Image File')); ?> 
                <?php echo $form->textFieldGroup($model, 'tab_2_desc', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textFieldGroup($model, 'button_2_text', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->fileFieldGroup($model, 'image_right', array('class' => 'form-control', 'placeHolder' => 'Image File')); ?>  
                <?php echo $form->textFieldGroup($model, 'subscribe', array('class' => 'form-control', 'maxlength' => 1)); ?>
            </div>
            <div class="col-sm-6">
                <?php echo $form->textFieldGroup($model, 'tab_1_title', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->fileFieldGroup($model, 'tab_1_image', array('class' => 'form-control', 'placeHolder' => 'Image File')); ?> 
                <?php echo $form->textFieldGroup($model, 'tab_1_desc', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textFieldGroup($model, 'button_1_text', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->fileFieldGroup($model, 'image_left', array('class' => 'form-control', 'placeHolder' => 'Image File')); ?> 
            </div>
        </div>
    </div>
    <div class="perfect-panel">
        <h2>Choose Time Section </h2>
        <div class="row">
            <div class="col-sm-6">
                <?php echo $form->fileFieldGroup($model, 'img_tr', array('class' => 'form-control', 'placeHolder' => 'Image File')); ?> 
                <?php echo $form->textFieldGroup($model, 'title_tr', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textFieldGroup($model, 'tag_line_tr', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textFieldGroup($model, 'map_title_tr', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php
                echo $form->textAreaGroup($model, 'map_content_tr', array('class' => 'form-control', 'rows' => 5));
                ;
                ?>
            </div>
            <div class="col-sm-6">
                <?php echo $form->textFieldGroup($model, 'page_title_tr', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textFieldGroup($model, 'page_tag_line_tr', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textFieldGroup($model, 'desc_tr', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textAreaGroup($model, 'description', array('class' => 'form-control', 'placeHolder' => 'Description')); ?> 
            </div>
        </div>
    </div>
    <div class="perfect-panel">
        <h2>Add User Info Section </h2>
        <?php echo $form->textFieldGroup($model, 'cnf_checkbox_text', array('class' => 'form-control', 'maxlength' => 255)); ?>
        <?php echo $form->textFieldGroup($model, 'cnf_btn_text', array('class' => 'form-control', 'maxlength' => 255)); ?>
        <?php echo $form->textFieldGroup($model, 'cnf_descp', array('class' => 'form-control', 'maxlength' => 255)); ?>

    </div>
    <div class="perfect-panel">
        <h2>Booking Sucessful Section </h2>
        <?php echo $form->textFieldGroup($model, 'thankyou_title', array('class' => 'form-control', 'maxlength' => 255)); ?>
        <?php echo $form->textFieldGroup($model, 'thankyou_tagline', array('class' => 'form-control', 'maxlength' => 255)); ?>
        <?php
        echo '';
        $code = $this->richTextEditor();
        if ($code == 1) echo $form->html5EditorGroup($model, 'thankyou_descp', array('class' => 'form-control', 'rows' => 5, 'height' => '200', 'options' => array('color' => true)));
        else if ($code == 2) echo $form->redactorGroup($model, 'thankyou_descp', array('class' => 'form-control', 'rows' => 5));
        else if ($code == 3) echo $form->ckEditorGroup($model, 'thankyou_descp', array('options' => array('fullpage' => 'js:true', 'width' => '640', 'resize_maxWidth' => '640', 'resize_minWidth' => '320')));
        else echo $form->textAreaGroup($model, 'thankyou_descp', array('class' => 'form-control', 'rows' => 5));
        ?>    
    </div>
    <div class="perfect-panel">
        <h2>Cancel Booking Section </h2>
        <?php echo $form->textFieldGroup($model, 'cancel_title', array('class' => 'form-control', 'maxlength' => 255)); ?>
        <?php echo $form->textFieldGroup($model, 'cancel_tagline', array('class' => 'form-control', 'maxlength' => 255)); ?>

        <?php
        echo '';
        $code = $this->richTextEditor();
        if ($code == 1) echo $form->html5EditorGroup($model, 'cancel_descp', array('class' => 'form-control', 'rows' => 5, 'height' => '200', 'options' => array('color' => true)));
        else if ($code == 2) echo $form->redactorGroup($model, 'cancel_descp', array('class' => 'form-control', 'rows' => 5));
        else if ($code == 3) echo $form->ckEditorGroup($model, 'cancel_descp', array('options' => array('fullpage' => 'js:true', 'width' => '640', 'resize_maxWidth' => '640', 'resize_minWidth' => '320')));
        else echo $form->textAreaGroup($model, 'cancel_descp', array('class' => 'form-control', 'rows' => 5));;
        ?>

    </div>
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
</div>
<!-- form code ends here -->