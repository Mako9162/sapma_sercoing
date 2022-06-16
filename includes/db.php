<?php

Shell_exec("ssh -f -L 3307:localhost:3306 marco@192.168.1.101 -i /home/netveloper/.ssh/id_rsa");

$conexion = mysqli_connect("localhost", "sapmatareas", "1Q2w3e4r.", "tareas", 3307);

if ($conexion-> connect_error) {
    die("La conexión falló: " . $conexion -> connect_error);
}

// $sql = "SELECT * FROM personas";

// $resultado = $conexion ->query($sql);

// print_r($resultado);

?>






