
<div class="clearfix"></div>
<br />
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<ul class="nav nav-pills nav-stacked user_tabs">
			<li ><a
					href="<?php echo Yii::app()->createUrl('message/default/index')?>"><?php echo Yii::t('app','Inbox');?>
				</a></li>
				<li><a
					href="<?php echo Yii::app()->createUrl('message/default/unread')?>"><?php echo Yii::t('app','Unread');?>
				</a></li>
				<li><a
					href="<?php echo Yii::app()->createUrl('message/default/starred')?>"><?php echo Yii::t('app','starred');?>
				</a></li>
				<li  class="active"><a
					href="<?php echo Yii::app()->createUrl('message/default/archieved')?>"><?php echo Yii::t('app','Archieved');?>
				</a></li>
				<li><a
					href="<?php echo Yii::app()->createUrl('message/default/sent')?>"><?php echo Yii::t('app','Sent');?>
				</a></li>
			</ul>
		</div>


		<div class="col-md-9">
			<div class="box">
				<div class="box_inner">

					<h3>
					<?php echo Yii::t('app','All Messages')?>
					</h3>

					<div class="clearfix"></div>
					<br>
					<?php $this->renderPartial('_list', array(
		'dataProvider'=>$dataProvider,
					));
					?>

				</div>
				<!-- box_inner -->
			</div>
			<!-- box -->
		</div>
	</div>
	<!-- ROW -->
</div>





