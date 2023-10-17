<?php 
session_start();
if (!isset($_SESSION["login"])){
    header("Location: ../index.php");
    exit;
}
$a = $_GET["username"] + 1 ;
require '../function.php';
if (isset($_POST["submit"]) ){
    if (tambah($_POST,$a) > 0){
        echo "
            <script>
                alert('data berhasil ditambah')
                document.location.href = 'data.php';
            </script>
            ";
    }else{
         echo "
            <script>
                alert('data gagal ditambah')
                document.location.href = 'data.php';
            </script>
            ";
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E-KPU</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../assets/img/logo_kpu.png">
    <link rel="stylesheet" href="../assets/css/custom.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style type="text/css">
    body {
        background-image: url('../assets/img/pko.png');
        background-size: 100%;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
    }

    #content-slider {
        position: relative;
        width: 400px;
        height: 300px;
        overflow: hidden;
    }

    #content-slider img {
        display: block;
        width: 400px;
        height: 300px;
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
                    <li class="nav-item">
                        <a class="nav-link fs-3" aria-current="page" href="index.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fs-3" aria-current="page" href="data.php">Data Pemilih</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->
    <!-- awal jumbotron -->
    <section class="text-center" style="padding-top: 80px;">
        <h2 class="mb-4 mb-4" style="font-size: 36px;">TAMBAH DATA PEMILIH</h2>
        <div class="container mt-5" style="width: 1400px; margin:auto">
            <form action="" method="post">
                <div class="row mb-3">
                    <label for="nama">Masukkan Nama Pemilih :</label>
                    <input type="text" class="text-center text-black" name="nama" id="nama" style="font-size: 16px;"
                        required>
                </div>
                <div class="row mb-3">
                    <label for="kelas">Pilih Kelas:</label>
                    <select class="form-select mb-4" id="kelas" required name="kelas"
                        style="width: 1400px; margin:auto; font-size:16px;" aria-label="Default select example">
                        <option selected>Pilih berdasar kelas...</option>
                        <option value="F1">F1</option>
                        <option value="F2">F2</option>
                        <option value="F3">F3</option>
                        <option value="F4">F4</option>
                        <option value="F5">F5</option>
                        <option value="G1">G1</option>
                        <option value="G2">G2</option>
                        <option value="G3">G3</option>
                        <option value="G4">G4</option>
                        <option value="G5">G5</option>
                    </select>
                </div>
                <div class="row mb-3">
                    <label for="npp">Masukkan NPP Pemilih :</label>
                    <input type="text" class="text-center text-black" style="font-size: 16px;" name="npp" id="npp"
                        required>
                </div>
                <div class="row mb-3">
                    <label for="password">Masukkan Password :</label>
                    <input type="password" class="text-center text-black" style="font-size: 16px;" name="password"
                        id="password" required>
                </div>
                <div class="row mb-3" style="display:inline;">
                    <a href=""><button type="submit" class="btn btn-success" name="submit"
                            style="font-size: 16px;">Tambah</button></a>
                </div>
            </form>
        </div>
    </section>
    <!-- akhir jumbotron -->
    <script type="text/javascript" src="../assets/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery-cycle.min.js"></script>
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