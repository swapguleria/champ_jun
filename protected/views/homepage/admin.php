<?php
$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    Yii::t('app', 'Manage'),
);
?>
<div class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <section class="content-header pull-left">
                        <h1><?php echo Yii::t('app', 'Manage') . ' : ' . GxHtml::encode($model->label(2)); ?></h1>
                    </section> 


                    <?php
                    $this->widget('booster.widgets.TbMenu', array(
                        'type' => 'navbar',
                        'items' => $this->actions,
                        'htmlOptions' => array('class' => 'pull-right btn-group'),
                    ));
                    ?>
                </div>    <div class="box-body">

                    <div class="table-outer">

                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'id' => 'homepage-grid',
                            'type' => 'striped bordered condensed',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                'id',
                                'tab_1_title',
                                array('header' => '<a>Tab 1 Image</a>',
                                    // 'name' => 'image_file',
                                    'type' => 'raw',
                                    'value' => 'CHtml::image($data->gettab1(),"", array("height"=>100) )'
                                ),
                                'tab_1_image',
                                'tab_2_title',
//                                array('header' => '<a>User Image</a>',
//                                    // 'name' => 'image_file',
//                                    'type' => 'raw',
//                                    'value' => 'CHtml::image($data->gettab2(),"", array("height"=>100) )'
//                                ),
                                'tab_3_title_1',
                                'tab_3_title_2',
//                                array('header' => '<a>User Image</a>',
//                                    // 'name' => 'image_file',
//                                    'type' => 'raw',
//                                    'value' => 'CHtml::image($data->gettab3(),"", array("height"=>100) )'
//                                ),
//		'tab_1_sub_title',
//		'tab_1_description:html',
//		'tab_1_image',
//		'box_1_title',
                                /*
                                  'box_1_description:html',
                                  'box_1_button_text',
                                  'box_1_link',
                                  'box_1_background',
                                  'box_2_title',
                                  'box_2_description:html',
                                  'box_2_button_text',
                                  'box_2_link',
                                  'box_2_background',
                                  'tab_2_title',
                                  'tab_2_text',
                                  'tab_2_link',
                                  'tab_2_button_text',
                                  'tab_2_background',
                                  'tab_3_title_1',
                                  'tab_3_sub_title_1',
                                  'tab_3_description:html',
                                  'tab_3_title_2',
                                  'tab_3_sub_title_2',
                                  'tab_2_background',
                                  array(
                                  'name' => 'state_id',
                                  'value'=>'$data->getStatusOptions($data->state_id)',
                                  'filter'=>Homepage::getStatusOptions(),
                                  ),
                                  array(
                                  'name' => 'type_id',
                                  'value'=>'$data->getTypeOptions($data->type_id)',
                                  'filter'=>Homepage::getTypeOptions(),
                                  ),
                                  'update_time:datetime',
                                 */
                                array(
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                ),
                            ),
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
