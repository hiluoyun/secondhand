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
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
   <script src="../../bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body class="fixed-header ">
    <!-- BEGIN SIDEBPANEL-->
    <nav class="page-sidebar" data-pages="sidebar">
        <?php
             session_start(); 
             if(!$_SESSION['role']=='user') { 
              header('location:../general/logout.php'); 
             }
        ?>
      <!-- BEGIN SIDEBAR MENU HEADER-->
      <div class="sidebar-header">
          <span class="sidebar-title-header"><b>eLIBRARY</b></span>
          <button type="button" class="btn btn-link visible-lg-inline" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
          </button>
        </div>
      </div>
      <!-- END SIDEBAR MENU HEADER-->
      <!-- START SIDEBAR MENU -->
      <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
          <li class="m-t-30">
            <a href="book.php">
                <span class="title">图书列表</span>
            </a>
            <span class="icon-thumbnail"><i class="pg-social"></i></span>
          </li>
           <li class="">
            <a href="mybook.php">
                <span class="title">我的图书</span>
            </a>
            <span class="icon-thumbnail"><i class="pg-form"></i></span>
          </li>
            <li class="">
            <a href="borrow.php">
                <span class="title">借阅记录</span>
            </a>
            <span class="icon-thumbnail"><i class="pg-form"></i></span>
          </li>
          <li class="">
            <a href="return.php">
                <span class="title">还书记录</span>
            </a>
            <span class="icon-thumbnail"><i class="pg-form"></i></span>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <!-- END SIDEBAR MENU -->
    </nav>
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
                <span class="thumbnail-wrapper d32 inline m-t-5">
                    <a href="usr.php"><i class="pg-home size-header"></i></a>
                </span>

                <span class='thumbnail-wrapper d32 inline m-t-5'>
                    <a href='notice.php'><i class=' fa fa-bell size-header'></i></a>
                </span>
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
          <div class="container-fluid container-fixed-lg">
            <!-- BEGIN PlACE PAGE CONTENT HERE -->
              <h1 class="text-center header-of-page">消息通知</h1>
              <div class="panel panel-transparent">




              <div class="panel-body">
              	<h3 class="text-left header-of-page">借书通知</h3>
                <table class="table table-hover demo-table-dynamic" id="tableWithDynamicRows">
                  <thead>
                    <tr>
                      <th>图书编号</th>
                      <th>书名</th>
                      <th>借阅者</th>
                      <th>联系电话</th>
                      <th>地址</th>
                      <th>借阅日期</th>
                      <th>状态</th>
                      <th>是否借出</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                        
                    require_once('../control/booklist.php');

                            $result = query_row('borrow_book','*','contributor',quet_str($uname));
                            while($row = $result->fetch_array()){
                              $book_id = $row['book_id'];
                              $book_name = query_column('book','name','id',$book_id);
                              $us_name="'".$row['username']."'";
                              $tel = query_column('user','no_telp','username',$us_name);
                              $addr = query_column('user','alamat','username',$us_name);
                              $status = "借出";
                              if ($row['status'] == 1){
                                $status = "待处理";
                              }
                              echo "<tr>
                                    <td class='v-align-middle'>
                                        <p>" . $book_id . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $book_name . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $row['username'] . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $tel . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $addr . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $row['date'] . "</p>
                                    </td>

                                    <td class='v-align-middle'>
                                        <p>" . $status . "</p>
                                    </td>
                                    <td class='v-align-middle'>";

                                    if ($row['status'] == 0){
                                      echo "<a class='btn btn-info disabled'";
                                    }else{
                                      echo "<a class='btn btn-info'";
                                    }
                                    echo " href='deal_notice.php?uname=$uname&book_id=$book_id' role='button'>确定</a>
                                    </td>
                                </tr>";
                            }
                        
                    ?>
                  </tbody>
                </table>
				<br>
				<hr>
              	<h3 class="text-left header-of-page">还书通知</h3>
                <table class="table table-hover demo-table-dynamic" id="tableWithDynamicRows">
                  <thead>
                    <tr>
                      <th>图书编号</th>
                      <th>书名</th>
                      <th>借阅者</th>
                      <th>联系电话</th>
                      <th>地址</th>
                      <th>借阅日期</th>
                      <th>还书日期</th>
                      <th>状态</th>
                      <th>是否确认</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                        
                    require_once('../control/booklist.php');

                            $result = query_row('return_book','*','owner',quet_str($uname));
                            while($row = $result->fetch_array()){
                              $book_id = $row['book_id'];
                              // $book_name = query_column('book','name','id',$book_id);
                              $us_name="'".$row['username']."'";
                              $tel = query_column('user','no_telp','username',$us_name);
                              $addr = query_column('user','alamat','username',$us_name);

                              $status = "已确认";
                              if ($row['status'] == 1){
                                $status = "待处理";
                              }
                              echo "<tr>
                                    <td class='v-align-middle'>
                                        <p>" . $book_id . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $row['book_name'] . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $row['username'] . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $tel . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $addr . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $row['b_date'] . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $row['date'] . "</p>
                                    </td>
									
                                    <td class='v-align-middle'>
                                        <p>" . $status . "</p>
                                    </td>
                                    <td class='v-align-middle'>";

                                    if ($row['status'] == 0){
                                      echo "<a class='btn btn-info disabled'";
                                    }else{
                                      echo "<a class='btn btn-info'";
                                    }
                                    echo " href='deal_return.php?uname=$uname&book_id=$book_id' role='button'>确定</a>
                                    </td>
                                </tr>";
                            }
                        
                    ?>
                  </tbody>
                </table>                
              </div>
            </div>
            <!-- END PANEL -->
            <!-- END PLACE PAGE CONTENT HERE -->
          </div>
          <!-- END CONTAINER FLUID -->
        </div>
        <!-- END PAGE CONTENT -->
        <!-- START COPYRIGHT -->
        <!-- START CONTAINER FLUID -->
        <?php
          $conn = connect();
                    if($_GET){
                        $name = $_GET['name'];
                        $author = $_GET['author'];
                        $date = $_GET['year'];
                        $publish = $_GET['publish'];
                        $cate=$_GET['cate'];
                        $key = $_GET['tag'];
                        $contri_date = date("Y-m-d",time());

                        $sql = "INSERT INTO book VALUES ('','$name', '$cate', '$author', '$date','$key', '$publish','$uname','$contri_date',1)";

                        if (mysqli_query($conn, $sql)) {
                            echo "<script>alert('添加图书成功');</script>";
                        } else {
                            echo "<script>alert('添加图书失败');</script>";
                        }
                    }
                    mysqli_close($conn);
        ?>
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