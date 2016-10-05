<?php

class BookTableController extends GxController
    {

    public function filters()
        {
        return array(
            'accessControl',
        );
        }

    public function accessRules()
        {
        return array(
            array('allow',
                'actions' => array('index', 'view', 'book', 'timeReservation', 'details', 'cancel', 'booked' /* 'download', 'thumbnail' */),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('create', 'update', 'search'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('admin', 'delete'),
                'expression' => 'Yii::app()->user->isAdmin',
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
        }

    public function isAllowed($model)
        {
        return $model->isAllowed();
        }

    public function actionBook()
        {
        $this->pageCaption = "Book Table - Juniper Tree";
        $this->layout = '//layouts/column1';
        $model = new BookTable;
        $model_enq = new Enquiry;
        $this->performAjaxValidation($model, 'book-table-form');
        $this->performAjaxValidation($model_enq, 'enquiry-form');
        if (isset($_POST['book_now']))
            {
            $model->setAttributes($_POST['BookTable']);
            if ($model->save())
                {
                if (Yii::app()->getRequest()->getIsAjaxRequest()) Yii::app()->end();
                else $this->redirect(array('timeReservation', 'id' => $model->id));
                }
            }
        if (isset($_POST['Enquire_now']))
            {
//            echo '<pre>';
//            print_r($_POST);
//            echo '</pre>';
//            die();
            $model_enq->setAttributes($_POST['Enquiry']);
            if ($model_enq->save())
                {

                $contact_details = ContactDetails::model()->find();
                $messsage_admin = "
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Juniper Tree</title>
    <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
    
    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Italianno' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' type='text/css' href='css/owl.carousel.css'>
    
    
    <link rel='stylesheet' type='text/css' href='css/styles.css'>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
      <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
    <![endif]-->
    
  </head>
  
  <body style='margin:0;'>
<div style='background:#fff;min-height:100%;line-height:1;margin:0;width:100%!important' bgcolor='#fff'>


<table style='background:#747474;width:100%' bgcolor='#f3f2f1'>
  <tbody><tr align='center'>
    <td style='vertical-align:top' valign='top'></td>
    <td width='600' style='clear:both!important;display:block!important;margin:0 auto;max-width:600px!important;padding:0px;vertical-align:top' valign='top'>
      <div style='display:block;margin:0 auto;max-width:600px'>
        <div>
          <table width='100%' cellpadding='0' cellspacing='0' style='background:#000' bgcolor='#f3f2f1'>
            <tbody><tr>
              <td style='padding:16px;vertical-align:top' valign='top'>
                <table width='100%' cellpadding='0' cellspacing='0'>
                  <tbody><tr>
                    <td align='center' style='padding:0px;vertical-align:top' valign='top'>
                      <a href='#' style='text-decoration:none' target='_blank'>
                        <img src='http://organicjunipertree.com/beta/wdir/uploads/ContactDetails-1471074634-logo.png' title='Juniper Tree' alt='Juniper Tree' width='251' height='84' border='0' style='display:inline-block;max-width:100%;'>
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

<table width='100%' cellpadding='0' cellspacing='0' style='background:#fff' bgcolor='#fff'>
    <tbody><tr>
            <td style='vertical-align:top' valign='top'>
                <table width='100%' cellpadding='0' cellspacing='0'>
                    <tbody><tr>
                            <td style='padding:19px 0px 10px;text-align:center;vertical-align:top' align='center' valign='top'>
                                <span style='font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;font-size:28px;font-weight:normal;line-height:30px;text-align:center'>Booking Enquiry</span>
                            </td>
                        </tr>
                        <tr>
                            <td style='padding:0px 0px 10px;text-align:center;vertical-align:top' align='center' valign='top'>
                                <span style='font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;font-size:16px;font-weight:normal;line-height:18px;text-align:center'>Thanks for Choosing Us!</span>
                            </td>
                        </tr>
                        <tr>
                            <td style='padding:10px 0px 20px;text-align:center;vertical-align:top' align='center' valign='top'>
                                <a href='#' style='text-decoration:none' target='_blank'><img src='organicjunipertree.com/beta/wdir/uploads/BookPage-1472800143-img_tr.jpg' height='160' width='160' title='Juniper Tree' alt='Juniper Tree' border='0' style='border-radius:50%;display:inline-block;max-width:100%'></a>
                            </td>
                        </tr>
                        <tr>
                            <td style='padding:0px 0px 10px;text-align:center;vertical-align:top' align='center' valign='top'>
                                <a href='#' style='color:#da3743;text-decoration:none' target='_blank'><span style='color:#da3743;font-family:'Helvetica Neue',Arial,'Lucida Grande',sans-serif;font-size:18px;font-weight:normal;line-height:21px;text-align:center'>Juniper Tree</span></a>
                            </td>
                        </tr>
                        <tr>
                            <td style='padding:0px 0px 10px;text-align:center;vertical-align:top' align='center' valign='top'>
                                <span style='font-family:'Helvetica Neue',Arial,'Lucida Grande',sans-serif;font-size:16px;font-weight:normal;line-height:21px;text-align:center'>Table for 
                                 $model->party_size on Thursday, <?php // echo date('dS M Y', strtotime($model->date)) at  $model->time </span>
                            </td>
                        </tr>
                        <tr>
                            <td style='padding:0px;text-align:center;vertical-align:top' align='center' valign='top'>
                                <span style='font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;font-size:14px;font-weight:normal;line-height:21px;text-align:center'><span>Name</span>: <span> $model->first_name $model->last_name </span></span>
                            </td>
                        </tr>
                        <tr>
                            <td style='padding:0px 0px 10px;text-align:center;vertical-align:top' align='center' valign='top'>
                            </td>
                        </tr>
                        <tr>
                            <td style='padding:10px 0px;text-align:center;vertical-align:top' align='center' valign='top'>
                                <a href='http://organicjunipertree.com/beta/site/menu' style='color:#da3743;text-decoration:none' target='_blank'><span style='color:#da3743;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;font-size:14px;font-weight:normal;line-height:21px'>See menu</span></a>
                                <span style='color:#da3743;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;font-size:14px;font-weight:normal;line-height:21px'>|</span>
                                <a href='https://www.google.co.in/maps/place/Swapdevelopment+Pvt.+Ltd./@30.6793597,76.7443723,17z/data=!3m1!4b1!4m5!3m4!1s0x390fec0f1288ae75:0x15daac8b51615df3!8m2!3d30.6793551!4d76.746561?hl=en' style='color:#da3743;text-decoration:none' target='_blank'><span style='color:#da3743;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;font-size:14px;font-weight:normal;line-height:21px'>Get Direction</span></a>
                            </td>
                        </tr>
                        <tr>
                            <td style='padding:0px;text-align:center;vertical-align:top' align='center' valign='top'>
                                <span style='font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;font-size:12px;font-weight:normal;line-height:21px;text-align:center'> $contact_details->address, <br> $contact_details->city , </span>
                            </td>
                        </tr>
                        <tr>
                            <td style='padding:0px;text-align:center;vertical-align:top' align='center' valign='top'>
                                <span style='font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;font-size:12px;font-weight:normal;line-height:21px;text-align:center'>+  $contact_details->phone_no</span>
                            </td>
                        </tr><tr>
                            <td style='padding:0px;text-align:center;vertical-align:top' align='center' valign='top'>
                                <span style='font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;font-size:14px;font-weight:normal;line-height:20px;text-align:center'><span>Enjoy a 4 course menu and a variety of specially selected wines to create the perfect match. </span><br><span>Maximum of 4 diners. Includes VAT, excludes service. </span></span>
                            </td>
                        </tr>
                    </tbody></table>
            </td>
        </tr>
    </tbody></table>
</div>

</div>


<div style='clear:both;width:100%'>
    <table width='100%' cellpadding='0' cellspacing='0' style='background:#ffffff' bgcolor='#FFFFFF'>
        <tbody><tr>
                <td align='center' style='color:#c3beb8;font-size:13px;line-height:19px;padding:10px 32px 5px;vertical-align:top; background:#434343;' valign='top'>
                    <table width='100%' cellpadding='0' cellspacing='0'>
                        <tbody><tr>
                                <td align='left' style='color:#c3beb8;font-size:13px;line-height:19px;padding-bottom:24px;padding-top:14px;vertical-align:top;' valign='top'>
                                    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                                        <tbody><tr>
                                                <td align='left' height='27px' width='37px' style='color:#c3beb8;font-size:13px;line-height:30px!important;vertical-align:top' valign='top'>
                                                    <a href='#' style='color:#da3743!important;font-size:13px;line-height:19px;text-decoration:none' target='_blank'>
                                                        <img src='http://organicjunipertree.com/beta/wdir/uploads/ContactDetails-1471074634-logo.png' title='Juniper Tree' alt='Juniper Tree' border='0' height='84' width='251' style='display:inline-block;line-height:30px!important;max-width:100%;'>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                </td>
                                <td align='left' width='150' style='color:#c3beb8;font-size:13px;line-height:19px;vertical-align:top;' valign='top'>
                                    <table border='0' cellpadding='0' cellspacing='0' width='150' height='46'>
                                        <tbody><tr>
                                                <td align='left' style='color:#c3beb8;font-size:13px;line-height:30px!important;padding-top:16px;vertical-align:top;width:30px' valign='top'>
                                                    <a href='<?php echo $contact_details->facebook; ?>' style='color:#da3743!important;font-size:13px;line-height:19px' target='_blank'>
                                                        <img src='http://organicjunipertree.com/beta/themes/basic/images/fb.png' width='50' height='54' title='Facebook' alt='Facebook' border='0' style='display:block;max-width:100%'>
                                                    </a>
                                                </td>
                                                <td align='left' style='color:#c3beb8;font-size:13px;line-height:30px!important;padding-top:16px;vertical-align:top;width:30px' valign='top'>
                                                    <a href='<?php echo $contact_details->twitter; ?>' style='color:#da3743!important;font-size:13px;line-height:19px' target='_blank'>
                                                        <img src='http://organicjunipertree.com/beta/themes/basic/images/twitter.png' title='Twitter' alt='Twitter' border='0' width='50' height='54' style='display:block;max-width:100%'>
                                                    </a>
                                                </td>
                                                <td align='left' style='color:#c3beb8;font-size:13px;line-height:30px!important;padding-top:16px;vertical-align:top;width:30px' valign='top'>
                                                    <a href='<?php echo $contact_details->instagram; ?>' style='color:#da3743!important;font-size:13px;line-height:19px' target='_blank'>
                                                        <img src='http://organicjunipertree.com/beta/themes/basic/images/insta.png' title='Instagram' alt='Instagram' border='0' width='50' height='54' style='display:block;max-width:100%'>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                </td>
                            </tr>
                        </tbody></table>
                    <table width='100%' cellpadding='0' cellspacing='0'>
                        <tbody><tr>
                                <td align='left' style='clear:both;color:#c3beb8;font-size:13px;line-height:19px;padding:0px;vertical-align:top;width:100%' valign='top'>
                                    <span style='color:#c3beb8;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;font-size:13px;font-weight:normal;line-height:19px'>Have questions? Visit <a href='#' style='color:#60b2d0;text-decoration:none' target='_blank'><?php echo $contact_details->email; ?></a></span>
                                </td>
                            </tr>
                            <tr>
                                <td align='left' style='clear:both;color:#c3beb8;font-size:13px;line-height:19px;padding:0px;vertical-align:top;width:100%' valign='top'>
                                    <span style='color:#c3beb8;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;font-size:13px;font-weight:normal;line-height:19px'>
                                        Registered office: Mohali <br> 
                                        Company number: 4565465 <br> 
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
                                            <table width='100%' cellpadding='0' cellspacing='0' style='background:#434343' bgcolor='#F3F2F1'>
                                                <tbody><tr>
                                                        <td style='vertical-align:top' valign='top'>
                                                            <table width='100%' cellpadding='0' cellspacing='0'>
                                                                <tbody><tr>
                                                                        <td height='15' align='center' style='vertical-align:top' valign='top'>
                                                                            <table>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style='vertical-align:top' valign='top'>
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
                                <td style='vertical-align:top' valign='top'></td>
                            </tr>
                        </tbody></table>

                    </div>
                    </body>
                    </html>";
                $messsage_user = "
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Juniper Tree</title>
    <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
    
    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Italianno' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' type='text/css' href='css/owl.carousel.css'>
    
    
    <link rel='stylesheet' type='text/css' href='css/styles.css'>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
      <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
    <![endif]-->
    
  </head>
  
  <body style='margin:0;'>
<div style='background:#fff;min-height:100%;line-height:1;margin:0;width:100%!important' bgcolor='#fff'>


<table style='background:#747474;width:100%' bgcolor='#f3f2f1'>
  <tbody><tr align='center'>
    <td style='vertical-align:top' valign='top'></td>
    <td width='600' style='clear:both!important;display:block!important;margin:0 auto;max-width:600px!important;padding:0px;vertical-align:top' valign='top'>
      <div style='display:block;margin:0 auto;max-width:600px'>
        <div>
          <table width='100%' cellpadding='0' cellspacing='0' style='background:#000' bgcolor='#f3f2f1'>
            <tbody><tr>
              <td style='padding:16px;vertical-align:top' valign='top'>
                <table width='100%' cellpadding='0' cellspacing='0'>
                  <tbody><tr>
                    <td align='center' style='padding:0px;vertical-align:top' valign='top'>
                      <a href='#' style='text-decoration:none' target='_blank'>
                        <img src='http://organicjunipertree.com/beta/wdir/uploads/ContactDetails-1471074634-logo.png' title='Juniper Tree' alt='Juniper Tree' width='251' height='84' border='0' style='display:inline-block;max-width:100%;'>
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

<table width='100%' cellpadding='0' cellspacing='0' style='background:#fff' bgcolor='#fff'>
    <tbody><tr>
            <td style='vertical-align:top' valign='top'>
                <table width='100%' cellpadding='0' cellspacing='0'>
                    <tbody><tr>
                            <td style='padding:19px 0px 10px;text-align:center;vertical-align:top' align='center' valign='top'>
                                <span style='font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;font-size:28px;font-weight:normal;line-height:30px;text-align:center'>Thanks for Booking Enquiry </span>
                            </td>
                        </tr>
                        
                        <tr>
                            <td style='padding:10px 0px 20px;text-align:center;vertical-align:top' align='center' valign='top'>
                                <a href='#' style='text-decoration:none' target='_blank'><img src='http://organicjunipertree.com/beta/wdir/uploads/BookPage-1472800143-img_tr.jpg' height='160' width='160' title='Juniper Tree' alt='Juniper Tree' border='0' style='border-radius:50%;display:inline-block;max-width:100%'></a>
                            </td>
                        </tr>
                       
                        
                       
                       
                        
                        
                    </tbody></table>
            </td>
        </tr>
    </tbody></table>
</div>

</div>


<div style='clear:both;width:100%'>
    <table width='100%' cellpadding='0' cellspacing='0' style='background:#ffffff' bgcolor='#FFFFFF'>
        <tbody><tr>
                <td align='center' style='color:#c3beb8;font-size:13px;line-height:19px;padding:10px 32px 5px;vertical-align:top; background:#434343;' valign='top'>
                    <table width='100%' cellpadding='0' cellspacing='0'>
                        <tbody><tr>
                                <td align='left' style='color:#c3beb8;font-size:13px;line-height:19px;padding-bottom:24px;padding-top:14px;vertical-align:top;' valign='top'>
                                    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                                        <tbody><tr>
                                                <td align='left' height='27px' width='37px' style='color:#c3beb8;font-size:13px;line-height:30px!important;vertical-align:top' valign='top'>
                                                    <a href='#' style='color:#da3743!important;font-size:13px;line-height:19px;text-decoration:none' target='_blank'>
                                                        <img src='http://organicjunipertree.com/beta/wdir/uploads/ContactDetails-1471074634-logo.png' title='Juniper Tree' alt='Juniper Tree' border='0' height='84' width='251' style='display:inline-block;line-height:30px!important;max-width:100%;'>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                </td>
                                <td align='left' width='150' style='color:#c3beb8;font-size:13px;line-height:19px;vertical-align:top;' valign='top'>
                                    <table border='0' cellpadding='0' cellspacing='0' width='150' height='46'>
                                        <tbody><tr>
                                                <td align='left' style='color:#c3beb8;font-size:13px;line-height:30px!important;padding-top:16px;vertical-align:top;width:30px' valign='top'>
                                                    <a href='<?php echo $contact_details->facebook; ?>' style='color:#da3743!important;font-size:13px;line-height:19px' target='_blank'>
                                                        <img src='http://organicjunipertree.com/beta/themes/basic/images/fb.png' width='50' height='54' title='Facebook' alt='Facebook' border='0' style='display:block;max-width:100%'>
                                                    </a>
                                                </td>
                                                <td align='left' style='color:#c3beb8;font-size:13px;line-height:30px!important;padding-top:16px;vertical-align:top;width:30px' valign='top'>
                                                    <a href='<?php echo $contact_details->twitter; ?>' style='color:#da3743!important;font-size:13px;line-height:19px' target='_blank'>
                                                        <img src='http://organicjunipertree.com/beta/themes/basic/images/twitter.png' title='Twitter' alt='Twitter' border='0' width='50' height='54' style='display:block;max-width:100%'>
                                                    </a>
                                                </td>
                                                <td align='left' style='color:#c3beb8;font-size:13px;line-height:30px!important;padding-top:16px;vertical-align:top;width:30px' valign='top'>
                                                    <a href='<?php echo $contact_details->instagram; ?>' style='color:#da3743!important;font-size:13px;line-height:19px' target='_blank'>
                                                        <img src='http://organicjunipertree.com/beta/themes/basic/images/insta.png' title='Instagram' alt='Instagram' border='0' width='50' height='54' style='display:block;max-width:100%'>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                </td>
                            </tr>
                        </tbody></table>
                    <table width='100%' cellpadding='0' cellspacing='0'>
                        <tbody>
                            <tr>
                                <td align='left' style='clear:both;color:#c3beb8;font-size:13px;line-height:19px;padding:0px;vertical-align:top;width:100%' valign='top'>
                                    <span style='color:#c3beb8;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;font-size:13px;font-weight:normal;line-height:19px'>
                                        Registered office: Mohali <br>
                                        Company number: 87878754 <br>
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
                                            <table width='100%' cellpadding='0' cellspacing='0' style='background:#434343' bgcolor='#F3F2F1'>
                                                <tbody><tr>
                                                        <td style='vertical-align:top' valign='top'>
                                                            <table width='100%' cellpadding='0' cellspacing='0'>
                                                                <tbody><tr>
                                                                        <td height='15' align='center' style='vertical-align:top' valign='top'>
                                                                            <table>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style='vertical-align:top' valign='top'>
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
                                <td style='vertical-align:top' valign='top'></td>
                            </tr>
                        </tbody></table>

                    </div>
                    </body>
                    </html>";



                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'To: yourself<info@yourself.com>' . "\r\n";
                $headers .= 'From: myself<info@myself.com>' . "\r\n";
                mail($_POST['Enquiry']['email'], "Thanx For Booking Enquiry ", $messsage_user, $headers);
                mail("swap.guleria@gmail.com", "Booking Enquiry ", $messsage_admin, $headers);
//                $model_enq->sendEmail($_POST['Enquiry']['email'], 'Enquiiry Mail', 'enquiry');
//                $model_enq->sendEmail("swap.guleria@gmail.com", 'Enquiiry Mail', 'enquiry_admin');
//                $this->redirect(array('enquiry/sucess', 'id' => $model_enq->id));
                }
            else
                {
                print_r($model_enq->getErrors());
                }
            }
        $this->render('book', array('model' => $model, 'model_enq' => $model_enq));
        }

    public function actiontimeReservation($id)
        {
        $this->pageCaption = "Book Table - Juniper Tree";
        $this->layout = '//layouts/column1';
        $model = $this->loadModel($id, 'BookTable');
        $this->performAjaxValidation($model, 'book-table-form');
        $this->render('time_reservation', array('model' => $model));
        }

    public function actionDetails($id, $time)
        {
        $this->pageCaption = "Book Table - Juniper Tree";
        $this->layout = '//layouts/column1';
        $model = $this->loadModel($id, 'BookTable');
        $this->performAjaxValidation($model, 'book-table-form');
        if (isset($_POST['BookTable']))
            {
//                        print_r($_POST);
//                        die();
            $model->setAttributes($_POST['BookTable']);
            if ($model->save())
                {
//                  $data = $this->loadModel($id, 'BookTable');
                $model_booked = new BookedTable;
                $model_booked->date = $model['date'];
                $model_booked->time = $model['time'];
                $model_booked->party_size = $model['party_size'];
                $model_booked->first_name = $model['first_name'];
                $model_booked->last_name = $model['last_name'];
                $model_booked->email = $model['email'];
                $model_booked->phone_no = $model['phone_no'];
                $model_booked->special_request = $model['special_request'];
                $model_booked->email_subscription = $model['email_subscription'];
//                echo "<pre>";
//                print_r($model);
//                die();
                if ($model_booked->save())
                    {
                    if (Yii::app()->getRequest()->getIsAjaxRequest()) Yii::app()->end();
                    $this->redirect(array('booked', 'id' => $model->id));
                    }else
                    {
                    $err = '';
                    foreach ($model_booked->getErrors() as $error)
                        {
                        $err .= implode(',', $error);
                        }
                    echo $err;
                    }
                }
            else
                {
                $err = '';
                foreach ($model->getErrors() as $error)
                    {
                    $err .= implode(',', $error);
                    }
                echo $err;
                }
            }
        $this->render('details', array('model' => $model, 'time' => $time));
        }

    public function actionBooked($id)
        {
        $this->pageCaption = "Book Table - Juniper Tree";
        $this->layout = '//layouts/column1';
        $model = $this->loadModel($id, 'BookTable');
        $this->performAjaxValidation($model, 'book-table-form');
        if (isset($_POST['BookTable']))
            {
//            print_r($_POST);
            $model->setAttributes($_POST['BookTable']);
            if ($model->save())
                {
                if (Yii::app()->getRequest()->getIsAjaxRequest()) Yii::app()->end();
//                 else $this->redirect(array('Details', 'id' => $model->id));
                $this->redirect(array('booking_done', 'id' => $model->id));
                }else
                {
                $err = '';
                foreach ($model->getErrors() as $error)
                    {
                    $err .= implode(',', $error);
                    }
                echo $err;
                }
            }
        $this->render('booking_done', array('model' => $model));
        }

    public function actionView($id)
        {
        $model = $this->loadModel($id, 'BookTable');
        //if( !($this->isAllowed ( $model)))	throw new CHttpException(403, Yii::t('app','You are not allowed to access this page.'));
        $this->updateMenuItems($model);
        $this->render('view', array(
            'model' => $model
        ));
        }

    public function actionCreate()
        {
        $model = new BookTable;
        $this->performAjaxValidation($model, 'book-table-form');
        if (isset($_POST['BookTable']))
            {
            $model->setAttributes($_POST['BookTable']);
            if ($model->save())
                {
                if (Yii::app()->getRequest()->getIsAjaxRequest()) Yii::app()->end();
                else $this->redirect(array('view', 'id' => $model->id));
                }
            }
        $this->updateMenuItems($model);
        $this->render('create', array('model' => $model));
        }

    public function actionUpdate($id)
        {
        $model = $this->loadModel($id, 'BookTable');
        //if( !($this->isAllowed ( $model)))	throw new CHttpException(403, Yii::t('app','You are not allowed to access this page.'));
        $this->performAjaxValidation($model, 'book-table-form');
        if (isset($_POST['BookTable']))
            {
            $model->setAttributes($_POST['BookTable']);
            if ($model->save())
                {
                $this->redirect(array('view', 'id' => $model->id));
                }
            }
        $this->updateMenuItems($model);
        $this->render('update', array(
            'model' => $model,
        ));
        }

    public function actionCancel($id)
        {
        $this->layout = '//layouts/column1';
        $model = $this->loadModel($id, 'BookTable');
        //if( !($this->isAllowed ( $model)))	throw new CHttpException(403, Yii::t('app','You are not allowed to access this page.'));
        $this->updateMenuItems($model);
        $this->render('booking_cancel', array(
            'model' => $model,
        ));
        }

    public function actionDelete($id)
        {
        $model = $this->loadModel($id, 'BookTable');
        //if( !($this->isAllowed ( $model)))	throw new CHttpException(403, Yii::t('app','You are not allowed to access this page.'));
        if (Yii::app()->getRequest()->getIsPostRequest())
            {
            $this->loadModel($id, 'BookTable')->delete();
            if (!Yii::app()->getRequest()->getIsAjaxRequest()) $this->redirect(array('admin'));
            }
        else throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }

    public function actionIndex()
        {
        $this->updateMenuItems();
        $dataProvider = new CActiveDataProvider('BookTable');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
        }

    public function actionSearch()
        {
        $model = new Job('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);
        if (isset($_GET['BookTable']))
            {
            $model->setAttributes($_GET['BookTable']);
            $this->renderPartial('_list', array(
                'dataProvider' => $model->search(),
                'model' => $model,
            ));
            }
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
        }

    public function actionAdmin()
        {
        $model = new BookTable('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);
        if (isset($_GET['BookTable'])) $model->setAttributes($_GET['BookTable']);
        $this->render('admin', array(
            'model' => $model,
        ));
        }

    /* protected function processActions($model = null)
      {
      parent::processActions($model);
      //$this->actions [] = array('label'=>Yii::t('app', 'Add Skill'), 'url'=>array('skill', 'id' => $model->id),'icon'=>'icon-plus icon-white');
      } */

    protected function updateMenuItems($model = null)
        {
        // create static model if model is null
        if ($model == null) $model = new BookTable();
        switch ($this->action->id)
            {
            case 'update':
                    {
                    $this->menu[] = array('label' => Yii::t('app', 'View'), 'url' => array('view', 'id' => $model->id), 'icon' => 'icon-plus icon-white');
                    }
            case 'create':
                    {
                    $this->menu[] = array('label' => Yii::t('app', 'Manage'), 'url' => array('admin'), 'visible' => Yii::app()->user->isAdmin, 'icon' => 'icon-wrench icon-white');
                    $this->menu[] = array('label' => Yii::t('app', 'List'), 'url' => array('index'), 'icon' => 'icon-th-list icon-white');
                    }
                break;
            case 'index':
                    {
                    $this->menu[] = array('label' => Yii::t('app', 'Manage'), 'url' => array('admin'), 'visible' => Yii::app()->user->isAdmin, 'icon' => 'icon-wrench icon-white');
                    $this->menu[] = array('label' => Yii::t('app', 'Create'), 'url' => array('create'), 'icon' => 'icon-plus icon-white');
                    }
                break;
            case 'admin':
                    {
                    $this->menu[] = array('label' => Yii::t('app', 'List'), 'url' => array('index'), 'icon' => 'icon-th-list icon-white');
                    $this->menu[] = array('label' => Yii::t('app', 'Create'), 'url' => array('create'), 'icon' => 'icon-plus icon-white');
                    }
                break;
            default:
            case 'view':
                    {
                    $this->menu[] = array('label' => Yii::t('app', 'List'), 'url' => array('index'), 'icon' => 'icon-th-list icon-white');
                    $this->menu[] = array('label' => Yii::t('app', 'Manage'), 'url' => array('admin'), 'visible' => Yii::app()->user->isAdmin, 'icon' => 'icon-wrench icon-white');
                    $this->menu[] = array('label' => Yii::t('app', 'Delete'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id),
                            'confirm' => 'Are you sure you want to delete this item?'), 'visible' => Yii::app()->user->isAdmin, 'icon' => 'icon-remove icon-white');
                    $this->menu[] = array('label' => Yii::t('app', 'Create'), 'url' => array('create'), 'icon' => 'icon-plus icon-white');
                    $this->menu[] = array('label' => Yii::t('app', 'Update'), 'url' => array('update', 'id' => $model->id), 'visible' => Yii::app()->user->isAdmin, 'icon' => 'icon-edit icon-white');
                    }
                break;
            }
        // Add SEO headers
        $this->processSEO($model);
        //merge actions with menu
        $this->actions = array_merge($this->actions, $this->menu);
        }

    }
