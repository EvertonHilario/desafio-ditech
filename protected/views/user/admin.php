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
				            'links' => array('Usuários'),
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
                <h4 class="title">Grade de Usuários</h4>
                <p class="category">Nesta grade você pode realizar filtros para busca, ordenar, editar cadastros e excluir usuários.</p>
            </div>
            <div class="card-content table-responsive">

                <a type="submit" href="<?php echo Yii::app()->createUrl("user/create");?>" class="btn btn-primary pull-right"><i class="material-icons" style="font-size: 30px;">add_circle_outline</i></a>

				<?php

					$gridColumns = array(
						'user_id',
						'user_name',
						// 'user_password',
						'user_email',
						// 'permission',
						// array(
						// 	'header' 		=> Yii::t('ses', 'Ações'),
						// 	'class'			=> 'booster.widgets.TbButtonColumn',
						// 	'template'		=> '{update} {delete}',
		
						// ),
					);

				    $this->widget(
				        'booster.widgets.TbGridView',
				        array(
				            'dataProvider' => $model->search(),
				            'template' => "{items}",
				            'columns' => $gridColumns,
				            'filter' =>$model,
				        )
				    );
				?>

            </div>
        </div>
	</div>
</div>