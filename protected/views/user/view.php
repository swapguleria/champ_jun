<section class="content-header">
	<h1>
<?php
if ($model->first_name) {
	echo $model->first_name;
} else
	echo 'User Details';
?>
</h1>

	
</section>

<div class="content">
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				


				
<?php   $this->widget('booster.widgets.TbMenu', array(
    'type' => 'navbar',
	'items'=>$this->actions,
	'htmlOptions'=>array('class'=> 'pull-right btn-group'),
	));
?>
				
			</div>
			<div class="box-body user-view">

				

				<div class="col-md-6">
				<?php
					$this->widget('booster.widgets.TbDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
'first_name',
'email',
'phone_no',
//'address:html',
//'city',
//'country',
//'timezone',
'date_of_birth',
'nationality',
			'city',
// 'about_me:html',
//'image_file',
// array(
// 				'name' => 'state_id',
// 				'type' => 'raw',
// 				'value'=>$model->getStatusOptions($model->state_id),
// 				),

// 'create_time',
	),
)); 
					?>
				</div>

				<div class="clearfix"></div>
				<br>


			</div>


<?php
$this->StartPanel ();
?>
<?php //  	$this->AddPanel($model->getRelationLabel('userPlans'), $model->getRelatedDataProvider('userPlans'),	'userPlans','userPlan');?>
<?php  //$this->AddPanel($model->getRelationLabel('jobEmployers'), $model->getRelatedDataProvider('jobEmployers'),	'jobEmployers','jobEmployer');?>
<?php  $this->EndPanel(); ?>

<?php
/*
 * $this->widget('CommentPortlet', array(
 * 'model' => $model,
 * ));
 */
?>
</div>
	</div>
</div>


</div>









