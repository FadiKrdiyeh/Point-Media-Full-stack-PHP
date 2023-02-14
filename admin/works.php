<?php
session_start();
if (isset($_SESSION['AdminName'])) {
  $pageTitle = 'إدارة أعمالنا';
  include "connect.php";
  $do = '';
  $do = isset($_GET['do']) && $_GET['do'] != '' ? $_GET['do'] : 'Manage';
  // Manage Works
  if ($do === 'Manage') {
    include "init.php";

    // Define total number of results per page  
    $resultsPerPage = 6;
    $query = "SELECT COUNT(id) FROM our_works";
    $countWorksStmt = $con->prepare($query);
    $countWorksStmt->execute();
    $numberOfResult = $countWorksStmt->fetchColumn();

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
    $query = "SELECT * FROM our_works ORDER BY (id) DESC LIMIT " . $pageFirstResult . ',' . $resultsPerPage;
    $allWorksStmt = $con->prepare($query);
    $allWorksStmt->execute();
    $works = $allWorksStmt->fetchAll();
?>
    <section class="works manage">
      <div class="container-lg">
        <h2 class="our-works-title text-center">إدارة أعمالنا</h2>
        <div id="live-search" class="mb-4">
          <div class="row justify-content-center">
            <div class="col-1"><button class="btn btn-primary flip-info w-100" data-lang="ar">إنكليزي</button></div>
            <div class="col-md-6">
              <input type="text" class="form-control search-input" name="search" id="works-search-input" placeholder="بحث عن عملنا..." data-lang="ar" />
            </div>
          </div>
        </div>
        <div class="alert alert-secondary text-center mt-5 total_results">عدد النتائج: <span id="total_results"></div>
        <div class="row search-result" id="works">
          <?php
          if (!empty($works)) {
            foreach ($works as $work) {
              $isArabicLongerThanEnglish = strlen($work['description_ar']) > strlen($work['description_en']) ? true : false;
          ?>
              <div class="col-md-4 mb-sm-5 work-<?php echo $work['id'] ?>">
                <div class="our-works-item">
                  <a href="works.php?do=Show&workId=<?php echo $work['id'] ?>" style="text-decoration: none;">
                    <div class="card">
                      <img src="<?php echo !isset($work['image']) || empty($work['image']) ? '../layouts/images/carousel/2.png' : '../layouts/images/uploads/works/' . $work['image'] ?>" class="card-img-top" alt="">
                      <div class="card-body">
                        <div class="our-works-content">
                          <div class="flip-card">
                            <div class="face front active" <?php echo !$isArabicLongerThanEnglish ? 'style="position: absolute;"' : '' ?>>
                              <a href="works.php?do=Show&workId=<?php echo $work['id'] ?>" style="text-decoration: none;">
                                <div class="works-content works-content-ar"><?php echo $work['description_ar'] ?></div>
                              </a>
                            </div>
                            <div class="face back" <?php echo $isArabicLongerThanEnglish ? 'style="position: absolute;"' : '' ?>>
                              <a href="#" style="text-decoration: none;">
                                <div class="works-content works-content-en"><?php echo $work['description_en'] ?></div>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer text-muted text-center">
                        <div class="works-read-more-btn d-flex justify-content-around w-75 text-center ms-auto">
                          <a href="works.php?do=Edit&workId=<?php echo $work['id'] ?>" class="btn btn-primary">تعديل <i class="fa fa-edit"></i></a>
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-danger delete-work-confirm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $work['id'] ?>">
                            حذف <i class=" fa fa-close"></i>
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
                    <h5 class="modal-title" id="exampleModalLabel">هل أنت متأكد أنك تريد حذف العمل <span class="delete-title"></span>؟</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-footer text-center">
                    <a href="works.php?do=Delete" class="btn btn-success w-25 delete-work" data-id="0" data-bs-dismiss="modal">حذف <i class="fa fa-check"></i></a>
                    <button type="button" class="btn btn-danger w-25" data-bs-dismiss="modal">إلغاء <i class="fa fa-close"></i></button>
                  </div>
                </div>
              </div>
            </div>
          <?php
          } else {
          ?>
            <div class="container">
              <div class="alert alert-secondary text-center">لا توجد أعمال...</div>
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
            <a class="page-link" href="works.php?do=Manage&page=<?php echo $_GET['page'] - 1 ?>">Previous</a>
          </li>
          <?php
          //display the link of the pages in URL  
          for ($p = 1; $p <= $numberOfPages; $p++) {
            $isActive = $page == $p ? " active" : "";
            echo '<li class="page-item' . $isActive . '"><a href="works.php?do=Manage&page=' . $p . '" class="page-link">' . $p . ' </a></li>';
          }
          ?>
          <li class="page-item <?php echo $page == $numberOfPages ? 'disabled' : ''; ?>">
            <a class="page-link" href="works.php?do=Manage&page=<?php echo $_GET['page'] + 1 ?>">Next</a>
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

    $searchWorkText = isset($_GET['search']) && is_string($_GET['search']) ? strval($_GET['search']) : '';
    $searchingLang = isset($_GET['searchingLang']) && is_string($_GET['searchingLang']) ? strval($_GET['searchingLang']) : 'ar';

    $searchWorkStmt = $con->prepare("SELECT * FROM our_works WHERE description_$searchingLang LIKE ?");
    $searchWorkStmt->execute(array('%' . $searchWorkText . '%'));
    $worksResult = $searchWorkStmt->fetchAll();
    $searchResultCount = $searchWorkStmt->rowCount();
    if ($searchResultCount > 0) {
      $output = '';
      foreach ($worksResult as $work) {
        $forFront = $searchingLang == 'ar' ? 'active' : '';
        $forBack = $searchingLang == 'en' ? 'active' : '';
        $imageURL = !isset($work['image']) || empty($work['image']) ? '../layouts/images/carousel/2.png' : '../layouts/images/uploads/works/' . $work['image'];

        $arabicIsLonger = '';
        if (strlen($work['description_ar']) > strlen($work['description_en'])) {
          $arabicIsLonger = 'style="position: absolute;"';
        }

        $englishIsLonger = '';
        if (strlen($work['description_ar']) < strlen($work['description_en'])) {
          $englishIsLonger = 'style="position: absolute;"';
        }


        $output .= '
                  <div class="col-md-4 mb-sm-5 work-' . $work['id'] . '">
                    <div class="our-works-item">
                      <a href="works.php?do=Show&workId=' . $work['id'] . '" style="text-decoration: none;">
                        <div class="card">
                          <img src="' . $imageURL . '" class="card-img-top" alt="">
                          <div class="card-body">
                            <div class="our-works-content">
                              <div class="flip-card">
                                <div class="face front active" ' . $arabicIsLonger . '>
                                  <a href="works.php?do=Show&workId=' . $work['id'] . '" style="text-decoration: none;">
                                    <div class="works-content works-content-ar">' . $work['description_ar'] . '</div>
                                  </a>
                                </div>
                                <div class="face back" ' . $englishIsLonger . '>
                                  <a href="#" style="text-decoration: none;">
                                    <div class="works-content works-content-en">' . $work['description_en'] . '</div>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card-footer text-muted text-center">
                            <div class="works-read-more-btn d-flex justify-content-around w-75 text-center ms-auto">
                              <a href="works.php?do=Edit&workId=' . $work['id'] . '" class="btn btn-primary">تعديل <i class="fa fa-edit"></i></a>
                              <!-- Button trigger modal -->
                              <button type="button" class="btn btn-danger delete-work-confirm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="' . $work['id'] . '">
                                حذف <i class=" fa fa-close"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  ';
      }
      echo json_encode(array("status" => true, "msg" => "Done!!", "total_results" => $searchResultCount, "works_data" => $output));
    } else {
      $output = '<div class="alert alert-secondary text-center no-data-msg">لم يتم العثور على نتائج...</div>';
      echo json_encode(array("status" => false, "msg" => "Not Done!!", "total_results" => $searchResultCount, "works_data" => $output));
    }
  } elseif ($do === 'Show') {
    include "init.php";

    $showWorkId = isset($_GET['workId']) && is_numeric($_GET['workId']) ? intval($_GET['workId']) : 0;

    // Check If Works Exists
    $showWorkStmt = $con->prepare("SELECT * from our_works WHERE id = ? LIMIT 1");
    $showWorkStmt->execute(array($showWorkId));
    $showWorksCount = $showWorkStmt->rowCount();

    // if $countBlog > 0 The Works Is Exists 
    if ($showWorksCount > 0) {
      $work = $showWorkStmt->fetch();
      $isArabicLongerThanEnglish = strlen($work['description_ar']) > strlen($work['description_en']) ? true : false;
    ?>
      <section class="works manage">
        <div class="container-lg">
          <h2 class="our-works-title text-center">إدارة أعمالنا</h2>
          <div id="live-search" class="mb-4">
            <div class="row justify-content-center">
              <div class="col-1"><button class="btn btn-primary flip-info" data-lang="ar">إنكليزي</button></div>
              <div class="col-md-6">
                <input type="text" class="form-control" name="search" id="works-search-input" placeholder="بحث عن عملنا..." data-lang="ar" />
              </div>
            </div>
          </div>
          <div class="alert alert-secondary text-center mt-5 total_results">عدد النتائج: <span id="total_results"></div>
          <div class="search-result" id="works">
            <div class="col-md- mb-sm-5 work-<?php echo $work['id'] ?>">
              <div class="row">
                <div class="col-md-4">
                  <img src="<?php echo !isset($work['image']) || empty($work['image']) ? '../layouts/images/carousel/2.png' : '../layouts/images/uploads/works/' . $work['image'] ?>" class="card-img-top" alt="">
                </div>
                <div class="col-md-8 mb-sm-5 work-<?php echo $work['id'] ?>">
                  <div class="our-works-item">
                    <div class="card">
                      <div class="card-body">
                        <div class="our-works-content">
                          <div class="flip-card">
                            <div class="face front active" <?php echo !$isArabicLongerThanEnglish ? 'style="position: absolute;"' : '' ?>>
                              <div class="works-content works-content-ar"><?php echo $work['description_ar'] ?></div>
                            </div>
                            <div class="face back" <?php echo $isArabicLongerThanEnglish ? 'style="position: absolute;"' : '' ?>>
                              <div class="works-content works-content-en"><?php echo $work['description_en'] ?></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer text-muted text-center">
                        <div class="works-read-more-btn d-flex justify-content-around w-75 text-center ms-auto buttons-side">
                          <a href="works.php?do=Edit&workId=<?php echo $work['id'] ?>" class="btn btn-primary">تعديل <i class="fa fa-edit"></i></a>
                          <!-- Button trigger modal -->
                          <a type="button" class="btn btn-danger delete-work-confirm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $work['id'] ?>">
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
                    <h5 class="modal-title" id="exampleModalLabel">هل أنت متأكد أنك تريد حذف هذا العمل؟</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-footer text-center">
                    <a href="works.php?do=Delete" class="btn btn-success w-25 delete-work from-show-page" data-id="0" data-bs-dismiss="modal">حذف <i class="fa fa-check"></i></a>
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
        <h2 class="our-works-title text-center my-5">إدارة أعمالنا</h2>
        <div class="alert alert-secondary text-center my-5">هذا العمل لم تعد متوفرة...</div>
      </div>
    <?php
    }
    include $templates_path . "footer.php";
  } elseif ($do === 'Add') {
    include "init.php";
    ?>
    <section class="works manage add">
      <div class="container pb-5">
        <h2 class="our-works-title text-center mb-5">إدارة أعمالنا</h2>
        <div class="form-container">
          <form method="POST" id="addWorkForm" enctype="multipart/form-data">
            <div class="row text-start">
              <div class="col-md-4 mb-3 text-md-end">
                <label for="imageInput">اختر صورة العمل:</label>
              </div>
              <div class="col-md-8 mb-3">
                <input type="file" id="imageInput" class="form-control" name="image" placeholder="" />
                <small id="image_error" class="error-validation-messages"></small>
              </div>
              <div class="col-md-4 mb-3 text-md-end">
                <label for="descriptionArInput">الشرح بالعربي :</label>
              </div>
              <div class="col-md-8 mb-3">
                <!-- <input type="text" class="form-control" /> -->
                <textarea name="descriptionAr" id="descriptionArInput" class="form-control validation-on-typing" cols="30" rows="5" style="max-height: 300px;" placeholder="اكتب شرحاً عن العمل الذي تريد نشره..."></textarea>
                <small id="descriptionAr_error" class="error-validation-messages"></small>
              </div>
              <div class="col-md-4 mb-3 text-md-end">
                <label for="descriptionArInput">الشرح بالإنكليزي :</label>
              </div>
              <div class="col-md-8 mb-3">
                <!-- <input type="text" class="form-control" /> -->
                <textarea name="descriptionEn" id="descriptionEnInput" class="form-control validation-on-typing" cols="30" rows="5" style="max-height: 300px;" placeholder="Write a Description About The Work You'll Post..." dir="ltr"></textarea>
                <small id="descriptionEn_error" class="error-validation-messages"></small>
              </div>
              <div class="col-md-4 mb-3 text-md-end">
                <label for="descriptionArInput">القسم :</label>
              </div>
              <div class="col-md-8 mb-3">
                <!-- <input type="text" class="form-control" /> -->
                <!-- <textarea name="category" id="categoryInput" class="form-control validation-on-typing" cols="30" rows="5" style="max-height: 300px;" placeholder="Write a Description About The Work You'll Post..." dir="ltr"></textarea> -->
                <select name="category" id="categoryInput" class="form-select">
                  <option value="0" selected>اختر القسم</option>
                  <?php
                  $cats = ["Graphic Design", "Marketing And Advertising", "Websites Development", "Photography And Editing", "Translation Services", "Engineering Services", "Training Courses", "Non-Profit Services"];
                  foreach ($cats as $cat) {
                    echo "<option value='" . $cat . "'>" . $cat . "</option>";
                  }
                  ?>
                </select>
                <small id="category_error" class="error-validation-messages"></small>
              </div>
              <button type="submit" name="submitWork" class="btn btn-primary d-block mt-3" id="addWorkBtn">إضافة <i class="fa fa-plus"></i></button>
              <!-- <input type="submit" name="submitWork" class="btn btn-primary d-block mt-3" id="addWorkBtn" value="&#xf043;" /> -->
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
    if (!isset($_FILES["image"]) || empty($_FILES["image"]) || !isset($_POST["descriptionAr"]) || empty($_POST["descriptionAr"]) || !isset($_POST["descriptionEn"]) || empty($_POST["descriptionEn"]) || !isset($_POST["category"]) || $_POST["category"] == 0) {
      echo json_encode(array("status" => false, "msg" => "لم تتم الإضافة!! الرجاء ملئ جميع البيانات..."));
    }
    // Check if image file is a actual image or fake image
    else {
      $target_dir = "/../layouts/images/uploads/works/";
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
          $insertWorksStmt = $con->prepare("INSERT INTO
                                              our_works (description_ar, description_en, category, `image`)
                                            VALUES
                                              (:zdescriptionAr, :zdescriptionEn, :zcategory, :zimage)");
          $insertWorksStmt->execute(array(
            'zdescriptionAr' => $_POST['descriptionAr'],
            'zdescriptionEn' => $_POST['descriptionEn'],
            'zcategory' => $_POST['category'],
            'zimage' => $file_name,
          ));
          if ($insertWorksStmt) {
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
    $editWorkId = isset($_GET['workId']) && is_numeric($_GET['workId']) ? intval($_GET['workId']) : 0;

    // Check If Blog Exists
    $editWorkStmt = $con->prepare("SELECT * from our_works WHERE id = ? LIMIT 1");
    $editWorkStmt->execute(array($editWorkId));
    $editWorksCount = $editWorkStmt->rowCount();

    // if $editWorksCount > 0 The Work Is Exists 
    if ($editWorksCount > 0) {
      $workForEdit = $editWorkStmt->fetch();
    ?>
      <section class="works manage edit">
        <div class="container pb-5">
          <h2 class="our-works-title text-center mb-5">إدارة أعمالنا</h2>
          <div class="form-container">
            <form method="POST" id="editWorkForm" enctype="multipart/form-data">
              <div class="row text-start">
                <!-- Input type Hidden -->
                <input type="hidden" name="workId" value="<?php echo $workForEdit['id'] ?>" />
                <div class="col-md-4 mb-3 text-md-end">
                  <label for="imageInput">اترك هذا الحقل فارغاً إذا كنت لا تريد تغيير الصورة:</label>
                </div>
                <div class="col-md-8 mb-3">
                  <input type="file" id="imageInput" class="form-control" name="image" placeholder="" />
                  <small id="image_error" class="error-validation-messages"></small>
                </div>
                <div class="col-md-4 mb-3 text-md-end">
                  <label for="descriptionArInput">الشرح بالعربي :</label>
                </div>
                <div class="col-md-8 mb-3">
                  <!-- <input type="text" class="form-control" /> -->
                  <textarea name="descriptionAr" id="descriptionArInput" class="form-control validation-on-typing" cols="30" rows="5" style="max-height: 300px;" placeholder="اكتب شرحاً عن العمل الذي تريد نشره..."><?php echo $workForEdit['description_ar'] ?></textarea>
                  <small id="descriptionAr_error" class="error-validation-messages"></small>
                </div>
                <div class="col-md-4 mb-3 text-md-end">
                  <label for="descriptionArInput">الشرح بالإنكليزي :</label>
                </div>
                <div class="col-md-8 mb-3">
                  <!-- <input type="text" class="form-control" /> -->
                  <textarea name="descriptionEn" id="descriptionEnInput" class="form-control validation-on-typing" cols="30" rows="5" style="max-height: 300px;" placeholder="Write a Description About The Work You'll Post..." dir="ltr"><?php echo $workForEdit['description_en'] ?></textarea>
                  <small id="descriptionEn_error" class="error-validation-messages"></small>
                </div>
                <div class="col-md-4 mb-3 text-md-end">
                  <label for="categoryInput">القسم :</label>
                </div>
                <div class="col-md-8 mb-3">
                  <!-- <input type="text" class="form-control" /> -->
                  <!-- <textarea name="category" id="categoryInput" class="form-control validation-on-typing" cols="30" rows="5" style="max-height: 300px;" placeholder="Write a Description About The Work You'll Post..." dir="ltr"></textarea> -->
                  <select name="category" id="categoryInput" class="form-select">
                    <option value="0" selected>اختر القسم</option>
                    <?php
                    $isSelected = '';
                    $cats = ["Graphic Design", "Marketing And Advertising", "Websites Development", "Photography And Editing", "Translation Services", "Engineering Services", "Training Courses", "Non-Profit Services"];
                    foreach ($cats as $cat) {
                      $isSelected = $workForEdit['category'] == $cat ? 'selected' : '';
                      echo "<option value='" . $cat . "' " . $isSelected . ">" . $cat . "</option>";
                    }
                    ?>
                  </select>
                  <small id="category_error" class="error-validation-messages"></small>
                </div>
                <button type="submit" name="submitWork" class="btn btn-primary d-block mt-3" id="addWorkBtn">حفظ التغييرات <i class="fa fa-edit"></i></button>
                <!-- <input type="submit" name="submitWork" class="btn btn-primary d-block mt-3" id="addWorkBtn" value="&#xf043;" /> -->
              </div>
            </form>
          </div>
          <div class="text-center fixed-bottom alert alert-success" id="successMsg" style="display: none;"></div>
          <div class="text-center fixed-bottom alert alert-danger" id="errorMsg" style="display: none;"></div>
        </div>
      </section>
    <?php
    } else {
    ?>
      <div class="container py-5">
        <h2 class="our-blogs-title text-center my-5">إدارة أعمالنا</h2>
        <div class="alert alert-secondary text-center my-5">هذه العمل لم تعد متوفرة...</div>
      </div>
<?php
    }
    include $templates_path . "footer.php";
  } elseif ($do === 'Update') {
    // Get Work Id To Delete
    $workIdForUpdate = isset($_POST['workId']) ? intval($_POST['workId']) : 0;
    // print_r($_POST);
    // Check If Work Exists
    $updateCheckWorkStmt = $con->prepare("SELECT * from our_works WHERE id = ? LIMIT 1");
    $updateCheckWorkStmt->execute(array($workIdForUpdate));
    $updateCountWorks = $updateCheckWorkStmt->rowCount();
    if ($updateCountWorks > 0) {
      if (!isset($_POST["descriptionAr"]) || empty($_POST["descriptionAr"]) || !isset($_POST["descriptionEn"]) || empty($_POST["descriptionEn"]) || !isset($_POST["category"]) || $_POST["category"] == 0) {
        echo json_encode(array("status" => false, "msg" => "Not Done!!"));
      }
      // Check if image file is a actual image or fake image
      else {
        // echo json_encode(array("status" => false, "msg" => "Not Done!!"));
        // Check If There Is New Image
        if (isset($_FILES['image']) && !empty($_FILES['image'])) {
          $target_dir = "/../layouts/images/uploads/works/";
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
          // echo $uploadOk;

          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
            // echo "Sorry, your file was not uploaded.";
            echo json_encode(array("status" => false, "msg" => "Not Done!! Sorry, your file was not uploaded."));
            // if everything is ok, try to upload file
          } else {
            // move_uploaded_file()
            if (move_uploaded_file($_FILES["image"]["tmp_name"], __DIR__ . $target_file)) {
              // echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
              unlink(__DIR__ . $target_dir . $workForUpdate['image']);
              $workForUpdate = $updateCheckWorkStmt->fetch();
              // Update Statment With Image
              $updateWorkStmt = $con->prepare("UPDATE our_works SET description_ar = ?, description_en = ?, category = ?, `image` = ? WHERE id = $workIdForUpdate");
              $updateWorkStmt->execute(array($_POST['descriptionAr'], $_POST['descriptionEn'], $_POST['category'], $file_name));
              if ($updateWorkStmt) {
                echo json_encode(array("status" => true, "msg" => "Done!! Work Added To Database Successfully!!", "msg2" => "Done!! The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded."));
              } else {
                unlink(__DIR__ . $target_file);
                echo json_encode(array("status" => false, "msg" => "Not Done!! Work Not Added To Database!!", "msg2" => "Sorry, your file was not uploaded."));
              }
            } else {
              // echo "Sorry, there was an error uploading your file.";
              echo json_encode(array("status" => false, "msg" => "Not Done!! Sorry, there was an error uploading your file."));
            }
          }
        } else {
          // Just Update Without Image
          $updateWorkStmt = $con->prepare("UPDATE our_works SET description_ar = ?, description_en = ?, category = ? WHERE id = $workIdForUpdate");
          $updateWorkStmt->execute(array($_POST['descriptionAr'], $_POST['descriptionEn'], $_POST['category']));
          if ($updateWorkStmt) {
            echo json_encode(array("status" => true, "msg" => "Done!! Work Has Been Edited Successfully!!"));
          } else {
            echo json_encode(array("status" => false, "msg" => "Not Done!! Work Not Been Edited!!"));
          }
        }
      }
    } else {
      echo json_encode(array("status" => false, "msg" => "Not Done!! Couldn't Found Work..."));
    }
  } elseif ($do === 'Delete') {
    // Get Blog Id To Delete
    $workId = isset($_GET['workId']) && is_numeric($_GET['workId']) ? intval($_GET['workId']) : 0;

    // Check If Blog Exists
    $checkWorkStmt = $con->prepare("SELECT * from our_works WHERE id = ? LIMIT 1");
    $checkWorkStmt->execute(array($workId));
    $countWorks = $checkWorkStmt->rowCount();

    // if $countBlog > 0 The Blog Is Exists 
    if ($countWorks > 0) {
      $delWorkStmt = $con->prepare("DELETE FROM our_works WHERE id = :zid");
      $delWorkStmt->bindParam(":zid", $workId);
      $delWorkStmt->execute();

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
