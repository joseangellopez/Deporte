<?php
require ('../../conexionproyecto.php');
error_reporting(E_ERROR);
$id_dep = $_GET['id_dep'];
$query = "SELECT idequipo, nombre_eq FROM equipo where deporte_iddeporte=".$id_dep;
$html="[";
foreach ($db->query($query) as $row)
{
    $html.= "{\"value\":".$row['idequipo'].",\"label\":\"".$row['nombre_eq']."\"},";
}
$html.=  "]";
$html=str_replace(",]","]", $html);
echo $html;
