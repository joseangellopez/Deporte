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
    <link rel="stylesheet" href="assets/css/Navigation-with-Button_cabecera.css">
    <script type="text/javascript" src="assets/js/registro.js"></script>
    <?php include 'cabecera.php';?>

    <?php
    session_start();
    include 'conexionusuarios.php';
    $msg = "";
    if (isset($_POST['enviar_registro'])) {
    $usuario_registro = trim($_POST['usuario_registro']);
    $nombre_registro= trim($_POST['nombre_registro']);
    $apellidos_registro= trim($_POST['apellidos_registro']);
    $correo_registro= trim($_POST['correo_registro']);
    $contrasena_registro= trim($_POST['contrasena_registro']);
    $contrasena_registro2= trim($_POST['contrasena_registro2']);
       $hora = getdate();
        $sql1 = $db->prepare("INSERT INTO contrasenas(contrasena,fecha_modificacion) VALUES (:contrasena_registro, :hora)");
        $sql1->bindParam('contrasena_registro', $contrasena_registro, PDO::PARAM_STR);

        $sql1->execute();

        //$sql2 = $db->prepare("INSERT INTO registro(codigo, nombre, a_materno, a_paterno) VALUES (:codigo, :nombre, :a_materno, :a_paterno)");


/*
    $sql = $db->prepare("INSERT INTO registro(codigo, nombre, a_materno, a_paterno) VALUES (:codigo, :nombre, :a_materno, :a_paterno)");
    $sql2 = $db->prepare("INSERT INTO registro(codigo, nombre, a_materno, a_paterno) VALUES (:codigo, :nombre, :a_materno, :a_paterno)");

    $sql->bindParam('username', $username, PDO::PARAM_STR);
    $sql->bindValue('password', $password, PDO::PARAM_STR);
    $sql->execute();

*/}
    ?>
</head>

<body>


<form method="post" name="registro">
    <div class="container">
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" type="text" id="usuario_registro" name="usuario_registro" placeholder="Usuario">
                    <input class="form-control" type="text" id="nombre_registro" name="nombre_registro" placeholder="Nombre">
                    <input class="form-control" type="text" id="apellidos_registro" name="apellidos_registro" placeholder="Apellidos">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" type="email" id="correo_registro" name="correo_registro" placeholder="Correo electronico">
                    <input class="form-control" type="password" id="contrasena_registro" name="contrasena_registro" placeholder="Contraseña">
                    <input class="form-control" type="password" id="contrasena2_registro2" name="contrasena_registro2" placeholder="Repite Contraseña">
                </div>
            </div>
        </div>
    </div>

    <p style="text-align: center;"><input type="submit" name="enviar_registro" id="enviar_registro" value="Login" onclick="combrobar()"/></p> </form>

<span  class="text-danger" ><?php echo @$msg;?></span>
</form>
<?php include 'pie.php'; ?>
</body>

</html>