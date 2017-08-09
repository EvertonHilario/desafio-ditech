 <?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'reserve-form',
  'enableAjaxValidation'=>false,
  'action'=>Yii::app()->createUrl("appointment/create"),
  'htmlOptions'=>array('class'=>'well'),
)); ?>

  <div class="card">
    <div class="card-header" data-background-color="green">
        <h4 class="title">Formulário - Reserva de Sala</h4>
    <p class="category">Atenção aos campos obrigatórios, estão sinalizados com *</p>
    </div>
    <div class="card-content">

      <?php echo $form->errorSummary($model); ?>

          <div class="row">
              <div class="col-md-6">
                <div class="form-group label-floating">
                    <?php echo $form->textArea($model,'appointment_activiy_description',array('rows'=>6, 'cols'=>50,'class'=>'form-control','placeholder'=>'* Descrição da atividade')); ?>
                </div>
              </div>
              <div class="col-md-6">
              </div>
          </div>
      <button type="submit" onclick="createReserve();return false;" class="btn btn-primary">
        Reservar
      </button>
          <div class="clearfix"></div>
    </div>
  </div>

  <?php echo $form->hiddenField($model,'appointment_start'); ?>

  <?php echo $form->hiddenField($model,'appointment_end',array('value'=>$model->appointment_start)); ?>

  <?php echo $form->hiddenField($model,'user_user_id',array('value'=>Yii::app()->user->user_id)); ?>

  <?php echo $form->hiddenField($model,'room_room_id'); ?>

<?php $this->endWidget(); ?>