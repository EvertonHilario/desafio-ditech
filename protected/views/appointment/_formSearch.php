<form action="<?php echo Yii::app()->createUrl('search/search'); ?>" id="search-hour" method="post">
    <div class="row">

    	<div class="col-md-3">
			<div class="form-group label-floating">

        	<?php echo CHtml::dropDownList('room_id', '',array('2'=>'Sala 1','1'=>'Sala 2'), array('class'=>'form-control')); ?>

			</div>
		</div>

    	<div class="col-md-3">
			<div class="form-group label-floating">

				<?php
					$this->widget(
					    'booster.widgets.TbDatePicker',
					    array(
					        'name' => 'room_room_id',
					        'options' => array(
				                'language'                 => 'pt-BR',
				                'format'                 => 'dd/mm/yyyy',
					        ),
					        'htmlOptions'=> array(
				                'class'=>' form-control',
				                'style'=>'margin-left:10px;'
					        ),
					    )
					);
				?>
			</div>
		</div>
    	<div class="col-md-6">

		</div>

	</div>

</form>