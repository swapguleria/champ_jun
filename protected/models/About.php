<?php

/**
 * Company: flamedevelopers < www.flamedevelopers.com>
 * Author : flamedevelopers < flamedevelopers.com >
 */
/**
 * @property integer $id
 * @property string $tab_1_title
 * @property string $tab_1_sub_title
 * @property string $tab_1_image
 * @property string $tab_2_title
 * @property string $tab_2_sub_title
 * @property string $tab_2_description
 * @property string $tab_2_image
 * @property string $box_1_image_logo
 * @property string $box_1_title
 * @property string $box_1_description
 * @property string $box_2_image_logo
 * @property string $box_2_title
 * @property string $box_2_description
 * @property string $box_3_image_logo
 * @property string $box_3_title
 * @property string $box_3_description
 * @property string $tab_4_title
 * @property string $tab_4_sub_title
 * @property integer $state_id
 * @property integer $type_id
 * @property string $create_time
 * @property string $update_time
 * @property integer $create_user_id
 */
Yii::import('application.models._base.BaseAbout');
class About extends BaseAbout
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}