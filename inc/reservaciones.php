<?php

function lapizzeria_eliminar() {
	if(isset($_POST['tipo'])) {  //Comprobamos que el dato 'tipo' existe.
		if($_POST['tipo'] == 'eliminar') {
			global $wpdb;
			$tabla = $wpdb->prefix . 'reservaciones';

			$id_registro = $_POST['id'];

			$resultado = $wpdb->delete($tabla, array('id' => $id_registro), array('%d'));
			
			if($resultado == 1) {
				$respuesta = array(
					'respuesta' => 1,
					'id' => $id_registro
				);
			} else {
				$respuesta = array(
					'respuesta' => 'error'
				);
			}
		}
	}

	die(json_encode($respuesta));//json_encode($_POST)
}
add_action('wp_ajax_lapizzeria_eliminar', 'lapizzeria_eliminar');

function lapizzeria_guardar() {
	//if(isset($_POST['enviar']) && $_POST['oculto'] == "1"):
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$captcha =$_POST['g-recaptcha-response'];

			//Campos que deben de enviarse
			$campos = array (
				'secret' => '6LeI02kUAAAAAAkQ9rXqUd3hiUyOfW6KJ6E6z17O',
				'response' => $captcha,
				'remoteip' => $_SERVER['REMOTE_ADDR']

			);

			// Iniciar sesión en CURL (también se puede usar file_get_content)
			// Curl es utilizado para acceder en servidores remotos
			$ch = curl_init('https://www.google.com/recaptcha/api/siteverify');

			// Configurar opciones de CURL
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_TIMEOUT, 15);

			// Genera una cadena codificada para la url
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($campos));

			// Obtener una respuesta
			$respuesta = json_decode(curl_exec($ch));
			if($respuesta->success) {
				global $wpdb;
	
				if(isset($_POST['enviar']) && $_POST['oculto'] == "1"):
					$nombre = sanitize_text_field($_POST['nombre']);
					$fecha = sanitize_text_field($_POST['fecha']);
					$correo = sanitize_text_field($_POST['correo']);
					$telefono = sanitize_text_field($_POST['telefono']);
					$mensaje = sanitize_text_field($_POST['mensaje']);

					$tabla = $wpdb->prefix . "reservaciones";
					$datos = array (
						'nombre' => $nombre,
						'fecha' => $fecha,
						'correo' => $correo,
						'telefono' => $telefono,
						'mensaje' => $mensaje
					);

					$formato = array(
						'%s',
						'%s',
						'%s',
						'%s',
						'%s'
					);

					$wpdb->insert($tabla, $datos, $formato);

					$url = get_page_by_title('Gracias por su reserva');
					wp_redirect( get_permalink($url->ID) );
					exit();
				endif;
			}
	}
	//endif;
}


add_action('init', 'lapizzeria_guardar');

