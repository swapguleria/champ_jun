<?php
/**
 * Company: flamedevelopers <www.flamedevelopers.com>
 * Author : flamedevelopers < flamedevelopers.com >
 */
?>
<?php
echo "<?php\n
\$this->breadcrumbs = array(
	{$this->modelClass}::label(2),
	Yii::t('app', 'Index'),
);\n";
?>
?>

<div class="page-header">
<h1><?php echo '<?php'; ?> echo GxHtml::encode(<?php echo $this->modelClass;?>::label(2)); ?></h1>
</div>


<?php echo '<?php '; ?>  $this->widget('booster.widgets.TbMenu', array(
    'type' => 'navbar',
	'items'=>$this->actions,
	'htmlOptions'=>array('class'=> 'pull-right'),
	));
?>
<?php echo '<?php '; ?>
$this->renderPartial('_list', array(
		'dataProvider'=>$dataProvider,
));

<?php '?>'; ?>