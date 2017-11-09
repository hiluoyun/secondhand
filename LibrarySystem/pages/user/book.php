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
              <h1 class="text-center header-of-page">图书列表</h1>
              <div class="panel panel-transparent">
              <form method="POST">
                  <div class="panel-heading">
                    <div class="form-group m-b-10 col-md-3">
                        <input type="text" name="search" placeholder="查询书籍..." class="form-control">
                    </div>
                    <div class="col-md-1">
                        <span class="panel-title by-search text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;by</span>
                    </div>
                    <div class="col-md-3">
                          <div class="cs-wrapper">
                              <div class="cs-select cs-skin-slide" tabindex="0">
                                  <div class="cs-options" style="width: auto; overflow-y: hidden;">
                                      <ul>
                                          <li data-option="" data-value="sightseeing" class="cs-selected">
                                              <span>书名</span>
                                          </li>
                                          <li data-option="" data-value="business" class="">
                                              <span>种类</span>
                                          </li>
                                          <li data-option="" data-value="honeymoon" class="">
                                              <span>作者</span>
                                          </li>
                                      </ul>
                                  </div>
                                  <select name="searchby" class="cs-select cs-skin-slide" data-init-plugin="cs-select">
                                    <option value="name">书名</option>
                                    <option value="cate">种类</option>
                                    <option value="author">作者</option>
                                  </select>
                                  <div class="cs-backdrop" style="transform: scale3d(1, 1, 1);">
                                  </div>
                              </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <button class="btn btn-default btn-cons" type="submit">查询</button>
                        </div>
                    </div>
                  </div>
                </form>
                <button class="btn btn-success btn-cons" style="float:right" data-target="#myModal" data-toggle="modal">添加图书</button>
                                <div class="modal fade stick-up" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header clearfix text-left">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                          </button>
                          <h4 class="text-center">图书信息</h4>
                        </div>
                        <div class="modal-body">
                          <form role="form" method="get">
                            <div class="form-group-attached">
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>书名</label>
                                    <input type="text" name="name" class="form-control">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>作者</label>
                                    <input type="text" name="author" class="form-control">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>出版日期(示例:2010-05-12)</label>
                                    <input type="text" name="year" class="form-control">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>出版社</label>
                                    <input type="text" name="publish" class="form-control">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>标签(；分号分隔)</label>
                                    <input type="text" name="tag" class="form-control">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                <span class="label label-info">类别</span>
                                  <select name="cate" class="cs-select cs-skin-slide" data-init-plugin="cs-select">
                                    <option value="IT">IT</option>
                                    <option value="人文">人文</option>
                                    <option value="数学">数学</option>
                                    <option value="物理">物理</option>
                                    <option value="历史">历史</option>
                                    <option value="政治">政治</option>
                                    <option value="化工">化工</option>
                                    <option value="经济">经济</option>
                                  </select>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12 m-t-10 sm-m-t-10">
                                  <button type="submit" class="btn btn-primary btn-block m-t-5">添加图书</button>
                              </div>
                            </div>
                            </div>
                          </form>
                          
                          </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>


              <div class="panel-body">
                <table class="table table-hover demo-table-dynamic" id="tableWithDynamicRows">
                  <thead>
                    <tr>
                      <th>图书编号</th>
                      <th>书名</th>
                      <th>作者</th>
                      <th>所有者</th>
                      <th>出版日期</th>
                      <th>出版社</th>
                      <th>种类</th>
                      <th>状态</th>
                      <th>操作</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                        
                    require_once('../control/booklist.php');
                    
                        if($_POST) {
                            $conn = connect();
                            $search = $_POST['search'];
                            $searchby = $_POST['searchby'];

                            $result = search_book($searchby,$search);
                            while ( $row = $result->fetch_assoc() ) {
                              $book_id = $row['id'];
                              $status = "借出";
                              if ($row['status'] == 1){
                                $status = "可借";
                              }
                              echo "<tr>
                                    <td class='v-align-middle'>
                                        <p>" . $row['id'] . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $row['name'] . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $row['author'] . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $row['contributor'] . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $row['date'] . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $row['publish'] . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $row['cate'] . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $status . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <a class='btn btn-success' href='comments.php?book_id=$book_id' role='button'>查看详情</a>
                                    </td>                                    
                                    <td class='v-align-middle'>";
                                    if ($row['status'] == 0){
                                      echo "<a class='btn btn-info disabled'";
                                    }else{
                                      echo "<a class='btn btn-info'";
                                    }
                                    echo " href='borrow_book.php?uname=$uname&book_id=$book_id' role='button'>借阅</a>
                                    </td>
                                </tr>";
                                }
                        }
                        else {
                            $result = list_book();
                            while($row = $result->fetch_array()){
                              $book_id = $row['id'];
                              $status = "借出";
                              if ($row['status'] == 1){
                                $status = "可借";
                              }
                              echo "<tr>
                                    <td class='v-align-middle'>
                                        <p>" . $row['id'] . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $row['name'] . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $row['author'] . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $row['contributor'] . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $row['date'] . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $row['publish'] . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $row['cate'] . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <p>" . $status . "</p>
                                    </td>
                                    <td class='v-align-middle'>
                                        <a class='btn btn-success' href='comments.php?book_id=$book_id' role='button'>查看详情</a>
                                    </td>
                                    <td class='v-align-middle'>";

                                    if ($row['status'] == 0){
                                      echo "<a class='btn btn-info disabled'";
                                    }else{
                                      echo "<a class='btn btn-info'";
                                    }
                                    echo " href='borrow_book.php?uname=$uname&book_id=$book_id' role='button'>借阅</a>
                                    </td>
                                </tr>";
                            }
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