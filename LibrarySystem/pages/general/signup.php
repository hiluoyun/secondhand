<!DOCTYPE html>
<html>
  <head>
    <title>eLibrary</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="apple-touch-icon" href="../../style/pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../../style/pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../../style/pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../../style/pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="../../style/style.css" rel="stylesheet" type="text/css" />
    <link href="../../style/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="../../style/assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../style/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../../style/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../../style/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../../style/assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../../style/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="../../style/pages/css/pages.css" rel="stylesheet" type="text/css" />
     <script src="../../lib/jquery-3.1.1.min.js" type="text/javascript"></script>
  </head>
  <body class="fixed-header ">
    <div class="register-container full-height sm-p-t-30">
      <div class="container-sm-height full-height">
        <div class="row row-sm-height">
          <div class="col-sm-12 col-sm-height col-middle">
            <h3> 注册一个帐号 </h3>
            <?php
              require_once("../util.php");
              if($_POST) { 
                  $username=$_POST['uname']; 
                  $password=$_POST['pass'];
                  $confpassword=$_POST['confpass'];
                  $nama=$_POST['name']; 
                  $alamat=$_POST['address']; 
                  $notelp=$_POST['phone']; 
                  $isadmin="0"; 
                  $conn=connect();
                  $query="INSERT INTO `user` (username, password, nama, alamat, no_telp, is_admin) VALUES ('$username', '$password', '$nama', '$alamat', '$notelp', '$isadmin')";
                    if($password==$confpassword) {
                        if (mysqli_query($conn, $query)) { 
                            echo '<script type="text/javascript">';
                            echo '$(document).ready(function() {';
                            echo '$("#modalFillIn").modal("show");';
                            echo '});';
                            echo '</script>';
                        }
                        else { 
                            echo "<span class='red-color'><b>用户名已经存在！</b></span>"; 
                        } 
                    }
                  else {
                    echo "<span class='red-color'><b>两次输入的密码不匹配！</b></span>"; 
                  }
                  mysqli_close($conn);
                 }

                ?>
              
            <form id="form-register" class="p-t-15" role="form" method="POST">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group form-group-default">
                    <label>用户名</label>
                    <input type="text" name="uname" placeholder="username" class="form-control"  required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group form-group-default">
                    <label>密码</label>
                    <input type="password" name="pass" placeholder="password" class="form-control"  required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group form-group-default">
                    <label>确认密码</label>
                    <input type="password" name="confpass" placeholder="confirm password" class="form-control"  required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group form-group-default">
                    <label>昵称</label>
                    <input type="text" name="name" placeholder="name" class="form-control"  required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group form-group-default">
                    <label>手机号码</label>
                    <input type="text" name="phone" placeholder="phone number" class="form-control"  required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group form-group-default">
                    <label>地址 (为了方便取书，地址具体到单元)</label>
                    <input type="text" name="address" placeholder="address" class="form-control"  required>
                  </div>
                </div>
              </div>
              <button class="btn btn-primary btn-cons m-t-10" type="submit"> 注册 </button>
              <button class="btn btn-primary btn-cons m-t-10" onClick="location.href='../../index.php'" type="submit"> 取消 </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
      <div class="modal fade fill-in" id="modalFillIn" tabindex="-1" role="dialog" aria-hidden="true">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              <i class="pg-close"></i>
            </button>
            <div class="modal-dialog ">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="text-left p-b-5"><span class="semi-bold">恭喜！ 您已经注册成功</span></h5>
                  <h5 class="text-left p-b-5">请继续登录 </h5>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-3 no-padding sm-m-t-10 sm-text-center">
                      <button type="button" class="btn btn-primary btn-lg btn-large fs-15" onClick="location.href='login.php'"> 登录 </button>
                    </div>
                    <div class="col-md-3 no-padding sm-m-t-10 sm-text-center">
                      <button type="button" class="btn btn-primary btn-lg btn-large fs-15" onClick="location.href='../../index.php'"> 取消 </button>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
    <!-- BEGIN VENDOR JS -->
    <script src="../../style/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="../../style/assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="../../style/assets/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="../../style/assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="../../style/assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../style/assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="../../style/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="../../style/assets/plugins/jquery-bez/jquery.bez.min.js"></script>
    <script src="../../style/assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="../../style/assets/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="../../style/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="../../style/assets/plugins/bootstrap-select2/select2.min.js"></script>
    <script type="text/javascript" src="../../style/assets/plugins/classie/classie.js"></script>
    <script src="../../style/assets/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
    <script src="../../style/assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <!-- END VENDOR JS -->
    <script src="../../style/pages/js/pages.min.js"></script>
    <script>
    $(function()
    {
      $('#form-register').validate()
    })
    </script>
  </body>
</html>