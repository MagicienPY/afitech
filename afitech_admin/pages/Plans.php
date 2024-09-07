<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: ../");
  exit();
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
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&amp;display=swap"
      rel="stylesheet"
    />
    <title>Plans</title>
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
                <h1>Plans</h1>
            </div>
            <div class="plans-boxes">
                <div class="plan-box">
                    <div class="plan-title-container">
                        <div class="plan-title">
                            <h2>Gratuit</h2>
                            <p><span>$</span> 0.00</p>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <div>
                                <i class="fa-solid fa-check"></i><span>Accès à toutes les leçons textuelles</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-check"></i><span>Accès à toutes les leçons en vidéo</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-check"></i><span>Apparition sur le classement</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-xmark red"></i><span>Consulter le contenu sans publicité</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-xmark red"></i><span>Accès à tous les devoirs</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-xmark red"></i><span>Recevoir des prix quotidiens</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-xmark red"></i><span>Obtenir un certificat</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-xmark red"></i><span>Espace GB pour héberger des fichiers</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-xmark red"></i><span>Accéder au système de badges</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li><a href="/#">Rejoindre</a></li>
                    </ul>
                </div>
                <div class="plan-box">
                    <div class="plan-title-container">
                        <div class="plan-title">
                            <h2>Basique</h2>
                            <p><span>$</span> 7.99</p>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <div>
                                <i class="fa-solid fa-check"></i><span>Accès à toutes les leçons textuelles</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-check"></i><span>Accès à toutes les leçons en vidéo</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-check"></i><span>Apparition sur le classement</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-check"></i><span>Consulter le contenu sans publicité</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-check"></i><span>Accès à tous les devoirs</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-check"></i><span>Recevoir des prix quotidiens</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-check"></i><span>Obtenir un certificat</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-xmark red"></i><span>Espace GB pour héberger des fichiers</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-xmark red"></i><span>Accéder au système de badges</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li><a href="/#">Rejoindre</a></li>
                    </ul>
                </div>
                <div class="plan-box">
                    <div class="plan-title-container">
                        <div class="plan-title">
                            <h2>Premium</h2>
                            <p><span>$</span> 19.99</p>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <div>
                                <i class="fa-solid fa-check"></i><span>Accès à toutes les leçons textuelles</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-check"></i><span>Accès à toutes les leçons en vidéo</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-check"></i><span>Apparition sur le classement</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-check"></i><span>Consulter le contenu sans publicité</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-check"></i><span>Accès à tous les devoirs</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-check"></i><span>Recevoir des prix quotidiens</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-check"></i><span>Obtenir un certificat</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-check"></i><span>Espace GB pour héberger des fichiers</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li>
                            <div>
                                <i class="fa-solid fa-check"></i><span>Accéder au système de badges</span>
                            </div>
                            <i class="fa-solid fa-circle-info help"></i>
                        </li>
                        <li><a href="/#">Rejoindre</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="footer-content">
                <p>© 2024 Your Company. Tous droits réservés.</p>
            </div>
        </div>
    </main>
    <script src="../js/all.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>
