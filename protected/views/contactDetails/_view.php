
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::encode($data->id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('email')); ?>:
	<?php echo GxHtml::encode($data->email); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('phone_no')); ?>:
	<?php echo GxHtml::encode($data->phone_no); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('facebook')); ?>:
	<?php echo GxHtml::encode($data->facebook); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('twitter')); ?>:
	<?php echo GxHtml::encode($data->twitter); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('google_plus')); ?>:
	<?php echo GxHtml::encode($data->google_plus); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('instagram')); ?>:
	<?php echo GxHtml::encode($data->instagram); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('youtube')); ?>:
	<?php echo GxHtml::encode($data->youtube); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('working_days')); ?>:
	<?php echo GxHtml::encode($data->working_days); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('working_hours')); ?>:
	<?php echo GxHtml::encode($data->working_hours); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('address')); ?>:
	<?php echo GxHtml::encode($data->address); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('city')); ?>:
	<?php echo GxHtml::encode($data->city); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('country')); ?>:
	<?php echo GxHtml::encode($data->country); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('zip_code')); ?>:
	<?php echo GxHtml::encode($data->zip_code); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('type_id')); ?>:
	<?php echo GxHtml::encode($data->type_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('state_id')); ?>:
	<?php echo GxHtml::encode($data->state_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('create_user_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->createUser)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('create_time')); ?>:
	<?php echo GxHtml::encode($data->create_time); ?>
	<br />
	*/ ?>

</div>