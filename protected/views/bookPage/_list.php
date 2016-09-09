
<?php $this->widget('booster.widgets.TbGridView', array(
'id' => 'book-page-grid',
'type'=>'bordered condensed striped',
'selectionChanged'=>"function(id){window.location='" . Yii::app()->createAbsoluteUrl('bookPage/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
'dataProvider' => $dataProvider,
'columns' => array(
		'id',
		'tab_1_title',
		'tab_2_title',
		'tab_1_image',
		'tab_2_image',
		'tab_1_desc:html',
		/*
		'tab_2_desc:html',
		'button_2_text',
		'button_1_text',
		'image_right',
		'image_left',
		'subscribe',
		'img_tr',
		'title_tr',
		'tag_line_tr',
		'map_title_tr',
		'map_content_tr:html',
		'page_title_tr',
		'page_tag_line_tr',
		'desc_tr',
		'cnf_descp',
		'cnf_checkbox_text',
		'cnf_btn_text',
		'thankyou_title',
		'thankyou_tagline',
		'thankyou_descp',
		'thankyou_cancel_button',
		'cancel_title',
		'cancel_tagline',
		'cancel_descp',
		'extra_text_1',
		'extra_text_2',
		'extra_text_3',
		'extra_textarea_1',
		'extra_textarea_2',
		'extra_textarea_3',
		array(
				'name' => 'state_id',
				'value'=>'$data->getStatusOptions($data->state_id)',
				'filter'=>BookPage::getStatusOptions(),
				),
		array(
				'name' => 'type_id',
				'value'=>'$data->getTypeOptions($data->type_id)',
				'filter'=>BookPage::getTypeOptions(),
				),
		'update_time:datetime',
		*/
array(
'header' => '<a>Actions</a>',
'class' => 'booster.widgets.TbButtonColumn',
'htmlOptions' => array(
'nowrap' => 'nowrap'
)
)
),
)); ?>