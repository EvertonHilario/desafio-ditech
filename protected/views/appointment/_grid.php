<style type="text/css">
	table tbody tr td .btn-xs{
		margin: -10px -10px -10px 0;
	}
</style>
<?php
var_dump($model);

?>
<div class="row">
	<div class="col-sm-6">
		<h4>Turno Manhã</h4>
		<table class="table table-striped table-hover">
		    <thead class="text-primary">
		    	<th>Hora</th>
		    	<th>Ação/Status</th>
		    </thead>
		    <tbody>

		    	<?php for ($i = $reservationPeriod['startTime']; $i <= 12; $i++) { ?>
			        <tr>
			        	<td><?php echo $i; ?>:00</td>
			        	<td><button type="button" class="btn btn-primary btn-xs" style="">Reservar</button></td>
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

		    	<?php for ($i = 13; $i <= $reservationPeriod['endTime']; $i++) { ?>
			        <tr>
			        	<td><?php echo $i; ?>:00</td>
			        	<td><button type="button" class="btn btn-primary btn-xs" style="">Reservar</button></td>
			        </tr>
		    	<?php } ?>

		    </tbody>
		</table>
	</div>


</div>

