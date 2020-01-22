<?php
include 'conexionusuarios.php';
$menu = "";
if (!isset($_COOKIE['id_usuario'])) {
    //$login_logout = '<li><a href="login.php">Login</a></li>
    //                <li><a href="registro.php">Register</li>';
    $menu = "<li class=\"nav-item\"><a class=\"nav-link\" href=\"#\">FÚTBOL</a></li>
            <li class=\"nav-item\"><a class=\"nav-link\" href=\"#\">FÚTBOL SALA</a></li>
            <li class=\"nav-item\"><a class=\"nav-link\" href=\"#\">BALONCESTO</a></li>
            <li class=\"nav-item\"><a class=\"nav-link\" href=\"#\">BALONMANO</a></li>";
} else {
    //$login_logout = '<li><a href="logout.php">Logout</a></li>';
    $consulta_menu1 = "select * from deportes_sel where id_usuario_dep = " . $_COOKIE['id_usuario'];
    foreach ($db2->query($consulta_menu1) as $fila) {
        $futbol = $fila['futbol_dep'];
        $baloncesto = $fila['baloncesto_dep'];
        $futbol_sala = $fila['futbol_dep'];
        $balonmano = $fila['balonmano_dep'];

    }
    if ($futbol == 1) {
        $menu .= '<li class="nav-item"><a class="nav-link" href="#">FÚTBOL</a></li>';
    }
    if ($futbol_sala == 1) {
        $menu .= '<li class="nav-item"><a class="nav-link" href="#">FÚTBOL SALA</a></li>';
    }

    if ($baloncesto == 1) {
        $menu .= '<li class="nav-item"><a class="nav-link" href="#">BALONCESTO</a></li>';
    }
    if ($balonmano == 1) {
        $menu .= '<li class="nav-item"><a class="nav-link" href="#">BALONMANO</a></li>';
    }
}?>
<div>
    <div>
        <div class="row">
            <div class="col-md-8"><img src="assets/img/descarga.png">
                <p id="titulo_pagina">Proyecto</p>
            </div>
            <div class="col-md-4">
                <ul id="botones_login">
                    <li><a href="login.php">Login</a></li>
                    <li><a href="registro.php">Register</li>
                </ul>
            </div>
        </div>
        <ul class="nav nav-tabs" id="menu1">
            <?php echo $menu ?>
        </ul>
        <ul class="nav nav-tabs" id="menu2">
            <li class="nav-item"><a class="nav-link" href="equipos.php">Equipos</a></li>
            <li class="nav-item"><a class="nav-link" href="calendario.php">Calendario</a></li>
            <li class="nav-item"><a class="nav-link" href="estadisticas.php">Estadística</a></li>
            <li class="nav-item"><a class="nav-link" href="clasificacion.php">Clasificación</a></li>
            <li class="nav-item"><a class="nav-link" href="jugadores.php">Jugadores</a></li>
        </ul>
    </div>
</div>
