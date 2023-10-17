<?php
session_start();
if (!isset($_SESSION["login"])){
    header("Location: ../index.php");
    exit;
}
require '../function.php'; 

if (isset($_GET["hak"]) ){
    if (pilih($_SESSION["username"],$_GET["hak"]) > 0){
        echo "
            <script>
                alert('Hak Suara Anda Sudah Direkam')
                document.location.href = 'landing.php';
            </script>
            ";
    }else{
         echo "
            <script>
                alert('Hak Suara Anda Gagal Direkam')
                document.location.href = 'landing.php';
            </script>
            ";
        }
    
}
?>