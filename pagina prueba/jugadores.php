<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>jugadores</title>

    <!-- Cabecera y pie-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Pretty-Header.css">
    <link rel="stylesheet" href="assets/css/styles_cabecera.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button_cabecera.css">

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles_jugadores.css">
    <style>
        .img_jug {
            margin-left: 0;
        }
    </style>
</head>
<body>
<?php include 'cabecera.php'; ?>
<?php include 'conexionproyecto.php'; ?>
<?php
$lista = "";
$consulta_equipos = "SELECT idequipo, nombre_eq from equipo;";
foreach ($db->query($consulta_equipos) as $fila) {
    $idequipo = $fila['idequipo'];
    $nombre_eq = $fila['nombre_eq'];
    $lista .= "<li value=\"" . $idequipo . "\"><a href=?equipo=" . $idequipo . ">" . $nombre_eq . "</a></li>";
}
//_-----------------------------------------------------------------------_\\


if (isset($_GET['equipo'])) {
    setcookie('equipo_seleccionado', $_GET['equipo']);
}

if (isset($_COOKIE['equipo_seleccionado'])) {
    $jugadores = "";
    $consulta_jugadores = "SELECT idjugador, alias_jug from jugador,jugador_equipo_temporada  where idequipo_jet=" . @$_COOKIE['equipo_seleccionado'] . " and Jugador_idjugador=idjugador";
    foreach ($db->query($consulta_jugadores) as $fila) {
        $idjugador = $fila['idjugador'];
        $alias_jug = $fila['alias_jug'];
        $jugadores .= "<option value=\"" . $idjugador . "\">" . $alias_jug . "</option>";
    }
}


//_-------------------------------------------------------------_\\
@$jugador_actual = $_GET['jugador_select'];
if (isset($jugador_actual)) {
    $info_jug = "";
    $jugador = (int)$_GET['jugador_select'];
    $consulta = "SELECT nombre_jug, apellido_jug, alias_jug, fechanac_jug, nacionalidad_jug, numero_jug_jet, nombre_eq, nombre_pos, Nombre_lig
    from jugador , jugador_equipo_temporada, equipo, posicion, temporada_equipo, division, liga  
    where Jugador_idjugador=" . $jugador . " and idjugador = " . $jugador . " and idequipo_jet= idequipo
    and idposicion_jet = idposicion and idequipo_temeq = idequipo and division_temeq = iddivision and liga_idliga = idliga";
    foreach ($db->query($consulta) as $fila) {
        $nombre_jug = $fila['nombre_jug'];
        $apellido_jug = $fila['apellido_jug'];
        $alias_jug_lista = $fila['alias_jug'];
        $fechanac_jug = $fila['fechanac_jug'];
        $nacionalidad_jug = $fila['nacionalidad_jug'];
        $numero_jug = $fila['numero_jug_jet'];
        $equipo_jug = $fila['nombre_eq'];
        $idposicion_jug = $fila['nombre_pos'];
        $liga_jug = $fila['Nombre_lig'];

    }
}

?>
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul id="menu_lateral">
                    <?php echo $lista ?>
                </ul>
            </div>
            <div class="col-md-8">
                <form>
                    <select name="jugador_select" id="jugador_select">
                        <optgroup label="Recuerde seleccionar un equipo">
                            <option value="0" selected="">Seleccione un jugador</option>
                            <?php echo $jugadores ?>
                        </optgroup>
                    </select>
                    <button type="submit">Seleccionar Jugador</button>
                </form>
                <div class="table-responsive">
                    <table class="table">
                        <img class="img_jug" src="assets/img/descarga.png"/>
                        <p>Posición:</p>
                        <p><?php echo @$idposicion_jug ?></p>
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th class="col-md-8">Apellido</th>
                        </tr>
                        </thead>

                        <tr>
                            <td><?php echo @$nombre_jug ?></td>
                            <td><?php echo @$apellido_jug ?></td>
                        </tr>
                        <thead>
                        <tr>
                            <th>Alias</th>
                            <th>Equipo</th>
                        </tr>
                        </thead>
                        <tr>
                            <td><?php echo @$alias_jug_lista ?></td>
                            <td><?php echo @$equipo_jug ?></td>
                        </tr>
                        <thead>
                        <tr>
                            <th>Nacionalidad</th>
                            <th>Número</th>
                        </tr>
                        </thead>
                        <tr>
                            <td><?php echo @$nacionalidad_jug ?></td>
                            <td><?php echo @$numero_jug ?></td>
                        </tr>
                        <thead>
                        <tr>
                            <th>Fecha Nacimiento</th>
                            <th>Liga</th>
                        </tr>
                        </thead>
                        <tr>
                            <td><?php echo @$fechanac_jug ?></td>
                            <td><?php echo @$liga_jug ?></td>
                        </tr>


                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<?php include 'pie.php'; ?>
</body>

</html>
