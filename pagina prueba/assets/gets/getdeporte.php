<?php
$deporte = $_POST['valor'];

session_start();

switch ($deporte) {
case 1:
$_SESSION['deporte'] = 1;
setcookie('deporte', $_SESSION['deporte']);
echo 'futbol';
break;
case 2:
$_SESSION['deporte'] = 2;
setcookie('deporte', $_SESSION['deporte']);
echo 'futbol sala';
break;
case 3:
$_SESSION['deporte'] = 3;
setcookie('deporte', $_SESSION['deporte']);
echo 'baloncesto';
break;
case 4:
$_SESSION['deporte'] = 4;
    setcookie('deporte', $_SESSION['deporte']);
echo 'balonmano';
break;
}