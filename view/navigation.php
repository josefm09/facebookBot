<!-- NavBar-->
        <div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
               
                        
                        <div class="collapse navbar-collapse navbar-menubuilder">

						<ul class="nav navbar-nav navbar-left" >
						
							
							<?php
								//Barra de navegacion para prioridades de master, administrador de empresa y sucursal
								if($_SESSION['privilegio_administrativo'] <= 3)
									{
							?>
							<li>
								<a href="#" data-nav_accion="crear_usuario_trabajador"><i class="fa fa-balance-scale fa-4x" aria-hidden="true"></i></a>
							</li>
							<li>
								<a href="#" data-nav_accion="crear_usuario_trabajador"><i class="fa fa-search fa-4x" aria-hidden="true"></i></a>
							</li>
							<li>
								<a href="#" data-nav_accion="crear_usuario_trabajador"><i class="fa fa-area-chart fa-4x" aria-hidden="true"></i></a>
							</li>
							

							<?php
								//Barra de navegacion del usuario master
								if($_SESSION['privilegio_administrativo'] == 1){
							?>

							<li class="dropdown">
								<a href="#" data-nav_accion="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog fa-4x" aria-hidden="true"></i> </a>
								<ul class="dropdown-menu">
									<li><a href="#" data-nav_accion="cambiar_password"> Cambiar Contraseña</a></li>
									<li><a href="#" data-nav_accion="restaurar_password"> Restaurar Contraseña</a></li>
									<li><a href="#" data-nav_accion="editar_variables_configuracion_sistema"> Configuración del Sistema</a></li>
								</ul>
							</li>
							
							<?php
								}
							?>
							<?php
								//Barra de navegacion del usuario master
								if($_SESSION['privilegio_administrativo'] <= 2){
							?>

							<?php
								}
							?>
						</ul>
						<?php
						}
						?>

						<ul class="nav navbar-nav navbar-right">
							<li class="">
								<a href="../logout.php"><i class="fa fa-fw fa-sign-out fa-4x"></i></a>
							</li>
						</ul>

                        </div>
            
        </div>

<!-- Js de la vista -->
<script src="../js/navigation.js"></script>
