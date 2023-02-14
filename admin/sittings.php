<?php
ob_start();
session_start();
if (isset($_SESSION['AdminName'])) {
  $pageTitle = 'الإعدادات';
  include 'init.php';
?>
  <section class="sittings">
    <div class="container">
      <form method="POST" id="sittingsForm">
        <div class="card my-5">
          <div class="card-body">
            <h5 class="card-title text-center">الإعدادات</h5>
            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item py-3">
              <div class="row align-items-center">
                <div class="col-4">
                  <label for="adminEmail">البريد الالكتروني:</label>
                </div>
                <div class="col-8">
                  <input type="text" class="form-control" name="adminEmail" id="adminEmailInput" value="<?php echo $_SESSION['AdminEmail'] ?>" dir="ltr" />
                  <small id="adminEmail_error" class="error-validation-messages"></small>
                </div>
              </div>
            </li>
            <li class="list-group-item py-3">
              <div class="row align-items-center">
                <div class="col-4">
                  <label for="adminName">اسم المستخدم: <br />
                    <span class="text-muted">(اترك هذا الحقل فارغ إذا كنت لا تريد تغيير اسم المستخدم)</span>
                  </label>
                </div>
                <div class="col-8">
                  <input type="text" class="form-control" name="adminName" id="adminNameInput" dir="ltr" autocomplete="off" />
                </div>
              </div>
            </li>
            <li class="list-group-item py-3">
              <div class="row align-items-center">
                <div class="col-4">
                  <label for="adminFulName">اسم المستخدم الظاهر:</label>
                </div>
                <div class="col-8">
                  <input type="text" class="form-control" name="fullName" id="adminFulNameInput" value="<?php echo $_SESSION['AdminName'] ?>" dir="ltr" />
                  <small id="fullName_error" class="error-validation-messages"></small>
                </div>
              </div>
            </li>
            <li class="list-group-item py-3">
              <div class="row align-items-center">
                <div class="reset-password-title mb-3 lead">إعادة تعيين كلمة المرور:
                  <span class="text-muted">(اترك هذه الحقول فارغة إذا لا تريد إعادة تعيين كلمة المرور)</span>
                </div>
                <div class="col-4">
                  <label for="adminNewPassword">كلمة المرور الجديدة:</label>
                </div>
                <div class="col-8 mb-3">
                  <input type="password" class="form-control" name="newPassword" id="adminNewPasswordInput" dir="ltr" autocomplete="off" />
                  <small id="newPassword_error" class="error-validation-messages"></small>
                </div>
                <div class="col-4">
                  <label for="adminNewPasswordCopy">تأكيد كلمة المرور:</label>
                </div>
                <div class="col-8">
                  <input type="password" class="form-control" name="newPasswordCopy" id="adminNewPasswordCopyInput" dir="ltr" autocomplete="off" />
                  <small id="newPasswordCopy_error" class="error-validation-messages"></small>
                </div>
              </div>
            </li>
          </ul>
          <div class="card-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#saveSittings">
              حفظ التغييرات
            </button>

            <!-- Modal -->
            <div class="modal fade" id="saveSittings" tabindex="-1" aria-labelledby="saveSittingsLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="saveSittingsLabel">الرجاء إدخال كلمة المرور لحفظ التغييرات</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <input type="password" class="form-control" name="confirmPassword" autocomplete="new-password" dir="ltr" id="confirmPasswordInput" />
                    <small id="confirmPassword_error" class="error-validation-messages"></small>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <input type="submit" class="btn btn-primary" id="saveSittingsBtn" value="حفظ" />
                    <!-- <button type="button" class="btn btn-primary">حفظ</button> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      <div class="text-center fixed-bottom alert alert-success" id="successMsg" style="display: none;"></div>
      <div class="text-center fixed-bottom alert alert-danger" id="errorMsg" style="display: none;"></div>
    </div>
  </section>
<?php include $templates_path . "footer.php";
} else {
  header('Location: index.php');
}
ob_end_flush();
