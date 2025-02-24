<?php
$conexion = new mysqli("sql101.byetcluster.com", "root", "", "if0_38382871_Saki_bd");
    die("Error de conexión: " . $conexion->connect_error);
}

$id = $conexion->real_escape_string($_GET['id']);
$query = "SELECT * FROM Lista WHERE ID='$id'";
$result = $conexion->query($query);

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    echo json_encode($usuario);
} else {
    echo json_encode(null);
}

$conexion->close();
?>