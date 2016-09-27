<?php
// get the contact details 
$contact_details = ContactDetails::model()->find();
$home_pages = Homepage::model()->find();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo CHtml::encode($this->pageCaption); ?></title>
        <meta name="keywords"
              content="<?php echo CHtml::encode($this->getPageKeywords()); ?>">
        <meta name="description"
              content="<?php echo CHtml::encode($this->getPageDescription()); ?>">
        <meta name="author" content="<?php echo Yii::app()->params['company'] ?>" />

        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Italianno' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>

        <header class="site-header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 site-logo">
                        <a href="<?php echo Yii::app()->createUrl("site/index"); ?>"><img src="<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $contact_details->logo; ?>" title="Juniper Tree" alt="Juniper Tree"></a>
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
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
                                <ul class="nav navbar-nav text-right">
                                    <li class="<?php echo ($this->id == 'site' and $this->action->id == 'index') ? 'active' : '' ?>" ><a href="<?php echo Yii::app()->createUrl("site/index"); ?>">Home</a></li>
                                    <li class="<?php echo ($this->id == 'site' and $this->action->id == 'about') ? 'active' : '' ?>" ><a href="<?php echo Yii::app()->createUrl("site/about"); ?>">About</a></li>
                                    <li class="<?php echo ($this->id == 'site' and $this->action->id == 'menu') ? 'active' : '' ?>" ><a href="<?php echo Yii::app()->createUrl("site/menu"); ?>">Menu</a></li>
                                    <li class="<?php echo ($this->id == 'bookTable' and $this->action->id == 'book') ? 'active' : '' ?>" ><a href="<?php echo Yii::app()->createUrl("bookTable/book"); ?>">Book</a></li>
                                 <!--<li><a href="<?php echo Yii::app()->createUrl("site/events"); ?>">Events</a></li>-->
                                    <!--<li><a href="<?php echo Yii::app()->createUrl("site/blog"); ?>">Blog</a></li>-->                                     <li class="<?php echo ($this->id == 'site' and $this->action->id == 'contact') ? 'active' : '' ?>" ><a href="<?php echo Yii::app()->createUrl("site/contact"); ?>">Contact</a></li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </nav><!--navbar-default-->
                    </div><!--col-sm-8-->
                </div><!--row-->
            </div><!--container-->
        </header><!--site-header-->
        <?php
        $controller = $this->id;
        $action = $this->action->id;
        $criteria = new CDbCriteria();
        $criteria->compare('action', $action);
        $criteria->compare('controller', $controller);
        $url = Url::model()->find($criteria);
        $banner = Banner::model()->findByAttributes(array('url_id' => $url['id']));

        if ($this->action->id != 'index')
            {
            ?>
            <section class="site-banner inner-banner about-banner" style="background:url('../themes/basic/images/about-us-banner.jpg') no-repeat">
                <div class="banner-caption">
                    <h1><?php echo $banner['name']; ?></h1>
                    <h2><?php echo $banner['tagline']; ?></h2>
                </div><!--banner-caption-->  
            </section><!--site-banner-->

        <?php } ?>
        <?php echo $content; ?>

        <section class="Our-Chef" style="background:url(<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $home_pages->tab_3_background; ?>) no-repeat;">
            <div class="chef-outer-section" style="background:url(<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $home_pages->tab_3_background_right; ?>) no-repeat;">
                <div class="container">
                    <div class="chef-block">
                        <div class="inner-heading">
                            <h1><?php echo $home_pages->tab_3_title_1 ?></h1>
                            <p><?php echo $home_pages->tab_3_sub_title_1 ?></p>
                        </div>
                        <div class="text-area">
                            <div class="middle-content">
                                <?php echo $home_pages->tab_3_description ?>
                            </div>
                        </div>
                    </div>
                    <div class="inner-heading-new">
                        <h1><?php echo $home_pages->tab_3_title_2 ?></h1>
                        <p><?php echo $home_pages->tab_3_sub_title_2 ?></p>
                    </div>
                </div><!--container-->
                <div class="newsletter">
                    <div class="container">
                        <div class="news-inner">
                            <?php
                            if (Yii::app()->user->hasFlash('newsletter'))
                                {
                                ?>
                                <div class="alert alert-success">
                                    <strong><?php echo Yii::app()->user->getFlash('newsletter'); ?></strong> 
                                </div>
                            <?php } ?>
                            <?php
                            if (Yii::app()->user->hasFlash('error'))
                                {
                                ?>
                                <div class="alert alert-danger">
                                    <strong><?php echo Yii::app()->user->getFlash('error'); ?></strong> 
                                </div>
                            <?php } ?> <h1>Newsletter Sign-up</h1>
                            <div class="form-section">
                                <?php
                                $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
                                    'id' => 'user-form',
//                            'type' => 'horizontal',
                                    'enableAjaxValidation' => true,
                                    'htmlOptions' => array('enctype' => 'multipart/form-data', 'class' => 'form-inline'),
                                ));
                                ?> 
                                <!--<form class="form-inline" role="form">-->
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="User[first_name]"  placeholder="Your Name" id="text">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email Address"  name="User[email]"  id="email">
                                </div>
                                <button type="submit" class="btn btn-default">Sign up</button>
                                <!--</form>-->
                                <?php $this->endWidget(); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="social-icon">
                    <div class="container">
                        <div class="social">
                            <ul>
                                <li><a href="<?php echo '//', $contact_details->facebook; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/fb.png" alt="" /></a></li>
                                <li><a href="<?php echo '//', $contact_details->twitter; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/twitter.png" alt="" /></a></li>
                                <li><a href="<?php echo '//', $contact_details->google_plus; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/g+.png" alt="" /></a></li>
                                <li><a href="<?php echo '//', $contact_details->instagram; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/insta.png" alt="" /></a></li>
                                <li><a href="<?php echo '//', $contact_details->youtube; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/you-tube.png" alt="" /></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div><!---chef-outer-section--->
        </section><!--Our Chef-->
        <section class="footer" style="background:url(<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $contact_details->footer_image; ?>);">
            <div class="container">
                <div class="footer-section">
                    <div class="col-md-2">
                        <div class="footer-logo">
                            <img src="<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $contact_details->logo; ?>" alt="" />
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
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.flexslider-min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
//                $(".navbar-toggle").click(function () {
//                    $(".navbar-collapse").toggle();
//                });
                $('#slider').flexslider({
                    animation: "fade",
                    controlNav: true,
                    animationLoop: true,
                    slideshow: true,
                    sync: "#carousel"
                });
                // About US Page Testimonial section
                $('.flexslider').flexslider({
                    slideshow: false,
                    animation: "slide"
                });

                $(window).scroll(function () {
                    var scroll = $(window).scrollTop();

                    //>=, not <=
                    if (scroll >= 180) {
                        //clearHeader, not clearheader - caps H
                        $(".site-header").addClass("header-change");
                    } else {
                        $(".site-header").removeClass("header-change");
                    }
                });
                $('.meal_menu').on('click', function () {
                    var targetId = '#relation_' + $(this).attr('id');
                    var targetdescId = '#desc_' + $(this).attr('id');
                    var srcMeal = $(this).attr('data-img');
                    $(".meal_items").css("display", "none");
                    $(".search-content").css("display", "none");
                    $(targetId).css("display", "block");
                    $(targetdescId).css("display", "block");
                    $(".side_image").attr('src', srcMeal);

                });
                $('.menu_item_selected').on('click', function () {
                    console.log('asd');


                    var meal_title = '#meal_title_' + $(this).attr('id');
                    var title_sub_title = '#title_sub_title_' + $(this).attr('id');
                    var title_price = '#title_price_' + $(this).attr('id');
                    console.log(meal_title);
                    console.log(title_sub_title);
                    console.log(title_price);
                    var name = $(this).attr('data-name');
                    var sub_title = $(this).attr('data-sub_title');
                    var price = $(this).attr('data-price');
                    $(meal_title).empty('');
                    $(title_sub_title).empty('');
                    $(title_price).empty('');
                    $(meal_title).append(name);
                    $(title_sub_title).append(sub_title);
                    $(title_price).append(price);
                });

//                $("#BookTable_date").datepicker({
//                    alert("SAd");
//                            numberOfMonths: 2,
//                    showButtonPanel: true,
//                    // minDate: '0' would work too
//                });
            });
        </script>
    </body>
</html>













