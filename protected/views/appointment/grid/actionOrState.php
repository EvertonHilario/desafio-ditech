
<!-- start botão de agendamento -->

<?php if(!in_array(str_pad($hour, 1, 0, STR_PAD_LEFT), $this->checkAvailabilityOnTheDay) && !in_array(str_pad($hour, 1, 0, STR_PAD_LEFT), $this->checkUserAvailabilityInSession)){ ?>

    <button type="button" class="btn btn-primary btn-xs" style="" onclick="renderReservationPage('<?php echo Yii::app()->createUrl("/appointment/renderReservationPage",array('hour'=>$hour)); ?>');return false;">
        Reservar
    </button>

<?php } ?>

<!-- end botão de agendamento -->

<!-- start mensagem de horário já reservado -->

<?php if(in_array(str_pad($hour, 1, 0, STR_PAD_LEFT), $this->checkAvailabilityOnTheDay)){ ?>

    <span class="label label-warning">
        Horário Ocupado
    </span>&nbsp;

<?php } ?>

<!-- end mensagem de horário já reservado -->

<!-- start você já tem compromisso neste horário -->

<?php if(in_array(str_pad($hour, 1, 0, STR_PAD_LEFT), $this->checkUserAvailabilityInSession)){ ?>

    <span class="label label-info">
        Você já tem compromisso neste horário
    </span>

<?php } ?>

<!-- end você já tem compromisso neste horárioo -->