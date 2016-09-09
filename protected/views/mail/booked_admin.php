
<?php
 include 'header.php'; 

$contact_details = ContactDetails::model()->find();
?>


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
                                <a href="#" style="color:#da3743;text-decoration:none" target="_blank"><span style="color:#da3743;font-family:'Helvetica Neue',Arial,'Lucida Grande',sans-serif;font-size:18px;font-weight:normal;line-height:21px;text-align:center">Juniper Tree</span></a>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:0px 0px 10px;text-align:center;vertical-align:top" align="center" valign="top">
                                <span style="font-family:'Helvetica Neue',Arial,'Lucida Grande',sans-serif;font-size:16px;font-weight:normal;line-height:21px;text-align:center">Table for 
<?php echo $model->party_size; ?> on Thursday, <?php echo date('dS M Y', strtotime($model->date)); ?> at <?php echo $model->time; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:0px;text-align:center;vertical-align:top" align="center" valign="top">
                                <span style="font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;font-size:14px;font-weight:normal;line-height:21px;text-align:center"><span>Name</span>: <span><?php echo $model->first_name; ?> <?php echo $model->last_name; ?></span></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:0px 0px 10px;text-align:center;vertical-align:top" align="center" valign="top">

                            </td>
                        </tr>
                        <tr>
                            <td style="padding:10px 0px;text-align:center;vertical-align:top" align="center" valign="top">
                                <a href="http://development.dexterousteam.com/organicjunipertree/site/menu" style="color:#da3743;text-decoration:none" target="_blank"><span style="color:#da3743;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;font-size:14px;font-weight:normal;line-height:21px">See menu</span></a>
                                <span style="color:#da3743;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;font-size:14px;font-weight:normal;line-height:21px">|</span>
                                <a href="https://www.google.co.in/maps/place/Swapdevelopment+Pvt.+Ltd./@30.6793597,76.7443723,17z/data=!3m1!4b1!4m5!3m4!1s0x390fec0f1288ae75:0x15daac8b51615df3!8m2!3d30.6793551!4d76.746561?hl=en" style="color:#da3743;text-decoration:none" target="_blank"><span style="color:#da3743;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;font-size:14px;font-weight:normal;line-height:21px">Get directions</span></a>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:0px;text-align:center;vertical-align:top" align="center" valign="top">
                                <span style="font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;font-size:12px;font-weight:normal;line-height:21px;text-align:center"><?php echo $contact_details->address, "<br>", $contact_details->city; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:0px;text-align:center;vertical-align:top" align="center" valign="top">
                                <span style="font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;font-size:12px;font-weight:normal;line-height:21px;text-align:center">+<?php echo $contact_details->phone_no; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:0px;text-align:center;vertical-align:top" align="center" valign="top">
                                <span style="font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;font-size:14px;font-weight:normal;line-height:20px;text-align:center"><span>Enjoy a 4 course menu and a variety of specially selected wines to create the perfect match. </span><br><span>Maximum of 4 diners. Includes VAT, excludes service. </span></span>
                            </td>
                        </tr>
                    </tbody></table>
            </td>
        </tr>
    </tbody></table>
</div>

</div>

<?php include 'footer.php'; ?>
