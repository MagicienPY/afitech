<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../");
    exit();
}

include 'conn/db_connect2.php';

// Fonction pour récupérer les produits
function getProducts($mysqli) {
    $query = 'SELECT * FROM produits';
    $result = $mysqli->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Fonction pour récupérer un produit par ID
function getProduct($mysqli, $id) {
    $stmt = $mysqli->prepare('SELECT * FROM produits WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Fonction pour mettre à jour un produit
function updateProduct($mysqli, $id, $nom, $description, $prix, $nombre_utilisateurs) {
    $stmt = $mysqli->prepare('UPDATE produits SET nom = ?, description = ?, prix = ?, nombre_utilisateurs = ? WHERE id = ?');
    $stmt->bind_param('ssdii', $nom, $description, $prix, $nombre_utilisateurs, $id);
    $stmt->execute();
}

// Fonction pour supprimer un produit
function deleteProduct($mysqli, $id) {
    $stmt = $mysqli->prepare('DELETE FROM produits WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
}

// Traitement des requêtes de mise à jour et suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $nombre_utilisateurs = $_POST['nombre_utilisateurs'];
        updateProduct($mysqli, $id, $nom, $description, $prix, $nombre_utilisateurs);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        deleteProduct($mysqli, $id);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

// Récupération des produits
$products = getProducts($mysqli);

// Vérifier si un produit doit être édité
$editProduct = null;
if (isset($_GET['edit'])) {
    $productId = $_GET['edit'];
    $editProduct = getProduct($mysqli, $productId);
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
    <title>Produits</title>
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
                <h1>Produits</h1>
            </div>
            <div class="courses-boxes">
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="courses-box">
                            <div class="card-image">
                                <img src="../images/team-01.png" alt="" />
                                <img src="../images/course-01.jpg" alt="" />
                            </div>
                            <div class="courses-card-body">
                                <h4><?php echo htmlspecialchars($product['nom']); ?></h4>
                                <p><?php echo htmlspecialchars($product['categorie']); ?></p>
                                <span>Course Info</span>
                            </div>
                            <div class="courses-card-footer">
                                <span><i class="fa-regular fa-user"></i><?php echo htmlspecialchars($product['id_produit']); ?></span>
                                <span><i class="fa-solid fa-dollar-sign"></i><?php echo htmlspecialchars($product['cout']); ?></span>
                                <a href="?edit=<?php echo htmlspecialchars($product['id_produit']); ?>" class="btn btn-edit">Edit</a>
                                <form method="POST" action="" style="display: inline;">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id_produit']); ?>" />
                                    <button type="submit" name="delete" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Aucun produit trouvé.</p>
                <?php endif; ?>
            </div>
            <?php if ($editProduct): ?>
                <div class="edit-form">
                    <h2>Edit Product</h2>
                    <form method="POST" action="">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($editProduct['id']); ?>" />
                        <label for="nom">Product Name:</label>
                        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($editProduct['nom']); ?>" required />
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" required><?php echo htmlspecialchars($editProduct['description']); ?></textarea>
                        <label for="prix">Price:</label>
                        <input type="number" id="prix" name="prix" value="<?php echo htmlspecialchars($editProduct['prix']); ?>" required />
                        <label for="nombre_utilisateurs">Number of Users:</label>
                        <input type="number" id="nombre_utilisateurs" name="nombre_utilisateurs" value="<?php echo htmlspecialchars($editProduct['nombre_utilisateurs']); ?>" required />
                        <button type="submit" name="update">Update Product</button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </main>
    <script src="../js/script.js"></script>
</body>
</html>
