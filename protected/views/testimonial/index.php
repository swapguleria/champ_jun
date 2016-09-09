<?php

$this->breadcrumbs = array(
	Testimonial::label(2),
	Yii::t('app', 'Index'),
);
?>


<div class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <section class="content-header pull-left">

                        <h1><?php echo GxHtml::encode(Testimonial::label(2)); ?></h1>
                    </section> 


                    <?php   $this->widget('booster.widgets.TbMenu', array(
                    'type' => 'navbar',
                    'items'=>$this->actions,
                    'htmlOptions'=>array('class'=> 'pull-right btn-group'),
                    ));
                    ?>
                </div>    <div class="box-body">

                    <div class="table-outer">
                        <?php                         $this->renderPartial('_list', array(
                        'dataProvider'=>$dataProvider,
                        ));

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


