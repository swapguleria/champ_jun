
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::encode($data->id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('first_name')); ?>:
	<?php echo GxHtml::encode($data->first_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('last_name')); ?>:
	<?php echo GxHtml::encode($data->last_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('phone')); ?>:
	<?php echo GxHtml::encode($data->phone); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('email')); ?>:
	<?php echo GxHtml::encode($data->email); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('booking_date')); ?>:
	<?php echo GxHtml::encode($data->booking_date); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('booking_time')); ?>:
	<?php echo GxHtml::encode($data->booking_time); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('party_size')); ?>:
	<?php echo GxHtml::encode($data->party_size); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('terms')); ?>:
	<?php echo GxHtml::encode($data->terms); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('state_id')); ?>:
	<?php echo GxHtml::encode($data->state_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('type_id')); ?>:
	<?php echo GxHtml::encode($data->type_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('create_time')); ?>:
	<?php echo GxHtml::encode($data->create_time); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('update_time')); ?>:
	<?php echo GxHtml::encode($data->update_time); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('create_user_id')); ?>:
	<?php echo GxHtml::encode($data->create_user_id); ?>
	<br />
	*/ ?>

</div>