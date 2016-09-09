<!--  form code start here -->
<div class="form">

    
    <?php     $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
    'id' => 'enquiry-form',
    'type'=>'horizontal',
    'enableAjaxValidation' => true,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    ));
    ?>
    <p class="help-block" align="right">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

                        
            <?php echo $form->textFieldGroup($model,'first_name',array('class'=>'form-control','maxlength'=>255)); ?>

                    
            <?php echo $form->textFieldGroup($model,'last_name',array('class'=>'form-control','maxlength'=>255)); ?>

                    
            <?php echo $form->textFieldGroup($model,'phone',array('class'=>'form-control','maxlength'=>255)); ?>

                    
            <?php echo $form->textFieldGroup($model,'email',array('class'=>'form-control','maxlength'=>255)); ?>

                    
            <?php echo $form->datepickerGroup($model, 'booking_date',
					array('hint'=>'Click inside! to select a date.',
					'prepend'=>'<i class="icon-calendar"></i>'))
; ?>

                    
            <?php echo $form->timepickerGroup($model, 'booking_time',
			 array('hint'=>'Click inside!to select time ',
			 'append'=>'<i class="icon-time" style="cursor:pointer"></i>'))
; ?>

                    
            <?php echo $form->textFieldGroup($model,'party_size',array('class'=>'form-control')); ?>

                    
            <?php echo $form->textFieldGroup($model,'terms',array('class'=>'form-control')); ?>

                    
            <?php echo $form->dropDownListGroup($model,'state_id', array('widgetOptions'=>array('data'=>$model->getStatusOptions(), 'htmlOptions'=>array('class'=>'input-large')))); ?>

                    
            <?php echo $form->dropDownListGroup($model,'type_id', array('widgetOptions'=>array('data'=>$model->getTypeOptions(), 'htmlOptions'=>array('class'=>'input-large')))); ?>

                                
            <?php echo $form->datepickerGroup($model, 'update_time',
					array('hint'=>'Click inside! to select a date.',
					'prepend'=>'<i class="icon-calendar"></i>'))
; ?>

                        
    
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