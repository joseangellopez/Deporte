<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>clasificacion</title>

    <?php include "links.php";
    links("clasificacion");
    ?>

</head>

<body>
<?php include 'cabecera.php'; ?>
<?php include 'conexionproyecto.php'; ?>
<?php
$lista = "";
$consulta_equipos = "SELECT idequipo, nombre_eq from equipo where deporte_iddeporte= 1;";
$n = 1;
foreach ($db->query($consulta_equipos) as $fila) {
    $idequipo = $fila['idequipo'];
    $nombre_eq = $fila['nombre_eq'];
    $lista .= "<tr><td>" . $n . "</td><td></img class=\"escudo\"> " . $nombre_eq . "</td>" . calcular_puntos($db, $idequipo) . "</tr>";
}

function calcular_puntos($db, $idequipo)
{
    $contador = 0;
    $goles_favor = 0;
    $goles_contra = 0;
    $puntos = 0;
    $jugados = 0;
    $ganados = 0;
    $empates = 0;
    $perdidos = 0;
    $partidos = "";
    $consulta_puntos = "SELECT local_cal, visitante_cal, goleslocal_cal, golesvisitante_cal, idtemporada_cal from calendario where idtemporada_cal = 1 and local_cal = " . $idequipo . " or visitante_cal = " . $idequipo;
    foreach ($db->query($consulta_puntos) as $fila) {
        $local_cal = $fila['local_cal'];
        $visitante_cal = $fila['visitante_cal'];
        if ($fila['goleslocal_cal'] !== null) {
            $goleslocal_cal = $fila['goleslocal_cal'];
            $golesvisitante_cal = $fila['golesvisitante_cal'];
            $jugados += 1;

        }

        if ($local_cal == $idequipo) {
            $goles_favor += $goleslocal_cal;
            $goles_contra += $golesvisitante_cal;

        } else {
            $goles_favor += $golesvisitante_cal;
            $goles_contra += $goleslocal_cal;

        }

        if ($local_cal == $idequipo && $goleslocal_cal > $golesvisitante_cal || $visitante_cal == $idequipo && $golesvisitante_cal > $goleslocal_cal) {
            $puntos += 3;
            if ($contador < 5) {
                $partidos .= "<i style=\"font-size:24px\" class=\"fa\">&#xf058;</i>";
                $contador += 1;
                $ganados += 1;
            }
        } else if ($goleslocal_cal == $golesvisitante_cal) {
            $puntos += 1;
            $empates += 1;
            if ($contador < 5) {
                $partidos .= "<i style=\"font-size:24px\" class=\"fa\">&#xf056;</i>";
                $contador += 1;
            }
        } else {
            if ($contador < 5) {
                $partidos .= "<i style=\"font-size:24px\" class=\"fa\">&#xf00d;</i>";
                $contador += 1;
                $perdidos += 1;
            }
        }

    }
    if ($jugados == 0){
        return "<td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>";

    }
        return "<td>$puntos</td><td>$jugados</td><td>$ganados</td><td>$empates</td><td>$perdidos</td><td>" . @$goles_favor . "</td><td>" . @$goles_contra . "</td><td>" . (int)(@$goles_favor - @$goles_contra) . "</td><td>" . $partidos . "</td>";

}


?>
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>Posición</th>
            <th>Equipo</th>
            <th>Puntos</th>
            <th>Jugados</th>
            <th>Ganados</th>
            <th>Empatados</th>
            <th>Perdidos</th>
            <th>GF</th>
            <th>GC</th>
            <th>Diferencia de goles</th>
            <th>Ultimos 5 partidos</th>
        </tr>
        </thead>
        <tbody>
        <?php echo $lista ?>
        </tbody>
    </table>
</div>
<?php include 'pie.php'; ?>

</body>

</html>