<!--  form code start here -->
<div class="form">


    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'testimonial-form',
        'type' => 'horizontal',
        'enableAjaxValidation' => true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>
    <p class="help-block" align="right">Fields with <span class="required">*</span> are required.</p>

    <?php // echo $form->errorSummary($model); ?>


    <?php echo $form->textFieldGroup($model, 'title', array('class' => 'form-control', 'maxlength' => 255)); ?>

    <?php
//    echo $form->html5EditorGroup($model, 'description', array('class' => 'form-control', 'rows' => 5, 'height' => '200', 'options' => array('color' => true)));
    ?>
    
    
    <?php // echo $form->redactorGroup($model, 'description', array('class' => 'form-control', 'rows' => 5));
    ?>
    
    
    <?php
    echo $form->ckEditorGroup($model, 'description', array('options' => array('fullpage' => 'js:true', 'width' => '640', 'resize_maxWidth' => '640', 'resize_minWidth' => '320')));
    ?>
    <?php // echo $form->textAreaGroup($model, 'description', array('class' => 'form-control', 'rows' => 5));
    ?>

    <?php echo $form->textFieldGroup($model, 'sub_title', array('class' => 'form-control', 'maxlength' => 255)); ?>


    <?php // echo $form->textAreaGroup($model, 'description', array('class' => 'form-control', 'placeHolder' => 'Description')); ?>


    <?php echo $form->textFieldGroup($model, 'created_by', array('class' => 'form-control', 'maxlength' => 255)); ?>


    <?php echo $form->fileFieldGroup($model, 'image', array('class' => 'form-control', 'placeHolder' => 'Image File')); ?>

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