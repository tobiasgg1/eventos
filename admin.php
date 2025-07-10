<?php
session_start();

$USER_ADMIN = "admin";
$PASS_ADMIN = "1234";

// Cerrar sesión
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: admin.html");
    exit;
}

// Procesar login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    if ($user === $USER_ADMIN && $pass === $PASS_ADMIN) {
        $_SESSION['logged_in'] = true;
        header("Location: admin.html");
        exit;
    } else {
        header("Location: admin.html?error=1");
        exit;
    }
}

// Exportar CSV si está logueado
if (isset($_GET["descargar"]) && isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    list($headers, $registros) = obtener_registros_db();
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="registros_completos.csv"');
    $output = fopen("php://output", "w");
    fputcsv($output, $headers, ';');
    foreach ($registros as $registro) {
        fputcsv($output, $registro, ';');
    }
    fclose($output);
    exit;
}

// Función para obtener datos
function obtener_registros_db() {
    $conn = new mysqli("db-name.onrender.com", "render_user", "", "evento");
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM participantes";
    $result = $conn->query($sql);

    $registros = [];
    $headers = [];

    if ($result->num_rows > 0) {
        $headers = array_keys($result->fetch_assoc());
        $result->data_seek(0);
        while ($row = $result->fetch_assoc()) {
            $registros[] = array_values($row);
        }
    }

    $conn->close();
    return [$headers, $registros];
}

// Si no está logueado y quiere entrar al panel, redirigir
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: admin.html");
    exit;
}
?>
