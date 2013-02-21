jQuery( document ).ready( function(){
	
	//ENVIO DE DATOS//
	$("#enlaceajax").click(function(evento){
		$("#destino").load("buscador.php", {tipo: localStorage["tipo"],sabor: localStorage["sabor"],betun: localStorage["betun"],relleno: localStorage["relleno"] }, function(){
		});
	});

	//ALMACENAMIENTO DE VALORES PARA BUSQUEDA//
	localStorage["tipo"];
	localStorage["sabor"];
	localStorage["betun"];
	localStorage["relleno"];
	
	//$("#misabor").text("Vainilla");//
	
	//FLIP TIPOS//
	jQuery( '#flipTipos' ).jcoverflip({
		current: 5,
		
		beforeCss: function( el, container, offset ){
			return [
				$.jcoverflip.animationElement( el, { left: ( container.width( )/2 - 210 - 110*offset + 20*offset )+'px', bottom: '20px' }, { } ),
				$.jcoverflip.animationElement( el.find( 'img' ), { width: Math.max(10,100-20*offset*offset) + 'px' }, {} )
			];
		},
		
		afterCss: function( el, container, offset ){
			return [
				$.jcoverflip.animationElement( el, { left: ( container.width( )/2 + 110 + 110*offset )+'px', bottom: '20px' }, { } ),
				$.jcoverflip.animationElement( el.find( 'img' ), { width: Math.max(10,100-20*offset*offset) + 'px' }, {} )
			];
		},
		
		currentCss: function( el, container ){
			return [
				$.jcoverflip.animationElement( el, { left: ( container.width( )/2 - 100 )+'px', bottom: 0 }, { } ),
				$.jcoverflip.animationElement( el.find( 'img' ), { width: '200px' }, { } )
			];
		},
		
		change: function(event, ui){
		}
	}); 

	//FLIP SABORES//
	jQuery( '#flipSabores' ).jcoverflip({
		current: 3,
		
		beforeCss: function( el, container, offset ){
			return [
				$.jcoverflip.animationElement( el, { left: ( container.width( )/2 - 210 - 110*offset + 20*offset )+'px', bottom: '20px' }, { } ),
				$.jcoverflip.animationElement( el.find( 'img' ), { width: Math.max(10,100-20*offset*offset) + 'px' }, {} )
			];
		},
		
		afterCss: function( el, container, offset ){
			return [
				$.jcoverflip.animationElement( el, { left: ( container.width( )/2 + 110 + 110*offset )+'px', bottom: '20px' }, { } ),
				$.jcoverflip.animationElement( el.find( 'img' ), { width: Math.max(10,100-20*offset*offset) + 'px' }, {} )
			];
		},
		
		currentCss: function( el, container ){
			return [
				$.jcoverflip.animationElement( el, { left: ( container.width( )/2 - 100 )+'px', bottom: 0 }, { } ),
				$.jcoverflip.animationElement( el.find( 'img' ), { width: '200px' }, { } )
			];
		},
		
		change: function(event, ui){
		}
	});

	//FLIP BETUNES//
	jQuery( '#flipBetunes' ).jcoverflip({
		current: 1,
		
		beforeCss: function( el, container, offset ){
			return [
				$.jcoverflip.animationElement( el, { left: ( container.width( )/2 - 210 - 110*offset + 20*offset )+'px', bottom: '20px' }, { } ),
				$.jcoverflip.animationElement( el.find( 'img' ), { width: Math.max(10,100-20*offset*offset) + 'px' }, {} )
			];
		},
		
		afterCss: function( el, container, offset ){
			return [
				$.jcoverflip.animationElement( el, { left: ( container.width( )/2 + 110 + 110*offset )+'px', bottom: '20px' }, { } ),
				$.jcoverflip.animationElement( el.find( 'img' ), { width: Math.max(10,100-20*offset*offset) + 'px' }, {} )
			];
		},
		
		currentCss: function( el, container ){
			return [
				$.jcoverflip.animationElement( el, { left: ( container.width( )/2 - 100 )+'px', bottom: 0 }, { } ),
				$.jcoverflip.animationElement( el.find( 'img' ), { width: '200px' }, { } )
			];
		},
		
		change: function(event, ui){
		}
	});

	//FLIP RELLENOS//
	jQuery( '#flipRellenos' ).jcoverflip({
		current: 2,
		
		beforeCss: function( el, container, offset ){
			return [
				$.jcoverflip.animationElement( el, { left: ( container.width( )/2 - 210 - 110*offset + 20*offset )+'px', bottom: '20px' }, { } ),
				$.jcoverflip.animationElement( el.find( 'img' ), { width: Math.max(10,100-20*offset*offset) + 'px' }, {} )
			];
		},
		
		afterCss: function( el, container, offset ){
			return [
				$.jcoverflip.animationElement( el, { left: ( container.width( )/2 + 110 + 110*offset )+'px', bottom: '20px' }, { } ),
				$.jcoverflip.animationElement( el.find( 'img' ), { width: Math.max(10,100-20*offset*offset) + 'px' }, {} )
			];
		},
		
		currentCss: function( el, container ){
			return [
				$.jcoverflip.animationElement( el, { left: ( container.width( )/2 - 100 )+'px', bottom: 0 }, { } ),
				$.jcoverflip.animationElement( el.find( 'img' ), { width: '200px' }, { } )
			];
		},
		
		change: function(event, ui){
		}
	});	
				//Se ocultan los elementos de la pagina//
			   $("#wrapperTipos").css("display", "none");
			   $("#wrapperSabores, #tits").css("display", "none");
			   $("#wrapperBetunes, #titb").css("display", "none");
			   $("#wrapperRellenos, #titr").css("display", "none");
			   $("#detalles").css("display", "none");
			   $("#destino").css("display", "none");
			   $("aside").css("display", "none");
			  

			   //Se visualiza el primer elemento que es el tipo de pastel//
			   $("#wrapperTipos").fadeIn(1000);
			   
			 //Se llama al evento click para desencadenar cada elemento//
			   $("#wrapperTipos").click(function(){
				   	$("#wrapperSabores, #tits").fadeIn(1000);
				  	$.scrollTo("#wrapperSabores",200);
			   });
			   $("#wrapperSabores").click(function(){
				  	$("#wrapperBetunes, #titb").fadeIn(1000);
				  	$.scrollTo('#wrapperBetunes',200);
			   });
			   $("#wrapperBetunes").click(function(){
				  	$("#wrapperRellenos, #titr").fadeIn(1000);
				  	$.scrollTo('#wrapperRellenos',200);
			   });
			   $("#wrapperRellenos").click(function(){
				  	$("#detalles").fadeIn(1000);
				  	$("#destino").fadeIn(1000);
					$("aside").fadeIn(1000);					
				  	$.scrollTo('body',200);
					$("section").animate({"left": "+=100px"}, "slow");
			   });
			   
			   $("#enlaceajax").click(function(){
				  	$(".ticketDetalleCotizado").fadeIn(1000);				  	
					$.scrollTo('#enlaceajax',200);
				});
			   
			   
/*			   $("#enlaceajax").click(function(){
				   	$("#fpedido").fadeIn(1000);
				  	$.scrollTo('#fpedido',200);
				  
			   });*/
   
});