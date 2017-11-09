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
                        <span class='title'>Book List</span>
                    </a>
                    <span class='icon-thumbnail'><i class='pg-social'></i></span>
                  </li>
                    <li class=''>
                    <a href='../user/borrow.php'>
                        <span class='title'>Borrowing History</span>
                    </a>
                    <span class='icon-thumbnail'><i class='pg-form'></i></span>
                  </li>
                  <li class=''>
                    <a href='journals.php'><span class='title'>Download Journals</span></a>
                    <span class='icon-thumbnail'><i class='pg-bag'></i></span>
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
                        <span class='title'>Book List</span>
                    </a>
                    <span class='icon-thumbnail'><i class='pg-social'></i></span>
                  </li>
                  <li class=''>
                    <a href='../admin/member.php'>
                        <span class='title'>Member List</span>
                    </a>
                    <span class='icon-thumbnail'><i class='fa fa-list-ul'></i></span>
                  </li>
                  <li class=''>
                    <a href='../admin/admList.php'>
                        <span class='title'>Administrator List</span>
                    </a>
                    <span class='icon-thumbnail'><i class='fa fa-list-ul'></i></span>
                  </li>
                  <li class=''>
                    <a href='journals.php'><span class='title'>Download Journals</span></a>
                    <span class='icon-thumbnail'><i class='pg-bag'></i></span>
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
                $conn = mysqli_connect("127.0.0.1","root","","elibrary");
                $query = "select nama from user where username = '".$_SESSION['uname']."'";
                $result = mysqli_query($conn,$query);
                if (! $result){
                   throw new My_Db_Exception('Database error: ' . mysql_error());
                }

                while($row = $result->fetch_assoc()){
                  echo "<span  class='semi-bold'>You are logged in as " . $row['nama'] . "</span>";
                }  
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
                        </span>";
                    }
                    else {
                        echo "<span class='thumbnail-wrapper d32 inline m-t-5'>
                        <a href='../admin/adm.php'><i class='pg-home size-header'></i></a>
                        </span>";
                    }
                ?>
                <span class="thumbnail-wrapper d32 inline m-t-5">
                    <a href="news.php"><i class="fa fa-newspaper-o size-header"></i></a>
                </span>
                <?php
                    if($_SESSION['role']=='user') {
                        echo "<span class='thumbnail-wrapper d32 inline m-t-5'>
                        <a href='../user/usr.php'><i class='pg-mail size-header'></i></a>
                        </span>";   
                    }
                    else {
                        echo "<span class='thumbnail-wrapper d32 inline m-t-5'>
                        <a href='../admin/adm.php'><i class=' fa fa-bell size-header'></i></a>
                        </span>";  
                    }
                    ?>
                <span class="thumbnail-wrapper d32 inline m-t-5">
                    <a href="profile.php"><i class="fa fa-user size-header"></i></a>
                </span>
                <span class="thumbnail-wrapper d32 inline m-t-5">
                    <a href="logout.php"><i class="fa fa-sign-out size-header"></i></a>
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
              <h1 class="text-center header-of-page">Today's News</h1>
              <div class="content-item">
                  <h4><b>Trump election: Priebus and Bannon given key roles</b></h4>
                  <p>
                          US President-elect Donald Trump has awarded key roles in his incoming team to a top Republican party official and a right-wing media chief.
                Reince Priebus, chairman of the Republican National Committee (RNC), will be his chief of staff.
                In this role, he will set the tone for the new White House and act as a conduit to Congress and the government.
                Stephen Bannon, from the Breitbart News Network, will serve as Mr Trump's chief strategist.
                Mr Bannon stepped aside as executive chairman of Breitbart - a combative conservative site with an
                anti-establishment agenda - to act as Mr Trump's campaign chief.
                Meanwhile, in the president-elect's first interview, with US broadcaster CBS, Mr Trump said:
                        <ul>
                            <li>He would deport or jail up to three million illegal migrants with criminal links</li>
                            <li>Future Supreme Court nominees would be "pro-life" - meaning they oppose abortion - and defend the 
                            constitutional right to bear arms</li>
                            <li>He will not seek to overturn the legalisation of same-sex marriage</li>
                            <li>He will forgo the president's $400,000 salary, taking $1 a year instead</li>
                        </ul>.
                  </p>
                <p>
                    In a statement released by his campaign, Mr Trump described Mr Priebus and Mr Bannon as "highly qualified 
                    leaders who worked well together on our campaign and led us to a historic victory".
                    Mr Priebus, 44, acted as a bridge between Mr Trump and the Republican party establishment during the campaign. 
                    He is close to House Speaker Paul Ryan, a fellow Wisconsinite who could be instrumental in steering the new 
                    administration's legislative agenda.
                </p>
              </div>
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
              <span class="hint-text">Copyright &copy; 2016 </span>
              <span class="font-montserrat">Valentinancy & Vinieta</span>.
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