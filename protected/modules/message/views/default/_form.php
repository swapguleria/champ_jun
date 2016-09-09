<?php

$form = $this->beginWidget ( 'booster.widgets.TbActiveForm', array (
		'id' => 'message-form',
		'type' => 'horizontal',
		'enableAjaxValidation' => true,
		'htmlOptions' => array (
				'enctype' => 'multipart/form-data' 
				)
				) );
				?>
<?php $criteria= new CDbCriteria();
$criteria->compare('role_id',User::ROLE_USER);?>
<?php echo $form->dropDownListGroup($model,'to_id', array('widgetOptions'=>array('data'=>CHtml::listData(user::model()->findAll($criteria),'id','email'), 'htmlOptions'=>array('class'=>'input-large','empty'=>'Select User')))); ?>
				
<?php echo $form->textAreaGroup($model,'content',array('class'=>'form-control')); ?>

				
				<?php //echo $form->errorSummary($model); ?>
				<?php 
// 				$model->from_id = Yii::app()->user->model->email;
// 				echo $form->textFieldGroup($model,'from_id',array('class'=>'form-control')); ?>
<!-- 				<div class="form-group"> -->
<!-- 				<label class="col-md-3 control-label "> -->
				<?php //echo $form->labelEx($model,'to_id'); ?>

<!-- 				</label> -->
<!-- 				<div class="col-md-9 control-label "> -->
				<?php

// 				$this->widget ( 'booster.widgets.TbSelect2', array (
					
// 				'model' => $model,
// 				'attribute' => 'to_id',
// 				'data' => $model->getUserOptions (),
// 				'options' => array (
// 				'placeholder' => 'To User',
// 				'width' => '100%',
// 				'htmlOptions' => array (
// 				'class' => 'text-left'
// 				)
// 				)
// 				) );
// 				?>
<!-- 				</div> -->
<!-- 				</div>?> -->


	

	<div class="form-group">
		<div class="col-md-3"></div>
		<div class="col-md-9">
		<?php

		$this->widget ( 'booster.widgets.TbButton', array (
				'buttonType' => 'submit',
				'label' => Yii::t('app','Save'),
				'context'=>'success'
		) );
		?>
		</div>
	</div>

	<?php $this->endWidget(); ?>


