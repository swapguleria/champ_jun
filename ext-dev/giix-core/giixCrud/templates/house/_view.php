<?php
/**
 * Company: flamedevelopers <www.flamedevelopers.com>
 * Author : flamedevelopers < flamedevelopers.com >
 */
?>
<div class="view">

<?php
echo "\t<b><?php echo CHtml::encode(\$data->getAttributeLabel('{$this->tableSchema->primaryKey}')); ?>:</b>\n";
echo "\t<?php echo CHtml::link(CHtml::encode(\$data->{$this->tableSchema->primaryKey}),array('view','id'=>\$data->{$this->tableSchema->primaryKey})); ?>\n\t<br />\n\n";
$count=0;
foreach ($this->tableSchema->columns as $column):
	if ($column->isPrimaryKey && preg_match('/^(password|activation_key)/i', $column->name))
		continue;
	if (++$count == 7)
		echo "\t<?php /*\n";
?>
	<?php echo '<?php'; ?> echo GxHtml::encode($data->getAttributeLabel('<?php echo $column->name; ?>')); <?php echo '?>'; ?>:
<?php if (!$column->isForeignKey ): ?>
	<?php echo '<?php'; ?> echo GxHtml::encode($data-><?php echo $column->name; ?>); <?php echo "?>\n"; ?>
<?php else: ?>
	<?php
	$relations = $this->findRelation($this->modelClass, $column);
	$relationName = $relations[0];
	?>
	<?php echo '<?php'; ?> echo GxHtml::encode(GxHtml::valueEx($data-><?php echo $relationName; ?>)); <?php echo "?>\n"; ?>
<?php endif; ?>
	<br />
<?php endforeach; ?>
<?php
if($count>=7)
	echo "\t*/ ?>\n";
?>

</div>