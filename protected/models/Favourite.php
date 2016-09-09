<?php


 
/**
 * @property integer $id
 * @property integer $job_id
 * @property integer $state_id
 * @property integer $type_id
 * @property integer $create_user_id
 * @property string $create_time
 */
Yii::import('application.models._base.BaseFavourite');
class Favourite extends BaseFavourite
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}