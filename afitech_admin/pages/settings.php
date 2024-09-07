<?php
session_start();

// Vérifier si l'utilisateur est connecté
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
    <link rel="stylesheet" href="../css/style.css" />
    <title>Paramètres</title>
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
                <img src="../images/avatar.png" alt="Avatar" />
            </div>
        </div>

        <div class="main-content">
            <div class="title">
                <h1>Paramètres</h1>
            </div>

            <div class="main-content-boxes">
                <div class="box">
                    <div class="box-title">
                        <h2>Contrôle du Site</h2>
                        <p>Contrôlez le site en cas de maintenance</p>
                    </div>
                    <div class="settings-box-section2">
                        <div class="settings-box-website-control">
                            <p>Contrôle du Site</p>
                            <span class="toggle"></span>
                        </div>
                        <form>
                            <textarea name="close_message" placeholder="Message de fermeture"></textarea>
                        </form>
                    </div>
                </div>

                <div class="box">
                    <div class="box-title">
                        <h2>Informations Générales</h2>
                        <p>Informations générales sur votre compte</p>
                    </div>
                    <div class="general-info-section2">
                        <form>
                            <label for="first-name">Prénom</label>
                            <input type="text" id="first-name" placeholder="Prénom" />
                            <label for="last-name">Nom</label>
                            <input type="text" id="last-name" placeholder="Nom" />
                            <label for="email">Email</label>
                            <div class="email">
                                <input type="email" id="email" value="zana.suleiman.44@gmail.com" disabled />
                                <a href="#">Changer</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="box">
                    <div class="box-title">
                        <h2>Informations de Sécurité</h2>
                        <p>Informations de sécurité sur votre compte</p>
                    </div>
                    <div class="security-info-section2">
                        <div class="person-security-info">
                            <p>Mot de passe</p>
                            <span>Dernière modification le 25/10/2021</span>
                            <a href="#">Changer</a>
                        </div>
                        <div class="person-security-info">
                            <p>Authentification à Deux Facteurs</p>
                            <span class="toggle"></span>
                        </div>
                        <div class="person-security-info">
                            <p>Appareils</p>
                            <a href="#">Appareils</a>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="box-title">
                        <h2>Informations Sociales</h2>
                        <p>Informations sur les réseaux sociaux</p>
                    </div>
                    <div class="social-info-section2">
                        <form>
                            <div class="social-info-icon">
                                <i class="fa-brands fa-twitter"></i>
                                <input type="text" placeholder="Nom d'utilisateur Twitter" />
                            </div>
                            <div class="social-info-icon">
                                <i class="fa-brands fa-facebook-f"></i>
                                <input type="text" placeholder="Nom d'utilisateur Facebook" />
                            </div>
                            <div class="social-info-icon">
                                <i class="fa-brands fa-linkedin"></i>
                                <input type="text" placeholder="Nom d'utilisateur LinkedIn" />
                            </div>
                            <div class="social-info-icon">
                                <i class="fa-brands fa-youtube"></i>
                                <input type="text" placeholder="Nom d'utilisateur YouTube" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="../js/script.js"></script>
</body>
</html>
