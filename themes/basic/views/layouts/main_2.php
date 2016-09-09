<?php
// get the contact details 
$contact_details = ContactDetails::model()->find();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo CHtml::encode($this->pageCaption); ?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords"
              content="<?php echo CHtml::encode($this->getPageKeywords()); ?>">
        <meta name="description"
              content="<?php echo CHtml::encode($this->getPageDescription()); ?>">
        <meta name="author" content="<?php echo Yii::app()->params['company'] ?>" />

        <title>Juniper Tree</title>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Italianno' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css">    
    </head>
    <body>

        <header class="site-header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 site-logo">
                        <a href="<?php echo Yii::app()->CreateUrl('site/index'); ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.png" title="Juniper Tree" alt="Juniper Tree"></a>
                    </div><!--col-sm-4-->
                    <div class="col-sm-8 main-menu">
                        <nav class="navbar navbar-default">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div><!--navbar-header-->

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse">
                                <ul class="nav navbar-nav text-right">
                                    <li><a href="<?php echo Yii::app()->createUrl("site/index"); ?> ">Home</a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl("site/about"); ?>">About</a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl("site/menu"); ?>">Menu</a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl("site/book"); ?>">Book</a></li>
                                    <!--<li><a href="<?php echo Yii::app()->createUrl("site/events"); ?>">Events</a></li>-->
                                    <!--<li><a href="<?php echo Yii::app()->createUrl("site/blog"); ?>">Blog</a></li>-->
                                    <li><a href="<?php echo Yii::app()->createUrl("site/contact"); ?>">Contact</a></li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </nav><!--navbar-default-->
                    </div><!--col-sm-8-->
                </div><!--row-->
            </div><!--container-->
        </header><!--site-header-->

        <?php echo $content; ?>



        <section class="footer">
            <div class="container">
                <div class="footer-section">
                    <div class="col-md-2">
                        <div class="footer-logo">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.png" alt="" />
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="contact-area">
                            <div class="contact-block">
                                <span><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/clock-icon.png" alt="" /></span>
                                <div class="contact-text">
                                    <h2>Working Hours</h2>
                                    <p><?php echo $contact_details->working_days; ?><br/> <?php echo $contact_details->working_hours; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="contact-block">
                                <span><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/location.png" alt="" /></span>
                                <div class="contact-text">
                                    <h2>Address</h2>
                                    <p><?php echo $contact_details->address, ",", $contact_details->city; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="contact-block">
                                <span><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/call-icon.png" alt="" /></span>
                                <div class="contact-text">
                                    <h2>Phone</h2>
                                    <p>+<?php echo $contact_details->phone_no; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="contact-block">
                                <span><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/msg-icon.png" alt="" /></span>
                                <div class="contact-text">
                                    <h2>Email</h2>
                                    <p><?php echo $contact_details->email; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bar">
                <div class="container">
                    <div class="copyright">
                        © 2016 The <span>Juniper Tree</span>. All rights reserved.
                    </div>
                </div>
            </div>
        </section><!-----footer-->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.flexslider-min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                // The slider being synced must be initialized first
                $('#carousel').flexslider({
                    animation: "slide",
                    controlNav: false,
                    animationLoop: false,
                    slideshow: false,
                    itemWidth: 210,
                    itemMargin: 0,
                    asNavFor: '#slider'
                });

                $('#slider').flexslider({
                    animation: "slide",
                    controlNav: false,
                    animationLoop: false,
                    slideshow: false,
                    sync: "#carousel"
                });
            });
        </script>
    </body>
</html>











<!-- $('.meal_menu').on('click', function () {
                    var targetId = 'relation_' + $(this).attr('id');
//                    alert()
                    $('.meal_items').css({
                        display: 'none',
                    });
                    $(#targetId).css("color", "red");

//                    $(targetId).css({
//                        display: 'block',
//                    });
                    alert(targetId);
                });-->



