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
	Yii::t('app', 'Create'),
);\n";
?>
?>
<div class="page-header">
<h1><?php echo '<?php'; ?> echo Yii::t('app', 'Create') . ' ' . GxHtml::encode($model->label()); ?></h1>
</div>

<?php echo '<?php '; ?>  $this->widget('booster.widgets.TbMenu', array(
    'type' => 'navbar',
	'items'=>$this->actions,
	'htmlOptions'=>array('class'=> 'pull-right'),
	));
?>
<?php echo "<?php\n"; ?>
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
<?php echo '?>'; ?>