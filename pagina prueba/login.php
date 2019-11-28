<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    <!-- Cabecera y pie-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Pretty-Header.css">
    <link rel="stylesheet" href="assets/css/styles_cabecera.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
        <link rel="stylesheet" href="assets/css/Navigation-with-Button_cabecera.css">

</head>

<body>

    <?php
    include 'cabecera.php';
    session_start();
    include 'conexionusuarios.php';
    ?>
    <?php
    $msg = "";
    if(isset($_POST['submitBtnLogin'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        if($username != "" && $password != "") {
            try {
                $query = "select usuario,id_usuario,contrasena from usuarios, contrasenas where usuario=:username and contrasena=:password";
                $stmt = $db->prepare($query);
                $stmt->bindParam('username', $username, PDO::PARAM_STR);
                $stmt->bindValue('password', $password, PDO::PARAM_STR);
                $stmt->execute();
                $count = $stmt->rowCount();
                $row   = $stmt->fetch(PDO::FETCH_ASSOC);
                if($count == 1 && !empty($row)) {
                    /******************** Your code ***********************/
                    $_SESSION['sess_user_id']   = $row['id_usuario'];
                    $_SESSION['sess_user_name'] = $row['usuario'];

                    header('Location: index.php');
                } else {
                    $msg = "Invalid username and password!";
                }
            } catch (PDOException $e) {
                echo "Error : ".$e->getMessage();
            }
        } else {
            $msg = "Both fields are required!";
        }
    }
    ?>
    <form method="post">
        <input class="form-control" type="text" name="username" id="username" value="" autocomplete="off" placeholder="Usuario" style="text-align: center;">

        <input class="form-control"type="password" name="password" id="password" placeholder="Costraseña" value="" autocomplete="off" style="text-align: center;">
        <p style="text-align: center;">"captcha"</p>
        <p style="text-align: center;"><input type="submit" name="submitBtnLogin" id="submitBtnLogin" value="Login" /></p> </form>
    <span  class="text-danger" ><?php echo @$msg;?></span>

    <?php include 'pie.php'; ?>
</body>

</html>

