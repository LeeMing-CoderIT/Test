<?php
    include('Control.php');
    $getdata = new data();
    $select_gh = $getdata->Load_Giohang();
    $listsp = $getdata->Load_SP();
    $tongtt = 0;   $i = 0; $cacsp = "";
    foreach($select_gh as $sp){
        foreach($listsp as $s){
          if($s['ID_SP'] == $sp['ID_SP']){
            $tongtt += ($s["Price"]-$s["Price"]*$s['TysoGiamGia']/100)*$sp["SL"];
            if($i>0){
                $cacsp .= ",";
            }
            $cacsp .= ($s['Name_SP']."-".$sp['SL']);
          }
        }
        $i++;
    }
    $sea = $getdata->Search_User($_GET['tk']);
    $user = mysqli_fetch_array($sea);
    if($user['Wallet']>$tongtt){
        $thanhtoan = $getdata->ThanhToan($_GET['tk'],$cacsp,$tongtt);
        if($thanhtoan){
            $uptien = $getdata->SET_Vi($_GET['tk'],$user['Wallet']-$tongtt);
            
            foreach($select_gh as $s){
                $bo = $getdata->BokhoiGio($s["ID_SP"]);
            }
            foreach($select_gh as $sp){
                foreach($listsp as $s){
                    if($s['ID_SP'] == $sp['ID_SP']){
                        $upsp = $getdata->UP_SP($s['ID_SP'],$s['SLConLai']-$sp['SL'],$s['SLDaBan']+$sp['SL']);
                    }
                }
            }
            
            echo"<script>
                    alert('Thanh toán thành công. Bạn hãy chờ nhận hàng.');
                    window.location = 'Trangchu.php';
                </script>";
        }  
    }else{
        echo"<script>
                    alert('Thanh toán thất bại. Vì ví của bạn không đủ tiền.');
                    window.location = 'testimonial.php';
                </script>";
    }