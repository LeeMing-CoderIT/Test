<?php
    include('Control.php');
    if(isset($_GET['idsp'])){
        $id = $_GET['idsp'];
        $getdata = new data();
        $delsp = $getdata->Delete_SP($id);
            if($delsp){
                echo"<script>
                    alert('Bạn đã loại bỏ thành công');
                </script>";
            }
        header("Location: DSSP.php");
    }
