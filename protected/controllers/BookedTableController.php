<?php

class BookedTableController extends GxController
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
            array('allow',
                'actions' => array('index', 'view', 'views', 'test', 'create', 'booked', 'canceled'/* 'download', 'thumbnail' */),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('update', 'search'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('admin', 'adminToday', 'adminHistory', 'adminUpcoming', 'canceledBookings', 'delete'),
                'expression' => 'Yii::app()->user->isAdmin',
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
        }

    public function isAllowed($model)
        {
        return $model->isAllowed();
        }

    public function actionBooked($id)
        {
        $this->pageCaption = "Book Table - Juniper Tree";
        $this->layout = '//layouts/column1';
        $model = $this->loadModel($id, 'BookedTable');
        $this->performAjaxValidation($model, 'booked-table-form');
        if (isset($_POST['BookedTable']))
            {
            $model->state_id = User::STATE_INACTIVE;
            if ($model->save())
                {
                if (Yii::app()->getRequest()->getIsAjaxRequest()) Yii::app()->end();
                $this->redirect(array('canceled', 'id' => $model->id));
                }else
                {
                $err = '';
                foreach ($model->getErrors() as $error)
                    {
                    $err .= implode(',', $error);
                    }
                echo $err;
                }
            }
        $this->render('booking_done', array('model' => $model));
        }

    public function actionView($id)
        {
        $model = $this->loadModel($id, 'BookedTable');

        //if( !($this->isAllowed ( $model)))	throw new CHttpException(403, Yii::t('app','You are not allowed to access this page.'));

        $this->updateMenuItems($model);
        $this->render('view', array(
            'model' => $model
        ));
        }

    public function actionViews($id)
        {
        $model = $this->loadModel($id, 'BookedTable');

        //if( !($this->isAllowed ( $model)))	throw new CHttpException(403, Yii::t('app','You are not allowed to access this page.'));

        $this->updateMenuItems($model);
        $this->render('view', array(
            'model' => $model
        ));
        }

    public function actionTest($id)
        {
        $model = $this->loadModel($id, 'BookedTable');
        $model->sendEmail($model->email, 'Booking Successful', 'booked');
        }

    public function actionCreate($id, $time)
        {
        $this->pageCaption = "Book Table - Juniper Tree";
        $this->layout = '//layouts/column1';
        $model = new BookedTable;
        $modelBook = $this->loadModel($id, 'BookTable');
        $this->performAjaxValidation($model, 'booked-table-form');

        if (isset($_POST['BookedTable']))
            {
            $model->setAttributes($_POST['BookedTable']);
            $model->date = $modelBook['date'];
            $model->time = $modelBook['time'];
            $model->state_id = User::STATE_ACTIVE;
            $model->party_size = $modelBook['party_size'];
            if ($model->save())
                {
                $model->sendEmail($model->email, 'Booking Successful', 'booked');
                $model->sendEmail("swap.guleria@gmail.com", 'Booking Successful', 'booked_admin');
                if (Yii::app()->getRequest()->getIsAjaxRequest()) Yii::app()->end();
                else $this->redirect(array('booked', 'id' => $model->id));
                }
//                else
//                {
//                $err = '';
//                foreach ($model->getErrors() as $error)
//                    {
//                    $err .= implode(',', $error);
//                    }
//                echo $err;
//                }
            }
        $this->updateMenuItems($model);
        $this->render('details', array('model' => $model, 'time' => $time, 'modelBook' => $modelBook));
        }

    public function actionCanceled($id)
        {
        $this->layout = '//layouts/column1';
        $model = $this->loadModel($id, 'BookedTable');
        if ($model->state_id == User::STATE_ACTIVE)
            {
            $model->sendEmail($model->email, 'Booking Canceled', 'canceled');
            $model->sendEmail("swap.guleria@gmail.com", 'Booking Canceled', 'canceled_admin');
            $model->state_id = User::STATE_INACTIVE;
            $model->save();
            }

//if( !($this->isAllowed ( $model)))	throw new CHttpException(403, Yii::t('app','You are not allowed to access this page.'));
        $this->performAjaxValidation($model, 'booked-table-form');
        $this->updateMenuItems($model);
        $this->render('booking_cancel', array(
            'model' => $model,
        ));
        }

    public function actionUpdate($id)
        {
        $model = $this->loadModel($id, 'BookedTable');

        //if( !($this->isAllowed ( $model)))	throw new CHttpException(403, Yii::t('app','You are not allowed to access this page.'));

        $this->performAjaxValidation($model, 'booked-table-form');

        if (isset($_POST['BookedTable']))
            {
            $model->setAttributes($_POST['BookedTable']);

            if ($model->save())
                {
                $this->redirect(array('view', 'id' => $model->id));
                }
            }
        $this->updateMenuItems($model);
        $this->render('update', array(
            'model' => $model,
        ));
        }

    public function actionDelete($id)
        {
        $model = $this->loadModel($id, 'BookedTable');

        //if( !($this->isAllowed ( $model)))	throw new CHttpException(403, Yii::t('app','You are not allowed to access this page.'));

        if (Yii::app()->getRequest()->getIsPostRequest())
            {
            $this->loadModel($id, 'BookedTable')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest()) $this->redirect(array('admin'));
            }
        else throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }

    public function actionIndex()
        {
        $this->updateMenuItems();
        $dataProvider = new CActiveDataProvider('BookedTable');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
        }

    public function actionSearch()
        {
        $model = new Job('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);

        if (isset($_GET['BookedTable']))
            {
            $model->setAttributes($_GET['BookedTable']);
            $this->renderPartial('_list', array(
                'dataProvider' => $model->search(),
                'model' => $model,
            ));
            }

        $this->renderPartial('_search', array(
            'model' => $model,
        ));
        }

    public function actionAdminToday()
        {
        $model = new BookedTable('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);

        if (isset($_GET['BookedTable'])) $model->setAttributes($_GET['BookedTable']);

        $this->render('adminToday', array(
            'model' => $model,
        ));
        }

    public function actionAdminHistory()
        {
        $model = new BookedTable('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);

        if (isset($_GET['BookedTable'])) $model->setAttributes($_GET['BookedTable']);

        $this->render('adminHistory', array(
            'model' => $model,
        ));
        }

    public function actionAdminUpcoming()
        {
        $model = new BookedTable('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);

        if (isset($_GET['BookedTable'])) $model->setAttributes($_GET['BookedTable']);

        $this->render('adminUpcoming', array(
            'model' => $model,
        ));
        }

    public function actionAdmin()
        {
        $model = new BookedTable('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);

        if (isset($_GET['BookedTable'])) $model->setAttributes($_GET['BookedTable']);

        $this->render('admin', array(
            'model' => $model,
        ));
        }

    public function actionCanceledBookings()
        {
        $model = new BookedTable('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);

        if (isset($_GET['BookedTable'])) $model->setAttributes($_GET['BookedTable']);

        $this->render('canceled', array(
            'model' => $model,
        ));
        }

    /* protected function processActions($model = null)
      {
      parent::processActions($model);
      //$this->actions [] = array('label'=>Yii::t('app', 'Add Skill'), 'url'=>array('skill', 'id' => $model->id),'icon'=>'icon-plus icon-white');
      } */

    protected function updateMenuItems($model = null)
        {
        // create static model if model is null
        if ($model == null) $model = new BookedTable();

        switch ($this->action->id)
            {
            case 'update':
                    {
                    $this->menu[] = array('label' => Yii::t('app', 'View'), 'url' => array('view', 'id' => $model->id), 'icon' => 'icon-plus icon-white');
                    }
            case 'create':
                    {
                    $this->menu[] = array('label' => Yii::t('app', 'Manage'), 'url' => array('admin'), 'visible' => Yii::app()->user->isAdmin, 'icon' => 'icon-wrench icon-white');
                    $this->menu[] = array('label' => Yii::t('app', 'List'), 'url' => array('index'), 'icon' => 'icon-th-list icon-white');
                    }
                break;
            case 'index':
                    {
                    $this->menu[] = array('label' => Yii::t('app', 'Manage'), 'url' => array('admin'), 'visible' => Yii::app()->user->isAdmin, 'icon' => 'icon-wrench icon-white');
                    $this->menu[] = array('label' => Yii::t('app', 'Create'), 'url' => array('create'), 'icon' => 'icon-plus icon-white');
                    }
                break;
            case 'admin':
                    {
//                    $this->menu[] = array('label' => Yii::t('app', 'List'), 'url' => array('index'), 'icon' => 'icon-th-list icon-white');
//                    $this->menu[] = array('label' => Yii::t('app', 'Create'), 'url' => array('create'), 'icon' => 'icon-plus icon-white');
                    }
                break;
            case 'canceledBookings':
                    {
//                    $this->menu[] = array('label' => Yii::t('app', 'List'), 'url' => array('index'), 'icon' => 'icon-th-list icon-white');
//                    $this->menu[] = array('label' => Yii::t('app', 'Create'), 'url' => array('create'), 'icon' => 'icon-plus icon-white');
                    }
                break;
            case 'views':
                    {
                    $this->menu[] = array('label' => Yii::t('app', 'Manage'), 'url' => array('canceledBookings'), 'visible' => Yii::app()->user->isAdmin, 'icon' => 'icon-wrench icon-white');
                    }
                break;
            default:
            case 'view':
                    {
//                    $this->menu[] = array('label' => Yii::t('app', 'List'), 'url' => array('index'), 'icon' => 'icon-th-list icon-white');
                    $this->menu[] = array('label' => Yii::t('app', 'Manage'), 'url' => array('admin'), 'visible' => Yii::app()->user->isAdmin, 'icon' => 'icon-wrench icon-white');
//                    $this->menu[] = array('label' => Yii::t('app', 'Delete'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id),
//                            'confirm' => 'Are you sure you want to delete this item?'), 'visible' => Yii::app()->user->isAdmin, 'icon' => 'icon-remove icon-white');
//                    $this->menu[] = array('label' => Yii::t('app', 'Create'), 'url' => array('create'), 'icon' => 'icon-plus icon-white');
//                    $this->menu[] = array('label' => Yii::t('app', 'Update'), 'url' => array('update', 'id' => $model->id), 'visible' => Yii::app()->user->isAdmin, 'icon' => 'icon-edit icon-white');
                    }
                break;
            }

        // Add SEO headers
        $this->processSEO($model);

        //merge actions with menu
        $this->actions = array_merge($this->actions, $this->menu);
        }

    }
