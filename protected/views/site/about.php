<?php
$kl = 0;
$about_us = About::model()->find();
$team_details = OurTeam::model()->findAll();
$testimonials = Testimonial::model()->findAll();
?>
<section class="about-site" style="background:url('<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $about_us['tab_2_image']; ?>') no-repeat right #f5f3f4;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="inner-heading">
                    <h1><?php echo $about_us['tab_2_title']; ?></h1>
                    <p><?php echo $about_us['tab_2_sub_title']; ?></p>
                </div><!--inner-heading-->
                <div class="about-content">
                    <p><?php echo $about_us['tab_2_description']; ?></p>
                </div><!--about-content-->
            </div><!--col-sm-12-->
        </div><!--row-->
    </div><!--container-->
</section><!--about-site-->

<section class="about-features">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 feature-section">
                <div class="icon-thumb">	
                    <img src="<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $about_us['box_1_image_logo']; ?>" title="Open" alt="Open Everyday" width="38" height="35">
                </div><!--icon-thumb-->
                <h3><?php echo $about_us['box_1_title']; ?></h3>
                <p><?php echo $about_us['box_1_description']; ?></p>
            </div><!--col-sm-4-->
            <div class="col-sm-4 feature-section">
                <div class="icon-thumb">
                    <img src="<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $about_us['box_2_image_logo']; ?>" title="Special Dishes" alt="Special Dishes" width="30" height="26">
                </div><!--icon-thumb-->    
                <h3><?php echo $about_us['box_2_title']; ?></h3>
                <p><?php echo $about_us['box_2_description']; ?></p>
            </div><!--col-sm-4-->
            <div class="col-sm-4 feature-section">
                <div class="icon-thumb">
                    <img src="<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $about_us['box_3_image_logo']; ?>" title="Expert Chef" alt="Expert Chef" width="21" height="43">
                </div><!--icon-thumb-->
                <h3><?php echo $about_us['box_3_title']; ?></h3>
                <p><?php echo $about_us['box_3_description']; ?></p>
            </div><!--col-sm-4-->
        </div><!--row-->
    </div><!--container-->
</section><!--about-features-->

<section class="testimonials" style="background:url('<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $testimonials['0']['image']; ?>') no-repeat">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="flexslider">
                    <ul class="slides">
                        <?php
                        foreach ($testimonials as $k => $v)
                            {
                            ?><li>
                                <div class="inner-heading">
                                    <h1><?php echo $v['title']; ?></h1>
                                    <p><?php echo $v['sub_title']; ?></p>
                                </div><!--inner-heading-->
                                <div class="testimonial-content">
                                    <span class="quotes">
                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/quote-icon.png" alt="Quote" width="59" height="49">
                                    </span><!--quotes-->
                                    <p><?php echo $v['description']; ?></p>
                                </div><!--testimonial-content-->
                                <div class="client-name">
                                    <span><?php echo $v['created_by']; ?></span>
                                </div><!--client-name-->
                            <?php } ?>
                        </li>

                    </ul>
                </div><!--flexslider-->
            </div><!--col-sm-12-->
        </div><!--row-->
    </div><!--container-->
</section><!--testimonials-->

<section class="our-team">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="inner-heading">
                    <h1><?php echo $about_us['tab_4_title']; ?></h1>
                    <p><?php echo $about_us['tab_4_sub_title']; ?></p>
                </div><!--inner-heading-->
            </div><!--col-sm-12-->
        </div><!--row-->
        <div class="team-section">
            <div class="row">
                <div class="flexslider">
                    <ul class="slides">
                        <li> <?php
                            foreach ($team_details as $key => $val)
                                {
                                if ($kl % 3 == 0 && $kl != 0)
                                    {
                                    ?>
                                </li><li>
                                <?php }
                                ?>  
                                <div class="col-sm-4">
                                    <div class="team-block">
                                        <div class="team-img">
                                            <a href="#" title="<?php echo ucwords($val['name']); ?>"><img src="<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $val['image']; ?>" title="<?php echo ucwords($val['name']); ?>" alt="<?php echo ucwords($val['name']); ?>" width="302" height="304"></a>
                                        </div><!--team-img-->
                                        <div class="team-content">
                                            <h4><?php echo ucwords($val['name']); ?></h4>
                                            <h5><?php echo ucwords($val['designation']); ?></h5>
                                            <div class="follow-member">
                                                <a href="<?php echo '//' . $val['facebook']; ?>"  target="_blank" ><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/fb-icon.png" title="Facebook" alt="Facebook" width="5" height="11"></a>
                                                <a href="<?php echo '//' . $val['twitter']; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/twitter-icon.png" title="Twitter" alt="Twitter" width="13" height="10"></a>
                                                <a href="<?php echo '//' . $val['linkedin']; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/linkedin.png" title="Linkedin" alt="Linkedin" width="10" height="10"></a>
                                                <a href="<?php echo '//' . $val['google_plus']; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/google-plus.png" title="Google Plus" alt="Google Plus" width="14" height="12"></a>
                                            </div><!--follow-member-->
                                            <p><?php echo $val['description']; ?></p>
                                        </div><!--team-content-->
                                    </div><!--team-block-->
                                </div><!--col-sm-4-->



                                <?php
                                $kl++;
                                }
                            ?>    </li>
                    </ul>
                </div><!--flexslider-->	                
            </div><!--row-->
        </div><!--team-section-->
    </div><!--container-->
</section><!--our-team-->