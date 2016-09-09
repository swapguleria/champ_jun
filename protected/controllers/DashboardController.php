<?php

class DashboardController extends GxController
    {

    public function filters()
        {
        return array(
            'accessControl',
        );
        }

    public function accessRules()
        {
        return array(
            array(
                'allow',
                'actions' => array(
                    'index',
                ),
                'expression' => 'Yii::app()->user->isAdmin'
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
        }

//    public function actionAdminToday()
//        {
//        $model = new BookedTable('search');
//        $model->unsetAttributes();
//        $this->updateMenuItems($model);
//
//        if (isset($_GET['BookedTable'])) $model->setAttributes($_GET['BookedTable']);
//
//        $this->render('adminToday', array(
//            'model' => $model,
//        ));
//        }

    public function actionIndex()
        {
        $criteria = new CDbCriteria;
        $criteria->compare('date', date('Y-m-d'));
        $criteria->compare('state_id', User::STATE_ACTIVE);
        $todays_booking = BookedTable::model()->count($criteria);



        $now = new CDbExpression("NOW()");
        $criteria = new CDbCriteria;
        $criteria->addCondition('date > ' . $now);
        $criteria->compare('state_id', User::STATE_ACTIVE);
        $criteria->order = 'time DESC';
        $upcoming_booking = BookedTable::model()->count($criteria);

        $criteria = new CDbCriteria;
        $criteria->compare('state_id', User::STATE_INACTIVE);
        $canceled_booking = BookedTable::model()->count($criteria);

        $total_menu_items = MealItem::model()->count();

        $model = new BookedTable('search');
//        $lists = Yii::app()->mailchimp->lists();
//        $data = Yii::app()->mailchimp->emailExists("neerajk@gmaila.com");
//        echo "<pre>";
//        print_r($data);
//        $total_users = User::model()->count();
//        $total_jobs = $total_requirements = $total_transection = 10;
//	$criteria=new CDbCriteria();
//	$criteria->Compare('type_id',Job::POST_ADVERTISER);
//	$total_jobs =Job::model()->count($criteria);
//
//	
//	$criteria=new CDbCriteria();
//	$criteria->Compare('type_id',Job::POST_REQUEST);
//	$total_requirements =Job::model()->count($criteria);
//	
//	
//		$criteria=new CDbCriteria();
//		$criteria->addCondition('type_id='.SubscriptionPlans::SUBSCRIPTION_PAID);
//		$total_transection=UserPlan::model()->count($criteria);
//
//        $model = new user ( );
//		$model = new Job ( 'search' );
// 		$model->unsetAttributes ();


        $this->render('index', array(
            'todays_booking' => $todays_booking,
            'upcoming_booking' => $upcoming_booking,
            'canceled_booking' => $canceled_booking,
            'total_menu_items' => $total_menu_items,
            'model' => $model
        ));
        }

    }
