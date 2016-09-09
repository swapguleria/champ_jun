<?php

$this->breadcrumbs = array(
	Page::label(2),
	Yii::t('app', 'Index'),
);
?>


<?php 

/*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));*/

$this->renderPartial('_list', array(
		'dataProvider'=>$dataProvider,
));

