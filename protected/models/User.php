<?php

/**
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $phone_no
 * @property string $language
 * @property string $nationality
 * @property string $date_of_birth
 * @property integer $work_in_abroad
 * @property integer $salary
 * @property integer $martial_status
 * @property string $employment
 * @property double $experience
 * @property string $religion
 * @property string $address
 * @property string $city
 * @property string $country
 * @property integer $zip_code
 * @property integer $currency_type
 * @property string $timezone
 * @property string $about_me
 * @property string $image_file
 * @property string $lat
 * @property string $long
 * @property integer $tos
 * @property integer $role_id
 * @property integer $state_id
 * @property string $last_visit_time
 * @property string $activation_key
 * @property integer $login_error_count
 * @property integer $employer_id
 * @property integer $create_user_id
 * @property string $create_time
 */
Yii::import('application.models._base.BaseUser');

class User extends BaseUser
    {

    public static function model($className = __CLASS__)
        {
        return parent::model($className);
        }

    private static $password_expiration_day = 90;
    protected static $salt1 = "";
    protected static $hashFunc = 'md5';
    public $password_2;

    public function sendJoinedMail($user, $view, $sub)
        {
        if ($user) $toemail = $user->email;
        Yii::import('ext-prod.yii-mail.YiiMailMessage');
        $message = new YiiMailMessage ();
        $message->view = $view;
        $message->setSubject($sub);
        // userModel is passed to the view
        $message->setBody(array(
            'model' => $this,
            'user' => $user
                ), 'text/html');
        $message->addTo($toemail);
        $message->from = Yii::app()->params ['adminEmail'];
        return self::sendEmailLoadShared($message);
        }

    public function sendInstantUserEmail($model)
        {
        Yii::import('ext-prod.yii-mail.YiiMailMessage');
        $message = new YiiMailMessage ();
        $message->view = "verify_email";
        $message->Subject = "Email Verification";
        $message->setBody(array(
            'model' => $model
                ), 'text/html');
        $message->addTo($model->email);
        $message->from = Yii::app()->params ['adminEmail'];

        $ret = self::sendEmailLoadShared($message);
        if (!$ret) return false;
        return $ret;
        }

    public function generateActivationKey1($activate = false)
        {
        $this->activation_key = $activate ? User::encrypt(microtime()) : User::encrypt(microtime() . $this->password);
        $this->setAttributes(array(
            'activation_key'
        ));
        return $this->activation_key;
        }

    public function getActivationUrl1($mode = 'recover')
        {
        // $this->autoLogin();
        $this->generateActivationKey1();
        return Yii::app()->createAbsoluteUrl('user/activate', array(
                    'id' => $this->id,
                    'key' => $this->activation_key,
                    'mode' => $mode
        ));
        }

    public static function sendEmailLoadShared($message, $use_id = 1)
        {
        if (YII_DEBUG && YII_ENV == 'dev')
            {
            $message->body . PHP_EOL . '<br/>';
            return true;
            }
        try
            {
            Yii::app()->mail->send($message);
            }
        catch (Exception $e)
            {

            return false;
            }
        return true;
        }

    public function autoLogin()
        {
        $user = $this;
        $identity = new UserIdentity($user, $user);
        $identity->authenticateReg($user);

        switch ($identity->errorCode)
            {
            case UserIdentity::ERROR_NONE :
                $duration = 3600 * 24 * 30; // 30 days
                Yii::app()->user->login($identity, $duration);
                return true;
                break;
            case UserIdentity::ERROR_STATUS_USER_DOES_NOT_EXIST :
                $user->addError('status', Yii::t('app', 'User doesnt exists.'));
                break;
            }
        return false;
        }

    public static function getUserByEmail($name)
        {
        if ($name == null) return null;
        $user_e = User::model()->findByAttributes(array(
            'email' => $name
        ));

        return $user_e;
        }

    public function setPassword($password)
        {
        if ($password != '')
            {

            $this->password = User::encrypt($password);
            return $this->save(false, 'password');
            }
        return false;
        }

    public function toArray($id = null, $session_id = null)
        {

        $user = $this;
        $json_entry = array();
        if ($session_id != null) $json_entry ['session_id'] = $session_id;
        $json_entry ["id"] = $user->id;
        $json_entry ['full_name'] = isset($user->first_name) ? $user->first_name : "";
        $json_entry ['email'] = isset($user->email) ? $user->email : "";
        //$json_entry ['nationality'] = isset ( $user->nationality ) ? $user->nationality : "";
        $json_entry ['date_of_birth'] = isset($user->date_of_birth) ? $user->date_of_birth : "";
        $json_entry ['phone_no'] = isset($user->phone_no) ? $user->phone_no : "";
        $json_entry ['city'] = isset($user->city) ? $user->city : "";
        $json_entry ['lat'] = isset($user->lat) ? $user->lat : "";
        $json_entry ['long'] = isset($user->long) ? $user->long : "";
        $json_entry ['language'] = isset($user->language) ? $user->language : "";
        $criteria = new CDbCriteria ();
        $criteria->compare('create_user_id', $user->id);


        $to = Yii::app()->user->id;
        $from = $this->id;
        $session_id = $to > $from ? $from . '-' . $to : $to . '-' . $from;
        $criteria5 = new CDbCriteria ();
        $criteria5->compare('session_id', $session_id);
        $criteria5->compare('`read`', '0');
        $messages = Message::model()->count($criteria5);




        $json_entry ['is_new_messages'] = $messages >= 1 ? '1' : '0';
        $json_entry ['is_subscribed'] = '0';


        $criteria6 = new CDbCriteria ();
        $criteria6->compare('session_id', $session_id);
        $allmessages = Message::model()->findAll($criteria6);
        if ($allmessages) foreach ($allmessages as $message)
                {
                $to = $message->to_id;
                if ($to != Yii::app()->user->id) $json_entry ['is_new_messages'] = '0';
                }



        // $criteria->compare ( 'is_expired', SubscriptionPlans::STATUS_ACTIVE );
        $user_plans = UserPlan::model()->find($criteria);
        if ($user_plans)
            {
            //$json_entry ['is_expired'] = $user_plans->is_expired;
            $json_entry ['is_subscribed'] = '1';
            $json_entry ['amount'] = $user_plans->amount;
            //$json_entry ['start_time'] = $user_plans->start_time;
            //$json_entry ['end_time'] = $user_plans->end_time;
            //$json_entry ['validity'] = $user_plans->validity;
            //$current_date = strtotime(date('Y-m-d H:i:s'));
            //$end_time = $user_plans->end_time;
            ////$end_time = '2015-08-22 00:00:00';
            //$end_time = strtotime($end_time);
            //  $datediff = $end_time - $current_date;
            ///$daysleft =  floor($datediff/(60*60*24));
            // print_R($res); exit;
            //if($end_time > $current_date)
            //{
            //$json_entry ['days'] = $daysleft;
            //}
            //else 
            //{
            //$json_entry ['days'] = '0';
            //}
            /* if ($user_plans->validity == 1) {
              $json_entry ['days'] = '30';
              }

              elseif ($user_plans->validity == 2) {
              $json_entry ['days'] = '60';
              } elseif ($user_plans->validity == 3) {
              $json_entry ['days'] = '90';
              } elseif ($user_plans->validity == 0) {
              $json_entry ['days'] = '5';
              } elseif ($user_plans->validity == 12) {
              $json_entry ['days'] = '365';
              } */

            $json_entry ['amount'] = $user_plans->amount;
            $json_entry ['start_time'] = $user_plans->start_time;
            //$json_entry ['plan_id'] = $user_plans->plan->title;
            //$json_entry ['search_hits'] = $user_plans->search_hits;
            }
        return $json_entry;
        }

    public static function validate_password($password_under_test, $password_real)
        {
        return (User::encrypt($password_under_test) === $password_real);
        }

    public function logout()
        {
        if (!Yii::app()->user->isGuest)
            {
            $this->last_action_time = date("Y-m-d H:i:s");
            $this->saveAttributes(array(
                'last_action_time'
            ));
            }
        }

    public function updateLastVisit()
        {
        if (!Yii::app()->user->isGuest)
            {
            $this->last_visit_time = date("Y-m-d H:i:s"); // date( 'Y-m-d H:i:s');
            $this->saveAttributes(array(
                'last_visit_time'
            ));
            }
        }

    // getIsAdmin
    public function getIsAdmin()
        {
        if ($this->role_id == self::ROLE_ADMIN) return true;
        return false;
        }

    // getIsUser
    public function getIsUser()
        {
        if ($this->role_id == self::ROLE_USER) return true;
        return false;
        }

    public function generateActivationKey($activate = false)
        {
        $this->activation_key = $activate ? User::encrypt(microtime()) : User::encrypt(microtime() . $this->password);
        $this->saveAttributes(array(
            'activation_key'
        ));
        return $this->activation_key;
        }

    public function getActivationUrl($mode = 'login')
        {
        $this->generateActivationKey();
        return Yii::app()->createAbsoluteUrl('user/activate', array(
                    'id' => $this->id,
                    'key' => $this->activation_key,
                    'mode' => $mode
        ));
        }

    public function getRecoverUrl()
        {
        $this->generateActivationKey();
        return Yii::app()->createAbsoluteUrl('user/setPassword', array(
                    'id' => $this->id,
                    'key' => $this->activation_key
        ));
        }

    public static function checkPlanExist()
        {
        $id = Yii::app()->user->id;

        $currentPlan = UserPlan::model()->findByAttributes(array('create_user_id' => Yii::app()->user->id));

        if ($currentPlan) if ($currentPlan->plan_id == 8)
                {

                $current_date = date('Y-m-d H:i:s');
                $end_date = $currentPlan->end_time;
                //echo $current_date; 
                //echo $end_date; exit;
                if ($current_date > $end_date)
                    {

                    $currentPlan->is_expired = 1;

                    $currentPlan->save();
                    }
                }

        $criteria = new CDbCriteria ();
        $variable = 0;
        $id = Yii::app()->user->id;
        $criteria->compare('is_expired', SubscriptionPlans::STATUS_DRAFT);
        $criteria->compare('create_user_id', $id);
        $criteria->addCondition('search_hits > ' . $variable);
        $active = UserPlan::model()->find($criteria);

        if ($active)
            {
            return $active;
            }
        else
            {

            $criteria = new CDbCriteria ();
            $id = Yii::app()->user->id;
            $criteria->compare('is_expired', SubscriptionPlans::STATUS_ACTIVE);
            $criteria->compare('create_user_id', $id);
            $active = UserPlan::model()->find($criteria);
            return $active;
            }
        }

    public static function checkPlan()
        {
        $variable = 0;
        $id = Yii::app()->user->id;
        $critera = new CDbCriteria ();
        $critera->compare('create_user_id', $id);
        $critera->addCondition('search_hits > ' . $variable);
        $active = UserPlan::model()->find($critera);

        if ($active)
            {
            return $active;
            }
        }

    public function activate($email, $key, $mode)
        {
        if ($mode == 'login')
            {
            if ($this->email == $email)
                {

                if ($this->state_id != self::STATUS_ACTIVE) return - 1;

                if ($this->activation_key == $key)
                    {
                    // $this->role_id = self::ROLE_USER;
                    // $this->email_verified = self::Email_VERIFIED;
                    // if ($this->saveAttributes ( array (
                    // 'email_verified'
                    // ) )) {

                    return 1;
                    // }
                    }
                else return - 2;
                }
            return false;
            } else
            {
            if ($this->email == $email)
                {

                if ($this->state_id == self::STATUS_ACTIVE) return - 1;

                $this->state_id = self::STATUS_ACTIVE;
                $this->saveAttributes(array(
                    'state_id'
                ));
                return 1;
                }
            return false;
            }
        }

    public static function randomPassword($count = 8)
        {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $alphabet = "abcdefghijklmnopqrstuwxyz0123456789";
        $pass = array(); // remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; // put the length -1 in cache
        for ($i = 0; $i < $count; $i ++)
            {
            $n = rand(0, $alphaLength);
            $pass [] = $alphabet [$n];
            }
        return implode($pass);
        ; // turn the array into a string
        }

    public static function encrypt($string = "")
        {
        $salt = self::$salt1;
        $hashFunc = self::$hashFunc;
        $string = sprintf("%s%s%s", $salt, $string, $salt);

        if (!function_exists($hashFunc)) throw new CException('Function `' . $hashFunc . '` is not a valid callback for hashing algorithm.');

        return $hashFunc($string);
        }

    public function getImage()
        {
        if (!empty($this->image_file))
            {
            $image = $this->image_file;
            // echo $image ;
            return Yii::app()->createAbsoluteUrl('user/thumbnail', array(
                        'file' => $image
            ));
            }
        return Yii::app()->theme->baseUrl . '/images/user.jpg';
        }

    public function getImageHtml()
        {
        return CHtml::image($this->getImage(), 'image', array(
                    'class' => 'icon-image',
                    'width' => '80px'
        ));
        }

    protected function beforeDelete()
        {

        // $model= $this->loadModel($id,'User');
        // $model->state_id=User::STATE_INACTIVE;
        // $model->save();
        Comment::model()->deleteAllByAttributes(array(
            'create_user_id' => $this->id
        ));
        Favourite::model()->deleteAllByAttributes(array(
            'create_user_id' => $this->id
        ));
//		Message::model ()->deleteAllByAttributes ( array (
//				'to_id' => $this->id 
//		) );
//		Message::model ()->deleteAllByAttributes ( array (
//				'from_id' => $this->id 
//		) );
        AuthSession::model()->deleteAllByAttributes(array(
            'create_user_id' => $this->id
        ));

//		UserPlan::model ()->deleteAllByAttributes ( array (
//				'create_user_id' => $this->id 
//		) );
        $criteria = new CDbCriteria ();
        $criteria->compare('create_user_id ', $this->id);

//		$results = Job::model ()->findAll ( $criteria );
//		foreach ( $results as $result ) {
//			Favourite::model ()->deleteAllByAttributes ( array (
//					'job_id' => $result->id 
//			) );
//		}
        // Favourite::model ()->deleteAllByAttributes ( array (
        // 'create_user_id' => $this->id
        // ) );
//		Job::model ()->deleteAllByAttributes ( array (
//				'create_user_id' => $this->id 
//		) );

        return parent::beforeDelete();
        }

    }
