// Setup the calendar with the current date
$(document).ready(function () {
	var date = new Date(); // Date() imprime  la fecha actual hora y día.
	var today = date.getDate(); /* devuelve el dia del mes, hoy 4 */
	var mes = date.getMonth(); /* Obtiene el numero indicado del mes */
	var anio= date.getFullYear();
	var new_year = anio;
	var fechaCita = date; /* va a guardar la fecha que se escogio para la cita */
	var ban2 = 0;
	var ban = 0; // bandera para verificar si se ha seleccionado una fecha
	// Establecer controladores de clic para elementos DOM
	
	$(".right-button").click({ date: date, anio}, next_year); /* obtiene el siguiente año */ 
	$(".left-button").click({ date: date, anio}, prev_year); /* obtiene el el calendario de años anteriores */ 
	$(".month").click({ date: date, mes, anio}, month_click);/* al darle clic en algunos de los meses */
	$("#add-button").click({ date: date }, new_event); /* con el clic en el boton hace el llamado a una nuevo evento */
	// Establecer el mes actual como activo
	$(".months-row").children().eq(date.getMonth()).addClass("active-month");/* activa el mes que estamos, selecciona getmonth */
	init_calendar(date);/* inicia  el calendario con la fecha ultima del mes anterior */
	/* check_events: se encarga de verificar los eventos es un evento que obtiene la fecha del dia, obtiene 
	 un numero del mes+1, date.getFullYear obtiene el año actual*/
	/* date.getFullYear: obtiene el año: 2019, date.getMonth() + 1: obtiene 8 que es sep */
	var events = check_events(today, date.getMonth() + 1, date.getFullYear()); // 
	/* refleja los eventos llevados acabo */
	show_events(events, months[date.getMonth()], today );
	/* manda a llamar a una funcion */
});

// Inicializa el calendario agregando las fechas HTML
function init_calendar(date) {
	ban2 = 0;
	ban = 0; 
	$(".events-container").hide(250); 
	$(".tbody").empty();//asignando a la clase tbody, una sentencia vacia, para guardar nuevos datos
	$(".events-container").empty(); /* asignando a la clase events-container una sentencia vacia */
	var calendar_days = $(".tbody"); // lo de la clase se agrega a la var.
	var month = date.getMonth(); // obtiene un numero del mes del 0-11
	var year = date.getFullYear();//obtiene un numero que representa el año
	var day_count = days_in_month(month, year); // llama a la función, y le manda dos var., la var day_c guarda los dias
	var row = $("<tr class='table-row'></tr>"); //agrega una tabla, con una fila
	var today = date.getDate(); // obtiene la fecha 11
	
	//Establezca la fecha en 1 para encontrar el primer día del mes.
	date.setDate(1); // le asigna al dato como fecha 1
	var first_day = date.getDay(); // se obtiene el dia primero, lunes es 0 y domingo 6
	/*35 + firstDay es el número de elementos de fecha que se agregarán a la tabla de fechas,
	35 +1 es la cantidad de números a agregar a la tabla*/
	// 	35 es de(7 días en una semana) * (hasta 5 filas de fechas en un mes)
	for (var i = 0; i < 35 + first_day; i++) {
	/*
		Dado que algunos de los elementos estarán en blanco
		es necesario calcular la fecha real a partir del índice */
		var day = i - first_day+1;
		// Si es domingo, haz una nueva fila
		if (i % 7 === 0) {
			calendar_days.append(row); // Agrega esta fila al final de la tabla a calendar_days
			row = $("<tr class='table-row'></tr>");
		}
		// si el índice actual no es un día de este mes, déjelo en blanco
		if (i < first_day || day > day_count) {
			var curr_date = $("<td class='table-date nil'>" + "</td>");
			row.append(curr_date); // le agrega una fila a la tabla
		}
		else {
			var curr_date = $("<td class='table-date'>" + day + "</td>");
			var events = check_events(day, month + 1, year);
			if (today === day && $(".active-date").length === 0) {
				curr_date.addClass("active-date");
				show_events(events, months[month], day);
			}
			// Si esta fecha tiene algún evento, dale estilo con .event-date
			if (events.length !== 0) {
				curr_date.addClass("event-date");
			}
			// Configure el controlador onClick para hacer clic en una fecha
			curr_date.click({ events: events, month: months[month], day: day }, date_click);
			row.append(curr_date);
		}
	}
	// Agregue la última fila y configure el año actual
	calendar_days.append(row);
	$(".year").text(year);
}

// Obtenga la cantidad de días en un mes / año determinado
function days_in_month(month, year) {
	var monthStart = new Date(year, month, 1);// obtiene el inicio del mes
	var monthEnd = new Date(year, month + 1, 1); // obtiene el inicio del mes consecutivo
	return (monthEnd - monthStart) / (1000 * 60 * 60 * 24); /* regresa la cantidad de dias que hay */
}

//Controlador de eventos para cuando se hace clic en una fecha
function date_click(event) {
	//document.getElementById('horaCita').innerHTML = "";//limpiar hora  hecho por evelyn
	ban=1;
	$("#dialog").hide(250); //muestra el apartado de horario
	$(".events-container").hide(250); // ocultar contendio
	var datee = new Date(); // Date() imprime  la fecha actual hora y día.
	var today = datee.getDate(); // se obtiene el día
	var anio= datee.getFullYear();
	var mes = datee.getMonth(); // obtiene mes 8
	var m=0;
	switch (event.data.month){
		case 'January':
			m = 0;
			break;
		case 'February':
			m = 1;
			break;
		case 'March':
			m = 2;
			break;
		case 'April':
			m = 3;
			break;
		case 'May':
			m = 4;
			break;
		case 'June':
			m = 5;
			break;
		case 'July':
			m = 6;
			break;
		case 'August':
			m = 7;
			break;
		case 'September':	
			m=8;
			break;
		case 'October':
			m = 9;
			break;
		case 'November':
			m = 10;
			break;
		case 'December':
			m = 11;
			break;
		
	}
	d = event.data.day;	
	$(".events-container").empty(); // ocultar contendio
	var fech = anio + "-" + (m+1) + "-" + d;
	//window.alert(fech);
	$(".events-container").append(fech);
	if (m >= mes && m <= (mes + 2)) {
		if (event.data.day < today && mes == m) {
			window.alert("Fecha invalida");
			$(".horarios-container").hide(250);
		} else {
			$(".active-date").removeClass("active-date");
			$(this).addClass("active-date");
			$(".horarios-container").show(250); //muestra el apartado de horario
			$(".events-container").show(250); // ocultar contendio
		}
	}
};

// Controlador de eventos para cuando se hace clic en un mes
function month_click(event) {
	$(".events-container").hide(250);
	$("#dialog").hide(250);
	var date = event.data.date; // obtiene la fecha del ultimo dia del mes anterior
	var mesAc = event.data.mes;// obtiene el mes actual, regresa un num
	var new_month = $(".month").index(this); // regresa el nuemero  del mes seleccionado
	var ahioSel = date.getFullYear();
	var ahioAc= event.data.anio;
	if (mesAc==11 && ahioSel!==ahioAc){
		if(new_month==0 || new_month==1){
			$(".active-month").removeClass("active-month"); //remueve las clases
			$(this).addClass("active-month"); // agrega una clase 
			date.setMonth(new_month); // se le asigna al dato al mes nuevo
			init_calendar(date); //inicia el calendario con la fecha propor
		}else{
			window.alert("Mes no disponible");

		}
	} else if (new_month >= mesAc && new_month<= (mesAc + 2) && ahioSel==ahioAc) {
		$(".active-month").removeClass("active-month"); //remueve las clases
		$(this).addClass("active-month"); // agrega una clase 
		date.setMonth(new_month); // se le asigna al dato al mes nuevo
		init_calendar(date); //inicia el calendario con la fecha propor
	}
	else {
		window.alert("Mes no disponible");
	} 
}

//Controlador de eventos para cuando se hace clic en el botón derecho del año
function next_year(event, anio) {
		$("#dialog").hide(250);
	    $(".events-container").hide(250);
		 var date =  event.data.date; //obtiene la fecha del ultimo día del mes anterior
		 new_year =  date.getFullYear() + 1; // devuelve el año actaul, y se le agrega 1 para el proximo año
		 if ((event.data.anio + 1) == new_year) {
			$(".year").html(new_year); // se le agrega e texto a la clase
			date.setFullYear(new_year); // le asigna al date, el año proximo con un mes antes
			init_calendar(date);// el calendario se inicia con el ultimo dia del mes anterio
		}
		else{
			window.alert("Año no disponible");
		}		
}

// Controlador de eventos para cuando se hace clic en el botón izquierdo del año
function prev_year(event, anio) {
	$("#dialog").hide(250);
	$(".events-container").hide(250);
	var date = event.data.date; // obtiene la fecha del ultimo dia del mes anterior
	new_year = date.getFullYear() - 1;// devuelve el año actaul, y se le le resta -1 para el año anterior
	if (event.data.anio == new_year)
	{		
		$("year").html(new_year);// se le agrega e texto a la clase
		date.setFullYear(new_year);// le asigna al date, el año anterior, con fecha del ultimo dia del mes anterior a la que estamos
		init_calendar(date);//inicia el calendario
	}
	
}

// Controlador de eventos para hacer clic en el botón del nuevo evento
function new_event(event) {
	if (ban==0){
		window.alert("Antes de, escoge una fecha para tu cita.");
		return false;
	}
	if (ban2 == 0) {
		window.alert("Antes de, escoge una hora para tu cita.");
		return false;
	}
	if(ban==1 && ban2==1){
		var date = event.data.date;
		var a = date.getFullYear();
		var m = date.getMonth();
		$(".horarios-container").hide(250);
		$(".events-container").hide(250);
		$(".dialog").show(250); // muestra el contenedor para requisitar la cita
		switch (m) {
			case 0:
				m = "01";
				break;
			case 1:
				m = "02";
				break;
			case 2:
				m = "03";
				break;
			case 3:
				m = "04";
				break;
			case 4:
				m = "05";
				break;
			case 5:
				m = "06";
				break;
			case 6:
				m = "07";
				break;
			case 7:
				m = "08";
				break;
			case 8:
				m = "09";
				break;
			case 9:
				m = "10";
				break;
			case 10:
				m = "11";
				break;
			case 11:
				m = "12";
				break;
		}

		fechaCita = a + "/" + m + "/" + d; //formato año/mes/dia	 hecho por evelyn
		document.getElementById('fechaId').value = fechaCita;

		return false;

	}else {
		window.alert("Por favor, verifica sí ya escogistes fecha de cita y horario");
		return false;
	}
	return true;
		
}
// Mostrar todos los eventos de la fecha seleccionada en vistas de tarjeta
function show_events(events, month, day) {
	// limpiar de datos los dos container
	$(".events-container").empty(); /*  */
	// $(".events-container").show(250);
	 console.log(event_data["events"]);
	// var date = event.data.date;
	// Si no hay eventos para esta fecha, notifique al usuario
	if (events.length === 0) {
		var event_card = $("<div class='event-card'></div>");
	    var event_name = $("<div class='event-name'>There are no events planned for " + month + " " + day + ".</div>");
		$(event_card).css({ "border-left": "10px solid #FF1744" });
		$(event_card).append(event_name);
		$(".events-container").append(event_card);
	}
	else {
		// Go through and add each event as a card to the events container
		for (var i = 0; i < events.length; i++) {
			var event_card = $("<div class='event-card'></div>");
			var event_name = $("<div class='event-name'>" + events[i]["occasion"] + ":</div>");
			var event_count = $("<div class='event-count'>" + events[i]["invited_count"] + " Invited</div>");
			if (events[i]["cancelled"] === true) {
				$(event_card).css({
					"border-left": "10px solid #FF1744"
				});
				event_count = $("<div class='event-cancelled'>Cancelled</div>");
			}
			$(event_card).append(event_name).append(event_count);
			$(".events-container").append(event_card);
		}
	}
}

// Comprueba si una fecha específica tiene algún evento
function check_events(day, month, year) {
	var events = [];
	for (var i = 0; i < event_data["events"].length; i++) {
		var event = event_data["events"][i];
		if (event["day"] === day &&
			event["month"] === month &&
			event["year"] === year) {
			events.push(event);
		}
	}
	return events;
}

// // Datos dados para eventos en formato JSON
var event_data = {
	"events": [
		{
			"occasion": " Repeated Test Event ",
			"invited_count": 120,
			"year": 2017,
			"month": 5,
			"day": 10,
			"cancelled": true
		},
		{
			"occasion": " Repeated Test Event ",
			"invited_count": 120,
			"year": 2017,
			"month": 5,
			"day": 10,
			"cancelled": true
		},
		{
			"occasion": " Repeated Test Event ",
			"invited_count": 120,
			"year": 2017,
			"month": 5,
			"day": 10,
			"cancelled": true
		},
		{
			"occasion": " Repeated Test Event ",
			"invited_count": 120,
			"year": 2017,
			"month": 5,
			"day": 10
		},
		{
			"occasion": " Repeated Test Event ",
			"invited_count": 120,
			"year": 2017,
			"month": 5,
			"day": 10,
			"cancelled": true
		},
		{
			"occasion": " Repeated Test Event ",
			"invited_count": 120,
			"year": 2017,
			"month": 5,
			"day": 10
		},
		{
			"occasion": " Repeated Test Event ",
			"invited_count": 120,
			"year": 2017,
			"month": 5,
			"day": 10,
			"cancelled": true
		},
		{
			"occasion": " Repeated Test Event ",
			"invited_count": 120,
			"year": 2017,
			"month": 5,
			"day": 10
		},
		{
			"occasion": " Repeated Test Event ",
			"invited_count": 120,
			"year": 2017,
			"month": 5,
			"day": 10,
			"cancelled": true
		},
		{
			"occasion": " Repeated Test Event ",
			"invited_count": 120,
			"year": 2017,
			"month": 5,
			"day": 10
		},
		{
			"occasion": " Test Event",
			"invited_count": 120,
			"year": 2017,
			"month": 5,
			"day": 11
		}
	]
};

const months = [
	"January",
	"February",
	"March",
	"April",
	"May",
	"June",
	"July",
	"August",
	"September",
	"October",
	"November",
	"December"
];
// funcion para obtner la hora
function obtenerHor(id){
	
    switch(id){
		case "9":
			document.getElementById('horaId').value = '9-10'; /* asignando un valor al id */
            break;
        case "10":
			document.getElementById('horaId').value = '10-11';
            break;
        case "11":
			document.getElementById('horaId').value = '11-12';
            break;
        case "12":
			document.getElementById('horaId').value = "12-13";
            break
        case "13":
			document.getElementById('horaId').value = "13-14";
            break;
        case "16":
			document.getElementById('horaId').value = "16-17";
            break;
        case "17":
			document.getElementById('horaId').value = "17-18";
			break;
		case "18":
			document.getElementById('horaId').value = "18-19";
			break;
    
	}
}

/* validacion de los campos del formmulario */
function validacionForm() {
	var reason = "";
	var nom = document.getElementById("name");
	var mot = document.getElementById("cita");
	var tel = document.getElementById("numer");
	reason += validateName(nom);
	reason += validateCita(mot);
	reason += validatePhone(tel);
	if (reason != "") {
		window.alert("Algunos de los campos necesita correción\n" + reason);
		return false;
	}
	return true;
}
/* validacion de la caja de nombre */
function validateName(nombre) {
	
	var error = "";
	// var illegalChars = /\W/; // permite letras, números y guiones bajos
	if (nombre.value == "" || nombre.value == null || (/^\s+$/.test(nombre.value))) {
		nombre.style.background = 'red';
		error="La caja para nombre no contiene nada...\n";
		nombre.focus();
	}else if ((nombre.length < 3) || (nombre.length > 30)) {
		nombre.style.background = 'red';
		error = "El nombre  tiene una longitud incorrecta...\n";
		nombre.focus();
	}else {
			nombre.style.background = 'White';
		}
	// } else if (illegalChars.test(nombre.value)) {
	// 	nombre.style.background = 'red';
	// 	error = "El nombre ingresado contiene caracteres ilegales.\n";
	// 	nombre.focus();
	// } 
	return error;
}
function validateCita(cita){
	var error = "";
	if (cita.value == 0 || cita.length < 5 || cita.length > 30 ) {
		cita.style.background = 'reed';
		error = "Verifique el campo cita, antes de seguir\n"
	} else {
		cita.style.background = 'White';
	}
	return error;  

}
function validatePhone(tel) {
	var error = "";
	var stripped = tel.value.replace(/[\(\)\.\-\ ]/g, '');

	if (tel.value == "" || tel.value==null) {
		error = "No ingresó un número de teléfono..\n";
		tel.style.background = 'red';
	} else if (isNaN(parseInt(stripped))) {
		error = "El número de teléfono contiene caracteres ilegales..\n";
		tel.style.background = 'red';
	} else if (!(stripped.length == 10)) {
		error = "El número de teléfono tiene la longitud incorrecta. Asegúrese de incluir un código de área.\n";
		tel.style.background = 'red';
	}
	return error;
}
// Obtener referencia a botones
// Recuerda: el punto . indica clases
const botones = document.querySelectorAll(".botonC");
// Definir función y evitar definirla de manera anónima
const cuandoSeHaceClick = function (evento) {
	// Recuerda, this es el elemento
	// window.alert("El texto que tiene es: ", this.innerText);
	ban2=1;
}
// botones es un arreglo así que lo recorremos
botones.forEach(boton => {
	//Agregar listener
	boton.addEventListener("click", cuandoSeHaceClick);
});


function botonCancelar(){
	$("#dialog").hide(250);
	$(".horarios-container").show(250);
	ban=0;
	ban2=0;
	document.getElementById('fechaId').innerHTML = "";
	document.getElementById('horaId').innerHTML = "";
	document.getElementById('name').innerHTML = "";
	document.getElementById('cita').innerHTML = "";
	document.getElementById('numer').innerHTML = "";
}
