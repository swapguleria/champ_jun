<?php
// get the contact details 
$contact_details = ContactDetails::model()->find();
?>

<section class="site-banner">


    <!-- -->
    <div id="slider" class="flexslider">
        <ul class="slides">
            <li>
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/la-carte.jpg" title="La Carte" alt="La Carte">
                <div class="carousel-caption">
                    <h1>Our Latest Respices</h1>
                    <h2>A la carte &amp; tasting</h2>
                    <a href="<?php echo Yii::app()->createUrl("site/book"); ?>">Book a table</a>
                </div><!--carousel-caption-->
            </li>
            <li>
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/la-carte.jpg" title="La Carte" alt="La Carte">
            </li>
            <li>
            </li>
            <li>
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/la-carte.jpg" title="La Carte" alt="La Carte">
            </li>
            <!-- items mirrored twice, total of 12 -->
        </ul>
    </div>
    <div id="carousel" class="flexslider">
        <ul class="slides">
            <span>View Menu :</span>
            <li>
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/la-thumb.png" title="La Carte" alt="La Carte">
            </li>
            <li>
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/second-thumb.png" title="" alt="">
            </li>
            <li>
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/third-thumb.png" title="" alt="">
            </li>
            <li>
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/fourth-thumb.png" title="" alt="">
            </li>
            <!-- items mirrored twice, total of 12 -->
        </ul>
    </div>

</section><!--site-banner-->

<section class="about-us">
    <div class="container">
        <div class="inner-about">
            <div class="inner-heading">
                <h1>about us</h1>
                <p>The Real Tast in Your Hands</p>
            </div>
            <div class="text-area">
                <div class="middle-content">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type 
                    and scrambled it to make a type specimen book....
                </div>
            </div>
            <div class="block-area">
                <div class="block-inner-section">
                    <div class="col-md-6">
                        <div class="img-section">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/block1.png" alt="" />
                            <div class="overlay-section">
                                <h1>Our Suppliers </h1>
                                <p>The Real Tast in Your Hands</p>
                                <div class="view">
                                    <a href="#">View our Suppliers</a>
                                    <span> <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/arrow.png" alt="" /></a></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="img-section">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/block2.png" alt="" />
                            <div class="overlay-section">
                                <h1>Our Events </h1>
                                <p>The Real Tast in Your Hands</p>
                                <div class="view">
                                    <a href="#">View our Event</a>
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

<section class="perfect-blend">
    <div class="container">
        <div class="blend-content">
            <h1>The Perfect</h1>
            <p>blend</p>
            <a href="<?php echo Yii::app()->createUrl("site/book"); ?>">Book a Table</a>
        </div>
    </div><!--container-->
</section><!--perfect-blend-->


