<?php
class DefaultController extends GxController {
	public $layout = '//layouts/admin_layout';
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
								'update',
								'search',
								'index',
								'view',
								'unread',
								'starred',
								'archieved',
								'sent',
								'reply',
								'delete',
								'ReceivedeleteAll',
								'fromdelete',
								'outboxdeleteAll' 
						),
						'users' => array (
								'@' 
						) 
				),
				array (
						'allow',
						'actions' => array (
								'admin' 
						),
						'expression' => 'Yii::app()->user->isAdmin' 
				),
				array (
						'deny',
						'users' => array (
								'*' 
						) 
				) 
		);
	}
	public function isAllowed($model) {
		return $model->isAllowed ();
	}
	public function actionView($id) {
		$model = $this->loadModel ( $id, 'Message' );
		if ($model) {
			if (! $model->read == Message::READ) {
				$model->read=Message::READ;
				if ($model->saveAttributes ( array (
						'read'
				) )) {
				}
			}
			$arr ['detail'] = $model->toArray ( true );
				
			$arr ['status'] = 'OK';
		}
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'id ', $model->from_id );
		$user = User::model ()->find ( $criteria );
		$this->updateMenuItems ( $model );
		$this->render ( 'view', array (
				'model' => $model,
				'user' => $user 
		) );
	}
	public function actionSent() {
		$criteria = new CDbCriteria ();
		$create_user_id = Yii::app ()->user->id;
		$criteria->compare ( 'from_id', $create_user_id, true );
		$criteria->compare ( 'from_state_id', Message::STATE_ACTIVE, true );
		$this->updateMenuItems ();
		$dataProvider = new CActiveDataProvider ( 'Message', array (
				'criteria' => $criteria 
		) );
		$this->render ( 'sent', array (
				'dataProvider' => $dataProvider 
		) );
	}
	public function actionIndex() {
		$this->updateMenuItems ();
		$criteria = new CDbCriteria ();
		$create_user_id = Yii::app ()->user->id;
		$criteria->compare ( 'to_id', $create_user_id, true );
		$criteria->compare ( 'to_state_id', Message::STATE_ACTIVE, true );
		$criteria->order = 'id DESC';
		$dataProvider = new CActiveDataProvider ( 'Message', array (
				'criteria' => $criteria 
		) );
		$this->render ( 'index', array (
				'dataProvider' => $dataProvider 
		) );
	}
	public function actionCreate() {
		$model = new Message ();
		$this->performAjaxValidation ( $model, 'message-form' );
		if (isset ( $_POST ['Message'] )) {
			
			$model->setAttributes ( $_POST ['Message'] );
			$model->to_id = $_POST ['Message'] ['to_id'];
			$model->from_id = Yii::app ()->user->id;
			$model->to_state_id = Message::STATE_ACTIVE;
			$model->from_state_id = Message::STATE_ACTIVE;
			$model->session_id = $model->to_id > $model->from_id ? $model->from_id . '-' . $model->to_id : $model->to_id . '-' . $model->from_id;
			if ($model->save ()) {
			
				Yii::log ( CVarDumper::dumpAsString ( $model ), CLogger::LEVEL_WARNING, ' message model' );
				//$to_user_model = $model->to;
				//Yii::log ( CVarDumper::dumpAsString ( $to_user_model ), CLogger::LEVEL_WARNING, ' to user model' );
				$count = Message::model()->new()->countByAttributes(array('to_id' => $model->to_id));
				
				
		
					$model->sendNotification ($count );
					$this->redirect ( array (
							'view',
							'id' => $model->id
					) );
				
			}
		}
		
		$this->render ( 'create', array (
				'model' => $model,
			
		) );
	}
	public function actionReply($id) {
		$message = $this->loadModel ( $id, 'Message' );
		$model = new Message ();
		$criteria1 = new CDbCriteria ();
		$criteria1->addCondition ( 'id=' . $id );
		$mesage = Message::model ()->find ( $criteria1 );
		
		$criteria2 = new CDbCriteria ();
		$criteria2->addCondition ( 'id=' . $mesage->from_id );
		$user_id = user::model ()->find ( $criteria2 );
		$email = $user_id->email;
		
		$this->performAjaxValidation ( $model, 'message-form' );
		
		if (isset ( $_POST ['Message'] )) {
			$from = $model->from_id;
			$criteria = new CDbCriteria ();
			$criteria->compare ( 'email ', $from );
			$user = User::model ()->find ( $criteria );
			$model->setAttributes ( $_POST ['Message'] );
			$model->from_id = Yii::app ()->user->id;
			$model->to_id = $message->from_id;
			$model->session_id = $message->from_id > Yii::app ()->user->id ? Yii::app ()->user->id . '-' . $message->from_id : $message->from_id . '-' . Yii::app ()->user->id;
		
		if ($model->save ()) {
				
				Yii::log ( CVarDumper::dumpAsString ( $model ), CLogger::LEVEL_WARNING, ' message model' );
				 $count = Message::model()->new()->countByAttributes(array('to_id' => $model->to_id));
				//Yii::log ( CVarDumper::dumpAsString ( $to_user_model ), CLogger::LEVEL_WARNING, ' to user model' );
			
				$model->sendNotification ( $count );
					Yii::app ()->user->setFlash ( 'create', 'Congratulations ! Your message has been sent successfully' );
		
				
			}
			 
		}
		$this->updateMenuItems ( $model );
		$this->render ( 'reply', array (
				'model' => $model,
				'email' => $email 
		) );
	}
	public function actionUpdate($id) {
		$model = $this->loadModel ( $id, 'Message' );
		$this->performAjaxValidation ( $model, 'message-form' );
		
		if (isset ( $_POST ['Message'] )) {
			$model->setAttributes ( $_POST ['Message'] );
			
			if ($model->save ()) {
				$this->redirect ( array (
						'view',
						'id' => $model->id 
				) );
			}
		}
		$this->updateMenuItems ( $model );
		$this->render ( 'update', array (
				'model' => $model 
		) );
	}
	public function actionDelete($id) {
		$model = $this->loadModel ( $id, 'Message' );
		$model->to_state_id = Message::STATE_DELETED;
		if ($model->save ()) {
			$this->redirect ( array (
					'index' 
			) );
		}
	}
	public function actionFromdelete($id) {
		$model = $this->loadModel ( $id, 'Message' );
		$model->from_state_id = Message::STATE_DELETED;
		if ($model->save ()) {
			$this->redirect ( array (
					'sent' 
			) );
		}
	}
	public function actionReceivedeleteAll() {
		$ids = $_POST ['idList'];
		if ($ids) {
			foreach ( $ids as $id ) {
				$message = Message::model ()->findByPk ( $id );
				
				if ($message) {
					$message->to_state_id = Message::STATE_DELETED;
					$message->save ();
				}
			}
			$this->redirect ( array (
					'index' 
			) );
		}
	}
	public function actionOutboxdeleteAll() {
		$ids = $_POST ['idList'];
		if ($ids) {
			foreach ( $ids as $id ) {
				$message = Message::model ()->findByPk ( $id );
				
				if ($message) {
					$message->from_state_id = Message::STATE_DELETED;
					$message->save ();
				}
			}
			$this->redirect ( array (
					'sent' 
			) );
		}
	}
	public function actionSearch() {
		$model = new Job ( 'search' );
		$model->unsetAttributes ();
		$this->updateMenuItems ( $model );
		
		if (isset ( $_GET ['Message'] )) {
			$model->setAttributes ( $_GET ['Message'] );
			$this->renderPartial ( '_list', array (
					'dataProvider' => $model->search (),
					'model' => $model 
			) );
		}
		
		$this->renderPartial ( '_search', array (
				'model' => $model 
		) );
	}
	public function actionAdmin() {
		$model = new Message ( 'search' );
		$model->unsetAttributes ();
		$this->updateMenuItems ( $model );
		
		if (isset ( $_GET ['Message'] ))
			$model->setAttributes ( $_GET ['Message'] );
		
		$this->render ( 'admin', array (
				'model' => $model 
		) );
	}
	protected function updateMenuItems($model = null) {
		// create static model if model is null
		if ($model == null)
			$model = new Message ();
		
		switch ($this->action->id) {
			case 'update' :
				{
					$this->menu [] = array (
							'label' => Yii::t ( 'app', 'View' ),
							'url' => array (
									'view',
									'id' => $model->id 
							),
							'icon' => 'glyphicon glyphicon-eye-open' 
					);
				}
			case 'create' :
				{
					$this->menu [] = array (
							'label' => Yii::t ( 'app', 'Manage' ),
							'url' => array (
									'admin' 
							),
							'visible' => Yii::app ()->user->isAdmin,
							'icon' => 'icon-wrench icon-white' 
					);
					$this->menu [] = array (
							'label' => Yii::t ( 'app', 'List' ),
							'url' => array (
									'index' 
							),
							'icon' => 'icon-th-list icon-white' 
					);
				}
				break;
			case 'index' :
				{
					$this->menu [] = array (
							'label' => Yii::t ( 'app', 'Manage' ),
							'url' => array (
									'admin' 
							),
							'visible' => Yii::app ()->user->isAdmin,
							'icon' => 'icon-wrench icon-white' 
					);
					$this->menu [] = array (
							'label' => Yii::t ( 'app', 'Create' ),
							'url' => array (
									'create' 
							),
							'icon' => 'icon-plus icon-white' 
					);
				}
				break;
			case 'admin' :
				{
					$this->menu [] = array (
							'label' => Yii::t ( 'app', 'List' ),
							'url' => array (
									'index' 
							),
							'icon' => 'icon-th-list icon-white' 
					);
					$this->menu [] = array (
							'label' => Yii::t ( 'app', 'Create' ),
							'url' => array (
									'create' 
							),
							'icon' => 'icon-plus icon-white' 
					);
				}
				break;
			default :
			case 'view' :
				{
					// $this->menu [] = array (
					// 'label' => Yii::t ( 'app', 'List' ),
					// 'url' => array (
					// 'index'
					// ),
					// 'icon' => 'icon-th-list icon-white'
					// );
					// $this->menu [] = array (
					// 'label' => Yii::t ( 'app', 'Manage' ),
					// 'url' => array (
					// 'admin'
					// ),
					// 'visible' => Yii::app ()->user->isAdmin,
					// 'icon' => 'icon-wrench icon-white'
					// );
					// $this->menu [] = array (
					// 'label' => Yii::t ( 'app', 'Delete' ),
					// 'url' => '#',
					// 'linkOptions' => array (
					// 'submit' => array (
					// 'delete',
					// 'id' => $model->id
					// ),
					// 'confirm' => 'Are you sure you want to delete this item?'
					// ),
					// 'visible' => Yii::app ()->user->isAdmin,
					// 'icon' => 'icon-remove icon-white'
					// );
					// $this->menu [] = array (
					// 'label' => Yii::t ( 'app', 'Create' ),
					// 'url' => array (
					// 'create'
					// ),
					// 'icon' => 'icon-plus icon-white'
					// );
					// $this->menu [] = array (
					// 'label' => Yii::t ( 'app', 'Update' ),
					// 'url' => array (
					// 'update',
					// 'id' => $model->id
					// ),
					// 'visible' => Yii::app ()->user->isAdmin,
					// 'icon' => 'icon-edit icon-white'
					// );
				}
				break;
		}
		
		// Add SEO headers
		$this->processSEO ( $model );
		
		// merge actions with menu
		$this->actions = array_merge ( $this->actions, $this->menu );
	}
}