<!-- Modal body -->
<div class="modal-body">
    <?php
    session_start();

    include 'conexionusuarios.php';
    $msg = "";
    if (isset($_POST['submitBtnLogin'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        if ($username != "" && $password != "") {
            try {
                $query = "select usuario,id_usuario,contrasena from usuarios, contrasenas where usuario=:username and id_contrasena_usu = id_contrasena";
                $stmt = $db2->prepare($query);
                $stmt->bindParam('username', $username, PDO::PARAM_STR);
                $stmt->execute();
                $count = $stmt->rowCount();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($count == 1 && !empty($row) && password_verify($password, $row['contrasena'])) {

                    $_SESSION['sess_user_id'] = $row['id_usuario'];
                    setcookie('id_usuario', $row["id_usuario"]);
                    $_SESSION['sess_user_name'] = $row['usuario'];
                    $_SESSION['conectado'] = true;
                    header('Location: index.php');
                } else {
                    $msg = "Usuario o contraseña incorrectos";
                }

            } catch (PDOException $e) {
                echo "Error : " . $e->getMessage();
            }
        } else {
            $msg = "Rellene el usuario y la contraseña";
        }
    }
    ?>
    <form method="post">
        <input class="form-control" type="text" name="username" id="username" value="" autocomplete="off"
               placeholder="Usuario">

        <input class="form-control" type="password" name="password" id="password" placeholder="Costraseña" value=""
               autocomplete="off">
        <p style="text-align: center;"><input type="submit" name="submitBtnLogin" id="submitBtnLogin" value="Login"/>
        </p>
    </form>
    <span class="text-danger"><?php echo @$msg; ?></span>
</div>
