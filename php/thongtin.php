<?php
session_start();//cai nay can phai co nhe cac ban khi chung ta su dung session
 
if(isset($_POST['xacnhan'])){ //neu ton tai $_post['xacnhan']
 
 
       $error=array();//tao mang chu so loi xay ra
 
        if($_POST['tdn'] !=""){
 
               $tentaikhoan=$_POST['tdn'];
        }
 
        else {
 
               $error[]="ten tai khoan chua nhap";  
        }
 
        if($_POST['mk'] !=""){
               $matkhau=$_POST['mk'];
        }
 
        else {
 
               $error[]="ma khau chua nhap";  
 
        }
        if(isset($tentaikhoan) && isset($matkhau)){
 
            $con=  mysql_connect('localhost','root','') or die("ket noi bi loi");
 
            mysql_select_db('demo',$con);
 
            mysql_query("set names 'utf8'");
 
            $sql="select * from dangky where Tentaikhoan='".$tentaikhoan."' and matkhau='".$matkhau."'";//xet coi ten dang nhap va makhau dung chua
 
            $query=mysql_query($sql,$con);//thuc thi cau lenh
 
            $row=  mysql_fetch_array($query);
 
            //kiem tra coi dung khong nhe
 
            if(($row['Tentaikhoan']==$tentaikhoan) && $row['matkhau']==$matkhau && $row['lever']==1){
 
               
 
                $_SESSION['id_quantri']=$row['id_dangky'];//neu dung toi se dua sang trang quan tri hay trang gj ma ban muon
 
                header('location:quantrihethong.php');
 
            }
 
            else if(($row['Tentaikhoan']==$tentaikhoan) && $row['matkhau']==$matkhau && $row['lever']==2){
 
                      $_SESSION['id']=$row['id_dangky'];
 
                     header('location:thanhvien.php');//neu dung toi se dua sang trang thanh vien hay trang gj ma ban muon
 
            }
 
            else {
 
                         
 
                       $error[]="dang nhap khong thanh cong.";
 
            }
 
                    
 
        }
 
        if($error){
 
            echo print_r($error);
 
        }
 
      
 
}
?>
