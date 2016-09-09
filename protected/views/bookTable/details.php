<?php
$home_pages = Homepage::model()->find();
$contact_details = ContactDetails::model()->find();
?>
<section id="book-content" class="booking-here book-details">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-details text-center">
                    <h2>Your Details</h2>
                    <p>You are about to make a booking for <?php echo $model['party_size']; ?> people at <a href="#">Juniper Tree</a> on <span><?php echo date('dS M Y', strtotime($model['date'])); ?></span> at <span><?php echo $time; ?> pm</span></p>
                    <div class="detail-form">
                        <?php
//                        print_r($model);
                        $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
                            'id' => 'book-table-form',
                            'type' => 'horizontal',
                            'enableAjaxValidation' => true,
                            'htmlOptions' => array('enctype' => 'multipart/form-data'),
                        ));
                        ?>  
                        <div class="form-group">
                            <div class="col-sm-6"><input type="text" value="" maxlength="255" id="BookTable_first_name" name="BookTable[first_name]" placeholder="First Name" class="form-control">
                                <div style="display:none" id="BookTable_first_name_em_" class="help-block error"></div>

                            </div>
                            <div class="col-sm-6">
                                <input type="text" value="" maxlength="255" id="BookTable_last_name" name="BookTable[last_name]" placeholder="Last Name" class="form-control">
                                <div style="display:none" id="BookTable_first_name_em_" class="help-block error"></div></div></div>

                        <div class="form-group">
                            <div class="col-sm-12"><input type="text" value="" maxlength="255" id="BookTable_email" name="BookTable[email]" placeholder="Email" class="form-control">
                                <div style="display:none" id="BookTable_email_em_" class="help-block error"></div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12"><input type="text" value="" maxlength="255" id="BookTable_phone" name="BookTable[phone]" placeholder="Phone" class="form-control">
                                <div style="display:none" id="BookTable_phone_em_" class="help-block error"></div>

                            </div>
                        </div>

                        <!--form-group-->
                        <span>Special Requests</span>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea id="BookTable_special_request" name="BookTable[special_request]" placeholder="Enter Text" class="form-control"></textarea>
                            </div><!--col-sm-12-->
                        </div><!--form-group-->
                        <div class="client-feedback">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>
                        </div><!--client-feedback-->
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="BookTable[email_subscription]" value="1">
                                        <span>I would like to subscribe to receive information about private dining and events</span>
                                    </label>
                                </div><!--checkbox-->
                            </div><!--col-sm-12-->    
                        </div><!--form-group-->
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button name="yt0" type="submit" id="yw0" class="btn btn-default">Confirm booking</button>
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


<!--<div class="container page_content">
    <div class="white_bg">
        <br>
        <br>
        <br>
        <hr>

<?php
//        $this->widget(
//                'booster.widgets.TbDatePicker', array(
//            'name' => 'some_date',
//            'htmlOptions' => array('class' => 'col-md-4'),
//                )
//        );
?>

        <hr>
        <br>
        <br>
        <br>
    </div>
</div>-->