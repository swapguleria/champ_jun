
<?php

$this->widget('booster.widgets.TbGridView', array(
    'id' => 'contact-details-grid',
    'type' => 'bordered condensed striped',
    'selectionChanged' => "function(id){window.location='" . Yii::app()->createAbsoluteUrl('contactDetails/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
    'dataProvider' => $dataProvider,
    'columns' => array(
//        'id',
        'working_days',
        'working_hours',
        'email',
        'phone_no',
        'address',
        'city',
        'facebook',
        'twitter',
        'google_plus',
        /*
          'instagram',
          'youtube',



          'country',
          'zip_code',
          array(
          'name' => 'type_id',
          'value'=>'$data->getTypeOptions($data->type_id)',
          'filter'=>ContactDetails::getTypeOptions(),
          ),
          array(
          'name' => 'state_id',
          'value'=>'$data->getStatusOptions($data->state_id)',
          'filter'=>ContactDetails::getStatusOptions(),
          ),
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