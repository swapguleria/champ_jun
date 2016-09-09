<?php

/**
 * Company: flamedevelopers < www.flamedevelopers.com>
 * Author : flamedevelopers < flamedevelopers.com >
 */
/**
 * @property integer $id
 * @property integer $meal_id
 * @property string $title
 * @property string $sub_title
 * @property integer $price
 * @property string $image
 * @property string $background_image
 * @property string $description
 * @property integer $state_id
 * @property integer $type_id
 * @property integer $create_user_id
 * @property string $create_time
 * @property string $update_time
 */
Yii::import('application.models._base.BaseMealItem');
class MealItem extends BaseMealItem
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}