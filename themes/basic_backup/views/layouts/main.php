
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

        <!-- Bootstrap -->
        <link
            href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css"
            rel="stylesheet">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css"
              rel="stylesheet">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/responsive.css"
              rel="stylesheet">
        <link rel="stylesheet"
              href="<?php echo Yii::app()->theme->baseUrl ?>/css/font-awesome.min.css" />
        <link rel="stylesheet"
              href="<?php echo Yii::app()->theme->baseUrl ?>/css/ionicons.min.css" />
        <link
            href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,100,600'
            rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/slider/core/slider.css" />
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,500italic,600italic,700italic,800italic,300,400,500,600,700,800&subset=latin,latin-ext" />

        <script src="<?php echo Yii::app()->theme->baseUrl ?>/slider/core/jquery.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/slider/core/jquery.mobile.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/slider/core/slider.js" type="text/javascript"></script>




    </head>


</head>
<body>


























    <header role="banner" class="navbar navbar-static-top bs-docs-nav">
        <div class="container">
            <div class="navbar-header">
                <button data-target=".navbar-collapse" data-toggle="collapse"
                        class="navbar-toggle" type="button">
                    <span class="sr-only">Toggle navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span
                        class="icon-bar"></span>
                </button>
                <a href="<?php echo Yii::app()->homeUrl; ?>" class="navbar-brand">Organic Juniper Tree </a>

            </div>
            <div class="collapse navbar-collapse">

                <ul class="nav navbar-nav navbar-right">



                    <li class="dropdown lang">
                        <div id="language-selector">
                            <?php //$this->widget('ext.widgets.LanguageSelector');	?>
                        </div>
                    </li>



                    <?php
                    if (Yii::app()->user->isGuest)
                        {
                        ?>

                        <li><a href="<?php echo Yii::app()->createUrl('user/login'); ?>"> <i
                                    class="ion-locked"></i>		<?php echo Yii::t('app', 'login'); ?> </a>
                        </li>

                        <?php
                        }
                    else
                        {
                        ?>
                        <li><a href="<?php echo Yii::app()->createUrl('user/account'); ?>"><?php echo Yii::t('app', 'My Account'); ?> </a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('user/logout'); ?>"><?php echo Yii::t('app', 'Logout'); ?></a>
                        </li>
<?php } ?>




                </ul>




            </div>
        </div>
    </header>





<?php echo $content; ?>

    <!-- slider begin -->
<!--    <div class="premier-slider"
         data-title="sukhjeet"
         data-color="#000000:#ffffff"
         data-font="Open Sans|http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,500italic,600italic,700italic,800italic,300,400,500,600,700,800&subset=latin,latin-ext"
         data-timer="0:"
         data-shadow="66:77:10:1:#0022ff"
         data-bullets="bullets:fill"
         data-navigation="arrows:1:1"
         data-arrows=""
         data-corners="5"
         data-config="960:450:0:1:0">

         slide 0 
        <div data-parallax="0" 
             data-index="0"
             data-color="#000000:#ffffff"
             data-effect="Fade:1000:0:Linear|Fade:1000:0:Linear|0">

             layer 0 (hiiiii this is my first slide)
            <div data-title="hiiiii this is my first slide"
                 data-index="0"
                 data-pos="35.729166666666664:27.555555555555557:22.1875:8.666666666666666:0:1:0"
                 data-font="pt"
                 data-color="#000000:transparent:100"></div>

        </div> slide 0

    </div> slider end -->


    <div class="clearfix"></div>
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="text-center copy">
                    &copy; <?php echo Yii::app()->params['company']; ?>. <?php echo Yii::t('app', 'All Rights Reserved'); ?>. | Powered by <a href="http://swapdevelopment.com/">Swap</a>
                </div>
            </div>
        </div>
    </section>

    <!--===   watermark ===-->
    <div class="watermark"
         style="visibility: hidden; bottom: 0; position: absolute; right: 0; visibility: hidden;">
        <a href="http://swapdevelopment.com/">Swap </a> 
    </div>
    <!--==  watermark ===-->
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









