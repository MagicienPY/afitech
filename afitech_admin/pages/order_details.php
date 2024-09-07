<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../");
    exit();
}

include 'conn/db_connect.php'; // Assurez-vous que ce fichier initialise une connexion PDO

$userId = $_SESSION['user_id'];
$id_commande = isset($_GET['id']) ? intval($_GET['id']) : 0;

try {
    $pdo = new PDO('mysql:host=localhost;dbname=ParrainageSysteme;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM commandes WHERE id_commande = :id_commande AND id_client = :userId";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_commande', $id_commande, PDO::PARAM_INT);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $order = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$order) {
        die('Commande non trouvée ou accès non autorisé.');
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/all.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Détails de la Commande</title>
</head>
<body>
    <?php include_once('./menu2.php'); ?>
    <main>
        <div class="header">
            <i class="fa-solid fa-bars bar-item"></i>
            <div class="profile">
                <span class="bell"><i class="fa-regular fa-bell fa-lg"></i></span>
                <img src="../images/avatar.png" alt="Pas d'image" />
            </div>
        </div>
        <div class="main-content">
            <div class="title">
                <h1>Détails de la Commande</h1>
            </div>
            <div class="order-details-box">
                <p><strong>ID Commande:</strong> <?php echo htmlspecialchars($order['id_commande']); ?></p>
                <p><strong>Nom du Produit:</strong> <?php echo htmlspecialchars($order['nom_produit']); ?></p>
                <p><strong>Montant Total:</strong> <?php echo htmlspecialchars(number_format($order['somme_commande'], 2, ',', ' ')); ?> €</p>
                <!-- Ajoutez plus de détails ici si nécessaire -->
            </div>
        </div>
    </main>
</body>
</html>
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../");
    exit();
}

include 'conn/db_connect.php'; // Assurez-vous que ce fichier initialise une connexion PDO

$userId = $_SESSION['user_id'];
$id_commande = isset($_GET['id']) ? intval($_GET['id']) : 0;

try {
    $pdo = new PDO('mysql:host=localhost;dbname=ParrainageSysteme;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM commandes WHERE id_commande = :id_commande AND id_client = :userId";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_commande', $id_commande, PDO::PARAM_INT);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $order = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$order) {
        die('Commande non trouvée ou accès non autorisé.');
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/all.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Détails de la Commande</title>
</head>
<body>
    <?php include_once('./menu2.php'); ?>
    <main>
        <div class="header">
            <i class="fa-solid fa-bars bar-item"></i>
            <div class="profile">
                <span class="bell"><i class="fa-regular fa-bell fa-lg"></i></span>
                <img src="../images/avatar.png" alt="Pas d'image" />
            </div>
        </div>
        <div class="main-content">
            <div class="title">
                <h1>Détails de la Commande</h1>
            </div>
            <div class="order-details-box">
                <p><strong>ID Commande:</strong> <?php echo htmlspecialchars($order['id_commande']); ?></p>
                <p><strong>Nom du Produit:</strong> <?php echo htmlspecialchars($order['nom_produit']); ?></p>
                <p><strong>Montant Total:</strong> <?php echo htmlspecialchars(number_format($order['somme_commande'], 2, ',', ' ')); ?> €</p>
                <!-- Ajoutez plus de détails ici si nécessaire -->
            </div>
        </div>
    </main>
</body>
</html>
