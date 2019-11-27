<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles_login.css">
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
    <form><input class="form-control" type="email" placeholder="Email" style="text-align: center;"><input class="form-control" type="password" placeholder="Costraseña" style="text-align: center;">
        <p style="text-align: center;">"captcha"</p>
        <p style="text-align: center;"><button class="btn btn-primary" type="submit">Enviar</button></p>
    </form>
   
    <?php include 'pie.php'; ?>
</body>

</html>

