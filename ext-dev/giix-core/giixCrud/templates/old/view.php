<?php
/**
 * Company: flamedevelopers <www.flamedevelopers.com>
 * Author : flamedevelopers < flamedevelopers.com >
 */
?>
<?php
echo "<?php\n
\$this->breadcrumbs = array(
	\$model->label(2) => array('index'),
	GxHtml::valueEx(\$model),
);\n";
?>


?>

<div class="page-header">
<h1><?php echo '<?php'; ?> echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>
</div>

<?php echo '<?php '; ?>  $this->widget('booster.widgets.TbMenu', array(
    'type' => 'navbar',
	'items'=>$this->actions,
	'htmlOptions'=>array('class'=> 'pull-right'),
	));
?>

<?php echo '<?php'; ?> $this->widget('booster.widgets.TbDetailView', array(
	'data' => $model,
	'attributes' => array(
<?php
foreach ($this->tableSchema->columns as $column)
{
	if (preg_match('/^(password|activation_key)/i', $column->name))
		continue;
		
	echo $this->generateDetailViewAttribute($this->modelClass, $column) . ",\n";
}
?>
	),
)); ?>

<?php 
	$count = 0;
	foreach (GxActiveRecord::model($this->modelClass)->relations() as $relationName => $relation): 
	if ($relation[0] == GxActiveRecord::HAS_MANY || $relation[0] == GxActiveRecord::MANY_MANY): 
	if ( $count == 0 )
	  {
		$count++;
		echo "<?php\n"	?> $this->StartPanel(); ?>
<?php } ?>
<?php echo '<?php '; ?> $this->AddPanel($model->getRelationLabel('<?php echo $relationName; ?>'), $model->getRelatedDataProvider('<?php echo $relationName; ?>'),	'<?php echo $relationName; ?>','<?php echo strtolower($relation[1][0]) . substr($relation[1], 1); ?>');?>
<?php endif; ?>
<?php endforeach; ?>
<?php if ( $count )  { echo '<?php '; ?> $this->EndPanel(); ?>
<?php } ?>

<?php echo '<?php '; ?>  $this->widget('CommentPortlet', array(
	'model' => $model,
));
?>