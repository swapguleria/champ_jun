<div class="wide form">

<?php 	$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	//'method' => 'get',
	'id' => 'homepage-form',
	'type'=>'horizontal',		
)); ; 
?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tab_1_title'); ?>
		<?php echo $form->textField($model, 'tab_1_title', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tab_1_sub_title'); ?>
		<?php echo $form->textField($model, 'tab_1_sub_title', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tab_1_description'); ?>
		<?php $this->richTextEditor($model,'tab_1_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tab_1_image'); ?>
		<?php echo $form->textField($model, 'tab_1_image', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'box_1_title'); ?>
		<?php echo $form->textField($model, 'box_1_title', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'box_1_description'); ?>
		<?php $this->richTextEditor($model,'box_1_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'box_1_button_text'); ?>
		<?php echo $form->textField($model, 'box_1_button_text', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'box_1_link'); ?>
		<?php echo $form->textField($model, 'box_1_link', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'box_1_background'); ?>
		<?php echo $form->textField($model, 'box_1_background', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'box_2_title'); ?>
		<?php echo $form->textField($model, 'box_2_title', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'box_2_description'); ?>
		<?php $this->richTextEditor($model,'box_2_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'box_2_button_text'); ?>
		<?php echo $form->textField($model, 'box_2_button_text', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'box_2_link'); ?>
		<?php echo $form->textField($model, 'box_2_link', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'box_2_background'); ?>
		<?php echo $form->textField($model, 'box_2_background', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tab_2_title'); ?>
		<?php echo $form->textField($model, 'tab_2_title', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tab_2_text'); ?>
		<?php echo $form->textField($model, 'tab_2_text', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tab_2_link'); ?>
		<?php echo $form->textField($model, 'tab_2_link', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tab_2_button_text'); ?>
		<?php echo $form->textField($model, 'tab_2_button_text', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tab_2_background'); ?>
		<?php echo $form->textField($model, 'tab_2_background', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tab_3_title_1'); ?>
		<?php echo $form->textField($model, 'tab_3_title_1', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tab_3_sub_title_1'); ?>
		<?php echo $form->textField($model, 'tab_3_sub_title_1', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tab_3_description'); ?>
		<?php $this->richTextEditor($model,'tab_3_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tab_3_title_2'); ?>
		<?php echo $form->textField($model, 'tab_3_title_2', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tab_3_sub_title_2'); ?>
		<?php echo $form->textField($model, 'tab_3_sub_title_2', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tab_3_background'); ?>
		<?php echo $form->textField($model, 'tab_3_background', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'state_id'); ?>
		<?php 
			$this->widget('ext.widgets.CJuiRadioButtonList', array(
			'model'=>$model,
			'attribute'=>'state_id',
			'data'=>$model->getStatusOptions(),
			)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'type_id'); ?>
		<?php 
			$this->widget('ext.widgets.CJuiRadioButtonList', array(
			'model'=>$model,
			'attribute'=>'type_id',
			'data'=>$model->getTypeOptions(),
			)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'create_time'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'create_time',
			'value' => $model->create_time,
			'options' => array(
			'showButtonPanel' => true,
			'changeYear' => true,
			'dateFormat' => 'yy-mm-dd',
			),
			));
; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'update_time'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'update_time',
			'value' => $model->update_time,
			'options' => array(
			'showButtonPanel' => true,
			'changeYear' => true,
			'dateFormat' => 'yy-mm-dd',
			),
			));
; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'create_user_id'); ?>
		<?php echo $form->textField($model, 'create_user_id'); ?>
	</div>


	<div class="form-group">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'label'=>'Search',
		)); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- search-form -->
