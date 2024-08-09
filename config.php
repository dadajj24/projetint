<?php
session_start();
$db_host = 'db';  
$db_name = 'mydatabase';  
$db_user = 'user';  
$db_pass = 'password';  

try {
    
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connexion échouée: " . $e->getMessage();
    exit; 
}

?>