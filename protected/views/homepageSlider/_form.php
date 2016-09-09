<!--  form code start here -->
<div class="form">


    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'homepage-slider-form',
        'type' => 'horizontal',
        'enableAjaxValidation' => true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>
    <p class="help-block" align="right">Fields with <span class="required">*</span> are required.</p>

    <?php // echo $form->errorSummary($model); ?>


    <?php echo $form->textFieldGroup($model, 'title', array('class' => 'form-control', 'maxlength' => 255)); ?>


    <?php echo $form->textFieldGroup($model, 'sub_title', array('class' => 'form-control', 'maxlength' => 255)); ?>


    <?php
    echo $form->fileFieldGroup($model, 'image', array('class' => 'form-control', 'placeHolder' => 'Image File'));
    //echo $form->fileFieldGroup($model, 'image'); 
    //echo $form->textFieldGroup($model, 'image', array('class' => 'form-control', 'maxlength' => 255)); 
    ?>


    <?php
    echo $form->textAreaGroup($model, 'description', array('class' => 'form-control', 'placeHolder' => 'Description'));
//    echo '';
//    $code = $this->richTextEditor();
//
//    if ($code == 1) echo $form->html5EditorGroup($model, 'description', array('class' => 'form-control', 'rows' => 5, 'height' => '200', 'options' => array('color' => true)));
//
//    else if ($code == 2) echo $form->redactorGroup($model, 'description', array('class' => 'form-control', 'rows' => 5));
//
//    else if ($code == 3) echo $form->ckEditorGroup($model, 'description', array('options' => array('fullpage' => 'js:true', 'width' => '640', 'resize_maxWidth' => '640', 'resize_minWidth' => '320')));
//    else echo $form->textAreaGroup($model, 'description', array('class' => 'form-control', 'rows' => 5));;
    ?>

    <?php echo $form->textFieldGroup($model, 'link_label', array('class' => 'form-control', 'maxlength' => 255)); ?>

<?php // echo $form->textFieldGroup($model,'link',array('class'=>'form-control','maxlength'=>255));  ?>




<?php // echo $form->textFieldGroup($model,'order',array('class'=>'form-control'));  ?>


<?php // echo $form->dropDownListGroup($model,'state_id', array('widgetOptions'=>array('data'=>$model->getStatusOptions(), 'htmlOptions'=>array('class'=>'input-large'))));  ?>


<?php // echo $form->dropDownListGroup($model,'type_id', array('widgetOptions'=>array('data'=>$model->getTypeOptions(), 'htmlOptions'=>array('class'=>'input-large'))));  ?>


    <?php
//            echo $form->datepickerGroup($model, 'update_time',
//					array('hint'=>'Click inside! to select a date.',
//					'prepend'=>'<i class="icon-calendar"></i>'))
//; 
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