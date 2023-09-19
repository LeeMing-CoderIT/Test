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
        if($ttcn['Chucvu']=='Khách hàng'){
            echo"<script>window.location='../User/Trangchu.php'</script>";
        }
        $dem = $getdata->Dem();
        $_SESSION['demyc'] = mysqli_num_rows($dem);
        
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
                <a href="#" class="btn btn-info" title="Hộp thư đến"><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="#" class="btn btn-primary" title="New Task"><i class="fa fa-bars fa-2x"></i></a>
                <button href="login.html" id="logout" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></button>
                <script>
                    $('#logout').click(function(){
                        if(confirm("Bạn có chắc chắn muốn đăng xuất?")) {
                            window.location = '../Dangnhap.php';
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
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Bảng tin chính</h1>
                     </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-4">
                        <a href="DSPhanhoi.php" style="color: black;">
                            <div class="main-box mb-red">
                                <i class="fa fa-bolt fa-5x"></i>
                                <h5>Phản hồi mới nhất</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" style="color: black;">
                            <div class="main-box mb-dull">
                                <i class="fa fa-paperclip fa-5x"></i>
                                <h5>Đơn hàng mới nhất</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="DSYCNT.php" style="color: black;">
                            <div class="main-box mb-pink">
                                <i class="fa fa-dollar fa-5x"></i>
                                <h5>Yêu cầu nạp tiền mới<span style="color: red;"><?php if(isset($_SESSION['demyc']) && $_SESSION['demyc']>0) echo"(".$_SESSION['demyc'].")"; ?></span></h5>
                            </div>
                        </a>
                    </div>

                </div>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-8" style="height: 600px; max-height: 600px;">
                        <div class="table-responsive">
                            <span style="font-size: 20px; font-weight: bold;">Khách hàng mua hàng nhiều nhất</span>
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên tài khoản</th>
                                        <th>Chủ tài khoản</th>
                                        <th>Số đơn đã mua</th>
                                        <th>Tổng giá trị mua</th>
                                        <th>Trung bình</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $khtn = $getdata->ListKH_TN();
                                        $stt=1;
                                        foreach($khtn as $kh){
                                            $sld = $getdata->Search_HDKH($kh['Name_TK']);
                                            $se_chutk = $getdata->Search_User($kh['Name_TK']);
                                            $ctk = mysqli_fetch_array($se_chutk);
                                    ?>
                                        <tr>
                                            <td><?php echo$stt++; ?></td>
                                            <td><span class="label label-danger"><?php echo$kh['Name_TK']; ?></span></td>
                                            <td><?php echo $ctk['Name_User']; ?></td>
                                            <td><?php echo(mysqli_num_rows($sld)); ?></td>
                                            <td><span class="label label-info"><?php echo$kh['SUM(TongTien)']; ?></span></td>
                                            <td><?php echo($kh['SUM(TongTien)']/mysqli_num_rows($sld)); ?></td>
                                        </tr>
                                    <?php
                                            if($stt>10) break;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4" style="height: 600px; max-height: 600px;">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Chat với abc
                            </div>
                            <div class="panel-body" style="padding: 0px;">
                                <div class="chat-widget-main">


                                    <div class="chat-widget-left">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </div>
                                    <div class="chat-widget-name-left">
                                        <h4>Amanna Seiar</h4>
                                    </div>
                                    <div class="chat-widget-right">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </div>
                                    <div class="chat-widget-name-right">
                                        <h4>Donim Cruseia </h4>
                                    </div>
                                    <div class="chat-widget-left">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </div>
                                    <div class="chat-widget-name-left">
                                        <h4>Amanna Seiar</h4>
                                    </div>
                                    <div class="chat-widget-right">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </div>
                                    <div class="chat-widget-name-right">
                                        <h4>Donim Cruseia </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter Message" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="button">SEND</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="comments-sec">
                            <hr />
                            <h4><strong>Gửi thông báo đến mọi người</strong></h4>
                            <div class="form-group  ">
                                <label>Tiêu đề thông báo</label>
                                <input type="text" class="form-control" required="required" placeholder="Nhập tiêu đề" />
                            </div>
                            <div class="form-group ">
                                <label>Nội dung thông báo</label>
                                <textarea class="form-control" rows="8"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Gửi thông báo đi</button>
                            </div>
                        </div>
                    <div class="col-md-4">
                        <div class="panel panel-default" style="margin-left: 500px; width: 500px; margin-top: -400px;">
                            <div class="panel-heading" style="font-weight: bold; font-size: 20px;">
                                Các thông báo tới toàn thể khách hàng
                            </div>
                            <div class="panel-body" style="padding: 0px;">
                                <div class="chat-widget-main" style="height: 400px; max-height: 400px;">
                                    <div class="chat-widget-left">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </div>
                                    <div class="chat-widget-name-left">
                                        <h4>Thông báo ngày @</h4>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Enter Message" />
                                        <span class="input-group-btn">
                                            <button class="btn btn-success" type="button">SEND</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
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
