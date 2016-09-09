<!--  form code start here -->
<div class="form well">

<?php $ajax = ($this->enable_ajax_validation) ? 'true' : 'false'; ?>

<?php echo '<?php '; ?>
$form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id' => '<?php echo $this->class2id($this->modelClass); ?>-form',
	'type'=>'horizontal',
	'enableAjaxValidation' => <?php echo $ajax; ?>,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
));
<?php echo '?>'; ?>

	<p class="help-block" align="right">Fields with <span class="required">*</span> are required.</p>

	<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

<?php foreach ($this->tableSchema->columns as $column): ?>
<?php if (!$column->autoIncrement   && !preg_match('/^(pending_on|create_time|create_user|modify_time|actual_start\|actual_end)/i', $column->name)
): ?>

<?php echo "<?php echo ".$this->generateActiveRow($this->modelClass,$column)."; ?>\n"; ?>

<?php endif; ?>
<?php endforeach; ?>

<?php foreach ($this->getRelations($this->modelClass) as $relation): ?>
<?php if ($relation[1] == GxActiveRecord::HAS_MANY || $relation[1] == GxActiveRecord::MANY_MANY): ?>
<?php echo '<?php'; ?> if ( count (<?php echo $relation[3];?>::model()->findAllAttributes(null, true) ) > 0 ): ?>
		<label><?php echo '<?php'; ?> echo GxHtml::encode($model->getRelationLabel('<?php echo $relation[0]; ?>')); ?></label>
	
		<?php echo '<?php ' . $this->generateActiveRelationField($this->modelClass, $relation) . "; ?>\n"; ?>
<?php echo '<?php'; ?> endif; ?>	

<?php endif; ?>

<?php endforeach; ?>

	<div class="form-group">
		<?php echo "<?php \$this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'label'=>'Save',
		)); ?>\n"; ?>
	</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div>
<!-- form code ends here -->