<?php
session_start();
if (!isset($_SESSION["login"])){
    header("Location: ../index.php");
    exit;
}
require '../function.php'; 

if (isset($_GET["username"]) ){
    if (recovery($_GET["username"]) > 0){
        echo "
            <script>
                alert('Data berhasil di reset')
                document.location.href = 'data.php';
            </script>
            ";
    }else{
         echo "
            <script>
                alert('Data gagal di reset')
                document.location.href = 'data.php';
            </script>
            ";
        }
    
}
?>