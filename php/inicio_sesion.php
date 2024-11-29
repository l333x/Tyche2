
<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'vash', '123vashito123', 'tyche2');

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verifica si se envían los datos desde el formulario
if (!isset($_POST['correo']) || !isset($_POST['contrasena'])) {
    die("Error: Faltan datos en el formulario.");
}

// Captura los datos del formulario
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Consulta para verificar el usuario en la base de datos
$sql = "SELECT contrasena, rol FROM usuarios WHERE correo = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

// Verifica si se encontró el usuario
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verifica la contraseña
    if (password_verify($contrasena, $row['contrasena'])) {
        // Redirige a perfil.html
        header("Location: ../perfil.html");
        exit();
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Usuario no encontrado.";
}

$stmt->close();
$conn->close();
?>
