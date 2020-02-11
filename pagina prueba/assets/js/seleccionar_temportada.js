function seleccionar_temporada(valor){
    var url = '../gets/gettemporada.php';
    $.ajax({
        type: 'POST',
        url: url,
        data: {valor},
        success:function(data){
            console.log("temporada seleccionada " + data);
        }
    });
}