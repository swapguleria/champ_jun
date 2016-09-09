<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model) => array('view', 'id' => GxActiveRecord::extractPkValue($model, true)),
	Yii::t('app', 'Update'),
);
?>
   <div class="page-header">
     <h1 class="panel-title"> <span class="menu-icon"> <i class="fa fa-bar-chart-o"></i> </span> <?php echo Yii::t('app', 'Update') . ' ' . GxHtml::encode($model->label()) . ' : ' . GxHtml::encode(GxHtml::valueEx($model)); ?>
          </h1>  </div>        
 <?php   $this->widget('booster.widgets.TbMenu', array(
    'type' => 'navbar',
	'items'=>$this->actions,
	'htmlOptions'=>array('class'=> 'pull-right btn-group'),
	));
?>
                   

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>