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


        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/slider/core/slider.css" />
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,500italic,600italic,700italic,800italic,300,400,500,600,700,800&subset=latin,latin-ext" />

        <script src="<?php echo Yii::app()->theme->baseUrl ?>/slider/core/jquery.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/slider/core/jquery.mobile.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/slider/core/slider.js" type="text/javascript"></script>




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
                       href="<?php echo Yii::app()->createUrl('dashboard/index') ?>"><b>Organic Juniper Tree </b> </a>

                    <?php
                    }
                else
                    {
                    ?>
                    <a class="logo"
                       href="<?php echo Yii::app()->createUrl('site/index') ?>"><b>Organic Juniper Tree </b> </a>

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
<?php //$this->widget('ext.widgets.LanguageSelector');	   ?>
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
                            <li>







                            <li class="<?php echo ($this->id == 'user' and $this->action->id == 'admin') ? 'active' : '' ?>">
                                <a href="<?php echo Yii::app()->createURL('user/admin') ?>" >
                                    <i class="fa fa-user"></i><span> User</span></a>
                            </li>







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
                        Powered by <a target=_blank "#" href="http://swapdevelopment.com/">Swap</a> 
                    </p>
                </div>

                <strong>Copyright &copy; 2016-2017 
               <?php echo CHtml::encode(Yii::app()->params['company'])?> </strong> All rights reserved.
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

