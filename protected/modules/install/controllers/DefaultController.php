<?php
/**
 * Install
 *
 * Yii module to Intall new Project
 *
 * @version 1.0
 * Author :Karan Singh Guleriya < swap.guleriya@gmail.com >
 */

class DefaultController extends Controller
{

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';


	public function execSqlFile($sqlFile)
	{
		$message = "file not found";

		if ( file_exists($sqlFile))
		{
			$sqlArray = file_get_contents($sqlFile);

			$cmd = Yii::app()->db->createCommand($sqlArray);
			try	{
				$cmd->execute();
				$message = 'ok';
			}
			catch(CDbException $e)
			{
				$message = $e->getMessage();
			}

		}
		return $message;
	}

	public function actionStep4(){
		$main_orginal_file = 'main_original.php';
		$main_file = 'main.php';
			
		if(isset($_GET['remove'])){
			$main_file         = DB_CONFIG_PATH.$main_file;
			$main_orginal_file = DB_CONFIG_PATH.$main_orginal_file;

			if(copy($main_orginal_file, $main_file)){

				Yii::app()->user->setFlash('success', 'Installer is finished');
				$this->redirect(array('/'));
			}
		}
		$this->render('step4');
	}
	/*
	 * CREATE DATABASE
	 * STEP 3
	 * CreateDb
	 */
	public function actionStep3(){

		$config = include(DB_CONFIG_FILE_PATH);
		$config ['class'] = 'CDbConnection';

		$db = Yii::createComponent($config);

		Yii::app()->setComponent('db',$db);




		$sqlFile = __DIR__ . '/../db/install.sql';

		$message = $this->execSqlFile($sqlFile);

		if($message == 'ok'){
			Yii::app()->user->setFlash('success', 'Succesfully restored database backup file:  install.sql');
			$this->redirect(array('/install/default/step4'));
		}else{
			Yii::app()->user->setFlash('error','Unalbe to Upload the Database.');
		}
			
		$this->render('step3', array('message'=>$message));

	}
	/*
	 * STEP 2
	 * CONFIGURE THE DATABASE FILE
	 * Setupdb
	 */
	public function actionStep2(){

		$model = new SetupDb();
		$failed = false;

		if(isset($_POST['SetupDb'])){

			$model->setAttributes($_POST['SetupDb']);


			$db = Yii::createComponent(
			array(
						'class' => 'CDbConnection',
						'connectionString' => "mysql:host=$model->host:$model->port;dbname=$model->db_name",
						'emulatePrepare' => true,
						'username' => $model->username,
						'password' => $model->password,
						'charset' => 'utf8',
						'tablePrefix' => $model->table_prefix,
						'enableProfiling' => true,
						'schemaCachingDuration' => (60 * 60 * 24),
					    'queryCachingDuration'=> (60 * 60 * 24) ,
			)
			);
			try{
				Yii::app()->setComponent('db',$db);
			}catch (Exception $e){
				$model->addError('dbname', 'Your Database Detail is incorrect.');
				$failed = true;
			}

			if ( !$failed)
			{

				$text_file = "<?php
					return array( 
						'connectionString' => 'mysql:host=$model->host:$model->port;dbname=$model->db_name',
						'emulatePrepare' => true,
						'username' => '$model->username',
						'password' => '$model->password',
						'charset' => 'utf8',
						'tablePrefix' => '$model->table_prefix',
						'enableProfiling' => true,
						'schemaCachingDuration' => (60 * 60 * 24),
					    'queryCachingDuration'=> (60 * 60 * 24) ,
					);";
				$file = fopen(DB_CONFIG_FILE_PATH,'w+');
				fwrite($file, $text_file);
				fclose($file);
				$this->redirect(array('/install/default/step3'));
			}


		}
		$this->render('step2', array('model' => $model));
	}
	/*
	 * STEP 1
	 * Requirement Check
	 * Index
	 */
	public function actionIndex()
	{
		//$this->layout = '//layouts/column1';
		$this->render('index');
	}

}