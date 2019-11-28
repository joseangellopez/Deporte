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
            margin-left: 0px;
        }
    </style>
</head>
<script>


</script>
<body>
<?php include 'cabecera.php'; ?>
<?php include 'conexionproyecto.php'; ?>
<?php
$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
//Lista de equipos
$lista = "";
$consulta_equipos = "SELECT idequipo, nombre_eq from equipo;";
$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
foreach ($db->query($consulta_equipos) as $fila) {
    $idequipo = $fila['idequipo'];
    $nombre_eq = $fila['nombre_eq'];
    $lista .= "<li value=\"" . $idequipo . "\"><a href=?equipo=" . $idequipo . ">" . $nombre_eq . "</a></li>";
}
//_-----------------------------------------------------------------------_\\
if (isset($_GET['equipo'])) {
    $jugadores = "";
    $equipo = (int)$_GET['equipo'];
    $consulta_jugadores = "SELECT idjugador, alias_jug , equipos_jug from jugador where equipos_jug=" . $equipo;
    foreach ($db->query($consulta_jugadores) as $fila) {
        $idjugador = $fila['idjugador'];
        $alias_jug = $fila['alias_jug'];
        $equipos_jug=$fila['equipos_jug'];
        $jugadores .= "<option value=\"" . $idjugador."\">". $alias_jug . "</option>";
    }
}


//_-------------------------------------------------------------_\\
if (isset($_GET['jugador_select'])) {
    $info_jug = "";
    $jugador = (int)$_GET['jugador_select'];
    $consulta_infojug = "SELECT * from jugador where idjugador=" . $jugador;
    foreach ($db->query($consulta_infojug) as $fila) {
        $idposicion_jug = $fila['idposicion_jug'];
        $idjugador = $fila['idjugador'];
        $nombre_jug = $fila['nombre_jug'];
        $apellido_jug = $fila['apellido_jug'];
        $alias_jug = $fila['alias_jug'];
        $fechanac_jug = $fila['fechanac_jug'];
        $nacionalidad_jug = $fila['nacionalidad_jug'];
        $numero_jug = $fila['numero_jug'];
        $equipos_jug = $fila['equipos_jug'];
    }
} else {
    $idposicion_jug = "";
    $idjugador = "";
    $nombre_jug = "";
    $apellido_jug = "";
    $alias_jug = "";
    $fechanac_jug = "";
    $nacionalidad_jug = "";
    $numero_jug = "";
    $equipos_jug = "";
    $liga_jug = "";
}

//_-------------------------------------------------------------_\\
if ($equipos_jug != "") {
    $equipo = "";
    $consulta_equipo_jug = "SELECT idequipo, nombre_eq, liga_eq from equipo where idequipo=" . $equipos_jug;
    foreach ($db->query($consulta_equipo_jug) as $fila) {
        $equipos_jug = $fila['nombre_eq'];
        $liga_jug = $fila['liga_eq'];
    }
}
if ($idposicion_jug!=""){
    $consulta_posicion_jug = "SELECT idposicion, nombre_pos from posicion where idposicion=".$idposicion_jug;
    foreach ($db->query($consulta_posicion_jug) as $fila) {
        $idposicion_jug = $fila['nombre_pos'];
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
                        <p><?php echo $idposicion_jug ?></p>
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th class="col-md-8">Apellido</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?php echo $nombre_jug ?></td>
                            <td><?php echo $apellido_jug ?></td>
                        </tr>
                        <thead>
                        <tr>
                            <th>Alias</th>
                            <th>Equipo</th>
                        </tr>
                        </thead>
                        <tr>
                            <td><?php echo $alias_jug ?></td>
                            <td><?php echo $equipos_jug ?></td>
                        </tr>
                        <thead>
                        <tr>
                            <th>Nacionalidad</th>
                            <th>Número</th>
                        </tr>
                        </thead>
                        <tr>
                            <td><?php echo $nacionalidad_jug ?></td>
                            <td><?php echo $numero_jug ?></td>
                        </tr>
                        <thead>
                        <tr>
                            <th>Fecha Nacimiento</th>
                            <th>Liga</th>
                        </tr>
                        </thead>
                        <tr>
                            <td><?php echo $fechanac_jug ?></td>
                            <td><?php echo $liga_jug ?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<?php include 'pie.php'; ?>
</body>

</html>