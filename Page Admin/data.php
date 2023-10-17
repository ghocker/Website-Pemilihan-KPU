<?php 
session_start();
if (!isset($_SESSION["login"])){
    header("Location: ../index.php");
    exit;
}
require '../function.php';
$total = 0;
$sudah = 0;
$belum = 0;
$kt = '';
$tombol = '';
$count = 0;
$data = query('SELECT * FROM akun');

foreach($data as $a){
    $total +=1;
    if ($a["keterangan"] == 'FALSE'){
        $belum +=1;
    }
    elseif($a["keterangan"] == 'TRUE'){
        $sudah +=1;
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
    <section style="padding-top: 80px;">
        <div class="row text-center mb-5">
            <h2 class="mb-4" style="font-size: 36px;">DATA PEMILIH</h2>
        </div>
        <div class="row ms-3 me-3">
            <h6 style="font-size: 16px;">Jumlah Pemilih IPDN kampus Sumatera Barat : <?= $total; ?></h6>
            <h6 style="font-size: 16px;">Jumlah Pemilih yang belum memilih : <?= $belum; ?></h6>
            <h6 style="font-size: 16px;">Jumlah Pemilih yang sudah memilih : <?= $sudah; ?></h6>
        </div>
        <div class="row ms-3 me-3 mb-3">
            <div>
                <a href="tambah.php?username=<?= $total;?>"><button type="button" class="btn btn-warning"
                        style="font-size: 16px;">Tambah
                        Data</button></a>
            </div>
        </div>
        <div class="row ms-4 me-3 mb-3">
            <div class="input-group">
                <input type="text" class="form-control" id="keyword" placeholder="Cari berdasar nama...."
                    aria-label="Recipient's username" aria-describedby="button-addon2" style="font-size: 16px;">
                <button class="btn btn-success" id="tombol-cari" type="button" id="button-addon2"
                    style="font-size: 16px;">Cari</button>
            </div>
        </div>
        <div class="row ms-2" style="width: 98%;">
            <div class="container" id="container" style="font-size: 16px;">
                <table class="table caption-top ms-3">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">NO.</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">KELAS</th>
                            <th scope="col">NPP</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <?php foreach ($data as $row) :
                    $count +=1;?>
                    <tbody>
                        <tr>
                            <th scope="row"><?= $count; ?></th>
                            <td><?= $row["nama"]; ?></td>
                            <td><?= $row["kelas"]; ?></td>
                            <td><?= $row["username"]; ?></td>
                            <?php if ($row["keterangan"]=='FALSE'){
                            $tombol = 'danger';
                            $kt = 'Belum';
                        }elseif($row["keterangan"]=='TRUE'){
                            $tombol = 'success';
                            $kt = 'Sudah';
                        }?>
                            <td>
                                <a href=""><button class="btn btn-<?= $tombol; ?>"
                                        style="font-size: 16px;"><?= $kt; ?></button></a>
                            </td>
                            <td>
                                <a href="reset.php?username=<?= $row["username"]; ?>"><button class="btn btn-dark"
                                        style="font-size: 16px;">Reset</button></a>
                                <a href="hapus.php?username=<?= $row["username"]; ?>"><button class="btn btn-danger"
                                        style="font-size: 16px;">Hapus</button></a>
                            </td>
                        </tr>
                    </tbody>
                    <?php endforeach;?>
                </table>
            </div>
        </div>

        <script src="js/script.js"></script>
        <script src="js/sc.js"></script>
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