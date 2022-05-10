<aside class="main-sidebar">

	 <section class="sidebar">

		<ul style="margin-top:10px;" class="sidebar-menu">

		<?php

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo '<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span style="margin-left:8px;">Inicio</span>

				</a>

			</li>';

		}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

			echo '<li>

			<a href="clientes">

				<i class="fa fa-users"></i>
				<span style="margin-left:8px;">Clientes</span>

			</a>

		</li>
		<li>

				<a href="productos">

					<i class="fa fa-product-hunt"></i>
					<span style="margin-left:8px;">Productos</span>

				</a>

			</li>';

		}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo '
			
			<li>

			<a href="crear-venta">
				
				<i class="fa fa-pencil-square-o"></i>
				<span style="margin-left:8px;">Crear venta</span>

			</a>

		</li>
		<li>

			<a href="ventas">
				
				<i class="fa fa-briefcase" aria-hidden="true""></i>
				<span style="margin-left:8px;">Ver ventas</span>

			</a>

		</li>';
		}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){
			
		
		echo '<li>

			<a href="reportes">
				
				<i class="fa fa-download" aria-hidden="true""></i>
				<span style="margin-left:8px;">Exp. ventas</span>

			</a>

		</li>';
		}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){

		echo '<li>

		<a href="salir">
			
			<i class="fa fa-sign-out" aria-hidden="true""></i>
			<span style="margin-left:8px;">Salir</span>
			

		</a>

		</li>';

		}

		

		?>

		</ul>

	 </section>

</aside>