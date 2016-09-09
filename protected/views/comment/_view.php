<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::encode($data->id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('model_id')); ?>:
	<?php echo GxHtml::encode($data->model_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('model_type')); ?>:
	<?php echo GxHtml::encode($data->model_type); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('comment')); ?>:
	<?php echo GxHtml::encode($data->comment); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('rate')); ?>:
	<?php echo GxHtml::encode($data->rate); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('state_id')); ?>:
	<?php echo GxHtml::encode($data->state_id); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('create_time')); ?>:
	<?php echo GxHtml::encode($data->create_time); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('create_user_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->createUser)); ?>
	<br />
	*/ ?>

</div>