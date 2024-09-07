<div class="menu-sidebar">
  <div class="brand">
    <i class="fa-solid fa-xmark xmark"></i>
    <h3 class="brand-name"><?php echo $_SESSION['nomuser']; ?></h3>
  </div>
  <ul>
    <li>
      <a href="../acceuil.php" class="sidebar-link">
        <i class="fa-regular fa-chart-bar fa-fw"></i>
        <span>Tableau de bord</span>
      </a>
    </li>
    <li>
      <a href="Profile.php" class="sidebar-link">
        <i class="fa-regular fa-user fa-fw"></i><span>Profile</span>
      </a>
    </li>
    <li>
      <a href="Projects.php" class="sidebar-link">
        <i class="fa-solid fa-diagram-project fa-fw"></i
        ><span>Commandes</span>
      </a>
    </li>
    <li>
      <a href="Courses.php" class="sidebar-link">
        <i class="fa-solid fa-graduation-cap fa-fw"></i
        ><span>Produits</span>
      </a>
    </li>
    <li>
      <a href="Friends.php" class="sidebar-link">
        <i class="fa-regular fa-circle-user fa-fw"></i
        ><span>Utilisateurs</span>
      </a>
    </li>
    <li>
      <a href="Files.php" class="sidebar-link">
        <i class="fa-regular fa-file fa-fw"></i> <span>articles</span>
      </a>
    </li>
    <li>
      <a href="Plans.php" class="sidebar-link">
        <i class="fa-regular fa-credit-card fa-fw"></i><span>Forfait</span>
      </a>
    </li>
    <li>
      <a href="settings.php" class="sidebar-link">
        <i class="fa-solid fa-gear fa-fw"></i>
        <span>Reglages</span>
      </a>
    </li>
  </ul>
</div>

<style>
  /* Conteneur principal pour le menu et le contenu */
.page-wrapper {
  display: flex;
}

/* Style du menu */
.menu-sidebar {
  width: 250px;
  background-color: #343a40;
  height: 100vh;
  position: fixed;
  top: 0;
  left: 0;
  padding: 20px;
  box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
  z-index: 1000; /* Assure que le menu est au-dessus du contenu */
}

.menu-sidebar .brand {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-bottom: 20px;
  border-bottom: 1px solid #495057;
}

.menu-sidebar .brand-name {
  color: white;
  font-size: 18px;
  margin-left: 10px;
}

.menu-sidebar ul {
  list-style: none;
  padding: 0;
  margin: 20px 0 0 0;
}

.menu-sidebar li {
  margin-bottom: 15px;
}

.menu-sidebar a.sidebar-link {
  display: flex;
  align-items: center;
  color: #adb5bd;
  text-decoration: none;
  font-size: 16px;
}

.menu-sidebar a.sidebar-link:hover {
  color: white;
}

.menu-sidebar i {
  margin-right: 10px;
  font-size: 18px;
}

/* Contenu principal */
.main-content {
  margin-left: 250px; /* Ajuste la marge pour laisser de l'espace pour le menu */
  padding: 20px;
  flex-grow: 1;
}

/* Mobile */
@media (max-width: 768px) {
  .menu-sidebar {
    width: 200px;
  }

  .main-content {
    margin-left: 200px;
  }

  .menu-sidebar a.sidebar-link {
    font-size: 14px;
  }
}

</style>