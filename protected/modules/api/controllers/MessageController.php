<?php
class MessageController extends ApiGxController {
	public function filters() {
		return array (
				'accessControl' 
		);
	}
	public function accessRules() {
		return array (
				array (
						'allow',
						'actions' => array (
								'create',
								'inbox',
								'outbox',
								'reply',
								'view',
								'delete',
								'deleteAll',
								'toAdmin',
								'chatInbox',
								'chatOutbox',
								'getChat'
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
	public function actionCreate($id = null) {

		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		
		$Plan = UserPlan::model()->findByAttributes(array('create_user_id'=>Yii::app()->user->id));
		
		if($Plan)
		{
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'id ', $id );
		$user = User::model ()->find ( $criteria );
		
		if ($user) {
			$model = new Message ();
			
			
			
			
			if (isset ( $_GET ['test'] )) {
				$_POST ['Message'] ['content'] = 'whts gng on these daz?';
			}
			
			if (isset ( $_POST ['Message'] )) {
				
				$model->setAttributes ( $_POST ['Message'] );
				
				$model->to_id = $user->id;
				$model->from_id = Yii::app ()->user->id;
				$model->to_state_id = Message::STATE_ACTIVE;
				$model->from_state_id = Message::STATE_ACTIVE;
				$to = $user->id;
				$from = Yii::app()->user->id;
				$model->session_id = $to > $from ? $from . '-' . $to : $to . '-' . $from;
				if ($model->save ()) {
			    $count = Message::model()->new()->countByAttributes(array('to_id' => $model->to_id));
				//print_R($count); exit; 
			    $model->sendNotification ( $count );
				  
						$arr ['status'] = 'OK';
						$arr ['success'] = Yii::t ( 'app', 'Message is successfully sent.' );
						$arr ['list'] = $model->toArray ();
					
				}
			}
		} else {
			$arr ['error'] = 'user not found';
		}
		}
		else 
		{
			$arr ['error'] = 'No Subscription';
		}
		$this->sendJSONResponse ( $arr );
	}
	
	
	public function actionToAdmin() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK'
		);
	
		$Plan = UserPlan::model()->findByAttributes(array('create_user_id'=>Yii::app()->user->id));
	
		if($Plan)
		{
			$criteria = new CDbCriteria ();
			$criteria->compare ( 'role_id ', User::ROLE_ADMIN );
			$user = User::model ()->find ( $criteria );
			if ($user) {
	
				$model = new Message ();
				if (isset ( $_GET ['test'] )) {
					$_POST ['Message'] ['content'] = 'Hi! Can I ask u smthing?';
				}
	
				if (isset ( $_POST ['Message'] )) {
	
					$model->setAttributes ( $_POST ['Message'] );
	
					$model->to_id = $user->id;
					$model->from_id = Yii::app ()->user->id;
					$model->to_state_id = Message::STATE_ACTIVE;
					$model->from_state_id = Message::STATE_ACTIVE;
	
					$to = $user->id;
					$from = Yii::app()->user->id;
					$model->session_id = $to > $from ? $from . '-' . $to : $to . '-' . $from;
	
	
					if ($model->save ()) {
						$arr ['status'] = 'OK';
						$arr ['success'] = Yii::t ( 'app', 'Message is successfully sent.' );
						$arr ['list'] = $model->toArray ();
					} else {
						$err = '';
						foreach ( $model->getErrors () as $error )
							$err .= implode ( ".", $error );
						$arr ['error'] = $err;
					}
				}
			} else {
				$arr ['error'] = Yii::t ( 'app', 'user not found' );
			}
		}
		else
		{
			$arr ['error'] = 'No Subscription';
		}
		$this->sendJSONResponse ( $arr );
	
	}
	
	public function actiongetChat($session_id)
	{
	
		$criteria = new CDbCriteria ();
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK'
		);
		$json_list = array ();
		$ar = array ();
		$criteria = new CDbCriteria ();
		
		$criteria->compare ( 'session_id', $session_id );
		$criteria->order = 'id DESC';
		//$criteria->limit = '1';
		$messages = Message::model ()->findAll ( $criteria );
	
		if ($messages) {
			foreach ( $messages as $message ) {
				
				if($message->to_id == Yii::app()->user->id)
				{
				$message->read = '1';
				$message->save();
				}
				$json_list [] = $message->toArray();
			}
			$arr ['status'] = 'OK';
			$arr ['list'] = $json_list;
		} else {
			$arr ['error'] = Yii::t ( 'app', 'No message found!' );
		}
		$this->sendJSONResponse ( $arr );
		
	}
	public function actionChatInbox() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		$users = array ();
		$list = array ();
		$user_ids = array ();
		$from_users = array ();
		$to_users = array ();
		$results = array ();
		
		$criteria1 = new CDbCriteria ();
		$criteria1->compare ( 'from_id', Yii::app ()->user->id);
		$criteria1->compare ( 'from_state_id', '0');
		$criteria1->order = 'id DESC';
		//$criteria->compare ( 'to_id', Yii::app ()->user->id, true, 'OR' );
		$messages1 = Message::model ()->findAll ( $criteria1 );
		
		
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'to_id', Yii::app ()->user->id);
		$criteria->compare ( 'to_state_id', '0');
		$criteria->order = 'id DESC';
		//$criteria->compare ( 'to_id', Yii::app ()->user->id, true, 'OR' );
		$messages2 = Message::model ()->findAll ( $criteria );
		
		
		//$criteria = new CDbCriteria ();
		//$criteria->compare ( 'from_id', Yii::app ()->user->id, true, 'OR' );
		//$criteria->compare ( 'to_id', Yii::app ()->user->id, true, 'OR' );
		$messages = array_merge($messages1,$messages2);
		
		foreach ( $messages as $message ) {
			$results [] = $message->session_id;
		}
		
		if ($results) {
			$session_ids = array_unique ( $results );
			
			foreach ( $session_ids as $session_id ) {
				$criteria1 = new CDbCriteria ();
				$criteria1->compare ( 'session_id', $session_id );
				$criteria1->order = 'id DESC';
				$criteria1->limit = 1;
				$msg = Message::model ()->find ( $criteria1 );
				//print_R($msg); exit;
				if ($msg) {
					$to_users = array (
							$msg->to_id 
					);
					$from_users = array (
							$msg->from_id 
					);
					
					$total_users = array_merge ( $to_users, $from_users );
					$login_user_id = array (
							Yii::app ()->user->id 
					);
					$user_id = array_diff ( $total_users, $login_user_id );
				}
				$user = User::model ()->findByPk ( $user_id );
				if ($user) {
					
					$list [] = $user->toArray( $msg->id , $msg->session_id);
				}
			}
			
			if ($list != null) {
				$arr ['status'] = 'OK';
				$arr ['users'] = $list;
			} else {
				$arr ['message'] = 'list is empty';
			}
		} else {
			$arr ['error'] = 'No results found';
		}
		
		$this->sendJSONResponse ( $arr );
	}
	public function actionChatOutbox() {
		$criteria = new CDbCriteria ();
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		$json_list = array ();
		$ar = array ();
		$criteria = new CDbCriteria ();
		$create_user_id = Yii::app ()->user->id;
		$criteria->compare ( 'from_id', Yii::app ()->User->id );
		$criteria->order = 'id ASC';
		$criteria->select = 'to_id,id';
		$criteria->compare ( 'from_state_id', Message::STATE_ACTIVE );
		$messages = Message::model ()->findAll ( $criteria );
		foreach ( $messages as $message ) {
			$ar [$message->id] = $message->to_id;
		}
		
		$message = array_unique ( $ar );
		$message = array_flip ( $message );
		// $message= array_reverse($message);
		$criteria1 = new CDbCriteria ();
		$criteria1->addInCondition ( 'id', $message );
		$criteria1->order = "id ASC";
		$chats = Message::model ()->findAll ( $criteria1 );
		if ($chats) {
			foreach ( $chats as $chat ) {
				$json_list [] = $chat->toArray ();
			}
			$arr ['status'] = 'OK';
			$arr ['list'] = $json_list;
		} else {
			$arr ['error'] = Yii::t ( 'app', 'No message found!' );
		}
		$this->sendJSONResponse ( $arr );
	}
	
	// public function actionOutbox() {
	// $arr = array (
	// 'controller' => $this->id,
	// 'action' => $this->action->id,
	// 'status' => 'NOK'
	// );
	// $json_list = array ();
	// $criteria = new CDbCriteria ();
	// $create_user_id = Yii::app ()->user->id;
	// $criteria->compare ( 'from_id', $create_user_id);
	// $criteria->order = 'id DESC';
	// $messages = Message::model ()->findAll ( $criteria );
	// foreach($messages as $message)
	// {
	// $msg_ids[] = $message->id;
	// }
	// foreach($msg_ids as $msg_id)
	// {
	// $message = Message::model ()->findByPk( $msg_id );
	// $json_list [][$message->from_id] = $message->toArray ();
	// }
	// $msg_list = array_unique($json_list);
	// if ($msg_list){
	// /* echo '<pre>';
	// print_r($msg_list);exit;
	
	// // $criteria->group="to_id";
	// $criteria1 = new CDbCriteria ();
	// $criteria1->group = 'to_id';
	// $criteria1->order = 'id DESC';
	// $criteria1->addInCondition('id',$msg_ids);
	// $criteria1->compare ( 'from_state_id', Message::STATE_ACTIVE );
	// $messages = Message::model ()->findAll ( $criteria1 );
	
	// if ($messages) {
	// foreach ( $messages as $message ) {
	// $json_list [] = $message->toArray ();
	// } */
	// $arr ['status'] = 'OK';
	// $arr ['list'] = $json_list;
	
	// } else {
	// $arr ['error'] = Yii::t('app','No message found!' );
	// }
	// $this->sendJSONResponse ( $arr );
	// }
	public function actionInbox() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		$json_list = array ();
		$criteria = new CDbCriteria ();
	
		$criteria->compare ( 'to_id', Yii::app()->user->id , true, 'OR');
		$criteria->compare ( 'from_id', Yii::app()->user->id , true, 'OR');
		$criteria->group = 'from_id';
	    $criteria->order = 'id DESC';
		$criteria->compare ( 'to_state_id', Message::STATE_ACTIVE );
		$messages = Message::model ()->findAll ($criteria );
		if ($messages) {
			foreach ( $messages as $message ) {
				$json_list [] = $message->toArray ();
			}
			$arr ['status'] = 'OK';
			$arr ['list'] = $json_list;
		} else {
			$arr ['error'] = Yii::t ( 'app', 'No message found!' );
		}
		$this->sendJSONResponse ( $arr );
	}
	public function actionOutbox() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		$json_list = array ();
		$criteria = new CDbCriteria ();
		
		$criteria->compare ('from_id', Yii::app()->user->id );
		$criteria->group = "to_id";
		// $criteria->group = 'from_id';
		// $criteria->order = 'id DESC';
		$criteria->compare ('from_state_id', Message::STATE_ACTIVE );
		$messages = Message::model ()->findAll ( $criteria );
		if ($messages) {
			foreach ( $messages as $message ) {
				$json_list [] = $message->toArray ();
			}
			$arr ['status'] = 'OK';
			$arr ['list'] = $json_list;
		} else {
			$arr ['error'] = Yii::t ( 'app', 'No message found!' );
		}
		$this->sendJSONResponse ( $arr );
	}
	public function actionReply($id = null) { // id is of message
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		$message = $this->loadModel ( $id, 'Message' );
		if ($message) {
			$model = new Message ();
			
			if (isset ( $_GET ['test'] )) {
				$_POST ['Message'] ['content'] = 'Ya ,sure';
			}
			if (isset ( $_POST ['Message'] )) {
				$model->setAttributes ( $_POST ['Message'] );
				$model->from_id = Yii::app()->user->id;

				$model->to_id = $message->from_id;
				$model->from_state_id = Message::STATE_ACTIVE;
				$model->session_id = $message->from_id > $message->to_id ? $message->to_id . '-' . $message->from_id : $message->from_id . '-' . $message->to_id;
				if ($model->save ()) {
					$to_user_model = $model->from;
					if ($to_user_model) {
						//$model->sendNotification ( $to_user_model, $model );
						$arr ['status'] = 'OK';
						$arr ['success'] = Yii::t ( 'app', 'Message is successfully sent.' );
						$arr ['list'] = $model->toArray ();
					}
				}
			}
		} else {
			$arr ['error'] = Yii::t ( 'app', 'message not found' );
		}
		$this->sendJSONResponse ( $arr );
	}
	public function actionView($id) {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		$mesage = $this->loadModel ( $id, 'Message' );
		
		$criteria = new CDbCriteria ();
		$ar = array (
				$mesage->to_id,
				$mesage->from_id 
		);
		$criteria->addInCondition ( 'to_id', $ar );
		$criteria->addInCondition ( 'from_id', $ar );
// 		$this->pr($mesage);
// 		if($mesage->to_id== Yii::app()->User->id){
// 			$criteria->compare ( 'to_state_id', Message::STATE_ACTIVE );

// 		}
// 		else {
			
// 			$criteria->compare ( 'from_state_id', Message::STATE_ACTIVE );
// 		}
		
// 		$criteria->compare ( 'to_state_id', Message::STATE_ACTIVE );
		$models = Message::model ()->findAll ( $criteria );
		if ($models) {
			$msg_list = array();
			foreach ( $models as $model ) {
				if ($model->to_id == Yii::app ()->User->id) {
					
					if (! $model->read == Message::READ) {
						$model->read = Message::READ;
						if ($model->saveAttributes ( array (
								'read' 
						) )) {
						}
					}
				}
				$msg_list [] = $model->toArray ( true );
				
			}
			$arr ['detail'] = $msg_list;
			$arr ['status'] = 'OK';
		} else {
			$arr ['error'] = Yii::t ( 'app', 'mo message exist' );
		}
		
		$this->sendJSONResponse ( $arr );
	}
	public function actionDelete($id) {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		$model = $this->loadModel ( $id, 'Message' );
		if ($model) {
// 		$this->pr($model);exit();
			if ($model->to_id == Yii::app ()->user->id) {
// 				echo "sdas";
// 				exit();
				$model->to_state_id = Message::STATE_DELETED;
				if ($model->saveAttributes ( array (
						'to_state_id' 
				) )) {
					$arr ['status'] = 'OK';
					$arr ['success'] = Yii::t ( 'app', 'Message is successfully deleted from your inbox.' );
				}
			} elseif ($model->from_id == Yii::app ()->user->id) {
				$model->from_state_id = Message::STATE_DELETED;
				if ($model->saveAttributes ( array (
						'from_state_id' 
				) )) {
					$arr ['status'] = 'OK';
					$arr ['success'] = Yii::t ( 'app', 'Message is successfully deleted from your outbox.' );
				}
			}
		} else {
			$arr ['error'] = Yii::t ( 'app', 'message not found' );
		}
		
		$this->sendJSONResponse ( $arr );
	}
	public function actionDeleteAll($id) {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		
		
		$criteria = new CDbCriteria ();
        $criteria->compare ( 'session_id', $id );
		$models = Message::model ()->findAll ( $criteria ); 
	
		if ($models) {
			foreach ( $models as $model ) {
// 				$this->pr ( $model );
				if ($model->to_id == Yii::app ()->user->id) {
// 					echo"dasda";
					$model->to_state_id = Message::STATE_DELETED;
					if ($model->saveAttributes ( array (
							'to_state_id' 
					) )) {
						$arr ['status'] = 'OK';
						$arr ['success'] = Yii::t ( 'app', 'Message is successfully deleted from your inbox.' );
					}
				} else {
					$model->from_state_id = Message::STATE_DELETED;
					if ($model->saveAttributes ( array (
							'from_state_id' 
					) )) {
						$arr ['status'] = 'OK';
						$arr ['success'] = Yii::t ( 'app', 'Message is successfully deleted from your outbox.' );
					}
				}
			}
		} else {
			$arr ['error'] = Yii::t ( 'app', 'message not found' );
		}
		
		$this->sendJSONResponse ( $arr );
	}

}