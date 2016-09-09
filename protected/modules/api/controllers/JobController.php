<?php
class JobController extends ApiGxController {
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
								'download',
								'thumbnail',
								'requirement',
								'searchRequirement' 
						),
						'users' => array (
								'*' 
						) 
				),
				array (
						'allow',
						'actions' => array (
								'index',
								'view',
								'update',
								'delete',
								'create',
								'makeFavourite',
								'myFavouriteReq',
								'myFavouriteAdv',
								'removeFavourite',
								'myAdvertisements',
								'myRequests',
								'refineSearch',
								'search',
								'marketDemand',
								'nationalityList',
								'religionList',
								'subscriptionPlans',
								'setPlan',
								'updateAdvertisement' 
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
	public function actionSubscriptionPlans() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK'
		);
		$json_list = array ();
		$criterea = new CDbCriteria ();
		$criterea->compare ( 'type_id', SubscriptionPlans::SUBSCRIPTION_PAID );
		$criterea->compare ( 'state_id', SubscriptionPlans::STATE_PUBLISH );
		$models = SubscriptionPlans::model ()->findAll ( $criterea );
	
		foreach ( $models as $model ) {
			$json_list [] = $model->toArray ();
		}
		$arr ['list'] = $json_list;
	
		$arr ['status'] = 'OK';
	
		$this->sendJSONResponse ( $arr );
	}
	public function actionReligionList() {
		$this->apiLoadList ( 'Religion' );
	}
	public function actionNationalityList() {
		$this->apiLoadList ( 'Nationality' );
	}
	public function isAllowed($model) {
		return $model->isAllowed ();
	}
	public function actionMakeFavourite($id) {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		$job_model = $this->loadModel ( $id, 'Job' );
		
		if ($job_model) {
			$criteria = new CDbCriteria ();
			$criteria->addCondition ( 'create_user_id =' . Yii::app ()->user->id );
			$criteria->addCondition ( 'job_id =' . $id );
			$model = Favourite::model ()->find ( $criteria );
			if ($model == null) {
				
				$model = new Favourite ();
				$model->job_id = $id;
				$model->create_user_id = Yii::app ()->user->id;
				$model->type_id = $job_model->type_id;
				if ($model->save ()) {
					$arr ['status'] = "OK";
					$arr ['success'] = Yii::t ( 'app', 'You have successfully marked this advertisement favorite' );
				}
			} else {
				$arr ['error'] = Yii::t ( 'app', 'You have already marked this advertisement favorite' );
			}
		} else {
			$arr ['error'] = Yii::t ( 'app', 'Advertisement not found!' );
		}
		$this->sendJSONResponse ( $arr );
	}
	public function actionMyFavouriteAdv() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		$json_entry = array ();
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'type_id ', Job::POST_ADVERTISER);
		$criteria->compare ( 'create_user_id ', Yii::app ()->user->id );
		$results = Favourite::model ()->findAll ( $criteria );
		//echo '<pre>';
		//print_R($results); exit;
		if ($results) {
			foreach ( $results as $result ) {
				$job = $result->job;
				$json_entry [] = $job->toArray ();
			}
			$arr ['list'] = $json_entry;
			$arr ['status'] = 'OK';
		} else {
			$arr ['error'] = Yii::t ( 'app', 'No record found...!' );
		}
		$this->sendJSONResponse ( $arr );
	}
	
	public function actionMyFavouriteReq() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		$json_entry = array ();
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'type_id ', Job::POST_REQUEST);
		$criteria->compare ( 'create_user_id ', Yii::app ()->user->id );
		$results = Favourite::model ()->findAll ( $criteria );
		if ($results) {
			foreach ( $results as $result ) {
				$job = $result->job;
				$json_entry [] = $job->toArray ();
			}
			$arr ['list'] = $json_entry;
			$arr ['status'] = 'OK';
		} else {
			$arr ['error'] = Yii::t ( 'app', 'No record found...!' );
		}
		$this->sendJSONResponse ( $arr );
	}
	public function actionRemoveFavourite($id) {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		$job_model = $this->loadModel ( $id, 'Job' );
		if ($job_model) {
			$criteria = new CDbCriteria ();
			$criteria->addCondition ( 'job_id = ' . $id );
			$criteria->addCondition ( 'create_user_id = ' . Yii::app ()->user->id );
			$favourite = Favourite::model ()->find ( $criteria );
			if ($favourite) {
				
				$favourite->delete ();
				$arr ['status'] = 'OK';
			} else {
				$arr ['error'] = Yii::t ( 'app', 'Not Favourite Yet.' );
			}
		} else {
			$arr ['error'] = Yii::t ( 'app', 'Advertisement not found!' );
		}
		
		$this->sendJSONResponse ( $arr );
	}

	public function actionIndex() {
		// $plan = User::checkPlan ();
		// print_r($plan);
		// if ($plan) {
		$this->apiLoadList ( 'Job' );
		// }
		// $arr = array (
		// 'controller' => $this->id,
		// 'action' => $this->action->id,
		// 'error' => 'Your subscription Plan is Over'
		// );
		// $this->sendJSONResponse ( $arr );
	}
	public function actionCreate() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		
		$json_entry = array ();
		if (isset ( $_GET ['test'] )) {
			$_POST ['Job'] ['service_id'] = '50';
			$_POST ['Job'] ['nationality_id'] = '477';
			$_POST ['Job'] ['religion_id'] = '2';
			$_POST ['Job'] ['location_id'] = '8';
			// $_POST ['Job'] ['skills'] = '1,3';
			$_POST ['Job'] ['age_to'] = '20';
			// $_POST ['Job'] ['age_from'] = '19';
			$_POST ['Job'] ['experience_to'] = '10';
			// $_POST ['Job'] ['experience_from'] = '1';
			$_POST ['Job'] ['price'] = '10';
			// $_POST ['Job'] ['need_by_date'] = '1977-07-09';
			 $_POST ['Job'] ['type_id'] = '1';
		}
		//$plan = User::checkPlanExist ();
		$plan = UserPlan::model()->findByAttributes(array('create_user_id'=>Yii::app()->user->id));
		if ($plan) {
			$model = new Job ();
			if (isset ( $_POST ['Job'] )) {
				$model->setAttributes ( $_POST ['Job'] );
				
				if ($model->save ()) {
					// if ($model->skills) {
					// $job_skills = $model->skills;
					// $skills = explode ( ',', $job_skills );
					// foreach ( $skills as $skill => $id ) {
					
					// $job_skill = new JobSkill ();
					// $job_skill->skill_id = $id;
					// $job_skill->job_id = $model->id;
					// $job_skill->save ();
					// }
					// }
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
		}
		else 
		{
		$arr ['error'] = "No Subscription";
		}
		$this->sendJSONResponse ( $arr );
	}
	
	public function actionMyAdvertisements() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK'
		);
		$json_entry = array ();
		// $plan = User::PlanExist ();
		//$plan = User::checkPlanExist ();
	
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'create_user_id ', Yii::app ()->user->id );
		$criteria->compare ( 'type_id ', Job::POST_ADVERTISER );
		$results = Job::model ()->findAll ( $criteria );
		if ($results) {
			foreach ( $results as $result ) {
				$json_entry [] = $result->toArray ();
			}
			$arr ['list'] = $json_entry;
			$arr ['status'] = 'OK';
			//if (! $plan) {
			//	$arr ['error'] = 'Your Posts are Not Visible to Other';
			//}
		} else {
			$arr ['error'] = Yii::t ( 'app', 'No record found...!' );
		}
	
		// $arr ['Job'] = $_POST ['Job'];
		$this->sendJSONResponse ( $arr );
	}
	
	public function actionMyRequests() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK'
		);
		$json_entry = array ();
		// $plan = User::PlanExist ();
		//$plan = User::checkPlanExist ();
	
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'create_user_id ', Yii::app ()->user->id );
		$criteria->compare ( 'type_id ', Job::POST_REQUEST );
		$results = Job::model ()->findAll ( $criteria );
		if ($results) {
			foreach ( $results as $result ) {
				$json_entry [] = $result->toArray ();
			}
			$arr ['list'] = $json_entry;
			$arr ['status'] = 'OK';
			//if (! $plan) {
				//$arr ['error'] = 'Your Posts are Not Visible to Other';
			//}
		} else {
			$arr ['error'] = Yii::t ( 'app', 'No record found...!' );
		}
	
		// $arr ['Job'] = $_POST ['Job'];
		$this->sendJSONResponse ( $arr );
	}
	public function actionMarketDemand() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		$json_entry = array ();
		$criteria = new CDbCriteria ();
	    $criteria->compare ( 'type_id ', Job::POST_REQUEST );
		$results = job::model ()->findAll ( $criteria );
		if ($results) {
			foreach ( $results as $result ) {
				$json_entry [] = $result->toArray ();
			}
			$arr ['data'] = $json_entry;
			$arr ['status'] = 'OK';
		} else {
			$arr ['error'] = Yii::t ( 'app', 'No record found...!' );
		}
		$this->sendJSONResponse ( $arr );
	}

	public function actionDelete($id) {
		$this->apiModelDelete ( $id, 'Job' );
	}
	public function actionRequirement($lang = null) {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		//if (isset ( $_GET ['test'] )) {
			//$_POST ['user'] ['language'] = 'en';
		//}
		if($lang)
		{
		$service = $this->apiLoadListForAplabetic ( 'Service' , $lang);
		$arr ['job_title'] = $service;
		
		$nationality = $this->apiLoadListForAplabetic ( 'Nationality' , $lang);
		$arr ['nationality'] = $nationality;
		
		$religion = $this->apiLoadListForAplabetic ( 'Religion' , $lang);
		$arr ['religion'] = $religion;
		
		$religion = $this->apiLoadListForAplabetic ( 'Location', $lang);
		$arr ['location'] = $religion;
		}
		else 
		{
			$service = $this->apiLoadListForAplabetic ( 'Service');
			$arr ['job_title'] = $service;
			
			$nationality = $this->apiLoadListForAplabetic ( 'Nationality');
			$arr ['nationality'] = $nationality;
			
			$religion = $this->apiLoadListForAplabetic ( 'Religion');
			$arr ['religion'] = $religion;
			
			$religion = $this->apiLoadListForAplabetic ( 'Location');
			$arr ['location'] = $religion;
		}
		// $skills = $this->apiLoadListForAll ( 'Skills' );
		// $arr ['skills'] = $skills;
		
		$arr ['status'] = 'OK';
		
		$this->sendJSONResponse ( $arr );
	}
	
/* 	public function actionSearchRequirement() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		$nationality = $this->apiLoadListForrequirement ( 'Service' );
		$arr ['job_title'] = $nationality;
		
		$nationality = $this->apiLoadListForrequirement ( 'Nationality' );
		$arr ['nationality'] = $nationality;
		
		$religion = $this->apiLoadListForrequirement ( 'Religion' );
		$arr ['religion'] = $religion;
		
		$religion = $this->apiLoadListForrequirement ( 'Location' );
		$arr ['location'] = $religion;
		
		// $skills = $this->apiLoadListForAll ( 'Skills' );
		// $arr ['skills'] = $skills;
		
		$arr ['status'] = 'OK';
		
		$this->sendJSONResponse ( $arr );
	} */
	
public function actionSearchRequirement() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		$nationality = $this->apiLoadListForrequirement ( 'Service' );
		$arr ['job_title'] = $nationality;
		
		$nationality = $this->apiLoadListForrequirement ( 'Nationality' );
		$arr ['nationality'] = $nationality;
		
		$religion = $this->apiLoadListForrequirement ( 'Religion' );
		$arr ['religion'] = $religion;
		
		$religion = $this->apiLoadListForrequirement ( 'Location' );
		$arr ['location'] = $religion;
		
		// $skills = $this->apiLoadListForAll ( 'Skills' );
		// $arr ['skills'] = $skills;
		
		$arr ['status'] = 'OK';
		
		$this->sendJSONResponse ( $arr );
	}
	
	public function actionView($id) {
		$this->apiloadModel ( $id, 'Job' );
	}
	public function actionUpdateAdvertisement($id) {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		
		$model = $this->loadModel ( $id, 'Job' );
		
		if (isset ( $_GET ['test'] )) {
			$_POST ['Job'] ['service_id'] = '52';
			$_POST ['Job'] ['nationality_id'] = '3';
			$_POST ['Job'] ['religion_id'] = '1';
			$_POST ['Job'] ['location_id'] = '24';
			$_POST ['Job'] ['age_to'] = '20';
			$_POST ['Job'] ['experience_to'] = '10';
			$_POST ['Job'] ['price'] = '10';
		}
		if (isset ( $_POST ['Job'] )) {
			$model->attributes = $_POST ['Job'];
			$model->saveUploadedFile ( $model, 'image_file' );
			if ($model->save ()) {
				$arr ['status'] = 'OK';
				$arr ['list'] [] = $model->toArray (); // $_POST;
			}
		}
		$this->sendJSONResponse ( $arr );
	}
/* 	public function actionSearch() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		$model = new Job ();
	 	if (isset ( $_GET ['test'] )) {
			 $_POST ['Job'] ['service_id'] = '';
			$_POST ['Job'] ['nationality_id'] = '';
			 $_POST ['Job'] ['religion_id'] = '';
			 $_POST ['Job'] ['location_id'] = '';
			
			 $_POST ['Job'] ['age_to'] = '';
			
			 $_POST ['Job'] ['age_from'] = '';
			 $_POST ['Job'] ['experience_to'] = '';
			$_POST ['Job'] ['experience_from'] = '';
			
			$_POST ['Job'] ['type_id'] = '';
		}
		
		
		
		$plan = User::checkPlan ();
		if ($plan) {
			if ($plan->is_expired == SubscriptionPlans::STATUS_DRAFT) {
				// print $plan->search_hits;
				$new_model = $this->loadModel ( $plan->id, 'UserPlan' );
				if ($plan->search_hits > 0) {
					$new_model->search_hits = $plan->search_hits - 1;
					
					$new_model->saveAttributes ( array (
							'search_hits' 
					) );
				} else {
					$arr ['error'] = Yii::t( 'app', 'Your Free Search Hits Are over Purchese New Plan' );
					$this->sendJSONResponse ( $arr );
				}
			}
			
			$new_model = $this->loadModel ( $plan->id, 'UserPlan' );
			$arr['get'] = $_GET;
			$arr['post'] = $_POST;
			if (isset ( $_GET['Job'] )) {
				$model->setAttributes ( $_GET ['Job'] );
				$json_list = array ();
				$models = $model->jobsearch ();
				if ($models) {
					foreach ( $models as $model ) {
						$json_list [] = $model->toArray ();
					}
					$arr ['list'] = $json_list;
					$arr ['status'] = 'OK';
					if ($plan->is_expired == SubscriptionPlans::STATUS_DRAFT) {
						$arr ['hits_left'] = $new_model->search_hits;
					}
				} else {
					$arr ['error'] = Yii::t( 'app', 'no record found' );
				}
			} else {
				
				$models = Job::model()->findAll();
				
				if ($models) {
					foreach ( $models as $model ) {
						$json_list [] = $model->toArray ();
					}
					$arr ['list'] = $json_list;
					$arr ['status'] = 'OK';
				
				}
				
				//$arr ['error'] = Yii::t ( 'app', 'data not post' );
			}
		} else {
			$arr ['error'] = 'Purchase New Subscription Plan';
		}
		
		$arr['url'] = $_SERVER['REQUEST_URI'];
		
		$this->sendJSONResponse ( $arr );
	} */
	public function actionSearch() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		$model = new Job ();
		if (isset ( $_GET ['test'] )) {
			// $_POST ['Job'] ['service_id'] = '51';
            //$_POST ['Job'] ['nationality_id'] = '8';
			// $_POST ['Job'] ['religion_id'] = '1';
			// $_POST ['Job'] ['location_id'] = '25';
			// $_POST ['Job'] ['age_to'] = '30';
			// $_POST ['Job'] ['age_from'] = '19';
			// $_POST ['Job'] ['experience_to'] = '10';
			$_POST ['Job'] ['experience_from'] = '';
			// $_POST ['Job'] ['type_id'] = '1';
		}
		/*$plan = User::checkPlanExist ();

		if ($plan) {
			
			if ($plan->is_expired == SubscriptionPlans::STATUS_DRAFT) {
				
				$new_model = $this->loadModel ( $plan->id, 'UserPlan' );
				if ($plan->search_hits > 0) {
					$new_model->search_hits = $plan->search_hits - 1;
					
					$new_model->saveAttributes ( array (
							'search_hits' 
					) );
				} else {
					$arr ['error'] = Yii::t ( 'app', 'Your Free Search Hits Are over Purchese New Plan' );
					$this->sendJSONResponse ( $arr );
				}
			}
			
			$new_model = $this->loadModel ( $plan->id, 'UserPlan' );*/
			
			if (isset ( $_POST ['Job'] )) {
				$model->setAttributes ( $_POST ['Job'] );
				$json_list = array ();
				$models = $model->jobRefineSearch ();
				if ($models) {
					foreach ( $models as $model ) {
						$json_list [] = $model->toArray ();
					}
					$arr ['list'] = $json_list;
					$arr ['status'] = 'OK';
					//if ($plan->is_expired == SubscriptionPlans::STATUS_DRAFT) {
						//$arr ['hits_left'] = $new_model->search_hits;
					//}
				} else {
					$arr ['error'] = Yii::t ( 'app', 'no record found' );
				}
			} else {
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'state_id', Job::JOB_ACTIVE );
		$criteria->compare ( 'type_id', Job::POST_ADVERTISER );
			$models = Job::model()->findAll($criteria);
				
				if ($models) {
					foreach ( $models as $model ) {
						$json_list [] = $model->toArray ();
					}
					$arr ['list'] = $json_list;
					$arr ['status'] = 'OK';
				
				}
			}
		//} else {
			//$arr ['error'] = Yii::t ( 'app', 'Purchase New Subscription Plan' );
		//}
		
		$this->sendJSONResponse ( $arr );
	}
	
	
	public function actionRefineSearch() {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK'
		);
		$model = new Job ();
		if (isset ( $_GET ['test'] )) {
			//$_POST ['Job'] ['nationality_id'] = '5';
			//$_POST ['Job'] ['religion_id'] = '1';
			// $_POST ['Job'] ['age_to'] = '20';
		}
		$plan = User::checkPlanExist ();
		if ($plan) {
			if ($plan->is_expired == SubscriptionPlans::STATUS_DRAFT) {
				// print $plan->search_hits;
				$new_model = $this->loadModel ( $plan->id, 'UserPlan' );
	
				$new_model->search_hits = $plan->search_hits - 1;
	
				$new_model->saveAttributes ( array (
						'search_hits'
				) );
			}
			if (isset ( $_POST ['Job'] )) {
				$model->setAttributes ( $_POST ['Job'] );
				$json_list = array ();
				$models = $model->jobRefineSearch ();
				if ($models) {
					foreach ( $models as $model ) {
						$json_list [] = $model->toArray ();
					}
					$arr ['list'] = $json_list;
					$arr ['status'] = 'OK';
					if ($plan->is_expired == SubscriptionPlans::STATUS_DRAFT) {
						$arr ['hits_left'] = $new_model->search_hits;
					}
				} else {
					$arr ['error'] = 'no record found';
				}
			} else {
				$arr ['error'] = 'data not post';
			}
		} else {
			$arr ['error'] = Yii::t ( 'app', 'Your Free Search Hits Are over Purchese New Plan' );
		}
		// $arr ['Job'] = $_POST ['Job'];
		$arr['url'] = $_SERVER['REQUEST_URI'];
		$this->sendJSONResponse ( $arr );
	}
	
	public function actionSetPlan($id = null) {
		$arr = array (
				'controller' => $this->id,
				'action' => $this->action->id,
				'status' => 'NOK' 
		);
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'create_user_id', Yii::app ()->User->id );
		$user_exist = UserPlan::model ()->find ( $criteria );
		if ($user_exist == null) {
			// $user = $this->loadModel($user_id, 'User');
			$user = Yii::app ()->user->model;
			
			$new_plan = $this->loadModel ( $id, 'SubscriptionPlans' );
			$total_amount = $new_plan->price + $new_plan->vat_apply;
			$model = new UserPlan ();
			$model->amount = $total_amount;
			$model->search_hits = $new_plan->search_hits;
			$model->plan_id = $new_plan->id;
			$model->state_id = SubscriptionPlans::STATUS_PAID;
			$model->validity = $new_plan->validity;
			$model->type_id = $new_plan->type_id;
			$model->start_time = date ( "Y-m-d" );
			$model->update_time = date ( "Y-m-d" );
			$model->create_user_id = $user->id;
			$model->end_time = SubscriptionPlans::getEndTime ( $new_plan->validity );
			if ($model->save ()) {
				$criteria1 = new CDbCriteria ();
				$criteria1->compare ( 'create_user_id', Yii::app ()->User->id );
				$models = Job::model ()->findAll ( $criteria1 );
				foreach ( $models as $model ) {
					$model->state_id = Job::JOB_ACTIVE;
					$updated = $model->save ();
					if ($updated == null) {
						Yii::log ( CVarDumper::dumpAsString ( "Error in update advertisement stautus" ), CLogger::LEVEL_WARNING, 'Error' );
					}
				}
				// $model->sendEmail ( $user->email, 'Registration Successful', 'registration' );
				// $this->render ( 'success', array () )
				$arr ['status'] = 'OK';
				;
			}
		} else {
			$user = Yii::app ()->user->model;
			
			$new_plan = $this->loadModel ( $id, 'SubscriptionPlans' );
			$total_amount = $new_plan->price + $new_plan->vat_apply;
			
			$user_exist->amount = $user_exist->amount + $total_amount;
			$user_exist->search_hits = $new_plan->search_hits;
			$user_exist->plan_id = $new_plan->id;
			$user_exist->state_id = SubscriptionPlans::STATUS_PAID;
			$user_exist->validity = $new_plan->validity;
			$user_exist->type_id = $new_plan->type_id;
			$user_exist->is_expired = Job::JOB_ACTIVE;
			$user_exist->start_time = date ( "Y-m-d" );
			$user_exist->update_time = date ( "Y-m-d" );
			$user_exist->create_user_id = $user->id;
			$user_exist->end_time = SubscriptionPlans::getEndTimeNew ( $new_plan->validity, $user_exist->end_time );
			if ($user_exist->save ()) {
				$criteria1 = new CDbCriteria ();
				$criteria1->compare ( 'create_user_id', Yii::app ()->User->id );
				$models = Job::model ()->findAll ( $criteria1 );
				foreach ( $models as $model ) {
					$model->state_id = Job::JOB_ACTIVE;
					$updated = $model->save ();
					if ($updated == null) {
						Yii::log ( CVarDumper::dumpAsString ( "Error in update advertisement stautus" ), CLogger::LEVEL_WARNING, 'Error' );
					}
				}
				// $model->sendEmail ( $user->email, 'Registration Successful', 'registration' );
				// $this->render ( 'success', array () )
				$arr ['status'] = 'OK';
				;
			}
		}
		$this->sendJSONResponse ( $arr );
	}
	
}
