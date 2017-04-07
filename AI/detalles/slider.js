// redefinimos la altura del slider para que tenga la altura de la pantalla
$(window).resize(function(){
	$("#slider").height($(window).height()+"px");
});
$(window).resize();

// contiene el id del timeout
var timeoutID=0;
// obtenemos el numero de sliders
var sliders=$("#slider .slider").length;
// esta variable contiene la imagen que se visualiza en el slider
var slidersPos=1;
// definimos el tiempo de duración entre cada slider
var sliderTimer=10000;


// ponemos los selectores
for(var i=1;i<=sliders;i++)
{
	$("#slider #selector").append("<span></span>");
}

// mostramos el primer slider
$("#slider .slider:nth-child(1)").show();
// marcamos el primer selector
$("#slider #selector>span:nth-child("+slidersPos+")").addClass("selectorSelected");

// inicializamos el tiempo
timeoutID=setTimeout("sliderShow()",sliderTimer);

/**
 * Este evento se ejecuta cuando se pulsa sobre un selector
 */
$("#slider #selector>span").click(function(){
	selectorSeleccionado=$(this).index()+1;
	// paramos el tiempo
	clearTimeout(timeoutID);
	// indicamos que vuelve a iniciarse al doblar el tiempo de rotacion
	timeoutID=setTimeout("sliderShow()",(sliderTimer*2));
	
	// mostramos el slider seleccionado y escondemos el actual
	$("#slider .slider:nth-child("+selectorSeleccionado+")").fadeIn();
	$("#slider .slider:nth-child("+slidersPos+")").fadeOut();
	slidersPos=selectorSeleccionado;

	// actualizamos el selector
	$("#slider #selector>span").removeClass("selectorSelected");
	$("#slider #selector>span:nth-child("+selectorSeleccionado+")").addClass("selectorSelected");
});

/**
 * Funcion que se ejecuta cada n segundos para cambiar las imagenes del slider
 */
function sliderShow()
{
	var sliderClose=slidersPos;
	slidersPos++;
	if(slidersPos>sliders)
	{
		slidersPos=1;
	}
	// cambia el slider
	$("#slider .slider:nth-child("+slidersPos+")").fadeIn();
	$("#slider .slider:nth-child("+sliderClose+")").fadeOut();
	
	// cambia el selector
	$("#slider #selector>span:nth-child("+slidersPos+")").addClass("selectorSelected");
	$("#slider #selector>span:nth-child("+sliderClose+")").removeClass("selectorSelected");
	
	timeoutID=setTimeout("sliderShow()",sliderTimer);
}
