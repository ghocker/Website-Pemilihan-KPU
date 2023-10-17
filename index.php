<?php 
session_start();

require 'function.php';
 
if (isset($_POST["submit"])){
     $username = $_POST["username"];
     $password = $_POST["password"];
     $result = mysqli_query($conn, "SELECT * FROM akun WHERE username = '$username'");
     $result2 = mysqli_query($conn, "SELECT * FROM akunadmin WHERE username = '$username'");
     if (mysqli_num_rows($result)== 1){
        $row = mysqli_fetch_assoc($result);
        if ($row["keterangan"]== 'FALSE') {
            if ($password == $row["password"]){
             $_SESSION["login"] = $row["kelas"];
             $_SESSION["username"] = $row["username"];
             $_SESSION["nama"] = $row["nama"];
             if ($row["keterangan"]== 'TRUE') {
                echo "<script>
                 document.location.href = 'thanks.php';
                 </script>";
                }
             header("Location: Page Pemilih/index.php");
             exit;
         }
        }
        if ($row["keterangan"]== 'TRUE') {
            echo "<script>
             document.location.href = 'thanks.php';
             </script>";
            }
        }
        
 else if (mysqli_num_rows($result2)== 1){
         $row = mysqli_fetch_assoc($result2);
         if ($password == $row["password"]){
             $_SESSION["login"] = $username;
             header("Location: Page Admin/index.php");
             exit;
         }
         }
         $error = true;
         echo "<script>
                 alert('username/password tidak sesuai')
                 </script>";
        }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>E-KPU</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="./assets/img/logo_kpu.png">
    <link rel="stylesheet" href="./assets/css/custom.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style type="text/css">
    body {
        background-image: url('./assets/img/pko.png');
        background-size: 100%;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
    }

    #content-slider {
        position: relative;
        width: 570px;
        height: 400px;
        overflow: hidden;
    }

    #content-slider img {
        display: block;
        width: 570px;
        height: 400px;
    }

    .img-thanks {
        max-width: 200px;
        width: 100%;
        max-height: 250px;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark shadow fixed-top" style="background-color: #335FB4;">
        <div class="container-fluid">
            <a class="navbar-brand ms-4 pt-4 fs-2" href="#">KPU IPDN KAMPUS SUMATERA BARAT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse me-4" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                </ul>
            </div>
        </div>
    </nav>
    <h1 class="index-header" style="margin-top: -20px;">SELAMAT DATANG DI E-KPU PRABU XXXIII<br /></h1>
    <div class="row " style="margin-top: 50px;">
        <div class="col-md-4 col-md-offset-1 ">
            <div id="content-slider">
                <img src="./assets/img/kpu.png" class="img" alt="Slideshow 2" height="">
                <img src="./assets/img/tama.png" class="img" alt="Slideshow 3">
            </div>
        </div>
        <div class="col-md-6 form">
            <!-- <span class="info-login">Silahkan Login untuk dapat melakukan pemilihan</span>
        <br />
        <br /> -->
            <form action="" method="post">
                <div class="form-group">
                    <label>Masukkan NPP :</label>
                    <input style="font-size:16px;" type="text" class="form-control" placeholder="NPP" required="NIS"
                        id="username" name="username" />
                </div>
                <div class="form-group">
                    <label>Password :</label>
                    <input style="font-size:16px;" type="password" class="form-control" placeholder="Password" required
                        id="password" name="password" />
                </div>
                <br />
                <div class="row">

                    <div class="text-right" style="padding-right:15px;">
                        <input type="submit" name="submit" id="submit" style="font-size: 16px;"
                            class="btn btn-success btn-lg" value="Login">
                    </div>
                    <div class="text-right" style="margin-top:3px;padding-right:15px;">
                        <!-- <a href="admin/" class="btn btn-warning btn-lg">Login Admin</a> -->
                    </div>
                </div>
            </form>


        </div>

    </div>
    <script type="text/javascript" src="./assets/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="./assets/js/jquery-cycle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        let table = new DataTable('#dtable');
        let table2 = new DataTable('#dtable2');
        // $('#dtable').datatables();
        $('#content-slider').cycle({
            fx: 'fade',
            speed: 1000,
            timeout: 500
        });
    });
    </script>
</body>

</html>