 <?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'user-form',
  'enableAjaxValidation'=>false,
  'htmlOptions'=>array('class'=>'well')
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
                  <label class="control-label">* Descrição da atividade</label>
                    <?php echo $form->textArea($model,'appointment_activiy_description',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
                </div>
              </div>
              <div class="col-md-6">
              </div>
          </div>

          <?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar' : 'Salvar',array('class'=>'btn btn-primary pull-right')); ?>

          <div class="clearfix"></div>
    </div>
  </div>

  <?php echo $form->textField($model,'appointment_start'); ?>

  <?php echo $form->textField($model,'appointment_end'); ?>

  <?php echo $form->textField($model,'user_user_id',array('size'=>11,'maxlength'=>11)); ?>

  <?php echo $form->textField($model,'room_room_id'); ?>

<?php $this->endWidget(); ?>