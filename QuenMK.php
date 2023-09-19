<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quên mật khẩu</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="Admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="Admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>

<body style="background-color: #E2E2E2;">
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
                        <h5>Nhập tên tài khoản của bạn</h5>
                        <br/>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                            <input type="text" name="txtTenTK" class="form-control" placeholder="Tên tài khoản" />
                        </div>
                        <input type="submit" class="btn btn-primary" name="oke" value="Xác nhận">
                        <hr style="width: 350px; height: 2px; background-color: violet;"/>
                        Trở về <a href="User/Trangchu.php">Trang chủ</a>
                    </form>
                    <script></script>
                    <?php
                        include('Control.php');
                        if(isset($_POST['oke'])){
                            $getdata = new data();
                            $search = $getdata->Search_MK($_POST['txtTenTK']);

                            $count = mysqli_num_rows($search);
                            if($count == 1){
                                echo("<script>
                                    alert('Mật khẩu của bạn là: ".mysqli_fetch_array($search)[0]."');    
                                    window.location = 'Dangnhap.php';
                                </script>");
                            }else{
                                echo'<script>alert("Tên tài khoản không tồn tại.");</script>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>