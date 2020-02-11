<?php
session_start();
require ('../../conexionproyecto.php');
error_reporting(E_ERROR);
$id_equipo = $_POST['equipo_select'];

$consultatemporada = 'SELECT idtemporada_temeq,ano_principio,ano_fin from temporada_equipo,temporada where idtemporada=idtemporada_temeq AND  idequipo_temeq=' . @$_COOKIE["equipo_select"];
    $temporada="[";
foreach ($db->query($consulta_equipos) as $row) {
    $temporada.= "{\"value\":".$row['idtemporada'].",\"label\":\"".$row['ano_principio']."-".$row['ano_fin']."\"},";
}
$temporada.=  "]";
$temporada=str_replace(",]","]", $temporada);
echo $html;
?>