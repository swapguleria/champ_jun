
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::encode($data->id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tab_1_title')); ?>:
	<?php echo GxHtml::encode($data->tab_1_title); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tab_2_title')); ?>:
	<?php echo GxHtml::encode($data->tab_2_title); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tab_1_image')); ?>:
	<?php echo GxHtml::encode($data->tab_1_image); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tab_2_image')); ?>:
	<?php echo GxHtml::encode($data->tab_2_image); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tab_1_desc')); ?>:
	<?php echo GxHtml::encode($data->tab_1_desc); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('tab_2_desc')); ?>:
	<?php echo GxHtml::encode($data->tab_2_desc); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('button_2_text')); ?>:
	<?php echo GxHtml::encode($data->button_2_text); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('button_1_text')); ?>:
	<?php echo GxHtml::encode($data->button_1_text); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('image_right')); ?>:
	<?php echo GxHtml::encode($data->image_right); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('image_left')); ?>:
	<?php echo GxHtml::encode($data->image_left); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('subscribe')); ?>:
	<?php echo GxHtml::encode($data->subscribe); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('img_tr')); ?>:
	<?php echo GxHtml::encode($data->img_tr); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('title_tr')); ?>:
	<?php echo GxHtml::encode($data->title_tr); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tag_line_tr')); ?>:
	<?php echo GxHtml::encode($data->tag_line_tr); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('map_title_tr')); ?>:
	<?php echo GxHtml::encode($data->map_title_tr); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('map_content_tr')); ?>:
	<?php echo GxHtml::encode($data->map_content_tr); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('page_title_tr')); ?>:
	<?php echo GxHtml::encode($data->page_title_tr); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('page_tag_line_tr')); ?>:
	<?php echo GxHtml::encode($data->page_tag_line_tr); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('desc_tr')); ?>:
	<?php echo GxHtml::encode($data->desc_tr); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('description')); ?>:
	<?php echo GxHtml::encode($data->description); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cnf_descp')); ?>:
	<?php echo GxHtml::encode($data->cnf_descp); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cnf_checkbox_text')); ?>:
	<?php echo GxHtml::encode($data->cnf_checkbox_text); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cnf_btn_text')); ?>:
	<?php echo GxHtml::encode($data->cnf_btn_text); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('thankyou_title')); ?>:
	<?php echo GxHtml::encode($data->thankyou_title); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('thankyou_tagline')); ?>:
	<?php echo GxHtml::encode($data->thankyou_tagline); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('thankyou_descp')); ?>:
	<?php echo GxHtml::encode($data->thankyou_descp); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('thankyou_cancel_button')); ?>:
	<?php echo GxHtml::encode($data->thankyou_cancel_button); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cancel_title')); ?>:
	<?php echo GxHtml::encode($data->cancel_title); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cancel_tagline')); ?>:
	<?php echo GxHtml::encode($data->cancel_tagline); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cancel_descp')); ?>:
	<?php echo GxHtml::encode($data->cancel_descp); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('extra_text_1')); ?>:
	<?php echo GxHtml::encode($data->extra_text_1); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('extra_text_2')); ?>:
	<?php echo GxHtml::encode($data->extra_text_2); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('extra_text_3')); ?>:
	<?php echo GxHtml::encode($data->extra_text_3); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('extra_textarea_1')); ?>:
	<?php echo GxHtml::encode($data->extra_textarea_1); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('extra_textarea_2')); ?>:
	<?php echo GxHtml::encode($data->extra_textarea_2); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('extra_textarea_3')); ?>:
	<?php echo GxHtml::encode($data->extra_textarea_3); ?>
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