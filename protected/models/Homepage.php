<?php

/**
 * Company: flamedevelopers < www.flamedevelopers.com>
 * Author : flamedevelopers < flamedevelopers.com >
 */
/**
 * @property integer $id
 * @property string $tab_1_title
 * @property string $tab_1_sub_title
 * @property string $tab_1_description
 * @property string $tab_1_image
 * @property string $box_1_title
 * @property string $box_1_description
 * @property string $box_1_button_text
 * @property string $box_1_link
 * @property string $box_1_background
 * @property string $box_2_title
 * @property string $box_2_description
 * @property string $box_2_button_text
 * @property string $box_2_link
 * @property string $box_2_background
 * @property string $tab_2_title
 * @property string $tab_2_text
 * @property string $tab_2_link
 * @property string $tab_2_button_text
 * @property string $tab_2_background
 * @property string $tab_3_title_1
 * @property string $tab_3_sub_title_1
 * @property string $tab_3_description
 * @property string $tab_3_title_2
 * @property string $tab_3_sub_title_2
 * @property string $tab_3_background
 * @property integer $state_id
 * @property integer $type_id
 * @property string $create_time
 * @property string $update_time
 * @property integer $create_user_id
 */
Yii::import('application.models._base.BaseHomepage');

class Homepage extends BaseHomepage
    {

    public static function model($className = __CLASS__)
        {
        return parent::model($className);
        }

    public function gettab1()
        {
        if (!empty($this->tab_1_image))
            {
            $image = $this->tab_1_image;
            return Yii::app()->createAbsoluteUrl('user/thumbnail', array(
                        'file' => $image
            ));
            }
        return Yii::app()->theme->baseUrl . '/images/user.jpg';
        }

    public function gettab2()
        {
        if (!empty($this->tab_2_background))
            {
            $image = $this->tab_2_background;
            return Yii::app()->createAbsoluteUrl('user/thumbnail', array(
                        'file' => $image
            ));
            }
        return Yii::app()->theme->baseUrl . '/images/user.jpg';
        }

    public function gettab3()
        {
        if (!empty($this->tab_3_background))
            {
            $image = $this->tab_3_background;
            return Yii::app()->createAbsoluteUrl('user/thumbnail', array(
                        'file' => $image
            ));
            }
        return Yii::app()->theme->baseUrl . '/images/user.jpg';
        }

    }
