<?php 
session_start();
if (!isset($_SESSION["login"])){
    header("Location: ../index.php");
    exit;
}
require '../function.php';
$us = $_SESSION["username"];
$kelas = substr($_SESSION["login"],0,1);
$data = query("SELECT * FROM wasena where kelas LIKE '%$kelas%'");
$query = "SELECT * FROM akun WHERE username = '$us'";
$user = query($query);
$count = 0;

foreach ($user as $a) {
    if ($a["wasena"] != ''){
        header("Location: thanks.php");
        exit;
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
                        <a class="nav-link active fs-3" aria-current="page" href="index.php">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->
    <!-- awal jumbotron -->
    <h2 style="padding-top: 100px; text-align: center">PEMILIHAN WASENAPATI</h2>
    <section class="text-center d-flex justify-content-center mt-4">
        <?php foreach ($data as $row) :
            $count +=1;?>
        <div class="col-md-3">
            <section class="wow fadeInDown" data-wow-delay="<?php echo $i; ?>s">
                <div class="thumbnail">
                    <div class="text-center">
                        <h1 class="text-black mb-4">CALON <?= $count; ?></h1>
                        <img src="../assets/img/default.png" class="img">
                        <h4 class="text-black mt-4"><?= $row["nama"]; ?></h4>
                        <div class="caption mt-3">
                            <a onclick="myFunction(<?= $row['npp']; ?>)" class="btn btn-warning btn-block"
                                style="font-size: 16px;">PILIH</a>
                            <a href="detailwasena.php?hak=<?= $row["npp"]; ?>" class="btn btn-success btn-block"
                                style="font-size: 16px;">LIHAT VISI & MISI</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php endforeach;?>
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
    <script>
    function myFunction(key) {
        var txt;
        if (confirm("Apakah anda yakin dengan pilihan anda ?")) {
            location.href = "pilihwasena.php?hak=" + key;
        } else {
            txt = "You pressed Cancel!";
        }
        document.getElementById("demo").innerHTML = txt;
    }
    </script>
    <!-- akhir footer -->
</body>

</html>