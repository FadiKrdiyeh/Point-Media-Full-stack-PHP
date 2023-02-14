<header class="header" id="header">
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/new-project">
        <div class="brand-image hvr-bounce-in">
          <img src="<?php echo $images_path; ?>logo/logo-with-name.png" alt="Point Media">
        </div>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto me-0 mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./"><i class="fa fa-dashboard me-2 ms-0"></i> الصفحة الرئيسية</a>
          </li>
          <li class="nav-item dropdown">
            <span class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-tasks me-1 ms-0"></i> إدارة
            </span>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="courses.php?do=Manage"><i class="fa fa-edit me-2 ms-0"></i> الدورات التدريبية</a>
              </li>
              <li>
                <a class="dropdown-item" href="works.php?do=Manage"><i class="fa fa-edit me-2 ms-0"></i> الأعمال</a>
              </li>
              <li>
                <a class="dropdown-item" href="blog.php?do=Manage"><i class="fa fa-edit me-2 ms-0"></i> المقالات</a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <span class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-plus me-1 ms-0"></i> إضافة
            </span>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="courses.php?do=Add"><i class="fa fa-minus me-2 ms-0"></i> الدورات التدريبية</a>
              </li>
              <li>
                <a class="dropdown-item" href="works.php?do=Add"><i class="fa fa-minus me-2 ms-0"></i> الأعمال</a>
              </li>
              <li>
                <a class="dropdown-item" href="blog.php?do=Add"><i class="fa fa-minus me-2 ms-0"></i> المقالات</a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <span class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-user-circle me-1 ms-0"></i> <?php echo $_SESSION['AdminName'] ?>
            </span>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="../"><i class="fa fa-eye me-2 ms-0"></i> عرض الموقع</a>
              </li>
              <li>
              <li>
                <a class="dropdown-item" href="sittings.php"><i class="fa fa-gear me-2 ms-0"></i> الإعدادات</a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out me-2 ms-0"></i> تسجيل الخروج</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>