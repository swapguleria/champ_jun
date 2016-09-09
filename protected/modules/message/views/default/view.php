<section class="content-header">
<h1><?php echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>
</section>

<div class="content">
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Message Information</h3>				
<?php   $this->widget('booster.widgets.TbMenu', array(
    'type' => 'navbar',
	'items'=>$this->actions,
	'htmlOptions'=>array('class'=> 'pull-right btn-group'),
	));
?>		
			</div>
			<div class="box-body ">

				

				<div class="col-md-8">
				<?php $this->widget('booster.widgets.TbDetailView', array(
	'data' => $model,
	'attributes' => array(
			array(
					'name' => Yii::t('app','ToUser'),
					'type' => 'raw',
					'value' =>$model->to !== null ? "<a href=".Yii::app()->createUrl('user/view',array('id'=>$model->to_id)).">".$model->to."</a>"  : null, 
					
			),
			array(
					'name' => Yii::t('app','FromUser'),
					'type' => 'raw',
					'value' => $model->from !== null ? "<a href=".Yii::app()->createUrl('user/view',array('id'=>$model->from_id)).">".$model->from."</a>" : null,
			),
				
//'id',
'content:html',

'create_time:date',
	),
)); ?>
				</div>

				<div class="clearfix"></div>
				


			</div>

				<div class="clearfix"></div>

<?php
/*
 * $this->widget('CommentPortlet', array(
 * 'model' => $model,
 * ));
 */
?>
</div>
	</div>
</div>
</div>
	
	
