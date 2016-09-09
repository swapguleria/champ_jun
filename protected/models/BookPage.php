<?php

/**
 * Company: flamedevelopers < www.flamedevelopers.com>
 * Author : flamedevelopers < flamedevelopers.com >
 */
/**
 * @property integer $id
 * @property string $tab_1_title
 * @property string $tab_2_title
 * @property string $tab_1_image
 * @property string $tab_2_image
 * @property string $tab_1_desc
 * @property string $tab_2_desc
 * @property string $button_2_text
 * @property string $button_1_text
 * @property string $image_right
 * @property string $image_left
 * @property string $subscribe
 * @property string $img_tr
 * @property string $title_tr
 * @property string $tag_line_tr
 * @property string $map_title_tr
 * @property string $map_content_tr
 * @property string $page_title_tr
 * @property string $page_tag_line_tr
 * @property string $desc_tr
 * @property string $description
 * @property string $cnf_descp
 * @property string $cnf_checkbox_text
 * @property string $cnf_btn_text
 * @property string $thankyou_title
 * @property string $thankyou_tagline
 * @property string $thankyou_descp
 * @property string $thankyou_cancel_button
 * @property string $cancel_title
 * @property string $cancel_tagline
 * @property string $cancel_descp
 * @property integer $extra_text_1
 * @property integer $extra_text_2
 * @property integer $extra_text_3
 * @property string $extra_textarea_1
 * @property string $extra_textarea_2
 * @property string $extra_textarea_3
 * @property integer $state_id
 * @property integer $type_id
 * @property string $create_time
 * @property string $update_time
 * @property integer $create_user_id
 */
Yii::import('application.models._base.BaseBookPage');
class BookPage extends BaseBookPage
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}