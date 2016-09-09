
<style>
    .info-box-icon.bg-airport {
        background-color: #fede00;
    }
</style>





<section class="content">

    <div class="row">


        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-airport"><i class="fa fa-newspaper-o"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text"></span>Todays Bookings <span
                        class="info-box-number"><?php echo $todays_booking; ?> </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->


        </div>


        <!-- /.col -->
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-user"></i> </span>
                <div class="info-box-content">
                    <span class="info-box-text"></span>Upcoming Bookings    <span
                        class="info-box-number"><?php echo $upcoming_booking; ?> </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->


        </div>

        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-user"></i> </span>
                <div class="info-box-content">
                    <span class="info-box-text"></span>Canceled Bookings <span
                        class="info-box-number"><?php echo $canceled_booking; ?> </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->


        </div>



        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-money"></i> </span>
                <div class="info-box-content">
                    <span class="info-box-text"></span>Total Menu Items<span
                        class="info-box-number"><?php echo $total_menu_items; ?> </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->


        </div>




        <div class="col-md-12">
            <!-- TABLE: LATEST ORDERS -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Dashboard </h3>

                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <h3 class="box-title">Todays Booking</h3>

                    <div class="table-outer">

                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'id' => 'booked-table-grid',
                            'type' => 'striped bordered condensed',
                            'dataProvider' => $model->searchToday(),
                            'filter' => $model,
                            'columns' => array(
                                'id',
                                'first_name',
                                'last_name',
                                'date:date',
                                'time:time',
                                'party_size',
                                /*
                                  'email',
                                  'phone_no',
                                  'special_request:html',
                                  'email_subscription',
                                  array(
                                  'name' => 'state_id',
                                  'value'=>'$data->getStatusOptions($data->state_id)',
                                  'filter'=>BookedTable::getStatusOptions(),
                                  ),
                                  array(
                                  'name' => 'type_id',
                                  'value'=>'$data->getTypeOptions($data->type_id)',
                                  'filter'=>BookedTable::getTypeOptions(),
                                  ),
                                  'update_time:datetime',
                                 */
                                array(
                                    'header' => '<a>Actions</a>',
                                    'class' => 'CButtonColumn',
                                    // 'template' => '{view}{update}',
                                    'template' => '{view}  ',
                                    'buttons' => array(
//                                        'update' => array(
//                                            'url' => 'Yii::app()->controller->createUrl("banner/update",array( "id"=>$data->id))'
//                                        ),
                                        'view' => array(
                                            'url' => 'Yii::app()->controller->createUrl("bookedTable/view", array( "id"=>$data->id))'
                                        ),
//                                        'delete' => array(
//                                            'url' => 'Yii::app()->controller->createUrl("enquiry/delete",array( "id"=>$data->id))'
//                                        ),
                                    ),
                                ),
                            ),
                        ));
                        ?>
                    </div>
                </div>

                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4">
            <!-- PRODUCT LIST -->
            <!-- /.box -->
        </div>
        <!-- /.col -->

</section>
