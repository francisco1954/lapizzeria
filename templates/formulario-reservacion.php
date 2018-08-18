<form class="reserva-contacto" method="post">
	<h2>Realiza una reserva</h2>
		<div class="campo">
			<input type="text" name="nombre" placeholder="Nombre" required>
		</div>
		<div class="campo">
		<!--<input type="datetime-local" name="fecha" placeholder="dd/mm/aaaa --:--" step="300" required>-->
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

		<div class="g-recaptcha" data-sitekey="6LeI02kUAAAAADq9B2e6D2Fzd1p2V_f_TgRdvVcn"></div>
		<!--<input type="submit" name="enviar" class="button">-->
		<input type="submit" name="enviar" value="Enviar" class="button">
		<input type="hidden" name="oculto" value="1">
</form>