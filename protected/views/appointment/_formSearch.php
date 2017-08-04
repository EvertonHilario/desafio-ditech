<form action="<?php echo Yii::app()->createUrl('appointment/search'); ?>" id="search-hour" method="post">
    <div class="row">

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
				                'style'=>'margin-left:10px;'
					        ),
					    )
					);
				?>
			</div>
		</div>
    	<div class="col-md-6">
			<button type="submit" id="btn-search" class="btn btn-primary btn-round btn-just-icon">
				<i class="material-icons">search</i><div class="ripple-container"></div>
			</button>
		</div>

	</div>

</form>
<script type="text/javascript">
	

    //submit no formulario de busca
    $('#btn-search').click(function ()
    {
        sendSearch();
        return false;

    });


    //realiza o submit e retorna o elemento antes configurado
    function sendSearch()
    {

        // ajax
        $.ajax({
            type    : 'POST',
            dataType: "json",
            url     : $('#search-hour').attr('action'),
            data    : $("#search-hour").serialize(),
            beforeSend  : function(e) {

            },

            success : function(data){

                //adiciona o resultado da busca no box de resultado
                $("#result-search").html(data['html']);

            },
         
            error : function(data){


            },


        });

        return false;

    }

</script>
