<?php
$home_pages = Homepage::model()->find();
$book_pages = BookPage::model()->find();
$contact_details = ContactDetails::model()->find();
?>
<section class="about-site confirmation-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="inner-heading">
                    <h1><?= $book_pages->thankyou_title ?></h1>
                    <p><?= $book_pages->thankyou_tagline ?></p>
                </div><!--inner-heading-->

                <form method="post">
                    <div class="about-content">
                        <p><?= $book_pages->thankyou_descp ?></p>
                        <!--<button name="BookedTable" type="submit" id="yw0" class="btn btn-default">Cancel Booking</button>-->
                        <a href="<?php echo Yii::app()->createUrl('bookedTable/canceled/' . $model->id); ?>">Cancel Booking</a>
                        <div class="booking-contact">
                        </div><!--booking-contact-->    
                    </div><!--about-content-->

                </form>
            </div><!--col-sm-12-->
        </div><!--row-->
    </div><!--container-->
</section><!--about-site-->