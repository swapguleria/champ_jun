<?php
/**
 * Install
 * 
 * Yii module to backup, restore databse
 * 
 * @version 1.0
 * Author :Karan Singh Guleriya < swap.guleriya@gmail.com >
 */
class InstallModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'install.models.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
