$ = jQuery.noConflict();

$(document).ready(function() {
	// Obteer laURL de admin-ajax.php
	//console.log(url_eliminar);

	$('.borrar_registro').on('click', function(e) {
		e.preventDefault();
		var id = $(this).attr('data-reservaciones');
			swal({
				title: '¿Estas seguro?',
				text: "¡ Esta acción no se puede revertir !",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Si, eliminar',
				cancelButtonText: 'Cancelar'
			}).then((result) => {
    			if (result.value) {
    				$.ajax({
						type: 'post',
						data: {
							'action': 'lapizzeria_eliminar',
							'id': id,
							'tipo': 'eliminar'
						},
						url: url_eliminar.ajaxurl,
						success: function(data) {
							var resultado = JSON.parse(data);
							//console.log(resultado);
							if(resultado.respuesta == 1) {
								jQuery("[data-reservaciones='"+ resultado.id +"']").parent().parent().remove();
								//alert("Se ha eliminado la reservación exitosamente");
								swal(
									'!! Eliminado ¡¡',
									'La reserva se ha eliminado correctamente',
									'success'
								)
							}
						}
					});
				}
		});
	});									
});