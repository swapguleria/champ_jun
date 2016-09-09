<?php

/**
 * Company: flamedevelopers < www.flamedevelopers.com>
 * Author : flamedevelopers < flamedevelopers.com >
 */
/**
 * @property integer $id
 * @property string $date
 * @property string $time
 * @property integer $party_size
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property integer $phone_no
 * @property string $special_request
 * @property string $email_subscription
 * @property integer $state_id
 * @property integer $type_id
 * @property string $create_time
 * @property string $update_time
 * @property integer $create_user_id
 */
Yii::import('application.models._base.BaseBookTable');
class BookTable extends BaseBookTable
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}