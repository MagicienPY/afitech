<?php
session_start();

// Vérification de l'authentification
if (!isset($_SESSION['user_id'])) {
    header("Location: ../");
    exit();
}

include 'conn/db_connect.php';

$userId = $_SESSION['user_id'];

// Ajouter ou modifier une commande
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_produit = $_POST['nom_produit'];
    $somme_commande = $_POST['somme_commande'];

    if (isset($_POST['id_commande']) && !empty($_POST['id_commande'])) {
        // Modifier une commande
        $id_commande = $_POST['id_commande'];
        $sql = "UPDATE commandes SET nom_produit = ?, somme_commande = ? WHERE id_commande = ? AND id_client = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdii", $nom_produit, $somme_commande, $id_commande, $userId);
    } else {
        // Ajouter une nouvelle commande
        $sql = "INSERT INTO commandes (id_client, nom_produit, somme_commande) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isd", $userId, $nom_produit, $somme_commande);
    }

    $stmt->execute();
    $stmt->close();
    header("Location: Projects.php");
    exit();
}

// Supprimer une commande
if (isset($_GET['delete_id'])) {
    $id_commande = intval($_GET['delete_id']);
    $sql = "DELETE FROM commandes WHERE id_commande = ? AND id_client = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $id_commande, $userId);
    $stmt->execute();
    $stmt->close();
    header("Location: Projects.php");
    exit();
}

// Récupérer les commandes pour l'affichage
$sql = "SELECT id_commande, nom_produit, somme_commande FROM commandes WHERE id_client = ? ORDER BY id_commande DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

$commandes = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $commandes[] = $row;
    }
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Commandes</title>
    <link rel="stylesheet" href="../css/all.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <!-- Inclure Chart.js pour le graphique -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php include_once('./menu2.php'); ?>
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
                <h1>Gestion des Commandes</h1>
            </div>

            <!-- Formulaire d'ajout/modification -->
            <div class="form-box">
                <form method="post" action="Projects.php" id="commandeForm">
                    <input type="hidden" name="id_commande" id="id_commande" value="" />
                    <div class="form-group">
                        <label>Nom du Produit :</label>
                        <input type="text" name="nom_produit" id="nom_produit" required>
                    </div>
                    <div class="form-group">
                        <label>Montant Total :</label>
                        <input type="number" step="0.01" name="somme_commande" id="somme_commande" required>
                    </div>
                    <input type="submit" value="Enregistrer" class="btn">
                </form>
            </div>

            <!-- Tableau des commandes -->
            <div class="orders-box">
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>ID Commande</th>
                            <th>Nom du Produit</th>
                            <th>Montant Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($commandes as $commande) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($commande['id_commande']); ?></td>
                                <td><?php echo htmlspecialchars($commande['nom_produit']); ?></td>
                                <td><?php echo htmlspecialchars(number_format($commande['somme_commande'], 2, ',', ' ')); ?> €</td>
                                <td>
                                    <!-- Boutons pour modifier et supprimer -->
                                    <button class="btn-edit" onclick="editCommande(<?php echo $commande['id_commande']; ?>, '<?php echo addslashes($commande['nom_produit']); ?>', <?php echo $commande['somme_commande']; ?>)">Modifier</button>
                                    <a href="Projects.php?delete_id=<?php echo $commande['id_commande']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?');" class="btn-delete">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Graphique des commandes -->
            <div class="chart-box">
                <canvas id="commandeChart"></canvas>
            </div>
        </div>
    </main>

    <!-- Votre script JavaScript -->
    <script src="../js/main.js"></script>
    <script>
        // Fonction pour remplir le formulaire lors de la modification
        function editCommande(id_commande, nom_produit, somme_commande) {
            document.getElementById('id_commande').value = id_commande;
            document.getElementById('nom_produit').value = nom_produit;
            document.getElementById('somme_commande').value = somme_commande;
        }

        // Générer le graphique des commandes
        const ctx = document.getElementById('commandeChart').getContext('2d');
        const dataLabels = <?php echo json_encode(array_column($commandes, 'nom_produit')); ?>;
        const dataValues = <?php echo json_encode(array_column($commandes, 'somme_commande')); ?>;

        const commandeChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dataLabels, // Noms des produits
                datasets: [{
                    label: 'Montant des Commandes (€)',
                    data: dataValues, // Montant des commandes
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>



<style>
  /* Style général du tableau */
  .btn {
    padding: 5px 10px;
    border: none;
    cursor: pointer;
    color: #fff;
}
.btn-edit {
    background-color: #007bff;
}
.btn-delete {
    background-color: #dc3545;
}

.orders-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
  background-color: #fff;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.orders-table th, .orders-table td {
  padding: 12px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

.orders-table th {
  background-color: #343a40;
  color: #fff;
  font-weight: bold;
}

.orders-table tr:nth-child(even) {
  background-color: #f9f9f9;
}

.orders-table tr:hover {
  background-color: #f1f1f1;
}

.orders-table td {
  color: #495057;
}

.orders-box {
  padding: 20px;
}

.orders-box p {
  color: #dc3545;
}
/* Styles pour le formulaire */
.form-box {
    margin: 20px 0;
}

.form-box .form-group {
    margin-bottom: 15px;
}

.form-box label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-box input[type="text"],
.form-box input[type="number"] {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
}

.form-box .btn {
    padding: 10px 15px;
    background-color: #28a745;
    color: #fff;
    border: none;
    cursor: pointer;
}

.form-box .btn:hover {
    background-color: #218838;
}

/* Styles pour les boutons du tableau */
.btn-edit {
    padding: 5px 10px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border: none;
    cursor: pointer;
}

.btn-edit:hover {
    background-color: #0056b3;
}

.btn-delete {
    padding: 5px 10px;
    background-color: #dc3545;
    color: #fff;
    text-decoration: none;
    border: none;
    cursor: pointer;
}

.btn-delete:hover {
    background-color: #c82333;
}

/* Styles pour le graphique */
.chart-box {
    margin: 40px 0;
}

</style>

<?php

?>
