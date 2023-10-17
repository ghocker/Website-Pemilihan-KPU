<?php
session_start();
if (!isset($_SESSION["login"])){
    header("Location: ../index.php");
    exit;
}
require '../function.php'; 

if (isset($_GET["username"]) ){
    if (hapus($_GET["username"]) > 0){
        echo "
            <script>
                alert('Data berhasil di hapus')
                document.location.href = 'data.php';
            </script>
            ";
    }else{
         echo "
            <script>
                alert('Data gagal di hapus')
                document.location.href = 'data.php';
            </script>
            ";
        }
    
}
?>