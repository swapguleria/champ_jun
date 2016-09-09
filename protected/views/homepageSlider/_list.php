
<?php

$this->widget('booster.widgets.TbGridView', array(
    'id' => 'homepage-slider-grid',
    'type' => 'bordered condensed striped',
    'selectionChanged' => "function(id){window.location='" . Yii::app()->createAbsoluteUrl('homepageSlider/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
    'dataProvider' => $dataProvider,
    'columns' => array(
        'id',
        'title',
        'sub_title',
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => 'CHtml::image($data->getImage(),"", array("height"=>100) )'
        ),
//		'link',
        'link_label',
        /*
          'order',
          array(
          'name' => 'state_id',
          'value'=>'$data->getStatusOptions($data->state_id)',
          'filter'=>HomepageSlider::getStatusOptions(),
          ),
          array(
          'name' => 'type_id',
          'value'=>'$data->getTypeOptions($data->type_id)',
          'filter'=>HomepageSlider::getTypeOptions(),
          ),
          'update_time:datetime',
         */
        array(
            'header' => '<a>Actions</a>',
            'class' => 'booster.widgets.TbButtonColumn',
            'htmlOptions' => array(
                'nowrap' => 'nowrap'
            )
        )
    ),
));
?>