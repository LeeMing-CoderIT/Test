<?php
    include("Connect.php");
    class data{
        function Register($tentk,$mk){
            global $con;
            $sql = "INSERT INTO dstk(Name_TK,Password_TK)
                    VALUES('$tentk','$mk')";
            $run = mysqli_query($con,$sql);
            return $run;
        }
        function Insert_User($username,$sex,$address,$date,$phone,$email,$file,$tentk){
            global $con;
            $sql = "INSERT INTO dsuser(Name_User,Sex,Address,Date,PhoneNumber,Email,Avt,Wallet,Chucvu,Name_TK)
                    VALUES('$username','$sex','$address','$date','$phone','$email','$file',0,'Khách hàng','$tentk')";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function Login_TK($tentk,$mk){
            global $con;
            $sql = "SELECT* FROM dstk WHERE Name_TK = '$tentk' AND Password_TK = '$mk'";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function Search_TK($tentk){
            global $con;
            $sql = "SELECT* FROM dstk WHERE Name_TK = '$tentk'";
            $run = mysqli_query($con,$sql);
            return $run;
        }
        function Search_MK($tentk){
            global $con;
            $sql = "SELECT Password_TK FROM dstk WHERE Name_TK = '$tentk'";
            $run = mysqli_query($con,$sql);
            return $run;
        }
        function Search_User($tentk){
            global $con;
            $sql = "SELECT* FROM dsuser WHERE Name_TK = '$tentk'";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        
    }