
<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactForm extends CFormModel
{
	public $name;
	public $email;
//	public $subject;
	public $message;
	public $body;
	public $address = null;
	public $url = null;

	/**
	 * Declares the validation rules.
	 */



	public function sendContactFormMail()
	{
		Yii::import('ext-prod.yii-mail.YiiMailMessage');
		$message = new YiiMailMessage;
		$message->view = 'hello';

		$message->setSubject('Welcome to ' . Yii::app()->params['company']);

		//userModel is passed to the view
		$message->setBody(array('model'=>$this), 'text/html');
		$message->body;
		$message->addTo($this->email);
		$message->from = Yii::app()->params['adminEmail'];
		self::sendEmailLoadShared($message);
	}
	public function rules()
	{
		return array(
		// name, email, subject and body are required
		array('name, email, message', 'required'),
		// email has to be a valid email address
		array('email', 'email'),
		
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
//'verifyCode'=>'Verification Code',
		);
	}
}
?>