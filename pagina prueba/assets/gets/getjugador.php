<?php
require('../../conexionproyecto.php');
error_reporting(E_ERROR);
$id_equip = $_GET['id_equip'];
$query = "SELECT idjugador, alias_jug from jugador,jugador_equipo_temporada  where idequipo_jet=" . $id_equip . " and Jugador_idjugador=idjugador";
$html = "[";
foreach ($db->query($query) as $row) {
    $html .= "{\"value\":" . $row['idjugador'] . ",\"label\":\"" . $row['alias_jug'] . "\"},";
}
$html .= "]";
$html = str_replace(",]", "]", $html);
echo $html;
