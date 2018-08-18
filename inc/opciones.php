<?php

function lapizzeria_ajustes() {
	add_menu_page( 'La Pizzeria', 'La Pizzeria Ajustes', 'administrator', 'lapizzeria_ajustes', 'lapizzeria_opciones', '', 20);
	add_submenu_page('lapizzeria_ajustes', 'Reservaciones', 'Reservaciones', 'administrator', 'lapizzeria_reservaciones', 'lapizzeria_reservaciones');

	//llamar al registro de las opciones de nbuestro tema
	add_action( 'admin_init', 'lapizzeria_registrar_opciones');
}

add_action('admin_menu', 'lapizzeria_ajustes');

function lapizzeria_registrar_opciones() {
	//Registrar opciones una por cada campo
	register_setting( 'lapizzeria_opciones_grupo', 'lapizzeria_direccion');
	register_setting( 'lapizzeria_opciones_grupo', 'lapizzeria_telefono');

	register_setting( 'lapizzeria_opciones_gmaps', 'lapizzeria_gmaps_latitud');
	register_setting( 'lapizzeria_opciones_gmaps', 'lapizzeria_gmaps_longitud');
	register_setting( 'lapizzeria_opciones_gmaps', 'lapizzeria_gmaps_zoom');
	register_setting( 'lapizzeria_opciones_gmaps', 'lapizzeria_gmaps_apikey');
}

function lapizzeria_opciones() {
	?>
		<div class="wrap">
			<h1>Ajustes La Pizzeria</h1>

			<?php
				if(isset($_GET['tab'])):
					$active_tab = $_GET['tab'];
				else:
					$active_tab = 'tema';
				endif;
			?>

			<h2 class="nav-tab-wrapper">
				<a href="?page=lapizzeria_ajustes&tab=tema" class="nav-tab <?php echo $active_tab == 'tema' ? 'nav-tab-active' : '' ?>">Ajustes</a>
				<a href="?page=lapizzeria_ajustes&tab=gmaps" class="nav-tab <?php echo $active_tab == 'gmaps' ? 'nav-tab-active' : '' ?>">Google Maps</a>
			</h2>

			<form action="options.php" method="post">
				<?php if($active_tab == 'tema'):  ?>
					<?php settings_fields('lapizzeria_opciones_grupo');  ?>
					<?php do_settings_sections('lapizzeria_opciones_grupo'); ?>
				
					<table class="form-table">
						<tr valign="top">
							<th scope="row">Dirección</th>
							<td><input type="text" name="lapizzeria_direccion" value="<?php echo esc_attr(get_option( 'lapizzeria_direccion'));  ?>">	</td>
						</tr>
				
						<tr valign="top">
							<th scope="row">Teléfono</th>
							<td><input type="text" name="lapizzeria_telefono" value="<?php echo esc_attr(get_option( 'lapizzeria_telefono'));  ?>"></td>
						</tr>
					</table>
				<?php else: ?>

					<?php settings_fields('lapizzeria_opciones_gmaps');  ?>
					<?php do_settings_sections('lapizzeria_opciones_gmaps'); ?>
					<h2>Google Maps</h2>
					<table class="form-table">
						<tr valign="top">
							<th scope="row">Latitud</th>
							<td><input type="text" name="lapizzeria_gmaps_latitud" value="<?php echo esc_attr(get_option( 'lapizzeria_gmaps_latitud'));  ?>"></td>
						</tr>
						<tr valign="top">
							<th scope="row">Longitud</th>
							<td><input type="text" name="lapizzeria_gmaps_longitud" value="<?php echo esc_attr(get_option( 'lapizzeria_gmaps_longitud'));  ?>"></td>
						</tr>
						<tr valign="top">
							<th scope="row">Zoom</th>
							<td><input type="number" name="lapizzeria_gmaps_zoom" value="<?php echo esc_attr(get_option( 'lapizzeria_gmaps_zoom'));  ?>"></td>
						</tr>
						<tr valign="top">
							<th scope="row">API Key</th>
							<td><input type="text" name="lapizzeria_gmaps_apikey" value="<?php echo esc_attr(get_option( 'lapizzeria_gmaps_apikey'));  ?>"></td>
						</tr>
					</table>
				<?php endif; ?>

				<?php submit_button(); ?>
			</form>
		</div>
	<?php
}

function lapizzeria_reservaciones() {
	?>
		<div class="wrap">
			<h1>Reservaciones</h1>

			<table class="wp-list-table widefat striped">
				<thead>
					<tr>
						<th class="manage-column">ID</th>
						<th class="manage-column">Nombre</th>
						<th class="manage-column">Fecha de Reserva</th>
						<th class="manage-column">Correo</th>
						<th class="manage-column">Teléfono</th>
						<th class="manage-column">Mensaje</th>
						<th class="manage-column">Eliminar</th>
					</tr>
				</thead>

				<tbody>
					<?php
						global $wpdb;
							$reservaciones = $wpdb->prefix . 'reservaciones';
							//$registros = $wpdb->get_results( "SELECT * FROM $reservaciones", ARRAY_A );
							$registros = $wpdb->get_results("SELECT id, nombre, fecha, correo, telefono, mensaje FROM $reservaciones", ARRAY_A);
							foreach ($registros as $registro) { ?>
								<tr>
									<td><?php echo $registro['id']; ?></td>
									<td><?php echo $registro['nombre']; ?></td>
									<td><?php echo $registro['fecha']; ?></td>
									<td><?php echo $registro['correo']; ?></td>
									<td><?php echo $registro['telefono']; ?></td>
									<td><?php echo $registro['mensaje']; ?></td>
									<td>
										<a class="borrar_registro" href="#" data-reservaciones="<?php echo $registro['id'];  ?>">Eliminar</a>
									</td>
								</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	<?php
}