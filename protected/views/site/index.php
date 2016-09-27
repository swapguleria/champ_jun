<?php
// get the contact details 
$contact_details = ContactDetails::model()->find();
$home_pages_slider = HomepageSlider::model()->findAll();
$home_pages = Homepage::model()->find();
//print_r($home_pages);
?>

<section class="site-banner">
    <div id="slider" class="flexslider">
        <ul class="slides">
            <?php
            foreach ($home_pages_slider as $key => $val)
                {
                ?>

                <li><?php
                    echo CHtml::image(Yii::app()->request->baseUrl . '/wdir/uploads/' . $val->image);
                    ?>
                    <div class="carousel-caption">
                        <h1><?php echo $val->title; ?></h1>
                        <h2><?php echo $val->sub_title; ?></h2>
                        <p><?php echo $val->description; ?></p>
                        <a href="<?php echo Yii::app()->createUrl("bookTable/book"); ?>"><?php echo $val->link_label; ?></a>
                    </div><!--carousel-caption-->
                </li>

            <?php } ?>
        </ul>
    </div>        
</section><!--site-banner-->

<section class="about-us" style="background:url(<?php echo Yii::app()->request->baseUrl . '/wdir/uploads/' . $home_pages->tab_1_image; ?>) no-repeat;">
    <div class="container">
        <div class="inner-about">
            <div class="inner-heading">
                <h1><?php echo $home_pages->tab_1_title ?></h1>
                <p><?php echo $home_pages->tab_1_sub_title ?></p>
            </div>
            <div class="text-area">
                <div class="middle-content">
                    <?php echo $home_pages->tab_1_description ?>
                </div>
            </div>
            <div class="block-area">
                <div class="block-inner-section">
                    <div class="col-md-6">
                        <div class="img-section">

                            <?php
                            echo CHtml::image(Yii::app()->request->baseUrl . '/wdir/uploads/' . $home_pages->box_1_background);
                            ?>
                            <div class="overlay-section">
                                <h1><?php echo $home_pages->box_1_title ?></h1>
                                <p><?php echo $home_pages->box_1_title ?></p>
                                <div class="view">
                                    <a href="#"><?php echo $home_pages->box_1_button_text ?></a>
                                    <span> <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/arrow.png" alt="" /></a></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="img-section">

                            <?php
                            echo CHtml::image(Yii::app()->request->baseUrl . '/wdir/uploads/' . $home_pages->box_2_background);
                            ?>
                            <div class="overlay-section">
                                <h1><?php echo $home_pages->box_2_title ?></h1>
                                <p><?php echo $home_pages->box_2_description ?></p>
                                <div class="view">
                                    <a href="#"><?php echo $home_pages->box_2_button_text ?></a>
                                    <span> <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/arrow.png" alt="" /></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--container-->
</section><!--about-us-->

<section class="perfect-blend" style="background:url(<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $home_pages->tab_2_background; ?>) no-repeat;">
    <div class="container">
        <div class="blend-content">
            <h1><?php echo $home_pages->tab_2_title ?></h1>
            <p><?php echo $home_pages->tab_2_text ?></p>
            <a href="<?php echo Yii::app()->createUrl("site/book"); ?>">Book a Table</a>
        </div>
    </div><!--container-->
</section><!--perfect-blend-->
