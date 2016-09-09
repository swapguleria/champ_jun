<!--  form code start here -->
<div class="form">

    
    <?php     $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
    'id' => 'booked-table-form',
    'type'=>'horizontal',
    'enableAjaxValidation' => true,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    ));
    ?>
    <p class="help-block" align="right">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

                        
           

                    
            <?php echo $form->textFieldGroup($model,'party_size',array('class'=>'form-control')); ?>

                    
         

                    
            <?php echo $form->textFieldGroup($model,'last_name',array('class'=>'form-control','maxlength'=>255)); ?>

                    
            <?php echo $form->textFieldGroup($model,'email',array('class'=>'form-control','maxlength'=>255)); ?>

                    
            <?php echo $form->textFieldGroup($model,'phone_no',array('class'=>'form-control')); ?>

                    
            <?php echo  '';$code = $this->richTextEditor() ;

					if ($code == 1) echo $form->html5EditorGroup($model,'special_request', array('class'=>'form-control', 'rows'=>5, 'height'=>'200', 'options'=>array('color'=>true)));

					else if ($code == 2) echo $form->redactorGroup($model,'special_request', array('class'=>'form-control', 'rows'=>5));

					else if ($code == 3) echo $form->ckEditorGroup($model,'special_request', array('options'=>array('fullpage'=>'js:true', 'width'=>'640', 'resize_maxWidth'=>'640','resize_minWidth'=>'320')));

					else echo $form->textAreaGroup($model,'special_request',  array('class'=>'form-control', 'rows'=>5));; ?>

                    
            <?php echo $form->textFieldGroup($model,'email_subscription',array('class'=>'form-control','maxlength'=>255)); ?>

                    
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