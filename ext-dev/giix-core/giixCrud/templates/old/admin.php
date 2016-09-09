<?php
/**
 * Author :Karan Singh Guleriya < swap.guleriya@gmail.com >
 */
?>
<?php
echo "<?php\n
\$this->breadcrumbs = array(
	\$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);\n";
?>

?>
<div class="page-header">
	<h1><?php echo '<?php'; ?> echo Yii::t('app', 'Manage') . ' : ' . GxHtml::encode($model->label(2)); ?></h1>
</div>

<?php echo '<?php '; ?>  $this->widget('booster.widgets.TbMenu', array(
    'type' => 'navbar',
	'items'=>$this->actions,
	'htmlOptions'=>array('class'=> 'pull-right'),
	));
?>


<?php echo '<?php'; ?> $this->widget('booster.widgets.TbGridView', array(
	'id' => '<?php echo $this->class2id($this->modelClass); ?>-grid',
	'type'=>'striped bordered condensed',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
<?php
$count = 0;
foreach ($this->tableSchema->columns as $column) {
	
	if ( preg_match('/^(content|description|create_time|create_user|modify_time|actual_start|actual_end|password|activation_key)/i', $column->name))
		continue;
		
	if (++$count == 7)
		echo "\t\t/*\n";
	echo "\t\t" . $this->generateGridViewColumn($this->modelClass, $column).",\n";
}
if ($count >= 7)
	echo "\t\t*/\n";
?>
		array(
			'class'=>'booster.widgets.TbButtonColumn',
			'htmlOptions' => array('nowrap'=>'nowrap'),
		),
	),
)); ?>