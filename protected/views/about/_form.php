<!--  form code start here -->
<div class="form">
    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'about-form',
        'type' => 'horizontal',
        'enableAjaxValidation' => true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>
    <p class="help-block" align="right">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

<!--    <div class="about-panel">
        <h1>Page Description </h1>
        <div class="row">
            <div class="col-sm-6">                       
                <?php // echo $form->textFieldGroup($model, 'tab_1_title', array('class' => 'form-control', 'maxlength' => 255)); ?>                    
                <?php // echo $form->textFieldGroup($model, 'tab_1_sub_title', array('class' => 'form-control', 'maxlength' => 255)); ?> 
            </div>
            <div class="col-sm-6">
                <?php // echo $form->fileFieldGroup($model, 'tab_1_image', array('class' => 'form-control', 'maxlength' => 255)); ?>

            </div>

        </div>
        <hr>  
    </div>about-panel-->

    <div class="perfect-panel">
        <h1>Page Description </h1>      
        <div class="row">
            <div class="col-sm-6">     
                <?php echo $form->textFieldGroup($model, 'tab_2_title', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textFieldGroup($model, 'tab_2_sub_title', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->fileFieldGroup($model, 'tab_2_image', array('class' => 'form-control', 'maxlength' => 255)); ?>
            </div>
            <div class="col-sm-6">     
                <?php echo $form->textAreaGroup($model, 'tab_2_description', array('class' => 'form-control', 'rows' => 5));
                ?>
            </div>
        </div>
        <hr>  
    </div><!--about-panel-->

    <div class="perfect-panel">
        <h1>Page Post Section </h1>      
        <div class="row">
            <div class="col-sm-4">                    
                <?php echo $form->fileFieldGroup($model, 'box_1_image_logo', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textFieldGroup($model, 'box_1_title', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textAreaGroup($model, 'box_1_description', array('class' => 'form-control', 'rows' => 5));
                ?>
            </div>
            <div class="col-sm-4">                    
                <?php echo $form->fileFieldGroup($model, 'box_2_image_logo', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textFieldGroup($model, 'box_2_title', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textAreaGroup($model, 'box_2_description', array('class' => 'form-control', 'rows' => 5));
                ?>
            </div>
            <div class="col-sm-4">                    
                <?php echo $form->fileFieldGroup($model, 'box_3_image_logo', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textFieldGroup($model, 'box_3_title', array('class' => 'form-control', 'maxlength' => 255)); ?>
                <?php echo $form->textAreaGroup($model, 'box_3_description', array('class' => 'form-control', 'rows' => 5)); ?>
            </div>
        </div> 
        <hr>
    </div><!--about-panel-->

    <div class="perfect-panel">
        <h1>Team Description</h1>      
        <div class="row">
            <div class="col-sm-6"> 
                <?php echo $form->textFieldGroup($model, 'tab_4_title', array('class' => 'form-control', 'maxlength' => 255)); ?>
            </div>
            <div class="col-sm-6">                    
                <?php echo $form->textFieldGroup($model, 'tab_4_sub_title', array('class' => 'form-control', 'maxlength' => 255)); ?>
            </div>      

            <?php //echo $form->dropDownListGroup($model,'state_id', array('widgetOptions'=>array('data'=>$model->getStatusOptions(), 'htmlOptions'=>array('class'=>'input-large')))); ?>


            <?php //echo $form->dropDownListGroup($model,'type_id', array('widgetOptions'=>array('data'=>$model->getTypeOptions(), 'htmlOptions'=>array('class'=>'input-large'))));  ?>


            <?php
//echo $form->datepickerGroup($model, 'update_time',
//	array('hint'=>'Click inside! to select a date.',
//	'prepend'=>'<i class="icon-calendar"></i>'))
            ;
            ?>

        </div> 
    </div> 
    <div class="box-footer clearfix">
        <div class="form-group pull-right">
            <?php
            $this->widget('booster.widgets.TbButton', array(
                'buttonType' => 'submit',
                'label' => 'Save',
                'context' => 'success',
                'size' => 'large'
            ));
            ?>
        </div>

    </div>
    <?php $this->endWidget(); ?>

</div>
<!-- form code ends here -->