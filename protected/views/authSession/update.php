<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model) => array('view', 'id' => GxActiveRecord::extractPkValue($model, true)),
	Yii::t('app', 'Update'),
);
?>
<?php   $this->widget('booster.widgets.TbMenu', array(
    'type' => 'navbar',
	'items'=>$this->actions,
	'htmlOptions'=>array('class'=> 'pull-right'),
	));
?>
<div class="page-header">
<h1><?php echo Yii::t('app', 'Update') . ' ' . GxHtml::encode($model->label()) . ' : ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>
</div>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>