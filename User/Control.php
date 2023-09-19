<?php
    include("../Connect.php");
    class data{
        function Load_SP(){
            global $con;
            $sql = "SELECT* FROM dssp";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function Search_SP($id){
            global $con;
            $sql = "SELECT* FROM dssp WHERE ID_SP = $id";
            $run = mysqli_query($con,$sql);
            return $run;
        }
        
        function Phanhoi($fullname,$email,$phone,$mess){
            global $con;
            $sql = "INSERT INTO ni_contact(Fullname,Email,Phone,Mess)
                    Values('$fullname','$email','$phone','$mess')";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function Search_User($tentk){
            global $con;
            $sql = "SELECT* FROM dsuser WHERE Name_TK = '$tentk'";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function SET_Vi($tk,$st){
            global $con;
            $sql = "UPDATE dsuser 
                    SET Wallet = $st
                    WHERE Name_TK = '$tk'";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function UP_SP($id,$slc,$slb){
            global $con;
            $sql = "UPDATE dssp 
                    SET SLConLai = $slc, SLDaBan = $slb
                    WHERE ID_SP = $id";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function ListSP_search($sp){
            global $con;
            $sql = "SELECT* FROM dssp WHERE Name_SP LIKE '%$sp%'";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function YeuCauNapTien($tk,$stk,$st){
            global $con;
            $sql = "INSERT INTO YeuCauNapTien(Name_TK,STK,SoTien,TB,Xacnhan)
                    Values('$tk','$stk',$st,2,'chưa')";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function Thongbaonaptc($tk){
            global $con;
            $sql = "SELECT* FROM YeuCauNapTien
                    WHERE Name_TK = '$tk' AND TB = 1 AND Xacnhan = 'đã'";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function UPTB($tk){
            global $con;
            $sql = "UPDATE YeuCauNapTien 
                    SET TB = 0
                    WHERE Name_TK = '$tk' AND Xacnhan = 'đã'";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function UPSL($id,$sl){
            global $con;
            $sql = "UPDATE Giohang 
                    SET SL = $sl
                    WHERE ID_SP = $id";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function ThemvaoGio($idsp){
            global $con;
            $sql = "INSERT INTO Giohang(ID_SP,SL)
                    Values($idsp,1)";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function ThanhToan($tk,$sp,$tien){
            global $con;
            $sql = "INSERT INTO HoaDon(Name_TK,CacSP,TongTien) 
                    VALUES('$tk','$sp',$tien)";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function CheckGiohang($id){
            global $con;
            $sql = "SELECT* FROM Giohang
                    WHERE ID_SP = $id";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function Load_Giohang(){
            global $con;
            $sql = "SELECT* FROM Giohang";
            $run = mysqli_query($con,$sql);
            return $run;
        }

        function BokhoiGio($id){
            global $con;
            $sql = "DELETE FROM Giohang
                    WHERE ID_SP = $id";
            $run = mysqli_query($con,$sql);
            return $run;
        }
    }