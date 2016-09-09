<?php

class MealController extends GxController
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
                'actions' => array('index', 'view', /* 'download', 'thumbnail' */),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('create', 'update', 'search'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('admin', 'delete'),
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

    public function actionView($id)
        {
        $model = $this->loadModel($id, 'Meal');

        //if( !($this->isAllowed ( $model)))	throw new CHttpException(403, Yii::t('app','You are not allowed to access this page.'));

        $this->updateMenuItems($model);
        $this->render('view', array(
            'model' => $model
        ));
        }

    public function actionCreate()
        {
        $model = new Meal;

        $this->performAjaxValidation($model, 'meal-form');

        if (isset($_POST['Meal']))
            {
            $model->setAttributes($_POST['Meal']);
            $model->saveUploadedFile($model, 'image');
            $model->saveUploadedFile($model, 'background_image');
            if ($model->save())
                {
                if (Yii::app()->getRequest()->getIsAjaxRequest()) Yii::app()->end();
                else $this->redirect(array('view', 'id' => $model->id));
                }
            }
        $this->updateMenuItems($model);
        $this->render('create', array('model' => $model));
        }

    public function actionUpdate($id)
        {
        $model = $this->loadModel($id, 'Meal');
        if ($model)
            {
            $old_image = $model->image;
            $old_background_image = $model->background_image;
            }
        //if( !($this->isAllowed ( $model)))	throw new CHttpException(403, Yii::t('app','You are not allowed to access this page.'));

        $this->performAjaxValidation($model, 'meal-form');

        if (isset($_POST['Meal']))
            {
            $model->setAttributes($_POST['Meal']);
            $image = $model->saveUploadedFile($model, 'image');
            $background_image = $model->saveUploadedFile($model, 'background_image');
            if (!$image)
                {
                $model->image = $old_image;
                }
            if (!$background_image)
                {
                $model->background_image = $old_background_image;
                }
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
        $model = $this->loadModel($id, 'Meal');

        //if( !($this->isAllowed ( $model)))	throw new CHttpException(403, Yii::t('app','You are not allowed to access this page.'));

        if (Yii::app()->getRequest()->getIsPostRequest())
            {
            $this->loadModel($id, 'Meal')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest()) $this->redirect(array('admin'));
            }
        else throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }

    public function actionIndex()
        {
        $this->updateMenuItems();
        $dataProvider = new CActiveDataProvider('Meal');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
        }

    public function actionSearch()
        {
        $model = new Job('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);

        if (isset($_GET['Meal']))
            {
            $model->setAttributes($_GET['Meal']);
            $this->renderPartial('_list', array(
                'dataProvider' => $model->search(),
                'model' => $model,
            ));
            }

        $this->renderPartial('_search', array(
            'model' => $model,
        ));
        }

    public function actionAdmin()
        {
        $model = new Meal('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);

        if (isset($_GET['Meal'])) $model->setAttributes($_GET['Meal']);

        $this->render('admin', array(
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
        if ($model == null) $model = new Meal();

        switch ($this->action->id)
            {
            case 'update':
                    {
                    $this->menu[] = array('label' => Yii::t('app', 'View'), 'url' => array('view', 'id' => $model->id), 'icon' => 'icon-plus icon-white');
                    }
            case 'create':
                    {
                    $this->menu[] = array('label' => Yii::t('app', 'Manage'), 'url' => array('admin'), 'visible' => Yii::app()->user->isAdmin, 'icon' => 'icon-wrench icon-white');
//                    $this->menu[] = array('label' => Yii::t('app', 'List'), 'url' => array('index'), 'icon' => 'icon-th-list icon-white');
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
                    $this->menu[] = array('label' => Yii::t('app', 'Create'), 'url' => array('create'), 'icon' => 'icon-plus icon-white');
                    }
                break;
            default:
            case 'view':
                    {
//                    $this->menu[] = array('label' => Yii::t('app', 'List'), 'url' => array('index'), 'icon' => 'icon-th-list icon-white');
                    $this->menu[] = array('label' => Yii::t('app', 'Manage'), 'url' => array('admin'), 'visible' => Yii::app()->user->isAdmin, 'icon' => 'icon-wrench icon-white');
//                    $this->menu[] = array('label' => Yii::t('app', 'Delete'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id),
//                            'confirm' => 'Are you sure you want to delete this item?'), 'visible' => Yii::app()->user->isAdmin, 'icon' => 'icon-remove icon-white');
                    $this->menu[] = array('label' => Yii::t('app', 'Create'), 'url' => array('create'), 'icon' => 'icon-plus icon-white');
                    $this->menu[] = array('label' => Yii::t('app', 'Update'), 'url' => array('update', 'id' => $model->id), 'visible' => Yii::app()->user->isAdmin, 'icon' => 'icon-edit icon-white');
                    }
                break;
            }

        // Add SEO headers
        $this->processSEO($model);

        //merge actions with menu
        $this->actions = array_merge($this->actions, $this->menu);
        }

    }
