<?php
session_start();
if (isset($_SESSION['AdminName'])) {
  $pageTitle = 'إدارة الدورات التدريبية';
  include "connect.php";
  $do = '';
  $do = isset($_GET['do']) && $_GET['do'] != '' ? $_GET['do'] : 'Manage';
  // Manage Courses
  if ($do === 'Manage') {
    include "init.php";

    // Define total number of results per page  
    $resultsPerPage = 6;
    $query = "SELECT COUNT(id) FROM courses";
    $countCoursesStmt = $con->prepare($query);
    $countCoursesStmt->execute();
    $numberOfResult = $countCoursesStmt->fetchColumn();

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
    $query = "SELECT * FROM courses ORDER BY (id) DESC LIMIT " . $pageFirstResult . ',' . $resultsPerPage;
    $allCourseStmt = $con->prepare($query);
    $allCourseStmt->execute();
    $courses = $allCourseStmt->fetchAll();
?>
    <section class="courses manage">
      <div class="container-lg">
        <h2 class="our-courses-title text-center">إدارة الدورات التدريبية</h2>
        <div id="live-search" class="mb-4">
          <div class="row justify-content-center">
            <div class="col-1"><button class="btn btn-primary flip-info w-100" data-lang="ar">إنكليزي</button></div>
            <div class="col-md-6">
              <input type="text" class="form-control search-input" name="search" id="search-input" placeholder="بحث عن دورات تدريبية..." data-lang="ar" />
            </div>
          </div>
        </div>
        <div class="alert alert-secondary text-center mt-5 total_results">عدد النتائج: <span id="total_results"></div>
        <div class="row search-result" id="courses">
          <?php
          if (!empty($courses)) {
            foreach ($courses as $course) {
              $isArabicLongerThanEnglish = strlen($course['short_description_ar']) > strlen($course['short_description_en']) ? true : false;
          ?>
              <div class="col-md-4 mb-sm-5 course-<?php echo $course['id'] ?>">
                <div class="our-courses-item">
                  <a href="courses.php?do=Show&courseId=<?php echo $course['id'] ?>" style="text-decoration: none;">
                    <div class="card">
                      <img src="<?php echo !isset($course['image']) || empty($course['image']) ? '../layouts/images/carousel/2.png' : '../layouts/images/uploads/courses/' . $course['image'] ?>" class="card-img-top" alt="">
                      <div class="card-body">
                        <div class="our-courses-content">
                          <div class="flip-card">
                            <div class="face front active" <?php echo !$isArabicLongerThanEnglish ? 'style="position: absolute;"' : '' ?>>
                              <a href="courses.php?do=Show&courseId=<?php echo $course['id'] ?>" style="text-decoration: none;">
                                <h5 class="courses-title title-ar card-title"><?php echo $course['title_ar'] ?></h5>
                                <div class="courses-content courses-content-ar"><?php echo $course['short_description_ar'] ?></div>
                              </a>
                            </div>
                            <div class="face back" <?php echo $isArabicLongerThanEnglish ? 'style="position: absolute;"' : '' ?>>
                              <a href="#" style="text-decoration: none;">
                                <h5 class="courses-title title-en card-title"><?php echo $course['title_en'] ?></h5>
                                <div class="courses-content courses-content-en"><?php echo $course['short_description_en'] ?></div>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer text-muted text-center">
                        <div class="courses-read-more-btn d-flex justify-content-around w-75 text-center ms-auto">
                          <a href="courses.php?do=Edit&courseId=<?php echo $course['id'] ?>" class="btn btn-primary">تعديل <i class="fa fa-edit"></i></a>
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-danger delete-course-confirm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $course['id'] ?>" data-title="<?php echo $course['title_ar'] ?>">
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
                    <h5 class="modal-title" id="exampleModalLabel">هل أنت متأكد أنك تريد حذف الدورة التدريبية <span class="delete-title"></span>؟</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-footer text-center">
                    <a href="courses.php?do=Delete" class="btn btn-success w-25 delete-course" data-id="0" data-bs-dismiss="modal">حذف <i class="fa fa-check"></i></a>
                    <button type="button" class="btn btn-danger w-25" data-bs-dismiss="modal">إلغاء <i class="fa fa-close"></i></button>
                  </div>
                </div>
              </div>
            </div>
          <?php
          } else {
          ?>
            <div class="container">
              <div class="alert alert-secondary text-center">لا توجد دورات تدريبية...</div>
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
            <a class="page-link" href="courses.php?do=Manage&page=<?php echo $_GET['page'] - 1 ?>">Previous</a>
          </li>
          <?php
          //display the link of the pages in URL  
          for ($p = 1; $p <= $numberOfPages; $p++) {
            $isActive = $page == $p ? " active" : "";
            echo '<li class="page-item' . $isActive . '"><a href="courses.php?do=Manage&page=' . $p . '" class="page-link">' . $p . ' </a></li>';
          }
          ?>
          <li class="page-item <?php echo $page == $numberOfPages ? 'disabled' : ''; ?>">
            <a class="page-link" href="courses.php?do=Manage&page=<?php echo $_GET['page'] + 1 ?>">Next</a>
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

    $searchCourseText = isset($_GET['search']) && is_string($_GET['search']) ? strval($_GET['search']) : '';
    $searchingLang = isset($_GET['searchingLang']) && is_string($_GET['searchingLang']) ? strval($_GET['searchingLang']) : 'ar';

    $searchCourseStmt = $con->prepare("SELECT * FROM courses WHERE title_$searchingLang LIKE ?");
    $searchCourseStmt->execute(array('%' . $searchCourseText . '%'));
    $coursesResult = $searchCourseStmt->fetchAll();
    $searchResultCount = $searchCourseStmt->rowCount();
    if ($searchResultCount > 0) {
      $output = '';
      foreach ($coursesResult as $course) {
        $forFront = $searchingLang == 'ar' ? 'active' : '';
        $forBack = $searchingLang == 'en' ? 'active' : '';
        $imageURL = !isset($course['image']) || empty($course['image']) ? '../layouts/images/carousel/2.png' : '../layouts/images/uploads/courses/' . $course['image'];

        $arabicIsLonger = '';
        if (strlen($course['short_description_ar']) > strlen($course['short_description_en'])) {
          $arabicIsLonger = 'style="position: absolute;"';
        }

        $englishIsLonger = '';
        if (strlen($course['short_description_ar']) < strlen($course['short_description_en'])) {
          $englishIsLonger = 'style="position: absolute;"';
        }


        $output .= '<div class="col-md-4 mb-sm-5 course-' . $course['id'] . '">
        <div class="our-courses-item">
          <a href="courses.php?do=Show&courseId=' . $course['id'] . '" style="text-decoration: none;">
            <div class="card">
              <img src="' . $imageURL . '" class="card-img-top" alt="">
              <div class="card-body">
                <div class="our-courses-content">
                  <div class="flip-card">
                    <div class="face front ' . $forFront . '" ' . $arabicIsLonger . '>
                      <a href="courses.php?do=Show&courseId=' . $course['id'] . '" style="text-decoration: none;">
                        <h5 class="courses-title title-ar card-title">' . $course['title_ar'] . '</h5>
                        <div class="courses-content courses-content-ar">' . $course['short_description_ar'] . '</div>
                      </a>
                    </div>
                    <div class="face back ' . $forBack . '" ' . $englishIsLonger . '>
                      <a href="#" style="text-decoration: none;">
                        <h5 class="courses-title title-en card-title">' . $course['title_en'] . '</h5>
                        <div class="courses-content courses-content-en">' . $course['short_description_en'] . '</div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer text-muted text-center">
                <div class="courses-read-more-btn d-flex justify-content-around w-75 text-center ms-auto">
                  <a href="courses.php?do=Edit&courseId=' . $course['id'] . '" class="btn btn-primary">تعديل <i class="fa fa-edit"></i></a>
                  <!-- Button trigger modal -->
                  <a type="button" class="btn btn-danger delete-course-confirm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="' . $course['id'] . '" data-title="' . $course['title_ar'] . '">
                    حذف <i class="fa fa-close"></i>
                  </a>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>';
      }
      echo json_encode(array("status" => true, "msg" => "Done!!", "total_results" => $searchResultCount, "courses_data" => $output));
    } else {
      $output = '<div class="alert alert-secondary text-center no-data-msg">لم يتم العثور على نتائج...</div>';
      echo json_encode(array("status" => false, "msg" => "Not Done!!", "total_results" => $searchResultCount, "courses_data" => $output));
    }
  } elseif ($do === 'Show') {
    include "init.php";

    $showCourseId = isset($_GET['courseId']) && is_numeric($_GET['courseId']) ? intval($_GET['courseId']) : 0;

    // Check If Course Exists
    $showCourseStmt = $con->prepare("SELECT * from courses WHERE id = ? LIMIT 1");
    $showCourseStmt->execute(array($showCourseId));
    $showCoursesCount = $showCourseStmt->rowCount();

    // if $countBlog > 0 The Course Is Exists 
    if ($showCoursesCount > 0) {
      $course = $showCourseStmt->fetch();
      $isArabicLongerThanEnglish = strlen($course['short_description_ar']) > strlen($course['short_description_en']) ? true : false;
    ?>
      <section class="courses manage">
        <div class="container-lg">
          <h2 class="our-courses-title text-center">إدارة الدورات التدريبية</h2>
          <div id="live-search" class="mb-4">
            <div class="row justify-content-center">
              <div class="col-1"><button class="btn btn-primary flip-info" data-lang="ar">إنكليزي</button></div>
              <div class="col-md-6">
                <input type="text" class="form-control" name="search" id="search-input" placeholder="بحث عن دورات تدريبية..." data-lang="ar" />
              </div>
            </div>
          </div>
          <div class="alert alert-secondary text-center mt-5 total_results">عدد النتائج: <span id="total_results"></div>
          <div class="search-result" id="courses">
            <div class="col-md- mb-sm-5 course-<?php echo $course['id'] ?>">
              <div class="row">
                <div class="col-md-4">
                  <img src="<?php echo !isset($course['image']) || empty($course['image']) ? '../layouts/images/carousel/2.png' : '../layouts/images/uploads/courses/' . $course['image'] ?>" class="card-img-top" alt="">
                </div>
                <div class="col-md-8 mb-sm-5 course-<?php echo $course['id'] ?>">
                  <div class="our-courses-item">
                    <div class="card">
                      <div class="card-body">
                        <div class="our-courses-content">
                          <div class="flip-card">
                            <div class="face front active" <?php echo !$isArabicLongerThanEnglish ? 'style="position: absolute;"' : '' ?>>
                              <h5 class="courses-title title-ar card-title"><?php echo $course['title_ar'] ?></h5>
                              <div class="courses-content courses-content-ar"><?php echo $course['description_ar'] ?></div>
                            </div>
                            <div class="face back" <?php echo $isArabicLongerThanEnglish ? 'style="position: absolute;"' : '' ?>>
                              <h5 class="courses-title title-en card-title"><?php echo $course['title_en'] ?></h5>
                              <div class="courses-content courses-content-en"><?php echo $course['description_en'] ?></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer text-muted text-center">
                        <div class="courses-read-more-btn d-flex justify-content-around w-75 text-center ms-auto buttons-side">
                          <a href="courses.php?do=Edit&courseId=<?php echo $course['id'] ?>" class="btn btn-primary">تعديل <i class="fa fa-edit"></i></a>
                          <!-- Button trigger modal -->
                          <a type="button" class="btn btn-danger delete-course-confirm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $course['id'] ?>" data-title="<?php echo $course['title_ar'] ?>">
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
                    <h5 class="modal-title" id="exampleModalLabel">هل أنت متأكد أنك تريد حذف الدورة التدريبية <span class="delete-title"></span>؟</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-footer text-center">
                    <a href="courses.php?do=Delete" class="btn btn-success w-25 delete-course from-show-page" data-id="0" data-bs-dismiss="modal">حذف <i class="fa fa-check"></i></a>
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
        <h2 class="our-courses-title text-center my-5">إدارة الدورات التدريبية</h2>
        <div class="alert alert-secondary text-center my-5">هذه الدورة التدريبية لم تعد متوفرة...</div>
      </div>
    <?php
    }
    include $templates_path . "footer.php";
  } elseif ($do === 'Add') {
    include "init.php";
    ?>
    <section class="courses manage add">
      <div class="container pb-5">
        <h2 class="our-courses-title text-center mb-5">إدارة الدورات التدريبية</h2>
        <div class="form-container">
          <form method="POST" id="addCourseForm" enctype="multipart/form-data">
            <div class="row text-start">
              <div class="col-md-4 mb-3 text-md-end">
                <label for="imageInput">اختر صورة للدورة التدريبية:</label>
              </div>
              <div class="col-md-8 mb-3">
                <input type="file" id="imageInput" class="form-control" name="image" placeholder="" />
                <small id="image_error" class="error-validation-messages"></small>
              </div>
              <div class="col-md-4 mb-3 text-md-end">
                <label for="titleArInput">اسم الدورة التدريبية بالعربي:</label>
              </div>
              <div class="col-md-8 mb-3">
                <input type="text" id="titleArInput" class="form-control validation-on-typing" name="titleAr" placeholder="الاسم العربي للدورة التدريبية..." />
                <small id="titleAr_error" class="error-validation-messages"></small>
              </div>
              <div class="col-md-4 mb-3 text-md-end">
                <label for="titleEnInput">اسم الدورة التدريبية بالإنكليزي:</label>
              </div>
              <div class="col-md-8 mb-3">
                <input type="text" id="titleEnInput" class="form-control validation-on-typing" name="titleEn" placeholder="Course Name In English..." dir="ltr" />
                <small id="titleEn_error" class="error-validation-messages"></small>
              </div>
              <div class="col-md-4 mb-3 text-md-end">
                <label for="shortDescriptionArInput">الشرح المختصر بالعربي:</label>
              </div>
              <div class="col-md-8 mb-3">
                <!-- <input type="text" class="form-control" /> -->
                <textarea name="shortDescriptionAr" id="shortDescriptionArInput" class="form-control validation-on-typing" cols="30" rows="3" style="max-height: 150px;" placeholder="اكتب شرحاً مختصراً بالعربي عن الدورة التدريبية..."></textarea>
                <small id="shortDescriptionAr_error" class="error-validation-messages"></small>
              </div>
              <div class="col-md-4 mb-3 text-md-end">
                <label for="shortDescriptionEnInput">الشرح المختصر بالإنكليزي :</label>
              </div>
              <div class="col-md-8 mb-3">
                <!-- <input type="text" class="form-control" /> -->
                <textarea name="shortDescriptionEn" id="shortDescriptionEnInput" class="form-control validation-on-typing" cols="30" rows="3" style="max-height: 150px;" placeholder="ًWrite a Short Description About The Course..." dir="ltr"></textarea>
                <small id="shortDescriptionEn_error" class="error-validation-messages"></small>
              </div>
              <div class="col-md-4 mb-3 text-md-end">
                <label for="descriptionArInput">الشرح الكامل بالعربي :</label>
              </div>
              <div class="col-md-8 mb-3">
                <!-- <input type="text" class="form-control" /> -->
                <textarea name="descriptionAr" id="descriptionArInput" class="form-control validation-on-typing" cols="30" rows="5" style="max-height: 300px;" placeholder="اكتب شرحاً تفصيلياً بالعربي عن الدورة التدريبية..."></textarea>
                <small id="descriptionAr_error" class="error-validation-messages"></small>
              </div>
              <div class="col-md-4 mb-3 text-md-end">
                <label for="descriptionArInput">الشرح الكامل بالإنكليزي :</label>
              </div>
              <div class="col-md-8 mb-3">
                <!-- <input type="text" class="form-control" /> -->
                <textarea name="descriptionEn" id="descriptionEnInput" class="form-control validation-on-typing" cols="30" rows="5" style="max-height: 300px;" placeholder="Write a Full Description About The Course..." dir="ltr"></textarea>
                <small id="descriptionEn_error" class="error-validation-messages"></small>
              </div>
              <button type="submit" name="submitCourse" class="btn btn-primary d-block mt-3" id="addCourseBtn">إضافة <i class="fa fa-plus"></i></button>
              <!-- <input type="submit" name="submitCourse" class="btn btn-primary d-block mt-3" id="addCourseBtn" value="&#xf043;" /> -->
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
    if (!isset($_FILES["image"]) || empty($_FILES["image"]) || !isset($_POST["titleAr"]) || empty($_POST["titleAr"]) || !isset($_POST["titleEn"]) || empty($_POST["titleEn"]) || !isset($_POST["shortDescriptionAr"]) || empty($_POST["shortDescriptionAr"]) || !isset($_POST["shortDescriptionEn"]) || empty($_POST["shortDescriptionEn"]) || !isset($_POST["descriptionAr"]) || empty($_POST["descriptionAr"]) || !isset($_POST["descriptionEn"]) || empty($_POST["descriptionEn"])) {
      echo json_encode(array("status" => false, "msg" => "لم تتم الإضافة!! الرجاء ملئ جميع البيانات..."));
    }
    // Check if image file is a actual image or fake image
    else {
      $target_dir = "/../layouts/images/uploads/courses/";
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
          $insertCourseStmt = $con->prepare("INSERT INTO
                                              courses (title_ar, title_en, short_description_ar, short_description_en, description_ar, description_en, `image`)
                                            VALUES
                                              (:ztitleAr, :ztitleEn, :zshortDescriptionAr, :zshortDescriptionEn, :zdescriptionAr, :zdescriptionEn, :zimage)");
          $insertCourseStmt->execute(array(
            'ztitleAr' => $_POST['titleAr'],
            'ztitleEn' => $_POST['titleEn'],
            'zshortDescriptionAr' => $_POST['shortDescriptionAr'],
            'zshortDescriptionEn' => $_POST['shortDescriptionEn'],
            'zdescriptionAr' => $_POST['descriptionAr'],
            'zdescriptionEn' => $_POST['descriptionEn'],
            'zimage' => $file_name,
          ));
          if ($insertCourseStmt) {
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
    // print_r($_FILES);
  } elseif ($do === 'Edit') {
    include "init.php";
    $editCourseId = isset($_GET['courseId']) && is_numeric($_GET['courseId']) ? intval($_GET['courseId']) : 0;

    // Check If Course Exists
    $editCourseStmt = $con->prepare("SELECT * from courses WHERE id = ? LIMIT 1");
    $editCourseStmt->execute(array($editCourseId));
    $editCoursesCount = $editCourseStmt->rowCount();

    // if $editCoursesCount > 0 The Course Is Exists 
    if ($editCoursesCount > 0) {
      $courseForEdit = $editCourseStmt->fetch();
    ?>
      <section class="courses manage edit">
        <div class="container pb-5">
          <h2 class="our-courses-title text-center mb-5">إدارة الدورات التدريبية</h2>
          <div class="form-container">
            <form method="POST" id="editCourseForm" enctype="multipart/form-data">
              <div class="row text-start">
                <!-- Input type Hidden -->
                <input type="hidden" name="courseId" value="<?php echo $courseForEdit['id'] ?>" />
                <div class="col-md-4 mb-3 text-md-end">
                  <label for="imageInput">اختر صورة للدورة التدريبية:</label>
                </div>
                <div class="col-md-8 mb-3">
                  <input type="file" id="imageInput" class="form-control" name="image" placeholder="" />
                  <small id="image_error" class="error-validation-messages"></small>
                </div>
                <div class="col-md-4 mb-3 text-md-end">
                  <label for="titleArInput">اسم الدورة التدريبية بالعربي:</label>
                </div>
                <div class="col-md-8 mb-3">
                  <input type="text" id="titleArInput" class="form-control" name="titleAr" placeholder="الاسم العربي للدورة التدريبية..." value="<?php echo $courseForEdit['title_ar'] ?>" />
                  <small id="titleAr_error" class="error-validation-messages"></small>
                </div>
                <div class="col-md-4 mb-3 text-md-end">
                  <label for="titleEnInput">اسم الدورة التدريبية بالإنكليزي:</label>
                </div>
                <div class="col-md-8 mb-3">
                  <input type="text" id="titleEnInput" class="form-control" name="titleEn" placeholder="Course Name In English..." value="<?php echo $courseForEdit['title_en'] ?>" dir="ltr" />
                  <small id="titleEn_error" class="error-validation-messages"></small>
                </div>
                <div class="col-md-4 mb-3 text-md-end">
                  <label for="shortDescriptionArInput">الشرح المختصر بالعربي:</label>
                </div>
                <div class="col-md-8 mb-3">
                  <!-- <input type="text" class="form-control" /> -->
                  <textarea name="shortDescriptionAr" id="shortDescriptionArInput" class="form-control" cols="30" rows="3" style="max-height: 150px;" placeholder="اكتب شرحاً مختصراً بالعربي عن الدورة التدريبية..."><?php echo $courseForEdit['short_description_ar'] ?></textarea>
                  <small id="shortDescriptionAr_error" class="error-validation-messages"></small>
                </div>
                <div class="col-md-4 mb-3 text-md-end">
                  <label for="shortDescriptionEnInput">الشرح المختصر بالإنكليزي :</label>
                </div>
                <div class="col-md-8 mb-3">
                  <!-- <input type="text" class="form-control" /> -->
                  <textarea name="shortDescriptionEn" id="shortDescriptionEnInput" class="form-control" cols="30" rows="3" style="max-height: 150px;" placeholder="Write a Short Description About The Course In English..." dir="ltr"><?php echo $courseForEdit['short_description_en'] ?></textarea>
                  <small id="shortDescriptionEn_error" class="error-validation-messages"></small>
                </div>
                <div class="col-md-4 mb-3 text-md-end">
                  <label for="descriptionArInput">الشرح الكامل بالعربي :</label>
                </div>
                <div class="col-md-8 mb-3">
                  <!-- <input type="text" class="form-control" /> -->
                  <textarea name="descriptionAr" id="descriptionArInput" class="form-control" cols="30" rows="5" style="max-height: 300px;" placeholder="اكتب شرحاً تفصيلياً بالعربي عن الدورة التدريبية..."><?php echo $courseForEdit['description_ar'] ?></textarea>
                  <small id="descriptionAr_error" class="error-validation-messages"></small>
                </div>
                <div class="col-md-4 mb-3 text-md-end">
                  <label for="descriptionArInput">الشرح الكامل بالإنكليزي :</label>
                </div>
                <div class="col-md-8 mb-3">
                  <!-- <input type="text" class="form-control" /> -->
                  <textarea name="descriptionEn" id="descriptionEnInput" class="form-control" cols="30" rows="5" style="max-height: 300px;" placeholder="Write a Full Description About The Course In English..." dir="ltr"><?php echo $courseForEdit['description_en'] ?></textarea>
                  <small id=" descriptionEn_error" class="error-validation-messages"></small>
                </div>
                <button type="submit" name="editCourse" class="btn btn-primary d-block mt-3" id="editCourseBtn">حفظ التغييرات <i class="fa fa-edit"></i></button>
                <!-- <input type="submit" name="submitCourse" class="btn btn-primary d-block mt-3" id="addCourseBtn" value="&#xf043;" /> -->
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
        <h2 class="our-courses-title text-center my-5">إدارة الدورات التدريبية</h2>
        <div class="alert alert-secondary text-center my-5">هذه الدورة التدريبية لم تعد متوفرة...</div>
      </div>
<?php
    }
    include $templates_path . "footer.php";
  } elseif ($do === 'Update') {
    // Get Course Id To Delete
    $courseIdForUpdate = isset($_POST['courseId']) ? intval($_POST['courseId']) : 0;

    // Check If Course Exists
    $updateCheckCourseStmt = $con->prepare("SELECT * from courses WHERE id = ? LIMIT 1");
    $updateCheckCourseStmt->execute(array($courseIdForUpdate));
    $updateCountCourses = $updateCheckCourseStmt->rowCount();

    if ($updateCountCourses > 0) {
      if (!isset($_POST["titleAr"]) || empty($_POST["titleAr"]) || !isset($_POST["titleEn"]) || empty($_POST["titleEn"]) || !isset($_POST["shortDescriptionAr"]) || empty($_POST["shortDescriptionAr"]) || !isset($_POST["shortDescriptionEn"]) || empty($_POST["shortDescriptionEn"]) || !isset($_POST["descriptionAr"]) || empty($_POST["descriptionAr"]) || !isset($_POST["descriptionEn"]) || empty($_POST["descriptionEn"])) {
        echo json_encode(array("status" => false, "msg" => "Not Done!!"));
      }
      // Check if image file is a actual image or fake image
      else {
        // Check If There Is New Image
        if (isset($_FILES['image']) && !empty($_FILES['image'])) {
          $target_dir = "/../layouts/images/uploads/courses/";
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
              unlink(__DIR__ . $target_dir . $courseForUpdate['image']);
              $courseForUpdate = $updateCheckCourseStmt->fetch();
              // Update Statment With Image
              $updateCourseStmt = $con->prepare("UPDATE courses SET title_ar = ?, title_en = ?, short_description_ar = ?, short_description_en = ?, description_ar = ?, description_en = ?, `image` = ? WHERE id = $courseIdForUpdate");
              $updateCourseStmt->execute(array($_POST['titleAr'], $_POST['titleEn'], $_POST['shortDescriptionAr'], $_POST['shortDescriptionEn'], $_POST['descriptionAr'], $_POST['descriptionEn'], $file_name));
              if ($updateCourseStmt) {
                echo json_encode(array("status" => true, "msg" => "Done!! Course Added To Database Successfully!!", "msg2" => "Done!! The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded."));
              } else {
                unlink(__DIR__ . $target_file);
                echo json_encode(array("status" => false, "msg" => "Not Done!! Course Not Added To Database!!", "msg2" => "Sorry, your file was not uploaded."));
              }
            } else {
              // echo "Sorry, there was an error uploading your file.";
              echo json_encode(array("status" => false, "msg" => "Not Done!! Sorry, there was an error uploading your file."));
            }
          }
        } else {
          // Just Update Without Image
          $updateCourseStmt = $con->prepare("UPDATE courses SET title_ar = ?, title_en = ?, short_description_ar = ?, short_description_en = ?, description_ar = ?, description_en = ? WHERE id = $courseIdForUpdate");
          $updateCourseStmt->execute(array($_POST['titleAr'], $_POST['titleEn'], $_POST['shortDescriptionAr'], $_POST['shortDescriptionEn'], $_POST['descriptionAr'], $_POST['descriptionEn']));
          if ($updateCourseStmt) {
            echo json_encode(array("status" => true, "msg" => "Done!! Course Has Been Edited Successfully!!"));
          } else {
            echo json_encode(array("status" => false, "msg" => "Not Done!! Course Not Been Edited!!"));
          }
        }
      }
    } else {
      echo json_encode(array("status" => false, "msg" => "Not Done!! Couldn't Found Course..."));
    }
  } elseif ($do === 'Delete') {
    // Get Blog Id To Delete
    $courseId = isset($_GET['courseId']) && is_numeric($_GET['courseId']) ? intval($_GET['courseId']) : 0;

    // Check If Blog Exists
    $checkCourseStmt = $con->prepare("SELECT * from courses WHERE id = ? LIMIT 1");
    $checkCourseStmt->execute(array($courseId));
    $countCourses = $checkCourseStmt->rowCount();

    // if $countBlog > 0 The Blog Is Exists 
    if ($countCourses > 0) {
      $delCourseStmt = $con->prepare("DELETE FROM courses WHERE id = :zid");
      $delCourseStmt->bindParam(":zid", $courseId);
      $delCourseStmt->execute();

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
