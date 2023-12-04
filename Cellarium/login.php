<?php
include("conexion.php");

$usuario =$_POST["correo"];
$clave= $_POST["clave"];

// Consulta SQL para obtener el usuario
$consulta_usuario = "SELECT * FROM usuarios where correo = '$usuario'";
$resultado = mysqli_query($conexion, $consulta_usuario);

// Consulta SQL para obtener la contraseña
$consulta_password = "SELECT * FROM usuarios where clave = '$clave'";
$resultado2 = mysqli_query($conexion, $consulta_password);

// Comprueba si hay resultados
if (mysqli_num_rows($resultado) == 1) {
    // El usuario existe y la contraseña es correcta
    $fila = mysqli_fetch_assoc($resultado);
    $contraseña_encriptada = $fila["clave"];
  
    if (password_verify($clave, $contraseña_encriptada)) {
      echo ("Inicio de sesion correcto");
    } else {
      echo "Contraseña incorrecta";
    }
  } else {
    // El usuario no existe o la contraseña es incorrecta
    echo "Usuario no registrado";
  }

?>

