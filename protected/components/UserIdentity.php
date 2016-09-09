<?php

class UserIdentity extends CUserIdentity {
	public $id;
	public $user;
	const ERROR_EMAIL_INVALID	= 3;
	const ERROR_STATUS_INACTIVE	= 4;
	const ERROR_STATUS_BANNED	= 5;
	const ERROR_STATUS_REMOVED	= 6;
	const ERROR_STATUS_USER_DOES_NOT_EXIST = 7;
	const ERROR_CHOICE_INACTIVE =8;
	const ERROR_PASSWORD_INVALID =9;

	public function authenticateSession($user)
	{
		if(!$user)
		return self::ERROR_STATUS_USER_DOES_NOT_EXIST;
		$this->id = $user->id;
		$this->setState('id', $user->id);
		$this->username = $user->first_name;
		$this->user = $user;
		$this->errorCode=self::ERROR_NONE;

		return!$this->errorCode = self::ERROR_NONE;
	}
	public function authenticateReg($user=false)
	{

		//	$user = User::model()->find('first_name = :first_name', array(':first_name' => $user->first_name));
		if(!$user)
		return self::ERROR_STATUS_USER_DOES_NOT_EXIST;

		else {
			$this->id = $user->id;
			$this->setState('id', $user->id);
			$this->username = $user->first_name;
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}

	public function authenticate($loginByEmail = false)
	{

		$user = User::model()->findByAttributes(array('email' => $this->username));


		if(!$user)
		return self::ERROR_STATUS_USER_DOES_NOT_EXIST;

		if(!User::validate_password($this->password,$user->password))
		$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else if($user->state_id == User::STATE_INACTIVE)
		$this->errorCode=self::ERROR_CHOICE_INACTIVE;
		
		else {
			$this->id = $user->id;
			$this->setState('id', $user->id);
			$this->username = $user->first_name;
			$this->errorCode=self::ERROR_NONE;
		}

		return !$this->errorCode;
	}

	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
		return $this->id;
	}

	public function getRoles()
	{
		return $this->Role;
	}

}
