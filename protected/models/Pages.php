<?php

/**
 * Company: flamedevelopers < www.flamedevelopers.com>
 * Author : flamedevelopers < flamedevelopers.com >
 */
/**
 * @property integer $id
 * @property string $name
 * @property string $controller
 * @property string $action
 * @property integer $state_id
 * @property integer $type_id
 * @property string $create_time
 * @property string $update_time
 * @property integer $create_page_id
 */
Yii::import('application.models._base.BasePages');
class Pages extends BasePages
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}