<?php
function links($archivo){
    $links = '
 <link rel="stylesheet" type="text/css" href="assets/css/strength.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
<link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
<link rel="stylesheet" href="assets/css/Pretty-Header.css">
<link rel="stylesheet" href="assets/css/styles_cabecera.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
<link rel="stylesheet" href="assets/css/Footer-Dark.css">
<link rel="stylesheet" href="assets/css/Header-Blue.css">
<link rel="stylesheet" href="assets/css/Navigation-with-Button_cabecera.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="assets/js/seleccion_deporte.js"></script>';
    switch($archivo){
        case "calendario":
            $links .= '<link rel="stylesheet" href="assets/css/styles_calendario.css">';
            break;
        case "clasificacion":
            $links .= '<link rel="stylesheet" href="assets/css/styles_clasificacion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
            break;
        case "equipos":
            $links.= '<link rel="stylesheet" href="assets/css/styles_equipos.css">';
            break;
        case "estadisticas":
            $links.= '<link rel="stylesheet" href="assets/css/styles_estadisticas.css">';
            break;
        case "jugadores":
            $links.= '    <link rel="stylesheet" href="assets/css/styles_jugadores.css">';
            break;
        case "registro":
            $links.= '<link rel="stylesheet" href="assets/css/styles_registro.css">';
            break;
        case "index":
            $links .= '<link rel="stylesheet" href="assets/css/styles_index.css">';
            break;
    }
    echo $links;
}
?>