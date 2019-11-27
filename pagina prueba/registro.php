
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>registro</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles_registro.css">
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
    <?php include 'conexionusuarios.php'; ?>

    <form>
        <div class="container">
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group"><input class="form-control" type="text" id="usuario_registro" placeholder="Usuario"><input class="form-control" type="text" id="nombre_registro" placeholder="Apellidos"><input class="form-control" type="text" id="apellidos_registro"
                            placeholder="Usuario"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group"><input class="form-control" type="email" id="correo_registro" placeholder="Costraseña"><input class="form-control" type="password" id="costrasena_registro" placeholder="Repite Costraseña"><input class="form-control" type="password"
                            id="costrasena2_registro" placeholder="Repite Costraseña"></div>
                </div>
            </div>
        </div>
        <p><button class="btn btn-primary" id="enviar_registro" placeholder="Repite Costraseña">Button</button></p>
    </form>
   <?php include 'pie.php'; ?>
</body>

</html>
