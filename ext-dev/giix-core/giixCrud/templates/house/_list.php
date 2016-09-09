
<?php echo '<?php'; ?> $this->widget('booster.widgets.TbGridView', array(
	'id' => '<?php echo $this->class2id($this->modelClass); ?>-grid',
	'type'=>'bordered condensed striped',
	'selectionChanged'=>"function(id){window.location='" . Yii::app()->createAbsoluteUrl('<?php echo lcfirst($this->modelClass); ?>/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
	'dataProvider' => $dataProvider,
	'columns' => array(
<?php
$count = 0;
foreach ($this->tableSchema->columns as $column) {

	if ( preg_match('/^(content|description|create_time|create_user|modify_time|actual_start|actual_end|password|passcode|activation_key)/i', $column->name))
		continue;
	if (++$count == 7)
		echo "\t\t/*\n";
	echo "\t\t" . $this->generateGridViewColumn($this->modelClass, $column).",\n";
}
if ($count >= 7)
	echo "\t\t*/\n";
?>
		array(
			'class' => 'CxButtonColumn',
		),
	),
)); ?>