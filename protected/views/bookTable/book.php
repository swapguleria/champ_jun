<?php
$home_pages = Homepage::model()->find();
$book_pages = BookPage::model()->find();
$contact_details = ContactDetails::model()->find();
?>

<section id="book-content" class="booking-here" style="background:url(<?php echo Yii::app()->request->baseUrl . '/wdir/uploads/' . $book_pages->image_right; ?>) no-repeat;">
    <div class="outer-section" style="background:url(<?php echo Yii::app()->request->baseUrl . '/wdir/uploads/' . $book_pages->image_left; ?>) no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 booking-description">
                    <p><?php echo $book_pages->description; ?></p>
                </div><!--booking-description-->
            </div><!--row-->
            <div class="row">
                <div class="block-area">
                    <div class="block-inner-section">
                        <div class="col-sm-6">
                            <div class="img-section">
                                <?php
                                echo CHtml::image(Yii::app()->request->baseUrl . '/wdir/uploads/' . $book_pages->tab_1_image);
                                ?> <div class="overlay-section">
                                    <h1><?= $book_pages->tab_1_title ?></h1>
                                    <p><?= $book_pages->tab_1_desc ?></p>
                                </div>
                            </div><!--img-section-->
                            <div class="book-detail">
                                <?php
                                $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
                                    'id' => 'book-table-form',
                                    'type' => 'horizontal',
                                    'enableAjaxValidation' => true,
                                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                ));
//                                echo $form->errorSummary($model);
                                ?>

                                <?php
                                if (isset($_POST['BookTable']['date']))
                                    {
                                    if (empty($_POST['BookTable']['date']))
                                        {
                                        $BookTableDateClass = 'has-error';
                                        $BookTableDateErrorMsg = 'Date cannot be blank.';
                                        }
                                    else
                                        {
                                        $BookTableDateClass = 'has-success';
                                        $BookTableDateErrorMsg = '';
                                        }
                                    }
                                ?>
                                <div class="form-group registration-date <?= @$BookTableDateClass ?>">
                                    <div class="input-group registration-date-time">
                                        <div class="col-sm-12">
                                            <!--<input class="form-control" name="registration_date" id="registration-date"  class="adm_date" type="date">-->
                                            <?php
                                            $this->widget(
                                                    'booster.widgets.TbDatePicker', array(
                                                'name' => 'BookTable[date]',
                                                'htmlOptions' => array('class' => 'form-control',
                                                    'placeholder' => 'Date',
                                                    'readonly' => 'readonly',),
                                                    )
                                            );
                                            ?>
                                            <div  id="Table_booking_date_em_" class="help-block error"><?= @$BookTableDateErrorMsg ?></div>
                                        </div><!--col-sm-12-->
                                    </div><!--input-group-->
                                </div><!--form-group-->
                                <?php
                                if (isset($_POST['BookTable']['time']))
                                    {
                                    if (empty($_POST['BookTable']['time']))
                                        {
                                        $BookTableClass = 'has-error';
                                        $BookTableErrorMsg = 'Book Table Time cannot be blank.';
                                        }
                                    else
                                        {
                                        $BookTableClass = 'has-success';
                                        $BookTableErrorMsg = '';
                                        }
                                    }
                                ?>
                                <div class="form-group <?= @$BookTableClass ?>">
                                    <div class="col-sm-12">
                                        <select name="BookTable[time]" class="form-control" id="BookTableTime">
                                            <?php
                                            if (isset($_POST['BookTable']['time']))
                                                {
                                                ?>
                                                <?php
                                                if (empty($_POST['BookTable']['time']))
                                                    {
                                                    ?>
                                                    <option value="">Time</option>
                                                    <?php
                                                    }
                                                else
                                                    {
                                                    ?>
                                                    <option selected value="<?= $_POST['BookTable']['time'] ?>" ><?= $_POST['BookTable']['time'] ?></option>	
                                                <?php } ?>
                                                <?php
                                                }
                                            else
                                                {
                                                ?>
                                                <option value="">Time</option>
                                            <?php } ?>
                                            <option value="00:00">00:00</option>
                                            <option value="00:15">00:15</option>
                                            <option value="00:30">00:30</option> 
                                            <option value="00:45">00:45</option>
                                            <option value="1:00">01:00</option>
                                            <option value="1:15">01:15</option>
                                            <option value="1:30">01:30</option>
                                            <option value="1:45">01:45</option>
                                            <option value="2:00">02:00</option>
                                            <option value="2:15">02:15</option>
                                            <option value="2:30">02:30</option>
                                            <option value="2:45">02:45</option>
                                            <option value="3:00">03:00</option>
                                            <option value="3:15">03:15</option>
                                            <option value="3:30">03:30</option>
                                            <option value="3:45">03:45</option>
                                            <option value="4:00">04:00</option>
                                            <option value="4:15">04:15</option>
                                            <option value="4:30">04:30</option>
                                            <option value="4:45">04:45</option>
                                            <option value="5:00">05:00</option>
                                            <option value="5:15">05:15</option>
                                            <option value="5:30">05:30</option>
                                            <option value="5:45">05:45</option>
                                            <option value="6:00">06:00</option>
                                            <option value="6:15">06:15</option>
                                            <option value="6:30">06:30</option>
                                            <option value="6:45">06:45</option>
                                            <option value="7:00">07:00</option>
                                            <option value="7:15">07:15</option>
                                            <option value="7:30">07:30</option>
                                            <option value="7:45">07:45</option>
                                            <option value="8:00">08:00</option>
                                            <option value="8:15">08:15</option>
                                            <option value="8:30">08:30</option>
                                            <option value="8:45">08:45</option>
                                            <option value="9:00">09:00</option>
                                            <option value="9:15">09:15</option>
                                            <option value="9:30">09:30</option>
                                            <option value="9:45">09:45</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:15">10:15</option>
                                            <option value="10:30">10:30</option>
                                            <option value="10:45">10:45</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:15">11:15</option>
                                            <option value="11:30">11:30</option>
                                            <option value="11:45">11:45</option>
                                            <option value="12:00">12:00</option>
                                            <option value="12:15">12:15</option>
                                            <option value="12:30">12:30</option>
                                            <option value="12:45">12:45</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:15">13:15</option>
                                            <option value="13:30">13:30</option>
                                            <option value="13:45">13:45</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:15">14:15</option>
                                            <option value="14:30">14:30</option>
                                            <option value="14:45">14:45</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:15">15:15</option>
                                            <option value="15:30">15:30</option>
                                            <option value="15:45">15:45</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:15">16:15</option>
                                            <option value="16:30">16:30</option>
                                            <option value="16:45">16:45</option>
                                            <option value="17:00">17:00</option>
                                            <option value="17:15">17:15</option>
                                            <option value="17:30">17:30</option>
                                            <option value="17:45">17:45</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:15">18:15</option>
                                            <option value="18:30">18:30</option>
                                            <option value="18:45">18:45</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:15">19:15</option>
                                            <option value="19:30">19:30</option>
                                            <option value="19:45">19:45</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:15">20:15</option>
                                            <option value="20:30">20:30</option>
                                            <option value="20:45">20:45</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:15">21:15</option>
                                            <option value="21:30">21:30</option>
                                            <option value="21:45">21:45</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:15">22:15</option>
                                            <option value="22:30">22:30</option>
                                            <option value="22:45">22:45</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:15">23:15</option>
                                            <option value="23:30">23:30</option>
                                            <option value="23:45">23:45</option>
                                        </select>
                                        <div  id="Table_booking_time_em_" class="help-block error"><?= @$BookTableErrorMsg ?></div>
                                    </div><!--col-sm-12-->
                                </div>
                                <?php
                                if (isset($_POST['BookTable']['party_size']))
                                    {
                                    if (empty($_POST['BookTable']['party_size']))
                                        {
                                        $BookTablePartySizeClass = 'has-error';
                                        $BookTablePartySizeErrorMsg = 'Party Size cannot be blank.';
                                        }
                                    else
                                        {
                                        $BookTablePartySizeClass = 'has-success';
                                        $BookTablePartySizeErrorMsg = '';
                                        }
                                    }
                                ?>
                                <div class="form-group <?= @$BookTablePartySizeClass ?>">
                                    <div class="col-sm-12">
                                        <select name="BookTable[party_size]" class="form-control" id="BookTablePartySize">
                                            <option value="" >Party Size</option>	
                                            <?php
                                            for ($i = 1; $i < 13; $i++)
                                                {
                                                ?>
                                                <option <?php
                                                if (@$_POST['BookTable']['party_size'] == $i)
                                                    {
                                                    echo 'selected="selected"';
                                                    }
                                                else
                                                    {
                                                    echo '';
                                                    };
                                                ?> value="<?php echo $i; ?>" ><?php echo $i; ?></option>	
                                                <?php } ?>
                                        </select>
                                        <div  id="Table_booking_party_size_em_" class="help-block error"><?= @$BookTablePartySizeErrorMsg ?></div>
                                    </div><!--col-sm-12-->
                                </div><!--form-group-->

                                <div class="form-group">
                                    <button class="btn btn-default" name="book_now" value="book_now" type="submit"><?= $book_pages->button_1_text ?></button>
                                </div>
                                <?php $this->endWidget(); ?>
                            </div><!--book-detail-->
                        </div><!--col-sm-6-->
                        <div class="col-sm-6">
                            <div class="img-section">
                                <?php
                                echo CHtml::image(Yii::app()->request->baseUrl . '/wdir/uploads/' . $book_pages->tab_2_image);
                                ?>
                                <div class="overlay-section">
                                    <h1><?= $book_pages->tab_2_title ?> </h1>
                                    <p><?= $book_pages->tab_2_desc ?></p>
                                </div><!--overlay-section-->
                            </div><!--img-section-->
                            <div class="book-detail">
                                <?php
                                $form1 = $this->beginWidget('booster.widgets.TbActiveForm', array(
                                    'id' => 'enquiry-form',
//                                    'type' => 'horizontal',
                                    'enableAjaxValidation' => true,
                                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                ));
                                ?>

                                <?php echo $form1->textFieldGroup($model_enq, 'first_name', array('class' => 'well', 'label' => '', 'maxlength' => 255)); ?>

                                <?php echo $form1->textFieldGroup($model_enq, 'last_name', array('class' => 'form-control', 'label' => '', 'maxlength' => 255)); ?>

                                <?php echo $form1->textFieldGroup($model_enq, 'phone', array('class' => 'form-control', 'label' => '', 'maxlength' => 255)); ?>

                                <?php echo $form1->textFieldGroup($model_enq, 'email', array('class' => 'form-control', 'label' => '', 'maxlength' => 255)); ?>

                                <?php echo $form1->datepickerGroup($model_enq, 'booking_date', array('label' => '', 'readonly' => 'readonly')); ?>

                                <?php
                                if (isset($_POST['Enquiry']['booking_time']))
                                    {
                                    if (empty($_POST['Enquiry']['booking_time']))
                                        {
                                        $GroupClass = 'has-error';
                                        $ErrorMsg = 'Party Size cannot be blank.';
                                        $Selected = '<option value="' . $_POST['Enquiry']['booking_time'] . '" >' . $_POST['Enquiry']['booking_time'] . '</option>';
                                        }
                                    else
                                        {
                                        $GroupClass = 'has-success';
                                        $ErrorMsg = '';
                                        $Selected = '';
                                        }
                                    }
                                ?>
                                <div class="form-group <?= @$GroupClass ?>" >
                                    <div class="col-sm-12" style="padding: 0px">
                                        <select name="Enquiry[booking_time]" id="EnquireTime" class="form-control">
                                            <?php
                                            if (isset($_POST['Enquiry']['booking_time']))
                                                {
                                                ?>
                                                <?php
                                                if (empty($_POST['Enquiry']['booking_time']))
                                                    {
                                                    ?>
                                                    <option value="">Time</option>
                                                    <?php
                                                    }
                                                else
                                                    {
                                                    ?>
                                                    <option selected value="<?= $_POST['Enquiry']['booking_time'] ?>" ><?= $_POST['Enquiry']['booking_time'] ?></option>	
                                                <?php } ?>
                                                <?php
                                                }
                                            else
                                                {
                                                ?>
                                                <option value="">Time</option>
                                            <?php } ?>
                                            <option value="00:00">00:00</option>
                                            <option value="00:15">00:15</option>
                                            <option value="00:30">00:30</option> 
                                            <option value="00:45">00:45</option>
                                            <option value="1:00">01:00</option>
                                            <option value="1:15">01:15</option>
                                            <option value="1:30">01:30</option>
                                            <option value="1:45">01:45</option>
                                            <option value="2:00">02:00</option>
                                            <option value="2:15">02:15</option>
                                            <option value="2:30">02:30</option>
                                            <option value="2:45">02:45</option>
                                            <option value="3:00">03:00</option>
                                            <option value="3:15">03:15</option>
                                            <option value="3:30">03:30</option>
                                            <option value="3:45">03:45</option>
                                            <option value="4:00">04:00</option>
                                            <option value="4:15">04:15</option>
                                            <option value="4:30">04:30</option>
                                            <option value="4:45">04:45</option>
                                            <option value="5:00">05:00</option>
                                            <option value="5:15">05:15</option>
                                            <option value="5:30">05:30</option>
                                            <option value="5:45">05:45</option>
                                            <option value="6:00">06:00</option>
                                            <option value="6:15">06:15</option>
                                            <option value="6:30">06:30</option>
                                            <option value="6:45">06:45</option>
                                            <option value="7:00">07:00</option>
                                            <option value="7:15">07:15</option>
                                            <option value="7:30">07:30</option>
                                            <option value="7:45">07:45</option>
                                            <option value="8:00">08:00</option>
                                            <option value="8:15">08:15</option>
                                            <option value="8:30">08:30</option>
                                            <option value="8:45">08:45</option>
                                            <option value="9:00">09:00</option>
                                            <option value="9:15">09:15</option>
                                            <option value="9:30">09:30</option>
                                            <option value="9:45">09:45</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:15">10:15</option>
                                            <option value="10:30">10:30</option>
                                            <option value="10:45">10:45</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:15">11:15</option>
                                            <option value="11:30">11:30</option>
                                            <option value="11:45">11:45</option>
                                            <option value="12:00">12:00</option>
                                            <option value="12:15">12:15</option>
                                            <option value="12:30">12:30</option>
                                            <option value="12:45">12:45</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:15">13:15</option>
                                            <option value="13:30">13:30</option>
                                            <option value="13:45">13:45</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:15">14:15</option>
                                            <option value="14:30">14:30</option>
                                            <option value="14:45">14:45</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:15">15:15</option>
                                            <option value="15:30">15:30</option>
                                            <option value="15:45">15:45</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:15">16:15</option>
                                            <option value="16:30">16:30</option>
                                            <option value="16:45">16:45</option>
                                            <option value="17:00">17:00</option>
                                            <option value="17:15">17:15</option>
                                            <option value="17:30">17:30</option>
                                            <option value="17:45">17:45</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:15">18:15</option>
                                            <option value="18:30">18:30</option>
                                            <option value="18:45">18:45</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:15">19:15</option>
                                            <option value="19:30">19:30</option>
                                            <option value="19:45">19:45</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:15">20:15</option>
                                            <option value="20:30">20:30</option>
                                            <option value="20:45">20:45</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:15">21:15</option>
                                            <option value="21:30">21:30</option>
                                            <option value="21:45">21:45</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:15">22:15</option>
                                            <option value="22:30">22:30</option>
                                            <option value="22:45">22:45</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:15">23:15</option>
                                            <option value="23:30">23:30</option>
                                            <option value="23:45">23:45</option>
                                        </select>

                                    </div><!--col-sm-12-->
                                    <div id="Enquiry_booking_time_em_" class="help-block error"><?= @$ErrorMsg ?></div>
                                </div>
                                <?php
                                if (isset($_POST['Enquiry']['party_size']))
                                    {
                                    if (empty($_POST['Enquiry']['party_size']))
                                        {
                                        $GroupClass = 'has-error';
                                        $ErrorMsg = 'Party Size cannot be blank.';
                                        }
                                    else
                                        {
                                        $GroupClass = 'has-success';
                                        $ErrorMsg = '';
                                        }
                                    }
                                ?>
                                <div class="form-group <?= @$GroupClass ?>">
                                    <div class="col-sm-12" style="padding: 0px;">
                                        <select name="Enquiry[party_size]" id="EnquirePartySize" class="form-control">
                                            <option value="" >Party Size</option>	
                                            <?php
                                            for ($i = 13; $i < 26; $i++)
                                                {
                                                ?>
                                                <option <?php
                                                if (@$_POST['Enquiry']['party_size'] == $i)
                                                    {
                                                    echo 'selected="selected"';
                                                    }
                                                else
                                                    {
                                                    echo '';
                                                    };
                                                ?> value="<?php echo $i; ?>" ><?php echo $i; ?></option>	<?php } ?>
                                        </select>
                                        <div style="" id="Enquiry_party_size_em_" class="help-block error"><?= @$ErrorMsg ?></div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="col-sm-12" style="padding: 0px">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="BookTable['terms']" >
                                                <span><?= $book_pages->subscribe ?></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" name="Enquire_now" value="Enquire_now" class="btn btn-default"><?= $book_pages->button_2_text ?></button>
                                    </div>
                                </div>
                                <?php $this->endWidget(); ?><!--form-horizontal-->
                            </div><!--book-detail-->
                        </div><!--col-sm-6-->
                    </div><!--block-inner-section-->
                </div><!--block-area-->
            </div><!--row-->
        </div><!--container-->
    </div><!--outer-section-->        
</section><!--booking-here-->

<script>
    $(document).ready(function () {
        'use strict';
        $("#dt1").datepicker({
            dateFormat: "dd-M-yy",
            minDate: 0,
        });
        $('select#EnquireTime').on('blur change', function (e) {
            var Time = $(this).val();
            if (Time === "") {//has-error
                $(this).parent('div').parent('div.form-group').addClass('has-error');
                $('#Enquiry_booking_time_em_').css({display: 'block'}).text('Booking Time cannot be blank.');
            } else {
                $(this).parent('div').parent('div.form-group').addClass('has-success');
                $('#Enquiry_booking_time_em_').css({display: 'none'}).text('');
            }
        });
        $('select#EnquirePartySize').on('blur change', function (e) {
            var Time = $(this).val();
            if (Time === "") {//has-error
                $(this).parent('div').parent('div.form-group').addClass('has-error');
                $('#Enquiry_party_size_em_').css({display: 'block'}).text('Party Size cannot be blank.');
            } else {
                $(this).parent('div').parent('div.form-group').addClass('has-success');
                $('#Enquiry_party_size_em_').css({display: 'none'}).text('');
            }
        });




        $('select#BookTableTime').on('blur change', function (e) {
            var Time = $(this).val();
            if (Time === "") {//has-error
                $(this).parent('div').parent('div.form-group').addClass('has-error');
                $('#Table_booking_time_em_').css({display: 'block'}).text('Booking Time cannot be blank.');
            } else {
                $(this).parent('div').parent('div.form-group').addClass('has-success');
                $('#Table_booking_time_em_').css({display: 'none'}).text('');
            }
        });
        $('select#BookTablePartySize').on('blur change', function (e) {
            var Time = $(this).val();
            if (Time === "") {//has-error
                $(this).parent('div').parent('div.form-group').addClass('has-error');
                $('#Table_booking_party_size_em_').css({display: 'block'}).text('Party Size cannot be blank.');
            } else {
                $(this).parent('div').parent('div.form-group').addClass('has-success');
                $('#Table_booking_party_size_em_').css({display: 'none'}).text('');
            }
        });
        $('input#BookTable_date').on('blur change', function (e) {
            var Time = $(this).val();
            if (Time === "") {//has-error
                $(this).parent('div').parent('div.form-group').addClass('has-error');
                $('#Table_booking_date_em_').css({display: 'block'}).text('Date cannot be blank.');
            } else {
                $(this).parent('div').parent('div.input-group').parent('div.form-group').addClass('has-success');
                $('#Table_booking_date_em_').css({display: 'none'}).text('');
            }
        });
        var dateToday = new Date();
        $('#BookTable_date').datepicker({
            format: "yyyy/mm/dd",
            startDate: dateToday,
            autoclose: true,
            todayHighlight: true
        });
        $('#Enquiry_booking_date').datepicker({
            format: "yyyy/mm/dd",
            startDate: dateToday,
            autoclose: true,
            todayHighlight: true
        });
    });
</script>
