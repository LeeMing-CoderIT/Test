<?php
    include('Control.php');
    $getdata = new data();
    if($_GET['idsp']){
        $del = $getdata->BokhoiGio($_GET['idsp']);
        if($del){
            echo"<script>
                    alert('Sản phẩm đã bỏ khỏi giỏ hàng.');
                    window.location = 'testimonial.php';
                </script>";
        }else{
            echo"<script>
                    alert('Đang có lỗi gì đó.');
                    window.location = 'testimonial.php';
                </script>";
        }
    }