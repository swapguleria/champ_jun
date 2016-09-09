<?php
$home_pages = Homepage::model()->find();
$contact_details = ContactDetails::model()->find();
?>

<section id="book-content" class="booking-here">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 booking-description">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book....</p>
            </div><!--booking-description-->
        </div><!--row-->
        <div class="row">
            <div class="block-area">
                <div class="block-inner-section">
                    <div class="col-sm-6">
                        <div class="img-section">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/block1.png" alt="" />
                            <div class="overlay-section">
                                <h1>Book a  Table</h1>
                                <p>1 - 12 people</p>
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
                            ?>
                            <?php
                            echo $form->datepickerGroup($model, 'date', array('hint' => 'Click inside! to select a date.',
                                'prepend' => '<i class="icon-calendar"></i>'))
                            ;
                            ?>


                            <?php
                            echo $form->timepickerGroup($model, 'time', array('hint' => 'Click inside!to select time ',
                                'append' => '<i class="icon-time" style="cursor:pointer"></i>'))
                            ;
                            ?>


                            <div class="form-group registration-date">
                                <div class="input-group registration-date-time">
                                    <div class="col-sm-12">
                                        <input class="form-control" name="registration_date" id="registration-date"  class="adm_date" type="date">
                                        <input type="text" name="timepicker" class="timepicker"/>
                                    </div><!--col-sm-12-->
                                </div><!--input-group-->
                            </div><!--form-group-->
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <select class="form-control">
                                        <option>*Party size</option>
                                        <option>*Party size</option>	
                                    </select>
                                </div><!--col-sm-12-->
                            </div><!--form-group-->
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-default">Book now</button>
                                </div><!--col-sm-12-->
                            </div><!--form-group-->
                            <?php $this->endWidget(); ?>
                        </div><!--book-detail-->
                    </div><!--col-sm-6-->
                    <div class="col-sm-6">
                        <div class="img-section">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/block2.png" alt="" />
                            <div class="overlay-section">
                                <h1>Group bookings </h1>
                                <p>13+ people</p>
                            </div><!--overlay-section-->
                        </div><!--img-section-->
                        <div class="book-detail">
                            <form>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="*First name">
                                    </div><!--col-sm-12-->
                                </div><!--form-group-->
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" placeholder="*Last name">
                                    </div><!--col-sm-12-->
                                </div><!--form-group-->
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" placeholder="*Email">
                                    </div><!--col-sm-12-->
                                </div><!--form-group-->
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="07400 123456">
                                        <div class="country-code">
                                            <ul>
                                                <li><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/country-icon.jpg" title="Country Icon" alt="Country Icon" height="12" width="22"></a></li>
                                            </ul>
                                        </div><!--country-code-->
                                    </div><!--col-sm-12-->
                                </div><!--form-group-->
                                <div class="form-group registration-date">
                                    <div class="input-group registration-date-time">
                                        <div class="col-sm-12">	
                                            <input class="form-control" name="registration_date" id="registration-date"  class="adm_date" type="date">
                                            <input type="text" name="timepicker" class="timepicker"/>
                                        </div><!--col-sm-12-->    
                                    </div><!--input-group-->
                                </div><!--form-group-->
                                <div class="form-group">
                                    <div class="col-sm-12">	
                                        <select class="form-control">
                                            <option>*Party size</option>
                                            <option>*Party size</option>	
                                        </select>
                                    </div><!--col-sm-12-->    
                                </div><!--form-group-->
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">
                                                <span>I would like to subscribe to receive information about private dining and events</span>
                                            </label>
                                        </div><!--checkbox-->
                                    </div><!--col-sm-12-->    
                                </div><!--form-group-->
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-default">Enquire now</button>
                                    </div><!--col-sm-12-->
                                </div><!--form-group-->
                            </form><!--form-horizontal-->
                        </div><!--book-detail-->
                    </div><!--col-sm-6-->
                </div><!--block-inner-section-->
            </div><!--block-area-->
        </div><!--row-->
    </div><!--container-->
</section><!--booking-here-->



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