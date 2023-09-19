<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php
        include("Control.php");
        session_start();
        $getdata = new data();
        if(!isset($_SESSION['TenTK']))   header("Location: Dangnhap.php");
        $input = $getdata->Search_User($_SESSION['TenTK']);
        $ttcn = mysqli_fetch_array($input);
    ?>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo$ttcn['Chucvu'].": ".$ttcn['Name_User']; ?></title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/basic.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="font-style: italic; color: red;" href="Admin_TC.php">Fruit Shop</a>
            </div>

            <div class="header-right">
                <a href="message-task.html" class="btn btn-info" title="Hộp thư đến"><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="message-task.html" class="btn btn-primary" title="New Task"><i class="fa fa-bars fa-2x"></i></a>
                <button href="login.html" id="logout" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></button>
                <script>
                    $('#logout').click(function(){
                        if(confirm("Bạn có chắc chắn muốn đăng xuất?")) {
                            window.location = '../Dangnhap.php'
                        }
                    });
                </script>
            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="../User/images/image_User/<?php echo$ttcn['Avt']; ?>" class="img-thumbnail" style="border-radius: 50%;" />

                            <div class="inner-text">
                                <?php echo$ttcn['Name_User']; ?>
                            </div>
                        </div>
                    </li>


                    <li>
                        <a class="active-menu" href="Admin_TC.php"><i class="fa fa-dashboard "></i>Trang chủ</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop"></i>Kho hàng<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="Nhaphang.php"><i class="fa fa-toggle-on"></i>Nhập hàng</a>
                            </li>
                            <li>
                                <a href="DSSP.php"><i class="fa fa-toggle-on"></i>Danh sách hàng</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-flash"></i>Tặng khuyến mãi<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="Voucher.php"><i class="fa fa-yelp"></i>Voucher</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="QLUser.php"><i class="fa fa-desktop"></i>Quản lý User</a>
                    </li>
                    <li>
                        <a href="DSPhanhoi.php"><i class="fa fa-flash"></i>Danh sách phản hồi</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-calculator"></i>Yêu cầu nạp tiền</a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="DSYCNT.php"><i class="fa fa-comment"></i>Chưa xác nhận<span style="color: red;"><?php if(isset($_SESSION['demyc']) && $_SESSION['demyc']>0) echo"(".$_SESSION['demyc'].")"; ?></span></a>
                            </li>
                            <li>
                                <a href="LisuYCNT.php"><i class="fa fa-history"></i>Đã xác nhận</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table"></i>Doanh thu</a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#"><i class="fa fa-bullseye"></i>Theo ngày</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-eyedropper"></i>Theo tháng</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../User/Trangchu.php" ><i class="fa fa-sign-in "></i>Rời trang quản lý</a>
                    </li>
                </ul>
             </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <h1 class="page-head-line">Danh sách các người dùng</h1>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <form method="post">
                                <div style="margin-top: 15px; margin-bottom: 10px; margin-left: 20px;">
                                    Tìm kiếm người dùng/tài khoản:
                                    <input type="text" name="txtsearch">
                                    <input type="submit" name="searchuser" value="Tìm kiếm">
                                </div>
                                <div class="panel-heading" style="font-weight: bold;">Danh sách mặt hàng</div>
                                <div class="panel-body">
                                    <div class="table-responsive" style="height: 400px; overflow: auto;">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tên tài khoản</th>
                                                    <th>Tên người dùng</th>
                                                    <th>Ngày sinh</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Email</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $select_user = $getdata->Load_SP('dsuser');
                                                    if(isset($_POST['searchuser'])){
                                                        if($_POST['txtsearch'] != ""){
                                                            $select_user = $getdata->ListUser_search($_POST['txtsearch']);
                                                        }
                                                    }
                                                    $stt=1;
                                                    foreach($select_user as $user){
                                                ?>
                                                    <tr>
                                                        <td><?php echo$stt++; ?></td>
                                                        <td><?php echo$user["Name_TK"]; ?></td>
                                                        <td><?php echo$user["Name_User"]; ?></td>
                                                        <td><?php echo$user["Date"]; ?></td>
                                                        <td><?php echo$user["PhoneNumber"]; ?></td>
                                                        <td><?php echo$user["Email"]; ?></td>
                                                        <td><a href="ChitietUser.php?TenTK=<?php echo$user["Name_TK"]; ?>" onclick="<?php $_SESSION['Back'] = 'QLUser.php' ?>">Chi tiết</a></td>
                                                    </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    


</body>
</html>
