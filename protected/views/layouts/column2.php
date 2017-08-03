<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
	
	    <div class="sidebar" data-color="orange" data-image="<?php echo Yii::app()->request->baseUrl; ?>/themes/material-dashboard-html/assets/img/sidebar-1.jpg">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="<?php echo Yii::app()->createUrl("dashboard");?>" class="simple-text">
					<?php echo CHtml::encode(Yii::app()->name); ?>
				</a>
			</div>
	    	<div class="sidebar-wrapper">
	            <ul class="nav">

					<?php if(!Yii::app()->user->isGuest){ ?>

	                <li <?php if(Yii::app()->controller->id == 'dashboard') echo 'class="active"'; ?>>
	                    <a href="<?php echo Yii::app()->createUrl("dashboard");?>">
	                        <i class="material-icons">dashboard</i>
	                        <p>Dashboard</p>
	                    </a>
	                </li>

	                <li <?php if(Yii::app()->controller->id == 'appointment') echo 'class="active"'; ?>>
	                    <a href="<?php echo Yii::app()->createUrl("appointment");?>">
	                        <i class="material-icons">event</i>
	                        <p>Reservar Sala</p>
	                    </a>
	                </li>
	                <li <?php if(Yii::app()->controller->id == 'room') echo 'class="active"'; ?>>
	                    <a href="<?php echo Yii::app()->createUrl("room");?>">
	                        <i class="material-icons">work</i>
	                        <p>Salas</p>
	                    </a>
	                </li>
	                <li <?php if(Yii::app()->controller->id == 'user' && Yii::app()->controller->action->id != 'update') echo 'class="active"'; ?>>
	                    <a href="<?php echo Yii::app()->createUrl("user");?>">
	                        <i class="material-icons">group_add</i>
	                        <p>Usuários</p>
	                    </a>
	                </li>
	                <li <?php if(Yii::app()->controller->id == 'user' && Yii::app()->controller->action->id == 'update') echo 'class="active"'; ?>>
	                    <a href="<?php echo Yii::app()->createUrl("user/update",array('id'=>1)); ?>">
	                        <i class="material-icons">person</i>
	                        <p>Perfil</p>
	                    </a>
	                </li>

	                <?php }else{ ?>

						<blockquote>
						  <footer>Devido ao grande fluxo de funcionários de uma empresa, foi identificado a
						necessidade de um sistema de fila virtual para uso de salas de reuniões.</footer>
						</blockquote>
	                
	                <?php } ?>


	            </ul>
	    	</div>
			
	    </div>

	    <div class="main-panel">

			<?php echo $content; ?>

			<footer class="footer">
				<div class="container-fluid">
					<p class="copyright pull-right">
						&copy; <script>document.write(new Date().getFullYear())</script> by <a href="https://br.linkedin.com/in/everton-hilario">Éverton Hilario</a>
					</p>
				</div>
			</footer>
		</div>

<?php $this->endContent(); ?>