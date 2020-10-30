<?php 
    $connet = mysqli_connect('localhost','root','','login');
    if($connet){
        mysqli_query($connet, "SET NAMES 'UTF8'");
    }else{
        echo"Kết nối thất bại";
    }


?>