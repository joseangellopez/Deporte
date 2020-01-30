function getcalendario(valor){
    var url = 'seleccionar_deporte.php';
    $.ajax({
        type: 'POST',
        url: url,
        data: {valor}
}).done(function(respuesta){
		if (respuesta.estado === "ok") {
			console.log(JSON.stringify(respuesta));

			var nombre = respuesta.nombre,
			apellido = respuesta.apellido,
			edad = respuesta.edad;
			}
			}