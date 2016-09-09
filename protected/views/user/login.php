<div class="container" style="min-height: 670px;">
    <div class="login-box col-md-6 col-md-offset-3">    		

        <?php
        $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'htmlOptions' => array('class' => 'login-form'),
            'focus' => array($model, 'username'),
        ));
        ?> 
        <div class="login-inner">
            <h2 class="login-title text-center"> <?php echo Yii::t('app', 'Login'); ?> </h2>


            <?php if (isset($_GET['action'])) echo CHtml::hiddenField('returnUrl', urldecode($_GET['action'])); ?>

            <div class="form-group login-icons">
                <i class="fa fa-envelope"></i>
                <?php
                echo $form->textField($model, 'username', array('placeholder' => 'Email', 'class' => 'form-control'));
                echo $form->error($model, 'username', array('style' => 'color:red;'));
                ?>
            </div>


            <div class="form-group login-icons">
                <i class="fa fa-lock"></i>
                <?php
                echo $form->passwordField($model, 'password', array('placeholder' => 'Password', 'class' => 'form-control'));
                echo $form->error($model, 'password', array('style' => 'color:red;'));
                ?> 
            </div>


            <div class="form-group">

                <div class="checkbox pull-left">
                    <label>
                        <input type="checkbox"> <?php echo Yii::t('app', 'RememberMe '); ?>
                    </label>
                </div>

                <?php // echo CHtml::link('Forgot Your Password?',$this->createUrl('user/recover'),array('class'=>'pull-right'));  ?>

                <?php //echo CHtml::link('Sign Up Now',$this->createUrl('user/signup'),array('class'=>'pull-right'));  ?>

                <div class="clearfix"></div>
            </div>

            <div class="form-group">
                <?php
                echo CHtml::submitButton('Login', array(
                    'class' => 'btn btn-primary btn-block login-btn'
                ));
                ?>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>
