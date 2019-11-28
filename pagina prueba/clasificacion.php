<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>clasificacion</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles_clasificacion.css">
     <!-- Cabecera y pie-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Pretty-Header.css">
    <link rel="stylesheet" href="assets/css/styles_cabecera.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/Navigation-with-Button_cabecera.css">

</head>

<body>
            <?php include 'cabecera.php'; ?>
    <?php include 'conexionproyecto.php'; ?>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Posición</th>
                    <th>Escudo</th>
                    <th>Equipo</th>
                    <th>Puntos</th>
                    <th>Goles a favor</th>
                    <th>Goles en contra</th>
                    <th>Diferencia de goles</th>
                    <th>Ultimos 5 partidos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><img src="assets/img/descarga.png"></td>
                    <td>Villanueva del arzobispo</td>
                    <td>150</td>
                    <td>589</td>
                    <td>1</td>
                    <td>588</td>
                   
                </tr>
            </tbody>
        </table>
    </div>
       <?php include 'pie.php'; ?>

</body>

</html>