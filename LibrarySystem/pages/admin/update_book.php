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
    <!-- BEGIN SIDEBPANEL-->
    <nav class="page-sidebar" data-pages="sidebar">
      <!-- BEGIN SIDEBAR MENU HEADER-->
      <?php
             session_start(); 
             if(!$_SESSION['role']=='admin') { 
              header('location:../general/logout.php'); 
             }
        ?>
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
            <a href="books.php">
                <span class="title">图书列表</span>
            </a>
            <span class="icon-thumbnail"><i class="pg-social"></i></span>
          </li>
          <li class="">
            <a href="member.php">
                <span class="title">用户列表</span>
            </a>
            <span class="icon-thumbnail"><i class="fa fa-list-ul"></i></span>
          </li>
          <li class="">
            <a href="admList.php">
                <span class="title">管理员列表</span>
            </a>
            <span class="icon-thumbnail"><i class="fa fa-list-ul"></i></span>
          </li>
            <li class="">
            <a href="borrow_book.php">
                <span class="title">借书列表</span>
            </a>
            <span class="icon-thumbnail"><i class="fa fa-list-ul"></i></span>
          </li>
            <li class="">
            <a href="return_book.php">
                <span class="title">还书列表</span>
            </a>
            <span class="icon-thumbnail"><i class="fa fa-list-ul"></i></span>
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
                  echo "<span  class='semi-bold'>&nbsp;&nbsp;管理员：" . $row['nama'] . "</span>";
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
                    <a href="adm.php"><i class="pg-home size-header"></i></a>
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
            <?php
            require_once('../control/booklist.php');
            if($_GET){
              $book_id = $_GET['book_id'];
              $row = query_book($book_id);
            }

            ?>
              
              <?php
                    
                    $conn = connect();
                    if($_POST){
                        $name = $_POST['name'];
                        $author = $_POST['author'];
                        $date = $_POST['year'];
                        $publish = $_POST['publish'];
                        $cate=$_POST['cate'];
                        $key = $_POST['tag'];

                      

                        // $sql = "update book set name='$name',author='$author',date='$date',publish='$publish',cate='$cate',key='$key' where id=$book_id ";
                        $sql = "UPDATE `book` SET `name`='$name',`cate`='$cate',`author`='$author',`date`='$date',`key`='$key',`publish`='$publish' WHERE id = $book_id";
                        if (mysqli_query($conn, $sql)) {
                            echo "<script>alert('更新图书成功');</script>";
                            echo "<meta http-equiv=refresh content='0; url=books.php'>";
                        } else {
                            echo "<script>alert('更新图书失败');</script>";
                        }
                    }
                    mysqli_close($conn);

            ?>
              <div class="panel panel-transparent">
  

                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header clearfix text-left">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="false"><i class="pg-close fs-14"></i>
                          </button>
                          <h4 class="text-center">更改图书信息</h4>
                        </div>
                        <div class="modal-body">
                          <form role="form" method="POST">
                            <div class="form-group-attached">
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>书名</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $row['name'] ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>作者</label>
                                    <input type="text" name="author" class="form-control" value="<?php echo $row['author'] ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>出版日期(示例:2010-05-12)</label>
                                    <input type="text" name="year" class="form-control" value="<?php echo $row['date'] ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>出版社</label>
                                    <input type="text" name="publish" class="form-control" value="<?php echo $row['publish'] ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>标签(；分号分隔)</label>
                                    <input type="text" name="tag" class="form-control" value="<?php echo $row['key'] ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                <span class="label label-info">类别</span>
                                  <select name="cate" class="cs-select cs-skin-slide" data-init-plugin="cs-select">
                                    <option value="IT" <?php if($row['cate'] == "IT") echo  "selected = 'selected'"; ?> >IT</option>
                                    <option value="人文"  <?php if($row['cate'] == "人文") echo  "selected = 'selected'"; ?> >人文</option>
                                    <option value="数学"  <?php if($row['cate'] == "数学") echo  "selected = 'selected'"; ?> >数学</option>
                                    <option value="物理"  <?php if($row['cate'] == "物理") echo  "selected = 'selected'"; ?> >物理</option>
                                    <option value="历史"  <?php if($row['cate'] == "历史") echo  "selected = 'selected'"; ?> >历史</option>
                                    <option value="政治"  <?php if($row['cate'] == "政治") echo  "selected = 'selected'"; ?> >政治</option>
                                    <option value="化工"  <?php if($row['cate'] == "化工") echo  "selected = 'selected'"; ?> >化工</option>
                                    <option value="经济"  <?php if($row['cate'] == "经济") echo  "selected = 'selected'"; ?> >经济</option>
                                  </select>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12 m-t-10 sm-m-t-10">
                                  <button type="submit" class="btn btn-primary btn-block m-t-5">确定修改</button>
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
              
            </div>
            <!-- END PANEL -->
            <!-- END PLACE PAGE CONTENT HERE -->
          </div>
          <!-- END CONTAINER FLUID -->
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