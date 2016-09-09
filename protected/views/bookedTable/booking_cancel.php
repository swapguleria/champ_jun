<?php
// print_r($model);
$book_pages = BookPage::model()->find();
?>

<section class="about-site confirmation-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="inner-heading">
                    <h1> <?= $book_pages->cancel_title ?></h1>
                    <p><?= $book_pages->cancel_tagline ?></p>
                </div><!--inner-heading-->
                <div class="about-content">
                    <p><?= $book_pages->cancel_descp ?></p>
                    <a href="<?php echo Yii::app()->createUrl('site/index'); ?>">Back To Home Page</a>
                    <div class="booking-contact">
                    </div><!--booking-contact-->    
                </div><!--about-content-->
            </div><!--col-sm-12-->
        </div><!--row-->
    </div><!--container-->
</section><!--about-site-->