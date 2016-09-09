<?php
/**
 *## TbTotalSumColumn class file
 *
 * @author: antonio ramirez <antonio@clevertech.biz>
 * @copyright Copyright &copy; Clevertech 2012-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */

Yii::import('bootstrap.widgets.TbDataColumn');

/**
 *## TbTotalSumColumn widget class
 *
 * @package booster.widgets.grids.columns
 */
class LabelColumn extends TbDataColumn
{
	public $labelClass = 'label';
	public $label;
	public $labels;
	
	public function init()
	{
		parent::init();
	}

	protected function renderDataCellContent($row, $data)
	{
        
		$labelClass =  'label-'.$this->label ? $this->labelClass .' '.'label-'.$this->labels[$data->state_id] : $this->labelClass.' '.'label-'.'primary';
		
        echo  ' <span class="'.$labelClass .'">';
		parent::renderDataCellContent($row, $data);
		echo '</span>';

	}

}
