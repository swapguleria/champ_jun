<?php
$home_pages = Homepage::model()->find();
$contact_details = ContactDetails::model()->find();
$book_pages = BookPage::model()->find();
?>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<section id="book-content" class="booking-here book-details">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-details text-center">
                    <h2>Your Details</h2>
                    <p>You are about to make a booking for <?php echo $modelBook['party_size']; ?> people at <a href="#">Juniper Tree</a> on <span><?php echo date('dS M Y', strtotime($modelBook['date'])); ?></span> at <span><?php echo $time; ?> </span></p>
                    <div class="detail-form">

                        <?php
                        $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
                            'id' => 'booked-table-form',
//                            'type' => 'horizontal',
                            'enableAjaxValidation' => true,
                            'htmlOptions' => array('enctype' => 'multipart/form-data'),
                        ));
                        ?>
                        <div class="form-group">
                            <div class="col-sm-6">

                                <?php echo $form->textFieldGroup($model, 'first_name', array('class' => 'form-control', 'maxlength' => 255, 'label' => '')); ?>
                            </div>
                            <div class="col-sm-6">
                                <?php echo $form->textFieldGroup($model, 'last_name', array('class' => 'form-control', 'maxlength' => 255, 'label' => '')); ?></div></div>

                        <div class="form-group">
                            <div class="col-sm-12"> <?php echo $form->textFieldGroup($model, 'email', array('class' => 'form-control', 'maxlength' => 255, 'label' => '')); ?>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12"> <?php echo $form->textFieldGroup($model, 'phone_no', array('class' => 'form-control', 'label' => '')); ?>

                            </div>
                        </div>

                        <!--form-group-->
                        <div class="form-group">
                            <div class="col-sm-12">
                                <?php echo $form->textAreaGroup($model, 'special_request', array('class' => 'form-control', 'rows' => 5, 'label' => '')); ?>
                            </div><!--col-sm-12-->
                        </div><!--form-group-->
                        <div class="client-feedback">
                            <p><?= $book_pages->cnf_descp ?>
                              
                            </p>
                        </div><!--client-feedback-->
                        <div class="form-group">
                            <div class="col-sm-12">
                                <!--<div class="checkbox">-->

                                <?php echo $form->checkboxGroup($model, 'email_subscription', array('rows' => 5, 'label' => $book_pages->cnf_checkbox_text)); ?>

                                <!--</div>checkbox-->
                            </div><!--col-sm-12-->    
                        </div><!--form-group-->
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button name="yt0" type="submit" id="yw0" class="btn btn-default"><?= $book_pages->cnf_btn_text ?></button>
                                <!--<button type="submit" class="btn btn-default">Confirm booking</button>-->
                            </div><!--col-sm-12-->
                        </div><!--form-group-->
                        <?php $this->endWidget(); ?>
                    </div><!--detail-form-->
                </div><!--form-details-->
            </div><!--col-sm-12-->
        </div><!--row-->
    </div><!--container-->
</section><!--booking-here-->