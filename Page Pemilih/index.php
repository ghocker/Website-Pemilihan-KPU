<?php 
session_start();
if (!isset($_SESSION["login"])){
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

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
                        <a class="nav-link active fs-3" aria-current="page" href="index.php">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->
    <section style="height: 90px;"></section>
    <!-- awal jumbotron -->
    <section class="text-center d-flex justify-content-center mt-4">
        <div class="card m-4" style="width: 60rem; margin-top: 500px;">
            <div id="content-slider" class="justify-content-center pt-5" style="padding-left: 18rem;">
                <img src="../assets/img/kpu.png" class="img" alt="Slideshow 2" height="">
                <img src="../assets/img/tama.png" class="img" alt="Slideshow 3">
            </div>
            <h3 class="display-4 fw-bold mt-3" style="font-size: 36px;">SELAMAT DATANG</h3>
            <p class="lead mb-1"><?= $_SESSION["nama"]; ?></p>
            <p class="lead mb-1">Selamat Datang di Portal KPU IPDN SUMBAR</p>
            <p class="lead m-3;"></p>
            <div class="pb-5">
                <a href="landing.php"><button class="btn btn-success" style="font-size: 16px;">HAK SUARA</button></a>
                <a href="../logout.php"><button class="btn btn-danger" style="font-size: 16px;">LOGOUT</button></a>
            </div>
        </div>
    </section>
    <!-- akhir jumbotron -->
    <!-- akhir badan -->
    <!-- awal footer -->
    <!-- akhir footer -->
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