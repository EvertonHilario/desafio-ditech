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
					        'homeLink' => 'Dashboard',
					        'links' => array('')
					    )
					);
				?>

			</div>

		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">

				<li>
					<a href="<?php echo Yii::app()->createUrl("site/logout");?>">
					   <i class="material-icons">exit_to_app</i>
					   <p class="hidden-lg hidden-md">Sair</p>
					</a>
				</li>

			</ul>
		</div>
	</div>
</nav>

<div class="content">
	<div class="container-fluid">

		<div class="row">

			<div class="col-lg-3 col-md-6 col-sm-6">
				<a href="<?php echo Yii::app()->createUrl("appointment");?>">
					<div class="card card-stats">
						<div class="card-header" data-background-color="orange">
							<i class="material-icons">event</i>
						</div>
						<div class="card-content" style="height: 80px;">
							<h5 class="title">Reservar Sala<h5>
						</div>
		
					</div>
				</a>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<a href="<?php echo Yii::app()->createUrl("room");?>">
					<div class="card card-stats">
						<div class="card-header" data-background-color="blue">
							<i class="material-icons">work</i>
						</div>
						<div class="card-content" style="height: 80px;">
							<h5 class="title">Salas<h5>
						</div>

					</div>
				</a>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<a href="<?php echo Yii::app()->createUrl("user");?>">
					<div class="card card-stats">
						<div class="card-header" data-background-color="purple">
							<i class="material-icons">group_add</i>
						</div>
						<div class="card-content" style="height: 80px;">
							<h5 class="title">Usuários<h5>
						</div>

					</div>
				</a>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<a href="<?php echo Yii::app()->createUrl("user/update",array('id'=>1)); ?>">
					<div class="card card-stats">
						<div class="card-header" data-background-color="green">
							<i class="material-icons">person</i>
						</div>
						<div class="card-content" style="height: 80px;">
							<h5 class="title">Perfil<h5>
						</div>
	
					</div>
				</a>
			</div>

		</div>

		<!-- start grade com as reservas do usuário logado -->
		<?php $this->renderPartial('_gridMyAppointment',array('model'=>$model)); ?>
		<!-- end grade com as reservas do usuário logado -->



	</div>
</div>