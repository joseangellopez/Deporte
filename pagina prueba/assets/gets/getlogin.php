<?php
session_start();
include "../../conexionusuarios.php";
if (isset($_POST["username"])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    try {
        $query = "select usuario,id_usuario,contrasena from usuarios, contrasenas where usuario=:username and id_contrasena_usu = id_contrasena";
        $stmt = $db2->prepare($query);
        $stmt->bindParam('username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($count == 1 && !empty($row) && password_verify($password, $row['contrasena'])) {

            $_SESSION['sess_user_id'] = $row['id_usuario'];
            $_SESSION['sess_user_name'] = $row['usuario'];
            $_SESSION['conectado'] = true;
            setcookie("usuario", $row['id_usuario']);
            echo "OK";
        } else {
            echo 'No';
        }
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
    }
}
/* else{
    echo "error";
}

if (isset($_POST["action"])) {
    unset($_SESSION["username"]);
}*/
?>