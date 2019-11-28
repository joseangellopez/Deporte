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
    $prueba = "";
    // SELECT idjugador_inc1, count(idtincidencia_inc) as cantidad_inc from incidencia where idtincidencia_inc = 1 GROUP BY idtincidencia_inc order by idjugador_inc1;
    $consulta_inc = "SELECT idjugador_inc1, count(idtincidencia_inc) as cantidad_inc from incidencia where idtincidencia_inc = " . $tipo . " GROUP BY idtincidencia_inc order by idjugador_inc1;";
    foreach ($db->query($consulta_inc) as $fila) {
        $jugador = $fila['idjugador_inc1'];
        $cantidad_inc = $fila['cantidad_inc'];

        $consulta_jug = "SELECT idjugador, alias_jug, equipos_jug FROM jugador where idjugador = " . $jugador . ";";
        foreach ($db->query($consulta_jug) as $fila) {
            $jugador = $fila['alias_jug'];
            $equipo = $fila['equipos_jug'];
        }
        $consulta_equ = "SELECT idequipo, nombre_eq FROM equipo where idequipo = " . $equipo . ";";
        foreach ($db->query($consulta_equ) as $fila) {
            $equipo = $fila['nombre_eq'];
        }
        $prueba .= "<tr><td>" . $jugador . "</td><td>" . $equipo . "</td><td>" . $cantidad_inc . "</td></tr>";
    }

    return $prueba;
}

?>
<div id="goles-puntos">
    <div class="table-responsive">
        <table class="table">
            <thead class="tcabecera">
            <tr>
                <th>Nombre</th>
                <th>Equipo</th>
                <th>&nbsp; &nbsp; Goles &nbsp; &nbsp;&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php // echo listar($db, 1); ?>
            <tr>
                <td>Jose Ángel</td>
                <td>Mogón C.F</td>
                <td>-3</td>
            </tr>
            <tr></tr>
            </tbody>
        </table>
    </div>
</div>
<div id="asistencias">
    <div class="table-responsive">
        <table class="table">
            <thead class="tcabecera">
            <tr>
                <th>Nombre</th>
                <th>Equipo</th>
                <th>Asistencias</th>
            </tr>
            </thead>
            <tbody>
            <?php // echo listar($db, 1); ?>
            <tr>
                <td>Jose Ángel</td>
                <td>Mogón C.F</td>
                <td>-3</td>
            </tr>
            <tr></tr>
            </tbody>
        </table>
    </div>
</div>
<div id="tarjetas">
    <div class="table-responsive">
        <table class="table">
            <thead class="tcabecera">
            <tr>
                <th>Nombre</th>
                <th>Equipo</th>
                <th>&nbsp; Tarjetas &nbsp;&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php echo listar($db, 1); ?>
            <tr></tr>
            </tbody>
        </table>
    </div>
</div>
<div id="expulsiones">
    <div class="table-responsive">
        <table class="table">
            <thead class="tcabecera">
            <tr>
                <th>Nombre</th>
                <th>Equipo</th>
                <th>Expulsiones</th>
            </tr>
            </thead>
            <tbody>
            <?php // echo listar($db, 1); ?>
            <tr>
                <td>Jose Ángel</td>
                <td>Mogón C.F</td>
                <td>-3</td>
            </tr>
            <tr></tr>
            </tbody>
        </table>
    </div>
</div>
<div id="exclusiones">
    <div class="table-responsive">
        <table class="table">
            <thead class="tcabecera">
            <tr>
                <th>Nombre</th>
                <th>Equipo</th>
                <th>Exclusiones</th>
            </tr>
            </thead>
            <tbody>
            <?php // echo listar($db, 1); ?>
            <tr>
                <td>Jose Ángel</td>
                <td>Mogón C.F</td>
                <td>-3</td>
            </tr>
            <tr></tr>
            </tbody>
        </table>
    </div>
</div>
<?php include 'pie.php'; ?>

</body>

</html>