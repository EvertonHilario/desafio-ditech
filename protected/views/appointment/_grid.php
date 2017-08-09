<style type="text/css">
	table tbody tr td .btn-xs{
		margin: -10px -10px -10px 0;
	}
</style>
<div class="row">
	<div class="col-sm-6">
		<h4>Turno Manhã</h4>
		<table class="table table-striped table-hover">
		    <thead class="text-primary">
		    	<th>Hora</th>
		    	<th>Ação/Status</th>
		    </thead>
		    <tbody>

		    	<?php for ($hour = Yii::app()->params['reservationPeriod']['start_time_of_shift_one']; $hour <= Yii::app()->params['reservationPeriod']['end_time_of_shift_one']; $hour++) { ?>
			        <tr>
			        	<td><?php echo str_pad($hour, 2, 0, STR_PAD_LEFT); ?>:00</td>
			        	<td>

			        		<?php $this->renderPartial('grid/actionOrState',array('hour' => $hour)); ?>

			        	</td>
			        </tr>
		    	<?php } ?>

		    </tbody>
		</table>
	</div>

	<div class="col-sm-6">
		<table class="table table-striped table-hover">
			<h4>Turno Tarde</h4>
		    <thead class="text-primary">
		    	<th>Hora</th>
		    	<th>Ação/Status</th>
		    </thead>
		    <tbody>

		    	<?php for ($hour = Yii::app()->params['reservationPeriod']['start_time_of_shift_two']; $hour <= Yii::app()->params['reservationPeriod']['end_time_of_shift_two']; $hour++) { ?>
			        <tr>
			        	<td><?php echo str_pad($hour, 2, 0, STR_PAD_LEFT); ?>:00</td>
			        	<td>

			        		<?php $this->renderPartial('grid/actionOrState',array('hour' => $hour)); ?>

			        	</td>
			        </tr>
		    	<?php } ?>

		    </tbody>
		</table>
	</div>


</div>

