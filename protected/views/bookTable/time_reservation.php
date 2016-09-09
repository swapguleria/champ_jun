<?php
$home_pages = Homepage::model()->find();
$book_pages = BookPage::model()->find();
$contact_details = ContactDetails::model()->find();
?>
<section id="book-content" class="booking-here book-details">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="reserve-details text-center">
                    <div class="row">
                        <div class="col-sm-3">
                            <aside class="about-restaurant">
                                <a href="#">
                                    <img src="<?php echo Yii::app()->request->baseUrl . '/wdir/uploads/' . $book_pages->img_tr; ?>" title="Restaurant" alt="Restaurant" height="169" width="256"></a>
                                <h3><?= $book_pages->title_tr ?></h3>
                                <p><?= $book_pages->tag_line_tr ?></p>
                                <a href="<?= $book_pages->map_content_tr ?>" target="_blank"> <?= $book_pages->map_title_tr ?></a>
                            </aside><!--about-restaurant-->
                        </div><!--col-sm-3-->
                        <div class="col-sm-9 text-center">
                            <div class="reserve-timings">
                                <h3><?= $book_pages->page_title_tr ?></h3>
                                <p><?= $book_pages->page_tag_line_tr ?></p>
                                <span><a href="javascript:void(0);"><?= $book_pages->desc_tr ?></a></span>
                                <div class="reserve-time">
                                    <?php
                                    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
                                        'id' => 'book-table-form',
                                        'type' => 'horizontal',
                                        'enableAjaxValidation' => true,
                                        'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                    ));
                                    ?>   <ul class="list-inline"><?php
                                    for ($i = -75; $i < 105; $i+=15)
                                        {
                                        if ($i > 0)
                                            {
                                            $time = strtotime("+" . $i . " minutes", strtotime($model['time']));
                                            }
                                        else
                                            {
                                            $time = strtotime($model['time']);
                                            $time = $time - ($i * 60 * -1);
                                            }
                                        ?>
                                            <li><a href="<?php echo Yii::app()->createUrl("bookedTable/create/" . $model['id'] . "?time=" . date('h:i', $time)); ?>" data-toggle="tooltip" data-placement="top">
<!--                                                   title="Lorem Ipsum is simply dummy text of the printing and typesetting industry"-->
                                                   <?php echo date('h:i', $time); ?></a> 
                                                <!--<span class="glyphicon glyphicon-star" aria-hidden="true"></span>-->
                                            </li>
                                            <?php } ?>

                                    </ul>

                                    <?php $this->endWidget(); ?>
                                </div><!--reserve-time-->
                            </div><!--reserve-timings-->
                        </div><!--col-sm-9-->
                    </div><!--row-->
                </div><!--reserve-details-->
            </div><!--col-sm-12-->
        </div><!--row-->
    </div><!--container-->
</section>
