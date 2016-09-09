<?php

/**
 * This is the model base class for the table "{{enquiry}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Enquiry".
 *
 * Columns in table "{{enquiry}}" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $email
 * @property string $booking_date
 * @property string $booking_time
 * @property integer $party_size
 * @property integer $terms
 * @property integer $state_id
 * @property integer $type_id
 * @property string $create_time
 * @property string $update_time
 * @property integer $create_user_id
 *
 */
abstract class BaseEnquiry extends GxActiveRecord
    {

    public static function getStatusOptions($id = null)
        {
        $list = array("Draft", "Published", "Archive");
        if ($id == null) return $list;
        if (is_numeric($id)) return $list [$id];
        return $id;
        }

    public static function getTypeOptions($id = null)
        {
        $list = array("TYPE1", "TYPE2", "TYPE3");
        if ($id == null) return $list;
        if (is_numeric($id)) return $list [$id];
        return $id;
        }

    public function beforeValidate()
        {
        if ($this->isNewRecord)
            {
            if (!isset($this->create_time)) $this->create_time = date('Y-m-d H:i:s');
            if (!isset($this->create_user_id)) $this->create_user_id = Yii::app()->user->id;
            }else
            {
            
            }
        return parent::beforeValidate();
        }

    public static function model($className = __CLASS__)
        {
        return parent::model($className);
        }

    public function tableName()
        {
        return '{{enquiry}}';
        }

    public static function label($n = 1)
        {
        return Yii::t('app', 'Enquiry|Enquiries', $n);
        }

    public static function representingColumn()
        {
        return 'first_name';
        }

    public function rules()
        {
        return array(
            array('first_name, last_name, phone, email, booking_date, booking_time, party_size', 'required'),
            array('email', 'email'),
            array('party_size, terms, state_id, type_id, create_user_id', 'numerical', 'integerOnly' => true),
            array('first_name, last_name, phone, email', 'length', 'max' => 255),
            array('id, first_name, last_name, phone, email, booking_date, booking_time, party_size, terms, state_id, type_id, create_time, update_time, create_user_id', 'safe', 'on' => 'search'),
        );
        }

    public function relations()
        {
        return array(
        );
        }

    public function pivotModels()
        {
        return array(
        );
        }

    public function attributeLabels()
        {
        return array(
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'booking_date' => Yii::t('app', 'Booking Date'),
            'booking_time' => Yii::t('app', 'Booking Time'),
            'party_size' => Yii::t('app', 'Party Size'),
            'terms' => Yii::t('app', 'Terms'),
            'state_id' => Yii::t('app', 'State'),
            'type_id' => Yii::t('app', 'Type'),
            'create_time' => Yii::t('app', 'Create Time'),
            'update_time' => Yii::t('app', 'Update Time'),
            'create_user_id' => Yii::t('app', 'Create User'),
        );
        }

    public function search()
        {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('booking_date', $this->booking_date, true);
        $criteria->compare('booking_time', $this->booking_time, true);
        $criteria->compare('party_size', $this->party_size);
        $criteria->compare('terms', $this->terms);
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