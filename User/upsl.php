<?php
    include('Control.php');
    $getdata = new data();
    if(isset($_GET['idsp']) && isset($_GET['sl'])){
        if($_GET['sl']>0){
            $up = $getdata->UPSL($_GET['idsp'],$_GET['sl']);
            if($up){
                echo"<script>
                        window.location = 'testimonial.php';
                    </script>";
            }else{
                echo"<script>
                        window.location = 'testimonial.php';
                    </script>";
            }
        }
    }