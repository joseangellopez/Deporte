<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Principal</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <?php include 'links.php';
    links("index");
    ?>

</head>

<body>
    <?php
    session_start();
    include 'cabecera.php'; ?>

    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <p><img id="imagenesindex" src="assets/img/multisdeportes.jpg" ></p>
                </div>
                <div class="col-md-9">
                    <h1>Pagina WEB con las estadisticas de varios deportes y sus respetivos equipos</h1>
                    <p>En esta pagina puedes conocer de manera intuitiva y facil la informacion de tu equipo favorito de los multimples deportes:<b> Futbol, Futbol Sala, Balocesto y Balonmano</b></p>
                    <p>Puedes ver de cada temporada que quieras donde ha estado cada jugador y los equipos </p>
                    <p><b>Inicia Sesion</b> o <b>Registrate</b> para poder ver la información de la página</p>

                </div>
            </div>
        </div>
    </div>
               <?php include 'pie.php'; ?>

</body>

</html>
