<?php get_header(); ?>
	
	<?php while(have_posts()): the_post(); ?>

		<div class="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
			<div class="contenido-hero">
				<div class="texto-hero">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
		</div>

		<div class="principal contenedor contacto">
			<main class="texto-centrado contenido-paginas">
				<?php get_template_part('templates/formulario', 'reservacion');  ?>
				<!--<?php //require 'templates/formulario-reservacion.php'; ?>-->
				<form class="reserva-contacto" method="post">
					<h2>Realiza una reserva</h2>
					<div class="campo">
						<input type="text" name="nombre" placeholder="Nombre" required>
					</div>
					<div class="campo">
						
						<input type="datetime-local" name="fecha" placeholder="Fecha" step="300" required>
					</div>
					<div class="campo">
						<input type="email" name="correo" placeholder="Correo" required>
					</div>
					<div class="campo">
						<input type="tel" name="telefono" placeholder="Teléfono" required>
					</div>
					<div class="campo">
						<textarea name="mensaje" placeholder="Mensaje" required></textarea>
					</div>

					<input type="submit" name="enviar" value="Enviar" class="button">
					<input type="hidden" name="oculto" value="1">
				</form>

				<form action="valida_foto.php" method="POST" enctype="multipart/form-data">
					<td class="campo">
						<input type="text" name="txtnombre"value>
					</td>
					<td class="campo">
						<input type="file" name="foto" id="foto">
					</td>
					<td class="campo">
						<input type="submit" name="enviar" value="Enviar" class="button">
					</td>
					


				</form>
			</main>
		</div>

	<?php endwhile; ?>


<?php get_footer(); ?>