<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'room-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="card">
	    <div class="card-header" data-background-color="purple">
	        <h4 class="title">Formulário - <?php echo $model->isNewRecord ? 'Cadastro de Sala' : 'Sala '.$model->room_number.' - '.$model->room_name; ?></h4>
			<p class="category">Atenção aos campos obrigatórios, estão sinalizados com *</p>
	    </div>
	    <div class="card-content">

	    	<?php echo $form->errorSummary($model); ?>

            <div class="row">

                <div class="col-md-2">
					<div class="form-group label-floating">
						<label class="control-label">Nº</label>
						<?php echo $form->textField($model,'room_number',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
					</div>
                </div>
                <div class="col-md-3">
					<div class="form-group label-floating">
						<label class="control-label">* Nome da sala</label>
						<?php echo $form->textField($model,'room_name',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
					</div>
                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-3">
					
                </div>

            </div>

            <?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar' : 'Salvar',array('class'=>'btn btn-primary pull-right')); ?>

            <div class="clearfix"></div>
	    </div>
	</div>

<?php $this->endWidget(); ?>