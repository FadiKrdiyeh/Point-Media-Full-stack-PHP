<?php
ob_start();
session_start();
if (isset($_SESSION['AdminName'])) {
  header('Location: dashboard.php');
  exit();
}

$noNavbar = '';
$pageTitle = 'تسجيل الدخول';
include 'init.php';

// Check If User Comming From HTTP Request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $adminName = $_POST['adminname'];
  $password = $_POST['password'];
  $hashedPassword = sha1($password);

  // Check If User Exist In Database
  $query = "SELECT * FROM admins WHERE admin_name = ? AND `password` = ?";
  $stmt = $con->prepare($query);
  $stmt->execute(array($adminName, $hashedPassword));
  $count = $stmt->rowCount();

  if ($count > 0) {
    $data = $stmt->fetch();
    $_SESSION['AdminEmail'] = $data["email"];
    $_SESSION['AdminName'] = $data["full_name"];
    header('Location: dashboard.php');
    exit();
  }
}
?>

<body dir="rtl">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="login" method="POST">
    <h4 class="text-center">تسجيل الدخول</h4>
    <input class="form-control" type="text" name="adminname" placeholder="اسم المستخدم" autocomplete="off" />
    <input class="form-control" type="password" name="password" placeholder="كلمة المرور" autocomplete="new-password" />
    <input class="btn btn-primary" type="submit" value="تسجيل الدخول" />
  </form>
</body>

</html>