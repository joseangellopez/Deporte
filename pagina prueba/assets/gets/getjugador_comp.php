<?php

require ('../../conexionproyecto.php');
error_reporting(E_ERROR);
$id_jug = $_GET['id_jug'];

$query = "SELECT nombre_jug, apellido_jug, alias_jug, fechanac_jug, nacionalidad_jug, numero_jug_jet, nombre_eq, nombre_pos, Nombre_lig
    from jugador , jugador_equipo_temporada, equipo, posicion, temporada_equipo, division, liga  
    where Jugador_idjugador=" . $id_jug . " and idjugador = " . $id_jug . " and idequipo_jet= idequipo
    and idposicion_jet = idposicion and idequipo_temeq = idequipo and division_temeq = iddivision and liga_idliga = idliga" ;
$html = "[";
foreach ($db->query($query) as $row) {
    $html .= "{\"nombre\":" . $row['nombre_jug'] .
        ",\"apellido\":\"" . $row['apellido_jug'] .
        ",\"alias\":\"" . $row['alias_jug'] .
        ",\"fecha_nac\":\"" . $row['fechanac_jug'] .
        ",\"nacionalidad\":\"" . $row['nacionalidad_jug'] .
        ",\"numero_jug\":\"" . $row['numero_jug_jet'] .
        ",\"nombre_eq\":\"" . $row['nombre_eq'] .
        ",\"nombre_pos\":\"" . $row['nombre_pos'] .
        ",\"nombre_lig\":\"" . $row['Nombre_lig'] .
        "\"},";
}
$html .= "]";
$html = str_replace(",]", "]", $html);
echo $html;
