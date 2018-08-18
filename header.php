<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
    <title></title>
  </head>

<body <?php body_class() ?>>

	<header class="encabezado-sitio">
		<div class="contenedor">
			<div class="logo">
				<a href="<?php echo esc_url(home_url('/')); ?> ">
					<?php
						if(function_exists('the_custom_logo')) {
							the_custom_logo();
						}
					?>
				</a>
			</div>  <!-- cierre logo -->

			<div class="informacion-encabezado">
				<div class="redes-sociales">
					<?php 
						$args = array(
							'theme_location' => 'social-menu',
							'container' => 'nav',
							'container_class' => 'sociales',
							'container_id' => 'sociales',
							'link_before' => '<span class="sr-text">',
							'link_after' => '</span>'
						);
						wp_nav_menu($args);
					?>
				</div>	<!-- cierre redes sociales -->
				<div class="direccion">
					<p><?php echo esc_html( get_option('lapizzeria_direccion') ); ?></p>
					<p>Teléfono: <?php echo esc_html( get_option('lapizzeria_telefono') ); ?></p>
				</div>
			</div>
		</div>	<!-- cierre contenedor -->
	</header>

	<div class="menu-principal">
		<div class="mobile-menu">
			<a href="#" class="mobile"><i class="fa fa-bars" aria-hidde="true">Menú</i></a>
		</div>
		<div class="contenedor navegacion">
		<?php 
			$args = array(
				'theme_location' => 'header-menu',
				'container'=>'nav',
				'container_class' => 'menu-sitio'
			);

			wp_nav_menu( $args);
		?>
	</div>

	</div>
	
	