<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::encode($data->id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('content')); ?>:
	<?php echo GxHtml::encode($data->content); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('type_id')); ?>:
	<?php echo GxHtml::encode($data->type_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('state_id')); ?>:
	<?php echo GxHtml::encode($data->state_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('to_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->to)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('from_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->from)); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('image_file')); ?>:
	<?php echo GxHtml::encode($data->image_file); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('create_time')); ?>:
	<?php echo GxHtml::encode($data->create_time); ?>
	<br />
	*/ ?>

</div>