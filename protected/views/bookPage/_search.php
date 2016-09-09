<div class="wide form">

<?php 	$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	//'method' => 'get',
	'id' => 'book-page-form',
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
		<?php echo $form->label($model, 'tab_2_title'); ?>
		<?php echo $form->textField($model, 'tab_2_title', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tab_1_image'); ?>
		<?php echo $form->textField($model, 'tab_1_image', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tab_2_image'); ?>
		<?php echo $form->textField($model, 'tab_2_image', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tab_1_desc'); ?>
		<?php $this->richTextEditor($model,'tab_1_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tab_2_desc'); ?>
		<?php $this->richTextEditor($model,'tab_2_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'button_2_text'); ?>
		<?php echo $form->textField($model, 'button_2_text', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'button_1_text'); ?>
		<?php echo $form->textField($model, 'button_1_text', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'image_right'); ?>
		<?php echo $form->textField($model, 'image_right', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'image_left'); ?>
		<?php echo $form->textField($model, 'image_left', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'subscribe'); ?>
		<?php echo $form->textField($model, 'subscribe', array('maxlength' => 1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'img_tr'); ?>
		<?php echo $form->textField($model, 'img_tr', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'title_tr'); ?>
		<?php echo $form->textField($model, 'title_tr', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tag_line_tr'); ?>
		<?php echo $form->textField($model, 'tag_line_tr', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'map_title_tr'); ?>
		<?php echo $form->textField($model, 'map_title_tr', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'map_content_tr'); ?>
		<?php $this->richTextEditor($model,'map_content_tr'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'page_title_tr'); ?>
		<?php echo $form->textField($model, 'page_title_tr', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'page_tag_line_tr'); ?>
		<?php echo $form->textField($model, 'page_tag_line_tr', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'desc_tr'); ?>
		<?php echo $form->textField($model, 'desc_tr', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'description'); ?>
		<?php echo $form->textField($model, 'description', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cnf_descp'); ?>
		<?php echo $form->textField($model, 'cnf_descp', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cnf_checkbox_text'); ?>
		<?php echo $form->textField($model, 'cnf_checkbox_text', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cnf_btn_text'); ?>
		<?php echo $form->textField($model, 'cnf_btn_text', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'thankyou_title'); ?>
		<?php echo $form->textField($model, 'thankyou_title', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'thankyou_tagline'); ?>
		<?php echo $form->textField($model, 'thankyou_tagline', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'thankyou_descp'); ?>
		<?php echo $form->textField($model, 'thankyou_descp', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'thankyou_cancel_button'); ?>
		<?php echo $form->textField($model, 'thankyou_cancel_button', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cancel_title'); ?>
		<?php echo $form->textField($model, 'cancel_title', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cancel_tagline'); ?>
		<?php echo $form->textField($model, 'cancel_tagline', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cancel_descp'); ?>
		<?php echo $form->textField($model, 'cancel_descp', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'extra_text_1'); ?>
		<?php echo $form->textField($model, 'extra_text_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'extra_text_2'); ?>
		<?php echo $form->textField($model, 'extra_text_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'extra_text_3'); ?>
		<?php echo $form->textField($model, 'extra_text_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'extra_textarea_1'); ?>
		<?php echo $form->textField($model, 'extra_textarea_1', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'extra_textarea_2'); ?>
		<?php echo $form->textField($model, 'extra_textarea_2', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'extra_textarea_3'); ?>
		<?php echo $form->textField($model, 'extra_textarea_3', array('maxlength' => 255)); ?>
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
