<?php
$servername = "db-name.onrender.com"; // el host de tu base
$username = "render_user";
$password = "";
$dbname = "evento";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Usar los mismos nombres que en el formulario
$nombre = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$numero_entrada = $_POST['numero_entrada'] ?? '';
$dni = $_POST['dni'] ?? '';
$forma_pago = $_POST['forma_pago'] ?? '';
$colegio = $_POST['colegio'] ?? '';

// Insertar en base de datos
$sql = "INSERT INTO participantes (nombre, apellido, numero_entrada, dni, forma_pago, colegio)
        VALUES ('$nombre', '$apellido', '$numero_entrada', '$dni', '$forma_pago', '$colegio')";


if ($conn->query($sql) === TRUE) {
    header("Location: registroMatinee.html");
    exit;
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
