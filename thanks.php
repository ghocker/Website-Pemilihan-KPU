<?php 
session_start();
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
        max-width: 300px;
        width: 100%;
        max-height: 350px;
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
    <section style="height: 90px;"></section>
    <div class="text-center" style="padding-top:20px;padding-bottom:40px;">
        <div style="padding-bottom:10px">
            <img src="./assets/img/tama.png" class="img-thanks" alt="Slideshow 1">
        </div>
        <h2 style="font-size: 48px;">TERIMA KASIH ATAS PARTISIPASI ANDA</h2>
        <p style="font-size: 16px;">Suara yang anda berikan menentukan masa depan Kampus IPDN Sumatera Barat</p>
        <a href="index.php" class="button alert large"><button class="button btn-warning mt-4"
                style="font-size: 16px;">Back
                to Home</button></a>

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