<?php
require_once __DIR__ . '/config.php';

if (isset($_GET['logout'])) {
    unset($_SESSION["user"]);
}

$db_host = 'db';  
$db_name = 'mydatabase';  
$db_user = 'user';  
$db_pass = 'password';  

$error_msg = '';
$email_try = '';

try {
    $conn = new PDO("mysql:host = $db_host; dbname = $db_name", $db_user, $db_pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connexion échouée: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['username'];
    $password = $_POST['password'];
    $email_try = $email;

    if ($email != '' && $password != '') {
        // Use a prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $reponse = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify password
        if ($reponse !== false && password_verify($password, $reponse['password'])) {
            $_SESSION["user"] = $reponse;
            header("Location: index.php"); 
            exit; 
        } else {
            $error_msg = "Nom d'utilisateur ou mot de passe invalide.";
            // header("Location: login.html"); 
            exit;
        }
    }
}
?>

