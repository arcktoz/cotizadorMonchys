			function actuar(peso, anchura, altura)	{
				this.peso.value = peso;
				this.ancho.value = anchura;
				this.alto.value = altura;
			}

			function ini()	{
				document.forms.formu.actualizar = actuar;
				window.frames.ver.location.href = "previsor.php";
				document.forms.formu.actualizar(0, 0, 0);
			}

			function validar(f)	{
				enviar = /\.(gif|jpg|png|ico|bmp)$/i.test(f.fotografia.value);
				if (!enviar)	alert("seleccione imagen");
				return enviar;
			}

			function limpiar()	{
				document.forms.formu.actualizar(0, 0, 0);
				f = document.getElementById("fotografia");
				nuevoFile = document.createElement("input");
				nuevoFile.id = f.id;
				nuevoFile.type = "file";
				nuevoFile.name = "fotografia";
				nuevoFile.value = "";
				nuevoFile.onchange = f.onchange;
				nodoPadre = f.parentNode;
				nodoSiguiente = f.nextSibling;
				nodoPadre.removeChild(f);
				(nodoSiguiente == null) ? nodoPadre.appendChild(nuevoFile):
					nodoPadre.insertBefore(nuevoFile, nodoSiguiente);
			}

			function checkear(f)	{
				function no_prever() {
					alert("El archivo seleccionado no es válido...");
					limpiar();
				}
				function prever() {
					var campos = new Array("maxpeso", "maxalto", "maxancho");
					for (i = 0, total = campos.length; i < total; i ++)
						f.form[campos[i]].disabled = false;
					actionActual = f.form.action;
					targetActual = f.form.target;
					f.form.action = "previsor.php";
					f.form.target = "ver";
					f.form.submit();
					for (i = 0, total = campos.length; i < total; i ++)
						f.form[campos[i]].disabled = true;
					f.form.action = actionActual;
					f.form.target = targetActual;
				}

				(/\.(gif|jpg|png|ico|bmp)$/i.test(f.value)) ? prever() : no_prever();
			}

			function datosImagen(peso, ancho, alto, error)	{
				function mostrar_error()	{
					enviar = false;					
					mensaje = "Ha habido un error al cargar la imagen:";
					if (error % 2 == 1) // tipo incorrecto
						mensaje += "\nEl tipo de archivo no es válido";
					error = parseInt(error / 2);
					if (error % 2 == 1) // excede en peso
						mensaje += "\nLa imagen exede el peso permitido 1MB";
					alert (mensaje);
					limpiar();
				}
				if (error == 0)
					document.forms.formu.actualizar(peso, ancho, alto);
				else
					mostrar_error();
			}
		
//Funciones para LightBox de las FIGURAS
function showLightbox() {
	document.getElementById('over').style.display='block';
	document.getElementById('fade').style.display='block';
}
		
function hideLightbox() {
	document.getElementById('over').style.display='none';
	document.getElementById('fade').style.display='none';
}		

//Reset de estilos en imagenes de Lightbox de las Figuras		
function limpiaFigura(total){
	for(var i= 1; i<= total;i++ ){
		$('#figura'+i).css({ 'border': 'dashed 3px #000'});	
	}
}

//Funciones para LightBox de las GOOGLE MAPS
function showgLightbox() {
	document.getElementById('gover').style.display='block';
	document.getElementById('gfade').style.display='block';
	geolocalizar();
}
		
function hidegLightbox() {
	document.getElementById('gover').style.display='none';
	document.getElementById('gfade').style.display='none';
}

//Funcion para activar la edición del domicilio de entrega
function editarMapa(){
document.getElementById('dataDomicilio').value = '';
$('#dataDomicilio').focus();
$("#tipo_domicilio").val('escrito');
$('#dataDomicilio').attr('readonly', false);
}
