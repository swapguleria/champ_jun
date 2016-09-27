<?php

class SiteController extends Controller
    {
    public $layout = '/layouts/column1';

    /**
     * Declares class-based actions.
     */
    public function actions()
        {
        return array(
// captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
// They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
        }

    public function actionIndex()
        {
        $this->pageCaption = "Juniper Tree";
        $this->layout = '//layouts/column1';

        $model = new User('create');

        if (isset($_POST ['User']))
            {
//            print_r($_POST);
//            die();
            $model->setAttributes($_POST ['User']);
            $already_subscribed = Yii::app()->mailchimp->emailExists($model->email);
            if ($already_subscribed)
                {
                Yii::app()->user->setFlash('error', $model->email . ' Email Already Subscribed ');
//                echo $model->addError('email', 'Email Already Subscribed.');
                $this->redirect(array('site/index#neewletter_sucess'));
                }
            else
                {
                $model->setAttributes($_POST ['User']);

                $subscribe = Yii::app()->mailchimp->listSubscribe($model->email, $model->first_name, $doubleOptIn = true);
//                $subscribe = Yii::app()->mailchimp->emailExists($model->email);
                if ($subscribe)
                    {
//                    echo "Sda";
                    Yii::app()->user->setFlash('newsletter', 'Please Check your email ' . $model->email);
                    $this->redirect(array('site/index#neewletter_sucess'));   //redirect to action that you want.
                    }
//                else
//                    {
////                    echo "not Sent";
//                    }
                }
            }
//        $this->updateMenuItems($model);
        $this->render('index', array('model' => $model));
        }

    public function actionAbout()
        {
        $this->pageCaption = "About - Juniper Tree";
        $this->layout = '//layouts/column1';
        $this->render('about');
        }

    public function actionMenu()
        {
        $this->pageCaption = "Menu - Juniper Tree";
        $this->layout = '//layouts/column1';
        $this->render('menu');
        }

    public function actionEvents()
        {
        $this->pageCaption = 'Events - Juniper Tree';
        $this->layout = '//layouts/column1';
        $this->render('events');
        }

    public function actionblog()
        {
        $this->pageCaption = 'Blog - Juniper Tree';
        $this->layout = '//layouts/column1';
        $this->render('blog');
        }

    public function actionEmail($email)
        {

        $model = new Answer();
        $model->email = $email;

        if ($model->save()) echo json_encode("data is Save");
        else
            {

            echo json_encode("data is Not Save");
            }

//$this->render('index2');
        }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
        {
        if ($error = Yii::app()->errorHandler->error)
            {
            if (Yii::app()->request->isAjaxRequest) echo $error['message'];
            else $this->render('error', $error);
            }
        }

    /**
     * Displays the contact page
     */
//    public function actionContact()
//        {
//        $this->pageCaption = 'Contact - Juniper Tree';
//        $this->layout = '//layouts/column1';
//        $this->render('events');
//        }
//    public function actionProduct()
//        {
//        $model = new User();
//        $this->render('product', array('model' => $model));
//        }
//    public function actionAnswer($answer)
//        {
//
//        $ans = new Answer;
//        $ans->answer = $answer;
//        if ($ans->save()) echo json_encode("data is Save");else
//            {
//
//            echo json_encode("data is Not Save");
//            }
//
//        //$this->render('index2');
//        }

    public function actionContact()
        {
//        $to = "himekaranguleria@gmail.com";
//        $subject = "contact us";
//        $txt = "Hello world!";
//        $headers = "From: webmaster@example.com" . "\r\n" .
//                "CC: somebodyelse@example.com";
//
//        mail($to, $subject, $txt, $headers);
//        mail("swap.guleria@gmail.com", "My subject", 'sad');
        $this->pageCaption = 'Contact - Juniper Tree';
        $this->layout = '//layouts/column1';
        $model = new ContactForm('contact-form');

        if (isset($_POST['ContactForm']))
            {
            $to = Yii::app()->params['adminEmail'];
            $email = $model->email;
            $msg = $model->message;
            $subject = "Contact Request";
            $message = ' <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Juniper Tree</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Italianno" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">  
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn"t work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body style="margin:0;">
<div style="background:#fff;min-height:100%;line-height:1;margin:0;width:100%!important" bgcolor="#fff">
<table style="background:#747474;width:100%" bgcolor="#f3f2f1">
  <tbody><tr align="center">
    <td style="vertical-align:top" valign="top"></td>
    <td width="600" style="clear:both!important;display:block!important;margin:0 auto;max-width:600px!important;padding:0px;vertical-align:top" valign="top">
      <div style="display:block;margin:0 auto;max-width:600px">
        <div>
          <table width="100%" cellpadding="0" cellspacing="0" style="background:#000" bgcolor="#f3f2f1">
            <tbody><tr>
              <td style="padding:16px;vertical-align:top" valign="top">
                <table width="100%" cellpadding="0" cellspacing="0">
                  <tbody><tr>
                    <td align="center" style="padding:0px;vertical-align:top" valign="top">
                      <a href="#" style="text-decoration:none" target="_blank">
                        <img src="http://organicjunipertree.com/wdir/uploads/ContactDetails-1471074634-logo.png" title="Juniper Tree" alt="Juniper Tree" width="251" height="84" border="0" style="display:inline-block;max-width:100%;">
                      </a>
                    </td>
                  </tr>
                </tbody></table>
              </td>
            </tr>
          </tbody></table>
        </div>
    <div>
<div>
                     

<table width="100%" cellpadding="0" cellspacing="0" style="background:#fff" bgcolor="#fff">
    <tbody><tr>
            <td style="vertical-align:top" valign="top">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td style="padding:10px 0px 20px;text-align:center;vertical-align:top" align="center" valign="top">
                                <a href="#" style="text-decoration:none" target="_blank"><img src="http://designer.dexterousteam.com/Junipertree/images/restaurant-img.jpg" height="160" width="160" title="Juniper Tree" alt="Juniper Tree" border="0" style="border-radius:50%;display:inline-block;max-width:100%"></a>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:0px 0px 10px;text-align:center;vertical-align:top" align="center" valign="top">
                                <a href="#" style="color:#da3743;text-decoration:none" target="_blank"><span style="color:#da3743;font-family:"Helvetica Neue",Arial,"Lucida Grande",sans-serif;font-size:18px;font-weight:normal;line-height:21px;text-align:center">Juniper Tree</span></a>
                            </td>
                        </tr>
                           <tr>
                            <td style="padding:0px;text-align:center;vertical-align:top" align="center" valign="top">
                                <span style="font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;font-size:14px;font-weight:normal;line-height:21px;text-align:center"><span>Name</span>: ' . $_POST['ContactForm']['name'] . '
                            </td>
                        </tr>
                           <tr>
                            <td style="padding:0px;text-align:center;vertical-align:top" align="center" valign="top">
                                <span style="font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;font-size:14px;font-weight:normal;line-height:21px;text-align:center"><span>Email</span>: ' . $_POST['ContactForm']['email'] . '
                            </td>
                        </tr>
                           <tr>
                            <td style="padding:0px;text-align:center;vertical-align:top" align="center" valign="top">
                                <span style="font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;font-size:14px;font-weight:normal;line-height:21px;text-align:center"><span>Message</span>: ' . $_POST['ContactForm']['message'] . '
                            </td>
                        </tr>
                    </tbody>
                    </table>
            </td>
        </tr>
    </tbody></table>
</div>

</div>
            <div style = "clear:both;width:100%">
            <table width = "100%" cellpadding = "0" cellspacing = "0" style = "background:#ffffff" bgcolor = "#FFFFFF">
            <tbody><tr>
            <td align = "center" style = "color:#c3beb8;font-size:13px;line-height:19px;padding:10px 32px 5px;vertical-align:top; background:#434343;" valign = "top">
            <table width = "100%" cellpadding = "0" cellspacing = "0">
            <tbody><tr>
            <td align = "left" style = "color:#c3beb8;font-size:13px;line-height:19px;padding-bottom:24px;padding-top:14px;vertical-align:top;" valign = "top">
            <table border = "0" cellpadding = "0" cellspacing = "0" width = "100%">
            <tbody><tr>
            <td align = "left" height = "27px" width = "37px" style = "color:#c3beb8;font-size:13px;line-height:30px!important;vertical-align:top" valign = "top">
            <a href = "#" style = "color:#da3743!important;font-size:13px;line-height:19px;text-decoration:none" target = "_blank">
            <img src = "http://organicjunipertree.com/wdir/uploads/ContactDetails-1471074634-logo.png" title = "Juniper Tree" alt = "Juniper Tree" border = "0" height = "84" width = "251" style = "display:inline-block;line-height:30px!important;max-width:100%;">
            </a>
            </td>
            </tr>
            </tbody></table>
            </td>
            <td align = "left" width = "150" style = "color:#c3beb8;font-size:13px;line-height:19px;vertical-align:top;" valign = "top">
            <table border = "0" cellpadding = "0" cellspacing = "0" width = "150" height = "46">
            <tbody><tr>
            <td align = "left" style = "color:#c3beb8;font-size:13px;line-height:30px!important;padding-top:16px;vertical-align:top;width:30px" valign = "top">
            <a href = "<?php echo $contact_details->facebook; ?>" style = "color:#da3743!important;font-size:13px;line-height:19px" target = "_blank">
            <img src = "http://organicjunipertree.com/themes/basic/images/fb.png" width = "50" height = "54" title = "Facebook" alt = "Facebook" border = "0" style = "display:block;max-width:100%">
            </a>
            </td>
            <td align = "left" style = "color:#c3beb8;font-size:13px;line-height:30px!important;padding-top:16px;vertical-align:top;width:30px" valign = "top">
            <a href = "<?php echo $contact_details->twitter; ?>" style = "color:#da3743!important;font-size:13px;line-height:19px" target = "_blank">
            <img src = "http://organicjunipertree.com/themes/basic/images/twitter.png" title = "Twitter" alt = "Twitter" border = "0" width = "50" height = "54" style = "display:block;max-width:100%">
            </a>
            </td>
            <td align = "left" style = "color:#c3beb8;font-size:13px;line-height:30px!important;padding-top:16px;vertical-align:top;width:30px" valign = "top">
            <a href = "<?php echo $contact_details->instagram; ?>" style = "color:#da3743!important;font-size:13px;line-height:19px" target = "_blank">
            <img src = "http://organicjunipertree.com/themes/basic/images/insta.png" title = "Instagram" alt = "Instagram" border = "0" width = "50" height = "54" style = "display:block;max-width:100%">
            </a>
            </td>
            </tr>
            </tbody></table>
            </td>
            </tr>
            </tbody></table>
            <table width = "100%" cellpadding = "0" cellspacing = "0">
            <tbody><tr>
            <td align = "left" style = "clear:both;color:#c3beb8;font-size:13px;line-height:19px;padding:0px;vertical-align:top;width:100%" valign = "top">
            <span style = "color:#c3beb8;font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;font-size:13px;font-weight:normal;line-height:19px">Have questions? Visit <a href = "#" style = "color:#60b2d0;text-decoration:none" target = "_blank"><?php echo $contact_details->email;
            ?></a></span>
</td>
</tr>
<tr>
    <td align="left" style="clear:both;color:#c3beb8;font-size:13px;line-height:19px;padding:0px;vertical-align:top;width:100%" valign="top">
        <span style="color:#c3beb8;font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;font-size:13px;font-weight:normal;line-height:19px">
              Registered office:<br>
            Company number:<br>
            <span>&copy; 2016 The Juniper Tree. All rights reserved.</span>
            <br>
            </td>
            </tr>
            </tbody></table>
            </td>
            </tr>
            </tbody></table>
            </div>

            </div>


            <div>
                <table width="100%" cellpadding="0" cellspacing="0" style="background:#434343" bgcolor="#F3F2F1">
                    <tbody><tr>
                            <td style="vertical-align:top" valign="top">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                    <tbody><tr>
                                            <td height="15" align="center" style="vertical-align:top" valign="top">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td style="vertical-align:top" valign="top">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </td>
                        </tr>
                    </tbody></table>
            </div>

        </div>
</td>
<td style="vertical-align:top" valign="top"></td>
</tr>
</tbody></table>

</div>
</body>
</html>  ';
            $header = "From:" . $email . " \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";
            $retval = mail("swap.guleria@gmail.com", "Contact Us", $message, $header);

            if ($retval)
                {
                Yii::app()->user->setFlash('contact', '<div class="alert alert-success">' . 'Thank you for contacting us. We will respond to you as soon as possible.' . '</div>');
                }
            else
                {
                Yii::app()->user->setFlash('contact', '<div class="alert alert-success">' . 'Thank you for contacting us. We will respond to you as soon as possible.' . '</div>');
                }
            }
//            }
//
//
//









        $this->render('contact', array('model' => $model));
        }

//    public function actionPrivacy()
//        {
//        $criteria = new CDbCriteria;
//        $criteria->addCondition('type_id = ' . Page::PAGE_PRIVACY_POLICY);
//        $page = Page::model()->find($criteria);
//
//        $this->render('privacy', array('page' => $page));
//        }
//    public function actionTerms()
//        {
//        $criteria = new CDbCriteria;
//        $criteria->addCondition('type_id = ' . Page::PAGE_TERM_CONDITION);
//        $page = Page::model()->find($criteria);
//        $this->render('terms', array('page' => $page));
//        }

    public function actionDeleteAssets()
        {
        $path = Yii::app()->basePath . '/../assets';
        User::rrmdir($path);
        $runtime = Yii::app()->runtimePath;
        User::rrmdir($runtime);
        }

    public function actionSitemap()
        {
//lastmod

        $map_links = array(
            array(
                'loc' => Yii::app()->createAbsoluteUrl('/'),
                'changefreq' => 'daily',
                'priority' => '1',
                'lastmod' => date('Y-m-d\TH:i:sP'),
            ),
            array(
                'loc' => Yii::app()->createAbsoluteUrl('/site/index'),
                'changefreq' => 'daily',
                'priority' => '0.8',
                'lastmod' => date('Y-m-d\TH:i:sP'),
            ),
            array(
                'loc' => Yii::app()->createAbsoluteUrl('/site/terms'),
                'changefreq' => 'daily',
                'priority' => '0.8',
                'lastmod' => date('Y-m-d\TH:i:sP'),
            ),
            array(
                'loc' => Yii::app()->createAbsoluteUrl('/site/privacy'),
                'changefreq' => 'daily',
                'priority' => '0.8',
                'lastmod' => date('Y-m-d\TH:i:sP'),
            ),
            array(
                'loc' => Yii::app()->createAbsoluteUrl('/site/contact'),
                'changefreq' => 'daily',
                'priority' => '0.8',
                'lastmod' => date('Y-m-d\TH:i:sP'),
            ),
        );
        Yii::import('ext.Sitemap');
        $sitemap = new Sitemap();
        $sitemap->AddData($map_links);
        $sitemap->getSitemapUrls(0.4);
        $sitemap->renderXML();
        }

    }
