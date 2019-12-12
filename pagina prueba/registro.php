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
    <?php include 'cabecera.php'; ?>

    <?php

    include 'conexionusuarios.php';
    $msg = "";
    if (isset($_POST['enviar_registro'])) {
        $usuario_registro = trim($_POST['usuario_registro']);
        $nombre_registro = trim($_POST['nombre_registro']);
        $apellidos_registro = trim($_POST['apellidos_registro']);
        $correo_registro = trim($_POST['correo_registro']);
        $contrasena_registro = trim($_POST['contrasena_registro']);
        $contrasena_registro2 = trim($_POST['contrasena_registro2']);
        if (strlen($contrasena_registro) < 6) {
            $msg = "La costraseña tiene que tener minimo 6 carapteres";
        } else if ($contrasena_registro != $contrasena_registro2) {
            $msg = "Las costraseñas tiene que ser iguales";

        } else {
            $hora = date("Y-m-d H:i:s");
           $contraseña =  password_hash( $contrasena_registro, PASSWORD_DEFAULT);

            $sql1 = $db->prepare("INSERT INTO contrasenas(contrasena,fecha_modificacion) VALUES (:contrasena_registro,' $hora ');");
            $sql1->bindParam('contrasena_registro', $contraseña, PDO::PARAM_STR);
            $sql1->execute();
            $contra = "Select id_contrasena from contrasenas where contrasena = \"$contraseña\" AND  fecha_modificacion = \"$hora\";";
            $idcontra = 0;
            foreach ($db->query($contra) as $fila) {
                $idcontra = $fila['id_contrasena'];

            }
            $sql2 = $db->prepare("INSERT INTO usuarios(usuario,nombre_usu,apellido_usu,email,id_contrasena_usu) VALUES (:usuario_registro,:nombre_registro,:apellidos_registro,:correo_registro,$idcontra);");
            $sql2->bindParam('usuario_registro', $usuario_registro, PDO::PARAM_STR);
            $sql2->bindParam('nombre_registro', $nombre_registro, PDO::PARAM_STR);
            $sql2->bindParam('apellidos_registro', $apellidos_registro, PDO::PARAM_STR);
            $sql2->bindParam('correo_registro', $correo_registro, PDO::PARAM_STR);
            $sql2->execute();

        }
    }
    ?>
</head>

<body>


<form method="post" name="registro">
    <div class="container">
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" type="text" id="usuario_registro" name="usuario_registro"
                           placeholder="Usuario" required>
                    <input class="form-control" type="text" id="nombre_registro" name="nombre_registro"
                           placeholder="Nombre" required>
                    <input class="form-control" type="text" id="apellidos_registro" name="apellidos_registro"
                           placeholder="Apellidos">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" type="email" id="correo_registro" name="correo_registro"
                           placeholder="Correo electronico" required>
                    <input class="form-control" type="password" id="contrasena_registro" name="contrasena_registro"
                           placeholder="Contraseña" required>
                    <input class="form-control" type="password" id="contrasena_registro2" name="contrasena_registro2"
                           placeholder="Repite Contraseña" required>
                </div>
            </div>
        </div>
    </div>

    <p style="text-align: center;"><input type="submit" name="enviar_registro" id="enviar_registro" value="Login"/></p>
</form>

<span class="text-danger"><?php echo @$msg ?></span>

<?php include 'pie.php'; ?>
</body>

</html>