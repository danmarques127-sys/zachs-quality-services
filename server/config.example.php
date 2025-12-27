<?php
// =============================================================
// CONFIG.EXAMPLE.PHP — template seguro (sem credenciais)
// Copie para config.local.php e preencha USER/PASS no seu ambiente.
// =============================================================

// Mostrar erros (use apenas em dev)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host   = "localhost";
$dbname = "tips";

// Preencha no seu config.local.php (NÃO commitar)
$user = "YOUR_DB_USER";
$pass = "YOUR_DB_PASSWORD";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Erro ao conectar ao banco: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>
