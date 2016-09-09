<?php

/**
 * Company: flamedevelopers < www.flamedevelopers.com>
 * Author : flamedevelopers < flamedevelopers.com >
 */
/**
 * @property integer $id
 * @property string $title
 * @property string $sub_title
 * @property string $description
 * @property string $days
 * @property string $timings
 * @property string $image
 * @property string $background_image
 * @property integer $state_id
 * @property integer $type_id
 * @property integer $create_user_id
 * @property string $create_time
 * @property string $update_time
 */
Yii::import('application.models._base.BaseMeal');

class Meal extends BaseMeal
    {

    public static function model($className = __CLASS__)
        {
        return parent::model($className);
        }

    public function getImage()
        {
        if (!empty($this->image))
            {
            $image = $this->image;
            return Yii::app()->createAbsoluteUrl('user/thumbnail', array(
                        'file' => $image
            ));
            }
        return Yii::app()->theme->baseUrl . '/images/user.jpg';
        }

    public function getImageBackground()
        {
        if (!empty($this->background_image))
            {
            $image = $this->background_image;
            return Yii::app()->createAbsoluteUrl('user/thumbnail', array(
                        'file' => $image
            ));
            }
        return Yii::app()->theme->baseUrl . '/images/user.jpg';
        }

    }
