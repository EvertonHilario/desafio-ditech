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
				            'links' => array('Usuários'=>Yii::app()->createUrl("user"),'Perfil de '.$model->user_name),
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

		<?php $this->renderPartial('_form', array('model'=>$model)); ?>

	</div>
</div>