<?php

 
/**
 * @property integer $id
 * @property string $title
 * @property integer $page_id
 * @property integer $state_id
 * @property integer $type_id
 * @property string $create_time
 * @property string $update_time
 * @property integer $create_user_id
 */
Yii::import('application.models._base.BaseMenu');
class Menu extends BaseMenu
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}