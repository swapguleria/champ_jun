<?php

/**
 * @property integer $id
 * @property integer $model_id
 * @property string $model_type
 * @property string $comment
 * @property double $rate
 * @property integer $state_id
 * @property string $create_time
 * @property integer $create_user_id
 */
Yii::import('application.models._base.BaseComment');
class Comment extends BaseComment
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}