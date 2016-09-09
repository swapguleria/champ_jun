<div class="wide form">

<?php 	$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	//'method' => 'get',
	'id' => 'user-form',
	'type'=>'horizontal',		
)); ; 
?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'full_name'); ?>
		<?php echo $form->textField($model, 'full_name', array('size'=>80,'maxlength' => 512)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'contact_no'); ?>
		<?php echo $form->textField($model, 'contact_no', array('maxlength' => 11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'address'); ?>
		<?php $this->richTextEditor($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'city'); ?>
		<?php echo $form->textField($model, 'city', array('maxlength' => 256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'country'); ?>
		<?php echo $form->textField($model, 'country', array('maxlength' => 256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'zipcode'); ?>
		<?php echo $form->textField($model, 'zipcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'currency_type'); ?>
		<?php echo $form->textField($model, 'currency_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'timezone'); ?>
		<?php echo $form->textField($model, 'timezone', array('size'=>80,'maxlength' => 512)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'date_of_birth'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'date_of_birth',
			'value' => $model->date_of_birth,
			'options' => array(
			'showButtonPanel' => true,
			'changeYear' => true,
			'dateFormat' => 'yy-mm-dd',
			),
			));
; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'about_me'); ?>
		<?php $this->richTextEditor($model,'about_me'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'image_file'); ?>
		<?php echo $form->textField($model, 'image_file', array('size'=>80,'maxlength' => 512)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'lat'); ?>
		<?php echo $form->textField($model, 'lat', array('maxlength' => 256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'long'); ?>
		<?php echo $form->textField($model, 'long', array('maxlength' => 256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tos'); ?>
		<?php echo $form->textField($model, 'tos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'role_id'); ?>
		<?php echo $form->textField($model, 'role_id'); ?>
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
		<?php echo $form->label($model, 'last_visit_time'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'last_visit_time',
			'value' => $model->last_visit_time,
			'options' => array(
			'showButtonPanel' => true,
			'changeYear' => true,
			'dateFormat' => 'yy-mm-dd',
			),
			));
; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'last_action_time'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'last_action_time',
			'value' => $model->last_action_time,
			'options' => array(
			'showButtonPanel' => true,
			'changeYear' => true,
			'dateFormat' => 'yy-mm-dd',
			),
			));
; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'activation_key'); ?>
		<?php echo $form->textField($model, 'activation_key', array('size'=>80,'maxlength' => 512)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'login_error_count'); ?>
		<?php echo $form->textField($model, 'login_error_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'create_user_id'); ?>
		<?php echo $form->textField($model, 'create_user_id'); ?>
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


	<div class="form-group">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'label'=>'Search',
		)); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- search-form -->
