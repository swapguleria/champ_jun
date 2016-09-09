<div class="container">

    <div class="login-box col-md-6 col-md-offset-3">
        <center><h3><?php echo Yii::t('app', 'Mail Chimp'); ?></h3></center>
        <hr>
        <div class="form ">
            <?php
            if (Yii::app()->user->hasFlash('newsletter'))
                {
                ?>

                <div class="alert alert-success">
                    <strong><?php echo Yii::app()->user->getFlash('newsletter'); ?></strong> 
                </div>

            <?php }
            ?>

            <?php
            $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
                'id' => 'user-form',
                'type' => 'horizontal',
                'enableAjaxValidation' => true,
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
            ?>  <?php echo $form->errorSummary($model); ?>
            <div class="form-group">
                <div class="form-group">
                    <label for="User_first_name" class="col-sm-3 control-label required">Full Name <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" maxlength="256" id="User_first_name" name="User[first_name]" placeholder="Full Name" class="form-control"required >
                        <div style="display:none" id="User_first_name_em_" class="help-block error">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-group">
                    <label for="User_email" class="col-sm-3 control-label required">Email <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" maxlength="128" id="User_email" name="User[email]" placeholder="Email" class="form-control" required>
                        <div style="display:none" id="User_email_em_" class="help-block error">
                        </div>
                    </div>
                </div>  
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-9"></div>
                    <div class="col-sm-3"><button name="yt0" type="submit" id="yw1" class="btn btn-lg">Save</button>
                    </div>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>



    </div>
</div>


<?php
//$this->widget('ext-prod.mailchimpform.MailchimpForm', array('apiKey' => '89eed72be1ed6541545bb29ac5a41ba6-us13',
//    'listId' => '441bcd7073',
//    'showName' => true));
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

