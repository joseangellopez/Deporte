<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Equipos</title>
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
    <link rel="stylesheet" href="assets/css/styles_equipos.css">


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
//--------------------------------------------------------------------------

if (isset($_GET['equipo'])) {
    $jugadores = "";
    $equipo = (int)$_GET['equipo'];
    $consulta_infoEquipo = "SELECT * from equipo where idequipo=" . $equipo;
    foreach ($db->query($consulta_infoEquipo) as $fila) {
        $nombre_eq = $fila['nombre_eq'];
        $liga_eq = $fila['liga_eq'];
        $idestadio_eq = $fila['idestadio_eq'];
        $division_eq = $fila['division_eq'];
        $ciudad_eq = $fila['ciudad_eq'];
        $identrenado_eq = $fila['identrenador_eq'];
        $provincia_eq = $fila['provincia_eq'];
        $presidente_eq = $fila['presidente_eq'];
    }
} else {
    $nombre_eq = "";
    $liga_eq = "";
    $idestadio_eq = "";
    $division_eq = "";
    $ciudad_eq = "";
    $identrenado_eq = "";
    $provincia_eq = "";
    $presidente_eq = "";
    $idestadio_nombre = "";
    $identrenador_nombre = "";
}
if ($idestadio_eq != "") {
    $consulta_estadio = "SELECT nombre_estadio from estadio where idestadio=" . $idestadio_eq . ";";
    foreach ($db->query($consulta_estadio) as $fila) {
        $idestadio_nombre = $fila['nombre_estadio'];
    }
}
if ($identrenado_eq != "") {
    $consulta_entrenador = "SELECT nombre_ent,apellidos_ent from entrenadores where identrenador=" . $identrenado_eq . ";";
    foreach ($db->query($consulta_entrenador) as $fila) {
        $identrenador_nombre = $fila['nombre_ent'] . " " . $fila['apellidos_ent'];;
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
            <div class="col-md-8"><img id="imagen" src="assets/img/descarga.png">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Liga</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?php echo $nombre_eq ?></td>
                            <td><?php echo $liga_eq ?></td>
                        </tr>
                        <thead>
                        <tr>
                            <th>Estadio</th>
                            <th>División</th>
                        </tr>
                        </thead>
                        <tr>
                            <td><?php echo $idestadio_nombre ?></td>
                            <td><?php echo $division_eq ?></td>
                        </tr>
                        <thead>
                        <tr>
                            <th>Ciudad</th>
                            <th>Entrenador</th>
                        </tr>
                        </thead>
                        <tr>
                            <td><?php echo $ciudad_eq ?></td>
                            <td><?php echo $identrenador_nombre ?></td>
                        </tr>
                        <thead>
                        <tr>
                            <th>Provincia</th>
                            <th>Presidente</th>
                        </tr>
                        </thead>
                        <tr>
                            <td><?php echo $provincia_eq ?></td>
                            <td><?php echo $presidente_eq ?></td>
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