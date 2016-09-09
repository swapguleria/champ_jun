<?php
$meals = Meal::model()->findAll();
$meal_items = MealItem::model()->findAll();
?>

<section class="our-menu your_menu">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="different-menus">
                    <span>Our Menu <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/arrow-icon.png" title="Our Menu" alt="Our Menu" width="12" height="16"></span>
                    <div class="single-meal">

                        <?php
                        foreach ($meals as $key => $meal)
                            {
                            ?><a href="javascript:void(0);" class="meal_menu" data-img="<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $meal['background_image']; ?>" id="<?php echo $meal['id']; ?>"><img src="<?php echo Yii::app()->request->baseUrl, '/wdir/uploads/', $meal['image']; ?>" width="188" height="123">
                                <span><?php echo $meal['title']; ?></span>
                            </a>
                        <?php } ?>                      

                    </div><!--single-meal-->
                </div><!--different-menus-->
            </div><!--col-sm-12-->
        </div><!--row-->
    </div><!--container-->
</section><!--our-menu-->

<section class="complete-menu">
    <div class="flexslider">
        <ul class="slides">
            <?php
            $i = 0;
            $display = 'block';
            foreach ($meals as $key => $meal_detail)
                {
                if ($i != 0)
                    {
                    $display = "none";
                    }
                $meal_items = MealItem::model()->findAllByAttributes(array('meal_id' => $meal_detail['id']));
                ?>
                <div id="<?php echo "relation_" . $meal_detail['id']; ?>"  class="meal_items"  style="display:<?php echo $display; ?>">

                    <div class="menu-content">
                        <h2><?php echo $meal_detail['title']; ?></h2>
                        <h3><span ><?php echo $meal_detail['days']; ?> <?php echo $meal_detail['timings']; ?></span></h3>
                        <ul>
                            <?php
                            foreach ($meal_items as $key => $meal_item_detail)
                                {
                                ?>
                                <li>
                                    <h4><a class="menu_item_selected" id='<?php echo $meal_detail['id']; ?>'  href="javascript:void(0);" data-name="<?php echo $meal_item_detail['title']; ?>" data-sub_title="<?php echo $meal_item_detail['sub_title']; ?>" data-price="<?php echo $meal_item_detail['price']; ?>"><?php echo $meal_item_detail['title']; ?></a></h4>
                                    <h5><span class="item-caption"><?php echo $meal_item_detail['sub_title']; ?></span><span class="item-price"><?php echo $meal_item_detail['price']; ?></span></h5>
                                </li>
                            <?php } ?>

                        </ul>
                    </div><!--menu-content-->

                </div>
                <?php
                $i++;
                }
            ?>

        </ul><!--slides-->
    </div><!--flexslider-->
    <div class="menu-featured-img text-right">
        <img class="side_image" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/breakfast-feature.jpg" title="Breakfast Menu" alt="Breakfast Menu" width="580" height="1209">
        <!--        <div class="search-content">
                    <h4><div class="meal_title"></div><?php // echo $meal_item_first['title'];                                     ?></h4>
                    <h5><div class="title_sub_title"></div><?php // echo $meal_item_first['sub_title'];                                     ?></h5>
                    <span>Amt:- <div class="title_price"></div><?php // echo $meal_item_first['price'];                                     ?></span>
                </div>search-content-->
        <?php
        $j = 0;
        $display = 'block';
        foreach ($meals as $key_des => $val_des)
            {
            if ($j != 0)
                {
                $display = "none";
                }
            $meal_items = MealItem::model()->findByAttributes(array('meal_id' => $val_des['id']));

//            echo "<pre>";
//            print_r($meal_items);
//            die();
            ?> 
            <div class="search-content" id="<?php echo "desc_" . $val_des['id']; ?>" style="display: <?php echo $display; ?>">
                <h4><div class="meal_title" id="<?php echo "meal_title_" . $val_des['id']; ?>" ><?php echo $meal_items['title']; ?></div></h4>
                <h5><div class="title_sub_title" id="<?php echo "title_sub_title_" . $val_des['id']; ?>"><?php echo $meal_items['sub_title']; ?></div></h5>
                <span>Amt:- <div class="title_price" id="<?php echo "title_price_" . $val_des['id']; ?>"><?php echo $meal_items['price']; ?></div></span>
            </div>
            <?php
            $j++;
            }
        ?><!--search-content-->
        <!--search-content-->
    </div><!--menu-featured-img-->
</section><!--complete-menu-->





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