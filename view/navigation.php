<!-- NavBar-->
        <div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
               
                        
                        <div class="collapse navbar-collapse navbar-menubuilder">

						<ul class="nav navbar-nav navbar-left" id="navegacion">
						
							<li><a href="#" data-nav_accion="crear_propuesta"> <i class="fa fa-users" aria-hidden="true"></i> Propuesta</a></li>
							<li><a href="#" data-nav_accion="registar_nuevo_trabajador"> <i class="fa fa-female" aria-hidden="true"></i> Mucaama</a></li>
							<li><a href="#" data-nav_accion="nueva_encuesta"> <i class="fa fa-commenting" aria-hidden="true"></i> Entrevista</a></li>
							
							<?php
								//Barra de navegacion para prioridades de master, administrador de empresa y sucursal
								if($_SESSION['privilegio_administrativo'] <= 3)
									{
							?>
							<!--
							<li>
								<a href="#" data-nav_accion="crear_usuario_trabajador"><span class="glyphicon glyphicon-user"></span> Alta de colaboradores</a>
							</li>
							-->

							<?php
								//Barra de navegacion del usuario master
								if($_SESSION['privilegio_administrativo'] == 1){
							?>

							<li class="dropdown">
								<a href="#" data-nav_accion="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i> Configuración<span class="caret"></span></a>
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
							<li class="active">
								<a href="../logout.php"><span class="fa fa-fw fa-power-off"></span> Cerrar Sesión</a>
							</li>
						</ul>

                        </div>
            
        </div>

<!-- Js de la vista -->
<script src="../js/navigation.js"></script>
