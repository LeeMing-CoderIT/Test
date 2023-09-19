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
                <h1 class="page-head-line">Chi tiết thông tin người dùng</h1>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <?php
                                $name=""; $tien=0;
                                if(isset($_GET['TenTK']))    $name = $_GET['TenTK'];
                                $load = $getdata->Search_User($name);
                                $user = mysqli_fetch_array($load);
                            ?>
                            <form method="post" enctype="multipart/form-data" style=" margin-top: 10px; margin-left: 10px;">
                                <div style="font-size: 30px; font-weight: bold; color: darkorange;">Người dùng:   Tên tài khoản: <?php echo$user["Name_TK"]; ?></div><br>
                                <span style="font-size: 20px;">Ảnh đại diện: </span>
                                    <img src="../User/images/image_User/<?php echo$user["Avt"]; ?>" style="width: 250px; height: 250px;" alt="lỗi">
                                    <input type="file" name="img_avt" onclick=""><br><br>
                                <span style="font-size: 20px;">Tên người dùng: </span>
                                    <input type="text" name="txtten" value="<?php echo$user["Name_User"]; ?>"><br><br>
                                <span style="font-size: 20px;">Giới tính:  </span>
                                    <input type="radio" name="txtgt" value="Nam" <?php if($user["Sex"]=="Nam") echo"checked"; ?>>Nam
                                    <input type="radio" name="txtgt" value="Nữ" <?php if($user["Sex"]=="Nữ") echo"checked"; ?>>Nữ<br><br>
                                <span style="font-size: 20px;">Địa chỉ:  </span>
                                    <input type="" name="txtdc" value="<?php echo$user["Address"]; ?>"><br><br>
                                <span style="font-size: 20px;">Số điện thoại:  </span>
                                    <input type="tel" name="txtsdt" value="<?php echo$user["PhoneNumber"]; ?>"><br><br>
                                <span style="font-size: 20px;">Ngày sinh:  </span>
                                    <input type="date" name="txtns" style="width: 300px;" value="<?php echo$user["Date"]; ?>"><br><br>
                                <span style="font-size: 20px;">Email:  </span>
                                    <input type="email" name="txtemail" style="width: 300px;" value="<?php echo$user["Email"]; ?>"><br><br>
                                <span style="font-size: 20px;">Ví:  </span>
                                    <input type="number" id="vi" name="txtvi" value="<?php echo$user["Wallet"]; ?>" disabled>$<br><br>
                                <span style="font-size: 20px;">Nạp thêm:  </span>
                                    <input type="number" name="txtnap" value="<?php if(isset($_GET['st']))  echo$_GET['st']; else echo 0; ?>">$
                                    <input type="submit" name="nap" value="Nạp" style="margin-left: 30px; margin-bottom: 10px;"><br><br>
                                <input type="button" value="Quay lại" onclick="window.location = '<?php echo$_SESSION['Back'] ?>'">
                                <input type="submit" onclick="return(confirm('Bạn có chắc chắn muốn cập nhật?'))" name="oke" value="Xác nhận" style="margin-left: 300px; margin-bottom: 10px;">
                            </form>
                            
                            
                            <?php
                                if(isset($_POST['oke'])){
                                    $file = $user["Avt"];
                                    if(!empty($_FILES['img_avt']['tmp_name'])){
                                        move_uploaded_file($_FILES['img_avt']['tmp_name'],'../User/images/image_SP/'.$_FILES['img_avt']['name']);
                                        $file = $_FILES['img_avt']['name'];
                                    }
                                    $upuser = $getdata->Update_User($name,
                                                                    $_POST['txtten'],
                                                                    $_POST['txtgt'],
                                                                    $_POST['txtdc'],
                                                                    $_POST['txtns'],
                                                                    $_POST['txtsdt'],
                                                                    $_POST['txtemail'],
                                                                    $file);
                                    if($upuser){
                                        echo"<script>
                                                window.location = 'ChitietUser.php?TenTK=".$name."'
                                            </script>";
                                    }
                                }
                                if(isset($_POST['nap'])){
                                    $tien=0;
                                    if($_POST['txtnap']>0){
                                        $tien = $_POST['txtnap'];
                                    }
                                    $nap = $getdata->Naptien($name,$user['Wallet']+$tien);
                                    if($nap){
                                        echo"<script>
                                                alert('Nạp thành công.');
                                                $('#vi').val(".$user['Wallet']+$tien.")
                                            </script>";
                                    }
                                }
                            ?>
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
