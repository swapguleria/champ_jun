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

    <div class="chef-panel">
        <h2>Meet Our Chef </h2>
        <div class="row">
            <div class="col-sm-6">
                <?php echo $form->textFieldGroup($model, 'tab_3_title_1', array('class' => 'form-control', 'maxlength' => 255)); ?>

                <?php echo $form->textFieldGroup($model, 'tab_3_sub_title_1', array('class' => 'form-control', 'maxlength' => 255)); ?>

                <?php echo $form->textAreaGroup($model, 'tab_3_description', array('class' => 'form-control', 'placeHolder' => 'Description')); ?></div>
            <div class="col-sm-6">
                <?php echo $form->textFieldGroup($model, 'tab_3_title_2', array('class' => 'form-control', 'maxlength' => 255)); ?>

                <?php echo $form->textFieldGroup($model, 'tab_3_sub_title_2', array('class' => 'form-control', 'maxlength' => 255)); ?>

                <?php echo $form->fileFieldGroup($model, 'tab_3_background', array('class' => 'form-control', 'placeHolder' => 'Image File')); ?>

                <?php echo $form->fileFieldGroup($model, 'tab_3_background_right', array('class' => 'form-control', 'placeHolder' => 'Image File')); ?>
            </div>
        </div><!--chef-panel-->

        <?php // echo $form->dropDownListGroup($model, 'state_id', array('widgetOptions' => array('data' => $model->getStatusOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?>


        <?php // echo $form->dropDownListGroup($model, 'type_id', array('widgetOptions' => array('data' => $model->getTypeOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?>


        <?php
//    echo $form->datepickerGroup($model, 'update_time', array('hint' => 'Click inside! to select a date.',
//        'prepend' => '<i class="icon-calendar"></i>'))
//    ;
        ?>



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