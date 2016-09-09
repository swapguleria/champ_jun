<?php
$home_pages = Homepage::model()->find();
$contact_details = ContactDetails::model()->find();
?>
<div class="cutlery-section" style="background:url('/organicjunipertree/themes/basic/images/cutlery-icons.jpg') no-repeat;">
</div><!--cutlery-section-->

<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 contact-form">
                <h3>Send us message</h3>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'contact-form',
                    'enableClientValidation' => true,
                    'action' => Yii::app()->createUrl('site/contact'),
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                ));
                ?>
                <?php
                if (Yii::app()->user->hasFlash('contact'))
                    {
                    ?>

                    <div class="flash-success">
                        <?php echo Yii::app()->user->getFlash('contact'); ?>
                    </div>

                <?php
                    }
                else
                    {
                    ?>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <?php echo $form->textField($model, 'name', array('class' => 'form-control', 'placeholder' => 'Full Name')); ?>
                            <?php echo $form->error($model, 'name'); ?>
                        </div><!--col-sm-6-->
                        <div class="col-sm-6">
                            <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => 'Email Address')); ?>
                            <?php echo $form->error($model, 'email'); ?>
                        </div><!--col-sm-6-->
                    </div><!--form-group-->
                    <div class="form-group">
                        <div class="col-sm-12">
                            <?php echo $form->textArea($model, 'message', array('class' => 'form-control', 'placeholder' => 'Type Here Message')); ?>
                            <?php echo $form->error($model, 'message'); ?>
                        </div><!--col-sm-12-->
                    </div><!--form-group-->
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-default">Contact Us</button>
                        </div>
                    </div><?php } ?><!--form-group-->

                <?php $this->endWidget(); ?>
            </div><!--col-sm-9-->
            <div class="col-sm-3 contact-sidebar">
                <h3>Contact info</h3>
                <div class="site-address">
                    <h4>Address</h4>
                    <span><?php echo $contact_details->address, ",", $contact_details->city; ?></span>
                </div><!--site-address-->
                <div class="site-timings">
                    <h4>Hours</h4>
                    <span><?php echo $contact_details->working_days; ?><br/> <?php echo $contact_details->working_hours; ?></span>
                </div><!--site-address-->
                <div class="site-timings">
                    <h4>Email</h4>
                    <a href="mailto:contact@junipertree.com" target="_blank"><?php echo $contact_details->email; ?></a>
                </div><!--site-address-->
                <div class="contact-info">
                    <h4>Phone</h4>
                    <a href="tel:+<?php echo $contact_details->phone_no; ?>" target="_blank">+<?php echo $contact_details->phone_no; ?></a>
                </div><!--contact-info-->
            </div><!--col-sm-3-->
        </div><!--row-->

        <div class="row">
            <div class="col-sm-12 contact-map">
                <?php echo $contact_details->map; ?>
            </div><!--col-sm-12-->
        </div><!--row-->

    </div><!--container-->
</section><!--contact-block-->




<!--    <div class="container">
        <div class="box-1 row" style="min-height: 640px;">
            <div class="page-header">
                <h3>Contact US</h3>
            </div>





            <div class="col-md-7">

                <h4 class="page_title">Please Add Your Details</h4>
                <hr>-->

<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

//	$this->pageTitle=Yii::app()->name . ' - Contact Us';
//	$this->breadcrumbs=array(
//		'Contact',
//	);
?>



<?php
//                $form = $this->beginWidget('CActiveForm', array(
//                    'id' => 'contact-form',
//                    'enableClientValidation' => true,
//                    'action' => Yii::app()->createUrl('site/contact'),
//                    'clientOptions' => array(
//                        'validateOnSubmit' => true,
//                    ),
//                ));
?>
<!--                <div class="form-group">

                    <input class="form-control" name="ContactForm[name]" id="ContactForm_name" type="text"><div class="errorMessage" id="ContactForm_name_em_" style="display:none"></div>              
<?php // echo $form->labelEx($model, 'name', array('class' => 'col-md-3'));    ?>
                    <div class="col-md-9">

<?php // echo $form->error($model, 'name');    ?>
                    </div>
                    <div class="clearfix"></div>
                </div>-->

<!--                <div class="form-group">
<?php // echo $form->labelEx($model, 'email', array('class' => 'col-md-3'));    ?>
                    <div class="col-md-9">
<?php // echo $form->textField($model, 'email', array('class' => 'form-control')); ?>
<?php // echo $form->error($model, 'email');    ?>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
<?php // echo $form->labelEx($model, 'subject', array('class' => 'col-md-3'));    ?>
                    <div class="col-md-9">
<?php // echo $form->textField($model, 'subject', array('class' => 'form-control')); ?>
<?php // echo $form->error($model, 'subject');    ?>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
<?php // echo $form->labelEx($model, 'message', array('class' => 'col-md-3'));    ?>
                    <div class="col-md-9">
<?php // echo $form->textArea($model, 'message', array('class' => 'form-control'));    ?>
                        
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group ">
                    <label class="col-md-3"></label>
                    <div class="col-md-9">
                        <button class="btn btn-default" type="submit">Book now</button>
<?php // echo CHtml::submitButton('Submit', array('class'=>'btn btn-primary'));     ?>
                    </div>
                    <div class="clearfix"></div>
                </div>-->



<!--form--> 

<?php // endif;    ?>

<!--        </div>



        <div class="clearfix"></div>
    </div>

</div>-->


<?php // $this->endWidget(); ?>
