<?php
$conexion = new mysqli("localhost", "usuario", "clave", "basedatos");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$nombre = isset($_POST['nombre']) ? $conexion->real_escape_string($_POST['nombre']) : '';
$correo = isset($_POST['correo']) ? $conexion->real_escape_string($_POST['correo']) : '';

if ($nombre && $correo) {
    $sql = "INSERT INTO registro (nombre, correo) VALUES ('$nombre', '$correo')";
    if ($conexion->query($sql) === TRUE) {
        echo "✅ Registro exitoso.";
    } else {
        echo "❌ Error al registrar: " . $conexion->error;
    }
} else {
    echo "⚠️ Faltan datos.";
}

$conexion->close();
?>