<?php
class UserController extends GxController {
	public function filters() {
		return array (
				'accessControl' 
		);
	}
	public function accessRules() {
		return array (
				array (
						'allow', // allow all users to perform 'index' and 'view' actions
						'actions' => array (
								'signup',
								'login',
								'recover',
								'tos',
								'check',
								'change',
								'updateLang' 
						),
						'users' => array (
								'*' 
						) 
				),
				array (
						'allow', // allow authenticated user to perform
						'actions' => array (
								'profile',
								'updateProfile',
								'updateProfilePic',
								'verifyEmail',
								'updateEmail',
								'invitation',
								'changePassword',
								'logout',
								'notification' 
						),
						'users' => array (
								'@' 
						) 
				),
				array (
						'deny',
						'users' => array (
								'*' 
						) 
				) 
		);
	}
	
	/**
	 * new registration
	 */
	public function actionSignup() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		if (isset ( $_GET ['test'] )) {
			$_POST ['User'] ['first_name'] = 'Karan';
			
			// $_POST ['User'] ['username'] = '';
			$_POST ['User'] ['email'] = '';
			$_POST ['User'] ['password'] = 'admin';
			// $_POST ['User'] ['password_2'] = '';
			$_POST ['User'] ['nationality'] = 'Spanish';
			$_POST ['User'] ['date_of_birth'] = '24';
			$_POST ['User'] ['phone_no'] = '9520142563';
			$_POST ['User'] ['city'] = 'Abha';
			// $_POST ['User'] ['lat'] = '12.1212';
			// $_POST ['User'] ['long'] = '12.1515';
		}
		$model = new User ();
		if (isset ( $_POST ['User'] )) {
			$model->attributes = $_POST ['User'];
			$user = User::getUserByEmail ( $model->email );
			if (! $user) {
				$model->language = isset($_POST ['User'] ['language']) ? $_POST ['User'] ['language'] : 'en';
				$model->state_id = User::STATE_ACTIVE;
				if (! $model->role_id)
					$model->role_id = User::ROLE_USER;
					// $model->range = User::RANGE_VALUE;
				if ($model->role_id == User::ROLE_USER) {
					$model->tos = 1;
				}
				if ($model->save ()) {
					if (isset ( $_POST ['User'] ['password'] ) && $model->setPassword ( $_POST ['User'] ['password'], $_POST ['User'] ['password'] )) {
						// $model->sendInstantUserEmail ( $model );
						
					/* 	$criteria1 = new CDbCriteria ();
						$criteria1->compare ( 'type_id', SubscriptionPlans::SUBSCRIPTION_FREE );
						$new_plan = SubscriptionPlans::model ()->find ( $criteria1 );
						$total_amount = $new_plan->price + $new_plan->vat_apply;
						$model_plan = new UserPlan ();
						$model_plan->amount = $total_amount;
						$model_plan->search_hits = $new_plan->search_hits;
						$model_plan->plan_id = $new_plan->id;
						$model_plan->state_id = SubscriptionPlans::STATUS_PAID;
						$model_plan->validity = $new_plan->validity;
						$model_plan->type_id = $new_plan->type_id;
						$model_plan->start_time = date ( "Y-m-d" );
						$model_plan->update_time = date ( "Y-m-d" );
						$model_plan->create_user_id = $model->id;
						$model_plan->end_time = SubscriptionPlans::getEndTime ( $new_plan->validity ); */
						
						//if ($model_plan->save ()) {
							
							// $model_plan->sendEmail ( $user->email, 'Registration Successful', 'registration' );
							// $this->render ( 'success', array () )
							$arr ['status'] = 'OK';
							$arr ['list'] [] = $model->toArray ();
							$arr ['success'] = Yii::t ( 'app', 'you are successfully registered' );
						//}
					}
				} else {
					$err = '';
					foreach ( $model->getErrors () as $error )
						$err .= implode ( ".", $error );
					$arr ['error'] = $err;
				}
			} else {
				$arr ['error'] = Yii::t ( 'app', "ID already in use. Try another." );
			}
		}
		
		$this->sendJSONResponse ( $arr );
	}
	public function actionLogin() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		if (! Yii::app ()->user->isGuest) {
			$arr ['status'] = 'OK';
			$arr ['success'] = Yii::t ( 'app', 'you have already Logged in.' );
		}
		
		if (isset ( $_GET ['test'] )) {
			$_POST ['LoginForm'] ['username'] = '';
			$_POST ['LoginForm'] ['password'] = 'admin';
			$_POST ['LoginForm'] ['device_token'] = '1234567890';
			$_POST ['LoginForm'] ['device_id'] = '1234567890';
			$_POST ['LoginForm'] ['device_type'] = '2';
			$_POST ['LoginForm'] ['language'] = 'ar';
		}
		
		$model = new LoginForm ();
		if (isset ( $_POST ['LoginForm'] )) {
			$model->attributes = $_POST ['LoginForm'];
			$user = User::model ()->findByAttributes ( array (
					'email' => $model->username 
			) );
			if ($user) {
				
				if ($model->validate () && $this->authenticate ( $model )) {
					
					$id = Yii::app ()->User->id;
					$model_new = User::model ()->findByPk ( $id );
					
					$auth_session = AuthSession::newSession ( $model );
					if($auth_session->device_id)
					$arr ['auth_code'] = $auth_session->auth_code;
					$arr ['id'] = Yii::app ()->user->id;
					
					$criteria = new CDbCriteria ();
					$criteria->addCondition ( 'create_user_id = ' . Yii::app ()->user->id );
					$criteria->addCondition ( 'auth_code != \'' . $auth_session->auth_code . '\'' );
					$userold = AuthSession::model ()->findAll ( $criteria );
					$arr ['other_logedin'] = 'NOK';
					
					if ($userold) {
						$arr ['other_logedin'] = 'OK';
					}
					$model_user = $this->loadModel ( $id, 'User' );
					$model_user->language = isset($_POST ['LoginForm'] ['language']) ? $_POST ['LoginForm'] ['language'] : 'en';
					if ($model_user->save ()) {
						
						$arr ['status'] = 'OK';
						$arr ['user_profile'] = $model_new->toArray ();
						$arr ['success'] = Yii::t ( 'app', 'you have successfully Login' );
					}
				} else {
					
					$err = '';
					foreach ( $model->getErrors () as $error )
						$err .= implode ( ".", $error );
					$arr ['error'] = $err;
				}
			} else {
				$arr ['error'] = Yii::t ( 'app', 'Please check your email and password.' );
			}
		} else {
			if (Yii::app ()->user->isGuest) {
				$arr ['error'] = Yii::t ( 'app', 'No data posted' );
			}
		}
		$this->sendJSONResponse ( $arr );
	}
	public function authenticate($user) {
		$identity = new UserIdentity ( $user->username, $user->password );
		$identity->authenticate ( true );
		
		switch ($identity->errorCode) {
			case UserIdentity::ERROR_NONE :
				$duration = $user->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
				Yii::app ()->user->login ( $identity, $duration );
				return $user;
				break;
			case UserIdentity::ERROR_EMAIL_INVALID :
				$user->addError ( "password", Yii::t ( 'app', 'Username or Password is incorrect' ) );
				break;
			case UserIdentity::ERROR_STATUS_INACTIVE :
				$user->addError ( "status", Yii::t ( 'app', 'This account is not activated.' ) );
				break;
			case UserIdentity::ERROR_STATUS_BANNED :
				$user->addError ( "status", Yii::t ( 'app', 'This account is blocked.' ) );
				break;
			case UserIdentity::ERROR_STATUS_REMOVED :
				$user->addError ( 'status', Yii::t ( 'app', 'Your account has been deleted.' ) );
				break;
			case UserIdentity::ERROR_STATUS_USER_DOES_NOT_EXIST :
				$user->addError ( 'status', Yii::t ( 'app', 'User doesnt exits.' ) );
				break;
			
			case UserIdentity::ERROR_PASSWORD_INVALID :
				Yii::log ( Yii::t ( 'app', 'Password invalid for user {username} (Ip-Address: {ip})', array (
						'{ip}' => Yii::app ()->request->getUserHostAddress (),
						'{username}' => $user->username 
				) ), 'error' );
				
				if (! $user->hasErrors ())
					$user->addError ( "password", Yii::t ( 'app', 'Password is incorrect' ) );
				break;
		}
		return false;
	}
	public function actionCheck() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		if (! Yii::app ()->user->isGuest) {
			
			$id = Yii::app ()->user->id;
			$model = User::model ()->findByPk ( $id );
			$arr ['status'] = 'OK';
			$arr ['user_profile'] = $model->toArray ();
		} else {
			$headers = getallheaders ();
			$auth_code = isset ( $headers ['auth_code'] ) ? $headers ['auth_code'] : null;
			if ($auth_code == null)
				$auth_code = Yii::app ()->request->getQuery ( 'auth_code' );
			if ($auth_code) {
				$auth_session = AuthSession::model ()->findByAttributes ( array (
						'auth_code' => $auth_code 
				) );
				if ($auth_session) {
					if (isset ( $_POST ['AuthSession'] )) {
						$auth_session->device_token = $_POST ['AuthSession'] ['device_token'];
						if ($auth_session->saveAttributes ( array (
								'device_token' 
						) ))
							$arr ['auth_session'] = Yii::t ( 'app', 'Auth Session updated' );
						else {
							$err = '';
							foreach ( $model->getErrors () as $error )
								$err .= implode ( ".", $error );
							$arr ['error'] = $err;
						}
					}
				} else
					$arr ['error'] = 'session not found';
			} else {
				$arr ['error'] = 'Auth code not found';
				$arr ['auth'] = isset ( $auth_code ) ? $auth_code : '';
			}
		}
		
		$this->sendJSONResponse ( $arr );
	}
	
	/**
	 * Recover password
	 */
	public function actionRecover() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		if (isset ( $_GET ['test'] )) {
			$_POST ['User'] ['email'] = '';
		}
		$model = new User ();
		
		if (isset ( $_POST ['User'] )) {
			$email = $_POST ['User'] ['email'];
			$user = User::model ()->findByAttributes ( array (
					'email' => $email 
			) );
			if ($user) {
				$email = $user->email;
				$view = "password_recovery";
				$sub = "Recover Your Account at: " . Yii::app ()->params ['company'];
				$user->sendEmail ( $email, $sub, $view );
				$arr ['status'] = 'OK';
				$arr ['success'] = Yii::t ( 'app', 'Please check your email to reset your password.' );
			} elseif ($email == '') {
				$arr ['error'] = Yii::t ( 'app', 'Please enter the email.' );
			} else {
				$arr ['error'] = Yii::t ( 'app', 'Email is not registered' );
			}
		}
		$this->sendJSONResponse ( $arr );
	}
	
	/**
	 * Api for user changepassword.
	 */
	public function actionChangePassword() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		
		if (isset ( $_POST ['User'] )) {
			$user = Yii::app ()->user->model;
			if ($user) {
				$current_password = User::encrypt ( $_POST ['User'] ['current_password'] );
				
				if ($current_password == $user->password) {
					
					if ($_POST ['User'] ['new_password'] == $_POST ['User'] ['confirm_password']) {
						
						$new_password = User::encrypt ( $_POST ['User'] ['new_password'] );
						$user->password = $new_password;
						
						if ($user->save ()) {
							$arr ['status'] = 'OK';
							$arr ['success'] = Yii::t ( 'app', 'Password is changed Successfully.' );
						} else {
							$arr ['error'] = Yii::t ( 'app', 'Unable to change the password.' );
						}
					} else {
						$arr ['error'] = Yii::t ( 'app', 'Password don\'t match.' );
					}
				} else {
					$arr ['error'] = Yii::t ( 'app', 'Current Password is not correct' );
				}
			} else {
				$arr ['error'] = Yii::t ( 'app', 'Invalid User' );
			}
		}
		$this->sendJSONResponse ( $arr );
	}
	public function actionNotification($value = null) {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		$model = User::model ()->findByAttributes ( array (
				'id' => Yii::app ()->user->id 
		) );
		if ($value == User::NOTIFICATION_ENABLE) {
			$model->is_notification = $value;
			if ($model->save ()) {
				$arr ['success'] = Yii::t ( 'app', 'Enable Notification' );
				$arr ['status'] = 'OK';
			} else {
				$err = '';
				foreach ( $auth_session->getErrors () as $error ) {
					$err .= implode ( ".", $error );
				}
				$arr ['error'] = $err;
			}
		} elseif ($value == User::NOTIFICATION_DISABLE) {
			$model->is_notification = $value;
			if ($model->save ()) {
				$arr ['success'] = Yii::t ( 'app', 'Disable Notification' );
				$arr ['status'] = 'OK';
			} else {
				$err = '';
				foreach ( $auth_session->getErrors () as $error ) {
					$err .= implode ( ".", $error );
				}
				$arr ['error'] = $err;
			}
		}
		
		$this->sendJSONResponse ( $arr );
	}
	public function actionLogout() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'OK' 
		);
		AuthSession::logout ();
		Yii::app ()->user->logout ();
		$this->sendJSONResponse ( $arr );
	}
	
	// public function actionLogout() {
	// $arr = array (
	// 'controller' => $this->id,
	// 'action' => $this->action->id,
	// 'status' => 'OK'
	// );
	// if($user = User::model()->findByPk(Yii::app()->user->id)) {
	// $this->pr($user);
	// exit();
	// $username = $user->full_name;
	// $user->logout();
	
	// Yii::log(Yii::t('app','User {username} logged off', array(
	// '{username}' => $username)));
	
	// Yii::app()->user->logout();
	
	// }
	// AuthSession::logout ();
	// Yii::app ()->user->logout ();
	// $this->sendJSONResponse ( $arr );
	// }
	
	/**
	 * Api for user Update profile.
	 */
	public function actionUpdateProfile() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		$id = Yii::app ()->user->id;
		$model = $this->loadModel ( $id, 'User' );
		
		if (isset ( $_GET ['test'] )) {
			$_POST ['User'] ['first_name'] = 'Karan';
			$_POST ['User'] ['password'] = 'admin';
			$_POST ['User'] ['nationality'] = 'india';
			$_POST ['User'] ['date_of_birth'] = '';
			$_POST ['User'] ['phone_no'] = '8894054847';
			$_POST ['User'] ['city'] = 'dehli';
			$_POST ['User'] ['lat'] = '12.1212';
			$_POST ['User'] ['long'] = '12.1515';
		}
		if (isset ( $_POST ['User'] )) {
			
			$model_password = $model->password;
			$model->attributes = $_POST ['User'];
			if (isset ( $_POST ['User'] ['password'] )) {
				if ($_POST ['User'] ['password'] != null) {
					$model->password = User::encrypt ( $_POST ['User'] ['password'] );
				} else {
					$model->password = $model_password;
				}
			}
			if ($model->save ()) {
				$arr ['status'] = 'OK';
				$arr ['list'] [] = $model->toArray (); // $_POST;
			}
		}
		$this->sendJSONResponse ( $arr );
	}
	public function actionUpdateLang() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		$id = Yii::app ()->user->id;
		$model = $this->loadModel ( $id, 'User' );
		
		if (isset ( $_GET ['test'] )) {
			$_POST ['User'] ['language'] = 'en';
		}
		if (isset ( $_POST ['User'] )) {
			$model->attributes = $_POST ['User'];
			if ($model->save ()) {
				$arr ['status'] = 'OK';
				$arr ['list'] [] = $model->toArray (); // $_POST;
			}
		}
		$this->sendJSONResponse ( $arr );
	}
	
	/**
	 * For updating Profile pic
	 */
	public function actionUpdateProfilePic() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		
		$arr ['post'] = $_POST;
		$arr ['file'] = $_FILES;
		$id = Yii::app ()->user->id;
		$model = $this->loadModel ( $id, 'User' );
		if (isset ( $_FILES )) {
			$model->saveUploadedFile ( $model, 'image_file' );
			
			if ($model->save ()) {
				$arr ['status'] = 'OK';
			} else {
				$arr ['status'] = 'NOK';
				$err = '';
				foreach ( $model->getErrors () as $error ) {
					$err .= implode ( ',', $error );
				}
				$arr ['error'] = $err;
			}
		}
		$this->sendJSONResponse ( $arr );
	}
	
	/**
	 * show user profile details
	 */
	public function actionProfile() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		
		$model = Yii::app ()->user->model;
		if ($model) {
			$arr ['status'] = 'OK';
			$arr ['list'] [] = $model->toArray ();
		} else {
			$arr ['status'] = 'NOK';
		}
		$this->sendJSONResponse ( $arr );
	}
	
	// Unused Api's
	
	/**
	 * for verify email
	 */
	public function actionVerifyEmail() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		$id = Yii::app ()->user->id;
		$model = $this->loadModel ( $id, 'User' );
		if ($model) {
			$model->sendInstantUserEmail ( $model );
			$arr ['status'] = 'OK';
			$arr ['success'] = 'Please check your email to verify your Email Id.';
		} else {
			$arr ['status'] = 'NOK';
		}
		$this->sendJSONResponse ( $arr );
	}
	/**
	 * For update email of user
	 */
	public function actionUpdateEmail() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		// $_POST ['User'] ['email'] = '';
		$id = Yii::app ()->user->id;
		$model = $this->loadModel ( $id, 'User' );
		
		if (isset ( $_POST ['User'] )) {
			$model->setAttributes ( $_POST ['User'] );
			$model->email = $_POST ['User'] ['email'];
			$model->email_verified = 0;
			if ($model->save ()) {
				$arr ['status'] = 'OK';
				$arr ['success'] = 'Your Email is successfully changed.Now,Please verify it.';
			} else {
				$arr ['status'] = 'NOK';
				$err = '';
				foreach ( $model->getErrors () as $error ) {
					$err .= implode ( ',', $error );
				}
				$arr ['error'] = $err;
			}
		}
		$this->sendJSONResponse ( $arr );
	}
	
	/**
	 * For invitation Create for multiple user at a time
	 */
	public function actionInvitation() {
		
		/*
		 * $a[] = array(
		 * 'email' => '',
		 * 'full_name' => 'shkti');
		 * $a[] = array(
		 * 'email' => '',
		 * 'full_name' => 'admin');
		 *
		 * // header('Content-type: application/json');
		 * $_POST['User']['contact_details'] = json_encode($a);
		 */
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		$model = new User ();
		$userlist = array ();
		$arr ['post'] = $_POST;
		if (isset ( $_POST ['User'] )) {
			
			$records = json_decode ( $_POST ['User'] ['contact_details'] );
			
			$arr ['json_send'] = $records;
			
			foreach ( $records as $record ) {
				$json_record [] = array (
						'email' => $record->email,
						'name' => $record->name 
				);
				
				$issent = Invitation::is_Invitation_Already_Send ( $record->email );
				
				if (! $issent) {
					$invitaion = new Invitation ();
					$invitaion->email = $record->email;
					$invitaion->invitation_count = $invitaion->invitation_count ++;
					$invitaion->name = $record->name;
					$invitaion->create_user_id = Yii::app ()->user->id;
					
					if ($invitaion->save ()) {
						
						$json_user_invitaion ['new_invitaion'] = $invitaion->toArray ();
						
						$invitaion->sendEmailInvitations ();
						$arr ['status'] = 'OK';
						$arr ['success'] = 'You have successfully send invitation';
					} else {
						$err = '';
						foreach ( $invitaion->getErrors () as $error ) {
							$err .= implode ( ',', $error );
						}
						$json_user_invitaion ['error'] = $err;
					}
					// return array('user' => 'empty','index' => Invitation::INVITAION_NOT_SEND);
				} else {
					$arr ['error'] = 'You have already send invitation for this user.';
				}
			}
			$arr ['jsonuserlist'] = isset ( $json_user_invitaion ) ? $json_user_invitaion : array ();
		}
		$this->sendJSONResponse ( $arr );
	}
	/**
	 * Api for checking terms and conditions.
	 */
	public function actionTos() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		
		$id = Yii::app ()->user->id;
		$model = Yii::app ()->user->model;
		
		if (isset ( $_POST ['User'] )) {
			
			$model->tos = $_POST ['User'] ['tos'];
			if ($model->save ()) {
				$arr ['status'] = 'OK';
			} else {
				$err = '';
				foreach ( $model->getErrors () as $error )
					$err .= implode ( ".", $error );
				$arr ['error'] = $err;
				echo $err;
			}
		}
		
		$this->sendJSONResponse ( $arr );
	}
	public function actionShowAuth() {
		$autheSessions = AuthSession::model ()->findAll ();
	}
}
