<?php
/**
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $state_id
 * @property integer $type_id
 * @property string $create_time
 * @property string $update_time
 * @property integer $create_user_id
 */
Yii::import('application.models._base.BasePage');
class Page extends BasePage
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
  
	public static function getHeader()
	{
		$menus = array();
		$criteria = new CDbCriteria();
		$criteria->compare('type_id',Menu::TYPE_HEADER);
		$menus = Menu::model()->findAll($criteria);
		
		return $menus;
	}
	public static function getFooter()
	{
		$menus = array();
		$criteria = new CDbCriteria();
		$criteria->compare('type_id',Menu::TYPE_FOOTER);
		$menus = Menu::model()->findAll($criteria);
	
		return $menus;
	}
	
}