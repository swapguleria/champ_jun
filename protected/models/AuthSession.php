<?php

/**
 * Author :Karan Singh Guleriya < swap.guleriya@gmail.com >
 */

/**
 * @property integer $id
 * @property string $auth_code
 * @property string $device_token
 * @property integer $type_id
 * @property integer $create_user_id
 * @property string $create_time
 * @property string $update_time
 */
Yii::import('application.models._base.BaseAuthSession');
class AuthSession extends BaseAuthSession
{

	private static $session_expiration_days = 90;

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function scopes()
	{
		return array(
				'old' => array('condition'=> 'update_time < \''.date('Y-m-d H:i:s', strtotime('-90 day')) .'\''),
		);
	}


	public static function randomCode($count = 32) {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < $count; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass);; //turn the array into a string
	}
	public static function newSession($model)
	{
		self::deleteSession($model);
		self::deleteUserSession();
		self::deleteOldSession();
		$auth_session = new AuthSession();
		$auth_session->auth_code = self::randomCode();
		$auth_session->device_token = $model->device_token;
		$auth_session->device_id = $model->device_id;
		$auth_session->type_id = $model->device_type;
		$auth_session->save();

		return $auth_session;

	}
	public static function deleteSession($model)
	{
		$auth_sessions = AuthSession::model()->findAllbyAttributes( array ( 'device_id' => $model->device_id));
		foreach ( $auth_sessions as $session)
			$session->delete();
	}
	public static function deleteUserSession()
	{
		$auth_sessions = AuthSession::model()->findAllbyAttributes( array ( 'create_user_id' => Yii::app()->user->id));
		foreach ( $auth_sessions as $session)
			$session->delete();
	}
	public static function deleteOldSession()
	{
		$old = AuthSession::model()->old()->findAll();
		foreach ( $old as $session)
		$session->delete();
	}
	public static function logout()
	{
		if ( Yii::app()->user->isGuest ) return;
		$old = Yii::app()->user->model->authSessions;

		foreach ( $old as $session){
			$session->delete();
		}
		return true;
	}
	public static function getHead(){
		if (!function_exists('getallheaders'))
		{
			function getallheaders()
			{
				$headers = '';
				foreach ($_SERVER as $name => $value)
				{
					if (substr($name, 0, 5) == 'HTTP_')
					{
						$headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
					}
				}
				return $headers;
			}
		}
		return getallheaders();

	}
	public static function authenticateSession($auth_code = null)
	{
		if ( !Yii::app()->user->isGuest ) return;
		if ( $auth_code == null)
		{
			$headers = getallheaders();
			$auth_code = isset($headers['auth_code']) ? $headers['auth_code'] : null;
			if ( $auth_code == null )
			{
					
			 $auth_code = Yii::app()->request->getQuery('auth_code');
			 Yii::log(CVarDumper::dumpAsString('auth_code_query  :'.$auth_code),CLogger::LEVEL_WARNING);
			}
			if (  $auth_code == null ) return;

		}
		$arr = array('controller'=>"Authenticate", 'action'=>'auth_code','status' =>'NOK');
		$auth_session = AuthSession::model()->findbyAttributes( array ( 'auth_code'=>$auth_code));
		if ($auth_session)
		{
			$user = $auth_session->createUser;
			$identity = new UserIdentity($user, $user);
			$identity->authenticateSession($user);
			switch($identity->errorCode) {
				case UserIdentity::ERROR_NONE:
					$duration = 3600*24*90; // 30 days
					Yii::app()->user->login($identity,$duration);
					$auth_session->save(); // update time is changed here
					return true;
					break;
				case UserIdentity::ERROR_STATUS_USER_DOES_NOT_EXIST:
					Yii::log(CVarDumper::dumpAsString('error :'.$identity->errorCode),CLogger::LEVEL_WARNING);
					$arr['error'] = "ERROR_STATUS_USER_DOES_NOT_EXIST";
					break;
			}
		}
		$header_data = $headers;
		Yii::log(CVarDumper::dumpAsString($header_data), CLogger::LEVEL_WARNING);
		$arr['error'] = "auth_session:" .$auth_session  . "  auth_code  : " . $auth_code ;
		header('Content-type: application/json');
		echo json_encode($arr);
		Yii::app()->end();
		return false;
	}

	public function toArray(){
		$authSession = $this;
		$authSession_json = array();
		$authSession_json['id'] = $authSession->id;
		$authSession_json['auth_code'] = $authSession->auth_code;
		$authSession_json['device_token'] = $authSession->device_token;
		$authSession_json['type_id'] = $authSession->type_id;
		$authSession_json['create_user_id'] = $authSession->create_user_id;
		$authSession_json['create_time'] = $authSession->create_time;
		$authSession_json['update_time'] = $authSession->update_time;
		return $authSession_json;

	}
}