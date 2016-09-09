<!--  form code start here -->
<div class="form ">


    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'user-form',
        'type' => 'horizontal',
        'enableAjaxValidation' => true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>
    <?php //echo $form->errorSummary($model); ?>
    <div class="form-group">
        <?php echo $form->textFieldGroup($model, 'first_name', array('class' => 'form-control', 'maxlength' => 512, 'placeHolder' => 'User Name')); ?>
    </div>

    <div class="form-group">
        <?php echo $form->textFieldGroup($model, 'email', array('class' => 'form-control', 'maxlength' => 128, 'placeHolder' => 'Email')); ?>
    </div>
    <div class="form-group">
        <?php echo $form->passwordFieldGroup($model, 'password', array('class' => 'form-control', 'maxlength' => 512, 'placeHolder' => 'Password')); ?>
    </div>
    <div class="form-group">
        <?php echo $form->passwordFieldGroup($model, 'phone_no', array('class' => 'form-control', 'maxlength' => 512, 'placeHolder' => 'Repeat Password')); ?>
    </div>

    <?php // echo $form->fileFieldGroup($model, 'image_file'); ?>
    <?php
    echo $form->datepickerGroup($model, 'date_of_birth', array('placeholder' => 'Click inside! to select a date.',
        'prepend' => '<i class="icon-calendar"></i>',
    ));
    ?>
    <div class="form-group">
        <button class="btn btn-default" id="yw1" type="submit" name="yt0">Save</button>
    </div>
    <?php $this->endWidget(); ?>

</div>
<!-- form code ends here -->