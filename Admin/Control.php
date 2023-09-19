<?php
    include("../Connect.php");
    class data{
        function Load_SP($table){
            global $con;
            $sql = "SELECT* FROM $table";
            $run = mysqli_query($con,$sql);
            return $run;
        }
         
        function Del_TT($table,$id){
            global $con;
            $sql = "DELETE FROM $table WHERE ID = $id";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function ListSP_search($sp){
            global $con;
            $sql = "SELECT* FROM dssp WHERE Name_SP LIKE '%$sp%'";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function ListUser_search($na){
            global $con;
            $sql = "SELECT* FROM dsuser WHERE Name_User LIKE '%$na%' OR Name_TK LIKE '%$na%'";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function Insert_SP($name,$gia,$slcl,$mota,$avt){
            global $con;
            $sql = "INSERT INTO dssp(Name_SP,SLConLai,Price,MoTa,Image_SP)
                    VALUES('$name',$slcl,$gia,$mota,'$avt')";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function Update_SP($id,$name,$gia,$slcl,$mota,$avt){
            global $con;
            $sql = "UPDATE dssp 
                    SET Name_SP = '$name', SLConLai = $slcl, Price = $gia, MoTa = '$mota', Image_SP = '$avt'
                    WHERE ID_SP = $id";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function Delete_SP($id){
            global $con;
            $sql = "DELETE FROM dssp
                    WHERE ID_SP = $id";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function Search_User($tentk){
            global $con;
            $sql = "SELECT* FROM dsuser WHERE Name_TK = '$tentk'";
            $run = mysqli_query($con,$sql);
            return $run;
        }
        
        function Search_SP($id){
            global $con;
            $sql = "SELECT* FROM dssp WHERE ID_SP = $id";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function Update_VC($id,$tsgg,$slud){
            global $con;
            $sql = "UPDATE dssp 
                    SET TysoGiamGia = $tsgg, SLUuDai = $slud
                    WHERE ID_SP = $id";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function Update_User($tk,$name,$gt,$dc,$ns,$sdt,$email,$avt){
            global $con;
            $sql = "UPDATE dsuser
                    SET Name_User='$name', Sex='$gt', Address='$dc', Date='$ns', PhoneNumber='$sdt', Email='$email', Avt='$avt'
                    WHERE Name_Tk = '$tk'";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function Naptien($tentk,$tien){
            global $con;
            $sql = "UPDATE dsuser 
                    SET Wallet = $tien
                    WHERE Name_TK = '$tentk'";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function Dem(){
            global $con;
            $sql = "SELECT* FROM yeucaunaptien
                    WHERE TB = 2";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function XTNaptien($tentk){
            global $con;
            $sql = "UPDATE yeucaunaptien 
                    SET Xacnhan = 'đã'
                    WHERE Name_TK = '$tentk'";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function Load_YCXT(){
            global $con;
            $sql = "SELECT* FROM yeucaunaptien
                    WHERE Xacnhan = 'chưa'";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function Load_LSXT(){
            global $con;
            $sql = "SELECT* FROM yeucaunaptien
                    WHERE Xacnhan = 'đã'";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function SETDem(){
            global $con;
            $sql = "UPDATE yeucaunaptien 
                    SET TB = 1
                    WHERE TB = 2";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function LuuTien($st){
            global $con;
            $sql = "UPDATE luutien 
                    SET sotien = '$st'
                    WHERE name = 'admin'";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function ListKH_TN(){
            global $con;
            $sql = "SELECT Name_TK, SUM(TongTien) FROM hoadon";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function Search_HDKH($tk){
            global $con;
            $sql = "SELECT * FROM hoadon
                    WHERE Name_TK = '$tk'";
            $run = mysqli_query($con,$sql);
            return $run;
        }
    }
?>