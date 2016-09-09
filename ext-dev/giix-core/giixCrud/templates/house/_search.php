<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<div class="wide form">

<?php echo '<?php '; ?>
	$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
	'id' => '<?php echo $this->class2id($this->modelClass); ?>-form',
	'type'=>'horizontal',		
)); ; 
?>

<?php foreach($this->tableSchema->columns as $column): ?>
<?php
	$field = $this->generateInputField($this->modelClass, $column);
	if (strpos($field, 'pass') !== false)
		continue;
?>
	<div class="row">
		<?php echo "<?php echo \$form->label(\$model, '{$column->name}'); ?>\n"; ?>
		<?php echo "<?php " . $this->generateSearchField($this->modelClass, $column)."; ?>\n"; ?>
	</div>

<?php endforeach; ?>

	<div class="form-actions">
		<?php echo "<?php \$this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>\n"; ?>
	</div>
<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- search-form -->
