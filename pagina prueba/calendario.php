<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Calendario</title>
    <?php include 'links.php';
    links("calendario");
    include 'conexionproyecto.php';
    $consulta_calendario="SELECT jornada_cal, fecha_cal,local_cal,goleslocal_cal,visitante_cal,golesvisitante_cal,idestadio_cal FROM calendario order by jornada_cal";
    ?>
</head>

<body>
                <?php
                session_start();
                if (!isset($_SESSION["conectado"])) {
                    header("location:index.php");
                } else {
                include 'cabecera.php'; ?>

                <div class="table-responsive" id="calendario">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Jornada</th>
                            <th>Fecha</th>
                            <th>Local</th>
                            <th>Goles</th>
                            <th>VS</th>
                            <th>Goles</th>
                            <th>Vistante</th>
                            <th>Estadio</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        function localVisitante_estadio($db, $equipo_estadio, $equipooestadio)
                        {
                            $localVisitante_estadio = "";
                            if ($equipooestadio == 1) {
                                $estadioC = "Select nombre_estadio from estadio where idestadio=" . $equipo_estadio;
                                foreach ($db->query($estadioC) as $fila) {
                                    $localVisitante_estadio = $fila['nombre_estadio'];

                                }
                            } else if ($equipooestadio == 2) {
                                $localvisitanteC = "Select nombre_eq from equipo where idequipo=" . $equipo_estadio;
                                foreach ($db->query($localvisitanteC) as $fila) {
                                    $localVisitante_estadio = $fila['nombre_eq'];

                                }
                            }
                            return $localVisitante_estadio;
                        }

                        function consultarDeporte($db, $id_equipo)
                        {
                            $consulta_equipo = "select deporte_iddeporte from equipo where idequipo = " . $id_equipo;
                            foreach ($db->query($consulta_equipo) as $fila) {
                                $deporte = $fila['deporte_iddeporte'];
                            }
                            return $deporte;
                        }

                        foreach ($db->query($consulta_calendario) as $fila) {
                            if (consultarDeporte($db, $fila{'local_cal'}) == @$_SESSION['deporte'] && consultarDeporte($db, $fila{'visitante_cal'}) == @$_SESSION['deporte']) {
                                $Jornada = $fila['jornada_cal'];
                                $Fecha = $fila['fecha_cal'];
                                $Fechaespañola = date("d/m/Y", strtotime($Fecha));
                                $Local = $fila['local_cal'];
                                $GolesL = $fila['goleslocal_cal'];
                                $GolesV = $fila['golesvisitante_cal'];
                                $Visitante = $fila['visitante_cal'];
                                $Estadio = $fila['idestadio_cal'];
                                $consultaLocal = localVisitante_estadio($db, $Local, 2);
                                $consultaVistante = localVisitante_estadio($db, $Visitante, 2);
                                $consultaEstadio = localVisitante_estadio($db, $Estadio, 1);
                                ?>
                                <tr>
                                    <td><?php echo($Jornada); ?></td>
                                    <td><?php echo($Fechaespañola); ?></td>
                                    <td><?php echo($consultaLocal); ?></td>
                                    <td><?php echo($GolesL); ?></td>
                                    <td><?php echo("<i class=\"fa fa-handshake-o\"></i>"); ?></td>
                                    <td><?php echo($GolesV); ?></td>
                                    <td><?php echo($consultaVistante); ?></td>
                                    <td><?php echo($consultaEstadio); ?></td>

                                </tr>
                                <?php
                            }
                        }
                        }
            ?>
            </tbody>
        </table>
    </div>


           <?php include 'pie.php'; ?>

</body>

</html>



