<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?php echo $images_path; ?>logo/favlogo.png" />
  <title><?php echo getTitle(); ?></title>
  <!-- Styles -->
  <link rel="stylesheet" href="<?php echo $packages_path; ?>bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo $packages_path; ?>@fortawesome/fontawesome-free/css/all.min.css" />
  <link rel="stylesheet" href="<?php echo $packages_path; ?>hover.css/css/hover-min.css" />
  <link rel="stylesheet" href="<?php echo $packages_path; ?>animate.css/animate.min.css">
  <link rel="stylesheet" href="<?php echo $css_path; ?>main.css" />
</head>

<body dir="<?php echo $_COOKIE['language'] == "en" ? 'ltr' : 'rtl' ?>" class="<?php echo $_COOKIE['language'] == "en" ? 'english' : 'arabic' ?>">
  <header class="header" id="header">
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/new-project">
          <div class="brand-image hvr-bounce-in">
            <img src="<?php echo $images_path; ?>logo/logo-with-name.png" alt="<?php echo t("Point Media"); ?>">
          </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav <?php echo $_COOKIE['language'] == "en" ? 'ms' : 'me' ?>-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#"><?php echo t("Home"); ?></a>
            </li>
            <li class="nav-item dropdown">
              <span class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo t("Our Services"); ?>
              </span>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="our-services.php?language=<?php echo $_COOKIE['language'] ?>&service=gd"><?php echo t("Graphic Design"); ?></a>
                </li>
                <li>
                  <a class="dropdown-item" href="our-services.php?language=<?php echo $_COOKIE['language'] ?>&service=maa"><?php echo t("Marketing and Advertising"); ?></a>
                </li>
                <li>
                  <a class="dropdown-item" href="our-services.php?language=<?php echo $_COOKIE['language'] ?>&service=wd"><?php echo t("Websites development"); ?></a>
                </li>
                <li>
                  <a class="dropdown-item" href="our-services.php?language=<?php echo $_COOKIE['language'] ?>&service=pae"><?php echo t("Photography and editing"); ?></a>
                </li>
                <li>
                  <a class="dropdown-item" href="our-services.php?language=<?php echo $_COOKIE['language'] ?>&service=ts"><?php echo t("Translation Services"); ?></a>
                </li>
                <li>
                  <a class="dropdown-item" href="our-services.php?language=<?php echo $_COOKIE['language'] ?>&service=es"><?php echo t("engineering services"); ?></a>
                </li>
                <li>
                  <a class="dropdown-item" href="our-services.php?language=<?php echo $_COOKIE['language'] ?>&service=tc"><?php echo t("Training Courses"); ?></a>
                </li>
                <li>
                  <a class="dropdown-item" href="our-services.php?language=<?php echo $_COOKIE['language'] ?>&service=nps"><?php echo t("Non-Profit Services"); ?></a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><?php echo t("Portfolio"); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><?php echo t("About Us"); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><?php echo t("Our Works"); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><?php echo t("Our Clients"); ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><?php echo t("Contact Us"); ?></a>
            </li>
            <li class="nav-item">
              <?php
              if ($_COOKIE['language'] == "en") {
                // include("en.php");
                // include $langs_path . 'en.php';
                echo '<a class="nav-link" href="?language=ar">عربي</a>';
              } else {
                // include("ar.php");
                echo '<a class="nav-link" href="?language=en">English</a>';
                // include $langs_path . 'ar.php';
              }
              ?>
            </li>
            <?php
            if (isset($_SESSION['AdminName'])) {
            ?>
              <li class="nav-item dropdown">
                <span class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php echo t($_SESSION['AdminName']); ?>
                </span>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="admin"><?php echo t("Dashboard"); ?></a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="admin/logout.php"><?php echo t("Logout"); ?></a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                </ul>
              </li>
            <?php
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>