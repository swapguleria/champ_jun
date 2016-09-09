<div class="container">

<div class="login-box col-md-6 col-md-offset-3">
<center><h3><?php echo Yii::t('app', 'Signup' ); ?></h3></center>
<hr>
<?php
	$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));



	?>
</div>
</div>


