<?php
// Incluir la conexión
include('conexion.php');

// Verificar que se enviaron los datos del formulario
if (isset($_POST['cedula'], $_POST['correo'], $_POST['contrasena'], $_POST['rol'])) {
    $cedula = $conn->real_escape_string($_POST['cedula']);
    $correo = $conn->real_escape_string($_POST['correo']);
    $contrasena = password_hash($conn->real_escape_string($_POST['contrasena']), PASSWORD_BCRYPT); // Cifrar la contraseña
    $rol = $conn->real_escape_string($_POST['rol']);

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO usuarios (cedula, correo, contrasena, rol) VALUES ('$cedula', '$correo', '$contrasena', '$rol')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
        header("Location: ../index.html"); // Redirigir al index
    } else {
        echo "Error al registrar usuario: " . $conn->error;
    }
} else {
    echo "Error: Uno o más campos no fueron enviados correctamente.";
}

$conn->close();
?>
