<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Equipos</title>
    <?php include 'links.php';
    links("equipos");
    ?>


</head>

<body>
<?php
session_start();
if (!isset($_SESSION["conectado"])) {
    header("location:index.php");
} else {

    include 'cabecera.php';
    include 'conexionproyecto.php';


    function nombre_equipo($db, $id_equipo_consulta)
    {
        $consulta = "select nombre_eq from equipo where idequipo = " . $id_equipo_consulta;
        foreach ($db->query($consulta) as $fila) {
            $nombre = $fila['nombre_eq'];
        }
        return $nombre;

    }

    $lista = "";
    $consulta_equipos = "SELECT idequipo, nombre_eq,deporte_iddeporte from equipo;";
    foreach ($db->query($consulta_equipos) as $fila) {
        if ($fila{'deporte_iddeporte'} == $_SESSION['deporte']) {
            $idequipo = $fila['idequipo'];
            $nombre_eq = $fila['nombre_eq'];
            $lista .= "<li value=\"" . $idequipo . "\"><a href=?equipo=" . $idequipo . ">" . $nombre_eq . "</a></li>";
        }
    }

//--------------------------------------------------------------------------
    if (isset($_GET['equipo'])) {
        setcookie('equipo_select', $_GET['equipo']);
    }
    if (isset($_COOKIE['equipo_select'])) {
        $temporada = "";
        $consulta_jugadores = "SELECT idtemporada_temeq,ano_principio,ano_fin from temporada_equipo,temporada where idtemporada=idtemporada_temeq AND  idequipo_temeq=" . @$_COOKIE['equipo_select'];
        foreach ($db->query($consulta_jugadores) as $fila) {
            $idtemporada_temeq = $fila['idtemporada_temeq'];
            $ano_principio = $fila['ano_principio'];
            $ano_fin = $fila['ano_fin'];
            $temporada .= "<option value=\"" . $idtemporada_temeq . "\">" . $ano_principio . "-" . $ano_fin . "</option>";
        }
    }
    if (isset($_GET['temporada_select'])) {
        $jugadores = "";
        $equipo = (int)$_GET['temporada_select'];
        if ($equipo == 0) {
            $nombre_eq_l = "";
            $nombre_lig = "";
            $idestadio_temeq = "";
            $nombre_div = "";
            $ciudad_eq = "";
            $identrenador_temeq = "";
            $provincia_eq = "";
            $presidente_temeq = "";
            $idestadio_nombre = "";
            $identrenador_nombre = "";
        } else {
            $consulta_infoEquipo = "SELECT * from equipo,temporada_equipo,division,estadio,entrenadores, pais where idestadio_temeq = idestadio AND identrenador_temeq = identrenador AND idequipo = idequipo_temeq AND idpais=idpais_div and iddivision_temeq = iddivision  AND  idequipo=" . $equipo;
            foreach ($db->query($consulta_infoEquipo) as $fila) {
                $nombre_eq_l = $fila['nombre_eq'];
                $nombre_lig = $fila['nombre_pais'];
                $idestadio_temeq = $fila['idestadio_temeq'];
                $nombre_div = $fila['nombre_div'];
                $ciudad_eq = $fila['ciudad_eq'];
                $identrenador_temeq = $fila['identrenador_temeq'];
                $provincia_eq = $fila['ciudad_eq'];
                $presidente_temeq = $fila['presidente_temeq'];
                $idestadio_nombre = $fila['nombre_estadio'];
                $identrenador_nombre = $fila['nombre_ent'] . " " . $fila['apellidos_ent'];

            }
            $consulta_partidos = "select fecha_cal, local_cal, goleslocal_cal, golesvisitante_cal, visitante_cal from calendario where idtemporada_cal = " . $_GET['temporada_select'] . " and local_cal = " . $_COOKIE['equipo_select'] . " or visitante_cal = " . $_COOKIE['equipo_select'] . " order by fecha_cal desc";
            $listado = "";
            foreach ($db->query($consulta_partidos) as $fila) {
                $fecha = date("d/m/Y", strtotime($fila['fecha_cal']));
                $listado .= "<tr><td>" . $fecha . "</td><td>" . nombre_equipo($db, $fila['local_cal']) . "</td><td>" . $fila['goleslocal_cal'] . "</td><td>" . $fila['golesvisitante_cal'] . "</td><td>" . nombre_equipo($db, $fila['visitante_cal']) . "</td></tr>";
            }

        }
    } else {
        $nombre_eq = "";
        $Nombre_lig = "";
        $idestadio_temeq = "";
        $nombre_div = "";
        $ciudad_eq = "";
        $identrenador_temeq = "";
        $provincia_eq = "";
        $presidente_temeq = "";
        $idestadio_nombre = "";
        $identrenador_nombre = "";
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
                <form>
                    <select name="temporada_select" id="temporada_select">
                        <optgroup label="Recuerde seleccionar un equipo">
                            <option value="0" selected="">Seleccione una temporada</option>
                            <?php echo $temporada ?>
                        </optgroup>
                    </select>
                    <button type="submit">Seleccionar Temporada</button>
                </form>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>País</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?php echo @$nombre_eq_l ?></td>
                            <td><?php echo @$nombre_lig ?></td>
                        </tr>
                        <thead>
                        <tr>
                            <th>Estadio</th>
                            <th>División</th>
                        </tr>
                        </thead>
                        <tr>
                            <td><?php echo @$idestadio_nombre ?></td>
                            <td><?php echo @$nombre_div?></td>
                        </tr>
                        <thead>
                        <tr>
                            <th>Ciudad</th>
                            <th>Entrenador</th>
                        </tr>
                        </thead>
                        <tr>
                            <td><?php echo @$ciudad_eq ?></td>
                            <td><?php echo @$identrenador_nombre ?></td>
                        </tr>
                        <thead>
                        <tr>
                            <th>Provincia</th>
                            <th>Presidente</th>
                        </tr>
                        </thead>
                        <tr>
                            <td><?php echo @$provincia_eq ?></td>
                            <td><?php echo @$presidente_temeq ?></td>
                        </tr>

                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Local</th>
                            <th>Goles Local</th>
                            <th>Goles Visitante</th>
                            <th>Visitante</th>
                        </tr>
                        </thead>
                        <tr>
                            <td><?php echo @$listado ?></td>
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