<?php
abstract class ApiGxController extends GxController {
	public function actions() {
		return array (
				
				// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha' => array (
						'class' => 'CCaptchaAction',
						'backColor' => 0xFFFFFF 
				) 
		);
	}
	public function sendJSONResponse($arr, $renderJson = true) {
		if ($renderJson) {
			header ( 'Content-type: application/json' );
			$this->printLogs ( $arr, '<h2 style = "color:Green;"><b>Reponse</b></h2>' );
			echo json_encode ( $arr );
			Yii::app ()->end ();
		} else {
			return $arr;
		}
	}
	public function apiModelDelete($key, $modelClass, $renderJson = true) {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		
		$model = $modelClass::model ()->findByPk ( $key );
		/*
		 * if (! ($this->isAllowed ( $model )))
		 * throw new CHttpException ( 403, Yii::t ( 'app', 'You are not allowed to access this page.' ) );
		 */
		
		if ($model != null) {
			if ($model->delete ()) {
				$arr ['status'] = 'OK';
				$arr ['msg'] = $modelClass . ' is deleted Successfully.';
			}
		} else {
			$arr ['msg'] = $modelClass . ' is not found.';
		}
		$this->sendJSONResponse ( $arr, $renderJson );
	}
	public function apiModelSave($modelClass, $renderJson = true) {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		
		$model = new $modelClass ();
		if (isset ( $_POST [$modelClass] )) {
			$model->setAttributes ( $_POST [$modelClass] );
			
			if ($model->save ()) {
				$arr ['status'] = 'OK';
				$arr ['detail'] = $model->toArray ();
			} else {
				$err = '';
				foreach ( $model->getErrors () as $error ) {
					$err .= implode ( ',', $error );
				}
				$arr ['error'] = $err;
			}
		}
		
		$this->sendJSONResponse ( $arr, $renderJson );
	}
	public function apiLoadModel($key, $modelClass, $renderJson = true) {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		
		$model = $this->loadModel ( $key, $modelClass );
		
		$arr ['detail'] = $model->toArray ( true );
		
		$arr ['status'] = 'OK';
		
		$this->sendJSONResponse ( $arr, $renderJson );
	}
	public function apiLoadList($model_name, $renderJson = true) {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		$json_list = array ();
		
		$models = $model_name::model ()->findAll ();
		
		foreach ( $models as $model ) {
			$json_list [] = $model->toArray ();
		}
		$arr ['list'] = $json_list;
		
		$arr ['status'] = 'OK';
		
		$this->sendJSONResponse ( $arr, $renderJson );
	}
	public function apiLoadListForrequirement($model_name) {
		$json_list = array ();
		$criteria = new CDbCriteria ();
		$criteria->order = 'title ASC';
		$models = $model_name::model ()->findAll ( $criteria );
		foreach ( $models as $model ) {
			$json_list [] = $model->toArray ();
		}
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'id', Yii::app ()->User->id );
		$criteria->select = "language";
		$language = User::model ()->find ( $criteria );
		if ($language->language == "ar") {
			$json_list [] = array (
					'id' => '',
					'title' => 'لا شيء' 
			);
		} else {
			$json_list [] = array (
					'id' => '',
					'title' => 'None' 
			);
		}
		
		return $json_list;
	}
	public static  function pr($data){
		echo  "<pre>";
		print_r ($data);
		echo "</pre>";
		
	
	}
	public function apiLoadListForAplabetic($model_name,$lang = null) {
		
		$json_list = array ();
		$criteria = new CDbCriteria ();
		$criteria->order = 'title ASC';
		$models = $model_name::model ()->findAll ( $criteria );
		if(yii::app()->user->isGuest)
		{
			
			foreach ( $models as $model ) {
				$json_list [] = $model->toArray1($lang);
			}
		}
		else 
		{
		foreach ( $models as $model ) {
			$json_list [] = $model->toArray ();
		}
		}
		return $json_list;
	}
	public function apiLoadListForAll($model_name) {
		$json_list = array ();
		$models = $model_name::model ()->findAll ();
		foreach ( $models as $model ) {
			$json_list [] = $model->toArray ();
		}
		return $json_list;
	}
	
}
