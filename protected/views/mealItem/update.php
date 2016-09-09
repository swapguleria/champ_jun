<div class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <section class="content-header pull-left">

                        <h1><?php echo Yii::t('app', 'Update') . ' ' . GxHtml::encode($model->label()) . ' : ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>
                    </section> 
                    <?php   $this->widget('booster.widgets.TbMenu', array(
                    'type' => 'navbar',
                    'items'=>$this->actions,
                    'htmlOptions'=>array('class'=> 'pull-right btn-group'),
                    ));
                    ?></div>
                <div class="box-body">

                    <div class="table-outer">
                        <?php
                        $this->renderPartial('_form', array(
                        'model' => $model));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





