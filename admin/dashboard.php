<?php
ob_start();
session_start();
if (isset($_SESSION['AdminName'])) {
  $pageTitle = 'لوحة التحكم';
  include 'init.php';
?>
  <section class="dashboard text-center">
    <?php echo $_SESSION['AdminName'] ?>
    <div class="container dashboard-stat">
      <h2>لوحة التحكم</h2>
      <div class="row">
        <div class="col-md-6 col-lg-4">
          <div class="stat">
            <i class="fa fa-chalkboard-teacher"></i>
            <div class="info">
              الدورات التدريبية
              <span>200</span>
              <div class="btn-group hover-show">
                <a href="courses.php?do=Add">
                  <div class="btn btn-primary">إضافة <i class="fa fa-plus"></i></div>
                </a>
                <a href="courses.php?do=Manage" class="me-3">
                  <div class="btn btn-info">إدارة <i class="fa fa-tasks"></i></div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="stat">
            <i class="fa fa-briefcase"></i>
            <div class="info">
              الأعمال
              <span>200</span>
              <div class="btn-group hover-show">
                <a href="works.php?do=Add">
                  <div class="btn btn-primary">إضافة <i class="fa fa-plus"></i></div>
                </a>
                <a href="works.php?do=Manage" class="me-3">
                  <div class="btn btn-info">إدارة <i class="fa fa-tasks"></i></div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="stat">
            <i class="fa fa-newspaper"></i>
            <div class="info">
              المقالات
              <span>200</span>
              <div class="btn-group hover-show">
                <a href="blog.php?do=Add">
                  <div class="btn btn-primary">إضافة <i class="fa fa-plus"></i></div>
                </a>
                <a href="blog.php?do=Manage" class="me-3">
                  <div class="btn btn-info">إدارة <i class="fa fa-tasks"></i></div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="latest text-start">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="card mb-5">
              <div class="card-header">
                <i class="fa fa-chalkboard-teacher ms-2"></i> آخر الدورات التدريبية
                <span class="toggle-info float-end">
                  <i class="fa fa-minus fa-lg"></i>
                </span>
              </div>
              <div class="card-body">
                <?php
                $latestCoursesStmt = $con->prepare("SELECT id, title_ar, title_en, `image` FROM courses ORDER BY(id) DESC LIMIT 5");
                $latestCoursesStmt->execute();
                $latestCourses = $latestCoursesStmt->fetchAll();
                $latestCoursesCount = $latestCoursesStmt->rowCount();

                if ($latestCoursesCount > 0) {
                  foreach ($latestCourses as $course) {

                    $isArabicLongerThanEnglish = strlen($course['title_ar']) > strlen($course['title_en']) ? true : false;
                ?>
                    <div class="latest-items-link">
                      <a href="courses.php?do=Show&courseId=<?php echo $course['id'] ?>" style="text-decoration: none;">
                        <div class="latest-items">
                          <div class="row align-items-center">
                            <div class="col-2">
                              <div class="latest-item-img">
                                <img src="../layouts/images/uploads/courses/<?php echo $course['image'] ?>" alt="<?php echo $course['title_ar'] ?>" />
                              </div>
                            </div>
                            <div class="col-10">
                              <div class="flip-card">
                                <div class="face front active" <?php echo !$isArabicLongerThanEnglish ? 'style="position: absolute;"' : '' ?>>
                                  <h5 class="latest-items-title title-ar card-title"><?php echo limit_text_ar($course['title_ar'], 50) ?></h5>
                                </div>
                                <div class="face back" <?php echo $isArabicLongerThanEnglish ? 'style="position: absolute;"' : '' ?>>
                                  <h5 class="latest-items-title title-en card-title"><?php echo limit_text_ar($course['title_en'], 50) ?></h5>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="latest-btn-group">
                            <a href="courses.php?do=Edit&courseId=<?php echo $course['id'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a type="button" class="btn btn-danger delete-course-confirm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $course['id'] ?>" data-title="<?php echo $course['title_ar'] ?>"><i class="fa fa-close"></i></a>
                          </div>
                        </div>
                      </a>
                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="deleteCourseModal" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="deleteCourseModal">هل أنت متأكد أنك تريد حذف الدورة التدريبية <span class="delete-title"></span>؟</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer text-center">
                              <a href="courses.php?do=Delete" class="btn btn-success w-25 delete-course from-dashboard-page" data-id="0" data-bs-dismiss="modal">حذف <i class="fa fa-check"></i></a>
                              <button type="button" class="btn btn-danger w-25" data-bs-dismiss="modal">إلغاء <i class="fa fa-close"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php
                  }
                } else {
                  echo '<div class="alert alert-secondary text-center">لا توجد دورات تدريبية <a href="courses.php?do=Add" class="btn btn-outline-primary me-3">إضافة <i class="fa fa-plus"></i></a></div>';
                }
                ?>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card mb-5">
              <div class="card-header">
                <i class="fa fa-newspaper ms-2"></i> آخر المقالات
                <span class="toggle-info float-end">
                  <i class="fa fa-minus fa-lg"></i>
                </span>
              </div>
              <div class="card-body">
                <?php
                $latestArticlesStmt = $con->prepare("SELECT id, title_ar, title_en, `image` FROM blog ORDER BY(id) DESC LIMIT 5");
                $latestArticlesStmt->execute();
                $latestArticles = $latestArticlesStmt->fetchAll();
                $latestArticlesCount = $latestArticlesStmt->rowCount();

                if ($latestArticlesCount > 0) {
                  foreach ($latestArticles as $article) {
                    $isArabicLongerThanEnglish = strlen($article['title_ar']) > strlen($article['title_en']) ? true : false;
                ?>
                    <div class="latest-items-link">
                      <a href="blog.php?do=Show&blogId=<?php echo $article['id'] ?>" style="text-decoration: none;">
                        <div class="latest-items">
                          <div class="row align-items-center">
                            <div class="col-2">
                              <div class="latest-item-img">
                                <img src="../layouts/images/uploads/blogs/<?php echo $article['image'] ?>" alt="<?php echo $article['title_ar'] ?>" />
                              </div>
                            </div>
                            <div class="col-10">
                              <div class="flip-card">
                                <div class="face front active" <?php echo !$isArabicLongerThanEnglish ? 'style="position: absolute;"' : '' ?>>
                                  <h5 class="latest-items-title title-ar card-title"><?php echo limit_text_ar($article['title_ar'], 50) ?></h5>
                                </div>
                                <div class="face back" <?php echo $isArabicLongerThanEnglish ? 'style="position: absolute;"' : '' ?>>
                                  <h5 class="latest-items-title title-en card-title"><?php echo limit_text_ar($article['title_en'], 50) ?></h5>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="latest-btn-group">
                            <a href="blog.php?do=Edit&blogId=<?php echo $article['id'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a type="button" class="btn btn-danger delete-blog-confirm" data-bs-toggle="modal" data-bs-target="#exampleDeleteBlogModal" data-id="<?php echo $article['id'] ?>" data-title="<?php echo $article['title_ar'] ?>"><i class="fa fa-close"></i></a>
                          </div>
                        </div>
                      </a>
                      <!-- Modal -->
                      <div class="modal fade" id="exampleDeleteBlogModal" tabindex="-1" aria-labelledby="deleteBlogModal" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="deleteBlogModal">هل أنت متأكد أنك تريد حذف المقال <span class="delete-title"></span>؟</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer text-center">
                              <a href="blog.php?do=Delete" class="btn btn-success w-25 delete-blog from-dashboard-page" data-id="0" data-bs-dismiss="modal">حذف <i class="fa fa-check"></i></a>
                              <button type="button" class="btn btn-danger w-25" data-bs-dismiss="modal">إلغاء <i class="fa fa-close"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php
                  }
                } else {
                  echo '<div class="alert alert-secondary text-center">لا توجد مقالات <a href="blog.php?do=Add" class="btn btn-outline-primary me-3">إضافة <i class="fa fa-plus"></i></a></div>';
                }
                ?>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card mb-5">
              <div class="card-header">
                <i class="fa fa-briefcase ms-2"></i> آخر الأعمال
                <span class="toggle-info float-end">
                  <i class="fa fa-minus fa-lg"></i>
                </span>
              </div>
              <div class="card-body">
                <?php
                $latestWorksStmt = $con->prepare("SELECT id, description_ar, description_en, `image` FROM our_works ORDER BY(id) DESC LIMIT 5");
                $latestWorksStmt->execute();
                $latestWorks = $latestWorksStmt->fetchAll();
                $latestWorksCount = $latestWorksStmt->rowCount();

                if ($latestWorksCount > 0) {
                  foreach ($latestWorks as $work) {

                    $isArabicLongerThanEnglish = strlen($work['description_ar']) > strlen($work['description_en']) ? true : false;
                ?>
                    <div class="latest-items-link">
                      <a href="works.php?do=Show&workId=<?php echo $work['id'] ?>" style="text-decoration: none;">
                        <div class="latest-items">
                          <div class="row align-items-center">
                            <div class="col-2">
                              <div class="latest-item-img">
                                <img src="../layouts/images/uploads/works/<?php echo $work['image'] ?>" alt="..." />
                              </div>
                            </div>
                            <div class="col-10">
                              <div class="flip-card">
                                <div class="face front active" <?php echo !$isArabicLongerThanEnglish ? 'style="position: absolute;"' : '' ?>>
                                  <h5 class="latest-items-title title-ar card-title"><?php echo limit_text_ar($work['description_ar'], 50) ?></h5>
                                </div>
                                <div class="face back" <?php echo $isArabicLongerThanEnglish ? 'style="position: absolute;"' : '' ?>>
                                  <h5 class="latest-items-title title-en card-title"><?php echo limit_text_ar($work['description_en'], 50) ?></h5>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="latest-btn-group">
                            <a href="works.php?do=Edit&workId=<?php echo $work['id'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a type="button" class="btn btn-danger delete-work-confirm" data-bs-toggle="modal" data-bs-target="#exampleDeleteWorkModal" data-id="<?php echo $work['id'] ?>"><i class="fa fa-close"></i></a>
                          </div>
                        </div>
                      </a>
                      <!-- Modal -->
                      <div class="modal fade" id="exampleDeleteWorkModal" tabindex="-1" aria-labelledby="deleteWorkModal" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="deleteWorkModal">هل أنت متأكد أنك تريد حذف العمل؟</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer text-center">
                              <a href="works.php?do=Delete" class="btn btn-success w-25 delete-work from-dashboard-page" data-id="0" data-bs-dismiss="modal">حذف <i class="fa fa-check"></i></a>
                              <button type="button" class="btn btn-danger w-25" data-bs-dismiss="modal">إلغاء <i class="fa fa-close"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php
                  }
                } else {
                  echo '<div class="alert alert-secondary text-center">لا توجد أعمال <a href="works.php?do=Add" class="btn btn-outline-primary me-3">إضافة <i class="fa fa-plus"></i></a></div>';
                }
                ?>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center fixed-bottom alert alert-success" id="successMsg" style="display: none;"></div>
      </div>
    </div>
  </section>

<?php include $templates_path . "footer.php";
} else {
  header('Location: index.php');
}
ob_end_flush();
