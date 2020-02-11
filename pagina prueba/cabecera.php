<?php

    include 'conexionusuarios.php';
    $menu = "";
    if (!isset($_SESSION['sess_user_id'])) {
        $login_logout = '<li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModallogin">Login</button></li>
                    <li> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalregistro">Registro</button></li>';
        $menu = "<li class=\"nav-item\"><a class=\"nav-link\" href=\"#\" onclick=\"seleccionar_deporte(1)\">FÚTBOL</a></li>
            <li class=\"nav-item\"><a class=\"nav-link\" href=\"#\" onclick=\"seleccionar_deporte(2)\">FÚTBOL SALA</a></li>
            <li class=\"nav-item\"><a class=\"nav-link\" href=\"#\" onclick=\"seleccionar_deporte(3)\">BALONCESTO</a></li>
            <li class=\"nav-item\"><a class=\"nav-link\" href=\"#\" onclick=\"seleccionar_deporte(4)\">BALONMANO</a></li>";
    } else {
        $login_logout = '<li><a href="logout.php"> <button type="button" class="btn btn-primary">Logout</button></a></li>';
        $consulta_menu1 = "select * from deportes_sel where id_usuario_dep = " . $_SESSION['sess_user_id'];
        foreach ($db2->query($consulta_menu1) as $fila) {
            $futbol = $fila['futbol_dep'];
            $baloncesto = $fila['baloncesto_dep'];
            $futbol_sala = $fila['futbol_dep'];
            $balonmano = $fila['balonmano_dep'];

        }
        if ($futbol == 1) {
            $menu .= '<li class="nav-item"><a class="nav-link" href="#" onclick="seleccionar_deporte(1)">FÚTBOL</a></li>';
        }
        if ($futbol_sala == 1) {
            $menu .= '<li class="nav-item"><a class="nav-link" href="#" onclick="seleccionar_deporte(2)">FÚTBOL SALA</a></li>';
        }

        if ($baloncesto == 1) {
            $menu .= '<li class="nav-item"><a class="nav-link" href="#" onclick="seleccionar_deporte(3)">BALONCESTO</a></li>';
        }
        if ($balonmano == 1) {
            $menu .= '<li class="nav-item"><a class="nav-link" href="#" onclick="seleccionar_deporte(4)">BALONMANO</a></li>';
        }
    }



?>
<div>
    <div>

        <div class="row">
            <div class="col-md-8">
                <div class="div_logo"><img id="logo" class="img-fluid" src="assets/img/logo.jpg"></div>
                <p id="titulo_pagina">Proyecto</p>
            </div>
            <div class="col-md-4">
                <ul id="botones_login">
                    <?php echo $login_logout ?>
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


<div class="modal" id="myModallogin" data-backdrop="static">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">login</h4>
                <button type="button" class="close" data-dismiss="modal"><i class='fa fa-close'
                                                                            style='font-size:24px;color:red'></i>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <?php include 'login.php'; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>


<div class="modal" id="myModalregistro" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Registro</h4>
                <button type="button" class="close" data-dismiss="modal"><i class='fa fa-close'
                                                                            style='font-size:24px;color:red'></i>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <?php include 'registro.php'; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

