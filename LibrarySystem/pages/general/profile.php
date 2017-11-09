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
    <link rel="icon" type="image/x-icon" href="../../style/favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="../../style/style.css" rel="stylesheet" type="text/css" />
    <link href="../../style/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="../../style/style.css" rel="stylesheet" type="text/css" />
    <link href="../../style/assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../lib/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../../style/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../../style/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../../style/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../../style/assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../../style/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="../../style/pages/css/pages.css" rel="stylesheet" type="text/css" />
  </head>
  <body class="fixed-header ">
    <?php
         session_start(); 
         if(!$_SESSION['auth']) { 
          header('location:../general/logout.php'); 
         }
    ?>
    <?php
        if($_SESSION['role']=='user') {
            echo "<nav class='page-sidebar' data-pages='sidebar'>
              <div class='sidebar-header'>
                  <span class='sidebar-title-header'><b>eLIBRARY</b></span>
                  <button type='button' class='btn btn-link visible-lg-inline' data-toggle-pin='sidebar'><i class='fa fs-12'></i>
                  </button>
              </div>
              <div class='sidebar-menu'>
                <ul class='menu-items'>
                  <li class='m-t-30'>
                    <a href='../user/book.php'>
                        <span class='title'>图书列表</span>
                    </a>
                    <span class='icon-thumbnail'><i class='pg-social'></i></span>
                  </li>
                             <li class=''>
            <a href='../user/mybook.php'>
                <span class='title'>我的图书</span>
            </a>
            <span class='icon-thumbnail'><i class='pg-form'></i></span>
          </li>
                    <li class=''>
            <a href='../user/borrow.php'>
                <span class='title'>借阅记录</span>
            </a>
            <span class='icon-thumbnail'><i class='pg-form'></i></span>
          </li>
          <li class=''>
            <a href='../user/return.php'>
                <span class='title'>还书记录</span>
            </a>
            <span class='icon-thumbnail'><i class='pg-form'></i></span>
          </li>
                </ul>
                <div class='clearfix'</div>
              </div>
            </nav>";
        }
        else {
            echo "<nav class='page-sidebar' data-pages='sidebar'>
              <div class='sidebar-header'>
                  <span class='sidebar-title-header'><b>eLIBRARY</b></span>
                  <button type='button' class='btn btn-link visible-lg-inline' data-toggle-pin='sidebar'><i class='fa fs-12'></i>
                  </button>
              </div>
              <div class='sidebar-menu'>
                <ul class='menu-items'>
                  <li class='m-t-30'>
                    <a href='../admin/books.php'>
                        <span class='title'>图书列表</span>
                    </a>
                    <span class='icon-thumbnail'><i class='pg-social'></i></span>
                  </li>
                  <li class=''>
                    <a href='../admin/member.php'>
                        <span class='title'>用户列表</span>
                    </a>
                    <span class='icon-thumbnail'><i class='fa fa-list-ul'></i></span>
                  </li>
                  <li class=''>
                    <a href='../admin/admList.php'>
                        <span class='title'>管理员列表</span>
                    </a>
                    <span class='icon-thumbnail'><i class='fa fa-list-ul'></i></span>
                  </li>
                    <li class=''>
            <a href='borrow_book.php'>
                <span class='title'>借书列表</span>
            </a>
            <span class='icon-thumbnail'><i class='fa fa-list-ul'></i></span>
          </li>
            <li class=''>
            <a href='return_book.php'>
                <span class='title'>还书列表</span>
            </a>
            <span class='icon-thumbnail'><i class='fa fa-list-ul'></i></span>
          </li>
                </ul>
                <div class='clearfix'></div>
              </div>
            </nav>";   
        }
    ?>
    <!-- END SIDEBAR -->
    <!-- END SIDEBPANEL-->
    <!-- START PAGE-CONTAINER -->
    <div class="page-container ">
      <!-- START HEADER -->
      <div class="header ">
        <!-- START MOBILE CONTROLS -->
        <div class="container-fluid relative">
          <!-- LEFT SIDE -->
          <div class="pull-left full-height visible-sm visible-xs">
            <!-- START ACTION BAR -->
            <div class="header-inner">
              <a href="#" class="btn-link toggle-sidebar visible-sm-inline-block visible-xs-inline-block padding-5" data-toggle="sidebar">
                <span class="icon-set menu-hambuger"></span>
              </a>
            </div>
            <!-- END ACTION BAR -->
          </div>
          <div class="pull-center hidden-md hidden-lg">
            <div class="header-inner">
              <div class="brand inline">
                <h3>eLIBRARY</h3>
              </div>
            </div>
          </div>
          <!-- RIGHT SIDE -->
          <div class="pull-right full-height visible-sm visible-xs">
            <!-- START ACTION BAR -->
            <div class="header-inner">
              <a href="#" class="btn-link visible-sm-inline-block visible-xs-inline-block" data-toggle="quickview" data-toggle-element="#quickview">
                <span class="icon-set menu-hambuger-plus"></span>
              </a>
            </div>
            <!-- END ACTION BAR -->
          </div>
        </div>
        <!-- END MOBILE CONTROLS -->
        <div class=" pull-left sm-table hidden-xs hidden-sm">
          <div class="header-inner">
            <div class="brand inline">
              <h4><b>eLibrary</b></h4>
            </div>
            <?php
                // Create connection
                require_once('../util.php');
                $conn = connect();
                $uname = $_SESSION['uname'];
                $query = "select nama from user where username = '$uname'";
                $result = mysqli_query($conn,$query);
                if (! $result){
                   throw new My_Db_Exception('Database error: ' . mysql_error());
                }

                while($row = $result->fetch_assoc()){
                  echo "<span  class='semi-bold'>欢迎您！ " . $row['nama'] . "</span>";
                }
                mysqli_close($conn);  
            ?>
          </div>
        </div>
        <div class=" pull-right">
          <!-- START User Info-->
          <div class="visible-lg visible-md m-t-10">
            <div class="dropdown pull-right">
                <?php
                    if($_SESSION['role']=='user') {
                        echo "<span class='thumbnail-wrapper d32 inline m-t-5'>
                        <a href='../user/usr.php'><i class='pg-home size-header'></i></a>
                        </span>
                        <span class='thumbnail-wrapper d32 inline m-t-5'>
                        <a href='../user/notice.php'><i class=' fa fa-bell size-header'></i></a>
                        </span>";
                    }
                    else {
                        echo "<span class='thumbnail-wrapper d32 inline m-t-5'>
                        <a href='../admin/adm.php'><i class='pg-home size-header'></i></a>
                        </span>";
                    }
                ?>
                <span class="thumbnail-wrapper d32 inline m-t-5">
                    <a href="../general/profile.php"><i class="fa fa-user size-header"></i></a>
                </span>
                <span class="thumbnail-wrapper d32 inline m-t-5">
                    <a href="../general/logout.php"><i class="fa fa-sign-out size-header"></i></a>
                </span>
            </div>
          </div>
          <!-- END User Info-->
        </div>
      </div>
      <!-- END HEADER -->
      <!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper ">
        <!-- START PAGE CONTENT -->
        <div class="content ">
          <!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg text-center">
              
            <!-- BEGIN PlACE PAGE CONTENT HERE -->
              <?php 
                    //update profil orang 
                     if($_POST) { 
                      $username=$_SESSION['uname']; 
                      $password=$_POST['password'];
                      $confpassword=$_POST['confpassword'];
                      $alamat=$_POST['addr']; 
                      $notelp=$_POST['phone']; 
                      $conn = connect();
                      
                      $sql = "UPDATE `user` SET Password='$password', Alamat='$alamat', No_telp='$notelp' WHERE Username='$username'";
                      if($password==$confpassword) {
                          if ($conn->query($sql) === TRUE) {   
                           echo "<span class='red-color'><b>信息更新成功!</b></span>";
                          }
                            else { 
                           echo "Error updating record: " . $conn->error; 
                          } 
                      }
                      else {
                          echo "<span class='red-color'><b>两次输入的密码不匹配！</b></span>";
                      }
                      mysqli_close($conn);
                     }
                ?>
              <h1 class="text-center header-of-page">个人中心</h1>
              <div class="update-profile">
                <div class="card share text-center">
                    <div class="card-content">
                        <img alt="Quote" src="../../img/profile.jpg">
                    </div>
                    <div class="card-description text-center">
                        <button class="btn btn-success btn-cons" data-target="#myModal" data-toggle="modal">更新用户信息</button>
                    </div>
                </div>
              </div>
            <!-- END PLACE PAGE CONTENT HERE -->
          </div>
          <!-- END CONTAINER FLUID -->
            <div class="modal fade stick-up" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content text-center">
                <div class="modal-header clearfix text-center">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                  </button>
                  <h3>更新用户信息</h3>
                    <?php
                        $conn = connect();
                        $query = "select nama from user where username = '".$_SESSION['uname']."'";
                        $result = mysqli_query($conn,$query);
                        if (! $result){
                           throw new My_Db_Exception('Database error: ' . mysql_error());
                        }

                        while($row = $result->fetch_assoc()){
                          echo "<p> 用户名: " . $row['nama'] . "</p>";
                        }
                        mysqli_close($conn);  
                    ?>
                </div>
                <div class="modal-body"> 
                  <form role="form" method="POST">
                    <div class="form-group-attached">
                      <?php
                            $conn = connect();
                            if ($conn) {
                                $username = $_SESSION['uname'];
                                $SQL = "SELECT Password,No_telp,Alamat FROM user WHERE Username='$username'";
                                $result = mysqli_query($conn,$SQL);

                                while ( $row = $result->fetch_assoc() ) {

                                    echo "<div class='row'>
                                        <div class='col-sm-12'>
                                          <div class='form-group form-group-default'>
                                            <label>密码</label>
                                            <input type='password' id='pass' name='password' class='form-control form-control-update'>
                                            <script>
                                              var pass = document.getElementById('pass');
                                              pass.value = ".$row['Password'].";
                                            </script>
                                          </div>
                                        </div>
                                      </div>
                                      <div class='row'>
                                        <div class='col-sm-12'>
                                          <div class='form-group form-group-default'>
                                            <label>确认密码</label>
                                            <input type='password' name='confpassword' id='confpass' class='form-control form-control-update'>
                                          </div>
                                        </div>
                                      </div>
                                      <div class='row'>
                                        <div class='col-sm-12'>
                                          <div class='form-group form-group-default'>
                                            <label>手机号码</label>
                                            <input type='text' name='phone' id='phone' class='form-control form-control-update'>
                                            <script>
                                              var phone = document.getElementById('phone');
                                              phone.value = ".$row['No_telp'].";
                                            </script>
                                          </div>
                                        </div>
                                      </div>
                                      <div class='row'>
                                        <div class='col-sm-12'>
                                          <div class='form-group form-group-default'>
                                            <label>地址</label>
                                            <input type='text' name='addr' id='addr' class='form-control form-control-update'>
                                            <script>
                                              var addr = document.getElementById('addr');
                                              addr.value = ".$row['Alamat'].";
                                            </script>
                                          </div>
                                        </div>
                                      </div>";

                                }
                                mysqli_close($conn);;
                                }
                        ?>
                      
                    </div>
                      <div class="row">
                    <div class="col-sm-4 m-t-10 sm-m-t-10 pull-right">
                      <button type="submit" class="btn btn-primary btn-block m-t-5 text-center">更新信息</button>
                    </div>
                  </div>
                  </form>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
        </div>
        <!-- END PAGE CONTENT -->
        <!-- START COPYRIGHT -->
        <!-- START CONTAINER FLUID -->
        <div class="container-fluid container-fixed-lg footer">
          <div class="copyright sm-text-center">
            <p class="small no-margin pull-left sm-pull-reset">
              <span class="hint-text">Copyright &copy; 2017 </span>
              <span class="font-montserrat">Li Kundong</span>.
              <span class="hint-text">All rights reserved. </span>
            </p>
            <div class="clearfix"></div>
          </div>
        </div>
        <!-- END COPYRIGHT -->
      </div>
      <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTAINER -->
    
   
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
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="../../style/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="../../style/assets/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
  </body>
</html>