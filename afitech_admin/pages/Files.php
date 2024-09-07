
<?php

session_start();

if (!isset($_SESSION['user_id'])) { // Si l'utilisateur n'est pas connecté, redirigez vers la page de connexion 
  header("Location: ../" );
  sortie();
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
    <title>Files</title>
  </head>
  <body>
  <?php include_once('./menu.php');?>
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
            <h1>Files</h1>
          </div>
          <div class="files-main-content">
            <div class="files-statistics">
              <h2>Files Statistics</h2>
              <div class="box">
                <div class="file-info">
                  <i class="fa-regular fa-file-pdf"></i>
                  <div>
                    <p>PDF Files</p>
                    <span>130</span>
                  </div>
                </div>
                <span>6.5GB</span>
              </div>
              <div class="box">
                <div class="file-info">
                  <i class="fa-regular fa-images"></i>
                  <div>
                    <p>Images</p>
                    <span>115 Files</span>
                  </div>
                </div>
                <span>3.5GB</span>
              </div>
              <div class="box">
                <div class="file-info">
                  <i class="fa-regular fa-file-word"></i>
                  <div>
                    <p>Word Files</p>
                    <span>110 Files</span>
                  </div>
                </div>
                <span>3.2GB</span>
              </div>
              <div class="box">
                <div class="file-info">
                  <i class="fa-solid fa-file-csv"></i>
                  <div>
                    <p>CSV Files</p>
                    <span>99 Files</span>
                  </div>
                </div>
                <span>2.9GB</span>
              </div>
              <a href="/#"><i class="fa-solid fa-angles-up"></i>Upload</a>
            </div>
            <div class="files-boxes">
              <div class="file-box">
                <i class="fa-solid fa-download"></i>
                <div class="file-box-card-body">
                  <img src="../images/pdf.svg" alt="" />
                  <p>my-file.pdf</p>
                  <span>Zana</span>
                </div>
                <div class="file-box-card-footer">
                  <span>20/06/2020</span>
                  <span>5.5MB</span>
                </div>
              </div>
              <div class="file-box">
                <i class="fa-solid fa-download"></i>
                <div class="file-box-card-body">
                  <img src="../images/avi.svg" alt="" />
                  <p>my-file.avi</p>
                  <span>Admin</span>
                </div>
                <div class="file-box-card-footer">
                  <span>16/05/2021</span>
                  <span>12.5MB</span>
                </div>
              </div>
              <div class="file-box">
                <i class="fa-solid fa-download"></i>
                <div class="file-box-card-body">
                  <img src="../images/eps.svg" alt="" />
                  <p>my-file.eps</p>
                  <span>Uploader</span>
                </div>
                <div class="file-box-card-footer">
                  <span>16/05/2021</span>
                  <span>2.7MB</span>
                </div>
              </div>
              <div class="file-box">
                <i class="fa-solid fa-download"></i>
                <div class="file-box-card-body">
                  <img src="../images/psd.svg" alt="" />
                  <p>my-file.psd</p>
                  <span>Ahmad</span>
                </div>
                <div class="file-box-card-footer">
                  <span>16/05/2021</span>
                  <span>15.1MB</span>
                </div>
              </div>
              <div class="file-box">
                <i class="fa-solid fa-download"></i>
                <div class="file-box-card-body">
                  <img src="../images/dll.svg" alt="" />
                  <p>my-file.dll</p>
                  <span>Coder</span>
                </div>
                <div class="file-box-card-footer">
                  <span>16/05/2021</span>
                  <span>2.2MB</span>
                </div>
              </div>
              <div class="file-box">
                <i class="fa-solid fa-download"></i>
                <div class="file-box-card-body">
                  <img src="../images/png.svg" alt="" />
                  <p>my-file.png</p>
                  <span>Designer</span>
                </div>
                <div class="file-box-card-footer">
                  <span>16/05/2021</span>
                  <span>2.2MB</span>
                </div>
              </div>
              <div class="file-box">
                <i class="fa-solid fa-download"></i>
                <div class="file-box-card-body">
                  <img src="../images/dll.svg" alt="" />
                  <p>my-file.dll</p>
                  <span>Coder</span>
                </div>
                <div class="file-box-card-footer">
                  <span>16/05/2021</span>
                  <span>2.2MB</span>
                </div>
              </div>
              <div class="file-box">
                <i class="fa-solid fa-download"></i>
                <div class="file-box-card-body">
                  <img src="../images/png.svg" alt="" />
                  <p>my-file.png</p>
                  <span>Designer</span>
                </div>
                <div class="file-box-card-footer">
                  <span>16/05/2021</span>
                  <span>2.2MB</span>
                </div>
              </div>
              <div class="file-box">
                <i class="fa-solid fa-download"></i>
                <div class="file-box-card-body">
                  <img src="../images/psd.svg" alt="" />
                  <p>my-file.psd</p>
                  <span>Ahmad</span>
                </div>
                <div class="file-box-card-footer">
                  <span>16/05/2021</span>
                  <span>15.1MB</span>
                </div>
              </div>
              <div class="file-box">
                <i class="fa-solid fa-download"></i>
                <div class="file-box-card-body">
                  <img src="../images/pdf.svg" alt="" />
                  <p>my-file.pdf</p>
                  <span>Zana</span>
                </div>
                <div class="file-box-card-footer">
                  <span>20/06/2020</span>
                  <span>5.5MB</span>
                </div>
              </div>
              <div class="file-box">
                <i class="fa-solid fa-download"></i>
                <div class="file-box-card-body">
                  <img src="../images/avi.svg" alt="" />
                  <p>my-file.avi</p>
                  <span>Admin</span>
                </div>
                <div class="file-box-card-footer">
                  <span>16/05/2021</span>
                  <span>12.5MB</span>
                </div>
              </div>
              <div class="file-box">
                <i class="fa-solid fa-download"></i>
                <div class="file-box-card-body">
                  <img src="../images/eps.svg" alt="" />
                  <p>my-file.eps</p>
                  <span>Uploader</span>
                </div>
                <div class="file-box-card-footer">
                  <span>16/05/2021</span>
                  <span>2.7MB</span>
                </div>
              </div>
              <div class="file-box">
                <i class="fa-solid fa-download"></i>
                <div class="file-box-card-body">
                  <img src="../images/psd.svg" alt="" />
                  <p>my-file.psd</p>
                  <span>Ahmad</span>
                </div>
                <div class="file-box-card-footer">
                  <span>16/05/2021</span>
                  <span>15.1MB</span>
                </div>
              </div>
              <div class="file-box">
                <i class="fa-solid fa-download"></i>
                <div class="file-box-card-body">
                  <img src="../images/dll.svg" alt="" />
                  <p>my-file.dll</p>
                  <span>Coder</span>
                </div>
                <div class="file-box-card-footer">
                  <span>16/05/2021</span>
                  <span>2.2MB</span>
                </div>
              </div>
              <div class="file-box">
                <i class="fa-solid fa-download"></i>
                <div class="file-box-card-body">
                  <img src="../images/png.svg" alt="" />
                  <p>my-file.png</p>
                  <span>Designer</span>
                </div>
                <div class="file-box-card-footer">
                  <span>16/05/2021</span>
                  <span>2.2MB</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <script src="../js/script.js"></script>
  </body>
</html>
