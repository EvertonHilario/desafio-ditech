<form action="<?php echo Yii::app()->createUrl('appointment/search'); ?>" id="search-hour" method="post">
    <div class="row">

		<input type="hidden" name="hour" id="hour">

    	<div class="col-md-3">
			<div class="form-group label-floating">

        	<?php echo CHtml::dropDownList('room_room_id', '', CHtml::listData(Room::model()->findAll(),'room_id','room_name'), array('empty' => 'Selecione a sala','class'=>'form-control')); ?>

			</div>
		</div>

    	<div class="col-md-3">
			<div class="form-group label-floating">

				<?php
					$this->widget(
					    'booster.widgets.TbDatePicker',
					    array(
					        'name' => 'appointment_start',
					        'options' => array(
				                'language'                 => 'pt-BR',
				                'format'                 => 'dd/mm/yyyy',
					        ),
					        'htmlOptions'=> array(
				                'class'=>' form-control',
				                'placeholder'=>'Data da Reserva'
					        ),
					    )
					);
				?>
			</div>
		</div>
    	<div class="col-md-6">
			<button type="submit" id="btn-search" onclick="sendSearch();return false;" class="btn btn-primary btn-round btn-just-icon">
				<i class="material-icons">search</i><div class="ripple-container"></div>
			</button>

		</div>

	</div>

</form>