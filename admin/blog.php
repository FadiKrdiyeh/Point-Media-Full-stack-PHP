<?php
session_start();
if (isset($_SESSION['AdminName'])) {
  $pageTitle = 'إدارة المقالات';
  include "connect.php";
  $do = '';
  $do = isset($_GET['do']) && $_GET['do'] != '' ? $_GET['do'] : 'Manage';
  // Manage blog
  if ($do === 'Manage') {
    include "init.php";

    // Define total number of results per page  
    $resultsPerPage = 6;
    $query = "SELECT COUNT(id) FROM blog";
    $countBlogStmt = $con->prepare($query);
    $countBlogStmt->execute();
    $numberOfResult = $countBlogStmt->fetchColumn();

    // Determine the total number of pages available
    $numberOfPages = ceil($numberOfResult / $resultsPerPage);

    // Determine which page number visitor is currently on
    if (!isset($_GET['page'])) {
      $page = 1;
    } else {
      $page = $_GET['page'];
    }

    // Determine the sql LIMIT starting number for the results on the displaying page  
    $pageFirstResult = ($page - 1) * $resultsPerPage;

    //retrieve the selected results from database   
    $query = "SELECT * FROM blog ORDER BY (id) DESC LIMIT " . $pageFirstResult . ',' . $resultsPerPage;
    $allBlogStmt = $con->prepare($query);
    $allBlogStmt->execute();
    $blogs = $allBlogStmt->fetchAll();
?>
    <section class="blog manage">
      <div class="container-lg">
        <h2 class="our-blog-title text-center">إدارة المقالات</h2>
        <div id="live-search" class="mb-4">
          <div class="row justify-content-center">
            <div class="col-1"><button class="btn btn-primary flip-info w-100" data-lang="ar">إنكليزي</button></div>
            <div class="col-md-6">
              <input type="text" class="form-control search-input" name="search" id="blog-search-input" placeholder="بحث عن مقالات..." data-lang="ar" />
            </div>
          </div>
        </div>
        <div class="alert alert-secondary text-center mt-5 total_results">عدد النتائج: <span id="total_results"></div>
        <div class="row search-result" id="blog">
          <?php
          if (!empty($blogs)) {
            foreach ($blogs as $blog) {
              $isArabicLongerThanEnglish = strlen($blog['article_ar']) > strlen($blog['article_en']) ? true : false;
          ?>
              <div class="col-md-4 mb-sm-5 blog-<?php echo $blog['id'] ?>">
                <div class="our-blog-item">
                  <a href="blog.php?do=Show&blogId=<?php echo $blog['id'] ?>" style="text-decoration: none;">
                    <div class="card">
                      <img src="<?php echo !isset($blog['image']) || empty($blog['image']) ? '../layouts/images/carousel/2.png' : '../layouts/images/uploads/blogs/' . $blog['image'] ?>" class="card-img-top" alt="">
                      <div class="card-body">
                        <div class="our-blog-content">
                          <div class="flip-card">
                            <div class="face front active" <?php echo !$isArabicLongerThanEnglish ? 'style="position: absolute;"' : '' ?>>
                              <a href="blog.php?do=Show&blogId=<?php echo $blog['id'] ?>" style="text-decoration: none;">
                                <h5 class="blog-title title-ar card-title"><?php echo $blog['title_ar'] ?></h5>
                                <div class="blog-content blog-content-ar"><?php echo limit_text($blog['article_ar'], 25) ?></div>
                              </a>
                            </div>
                            <div class="face back" <?php echo $isArabicLongerThanEnglish ? 'style="position: absolute;"' : '' ?>>
                              <a href="#" style="text-decoration: none;">
                                <h5 class="blog-title title-en card-title"><?php echo $blog['title_en'] ?></h5>
                                <div class="blog-content blog-content-en"><?php echo limit_text($blog['article_en'], 25) ?></div>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer text-muted text-center">
                        <div class="blog-read-more-btn d-flex justify-content-around w-75 text-center ms-auto">
                          <a href="blog.php?do=Edit&blogId=<?php echo $blog['id'] ?>" class="btn btn-primary">تعديل <i class="fa fa-edit"></i></a>
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-danger delete-blog-confirm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $blog['id'] ?>" data-title="<?php echo $blog['title_ar'] ?>">
                            حذف <i class="fa fa-close"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            <?php
            }
            ?>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">هل أنت متأكد أنك تريد حذف المقالة <span class="delete-title"></span>؟</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-footer text-center">
                    <a href="blog.php?do=Delete" class="btn btn-success w-25 delete-blog" data-id="0" data-bs-dismiss="modal">حذف <i class="fa fa-check"></i></a>
                    <button type="button" class="btn btn-danger w-25" data-bs-dismiss="modal">إلغاء <i class="fa fa-close"></i></button>
                  </div>
                </div>
              </div>
            </div>
          <?php
          } else {
          ?>
            <div class="container">
              <div class="alert alert-secondary text-center">لا توجد مقالات...</div>
            </div>
          <?php
          }
          ?>
        </div>
        <div class="text-center fixed-bottom alert alert-success" id="successMsg" style="display: none;"></div>
      </div>
    </section>
    <?php
    if ($numberOfResult > $resultsPerPage) {
    ?>
      <nav class="d-flex justify-content-center" aria-label="...">
        <ul class="pagination">
          <li class="page-item <?php echo $page == 1 ? 'disabled' : ''; ?>">
            <a class="page-link" href="blog.php?do=Manage&page=<?php echo $_GET['page'] - 1 ?>">Previous</a>
          </li>
          <?php
          //display the link of the pages in URL  
          for ($p = 1; $p <= $numberOfPages; $p++) {
            $isActive = $page == $p ? " active" : "";
            echo '<li class="page-item' . $isActive . '"><a href="blog.php?do=Manage&page=' . $p . '" class="page-link">' . $p . ' </a></li>';
          }
          ?>
          <li class="page-item <?php echo $page == $numberOfPages ? 'disabled' : ''; ?>">
            <a class="page-link" href="blog.php?do=Manage&page=<?php echo $_GET['page'] + 1 ?>">Next</a>
          </li>
        </ul>
      </nav>
    <?php
    }
    ?>
    <?php
    include $templates_path . "footer.php";
  } elseif ($do === 'Search') {
    include "includes/functions/functions.php";

    $searchBlogText = isset($_GET['search']) && is_string($_GET['search']) ? strval($_GET['search']) : '';
    $searchingLang = isset($_GET['searchingLang']) && is_string($_GET['searchingLang']) ? strval($_GET['searchingLang']) : 'ar';

    $searchBlogStmt = $con->prepare("SELECT * FROM blog WHERE title_$searchingLang LIKE ?");
    $searchBlogStmt->execute(array('%' . $searchBlogText . '%'));
    $blogsResult = $searchBlogStmt->fetchAll();
    $searchResultCount = $searchBlogStmt->rowCount();
    if ($searchResultCount > 0) {
      $output = '';
      foreach ($blogsResult as $blog) {
        // $isArabicLongerThanEnglish = '';
        $arabicIsLonger = '';
        if (strlen($blog['article_ar']) > strlen($blog['article_en'])) {
          $arabicIsLonger = 'style="position: absolute;"';
        }

        $englishIsLonger = '';
        if (strlen($blog['article_ar']) < strlen($blog['article_en'])) {
          $englishIsLonger = 'style="position: absolute;"';
        }

        $forFront = $searchingLang == 'ar' ? 'active' : '';
        $forBack = $searchingLang == 'en' ? 'active' : '';
        $imageURL = !isset($blog['image']) || empty($blog['image']) ? '../layouts/images/carousel/2.png' : '../layouts/images/uploads/blogs/' . $blog['image'];

        $output .= '<div class="col-md-4 mb-sm-5 blog-' . $blog['id'] . '">
        <div class="our-blog-item">
          <a href="blogs.php?do=Show&blogId=' . $blog['id'] . '" style="text-decoration: none;">
            <div class="card">
              <img src="' . $imageURL . '" class="card-img-top" alt="">
              <div class="card-body">
                <div class="our-blog-content">
                  <div class="flip-card">
                    <div class="face front ' . $forFront . '" ' . $arabicIsLonger . '>
                      <a href="blogs.php?do=Show&blogId=' . $blog['id'] . '" style="text-decoration: none;">
                        <h5 class="blog-title title-ar card-title">' . $blog['title_ar'] . '</h5>
                        <div class="blogs-content blogs-content-ar">' . $blog['article_ar'] . '</div>
                      </a>
                    </div>
                    <div class="face back ' . $forBack . '" ' . $englishIsLonger . '>
                      <a href="#" style="text-decoration: none;">
                        <h5 class="blog-title title-en card-title">' . $blog['title_en'] . '</h5>
                        <div class="blogs-content blogs-content-en">' . $blog['article_en'] . '</div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer text-muted text-center">
                <div class="blogs-read-more-btn d-flex justify-content-around w-75 text-center ms-auto">
                  <a href="blogs.php?do=Edit&blogId=' . $blog['id'] . '" class="btn btn-primary">تعديل <i class="fa fa-edit"></i></a>
                  <!-- Button trigger modal -->
                  <a type="button" class="btn btn-danger delete-blog-confirm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="' . $blog['id'] . '" data-title="' . $blog['title_ar'] . '">
                    حذف <i class="fa fa-close"></i>
                  </a>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>';
      }
      echo json_encode(array("status" => true, "msg" => "Done!!", "total_results" => $searchResultCount, "blogs_data" => $output));
    } else {
      $output = '<div class="alert alert-secondary text-center no-data-msg">لم يتم العثور على نتائج...</div>';
      echo json_encode(array("status" => false, "msg" => "Not Done!!", "total_results" => $searchResultCount, "blogs_data" => $output));
    }
  } elseif ($do === 'Show') {
    include "init.php";

    $showBlogId = isset($_GET['blogId']) && is_numeric($_GET['blogId']) ? intval($_GET['blogId']) : 0;

    // Check If Blog Exists
    $showBlogStmt = $con->prepare("SELECT * from blog WHERE id = ? LIMIT 1");
    $showBlogStmt->execute(array($showBlogId));
    $showBlogsCount = $showBlogStmt->rowCount();

    // if $countBlog > 0 The Blog Is Exists 
    if ($showBlogsCount > 0) {
      $blog = $showBlogStmt->fetch();
      $isArabicLongerThanEnglish = strlen($blog['article_ar']) > strlen($blog['article_en']) ? true : false;
    ?>
      <section class="blog manage">
        <div class="container-lg">
          <h2 class="our-blog-title text-center">إدارة المقالات</h2>
          <div id="live-search" class="mb-4">
            <div class="row justify-content-center">
              <div class="col-1"><button class="btn btn-primary flip-info" data-lang="ar">إنكليزي</button></div>
              <div class="col-md-6">
                <input type="text" class="form-control search-input" name="search" id="blog-search-input" placeholder="بحث عن مقالات..." data-lang="ar" />
              </div>
            </div>
          </div>
          <div class="alert alert-secondary text-center mt-5 total_results">عدد النتائج: <span id="total_results"></div>
          <div class="search-result" id="blog">
            <div class="col-md- mb-sm-5 blog-<?php echo $blog['id'] ?>">
              <div class="row">
                <div class="col-md-4">
                  <img src="<?php echo !isset($blog['image']) || empty($blog['image']) ? '../layouts/images/carousel/2.png' : '../layouts/images/uploads/blogs/' . $blog['image'] ?>" class="card-img-top" alt="">
                </div>
                <div class="col-md-8 mb-sm-5 blog-<?php echo $blog['id'] ?>">
                  <div class="our-blog-item">
                    <div class="card">
                      <div class="card-body">
                        <div class="our-blog-content">
                          <div class="flip-card">
                            <div class="face front active" <?php echo !$isArabicLongerThanEnglish ? 'style="position: absolute;"' : '' ?>>
                              <h5 class="blog-title title-ar card-title"><?php echo $blog['title_ar'] ?></h5>
                              <div class="blog-content blog-content-ar"><?php echo $blog['article_ar'] ?></div>
                            </div>
                            <div class="face back" <?php echo $isArabicLongerThanEnglish ? 'style="position: absolute;"' : '' ?>>
                              <h5 class="blog-title title-en card-title"><?php echo $blog['title_en'] ?></h5>
                              <div class="blog-content blog-content-en"><?php echo $blog['article_en'] ?></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer text-muted text-center">
                        <div class="blogs-read-more-btn d-flex justify-content-around w-75 text-center ms-auto buttons-side">
                          <a href="blog.php?do=Edit&blogId=<?php echo $blog['id'] ?>" class="btn btn-primary">تعديل <i class="fa fa-edit"></i></a>
                          <!-- Button trigger modal -->
                          <a type="button" class="btn btn-danger delete-blog-confirm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $blog['id'] ?>" data-title="<?php echo $blog['title_ar'] ?>">
                            حذف <i class="fa fa-close"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">هل أنت متأكد أنك تريد حذف المقال <span class="delete-title"></span>؟</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-footer text-center">
                    <a href="blog.php?do=Delete" class="btn btn-success w-25 delete-blog from-show-page" data-id="0" data-bs-dismiss="modal">حذف <i class="fa fa-check"></i></a>
                    <button type="button" class="btn btn-danger w-25" data-bs-dismiss="modal">إلغاء <i class="fa fa-close"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center fixed-bottom alert alert-success" id="successMsg" style="display: none;"></div>
        </div>
      </section>
    <?php
    } else {
    ?>
      <div class="container py-5">
        <h2 class="our-blogs-title text-center my-5">إدارة المقالات</h2>
        <div class="alert alert-secondary text-center my-5">هذه المقالة لم تعد متوفرة...</div>
      </div>
    <?php
    }
    include $templates_path . "footer.php";
  } elseif ($do === 'Add') {
    include "init.php";
    ?>
    <section class="blogs manage add">
      <div class="container pb-5">
        <h2 class="our-blogs-title text-center mb-5">إدارة المقالات</h2>
        <div class="form-container">
          <form method="POST" id="addBlogForm" enctype="multipart/form-data">
            <div class="row text-start">
              <div class="col-md-4 mb-3 text-md-end">
                <label for="imageInput">اختر صورة للمقال:</label>
              </div>
              <div class="col-md-8 mb-3">
                <input type="file" id="imageInput" class="form-control" name="image" placeholder="" />
                <small id="image_error" class="error-validation-messages"></small>
              </div>
              <div class="col-md-4 mb-3 text-md-end">
                <label for="titleArInput">عنوان المقال بالعربي:</label>
              </div>
              <div class="col-md-8 mb-3">
                <input type="text" id="titleArInput" class="form-control validation-on-typing" name="titleAr" placeholder="عنوان المقال بالعربي..." />
                <small id="titleAr_error" class="error-validation-messages"></small>
              </div>
              <div class="col-md-4 mb-3 text-md-end">
                <label for="titleEnInput">عنوان المقال بالإنكليزي:</label>
              </div>
              <div class="col-md-8 mb-3">
                <input type="text" id="titleEnInput" class="form-control" name="titleEn" placeholder="Article Title In English..." dir="ltr" />
                <small id="titleEn_error" class="error-validation-messages"></small>
              </div>
              <div class="col-md-4 mb-3 text-md-end">
                <label for="articelAr">نص المقالة بالعربي:</label>
              </div>
              <div class="col-md-8 mb-3">
                <!-- <input type="text" class="form-control" /> -->
                <textarea name="articleAr" id="articleArInput" class="form-control" cols="30" rows="3" style="max-height: 150px;" placeholder="اكتب نص المقال بالعربي..."></textarea>
                <small id="articleAr_error" class="error-validation-messages"></small>
              </div>
              <div class="col-md-4 mb-3 text-md-end">
                <label for="articleEnInput">نص المقال بالإنكليزي :</label>
              </div>
              <div class="col-md-8 mb-3">
                <!-- <input type="text" class="form-control" /> -->
                <textarea name="articleEn" id="articleEnInput" class="form-control" cols="30" rows="3" style="max-height: 150px;" placeholder="ًWrite Blog Text In English..." dir="ltr"></textarea>
                <small id="articleEn_error" class="error-validation-messages"></small>
              </div>
              <button type="submit" name="submitBlog" class="btn btn-primary d-block mt-3" id="addBlogBtn">إضافة <i class="fa fa-plus"></i></button>
              <!-- <input type="submit" name="submitBlog" class="btn btn-primary d-block mt-3" id="addBlogBtn" value="&#xf043;" /> -->
            </div>
          </form>
        </div>
        <div class="text-center fixed-bottom alert alert-success" id="successMsg" style="display: none;"></div>
        <div class="text-center fixed-bottom alert alert-danger" id="errorMsg" style="display: none;"></div>
      </div>
    </section>
    <?php
    include $templates_path . "footer.php";
  } elseif ($do === 'Insert') {
    if (!isset($_FILES["image"]) || empty($_FILES["image"]) || !isset($_POST["titleAr"]) || empty($_POST["titleAr"]) || !isset($_POST["titleEn"]) || empty($_POST["titleEn"]) || !isset($_POST["articleAr"]) || empty($_POST["articleAr"]) || !isset($_POST["articleEn"]) || empty($_POST["articleEn"])) {
      echo json_encode(array("status" => false, "msg" => "لم تتم الإضافة!! الرجاء ملئ جميع البيانات..."));
    }
    // Check if image file is a actual image or fake image
    else {
      $target_dir = "/../layouts/images/uploads/blogs/";
      $imageFileType = strtolower(pathinfo(basename($_FILES["image"]["name"]), PATHINFO_EXTENSION));
      $file_name = time() . '.' . $imageFileType;
      $target_file = $target_dir . $file_name;
      $uploadOk = 1;
      $check = getimagesize($_FILES["image"]["tmp_name"]);
      $uploadMsg = '';
      if ($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        // echo "File is not an image.";
        $uploadMsg = "لم تتم الإضافة!! الملف ليس صورة...";
        // echo json_encode(array("status" => false, "msg" => "لم تتم الإضافة!! الملف ليس صورة..."));
        $uploadOk = 0;
      }
      // Check if file already exists
      if (file_exists($target_file)) {
        // echo "Sorry, file already exists.";
        $uploadMsg = "لم تتم الإضافة!! الملف موجود مسبقاً...";
        // echo json_encode(array("status" => false, "msg" => "لم تتم الإضافة!! الملف موجود مسبقاً..."));
        $uploadOk = 0;
      }

      // Check file size
      if ($_FILES["image"]["size"] > 10500000) {
        // echo "Sorry, your file is too large.";
        $uploadMsg = "لم تتم الإضافة!! الملف كبير جداً...";
        // echo json_encode(array("status" => false, "msg" => "لم تتم الإضافة!! الملف كبير جداً..."));
        $uploadOk = 0;
      }
      // echo json_encode(array("ad" => "asdkj"));

      // Allow certain file formats
      if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
      ) {
        // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed."
        $uploadMsg = "لم تتم الإضافة!! الملفات المسموح بها هي JPG, JPEG, PNG, GIF فقط...";
        // echo json_encode(array("status" => false, "msg" => "لم تتم الإضافة!! الملفات المسموح بها هي JPG, JPEG, PNG, GIF فقط..."));
        $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        // echo "Sorry, your file was not uploaded.";
        echo json_encode(array("status" => false, "msg" => $uploadMsg));
        // if everything is ok, try to upload file
      } else {
        // move_uploaded_file()
        if (move_uploaded_file($_FILES["image"]["tmp_name"], __DIR__ . $target_file)) {
          // echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
          $insertBlogStmt = $con->prepare("INSERT INTO
                                              blog (title_ar, title_en, article_ar, article_en, `image`)
                                            VALUES
                                              (:ztitleAr, :ztitleEn, :zarticleAr, :zarticleEn, :zimage)");
          $insertBlogStmt->execute(array(
            'ztitleAr' => $_POST['titleAr'],
            'ztitleEn' => $_POST['titleEn'],
            'zarticleAr' => $_POST['articleAr'],
            'zarticleEn' => $_POST['articleEn'],
            'zimage' => $file_name,
          ));
          if ($insertBlogStmt) {
            echo json_encode(array("status" => true, "msg" => "تمت الإضافة بنجاح!!", "msg2" => "تم تحميل الملف: " . htmlspecialchars(basename($_FILES["image"]["name"])) . " بنجاح..."));
          } else {
            unlink(__DIR__ . $target_file);
            echo json_encode(array("status" => false, "msg" => "لم تتم الإضافة!! حصل خطأ ما...", "msg2" => "لم يتم تحميل الملف.."));
          }
        } else {
          // echo "Sorry, there was an error uploading your file.";
          echo json_encode(array("status" => false, "msg" => "عذراً!! حصلت مشكلة أثناء تحميل الملف..."));
        }
      }
    }
  } elseif ($do === 'Edit') {
    include "init.php";
    $editBlogId = isset($_GET['blogId']) && is_numeric($_GET['blogId']) ? intval($_GET['blogId']) : 0;

    // Check If Blog Exists
    $editBlogStmt = $con->prepare("SELECT * from blog WHERE id = ? LIMIT 1");
    $editBlogStmt->execute(array($editBlogId));
    $editBlogsCount = $editBlogStmt->rowCount();

    // if $editBlogsCount > 0 The Blog Is Exists 
    if ($editBlogsCount > 0) {
      $blogForEdit = $editBlogStmt->fetch();
    ?>
      <section class="blog manage edit">
        <div class="container pb-5">
          <h2 class="our-blogs-title text-center mb-5">إدارة المقالات</h2>
          <div class="form-container">
            <form method="POST" id="editBlogForm" enctype="multipart/form-data">
              <div class="row text-start">
                <!-- Input type Hidden -->
                <input type="hidden" name="blogId" value="<?php echo $blogForEdit['id'] ?>" />
                <div class="col-md-4 mb-3 text-md-end">
                  <label for="imageInput">اختر صورة للمقالة:</label>
                </div>
                <div class="col-md-8 mb-3">
                  <input type="file" id="imageInput" class="form-control" name="image" placeholder="" />
                  <small id="image_error" class="error-validation-messages"></small>
                </div>
                <div class="col-md-4 mb-3 text-md-end">
                  <label for="titleArInput">عنوان المقالة بالعربي:</label>
                </div>
                <div class="col-md-8 mb-3">
                  <input type="text" id="titleArInput" class="form-control" name="titleAr" placeholder="عنوان المقالة بالعربي..." value="<?php echo $blogForEdit['title_ar'] ?>" />
                  <small id="titleAr_error" class="error-validation-messages"></small>
                </div>
                <div class="col-md-4 mb-3 text-md-end">
                  <label for="titleEnInput"> عنوان المقالة بالإنكليزي:</label>
                </div>
                <div class="col-md-8 mb-3">
                  <input type="text" id="titleEnInput" class="form-control" name="titleEn" placeholder="Article Title In English..." value="<?php echo $blogForEdit['title_en'] ?>" dir="ltr" />
                  <small id="titleEn_error" class="error-validation-messages"></small>
                </div>
                <div class="col-md-4 mb-3 text-md-end">
                  <label for="articleArInput">نص المقالة بالعربي:</label>
                </div>
                <div class="col-md-8 mb-3">
                  <!-- <input type="text" class="form-control" /> -->
                  <textarea name="articleAr" id="articleArInput" class="form-control" cols="30" rows="3" style="max-height: 150px;" placeholder="اكتب نص المقالة بالعربي..."><?php echo $blogForEdit['article_ar'] ?></textarea>
                  <small id="articleAr_error" class="error-validation-messages"></small>
                </div>
                <div class="col-md-4 mb-3 text-md-end">
                  <label for="articleEnInput">نص المقالة بالإنكليزي :</label>
                </div>
                <div class="col-md-8 mb-3">
                  <!-- <input type="text" class="form-control" /> -->
                  <textarea name="articleEn" id="articleEnInput" class="form-control" cols="30" rows="3" style="max-height: 150px;" placeholder="Write the text of the article in English..." dir="ltr"><?php echo $blogForEdit['article_en'] ?></textarea>
                  <small id="articleEn_error" class="error-validation-messages"></small>
                </div>
                <button type="submit" name="editBlog" class="btn btn-primary d-block mt-3" id="editBlogBtn">حفظ التغييرات <i class="fa fa-edit"></i></button>
                <!-- <input type="submit" name="submitBog" class="btn btn-primary d-block mt-3" id="addBlogBtn" value="&#xf043;" /> -->
              </div>
            </form>
          </div>
          <div class="text-center fixed-bottom alert alert-success" id="successMsg" style="display: none;"></div>
        </div>
      </section>
    <?php
    } else {
    ?>
      <div class="container py-5">
        <h2 class="our-blogs-title text-center my-5">إدارة المقالات</h2>
        <div class="alert alert-secondary text-center my-5">هذه المقالة لم تعد متوفرة...</div>
      </div>
<?php
    }
    include $templates_path . "footer.php";
  } elseif ($do === 'Update') {
    // Get Blog Id To Delete
    $blogIdForUpdate = isset($_POST['blogId']) ? intval($_POST['blogId']) : 0;

    // Check If Blog Exists
    $updateCheckBlogStmt = $con->prepare("SELECT * from blog WHERE id = ? LIMIT 1");
    $updateCheckBlogStmt->execute(array($blogIdForUpdate));
    $updateCountBlogs = $updateCheckBlogStmt->rowCount();

    if ($updateCountBlogs > 0) {
      if (!isset($_POST["titleAr"]) || empty($_POST["titleAr"]) || !isset($_POST["titleEn"]) || empty($_POST["titleEn"]) || !isset($_POST["articleAr"]) || empty($_POST["articleAr"]) || !isset($_POST["articleEn"]) || empty($_POST["articleEn"])) {
        echo json_encode(array("status" => false, "msg" => "فشل التحديث!!"));
      }
      // Check if image file is a actual image or fake image
      else {
        // Check If There Is New Image
        if (isset($_FILES['image']) && !empty($_FILES['image'])) {
          $target_dir = "/../layouts/images/uploads/blogs/";
          $imageFileType = strtolower(pathinfo(basename($_FILES["image"]["name"]), PATHINFO_EXTENSION));
          $file_name = time() . '.' . $imageFileType;
          $target_file = $target_dir . $file_name;
          $uploadOk = 1;
          // echo $uploadOk;
          $check = getimagesize($_FILES["image"]["tmp_name"]);
          if ($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
          } else {
            // echo "File is not an image.";
            echo json_encode(array("status" => false, "msg" => "Not Done!! File is not an image."));
            $uploadOk = 0;
          }
          // echo $uploadOk;
          // Check if file already exists
          if (file_exists($target_file)) {
            // echo "Sorry, file already exists.";
            echo json_encode(array("status" => false, "msg" => "Not Done!! Sorry, file already exists."));
            $uploadOk = 0;
          }
          // echo $uploadOk;

          // Check file size
          if ($_FILES["image"]["size"] > 10500000) {
            // echo "Sorry, your file is too large.";
            echo json_encode(array("status" => false, "msg" => "Not Done!! Sorry, your file is too large."));
            $uploadOk = 0;
          }

          // echo $uploadOk;
          $allowedExt = ["jpg", "png", "jpeg", "gif"];
          // Allow certain file formats
          if (!in_array($imageFileType, $allowedExt)) {
            // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            echo json_encode(array("status" => false, "msg" => "Not Done!! Sorry, only JPG, JPEG, PNG & GIF files are allowed."));
            $uploadOk = 0;
          }
          echo $uploadOk;

          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
            // echo "Sorry, your file was not uploaded.";
            echo json_encode(array("status" => false, "msg" => "Not Done!! Sorry, your file was not uploaded."));
            // if everything is ok, try to upload file
          } else {
            // move_uploaded_file()
            if (move_uploaded_file($_FILES["image"]["tmp_name"], __DIR__ . $target_file)) {
              // echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
              unlink(__DIR__ . $target_dir . $blogForUpdate['image']);
              $blogForUpdate = $updateCheckBlogStmt->fetch();
              // Update Statment With Image
              $updateBlogStmt = $con->prepare("UPDATE blog SET title_ar = ?, title_en = ?, article_ar = ?, article_en = ?, `image` = ? WHERE id = $blogIdForUpdate");
              $updateBlogStmt->execute(array($_POST['titleAr'], $_POST['titleEn'], $_POST['articleAr'], $_POST['articleEn'], $file_name));
              if ($updateBlogStmt) {
                echo json_encode(array("status" => true, "msg" => "Done!! Article Added To Database Successfully!!", "msg2" => "Done!! The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded."));
              } else {
                unlink(__DIR__ . $target_file);
                echo json_encode(array("status" => false, "msg" => "Not Done!! Article Not Added To Database!!", "msg2" => "Sorry, your file was not uploaded."));
              }
            } else {
              // echo "Sorry, there was an error uploading your file.";
              echo json_encode(array("status" => false, "msg" => "Not Done!! Sorry, there was an error uploading your file."));
            }
          }
        } else {
          // Just Update Without Image
          $updateBlogStmt = $con->prepare("UPDATE blog SET title_ar = ?, title_en = ?, article_ar = ?, article_en = ? WHERE id = $blogIdForUpdate");
          $updateBlogStmt->execute(array($_POST['titleAr'], $_POST['titleEn'], $_POST['articleAr'], $_POST['articleEn']));
          if ($updateBlogStmt) {
            echo json_encode(array("status" => true, "msg" => "Done!! Article Has Been Edited Successfully!!"));
          } else {
            echo json_encode(array("status" => false, "msg" => "Not Done!! Article Not Been Edited!!"));
          }
        }
      }
    } else {
      echo json_encode(array("status" => false, "msg" => "Not Done!! Couldn't Found Article..."));
    }
  } elseif ($do === 'Delete') {
    // Get Blog Id To Delete
    $blogId = isset($_GET['blogId']) && is_numeric($_GET['blogId']) ? intval($_GET['blogId']) : 0;

    // Check If Blog Exists
    $checkBlogStmt = $con->prepare("SELECT * from blog WHERE id = ? LIMIT 1");
    $checkBlogStmt->execute(array($blogId));
    $countBlogs = $checkBlogStmt->rowCount();

    // if $countBlog > 0 The Blog Is Exists 
    if ($countBlogs > 0) {
      $delBlogStmt = $con->prepare("DELETE FROM blog WHERE id = :zid");
      $delBlogStmt->bindParam(":zid", $blogId);
      $delBlogStmt->execute();

      // Return JSON To Ajax
      echo json_encode(array("status" => true, "msg" => "تم الحذف بنجاح!!"));
    } else {
      echo json_encode(array("status" => false, "msg" => "لم يتم الحذف!! حصل خطأ ما..."));
    }
  } else {
    header('location:dashboard.php');
  }
} else {
  header('Location: index.php');
}
