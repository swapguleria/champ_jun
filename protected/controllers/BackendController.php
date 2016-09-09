<?php

class BackendController extends GxController
    {

    public $layout = 'column2';
//    public $defaultAction = 'login';
    public $loginForm = null;
    public $caseSensitiveUsers = true;
    public $returnAdminUrl = null;

// Allow login only by username by default.

    public function filters()
        {
        return array(
            'accessControl'
                )
        ;
        }

    public function accessRules()
        {
        return array(
            array(
                'allow',
                'actions' => array(
                    'test',
                ),
                'users' => array(
                    '*'
                )
            ),
            array(
                'allow',
                'actions' => array(
                    'toggle',
                ),
                'users' => array(
                    '@'
                )
            ),
            array(
                'allow',
                'actions' => array(
                    'index'
                ),
                'expression' => 'Yii::app()->user->isAdmin'
            ),
            array(
                'deny',
                'users' => array(
                    '*'
                )
            )
        );
        }

    public function actionindex()
        {
        $this->redirect(array('user/account'));
        }

    protected function updateMenuItems($model = null)
        {
// create static model if model is null
        if ($model == null) $model = new User ();

        switch ($this->action->id)
            {
            case 'update' :
                    {
                    $this->menu [] = array('label' => Yii::t('app', 'View'), 'url' => array('view',
                            'id' => $model->id
                        ),
                        'icon' => 'glyphicon glyphicon-eye-open '
                    );
                    }
            case 'create' :
                    {
                    $this->menu [] = array(
                        'label' => Yii::t('app', 'Manage'),
                        'url' => array(
                            'admin'
                        ),
                        'visible' => Yii::app()->user->isAdmin,
                        'icon' => 'fa fa-wrench '
                    );
// $this->menu[] = array('label'=>Yii::t('app', 'List'), 'url'=>array('index'),'icon'=>'icon-th-list ');
                    }
                break;
            case 'index' :
                    {
// $this->menu[] = array('label'=>Yii::t('app', 'Manage'), 'url'=>array('admin'), 'visible'=> Yii::app()->user->isAdmin,'icon'=>'fa fa-wrench ');
                    $this->menu [] = array(
                        'label' => Yii::t('app', 'Create'),
                        'url' => array(
                            'signup'
                        ),
                        'icon' => 'fa fa-plus ',
                        'visible' => Yii::app()->user->isAdmin
                    );
                    }
                break;
            case 'admin' :
                    {
//$this->menu[] = array('label'=>Yii::t('app', 'List'), 'url'=>array('index'),'icon'=>'icon-th-list ');
// $this->menu[] = array('label'=>Yii::t('app', 'Create'), 'url'=>array('signup'),'icon'=>'fa fa-plus ', 'visible'=> Yii::app()->user->isAdmin);
                    }
                break;

            default :
            case 'view' :
                    {

                    $this->menu [] = array(
                        'label' => Yii::t('app', 'Update'),
                        'url' => array(
                            'update',
                            'id' => $model->id
                        ),
                        'icon' => 'fa fa-pencil-square-o ',
                        'visible' => Yii::app()->user->isAdmin
                    );
                    }
                break;
            case 'profile' :
                    {

                    $this->menu [] = array(
                        'label' => Yii::t('app', 'Update'),
                        'url' => array(
                            'update',
                            'id' => $model->id
                        ),
                        'fa' => 'fa-pencil ',
                        'visible' => Yii::app()->user->isAdmin
                    );
                    }
                break;
            }

// Add SEO headers
        $this->processSEO($model);

// merge actions with menu
        $this->actions = array_merge($this->actions, $this->menu);
        }

    public function beforeAction($event)
        {
        if (Yii::app()->user->isGuest) $this->layout = '//layouts/column1';
        return parent::beforeAction($event);
        }

    }
