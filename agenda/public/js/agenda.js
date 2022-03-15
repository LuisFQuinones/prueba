
document.addEventListener('DOMContentLoaded', function () {

	const URL_BASE = 'http://localhost:8000/evento/';

	let formulario = document.querySelector("form");

	var calendarEl = document.getElementById('agenda');

	var calendar = new FullCalendar.Calendar(calendarEl, {
		timeZone: 'America/New_York',
		initialView: 'dayGridMonth',
		locale: "es",
		displayEventTime:false,
		headerToolbar: {
			left: 'prev,next today',
			center: 'title',
			right: 'dayGridMonth,timeGridWeek,listWeek'
		},
		events: URL_BASE + 'mostrar',
		dateClick: function (info) 
		{
			
			formulario.reset();
			formulario.start.value = info.dateStr;
			formulario.end.value = info.dateStr;
			$fecha = formulario.start.value +" 00:00:00";

			axios.post(URL_BASE + "validar_cita/" +$fecha).
			then(
				(respuesta) => {

					if( Number.isInteger( respuesta.data ) )
					{
						$('#evento').modal('show');
					}
					else
					{
						alert("Ya existe un evento para esta fecha.")
					}
				}
			).catch
			(
				error => {
					if (error.response) {
						console.log(error.response.data);
					}
				}
			)
			
		},
		eventClick: function (info) {

			axios.post(URL_BASE + 'editar/' + info.event.id).
				then(
					(respuesta) => {

						formulario.id.value = respuesta.data.id;
						formulario.doc.value = respuesta.data.doc;
						formulario.title.value = respuesta.data.title;
						formulario.descripcion.value = respuesta.data.descripcion;
						formulario.hora.value = respuesta.data.hora;
						formulario.start.value = respuesta.data.start;
						formulario.end.value = respuesta.data.end;
						$('#evento').modal('show');
					}
				).catch
				(
					error => {
						if (error.response) {
							console.log(error.response.data);
						}
					}
				)
		}
	});
	calendar.render();

	document.getElementById("btnguardar").addEventListener("click", function () {
		let id = document.getElementById("id").value;

		if (id == '')
		{
			enviarDatos(URL_BASE + "agregar");
		}
		else
		{
			enviarDatos(URL_BASE + "actualizar");
		}
	});

	document.getElementById("btneliminar").addEventListener("click",function()
	{
		var bool=confirm("Seguro que desea eliminar el evento?");

		if(bool){
			enviarDatos(URL_BASE + "borrar/"+formulario.id.value);
			calendar.refetchEvents();
			$('#evento').modal('hide');
		}else{
			calendar.refetchEvents();
			$('#evento').modal('hide');
		}
	});


	function enviarDatos(url) {
		const datos = new FormData(formulario);

		axios.post(url, datos).
			then(
				(respuesta) => {
					alert( respuesta.data.message );
					calendar.refetchEvents();
					$('#evento').modal('hide');
				}
			).catch
			(
				error => {
					if (error.response) {
						console.log(error.response.data);
					}
				}
			)
	}
});

