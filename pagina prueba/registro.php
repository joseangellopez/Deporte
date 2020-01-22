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
        $fecha_nac = $_POST['fecha_nac_registro'];
        $fecha_nac = dateformat($fecha_nac);
        $numero_telf = trim($_POST['num_telef_registro']);
        if (!isset($_POST['futbol_registro'])) {
            $futbol_select = 0;
        } else {
            $futbol_select = 1;
        }
        if (!isset($_POST['futbol_sala_registro'])) {
            $futbol_sala_select = 0;
        } else {
            $futbol_sala_select = 1;
        }
        if (!isset($_POST['baloncesto_registro'])) {
            $baloncesto_select = 0;
        } else {
            $baloncesto_select = 1;
        }
        if (!isset($_POST['balonmano_registro'])) {
            $balonmano_select = 0;
        } else {
            $balonmano_select = 1;
        }


        if (strlen($contrasena_registro) < 6) {
            $msg = "La costraseña tiene que tener minimo 6 carapteres";
        } else if ($contrasena_registro != $contrasena_registro2) {
            $msg = "Las costraseñas tiene que ser iguales";
        } else {
            $hora = date("Y-m-d H:i:s");
            $contraseña = password_hash($contrasena_registro, PASSWORD_DEFAULT);
            $sql_contrasena = $db2->prepare("INSERT INTO contrasenas(contrasena,fecha_modificacion) VALUES (:contrasena_registro,' $hora ');");
            $sql_contrasena->bindParam('contrasena_registro', $contraseña, PDO::PARAM_STR);
            $sql_contrasena->execute();
            $consulta_contraseña = "Select id_contrasena from contrasenas where contrasena = \"$contraseña\" AND  fecha_modificacion = \"$hora\";";
            $idcontra = 0;
            foreach ($db2->query($consulta_contraseña) as $fila) {
                $idcontra = $fila['id_contrasena'];
            }
            $sql_usuario = $db2->prepare("INSERT INTO usuarios(usuario,nombre_usu,apellido_usu,fecha_nac_usu, n_telefono_usu, email,id_contrasena_usu) VALUES (:usuario_registro,:nombre_registro,:apellidos_registro, :fecha_nac , :numero_telf , :correo_registro,  $idcontra);");
            $sql_usuario->bindParam('usuario_registro', $usuario_registro, PDO::PARAM_STR);
            $sql_usuario->bindParam('nombre_registro', $nombre_registro, PDO::PARAM_STR);
            $sql_usuario->bindParam('apellidos_registro', $apellidos_registro, PDO::PARAM_STR);
            $sql_usuario->bindParam('fecha_nac', $fecha_nac, PDO::PARAM_STR);
            $sql_usuario->bindParam('numero_telf', $numero_telf, PDO::PARAM_STR);
            $sql_usuario->bindParam('correo_registro', $correo_registro, PDO::PARAM_STR);
            $sql_usuario->execute();

            $query = "select usuario,id_usuario from usuarios where usuario=:username";
            $stmt = $db2->prepare($query);
            $stmt->bindParam('username', $usuario_registro, PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->rowCount();
            $row   = $stmt->fetch(PDO::FETCH_ASSOC);
            $usuario = $row['id_usuario'];

            $sql2 = $db2->prepare("INSERT INTO deportes_sel(id_usuario_dep, futbol_dep, baloncesto_dep, futbol_sala, balonmano_dep) VALUES (:usuario,:futbol, :baloncesto, :futbol_sala, :balonmano);");
            $sql2->bindParam('usuario', $usuario, PDO::PARAM_STR);
            $sql2->bindParam('futbol', $futbol_select, PDO::PARAM_STR);
            $sql2->bindParam('baloncesto', $baloncesto_select, PDO::PARAM_STR);
            $sql2->bindParam('futbol_sala', $futbol_select, PDO::PARAM_STR);
            $sql2->bindParam('balonmano', $balonmano_select, PDO::PARAM_STR);
            $sql2->execute();
        }
    }

    function dateformat($fecha)
    {
        $fecha = strtotime($fecha);
        return date(date('Y', $fecha) . "-" . date('m', $fecha) . "-" . date('d', $fecha));
    }

    ?>
</head>

<body>


<form method="post" name="registro">
    <div class="container">
        <div class="form-row">
            <div class="col-md-5">
                <div class="form-group">
                    <input class="form-control" type="text" id="usuario_registro" name="usuario_registro"
                           placeholder="Usuario" required>
                    <input class="form-control" type="text" id="nombre_registro" name="nombre_registro"
                           placeholder="Nombre" required>
                    <input class="form-control" type="text" id="apellidos_registro" name="apellidos_registro"
                           placeholder="Apellidos" required>
                    <input class="form-control" type="date" id="fecha_nac_registro" name="fecha_nac_registro"
                           placeholder="Fecha Nacimiento">
                    <input class="form-control" type="number" id="num_telef_registro" name="num_telef_registro"
                           placeholder="Numero de telefono">
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" type="email" id="correo_registro" name="correo_registro"
                           placeholder="Correo electronico" required>
                    <input class="form-control" type="password" id="contrasena_registro" name="contrasena_registro"
                           placeholder="Contraseña" required>
                    <input class="form-control" type="password" id="contrasena_registro2" name="contrasena_registro2"
                           placeholder="Repite Contraseña" required>
                    <div class="checkbox">
                        <label class="checkbox-inline"><input type="checkbox" id="futbol_registro"
                                                              name="futbol_registro"
                                                              value="">&nbsp; Fútbol &nbsp;</label>
                        <label class="checkbox-inline"><input type="checkbox" id="futbol_sala_registro"
                                                              name="futbol_sala_registro"
                                                              value="">&nbsp; Fútbol Sala &nbsp;</label>
                    </div>
                    <div class="checkbox">
                        <label class="checkbox-inline"><input type="checkbox" id="baloncesto_registro"
                                                              name="baloncesto_registro"
                                                              value="">&nbsp; Baloncesto &nbsp;</label>
                        <label class="checkbox-inline"><input type="checkbox" id="balonmano_registro"
                                                              name="balonmano_registro"
                                                              value="">&nbsp; Balonmano &nbsp;</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-11"><p class="boton"><input type="submit" name="enviar_registro" id="enviar_registro"
                                                   value="Login"/></p></div>
</form>

<span class="text-danger"><?php echo @$msg ?></span>

<?php include 'pie.php'; ?>
</body>

</html>