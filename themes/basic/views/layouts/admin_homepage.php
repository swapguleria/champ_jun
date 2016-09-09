<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Organic Juniper Tree</title>
        <link src="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.png"
              rel="shortcut icon">
        <link
            href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css"
            rel="stylesheet">
        <link
            href="<?php echo Yii::app()->theme->baseUrl; ?>/css/AdminLTE.min.css"
            rel="stylesheet">
        <link
            href="<?php echo Yii::app()->theme->baseUrl; ?>/css/_all-skins.min.css"
            rel="stylesheet">
        <link rel="stylesheet"  
              href="<?php echo Yii::app()->theme->baseUrl ?>/css/font-awesome.min.css" />
        <link href='//fonts.googleapis.com/css?family=Questrial'
              rel='stylesheet' type='text/css'> 
        <script type="text/javascript"
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnM2GRnbJqmEue4PVsl-7nsEnA15yKm2s&sensor=true&amp;libraries=places">
        </script>
        <script type="text/javascript"
                src="<?php echo Yii::app()->theme->baseUrl ?>/js/app.min.js">
        </script>
    </head>
    <body class="skin-blue">
        <div class="wrapper">
            <header class="main-header">
                <!--Logo-->
                <?php
                if (Yii::app()->user->isAdmin)
                    {
                    ?>
                    <a class="logo"
                       href="<?php echo Yii::app()->createUrl('dashboard/index') ?>"><b>Juniper Tree </b> </a>
                       <?php
                       }
                   else
                       {
                       ?>
                    <a class="logo"
                       href="<?php echo Yii::app()->createUrl('site/index') ?>"><b>Juniper Tree </b> </a>
                   <?php } ?>
                <!--Header Navbar: style can be found in header.less-->
                <nav role="navigation" class="navbar navbar-static-top">
                    <!--Sidebar toggle button-->
                    <a role="button" data-toggle="offcanvas" class="sidebar-toggle"
                       href="#"> <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!--Navbar Right Menu-->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav  icons">
                            <li><a>&nbsp;</a></li>
                            <li><a>&nbsp;</a></li>
                            <li class="dropdown lang">
                                <div id="language-selector">
                                    <?php //$this->widget('ext.widgets.LanguageSelector');	     ?>
                                </div>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu"><a data-toggle="dropdown"
                                                                   class="dropdown-toggle" href="#"> <?php $file = Yii::app()->basePath . '/..' . UPLOAD_PATH . Yii::app()->user->model->image_file; ?>
                                                                       <?php
                                                                       if (file_exists($file))
                                                                           {
                                                                           ?> <?php
                                                                           if (!empty(Yii::app()->user->model->image_file))
                                                                               {
                                                                               echo CHtml::image(Yii::app()->createAbsoluteUrl('user/thumbnail', array(
                                                                                           'file' => Yii::app()->user->model->image_file
                                                                                       )), 'image', array(
                                                                                   'class' => 'user-image'
                                                                               ));
                                                                               }
                                                                           else
                                                                               {
                                                                               echo CHtml::image(Yii::app()->theme->baseUrl . '/images/user.jpg', 'image', array(
                                                                                   'class' => 'user-image'
                                                                               ));
                                                                               }
                                                                           }
                                                                       else
                                                                           {
                                                                           echo CHtml::image(Yii::app()->theme->baseUrl . '/images/user.jpg', 'image', array(
                                                                               'class' => 'user-image'
                                                                           ));
                                                                           }
                                                                       ?> <span class="hidden-xs"> <?php echo Yii::app()->user->model->first_name; ?>
                                    </span> <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a  href="<?php echo Yii::app()->createUrl('user/account') ?>"><i class="fa fa-user"></i> My Profile</a> </li>
                                    <li><a  href="<?php echo Yii::app()->createUrl('user/changePassword') ?>"> <i class="fa fa-lock"></i> Change Password</a> </li>
                                    <!--<li><a  href="<?php echo Yii::app()->createUrl('message/default/index') ?>"> <i class="fa fa-envelope"></i> Inbox</a> </li>-->
                                    <li><a  href="<?php echo Yii::app()->createUrl('user/logout') ?>"> <i class="fa fa-mail-reply"></i> Logout</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar" style="height: auto;">
                    <ul class="sidebar-menu">
                        <?php
                        if (Yii::app()->user->isAdmin)
                            {
                            ?>
                            <li
                                class="<?php echo ($this->id == 'dashboard' and $this->action->id == 'index') ? 'active' : '' ?>">
                                <a href="<?php echo Yii::app()->createUrl('dashboard/index') ?>"><i
                                        class="fa fa-dashboard"></i><span><?php echo Yii::t('app', 'Dashboard'); ?></span> </a>
                            </li>
                            <!--<li class="<?php // echo ($this->id == 'user' and $this->action->id == 'admin') ? 'active' : ''                                                                                                                                                                                                                                                                                                                                                                                                         ?>">
                                <a href="<?php // echo Yii::app()->createURL('user/admin')                                                                                                                                                                                                                                                                                                                                                                                                         ?>" >
                                    <i class="fa fa-user"></i><span> User</span></a>
                            </li>-->
                            <li class="treeview"> <a href="#"><i class="fa fa-edit"></i> <span>Home</span>
                                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                <ul class="treeview-menu"> 
                                    <li class="<?php echo ($this->id == 'homepage' and $this->action->id == '1') ? 'active' : '' ?>">
                                        <a href="<?php echo Yii::app()->createURL('homepage/1') ?>" >
                                            <i class="fa fa-home"></i><span> Homepage </span></a>
                                    </li>
                                    <li class="<?php echo ($this->id == 'homepageSlider' and $this->action->id == 'admin') ? 'active' : '' ?>">
                                        <a href="<?php echo Yii::app()->createURL('homepageSlider/admin') ?>" >
                                            <i class="fa fa-picture-o"></i><span> Homepage Slider </span></a>
                                    </li>
                                    <li class="<?php echo ($this->id == 'homepage' and $this->action->id == 'ourChef') ? 'active' : '' ?>">
                                        <a href="<?php echo Yii::app()->createURL('homepage/ourChef/1') ?>" >
                                            <i class="fa fa-home"></i><span> Our Chef </span></a>
                                    </li>
                                </ul>
                            </li>  
                            <li class="treeview"> <a href="#"><i class="fa fa-edit"></i> <span>Page's</span>
                                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                <ul class="treeview-menu">                   
                                    <li class="<?php echo ($this->id == 'banner' and $this->action->id == 'admin') ? 'active' : '' ?>">
                                        <a href="<?php echo Yii::app()->createURL('banner/admin') ?>" >
                                            <i class="fa fa-flag-o"></i><span> Banner  </span></a>
                                    </li>
                                    <li class="<?php echo ($this->id == 'url' and $this->action->id == 'admin') ? 'active' : '' ?>">
                                        <a href="<?php echo Yii::app()->createURL('url/admin') ?>" >
                                            <i class="fa fa-hand-o-right"></i><span> Page  </span></a>
                                    </li>
                                    <li class="<?php echo ($this->id == 'about' and $this->action->id == '1') ? 'active' : '' ?>">
                                        <a href="<?php echo Yii::app()->createURL('about/1') ?>" >
                                            <i class="fa fa-users"></i><span> About Us </span></a>
                                    </li>
                                    <li class="<?php echo ($this->id == 'ourTeam' and $this->action->id == 'admin') ? 'active' : '' ?>">
                                        <a href="<?php echo Yii::app()->createURL('ourTeam/admin') ?>" >
                                            <i class="fa fa-users"></i><span> Our Team </span></a>
                                    </li> 
                                    <li class="<?php echo ($this->id == 'bookPage' and $this->action->id == 'view') ? 'active' : '' ?>">
                                        <a href="<?php echo Yii::app()->createURL('bookPage/view/1') ?>" >
                                            <i class="fa fa-users"></i><span> Book Table </span></a>
                                    </li> 
                                </ul>
                            </li>
                                                                                                                                                                                                            <!--                            <li class="<?php echo ($this->id == 'bookTable' and $this->action->id == 'admin') ? 'active' : '' ?>">
                                                                                                                                                                                                            <a href="<?php echo Yii::app()->createURL('bookTable/admin') ?>" >
                                                                                                                                                                                                            <i class="fa fa-pencil-square-o"></i><span> Book Table</span></a>
                                                                                                                                                                                                            </li> -->
                            <li class="treeview"><a href="#">   <i class="fa fa-pie-chart"></i> <span>Booked Table</span>
                                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                <ul class="treeview-menu">      
                                    <li class="<?php echo ($this->id == 'bookedTable' and $this->action->id == 'adminToday') ? 'active' : '' ?>">
                                        <a href="<?php echo Yii::app()->createURL('bookedTable/adminToday') ?>" >
                                            <i class="fa fa-pencil-square-o"></i><span> Todays Bookings</span></a>
                                    </li>
                                    <li class="<?php echo ($this->id == 'bookedTable' and $this->action->id == 'admin') ? 'active' : '' ?>">
                                        <a href="<?php echo Yii::app()->createURL('bookedTable/admin') ?>" >
                                            <i class="fa fa-pencil-square-o"></i><span> Upcoming Bookings</span></a>
                                    </li>
                                    <li class="<?php echo ($this->id == 'bookedTable' and $this->action->id == 'adminHistory') ? 'active' : '' ?>">
                                        <a href="<?php echo Yii::app()->createURL('bookedTable/adminHistory') ?>" >
                                            <i class="fa fa-pencil-square-o"></i><span>Booking History</span></a>
                                    </li>
                                    <li class="<?php echo ($this->id == 'bookedTable' and $this->action->id == 'canceledBookings') ? 'active' : '' ?>">
                                        <a href="<?php echo Yii::app()->createURL('bookedTable/canceledBookings') ?>" >
                                            <i class="fa fa-pencil-square-o"></i><span> Canceled Booking </span></a>
                                    </li> 
    <!--                                    <li class="<?php echo ($this->id == 'bookedTable' and $this->action->id == 'admin') ? 'active' : '' ?>">
                                        <a href="<?php echo Yii::app()->createURL('bookedTable/admin') ?>" >
                                            <i class="fa fa-pencil-square-o"></i><span> Booked Table</span></a>
                                    </li> <li class="<?php echo ($this->id == 'bookedTable' and $this->action->id == 'admin') ? 'active' : '' ?>">
                                        <a href="<?php echo Yii::app()->createURL('bookedTable/admin') ?>" >
                                            <i class="fa fa-pencil-square-o"></i><span> Booked Table</span></a>
                                    </li> -->
                                </ul>
                            </li>
                            <li class="treeview"><a href="#">   <i class="fa fa-pie-chart"></i> <span>Menu</span>
                                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                <ul class="treeview-menu">      
                                    <li class="<?php echo ($this->id == 'meal' and $this->action->id == 'admin') ? 'active' : '' ?>">
                                        <a href="<?php echo Yii::app()->createURL('meal/admin') ?>" >
                                            <i class="fa fa-pie-chart"></i><span> Meal </span></a></li>
                                    <li class="<?php echo ($this->id == 'mealItem' and $this->action->id == 'admin') ? 'active' : '' ?>">
                                        <a href="<?php echo Yii::app()->createURL('mealItem/admin') ?>" >
                                            <i class="fa fa-coffee"></i><span> Meal Item  </span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo ($this->id == 'contactDetails' and $this->action->id == '1') ? 'active' : '' ?>">
                                <a href="<?php echo Yii::app()->createURL('contactDetails/1') ?>" >
                                    <i class="fa fa-user"></i><span> Contact Details</span></a></li>
                            <li class="<?php echo ($this->id == 'testimonial' and $this->action->id == 'about') ? 'active' : '' ?>">
                                <a href="<?php echo Yii::app()->createURL('testimonial/admin') ?>" >
                                    <i class="fa fa-comments-o"></i><span> Testimonial</span></a></li> 
                                                                                                                                                                                                            <!--                            <li class="<?php echo ($this->id == 'enquiry' and $this->action->id == 'enquiry') ? 'active' : '' ?>">
                                                                                                                                                                                                            <a href="<?php echo Yii::app()->createURL('enquiry/admin') ?>" >
                                                                                                                                                                                                            <i class="fa fa-comments-o"></i><span> Enquery</span></a></li>  -->
                                                                                                                                                                                                            <!--                            <li class="<?php echo ($this->id == 'bookPage' and $this->action->id == 'admin') ? 'active' : '' ?>">
                                                                                                                                                                                                            <a href="<?php echo Yii::app()->createURL('bookPage/admin') ?>" >
                                                                                                                                                                                                            <i class="fa fa-pencil-square-o"></i><span> Book Page</span></a>
                                                                                                                                                                                                            </li>-->
                                                                                                                                                                                                            <!--                                <li class="<?php echo ($this->id == 'offers' and $this->action->id == 'offers') ? 'active' : '' ?>">
                                                                                                                                                                                                            <a href="<?php echo Yii::app()->createURL('offers/admin') ?>" >
                                                                                                                                                                                                            <i class="fa fa-circle-o"></i><span> Offers </span></a></li>  -->
                        <?php } ?>
                    </ul>
                </section>
            </aside>
            <div class="content-wrapper" style="min-height: 700px;">
                <?php echo $content; ?>
            </div>
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <p>
                        <!--Powered by <a target=_blank "#" href="http://swapdevelopment.com/">Swap</a>--> 
                    </p>
                </div>
                <strong>Copyright &copy; 2016-2017 
                    <?php echo CHtml::encode(Yii::app()->params['company']) ?> </strong> All rights reserved.
            </footer>
        </div>
        <!--Wrapper-->
        <script>
            $(document).ready(function () {
                $('[data-toggle="offcanvas"]').click(function () {
                    $('.content-wrapper').toggleClass('active'),
                            $('.main-sidebar').toggleClass('active')
                });
            });
            function readImageFirst(file) {
                var reader = new FileReader();
                var image = new Image();
                reader.readAsDataURL(file);
                reader.onload = function (_file) {
                    image.src = _file.target.result;              // url.createObjectURL(file);
                    image.onload = function () {
                        var w = this.width,
                                h = this.height,
                                t = file.type, // ext only: // file.type.split('/')[1],
                                n = file.name,
                                s = ~~(file.size / 1024) + 'KB';
                        $('#uploadPreview').html('<img src="' + this.src + '"> ');
                        if (this.width > 1024 || 0)
                        {
                            //    alert('Width is too low  width is ' + this.width);
                        }
                    };
                    image.onerror = function () {
                        alert('Invalid file type: ' + file.type);
                    };
                };
            }
        </script>
    </body>
</html>
