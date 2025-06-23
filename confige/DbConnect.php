<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$sdn = "mysql:host=localhost;dbname=man9ous";
$user = "root";
$pass = "";

try {
    $pdo = new PDO($sdn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    

} catch (PDOException $e) {
    echo "Connection error: " . $e->getMessage();
}
?>
