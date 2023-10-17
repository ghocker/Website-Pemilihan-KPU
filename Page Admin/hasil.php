<?php 
session_start();
if (!isset($_SESSION["login"])){
    header("Location: ../index.php");
    exit;
}

require '../function.php';
$aji = 0;
$arif = 0;
$senagol= 0;
$wasenakpgol= 0;
$wasenatripgol= 0;
$yudhis = 0;
$icha = 0;
$adin = 0;
$count = 0;
$data = query('SELECT * FROM akun');
$data1 = query("SELECT * FROM akun WHERE kelas LIKE '%F%'");
$data2 = query("SELECT * FROM akun WHERE kelas LIKE '%G%'");

foreach($data as $a){
    $count +=1;
    if ($a["sena"] == '33.0658'){
        $aji +=1;
    }
    elseif($a["sena"] == '33.0169'){
        $arif +=1;
    }
    elseif($a["sena"] == ''){
        $senagol +=1;
    }
}

foreach($data1 as $b){
    if($b["wasena"] == ''){
        $wasenakpgol +=1;
    }
    elseif($b["wasena"] == '33.0838'){
        $adin +=1;
    }
}

foreach($data2 as $c){
    if($c["wasena"] == ''){
        $wasenatripgol +=1;
    }
    elseif($c["wasena"] == '33.0256'){
        $icha +=1;
    }
    elseif($c["wasena"] == '33.0494'){
        $yudhis +=1;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../assets/img/logo_kpu.png">
    <link rel="stylesheet" href="../assets/css/custom.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/styl.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
    <script src="js/Chart.js"></script>
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
                    <li class="nav-item">
                        <a class="nav-link fs-3" aria-current="page" href="data.php">Data Pemilih</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->
    <section style="height: 20px;"></section>
    <!-- awal jumbotron -->
    <div class="container mt-5 mb-5 text-center">
        <h3 class="mt-4 pt-4 text-white" style="font-size: 30px;">HASIL PEMUNGUTAN SUARA</h3>
    </div>
    <div class="row mt-4">
        <div class="col">
            <div class="card m-3 text-center p-3">
                <h4 class="mb-3">SENA</h4>
                <canvas id="piechart" width="100" height="100"></canvas>
            </div>
        </div>
        <div class="col">
            <div class="card m-3 text-center p-3">
                <h4 class="mb-3">WASENA KP</h4>
                <canvas id="piechart1" width="100" height="100"></canvas>
            </div>
        </div>
        <div class="col">
            <div class="card m-3 text-center p-3">
                <h4 class="mb-3">WASENA TRIP</h4>
                <canvas id="piechart2" width="100" height="100"></canvas>
            </div>
        </div>
    </div>
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

<script type="text/javascript">
var ctx = document.getElementById("piechart").getContext("2d");
var ctx1 = document.getElementById("piechart1").getContext("2d");
var ctx2 = document.getElementById("piechart2").getContext("2d");
var data = {
    labels: ['AJI', 'ARIF', 'Belum Memilih'],
    datasets: [{
        label: "Penjualan Barang",
        data: [<?= $aji; ?>, <?= $arif; ?>, <?= $senagol; ?>],
        backgroundColor: [
            '#F44336',
            '#2196F3',
            '#BDBDBD',
            '#CBE0E3',
            '#979193'
        ]
    }]
};

var data1 = {
    labels: ['ADIN', 'Belum Memilih'],
    datasets: [{
        label: "Penjualan Barang",
        data: [<?= $adin; ?>, <?= $wasenakpgol; ?>],
        backgroundColor: [
            '#F44336',
            '#BDBDBD',
            '#F07124',
            '#CBE0E3',
            '#979193'
        ]
    }]
};

var data2 = {
    labels: ['YUDHIS', 'ICHA', 'Belum Memilih'],
    datasets: [{
        label: "Penjualan Barang",
        data: [<?= $yudhis; ?>, <?= $icha; ?>, <?= $wasenatripgol; ?>],
        backgroundColor: [
            '#F44336',
            '#2196F3',
            '#BDBDBD',
            '#CBE0E3',
            '#979193'
        ]
    }]
};

var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: {
        responsive: true
    }
});

var myPieChart1 = new Chart(ctx1, {
    type: 'pie',
    data: data1,
    options: {
        responsive: true
    }
});

var myPieChart12 = new Chart(ctx2, {
    type: 'pie',
    data: data2,
    options: {
        responsive: true
    }
});
</script>