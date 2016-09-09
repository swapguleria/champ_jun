
<section class="content-header">
	<h1>
<?php echo Yii::t('app', 'Manage') . ' : ' . GxHtml::encode($model->label(2)); ?>
	
	</h1>


</section>

<div class="content">

	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				
			
					
					<?php
					
					$this->widget ( 'booster.widgets.TbMenu', array (
							'type' => 'navbar',
							'items' => $this->actions,
							'htmlOptions' => array (
									'class' => 'pull-right btn-group' 
							) 
					) );
					?>
				
<div class="box-body">

					<div class="table-outer">
		<?php
		
		$this->widget ( 'booster.widgets.TbGridView', array (
				'id' => 'user-grid',
				'type' => 'striped bordered condensed',
				'dataProvider' => $model->search (),
				'selectionChanged'=>"function(id){window.location='" . Yii::app()->createAbsoluteUrl('user/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
				'filter' => $model,
				'emptyText' => 'No Result Found',
				'columns' => array (
						'id',
						
						// array (
						// 'header' => '<a>User Image</a>',
						// // 'name' => 'image_file',
						// 'type' => 'raw',
						// 'value' => 'CHtml::image($data->getImage(),"", array("height"=>100) )'
						// ),
						'first_name',
						// 'last_name',
						
						'email',
						'phone_no',
						// 'address:html',
						// 'about_me',
						// 'country',
						/*
						 *
						 * 'zipcode',
						 * array(
						 * 'name' => 'currency_type',
						 * 'value'=>'$data->getTypeOptions($data->currency_type)',
						 * 'filter'=>User::getTypeOptions(),
						 * ),
						 * 'timezone',
						 * 'date_of_birth',
						 * 'about_me:html',
						 * 'lat',
						 * 'long',
						 * 'tos',
						 * 'role_id',
						 * array(
						 * 'name' => 'state_id',
						 * 'value'=>'$data->getStatusOptions($data->state_id)',
						 * 'filter'=>User::getStatusOptions(),
						 * ),
						 * 'last_visit_time',
						 * 'last_action_time',
						 * 'last_password_change',
						 * 'login_error_count',
						 */
						array (
								'header' => '<a>Actions</a>',
								'class' => 'booster.widgets.TbButtonColumn',
								'htmlOptions' => array (
										'nowrap' => 'nowrap' 
								) 
						) 
				) 
		) );
		?>
				
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
