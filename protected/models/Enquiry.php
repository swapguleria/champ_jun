<?php

/**
 * Company: flamedevelopers < www.flamedevelopers.com>
 * Author : flamedevelopers < flamedevelopers.com >
 */
/**
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $email
 * @property string $booking_date
 * @property string $booking_time
 * @property integer $party_size
 * @property integer $terms
 * @property integer $state_id
 * @property integer $type_id
 * @property string $create_time
 * @property string $update_time
 * @property integer $create_user_id
 */
Yii::import('application.models._base.BaseEnquiry');
class Enquiry extends BaseEnquiry
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}