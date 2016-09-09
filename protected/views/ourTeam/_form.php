<!--  form code start here -->
<div class="form">

    
    <?php     $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
    'id' => 'our-team-form',
    'type'=>'horizontal',
    'enableAjaxValidation' => true,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    ));
    ?>
    <p class="help-block" align="right">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

                        
            <?php echo $form->textFieldGroup($model,'name',array('class'=>'form-control','maxlength'=>255)); ?>

                    
            <?php echo $form->textFieldGroup($model,'designation',array('class'=>'form-control','maxlength'=>255)); ?>

                    
            <?php echo $form->textFieldGroup($model,'facebook',array('class'=>'form-control','maxlength'=>255)); ?>

                    
            <?php echo $form->textFieldGroup($model,'twitter',array('class'=>'form-control','maxlength'=>255)); ?>

                    
            <?php echo $form->textFieldGroup($model,'linkedin',array('class'=>'form-control','maxlength'=>255)); ?>

                    
            <?php echo $form->textFieldGroup($model,'google_plus',array('class'=>'form-control','maxlength'=>255)); ?>

                    
            <?php   echo $form->fileFieldGroup($model, 'image', array('class' => 'form-control', 'placeHolder' => 'Image File'));?>

                    
            <?php echo $form->textFieldGroup($model,'description',array('class'=>'form-control','maxlength'=>255)); ?>

                    
            <?php // echo $form->dropDownListGroup($model,'state_id', array('widgetOptions'=>array('data'=>$model->getStatusOptions(), 'htmlOptions'=>array('class'=>'input-large')))); ?>

                    
            <?php // echo $form->dropDownListGroup($model,'type_id', array('widgetOptions'=>array('data'=>$model->getTypeOptions(), 'htmlOptions'=>array('class'=>'input-large')))); ?>

                                
            <?php // echo $form->datepickerGroup($model, 'update_time',
//					array('hint'=>'Click inside! to select a date.',
//					'prepend'=>'<i class="icon-calendar"></i>'))
//; ?>

                        
    
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