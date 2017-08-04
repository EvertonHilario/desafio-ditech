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
				            'links' => array('Reservas'),
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
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="title">Procure o melhor horário para realizar sua atividade</h4>
                <p class="category">Nesta grade você pode realizar filtros para busca, ordenar, editar cadastros e excluir usuários.</p>
            </div>


            <div class="card-content table-responsive">


				<?php $this->renderPartial('_formSearch', array('model'=>$model)); ?>
				<div id="result-search">

				</div>
				<?php //$this->renderPartial('_grid', array('model'=>$model)); ?>

				<?php //$this->renderPartial('_formReserve', array('model'=>$model)); ?>


            </div>
        </div>
	</div>
</div>

