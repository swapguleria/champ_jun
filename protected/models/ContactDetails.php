<?php

/**
 * Company: flamedevelopers < www.flamedevelopers.com>
 * Author : flamedevelopers < flamedevelopers.com >
 */
/**
 * @property integer $id
 * @property string $email
 * @property string $phone_no
 * @property string $facebook
 * @property string $twitter
 * @property string $google_plus
 * @property string $instagram
 * @property string $youtube
 * @property string $working_days
 * @property string $working_hours
 * @property string $address
 * @property string $city
 * @property string $country
 * @property integer $zip_code
 * @property string $type_id
 * @property string $state_id
 * @property integer $create_user_id
 * @property string $create_time
 */
Yii::import('application.models._base.BaseContactDetails');
class ContactDetails extends BaseContactDetails
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}