<?php


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


$error_msg = '';

$nom_try= '';
$prenom_try = '';
$email_try = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $password2 = $_POST['password2'];

    $nom_try = $nom;
    $prenom_try = $prenom;
    $email_try = $email;


    if (!empty($email) && !empty($password) && !empty($nom) && !empty($prenom)) {
        

        if ($password == $password2) {

            if (strlen($password) > 8){
                
                $add = $conn->prepare("SELECT * FROM usagers WHERE nom_utilisateur = :email");
                $add->execute(['email' => $email]);
                $reponse = $add->fetch(PDO::FETCH_ASSOC);

                    if ($reponse === false) {
                        $add = $conn->prepare("INSERT INTO usagers (nom, prenom, nom_utilisateur, mot_de_passe) VALUES (:nom, :prenom, :email, PASSWORD(:password))");
                        
                        try {
                            $add->execute([
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'email' => $email,
                                'password' => $password
                            ]);
                            $success_msg = "Utilisateur ajouté avec succès.";
                            header("Location: login.php");
                            exit;
                        } catch (PDOException $e) {
                            $error_msg = "Erreur lors de l'ajout de l'utilisateur: " . $e->getMessage();
                        }

                    } 
                    else{
                        $error_msg = "L'utilisateur existe déjà.";
                    }
            }
            else{
                $error_msg = "Le mot de passe est trop court.";
            }
        }
        else{
            $error_msg = "Le mot de passe ne correspond pas.";
        }
    }
    else{
        $error_msg = "Veuillez remplir tous les champs.";
    }
    }
?>

