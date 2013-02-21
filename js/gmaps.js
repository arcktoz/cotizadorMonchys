		function geolocalizar()
		{
			navigator.geolocation.getCurrentPosition(
				mostrarMapa,
				errorMapa
		);
		}
 
		function actualizaCoord(marker) {
		    var markerLatLng = marker.getPosition();
		    var destlat = markerLatLng.lat();
			var destlon = markerLatLng.lng();
			document.getElementById('dataDomicilio').value = destlat+','+destlon;
			$("#tipo_domicilio").val('maps');
			$('#dataDomicilio').attr('readonly', true);
			document.getElementById('editarDomicilio').style.display='inline-block';
            //alert('Usted se encuentra en '+'Latitud:'+destlat+','+'Longitud:'+destlon);
		    
		}

		function mostrarMapa(datos)
		{
			var lat = datos.coords.latitude;
			var lon = datos.coords.longitude;
			var destlat = datos.coords.latitude;
			var destlon = datos.coords.longitude;
			var entregar = null;
			$("#mapa_canvas").css("height", "300px");
			$("#mapa_canvas").css("width", "100%");
			var coordenada = new google.maps.LatLng(lat,lon);
			var destino = new google.maps.LatLng(destlat,destlon);
			var opciones = {
				zoom: 16,
				center:coordenada,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			var mapa = new google.maps.Map(document.getElementById("mapa_canvas"),opciones);
			
			
			
			var opcionesTachuela = {
				/*icon: 'img/otros/marker_home.png',
				position: coordenada,*/
				map: mapa,
				title: "¡Te encuentras aqui!"
			};
			
			var opcionesDestino = {
				draggable: true,
				icon: 'img/otros/marker_pin.png',
				position: destino,
				map: mapa,
				title: "¿Aquí Entregaremos su Pastel?"
			};
			var marker = new google.maps.Marker(opcionesDestino);
			var tachuela = new google.maps.Marker(opcionesTachuela);




			 google.maps.event.addListener(marker,'mouseup',function(){
			 	
				
				
			 	actualizaCoord(marker);
			 	
  			});

		}
		function errorMapa(errorsh)
		{
			alert("No pudimos encontrarte");
		}
						