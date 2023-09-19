<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng nhập</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="Admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="Admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="User/js/jquery-3.4.1.min.js"></script>
    <script src="Admin/assets/js/jquery.metisMenu.js"></script>
</head>

<body style="background-color: #E2E2E2;">
123
    <?php
        include('Control.php');
        $lock = "";
        if(!empty($_POST['txtTenTK'])){
            if(isset($_COOKIE[$_POST['txtTenTK']])){
                $_POST['txtpassword'] = $_COOKIE[$_POST['txtTenTK']];
                $lock = $_COOKIE[$_POST['txtTenTK']];
            }
        }
    ?>
    
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img src="images/logo_Dangnhap.jpg" alt="" style="height: 120px; height: 80px; margin-top: -20px;">
                <span style="color: blue; font-size: 30px; font-weight: bold;">Công ty hạnh phúc Lee Minh</span>
            </div>
        </div>
        <div class="row ">
             <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel-body">
                    <form method="post">
                        <hr style="width: 550px; height: 2px; background-color: violet;"/>
                        <h5>Nhập thông tin để đăng nhập</h5>
                        <br/>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                            <input type="text" id="tk" name="txtTenTK" class="form-control" placeholder="Tên tài khoản" />
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" id="pass" name="txtpassword" class="form-control" placeholder="Mật khẩu của bạn"   <?php if($lock!="") echo'disabled'; ?>  />
                        </div>
                        <div class="form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="checkluu" checked="on" />Lưu lại thông tin
                            </label>
                            <span class="pull-right">
                                <a href="QuenMK.php">Quên mật khẩu?</a>
                            </span>
                        </div>
                        <input type="submit" class="btn btn-primary" name="oke" value="Đăng nhập ngay">
                        <hr style="width: 350px; height: 2px; background-color: violet;"/>
                        Bạn chưa có tài khoản?<a href="Dangky.php"> Bấm vào đây để đăng ký</a><br>
                        Hoặc trở về <a href="User/Trangchu.php">Trang chủ</a>
                    </form>

                    
                    
                    <?php
                        if(isset($_POST['oke'])){
                            if(isset($_SESSION['TenTK'])){
                                session_destroy();
                            }
                            session_start();
                            $getdata = new data();
                            $pass = $_POST['txtpassword'];
                            $search = $getdata->Login_TK($_POST['txtTenTK'],$pass);
                            $count = mysqli_num_rows($search);
                            if($count == 1){
                                if(strtolower($_POST['checkluu']) === 'on'){
                                    setcookie($_POST['txtTenTK'], $_POST['txtpassword'], time() + (86400 * 30), "/");
                                }
                                else{
                                    setcookie($_POST['txtTenTK'], "", time() + (86400 * 30), "/");
                                }
                                $_SESSION['TenTK'] = $_POST['txtTenTK'];
                                $_SESSION['lan'] = 0;
                                header("location:Admin/Admin_TC.php");
                            }else{
                                echo'<script>alert("Thông tin tài khoản không chính xác.");</script>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>