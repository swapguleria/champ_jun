<?php

class UserController extends GxController
    {

    public $layout = 'column2';
    public $defaultAction = 'login';
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
                    'deleteAssets',
                    'showLogs',
                    'signup',
                    'login',
                    'changepassword',
                    'recover',
                    'download',
                    'activate',
                    'thumbnail',
                    'thumb',
                    'email',
                    'newsletter',
                    'setPassword',
                    'test',
                ),
                'users' => array(
                    '*'
                )
            ),
            array(
                'allow',
                'actions' => array(
                    'view',
                    'updateEmail',
                    'verifyemail',
                    'setLocation',
                    'update',
                    'tos',
                    'cancel',
                    'search',
                    'logout',
                    'change',
                    'toggle',
                ),
                'users' => array(
                    '@'
                )
            ),
            array(
                'allow',
                'actions' => array(
                    'admin',
                    'delete',
                    'view',
                    'account',
                    'empty'
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

    public function actionChange()
        {
        $models = Nationality::model()->findAll();
        foreach ($models as $model)
            {

            $model->title_arabic = Yii::t('app', $model->title);
            $model->save();
            }
        }

    public function actionToggle()
        {
//        print_r($_POST);
        $id = $_REQUEST['pk'];

        $model = $this->loadModel($id, 'User');

        if ($model->state_id == User::STATE_INACTIVE)
            {
            $model->state_id = User::STATE_ACTIVE;
            }
        elseif ($model->state_id == User::STATE_ACTIVE)
            {
            $model->state_id = User::STATE_INACTIVE;
            }
        else
            {
            $model->state_id = User::STATE_INACTIVE;
            }

        $model->saveAttributes(array('state_id'));
        $this->redirect(array('admin'));
        }

    public function actionSetPassword($id, $key)
        {
        $model = new User();
        $user = $this->loadModel($id, 'User');
        $user->setScenario('changePassword');
        if ($user && $key)
            {
            $this->performAjaxValidation($model, 'change-password-form');
            if (isset($_POST['User']))
                {
                $model->setAttributes($_POST['User']);
                if ($_POST['User']['password_2'] == null)
                    {
                    $user->addError('password_2', " Retype Password is required");
                    }
                if ($_POST['User']['password'] == null)
                    {
                    $user->addError('password', " Password is required");
                    }
                else
                if ($_POST['User']['password_2'] == $_POST['User']['password'])
                    {
                    if ($user->activation_key == $key)
                        {
                        if ($user->setPassword($_POST['User']['password']))
                            {
                            $user->activation_key = '';
                            $user->saveAttributes(array(
                                'activation_key'
                            ));
                            Yii::app()->user->setFlash('changePassword', 'Your password is changed successfully !!');
                            }
                        else
                            {
                            echo $user->getErrors();
                            Yii::app()->user->setFlash('changePassword', 'Your password is not changed!!');
                            }
                        }
                    else
                        {
                        Yii::app()->user->setFlash('changePassword', 'Your key is expired, please retry!!');
                        }
                    }
                else
                    {
                    Yii::app()->user->setFlash('changePassword', 'Confirm Password must be repeated exactly.');
                    }
                }
            }
        else
            {
            Yii::app()->user->setFlash('changePassword', 'operation not allowed');
            }

        $user->password = null;
        $this->render('setPassword', array(
            'model' => $user,
            'key' => $key
        ));
        }

    public function actionTos()
        {
        $id = Yii::app()->user->id;
        $model = Yii::app()->user->model;

        if (isset($_POST ['User']))
            {
            if ($_POST ['User'] ['tos'] != 0)
                {
                $model->tos = $_POST ['User'] ['tos'];
                $model->save();

                $this->redirect(array(''));     //redirect to that action that you want.
                }
            }
        $this->render('tos', array(
            'model' => $model
        ));
        }

    public function actionLogout()
        {
// If the user is already logged out send them to returnLogoutUrl
        if (Yii::app()->user->isGuest) $this->redirect(Yii::app()->array('/user/login'));

// let's delete the login_type cookie
        $cookie = Yii::app()->request->cookies ['login_type'];
        if ($cookie)
            {
            $cookie->expire = time() - (3600 * 72);
            Yii::app()->request->cookies ['login_type'] = $cookie;
            }
            {
            Yii::app()->user->logout();
            }
        $this->redirect(Yii::app()->homeUrl);
        }

    public function loginByUsername()
        {

        $user = User::model()->findByAttributes(array(
            'username' => $this->loginForm->username
        ));
        if ($user)
            {
            if ($user->role_id == User::ROLE_ADMIN)
                {
                return $this->authenticate($user);
                }
            else
                {
                $this->loginForm->addError('password', Yii::t('app', 'You are not authorised user'));
                }
            }
        else
            {
            Yii::log(Yii::t('app', 'Non-existent user {username} tried to log in (Ip-Address: {ip})', array(
                        '{ip}' => Yii::app()->request->getUserHostAddress(),
                        '{username}' => $this->loginForm->username
                    )), 'error');
            }

        return false;
        }

    public function authenticate($user)
        {
        $identity = new UserIdentity($user->email, $this->loginForm->password);
        $identity->authenticate();

        switch ($identity->errorCode)
            {
            case UserIdentity::ERROR_NONE :

// $duration = $this->loginForm->rememberMe ? 3600*24*30 : 0; // 30 days
                $duration = 3600 * 24 * 30; // 30 days
                Yii::app()->user->login($identity, $duration);
                return $user;
                break;
            case UserIdentity::ERROR_EMAIL_INVALID :
                $this->loginForm->addError("password", Yii::t('app', 'Username or Password is incorrect'));
                break;
            case UserIdentity::ERROR_STATUS_INACTIVE :
                $this->loginForm->addError("status", Yii::t('app', 'This account is not activated.'));
                break;
            case UserIdentity::ERROR_STATUS_BANNED :
                $this->loginForm->addError("status", Yii::t('app', 'This account is blocked.'));
                break;
            case UserIdentity::ERROR_STATUS_REMOVED :
                $this->loginForm->addError('status', Yii::t('app', 'Your account has been deleted.'));
                break;

            case UserIdentity::ERROR_PASSWORD_INVALID :
                Yii::log(Yii::t('app', 'Password invalid for user {username} (Ip-Address: {ip})', array(
                            '{ip}' => Yii::app()->request->getUserHostAddress(),
                            '{username}' => $this->loginForm->username
                        )), 'error');

                if (!$this->loginForm->hasErrors()) $this->loginForm->addError("password", Yii::t('app', 'Username or Password is incorrect'));
                break;
                return false;
            }
        }

    public function actionLogin()
        {
        $this->pageCaption = 'Juniper Tree';
        if (!Yii::app()->user->isGuest) $this->redirect(array("user/account"));
        $this->loginForm = new LoginForm ();
        $success = false;
        $action = 'login';
        $login_type = null;
        if (isset($_POST ['LoginForm']))
            {
            $this->loginForm->attributes = $_POST ['LoginForm'];
            if ($this->loginForm->validate())
                {
                $success = $this->loginByUsername();
                }
            if ($success instanceof User)
                {
// cookie with login type for later flow control in app
                $cookie = new CHttpCookie('login_type', serialize($login_type));
                $cookie->expire = time() + (3600 * 24 * 30);
                Yii::app()->request->cookies ['login_type'] = $cookie;
// Yii::log('User :'.$success->username.' successfully logged in (IP:'. Yii::app()->request->getUserHostAddress());
                Yii::log('User :' . $success->email . ' successfully logged in (IP:' . Yii::app()->request->getUserHostAddress());
                $this->redirectUser($success);
                }
            else
                {
                if (!$this->loginForm->hasErrors()) $this->loginForm->addError('username', 'Login is not possible with the given credentials');
                }
            }


        $this->render('login', array(
            'model' => $this->loginForm,
        ));
        }

    public function redirectUser($user)
        {
        $user->updateLastVisit();


        if ($user->isAdmin && $this->returnAdminUrl) $this->redirect($this->returnAdminUrl);
        if ($user->isAdmin)
            {
            $this->redirect(array('dashboard/index'));
            }
        if (isset(Yii::app()->user->returnUrl)) $this->redirect(Yii::app()->user->returnUrl);

        $this->redirect(array("user/account"));
        }

    public function actionUpdateEmail()
        {
        $id = Yii::app()->user->id;
        $model = $this->loadModel($id, 'User');
        if (isset($_POST ['User']))
            {
            $model->setAttributes($_POST ['User']);
            $model->email = $_POST ['User'] ['email'];
            if ($model->role_id == User::ROLE_ADMIN)
                {
                $model->email_verified = User::EMAIL_VERIFIED;
                }
            else
                {
                $model->email_verified = User::EMAIL_NOT_VERIFIED;
                }
            $model->save();
            $this->redirect(array(
                'account'
            ));
            }

        $this->render('updateemail', array(
            'model' => $model
        ));
        }

    public function actionVerifyEmail()
        {
        $id = Yii::app()->user->id;
        $model = $this->loadModel($id, 'User');
        $model->sendInstantUserEmail($model);
        Yii::app()->user->setFlash('verfiyEmail', 'Request for Email Verification has been sent');

        $this->redirect(array(
            'account'
        ));

        $this->render('updateemail', array(
            'model' => $model
        ));
        }

    public function actionRecover()
        {
        $model = new User ();

        $this->performAjaxValidation($model, 'user-form');

        if (isset($_POST ['User']))
            {
            $email = $_POST ['User'] ['email'];
            $user = User::model()->findByAttributes(array(
                'email' => $email
            ));
            if ($user)
                {
                $email = $user->email;
                $view = "password_recovery";

                $sub = "Recover Your Account at: ";
                $user->sendEmail($email, $sub, $view);
                Yii::app()->user->setFlash('recover', 'Please check your email to reset your password.');
                }
            else
                {

                Yii::app()->user->setFlash('recover', 'Email is not registered.');
                }
            }

        $this->render('recover', array(
            'model' => $model
        ));
        }

    public function actionChangepassword($id = null)
        {

        if ($id == null)
            {
            $id = Yii::app()->user->id;
            }
        $model = $this->loadModel($id, 'User');


        if (!($this->isAllowed($model))) throw new CHttpException(403, Yii::t('app', 'You are not allowed to access this page.'));


        $model->scenario = 'changepassword';
        $this->updateMenuItems();
        $this->performAjaxValidation($model, 'user-form');

        if (isset($_POST ['User']) && isset($_POST ['User'] ['password']))
            {

            if ($model->setPassword($_POST ['User'] ['password'], $_POST ['User'] ['password_2']))
                {
                Yii::app()->user->setFlash('success', 'Your password is successfully changed.');
                }
            }

        $model->password = null; // empty it
        $this->render('changepassword', array(
            'model' => $model
        ));
        }

    public function actionEmail($email)
        {

        $model = new User ();
        $model->email = $email;
// 		print_r($model->email);exit;
        if ($model->save()) echo json_encode("data is Save");
        else
            {

            echo json_encode("data is Not Save");
            }

//$this->render('index2');
        }

    public function actionActivate($id, $key, $mode)
        {
        $model = $this->loadModel($id, 'User');

        if ($mode == 'recover') $model->state_id = User::STATE_INACTIVE;

        $ret = $model->activate($model->email, $key, $mode);

        if ($mode == 'login')
            {

            if ($ret == 1)
                {
                Yii::app()->user->setFlash('register', '<i class="fa fa-thumbs-o-up"></i>  Congratulations! Your account is activated. Click here to  ');
                $this->render('accountVerified');
                }
            else
            if ($ret == - 2)
                {

                Yii::app()->user->setFlash('register', 'Invalid activation key.');
// $this->redirect(array('login'));
                $this->render('accountVerified');
                }
            else
                {
                Yii::app()->user->setFlash('register', '<i class="fa fa-thumbs-o-up"></i>Your account is already activated. Click here to  ');
                $this->render('accountVerified');
                }
            }
        $this->render('accountVerified', array(
            'model' => $model
        ));
        }

    public function actionView($id)
        {

        $model = $this->loadModel($id, 'User');

        if (!($this->isAllowed($model))) throw new CHttpException(403, Yii::t('app', 'You are not allowed to access this page.'));

// $this->processActions($model);
        $this->updateMenuItems($model);
        $this->render('view', array(
            'model' => $model
        ));
        }

    public function isAllowed($model)
        {
        return $model->isAllowed();
        }

    public function actionSignup()
        {
        $this->layout = '//layouts/column1';
        $model = new User('create');

        $this->performAjaxValidation($model, 'user-form');

        if (isset($_POST ['User']))
            {


            $model->setAttributes($_POST ['User']);

            $user = User::getUserByEmail($model->email);
            if (!$user)
                {

                $model->state_id = User::STATE_ACTIVE;
                if ($model->role_id == null) $model->role_id = User::ROLE_USER;

                if ($model->save())
                    {
                    $model->saveUploadedFile($model, 'image_file');
                    if (isset($model->password) && $model->setPassword($model->password, $model->password_2))
                        {
                        $login = new LoginForm ();
                        $login->username = $model->first_name;
                        $login->email = $model->email;
                        $login->password = $_POST ['User'] ['password'];
                        $this->loginForm = $login;
                        if ($login->validate() && $this->authenticate($login))
                            {
                            $this->redirect(array('account'));   //redirect to action that you want.
                            }
                        else
                            {
                            echo 'Not authenticated';
                            }
// 						exit ();
                        }
                    else
                        {
                        $model->addError('password', 'Password not set');
                        }
                    }
                }
            else
                {
                echo $model->addError('email', 'Email already exist.');
                }
            }

        $this->updateMenuItems($model);
        $this->render('signup', array(
            'model' => $model
        ));
        }

    public function actionNewsletter()
        {
        $this->layout = '//layouts/column1';
        $model = new User('create');

        if (isset($_POST ['User']))
            {
            $model->setAttributes($_POST ['User']);
            $already_subscribed = Yii::app()->mailchimp->emailExists($model->email);
            if ($already_subscribed)
                {
                echo $model->addError('email', 'Email Already Subscribed.');
                }
            else
                {
                $model->setAttributes($_POST ['User']);

                $subscribe = Yii::app()->mailchimp->listSubscribe($model->email, $model->first_name, $doubleOptIn = true);
//                $subscribe = Yii::app()->mailchimp->emailExists($model->email);
                if ($subscribe)
                    {
//                    echo "Sda";
                    Yii::app()->user->setFlash('newsletter', 'Please Check your email ' . $model->email);
                    $this->redirect(array('user/newsletter'));   //redirect to action that you want.
                    }
//                else
//                    {
////                    echo "not Sent";
//                    }
                }
            }
        $this->updateMenuItems($model);
        $this->render('newsletter', array(
            'model' => $model
        ));
        }

    public function actionUpdate($id = null)
        {
        if ($id == null)
            {
            $id = Yii::app()->user->id;
            }
        $model = $this->loadModel($id, 'User');
        if ($model)
            {
            $old_image = $model->image_file;
            }
        $this->performAjaxValidation($model, 'user-form');
        if (!($this->isAllowed($model))) throw new CHttpException(403, Yii::t('app', 'You are not allowed to access this page.'));



        if (isset($_POST ['User']))
            {
            $model->setAttributes($_POST ['User']);
            $image = $model->saveUploadedFile($model, 'image_file');

            if (!$image)
                {
                $model->image_file = $old_image;
                }

            if ($model->save())
                {


                $this->redirect(array(
                    'view',
                    'id' => $model->id
                ));
                }
            else
                {
// 				print_r($model->getErrors());
                }
            }
        $this->updateMenuItems($model);
        $this->render('update', array(
            'model' => $model
        ));
        }

    public function actionDelete($id)
        {
        $model = $this->loadModel($id, 'User');

        if (Yii::app()->getRequest())
            {
            if ($this->loadModel($id, 'User')->delete())
                {
                Yii::app()->user->setFlash('user', 'The user has been sucessfully deleted.');
                $this->redirect(array(
                    'admin'
                ));
                }

            if (!Yii::app()->getRequest()->getIsAjaxRequest()) $this->redirect(array(
                    'admin'
                ));
            }
        else throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }

    public function actionSearch()
        {
        $model = new Job('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);

        if (isset($_GET ['User']))
            {
            $model->setAttributes($_GET ['User']);
            $this->renderPartial('_list', array(
                'dataProvider' => $model->search(),
                'model' => $model
            ));
            }

        $this->renderPartial('_search', array(
            'model' => $model
        ));
        }

    public function actionindex($email)
        {
//$button= $_GET['button'];

        $ans = new User;
        $ans->email = $email;
        $ans->save();
        $this->render('index');
        }

//    public function actionToggle()
//        {
//
//        print_r($_POST);
//        print_r($_REQUEST['pk']);
////        echo "sad";
//        return array(
//            'toggle' => array(
//                'class' => 'booster.actions.TbToggleAction',
//                'modelName' => 'state_id',
//            )
//        );
//        }

    public function actionAdmin()
        {
        $model = new User('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);

        if (isset($_GET ['User'])) $model->setAttributes($_GET ['User']);
        $this->render('admin', array(
            'model' => $model,
        ));
        }

    public function actionTest()
        {
        $model = new User('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);

        if (isset($_GET ['User'])) $model->setAttributes($_GET ['User']);
        $this->render('test', array(
            'model' => $model,
        ));
        }

    public function actionAccount($id = null)
        {
        if ($id == null) $id = Yii::app()->user->id;

        $model = User::model()->findByPk($id);
        if (!($this->isAllowed($model))) throw new CHttpException(403, Yii::t('app', 'You are not allowed to access this page.'));

        $this->updateMenuItems($model);
        $this->render('view', array(
            'model' => $model
        ));
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
