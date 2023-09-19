<?php
    include('Control.php');
    $id=0;
    if(isset($_GET['del'])){
        $id = $_GET['del'];
    }
    $getdata = new data();
    $del = $getdata->Del_TT('ni_contact',$id);
    if($id==0){
        echo("<script>
            window.location = 'DSPhanhoi.php';
        </script>");
    }else{
        if($del){
            echo("<script>
                alert('Xóa phản hồi thành công!');    
                window.location = 'DSPhanhoi.php';
            </script>");
        }else{
            echo("<script>
                alert('Xóa phản hồi lỗi!');    
                window.location = 'DSPhanhoi.php';
            </script>");
        }
    }