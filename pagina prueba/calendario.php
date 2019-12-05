<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>calendario</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles_calendario.css">
     <!-- Cabecera y pie-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Pretty-Header.css">
    <link rel="stylesheet" href="assets/css/styles_cabecera.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
     <link rel="stylesheet" href="assets/css/Navigation-with-Button_cabecera.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php include 'conexionproyecto.php';
    $consulta="SELECT jornada_cal, fecha_cal,local_cal,goleslocal_cal,visitante_cal,golesvisitante_cal,idestadio_cal FROM calendario order by jornada_cal";

    ?>


</head>

<body>
                <?php include 'cabecera.php'; ?>

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

            function localVisitante_estadio($db , $equipo_estadio,$equipooestadio){
                $hola = "";
                if ($equipooestadio == 1){
                    $estadioC = "Select nombre_estadio from estadio where idestadio=".$equipo_estadio.";";
                    foreach ($db->query($estadioC) as $fila) {
                        $hola = $fila['nombre_estadio'];

                    }
                }else if ($equipooestadio == 2) {
                    $localvisitanteC = "Select nombre_eq from equipo where idequipo=" . $equipo_estadio . ";";
                    foreach ($db->query($localvisitanteC) as $fila) {
                        $hola = $fila['nombre_eq'];

                    }
                }
                return $hola;
            }
            // Se crea un bucle que se repetirá tantas veces como filas tenga la consulta.
            foreach ($db->query($consulta) as $fila) {
                $Jornada = $fila['jornada_cal'];
                $Fecha = $fila['fecha_cal'];
                $Fechaespañola = date("d/m/Y", strtotime($Fecha));
                $Local = $fila['local_cal'];
                $GolesL = $fila['goleslocal_cal'];
                $GolesV = $fila['golesvisitante_cal'];
                $Visitante = $fila['visitante_cal'];
                $Estadio = $fila['idestadio_cal'];
                $consultaLocal = localVisitante_estadio($db, $Local,2);
                $consultaVistante = localVisitante_estadio($db,$Visitante,2);
                $consultaEstadio = localVisitante_estadio($db,$Estadio,1);
                ?>
                <!-- Se crea una fila de la tabla con los datos obtenidos -->
                <tr><td><?php echo ($Jornada); ?></td>
                    <td><?php echo ($Fechaespañola); ?></td>
                    <td><?php echo ($consultaLocal); ?></td>
                    <td><?php echo ($GolesL); ?></td>
                    <td><?php echo ("<i class=\"fa fa-handshake-o\"></i>"); ?></td>
                    <td><?php echo ($GolesV); ?></td>
                    <td><?php echo ($consultaVistante); ?></td>
                    <td><?php echo ($consultaEstadio); ?></td>

                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>


           <?php include 'pie.php'; ?>

</body>

</html>



