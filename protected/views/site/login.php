<nav class="navbar navbar-transparent navbar-absolute">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div class="navbar-brand">
				
				<?php

				    $this->widget(
				        'booster.widgets.TbBreadcrumbs',
						    array(
					        'homeLink' => 'Acesso ao sistema',
					        'links' => array('')
					    )

				    );
				?>

			</div>

		</div>

	</div>
</nav>

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">

				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'login-form',
					'enableClientValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
					),
				)); ?>

					<div class="card">
					    <div class="card-header" data-background-color="purple">
					        <h4 class="title">Formulário de Acesso</h4>
							<p class="category">preencha seu e-mail e senha para acesar o sistema de reserva de salas.</p>
					    </div>
					    <div class="card-content">

					    	<?php echo $form->errorSummary($model); ?>

				            <div class="row">

				                <div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">Nº</label>
											<?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
									</div>
				                </div>
				                <div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">* Nome da sala</label>

										<?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>

									</div>
				                </div>
				                <div class="col-md-4">

				                </div>
				                <div class="col-md-3">
									
				                </div>

				            </div>
				            <center>
				            	<?php echo CHtml::submitButton('Entrar',array('class'=>'btn btn-primary ')); ?>
				            </center>

				            <div class="clearfix"></div>
					    </div>
					</div>

				<?php $this->endWidget(); ?>

			</div>
		</div>
						
	</div>
</div>