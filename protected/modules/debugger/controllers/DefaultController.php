<?php

class DefaultController extends Controller
{

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/reset_column';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
				'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
						'actions'=>array('index','showlogs','deleteAssets','deleteAuthsessions','deleteUploads'),
						'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array(),
						'users'=>array('@'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array(),
						'users'=>array('admin'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
				
		);
	}
	
	
	public function actionIndex() {
	    $this->render('index');
	}
	
	public function actionDeleteUploads(){
	    $this->layout = 'reset_column';
	 
	    $path = Yii::app()->basePath . '/..' . UPLOAD_PATH;
	   
	    GxActiveRecord::rrmdir($path);
	  
	    //echo '<script>window.scroll(0, document.body.scrollHeight);</script>';
	}
	public function actionShowLogs(){
	   $this->layout = 'reset_column';
	    $url = Yii::app()->runtimePath.'/application.log';
	
	    if(file_exists($url)){
	       
	        $myfile = fopen($url, 'r');
	        //echo nl2br(fread($myfile,filesize($url)));
	        while(!feof($myfile)) {
	            echo nl2br(fgets($myfile));
	        }
	       
	    }else{
	        echo "<span style='color:green;'>No Recent Logs</span>";
	    }
	    //echo '<script>window.scroll(0, document.body.scrollHeight);</script>';
	}
	
	public function actionDeleteAssets()
	{
	    $path = Yii::app()->basePath.'/../assets';
	    GxActiveRecord::rrmdir($path);
	    $runtime = Yii::app()->runtimePath;
	    GxActiveRecord::rrmdir($runtime);
	    
	    
	}
	
	
	public function actionDeleteAuthsessions()
	{
	    $auths = AuthSession::model()->findAll();
	    if ($auths) {
    	    foreach($auths as $auth) {
    	        $auth->delete();
    	        echo "<span style='color:red;'> The user logged in from this device id is deleted : ".$auth->auth_code ."</span><br/>";
    	    }
	    }else{
	        echo "<span style='color:green'>No user is loggen in</span>";
	    }
	   
	}

	
	
}