<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng ký</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="Admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="Admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body style="background-color: #E2E2E2;">
    <div class="container" style="margin-top: -40px;">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img src="images/logo_Dangnhap.jpg" alt="" style="height: 120px; height: 80px; margin-top: -20px;">
                <span style="color: blue; font-size: 30px; font-weight: bold;">Công ty hạnh phúc Lee Minh</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <form role="form" method="post">
                    <div class="panel-body" id="tttk">
                        <hr style="width: 550px; height: 2px; background-color: violet;"/>
                        <h5 style="color: blue;">Nhập thông tin tài khoản</h5>
                        <br/>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="txtTenTK" class="form-control" placeholder="Tên tài khoản" />
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="txtpassword" class="form-control" placeholder="Mật khẩu" />
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="txtre_password" class="form-control" placeholder="Nhập lại mật khẩu" />
                        </div>
                        <input type="button" class="btn btn-primary" id="next" value="Tiếp">
                        <hr style="width: 350px; height: 2px; background-color: violet;"/><br>
                        Bạn đã có tài khoản?<a href="Dangnhap.php">Bấm vào đây để đăng nhập</a><br>
                        <div style="color: blue; font-size: 20px; width: 1000px; margin-top: 20px; margin-left: -300px;">
                        Sau khi đăng ký thành công bạn sẽ là một khách hàng của chúng tôi. 
                        Cảm ơn bạn đã quan tâm tới chúng tôi!</div>
                    </div>
                    <div class="panel-body" id="ttcn" style="display: none;">
                        <hr style="width: 550px; height: 2px; background-color: violet;"/>
                        <h5 style="color: blue;">Nhập thông tin cá nhân</h5>
                        <br/>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="txtHoten" class="form-control" placeholder="Họ và Tên" />
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-gittip"></i></span>
                            <div  class="form-control" title="Giới tính">
                                <input type="radio" name="sex" value="Nam" checked>Nam
                                <input type="radio" style="margin-left: 10px;" name="sex" value="Nữ">Nữ
                                <input type="radio" style="margin-left: 10px;" name="sex" value="Không xác định">Không xác định
                            </div>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                            <input type="text" name="txtDc" class="form-control" placeholder="Địa chỉ" />
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                            <input type="date" name="txtDate" title="Ngày sinh" class="form-control"/>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="txtSdt" class="form-control" placeholder="Số điện thoại"/>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-send"></i></span>
                            <input type="email" name="txtEmail" class="form-control" placeholder="Email"/>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-image"></i></span>
                            <input type="file" name="txtfile" class="form-control" title="Avatar"/>
                        </div>
                        <input type="submit" class="btn btn-primary" id="back" value="Quay lại">
                        <input type="submit" class="btn btn-primary" name="oke" value="Đăng ký ngay">
                        <hr style="width: 350px; height: 2px; background-color: violet;"/><br>
                        <div style="color: blue; font-size: 20px; width: 1000px; margin-left: -300px;">
                        Sau khi đăng ký thành công bạn sẽ là một khách hàng của chúng tôi. 
                        Cảm ơn bạn đã quan tâm tới chúng tôi!</div>
                    </div>
                </form>
                <script>
                    $('#next').click(function(){
                        $('#tttk').hide();
                        $('#ttcn').show();
                    });
                    $('#back').click(function(){
                        $('#ttcn').hide();
                        $('#tttk').show();
                    });
                </script>
                
                <?php
                    include('Control.php');
                    if(isset($_POST['oke'])){
                        $getdata = new data();
                        if($_POST['txtTenTK'] != "" || $_POST['txtpassword'] != "" || $_POST['txtre_password'] != ""){
                            if($_POST['txtpassword'] == $_POST['txtre_password']){
                                $pass = $_POST['txtpassword'];
                                $search = $getdata->Search_TK($_POST['txtTenTK']);
                                $count = mysqli_num_rows($search);
                                if($count == 0){
                                    move_uploaded_file($_FILES['txtfile']['tmp_name'],'User/images/image_User/'.$_FILES['txtfile']['name']);
                                    $register = $getdata->Register($_POST['txtTenTK'],$pass);
                                    $ttcn = $getdata->Insert_User(  $_POST['txtHoten'],
                                                                    $_POST['sex'],
                                                                    $_POST['txtDc'],
                                                                    $_POST['txtDate'],
                                                                    $_POST['txtSdt'],
                                                                    $_POST['txtEmail'],
                                                                    $_FILES['txtfile']['name'],
                                                                    $_POST['txtTenTK']);

                                    if($ttcn){
                                        echo"<script>window.location='Dangnhap.php';</script>";
                                    }
                                }else{
                                    echo'<script>alert("Tài khoản đã tồn tại.");</script>';
                                }
                            }else{
                                echo"<script>alert('Nhập lại mật khẩu không trùng khớp.');</script>";
                            }
                        }else{
                            echo"<script>alert('Bạn chưa nhập đủ thông tin cần thiết.');</script>"; 
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>

</html>