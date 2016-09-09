<?php

 
/**
 * This is the model base class for the table "{{testimonial}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Testimonial".
 *
 * Columns in table "{{testimonial}}" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $title
 * @property string $sub_title
 * @property string $description
 * @property string $created_by
 * @property string $image
 * @property integer $state_id
 * @property integer $type_id
 * @property string $create_time
 * @property string $update_time
 * @property integer $create_user_id
 *
 */
abstract class BaseTestimonial extends GxActiveRecord {

	
	public static function getStatusOptions($id = null)
	{
		$list = array("Draft","Published","Archive");
		if ($id == null )	return $list;
		if ( is_numeric( $id )) return $list [ $id ];
		return $id;
	}	
	public static function getTypeOptions($id = null)
	{
		$list = array("TYPE1","TYPE2","TYPE3");
		if ($id == null )	return $list;
		if ( is_numeric( $id )) return $list [ $id ];
		return $id;
	}
 	public function beforeValidate()
	{
		if($this->isNewRecord)
		{
			if ( !isset( $this->create_time )) $this->create_time = date( 'Y-m-d H:i:s');
				if ( !isset( $this->create_user_id )) $this->create_user_id = Yii::app()->user->id;			
	}else{
					}
		return parent::beforeValidate();
	}

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{testimonial}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Testimonial|Testimonials', $n);
	}

	public static function representingColumn() {
		return 'title';
	}

	public function rules() {
		return array(
			array('title, sub_title, description, created_by, image, create_time, create_user_id', 'required'),
			array('state_id, type_id, create_user_id', 'numerical', 'integerOnly'=>true),
			array('title, sub_title, created_by, image', 'length', 'max'=>255),
			array('id, title, sub_title, description, created_by, image, state_id, type_id, create_time, update_time, create_user_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'title' => Yii::t('app', 'Title'),
			'sub_title' => Yii::t('app', 'Sub Title'),
			'description' => Yii::t('app', 'Description'),
			'created_by' => Yii::t('app', 'Created By'),
			'image' => Yii::t('app', 'Image'),
			'state_id' => Yii::t('app', 'State'),
			'type_id' => Yii::t('app', 'Type'),
			'create_time' => Yii::t('app', 'Create Time'),
			'update_time' => Yii::t('app', 'Update Time'),
			'create_user_id' => Yii::t('app', 'Create User'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('title', $this->title, true);
		$criteria->compare('sub_title', $this->sub_title, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('created_by', $this->created_by, true);
		$criteria->compare('image', $this->image, true);
		$criteria->compare('state_id', $this->state_id);
		$criteria->compare('type_id', $this->type_id);
		$criteria->compare('create_time', $this->create_time, true);
		$criteria->compare('update_time', $this->update_time, true);
		$criteria->compare('create_user_id', $this->create_user_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}