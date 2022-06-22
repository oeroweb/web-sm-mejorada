/* Tamaño máximo en un textarea. REPASAR*/
function ExtensionMensaje(campo)
{
	var TotalMensaje;
	var ValorMaximo=500;
	TotalMensaje = document.getElementById(campo).value.length;

	if (TotalMensaje > ValorMaximo)
		document.getElementById(campo).value = document.getElementById(campo).value.substring(0,ValorMaximo);
}

/* FUNCIONES BBCODE */
function bbcode_b(campo)
{
	var mensaje_actual;
	var mensaje;
	eval("mensaje_actual=document.getElementById(campo).value");

	var text = prompt("Introduzca texto a poner en negrilla", "");

	if((text==null)||(text==""))
		return;

	var url_codigo = "[b]"+text+"[/b]";

	mensaje = mensaje_actual+url_codigo;

	eval("document.getElementById(campo).value=mensaje");
	eval("document.getElementById(campo).focus()");
}
function bbcode_em(campo)
{
	var mensaje_actual;
	var mensaje;
	eval("mensaje_actual=document.getElementById(campo).value");

	var text = prompt("Introduzca texto a poner en cursiva", "");

	if((text==null)||(text==""))
		return;

	var url_codigo = "[em]"+text+"[/em]";

	mensaje = mensaje_actual+url_codigo;

	eval("document.getElementById(campo).value=mensaje");
	eval("document.getElementById(campo).focus()");
}
function bbcode_img(campo)
{
	var mensaje_actual;
	var mensaje;
	eval("mensaje_actual=document.getElementById(campo).value");

	var text = prompt("Introduzca la dirección de la imagen", "");

	if((text==null)||(text==""))
		return;

	var url_codigo = "[img]"+text+"[/img]";

	mensaje = mensaje_actual+url_codigo;

	eval("document.getElementById(campo).value=mensaje");
	eval("document.getElementById(campo).focus()");
}
function bbcode_url(campo)
{
	var url_codigo;
	var mensaje_actual;
	var mensaje;
	eval("mensaje_actual=document.getElementById(campo).value");

	var url = prompt("Introduzca la url de la web: ", "http://");

	if((url==null)||(url==""))
		return;

	var titulo = prompt("Nombre para el enlace", "");

	if((titulo==null)||(titulo==''))
	   url_codigo = "[url]"+url+"[/url]";
	else
	   url_codigo = "[url="+url+"]"+titulo+"[/url]";

	mensaje = mensaje_actual+url_codigo;

	eval("document.getElementById(campo).value=mensaje");
	eval("document.getElementById(campo).focus()");
}

/* ABRIR VENTANAS NUEVAS */
function openwin_max(url)
{
  if( window.open(url,'','left=0,top=0,height=768,width=1024,scrollbars=yes,status=yes,menubar=yes,location=yes,resizable=yes') )
    return false;
  else
    return true;
}

function openwin_min(url)
{
  if( window.open(url,'','left=0,top=0,height=500,width=500,scrollbars=no,status=no,menubar=no,location=no,resizable=no') )
    return false;
  else
    return true;
}

/* CAPAS */
/* Cambia la visibilidad de una capa */
function cambiar(esto)
{
	vista=document.getElementById(esto).style.display;
	if (vista=='none')
		vista='block';
	else
		vista='none';

	document.getElementById(esto).style.display = vista;
}

/* Muestrar una capa */
function mostrar(esto)
{
	document.getElementById(esto).style.display='block';
}

/* Mostrar todas las capas */
function mostrarTODO(grupo)
{
	var capa,cnt=1;
	while(capa=document.getElementById(grupo+cnt))
	{
		mostrar(grupo+cnt);
		cnt++;
	}
}

/* Ocultar una capa */
function ocultar(esto)
{
	document.getElementById(esto).style.display='none';
}

/* Ocultar todas las capas */
function ocultarTODO(grupo)
{
	var capa,cnt=1;
	while(capa=document.getElementById(grupo+cnt))
	{
		ocultar(grupo+cnt);
		cnt++;
	}	
}

/* El menú se compone de la capa, la imagen de más y la de menos
Desde aquí cambio las tres a la vez. */
function cambiar_menu(esto)
{
	var vista1='';
	var vista2='';
	var vista3='';

	/* Cambiar capa */
	vista1=document.getElementById(esto).style.display;
	if (vista1=='none')
		vista1='block';
	else
		vista1='none';
	document.getElementById(esto).style.display = vista1;

	/* Cambiar imagen más */
	vista2=document.getElementById(esto+'_mas').style.display;
	if (vista2=='none')
		vista2='inline';
	else
		vista2='none';
	document.getElementById(esto+'_mas').style.display = vista2;

	/* Cambiar imagen menos */
	vista3=document.getElementById(esto+'_menos').style.display;
	if (vista3=='none')
		vista3='inline';
	else
		vista3='none';
	document.getElementById(esto+'_menos').style.display = vista3;
}

/* CAMBIAR TAMAÑO DE TEXTO */
// Posibles tamaños
var tamanos_array = new Array('0.70em','0.75em','0.80em','0.85em','0.90em','0.95em','1.00em','1.10em');
// Tamaño inicial, recordar que el array empieza en 0
var tamano=5;
function tamano_texto(incremento)
{
	tamano += incremento;
	if (tamano<=0)
		tamano=0;
	else if (tamano>tamanos_array.length-1)
		tamano=tamanos_array.length-1;
	document.getElementsByTagName('body')[0].style.fontSize = tamanos_array[tamano];
}

