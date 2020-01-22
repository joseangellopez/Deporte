<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>estadistica</title>

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
    <link rel="stylesheet" href="assets/css/styles_estadisticas.css">


</head>

<body>

<?php include 'cabecera.php'; ?>
<?php include 'conexionproyecto.php'; ?>
<?php

function listar($db, $tipo)
{
    $lista = "";
    // SELECT idjugador_inc1, count(idtincidencia_inc) as cantidad_inc from incidencia where idtincidencia_inc = 1 GROUP BY idtincidencia_inc order by idjugador_inc1;
    $consulta_inc = "SELECT idjugador1_inc, count(idjugador1_inc) as cantidad_inc from incidencia where idtincidencia_inc = " . $tipo . "  GROUP BY  idjugador1_inc order by cantidad_inc desc limit 5;";
    foreach ($db->query($consulta_inc) as $fila) {
        $jugador = $fila['idjugador1_inc'];
        $cantidad_inc = $fila['cantidad_inc'];

        $consulta_jug = "SELECT idjugador, alias_jug, nombre_eq FROM jugador, jugador_equipo_temporada, equipo where idjugador = " . $jugador . " and Jugador_idjugador = idjugador and idequipo_jet = idequipo;";
        foreach ($db->query($consulta_jug) as $fila) {
            $jugador = $fila['alias_jug'];
            $equipo = $fila['nombre_eq'];
        }
        $lista .= "<tr><td>" . $jugador . "</td><td>" . $equipo . "</td><td>" . $cantidad_inc . "</td></tr>";
    }

    return $lista;
}

?>
<div id="goles-puntos">
    <div class="table-responsive">
        <table class="table">
            <thead class="tcabecera">
            <tr>
                <th>Nombre</th>
                <th>Equipo</th>
                <th>Goles</th>
            </tr>
            </thead>
            <tbody>
            <?php  echo listar($db, 1); ?>
            </tbody>


            <thead class="tcabecera">
            <tr>
                <th>Nombre</th>
                <th>Equipo</th>
                <th>Asistencias</th>
            </tr>
            </thead>
            <tbody>
            <?php  echo listar($db, 2); ?>
            </tbody>


            <thead class="tcabecera">
            <tr>
                <th>Nombre</th>
                <th>Equipo</th>
                <th>Tarjeta Amarilla</th>
            </tr>
            </thead>
            <tbody>
            <?php echo listar($db, 4); ?>
            </tbody>


            <thead class="tcabecera">
            <tr>
                <th>Nombre</th>
                <th>Equipo</th>
                <th>Tarjeta Roja</th>
            </tr>
            </thead>
            <tbody>
            <?php echo listar($db, 3); ?>
            </tbody>


            <thead class="tcabecera">
            <tr>
                <th>Nombre</th>
                <th>Equipo</th>
                <th>Expulsiones</th>
            </tr>
            </thead>
            <tbody>
            <?php  echo listar($db, 1); ?>
            </tbody>


            <thead class="tcabecera">
            <tr>
                <th>Nombre</th>
                <th>Equipo</th>
                <th>Exclusiones</th>
            </tr>
            </thead>
            <tbody>
            <?php  echo listar($db, 1); ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'pie.php'; ?>

</body>

</html>