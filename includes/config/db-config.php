<?php
function conectarBaseDeDatos()
{
    $servername = "localhost:3308"; // Ojo caso particular de lucas puerto 3308
    $username = "root";
    $password = "";
    $dbname = "bd_stock";

    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Crear la base si no existe
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql) !== TRUE) {
        die("Error al crear la base de datos: " . $conn->error);
    }

    // Selecciona base de datos
    $conn->select_db($dbname);

    // Crear la tabla "productos" si no existe
    $sql = "CREATE TABLE IF NOT EXISTS productos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30),
        sn VARCHAR(30),
        cant INT
    )";
    if ($conn->query($sql) !== TRUE) {
        die("Error al crear la tabla 'productos': " . $conn->error);
    }

    // Crear la tabla "mod_stock" si no existe
    $sql = "CREATE TABLE IF NOT EXISTS mod_stock (
        id INT AUTO_INCREMENT PRIMARY KEY,
        id_old INT,
        name_old VARCHAR(30),
        sn_old VARCHAR(30),
        cant_old INT,
        id_new INT,
        name_new VARCHAR(30),
        sn_new VARCHAR(30),
        cant_new INT,
        fecha DATE,
        motivo VARCHAR(30)
    )";
    if ($conn->query($sql) !== TRUE) {
        die("Error al crear la tabla 'mod_stock': " . $conn->error);
    }


    //Crear la tabla contacto si no existe 
    $sql = "CREATE TABLE IF NOT EXISTS contacto (
        id int AUTO_INCREMENT primary key,
        nombre VARCHAR(30),
        email varchar(30),
        telefono int,
        mensaje varchar(50)
        )";
    if ($conn->query($sql) !== TRUE) {
        die("Error al crear la tabla 'contacto' : " . $conn->error);
    }


    //Adaptar a las tablas necesarias para cada parte de la página
    /* 
      $sql = "CREATE TABLE IF NOT EXISTS mod_stock (
        id INT AUTO_INCREMENT PRIMARY KEY,
        id_old INT,
        name_old VARCHAR(30),
        sn_old VARCHAR(30),
        cant_old INT,
        id_new INT,
        name_new VARCHAR(30),
        sn_new VARCHAR(30),
        cant_new INT,
        fecha DATE,
        motivo VARCHAR(30)
    )";
    if ($conn->query($sql) !== TRUE) {
        die("Error al crear la tabla 'mod_stock': " . $conn->error);
    }*/

    // Devolver la conexión
    return $conn;
}

// Llamar a la función para obtener la conexión a la base de datos
$conexion = conectarBaseDeDatos();

?>