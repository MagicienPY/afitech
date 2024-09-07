<?php

session_start();


if (!isset($_SESSION['user_id'])) {
    
header("Location: ./"); // Redirige vers la page de connexion si non connecté
    
exit();
}

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ParrainageSysteme";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion: " . $conn->connect_error);
}



$sqlTargets = "SELECT SUM(cout) AS total_product_cost FROM Produits";


$resultTargets = $conn->query($sqlTargets);
$totalProductCost = $resultTargets->fetch_assoc()['total_product_cost'];

$sqlTargets = "SELECT COUNT(*) AS total_orders FROM Commandes";
$resultTargets = $conn->query($sqlTargets);
$totalOrders = $resultTargets->fetch_assoc()['total_orders'];

// Résumé des activités
$sqlActivities = "SELECT COUNT(*) AS total_clients FROM Clients";
$resultActivities = $conn->query($sqlActivities);
$totalClients = $resultActivities->fetch_assoc()['total_clients'];

$sqlActivities = "SELECT COUNT(*) AS total_affiliates FROM Affiliers";
$resultActivities = $conn->query($sqlActivities);
$totalAffiliates = $resultActivities->fetch_assoc()['total_affiliates'];

$sqlActivities = "SELECT COUNT(*) AS total_products FROM Produits";
$resultActivities = $conn->query($sqlActivities);
$totalProducts = $resultActivities->fetch_assoc()['total_products'];

$sqlActivities = "SELECT COUNT(*) AS total_commands FROM Commandes";
$resultActivities = $conn->query($sqlActivities);
$totalCommands = $resultActivities->fetch_assoc()['total_commands'];

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&amp;display=swap"
      rel="stylesheet"
    />
    <title>Tableau de bord</title>
  </head>
  <body>
  <?php include_once('menu.php');?>
      <main>
        <div class="header">
          <i class="fa-solid fa-bars bar-item"></i>
          <div class="search">
            <input type="search" placeholder="Type A Keyword" />
          </div>

          <div class="profile">
            <span class="bell"><i class="fa-regular fa-bell fa-lg"></i></span>

            <img src="./images/avatar.png" alt="No Image" />
          </div>
        </div>
        <div class="main-content">
          <div class="title">
            <h1>Dashboard</h1>
          </div>
          <div class="main-content-boxes">
            <div class="box first-box">
              <div class="box-section1">
                <div class="box-title">
                  <h2>Bienvenue</h2>
                  <p><?php echo $_SESSION['nomuser']; ?></p>
                </div>
                <div class="box-image">
                  <img src="./images/welcome.png" alt="No image" />
                </div>
                <img src="./images/avatar.png" alt="No image" class="avatar" />
              </div>
              <div class="box-section2">
                <ul>
                  <li>
                    <span><?php echo $_SESSION['nomuser']; ?></span>
                    <p>DG</p>
                  </li>
                  <li>
                    <span>80</span>
                    <p>Projects</p>
                  </li>
                  <li>
                    <span>$8500</span>
                    <p>Earned</p>
                  </li>
                </ul>
              </div>
              <a href="./pages/Profile.html">Profile </a>
            </div>

            <div class="main-content">
        <!-- Commentaire Section -->
        <div class="box">
            <div class="box-section1">
                <div class="box-title">
                    <h2>Commentaire</h2>
                    <p>Écrire ce que tu penses ici...</p>
                </div>
            </div>
            <form action="commentaire.php" method="post">
                <input type="text" name="title" placeholder="Titre" required />
                <textarea name="thoughts" placeholder="Vos pensées" required></textarea>
                <button type="submit">Enregistrer</button>
            </form>
        </div>

        <!-- Yearly Targets Section -->
        <div class="box">
            <div class="box-section1">
                <div class="box-title">
                    <h2>Objectifs Annuels</h2>
                    <p>Objectifs pour l'année en cours</p>
                </div>
            </div>
            <div class="third-box-section2">
                <div class="third-box-section2-details">
                    <div class="icon">
                        <i class="fa-solid fa-dollar-sign fa-lg"></i>
                    </div>
                    <div class="third-box-info">
                        <ul>
                            <li>Dépenses Totales des Produits</li>
                            <li>$<?php echo number_format($totalProductCost, 2); ?></li>
                            <li><span><span class="tipTop">N/A</span></span></li>
                        </ul>
                    </div>
                </div>

                <div class="third-box-section2-details">
                    <div class="icon">
                        <i class="fa-solid fa-box fa-lg"></i>
                    </div>
                    <div class="third-box-info">
                        <ul>
                            <li>Commandes Totales</li>
                            <li><?php echo htmlspecialchars($totalOrders); ?></li>
                            <li><span><span class="tipTop">N/A</span></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activity Summary Section -->
        <div class="box">
            <div class="box-section1">
                <div class="box-title">
                    <h2>Résumé des Activités</h2>
                    <p>Résumé des données actuelles</p>
                </div>
            </div>
            <div class="fourth-box-section2">
                <div class="small-box">
                    <i class="fa-regular fa-user fa-2x mb-10"></i>
                    <span><?php echo htmlspecialchars($totalClients); ?></span>
                    <p>Clients</p>
                </div>

                <div class="small-box">
                    <i class="fa-solid fa-users fa-2x mb-10"></i>
                    <span><?php echo htmlspecialchars($totalAffiliates); ?></span>
                    <p>Affiliés</p>
                </div>

                <div class="small-box">
                    <i class="fa-solid fa-cube fa-2x mb-10"></i>
                    <span><?php echo htmlspecialchars($totalProducts); ?></span>
                    <p>Produits</p>
                </div>

                <div class="small-box">
                    <i class="fa-solid fa-cart-shopping fa-2x mb-10"></i>
                    <span><?php echo htmlspecialchars($totalCommands); ?></span>
                    <p>Commandes</p>
                </div>
            </div>
        </div>
    </div>

          
           
              </div>
        </div>
      </main>
    </div>
    <script src="./js/script.js"></script>
  </body>
</html>
