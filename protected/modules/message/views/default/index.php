
<section class="content-header"> 
	<h1>
Inbox
	<small></small>
	</h1>

	
</section>
<div class="content">

	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				

				<div class="box-body">
					<div class="table-outer">


<?php ?>	<?php $this->renderPartial('_list', array(
		'dataProvider'=>$dataProvider,
					));
					?>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

// $this->breadcrumbs = array(
// 	$model->label(2) => array('index'),
// 	Yii::t('app', 'Manage'),
// );

// ?>
<!-- <div class="page-header"> 
	<h1><?php // echo Yii::t('app', 'Manage') . ' : ' . GxHtml::encode($model->label(2)); ?></h1>
<!-- </div> -->






























