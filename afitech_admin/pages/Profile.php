<?php
session_start();

if (!isset($_SESSION['user_id'])) { // Si l'utilisateur n'est pas connecté, redirigez vers la page de connexion 
  header("Location: ../");
  exit();
}

// Inclure le fichier de connexion à la base de données
include 'conn/db_connect.php'; // Assurez-vous que le chemin est correct

// Récupérer l'ID utilisateur de la session
$userId = $_SESSION['user_id'];

// Préparer et exécuter la requête pour obtenir les informations utilisateur
$query = "SELECT Utilisateurs.nom, Utilisateurs.prenom, Utilisateurs.email, Utilisateurs.tel, Utilisateurs.ville, Utilisateurs.sexe, Roles.nom_role 
          FROM Utilisateurs 
          JOIN Roles ON Utilisateurs.id_role = Roles.id_role 
          WHERE Utilisateurs.id_utilisateur = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

// Vérifier si l'utilisateur existe
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "Utilisateur non trouvé.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/all.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&amp;display=swap"
      rel="stylesheet"
    />
    <title>Profile</title>
  </head>
  <body>
    <?php include_once('./menu.php'); ?>
    <main>
      <div class="header">
        <i class="fa-solid fa-bars bar-item"></i>
        <div class="search">
          <input type="search" placeholder="Tapez un mot-clé" />
        </div>
        <div class="profile">
          <span class="bell"><i class="fa-regular fa-bell fa-lg"></i></span>
          <img src="../images/avatar.png" alt="Pas d'image" />
        </div>
      </div>
      <div class="main-content">
        <div class="title">
          <h1>Profil</h1>
        </div>
        <div class="profile-box">
          <div class="profile-info">
            <img src="../images/avatar.png" alt="" />
            <h3><?php echo htmlspecialchars($user['prenom'] . ' ' . $user['nom']); ?></h3>
            <p>Niveau 20</p>
            <div class="progress">
              <span></span>
            </div>
            <div class="stars">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <p>550 Évaluations</p>
          </div>
          <div class="profile-info-section2">
            <div class="row">
              <div class="general-information">
                <h4>Informations Générales</h4>
                <div>
                  <h5>Nom Complet:&nbsp;</h5>
                  <span><?php echo htmlspecialchars($user['prenom'] . ' ' . $user['nom']); ?></span>
                </div>
                <div class="toggle"></div>
                <span></span>
              </div>
              <div>
                <h5>Sexe:&nbsp;</h5>
                <span><?php echo htmlspecialchars($user['sexe']); ?></span>
              </div>
              <div>
                <h5>Pays:&nbsp;</h5>
                <span><?php echo htmlspecialchars($user['ville']); ?></span>
              </div>
            </div>
            <div class="row">
              <div class="general-information">
                <h4>Informations Personnelles</h4>
                <div>
                  <h5>Email:&nbsp;</h5>
                  <span><?php echo htmlspecialchars($user['email']); ?></span>
                </div>
                <div class="toggle left"></div>
                <span></span>
              </div>
              <div>
                <h5>Téléphone:&nbsp;</h5>
                <span><?php echo htmlspecialchars($user['tel']); ?></span>
              </div>
              <div>
                <h5>Date de Naissance:&nbsp;</h5>
                <span>20/04/1996</span>
              </div>
            </div>
            <div class="row">
              <div class="general-information">
                <h4>Informations Professionnelles</h4>
                <div>
                  <h5>Poste:&nbsp;</h5>
                  <span><?php echo htmlspecialchars($user['nom_role']); ?></span>
                </div>
                <div class="toggle"></div>
                <span></span>
              </div>
              <div>
                <h5>Langage de Programmation:&nbsp;</h5>
                <span>JavaScript</span>
              </div>
              <div>
                <h5>Années d'Expérience:&nbsp;</h5>
                <span>3+</span>
              </div>
            </div>
            <div class="row">
              <div class="general-information">
                <h4>Informations de Facturation</h4>
                <div>
                  <h5>Méthode de Paiement:&nbsp;</h5>
                  <span>Paypal</span>
                </div>
                <div class="toggle left"></div>
                <span></span>
              </div>
              <div>
                <h5>Email&nbsp;</h5>
                <span>email@example.com</span>
              </div>
              <div>
                <h5>Abonnement:&nbsp;</h5>
                <span>Mensuel</span>
              </div>
            </div>
          </div>
        </div>
    </main>
    <script src="../js/script.js"></script>
  </body>
</html>
