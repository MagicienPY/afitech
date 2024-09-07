<?php
// Démarrer la session
session_start();

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parrainagesysteme";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Requête pour récupérer le mot de passe haché, l'ID utilisateur et le nom depuis la base de données
    $sql = "SELECT id_utilisateur, mot_de_passe, nom FROM utilisateurs WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Erreur de préparation de la requête: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($userId, $hashedPassword, $nomuser);
        $stmt->fetch();

        // Vérification du mot de passe
        if (password_verify($password, $hashedPassword)) {
            // Stocker les informations dans la session
            $_SESSION['nomuser'] = $nomuser;
            $_SESSION['user_id'] = $userId;
            $_SESSION['email'] = $email; // Vous pouvez stocker d'autres informations si nécessaire

            // Redirection vers la page d'accueil
            header("Location: ./acceuil.php");
            exit(); // Assurez-vous de sortir immédiatement après une redirection
        } else {
            // Mot de passe incorrect
            $_SESSION['login_error'] = "Mot de passe incorrect.";
            header("Location: ./");
            exit();
        }
    } else {
        // Aucun utilisateur trouvé
        $_SESSION['login_error'] = "Aucun utilisateur trouvé avec cet email.";
        header("Location: ./");
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
