<?php
session_start();
error_reporting(0);
include("dbconnection.php");
if(isset($_POST['login']))
{
  $adminusername=$_POST['email'];
  $pass=md5($_POST['password']);
$ret=mysqli_query($con,"SELECT * FROM admin WHERE email='$adminusername' and password='$pass'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="ticket/tickets.php";
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['id'];
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
else
{
$_SESSION['action1']='<script> swal("Hata","Kullanıcı Adı veya Şifre hatalı!","error"); </script>';
$extra="index.php";
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Neon Admin Panel" />
  <meta name="author" content="" />


  <title>Void Development - Admin Panel</title>

  <link rel="stylesheet" href="https://www.jquery-az.com/javascript/alert/dist/sweetalert.css">
  <script src="https://www.jquery-az.com/javascript/alert/dist/sweetalert-dev.js"></script>

  <link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
  <link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/neon-core.css">
  <link rel="stylesheet" href="assets/css/neon-theme.css">
  <link rel="stylesheet" href="assets/css/neon-forms.css">
  <link rel="stylesheet" href="assets/css/custom.css">
  <script src="assets/js/jquery-1.11.3.min.js"></script>
</head>
<body class="page-body login-page login-form-fall">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '';
</script>
<div class="login-container">
  <div class="login-header login-caret">
    <div class="login-content">
      <a class="logo">
<h1 style="color: #fff"><strong>Void</strong> Development</h1>
      </a>
    </div>
  </div>


<div class="login-progressbar">
    <div></div>
  </div>
  
  <div class="login-form">
    
    <div class="login-content">

                        <p style="color:#F00; padding-top:20px;" align="center">
                    <?php echo $_SESSION['action1'];?><?php echo $_SESSION['action1']="";?></p>
      <form class="form-login" action="" method="post">
        
        <div class="form-group">
          
          <div class="input-group">
            <div class="input-group-addon">
              <i class="entypo-user"></i>
            </div>
            
                <input type="text" name="email" class="form-control" placeholder="Email" autofocus>
          </div>
          
        </div>
        
        <div class="form-group">
          
          <div class="input-group">
            <div class="input-group-addon">
              <i class="entypo-key"></i>
            </div>
            
                <input type="password" name="password" class="form-control" placeholder="Password"><br >
          </div>
        
        </div>
       <div class="form-group">
          <button name="login" type="submit" class="btn btn-primary btn-block btn-login">
            Login
            <i class="entypo-login"></i>
          </button>
          
        </div>
        <!-- Implemented in v1.1.4 -->
        
        <div class="form-group">
        

          
        </div>
      </form>
      
    </div>
    
  </div>
  
</div>







    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>
  <!-- Bottom scripts (common) -->
  <script src="assets/js/gsap/TweenMax.min.js"></script>
  <script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/joinable.js"></script>
  <script src="assets/js/resizeable.js"></script>
  <script src="assets/js/neon-api.js"></script>
  <script src="assets/js/jquery.validate.min.js"></script>
  <script src="assets/js/neon-login.js"></script>
  <script src="assets/js/neon-custom.js"></script>
  <script src="assets/js/neon-demo.js"></script>
</body>
</html>