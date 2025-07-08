<?php
$resultados = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['busqueda'], $_POST['criterio'])) {
    $busqueda = $_POST['busqueda'];
    $campo = $_POST['criterio'];

    $conn = new mysqli("localhost", "root", "", "evento");

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $busqueda = $conn->real_escape_string($busqueda);

    $columnas_validas = [
        "Nombre" => "nombre",
        "Apellido" => "apellido",
        "numero_entrada" => "numero_entrada",
        "Dni" => "dni"
    ];

    if (array_key_exists($campo, $columnas_validas)) {
        $columna = $columnas_validas[$campo];

        // Si es número de entrada o DNI, buscar coincidencia exacta
        if ($columna == "numero_entrada" || $columna == "dni") {
            $sql = "SELECT * FROM participantes WHERE $columna = '$busqueda'";
        } else {
            $sql = "SELECT * FROM participantes WHERE $columna LIKE '%$busqueda%'";
        }

        $res = $conn->query($sql);

        if ($res && $res->num_rows > 0) {
            while ($fila = $res->fetch_assoc()) {
                $resultados[] = $fila;
            }
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9fafb;
            padding: 40px;
        }
        h2 {
            text-align: center;
        }
        .resultado {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }
        a {
            display: block;
            text-align: center;
            margin-top: 30px;
            text-decoration: none;
            color: #0069ed;
        }
    </style>
</head>
<body>
    <h2>Resultados de la Búsqueda</h2>

    <?php if (count($resultados) > 0): ?>
        <?php foreach ($resultados as $r): ?>
            <div class="resultado">
                <strong>Nombre:</strong> <?= htmlspecialchars($r['nombre']) ?><br>
                <strong>Apellido:</strong> <?= htmlspecialchars($r['apellido']) ?><br>
                <strong>Número:</strong> <?= htmlspecialchars($r['numero_entrada']) ?><br>
                <strong>Dni:</strong> <?= htmlspecialchars($r['dni']) ?><br>
                <strong>Método de pago:</strong> <?= htmlspecialchars($r['forma_pago']) ?><br>
                <strong>Colegio:</strong> <?= htmlspecialchars($r['colegio']) ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="text-align:center;">No se encontraron resultados.</p>
    <?php endif; ?>

    <a href="buscar.html">🔙 Volver a buscar</a>
</body>
</html>