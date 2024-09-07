<?php
session_start();

if (!isset($_SESSION['user_id'])) { // Si l'utilisateur n'est pas connecté, redirigez vers la page de connexion
    header("Location: ../");
    exit();
}

// Connexion à la base de données
$servername = "localhost";
$username = "root"; // Changez en fonction de votre configuration
$password = ""; // Changez en fonction de votre configuration
$dbname = "ParrainageSysteme"; // Changez en fonction de votre configuration

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Gestion des opérations CRUD

// Création
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])) {
    $nom_client = $conn->real_escape_string($_POST['nom_client']);
    $prenom_client = $conn->real_escape_string($_POST['prenom_client']);
    $nom_affilier = $conn->real_escape_string($_POST['nom_affilier']);
    $prenom_affilier = $conn->real_escape_string($_POST['prenom_affilier']);
    
    $sql = "INSERT INTO clients (nom, prenom) VALUES ('$nom_client', '$prenom_client')";
    $conn->query($sql);
    
    $id_client = $conn->insert_id;
    $sql = "INSERT INTO affiliers (id_affilier, nom, prenom) VALUES ($id_client, '$nom_affilier', '$prenom_affilier')";
    $conn->query($sql);
    
    header("Location: Friends.php");
    exit();
}

// Mise à jour
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $nom_client = $conn->real_escape_string($_POST['nom_client']);
    $prenom_client = $conn->real_escape_string($_POST['prenom_client']);
    $nom_affilier = $conn->real_escape_string($_POST['nom_affilier']);
    $prenom_affilier = $conn->real_escape_string($_POST['prenom_affilier']);
    
    $conn->query("UPDATE clients SET nom = '$nom_client', prenom = '$prenom_client' WHERE id_client = $id");
    $conn->query("UPDATE affiliers SET nom = '$nom_affilier', prenom = '$prenom_affilier' WHERE id_affilier = $id");
    
    header("Location: Friends.php");
    exit();
}

// Suppression
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM clients WHERE id_client = $id");
    $conn->query("DELETE FROM affiliers WHERE id_affilier = $id");
    header("Location: Friends.php");
    exit();
}

// Requête SQL pour obtenir les clients et leurs affiliés
$sql = "SELECT c.id_client, c.nom AS nom_client, c.prenom AS prenom_client, a.nom AS nom_affilier, a.prenom AS prenom_affilier
        FROM clients c
        JOIN affiliers a ON c.id_client = a.id_affilier";

$result = $conn->query($sql);

// Requête pour obtenir les informations de mise à jour
$update_row = null;
if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    $sql = "SELECT c.nom AS nom_client, c.prenom AS prenom_client, a.nom AS nom_affilier, a.prenom AS prenom_affilier
            FROM clients c
            JOIN affiliers a ON c.id_client = a.id_affilier
            WHERE c.id_client = $id";
    $update_result = $conn->query($sql);
    $update_row = $update_result->fetch_assoc();
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
    <title>Clients et Affiliés</title>
</head>
<body>
    <?php include_once('./menu.php'); ?>
    <main>
        <div class="header">
            <i class="fa-solid fa-bars bar-item"></i>
            <div class="search">
                <input type="search" placeholder="Type A Keyword" />
            </div>
            <div class="profile">
                <span class="bell"><i class="fa-regular fa-bell fa-lg"></i></span>
                <img src="../images/avatar.png" alt="No Image" />
            </div>
        </div>
        <div class="main-content">
            <div class="title">
                <h1>Clients et Affiliés</h1>
            </div>
            
            <!-- Formulaire de Création -->
            <div class="form-container">
                <h2><?php echo $update_row ? 'Modifier' : 'Ajouter'; ?> Client/Affilié</h2>
                <form method="post" action="">
                    <input type="hidden" name="<?php echo $update_row ? 'update' : 'create'; ?>" value="1" />
                    <?php if ($update_row) { ?>
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['edit']); ?>" />
                    <?php } ?>
                    <div>
                        <label for="nom_client">Nom Client:</label>
                        <input type="text" id="nom_client" name="nom_client" value="<?php echo $update_row ? htmlspecialchars($update_row['nom_client']) : ''; ?>" required />
                    </div>
                    <div>
                        <label for="prenom_client">Prénom Client:</label>
                        <input type="text" id="prenom_client" name="prenom_client" value="<?php echo $update_row ? htmlspecialchars($update_row['prenom_client']) : ''; ?>" required />
                    </div>
                    <div>
                        <label for="nom_affilier">Nom Affilié:</label>
                        <input type="text" id="nom_affilier" name="nom_affilier" value="<?php echo $update_row ? htmlspecialchars($update_row['nom_affilier']) : ''; ?>" required />
                    </div>
                    <div>
                        <label for="prenom_affilier">Prénom Affilié:</label>
                        <input type="text" id="prenom_affilier" name="prenom_affilier" value="<?php echo $update_row ? htmlspecialchars($update_row['prenom_affilier']) : ''; ?>" required />
                    </div>
                    <div>
                        <button type="submit" class="btn"><?php echo $update_row ? 'Mettre à Jour' : 'Ajouter'; ?></button>
                    </div>
                </form>
            </div>

            <!-- Affichage des Clients et Affiliés -->
            <div class="friends-main-boxes">
                <?php
                if ($result->num_rows > 0) {
                    // Affichage des données
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="friends-box-card">';
                        echo '<div class="friends-box-card-info">';
                        echo '<h4>' . htmlspecialchars($row['nom_client']) . ' ' . htmlspecialchars($row['prenom_client']) . '</h4>';
                        echo '<p>Client</p>';
                        echo '<p>Affilié: ' . htmlspecialchars($row['nom_affilier']) . ' ' . htmlspecialchars($row['prenom_affilier']) . '</p>';
                        echo '</div>';
                        echo '<div class="friends-box-card-body">';
                        echo '<a href="?edit=' . htmlspecialchars($row['id_client']) . '" class="btn">Modifier</a>';
                        echo '<a href="?delete=' . htmlspecialchars($row['id_client']) . '" class="btn btn-danger">Supprimer</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>Aucun client ou affilié trouvé.</p>';
                }
                $conn->close();
                ?>
            </div>
        </div>
    </main>
    <script src="../js/script.js"></script>
</body>
<style>
  /* CSS dans style.css */

/* Conteneur du formulaire */
.form-container {
  margin: 20px auto;
  max-width: 600px;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 8px;
  background-color: #f9f9f9;
}

/* Titres du formulaire */
.form-container h2 {
  margin-bottom: 20px;
  font-size: 24px;
  color: #333;
}

/* Labels des champs */
.form-container label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

/* Champs de saisie */
.form-container input[type="text"],
.form-container input[type="email"],
.form-container input[type="password"],
.form-container input[type="search"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

/* Boutons */
.form-container button {
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  background-color: #007bff;
  color: #fff;
  font-size: 16px;
  cursor: pointer;
}

.form-container button:hover {
  background-color: #0056b3;
}

/* Messages d'erreur */
.form-container .error {
  color: red;
  margin-top: 10px;
}
/* Conteneur des boutons */
.friends-box-card-footer-buttons {
  display: flex;
  justify-content: space-between;
}

/* Style de base pour tous les boutons */
.btn {
  display: inline-block;
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  font-size: 16px;
  text-align: center;
  color: #000000;
  text-decoration: none;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

/* Style pour le bouton Modifier */
.edit-btn {
  background-color: #007bff;
}

.edit-btn:hover {
  background-color: #0056b3;
}

/* Style pour le bouton Supprimer */
.delete-btn {
  background-color: #dc3545;
}

.delete-btn:hover {
  background-color: #c82333;
}

</style>
</html>
