<div class="login-page">
	<div class="container">
		<div class="col-md-12">
		<?php include_once dirname(__FILE__).'/requirement_functions.php';?>
			<h2>Requirement Check</h2>
			<table class="result table table-striped">
				<tr>
					<th>Name</th>
					<th>Result</th>
					<!-- <th>Required By</th>
					<th>Memo</th>-->
				</tr>
				<?php foreach($requirements as $requirement): ?>
				<tr>
					<td><?php echo $requirement[0]; ?></td>
					<td
						class="<?php echo $requirement[2] ? 'passed' : ($requirement[1] ? 'failed' : 'warning'); ?>">
						<?php echo $error[] = $requirement[2] ? 'Passed' : ($requirement[1] ? 'Failed' : 'Warning'); ?>
					</td>
					<td><?php //echo $requirement[3]; ?></td>
					<td><?php //echo $requirement[4]; ?></td>
				</tr>
				<?php endforeach; ?>
			</table>

			<br />
			
			<?php if(in_array('Failed', $error)){
				?>
				<div class="alert alert-danger"><i class="fa fa-check"></i>You can't continue the intaller. &nbsp; 
				<p class="pull-right">
					<a class="btn btn-warning btn-sm" href="<?php echo $this->createUrl('/install/default/index');?>">Reload</a>			
				</p>
				</div>
				<?php 
			}else{
				//echo '<p class="alert alert-success">Status is Passed. &nbsp;<p>';
				//echo CHtml::link('Continue',$this->createUrl('/install/default/step2'), array('class' => 'btn btn-primary btn-sm '));
				?>
				<div class="alert alert-success"><i class="fa fa-check"></i> Status is Passed. &nbsp; 
				<p class="pull-right">
					<a class="btn btn-primary btn-sm " href="<?php echo $this->createUrl('/install/default/step2');?>">Continue</a>			
					<a class="btn btn-warning btn-sm" href="<?php echo $this->createUrl('/install/default/index');?>">Reload</a>			
				</p>
				</div>
				<?php 
			}?>
			<?php //echo CHtml::link('Reload',$this->createUrl('/install/default/index'), array('class' => 'btn btn-warning btn-sm'));?>
			
			
			<br /> 
			<br />
		</div>
	</div>
</div>

