<?php $current_user = Yii::app()->user->model;?>
<section class="content-header"> 
		<h1>Create Message</h1>
</section>
<div class="content">
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			
			<div class="box-body ">

				

				<div class="col-md-8">

				<div class="box_inner">

					<h3>
					<?php // echo Yii::t('app','Send A Message')?>
					<?php //echo Yii::app()->user->model->first_name;?>
					</h3>

					<div class="clearfix"></div>
		
					<?php
					$this->renderPartial ( '_form', array (
		'model' => $model,
		'buttons' => 'create' 
		) );
		?>


				</div>
				<!-- box_inner -->
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

</div>
</div>

















