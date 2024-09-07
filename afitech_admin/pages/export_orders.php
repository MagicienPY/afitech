<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../");
    exit();
}

include 'conn/db_connect.php'; // Assurez-vous que ce fichier initialise une connexion PDO

$userId = $_SESSION['user_id'];
$search = isset($_GET['search']) ? '%' . $_GET['search'] . '%' : '%';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=ParrainageSysteme;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT id_commande, nom_produit, somme_commande
              FROM commandes
              WHERE id_client = :userId AND (id_commande LIKE :search OR nom_produit LIKE :search)
              ORDER BY id_commande DESC";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':search', $search, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="commandes.csv"');

    echo "ID Commande,Nom du Produit,Montant Total\n";
    foreach ($result as $order) {
        echo implode(',', array_map('htmlspecialchars', $order)) . "\n";
    }
    exit();
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
?>
