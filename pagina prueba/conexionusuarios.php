<?php

try {
      $user = "root";  // usuario con el que se va conectar con MySQL
      $pass = "";  // contraseña del usuario 
      $dbname = "usuarios";  //nombre de la base de datos
      $db2 = new PDO("mysql:host=localhost; dbname=$dbname", $user, $pass);  //conectar con MySQL y SELECCIONAR LA BBDD
    $db2->exec("set names utf8");
    $db2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db2->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $e) {  // Si hubieran errores de conexión, se captura un objeto de tipo PDOException
        print "<p>Error: NO SE PUDO CONECTAR AL SERVIDOR MySQL o a la BASE DE DATOS.</p>\n";
        print "<p>Error: " . $e->getMessage() . "</p>\n";  // mensaje de excepción
        exit();
    }
?>
