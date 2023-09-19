<?php
    include('Control.php');
    session_start();
    $getdata = new data();
    if(isset($_GET['idsp'])){
        $check = $getdata->CheckGiohang($_GET['idsp']);
        if(mysqli_num_rows($check) == 0){
            $them = $getdata->ThemvaoGio($_GET['idsp']);
            if($them){
                echo"<script>
                    alert('Thêm vào giỏ hàng thành công.');
                    window.location = '".$_SESSION['Next']."';
                </script>";
            }

        }else{
            
            echo"<script>
                    alert('Sản phẩm này đã có trong giỏ hàng.');
                    window.location = '".$_SESSION['Next']."';
                </script>";
        }

    }
