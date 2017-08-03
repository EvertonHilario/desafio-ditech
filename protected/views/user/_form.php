<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="card">
	    <div class="card-header" data-background-color="purple">
	        <h4 class="title">Formulário - <?php echo $model->isNewRecord ? 'Cadastro de Usuário' : 'Perfil de '.$model->user_name; ?></h4>
			<p class="category">Atenção aos campos obrigatórios, estão sinalizados com *</p>
	    </div>
	    <div class="card-content">

	    	<?php echo $form->errorSummary($model); ?>

            <div class="row">

                <div class="col-md-3">
					<div class="form-group label-floating">
						<label class="control-label">* Nome</label>
						<?php echo $form->textField($model,'user_name',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
					</div>
                </div>
                <div class="col-md-3">
					<div class="form-group label-floating">
						<label class="control-label">* E-mail</label>
						<?php echo $form->textField($model,'user_email',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
					</div>
                </div>
                <div class="col-md-3">
					<div class="form-group label-floating">
						<label class="control-label">* Senha</label>
						<?php echo $form->passwordField($model,'user_password',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
					</div>
                </div>
                <div class="col-md-3">
                	<?php echo $form->dropDownList($model,'permission', array('2'=>'Usuário','1'=>'Administrador'), array('class'=>'form-control')); ?>
                </div>

            </div>

            <?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar' : 'Salvar',array('class'=>'btn btn-primary pull-right')); ?>

            <div class="clearfix"></div>
	    </div>
	</div>

<?php $this->endWidget(); ?>

