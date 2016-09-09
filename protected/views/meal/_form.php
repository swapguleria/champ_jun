<!--  form code start here -->
<div class="form">


    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'meal-form',
        'type' => 'horizontal',
        'enableAjaxValidation' => true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>
    <p class="help-block" align="right">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>


<?php echo $form->textFieldGroup($model, 'title', array('class' => 'form-control', 'maxlength' => 256)); ?>


<?php // echo $form->textFieldGroup($model,'sub_title',array('class'=>'form-control','maxlength'=>256));  ?>


<?php // echo  $form->textAreaGroup($model,'description',  array('class'=>'form-control', 'rows'=>5));;  ?>


<?php echo $form->textFieldGroup($model, 'days', array('class' => 'form-control', 'maxlength' => 256)); ?>


<?php echo $form->textFieldGroup($model, 'timings', array('class' => 'form-control', 'maxlength' => 256)); ?>


<?php echo $form->fileFieldGroup($model, 'image', array('class' => 'form-control', 'maxlength' => 256)); ?>


<?php echo $form->fileFieldGroup($model, 'background_image', array('class' => 'form-control', 'maxlength' => 256)); ?>


<?php // echo $form->dropDownListGroup($model, 'state_id', array('widgetOptions' => array('data' => $model->getStatusOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?>


<?php // echo $form->dropDownListGroup($model, 'type_id', array('widgetOptions' => array('data' => $model->getTypeOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?>


    <?php
//    echo $form->datepickerGroup($model, 'update_time', array('hint' => 'Click inside! to select a date.',
//        'prepend' => '<i class="icon-calendar"></i>'))
//    ;
    ?>



    <?php // if (count(MealItem::model()->findAllAttributes(null, true)) > 0): ?>
        <!--<label><?php // echo GxHtml::encode($model->getRelationLabel('mealItems')); ?></label>-->

    <?php // echo $form->checkBoxListGroup($model, 'mealItems', GxHtml::encodeEx(GxHtml::listDataEx(MealItem::model()->findAllAttributes(null, true)), false, true)); ?>
<?php // endif; ?>	



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