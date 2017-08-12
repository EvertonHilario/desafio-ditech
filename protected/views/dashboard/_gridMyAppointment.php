<div class="card">
    <div class="card-header" data-background-color="purple">
        <h3 class="title">Minhas Reservas</h3>
        <!-- <p class="category">Nesta grade você pode realizar filtros para busca, ordenar, editar cadastros e excluir usuários.</p> -->
    </div>
    <div class="card-content table-responsive">

		<?php

			$gridColumns = array(

				array(
					'name'=>'appointment_start',
					'header' => 'Data',
					'value'=>'$data->returnsDataFormatBrazil($data->appointment_start)',
				),

				array(
					'name'=>'appointment_start',
					'header' => 'Hora',
					'value'=>'$data->returnsTimeFormatBrazil($data->appointment_start)',
				),

				array(
					'name'=>'room_room_id',
					'value'=>'$data->roomRoom->room_number',
				),

				array(
					'name'=>'room_room_id',
					'value'=>'$data->roomRoom->room_name',
				),
				
				array(
					'name'=>'appointment_activiy_description',
					'value'=>'$data->appointment_activiy_description',
				),

				array(
					'header' 		=> Yii::t('ses', 'Ações'),
					'class'			=> 'booster.widgets.TbButtonColumn',
					'template'		=> '{delete}',
					'buttons'=>array(
		                'delete'=>array(
		                    'label'=>'Excluir',
		                    'url' => 'Yii::app()->createUrl("appointment/delete/$data->appointment_id")',
		                ),
		    		),

				),
			);

		    $this->widget(
		        'booster.widgets.TbGridView',
		        array(
		            'dataProvider' => $model->searchDashboard(),
		            'template' => "{items}",
		            'columns' => $gridColumns,
		            'filter' =>null,
		        )
		    );
		?>

    </div>
</div>
