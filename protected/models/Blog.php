<?php

/**
 * Author :Karan Singh Guleriya < swap.guleriya@gmail.com >
 */
/**
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $thumbnail_file
 * @property integer $state_id
 * @property integer $type_id
 * @property string $create_time
 * @property string $update_time
 * @property integer $create_user_id
 */
Yii::import('application.models._base.BaseBlog');
class Blog extends BaseBlog
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}