<?php
include("conexion.php");

//Limpiar los texto ANTI SQL INYECTION

function limpiar_cadena($conexion, $input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = mysqli_real_escape_string($conexion, $input);
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    return $input;
}

$usuario = limpiar_cadena($conexion, $_POST['usuario']);
$apellido = limpiar_cadena($conexion, $_POST['apellido']);
$telefono = limpiar_cadena($conexion, $_POST['telefono']);
$correo = limpiar_cadena($conexion, $_POST['correo']);
$clave = limpiar_cadena($conexion, $_POST['clave']);
$hash = password_hash($clave, PASSWORD_DEFAULT);


$consulta = "INSERT INTO usuarios (usuario, apellido, telefono,correo, clave) VALUES ('$usuario', '$apellido', '$telefono', '$correo','$hash' )";

// Ejecutar la consulta INSERT
$resultado = mysqli_query($conexion, $consulta);

// Verificar si la inserción fue exitosa
if ($resultado) {
    header("Location: registro.html ");
} else {
    echo "Error al insertar el registro: " . mysqli_error($conexion);
}

mysqli_close($conexion);


?>