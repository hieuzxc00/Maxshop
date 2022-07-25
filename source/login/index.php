<?php 
require_once __DIR__. '/../autoload/autoload.php';

$data =
[
  "email"    => postInput("email"),
  "password" => postInput("password")
];

$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if(postInput('email') =='')
  {
    $error['email'] = "Mời bạn nhập email" ;
  } 
  if(postInput('password') =='')
  {
    $error['password'] = "Mời bạn nhập Password" ;
  }


  if (empty($error)) 
  {
    $is_check = $db->fetchOne("admin","email = '".$data['email']."' AND password = '".MD5($data['password'])."' " );

    if ($is_check != NULL) 
    {
      $_SESSION['admin_name'] =  $is_check['name'] ;
      $_SESSION['admin_id'] =  $is_check['id'] ;
      echo "<script>alert('Đăng nhập thành công ');location.href='/projectphp/admin'</script>";
    }
    else
    {
          //đăng nhập thất bại
      $_SESSION['error'] =  "Đăng nhập thất bại ! Bạn Vui lòng đăng nhập lại ." ;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="" method="POST">
                    <!-- Thông báo đưa ra khi nhập sai -->
          <?php if(isset($_SESSION['success'])):  ?>
                 <div class="alert alert-success text-center" role="alert"><?php echo $_SESSION['success']; unset($_SESSION['success'])?>
               </div>
             <?php endif ?>

             <?php if(isset($_SESSION['error'])):  ?>
               <div class="alert alert-danger text-center" role="alert"><?php echo $_SESSION['error']; unset($_SESSION['error'])?>
             </div>
           <?php endif ?>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" value="<?php echo $data['email'] ?>">
              <?php if(isset($error['email'])): ?>
                  <p class="text-danger"><?php echo $error['email'] ?></p>
              <?php endif ?>
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password">
              <?php if(isset($error['password'])): ?>
                  <p class="text-danger"><?php echo $error['password'] ?></p>
              <?php endif ?>
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="#">Register an Account</a>
          <a class="d-block small" href="#">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
