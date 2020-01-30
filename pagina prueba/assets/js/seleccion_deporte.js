function seleccionar_deporte(valor){
    var url = 'seleccionar_deporte.php';
    $.ajax({
        type: 'POST',
        url: url,
        data: {valor},
        success:function(data){
            console.log("deporte seleccionado " + data);
        }
    });
}