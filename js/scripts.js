var map;
  function initMap() {
  		
   	var latLng = {
  		lat: parseFloat(opciones.latitud),//41.221
  		lng: parseFloat(opciones.longitud)//1.711
  	};

    map = new google.maps.Map(document.getElementById('mapa'), {
      center: latLng,
      zoom: parseInt(opciones.zoom)
  	});

  	var marker = new google.maps.Marker ({
  		position: latLng,
  		map: map,
  		title: 'La pizzeria'
  	});
}


$ = jQuery.noConflict();


$(document).ready(function() {

	

	//Ocultar y mostrar menú
	$('.mobile-menu a').on('click', function() {
		$('nav.menu-sitio').toggle('slow');
	});

	// Reacción a dimensionar, resize, la pantalla a >=768px
	var breakpoint = 768;
	$(window).resize(function() {
		if($(document).width()>= breakpoint) 
		{ 
			$('nav.menu-sitio').show();
		} else
			{
				$('nav.menu-sitio').hide();
			}
	});

	// Ajustar cajas según tamaño de la imagen

	//ajustarcajas();

	// ajustar mapa
	var mapa = $('#mapa');
	if(mapa.length > 0) {
		if($(document).width() >= breakpoint) {
			ajustarMapa(0);
		} else {
			ajustarMapa(300);
		}
	}

	$(window).resize(function() {
		if($(document).width() >= breakpoint) {
			ajustarMapa(0);
		} else {
			ajustarMapa(300);
		}
	});

	// Fluidbox

	jQuery('.gallery a').each(function() {
		jQuery(this).attr({'data-fluidbox' : ''});
	});

	if(jQuery('[data-fluidbox]').length > 0) {
		jQuery('[data-fluidbox]').fluidbox();
	}
});

function ajustarMapa(altura) {
	if(altura == 0) {
		var ubicacionSection = $('.ubicacion-reservacion');
		var ubicacionAltura = ubicacionSection.height();
		$('#mapa').css({'height': ubicacionAltura});
	} else {
		$('#mapa').css({'height': altura});
	}
}
