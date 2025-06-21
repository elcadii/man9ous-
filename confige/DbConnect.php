<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$sdn = "mysql:host=localhost;dbname=man9ousdb";
$user = "root";
$pass = "";

try {
    $pdo = new PDO($sdn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $protected = true; 
    if ($protected && (!isset($_SESSION['login']) || $_SESSION['login'] !== true)) {
        header("Location: /man9ous/man9ous-/user/connection.php"); 
        exit();
    }

} catch (PDOException $e) {
    echo "Connection error: " . $e->getMessage();
}
?>
