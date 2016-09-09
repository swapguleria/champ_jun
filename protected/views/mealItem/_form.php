<!--  form code start here -->
<div class="form">

    
    <?php     $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
    'id' => 'meal-item-form',
    'type'=>'horizontal',
    'enableAjaxValidation' => true,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    ));
    ?>
    <p class="help-block" align="right">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

                 
<?php echo $form->dropDownListGroup($model,'meal_id', array('widgetOptions'=>array('data'=>CHtml::listData(Meal::model()->findAll(array('order' => 'id ASC')),'id','title'), 'htmlOptions'=>array('class'=>'input-large','empty'=>'Select Meal')))); ?>
	       
            <?php // echo $form->radioButtonListGroup($model, 'meal_id', GxHtml::listDataEx(Meal::model()->findAllAttributes(null, true))); ?>

                    
            <?php echo $form->textFieldGroup($model,'title',array('class'=>'form-control','maxlength'=>256)); ?>

                    
            <?php echo $form->textFieldGroup($model,'sub_title',array('class'=>'form-control','maxlength'=>256)); ?>

                    
            <?php echo $form->textFieldGroup($model,'price',array('class'=>'form-control')); ?>

                    
            <?php // echo $form->textFieldGroup($model,'image',array('class'=>'form-control','maxlength'=>256)); ?>

                    
            <?php // echo $form->textFieldGroup($model,'background_image',array('class'=>'form-control','maxlength'=>256)); ?>

                    
            <?php //  echo $form->textAreaGroup($model,'description',  array('class'=>'form-control', 'rows'=>5));; ?>

                    
            <?php // echo $form->dropDownListGroup($model,'state_id', array('widgetOptions'=>array('data'=>$model->getStatusOptions(), 'htmlOptions'=>array('class'=>'input-large')))); ?>

                    
            <?php // echo $form->dropDownListGroup($model,'type_id', array('widgetOptions'=>array('data'=>$model->getTypeOptions(), 'htmlOptions'=>array('class'=>'input-large')))); ?>

                                            
            <?php // echo $form->datepickerGroup($model, 'update_time',
//					array('hint'=>'Click inside! to select a date.',
//					'prepend'=>'<i class="icon-calendar"></i>'))
//; 
            ?>

            
            
            
    
    <div class="form-group">
        <?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'label'=>'Save',
                         'context' => 'success',
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>
<!-- form code ends here -->