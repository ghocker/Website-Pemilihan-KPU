<?php 
session_start();
if (!isset($_SESSION["login"])){
    header("Location: ../index.php");
    exit;
}
require '../function.php';
$npp = $_GET["hak"];
$data = query("SELECT * FROM sena  WHERE npp = '$npp'");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Profil Calon ~ E - KPU</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style type="text/css">
    body {
        background-size: 100%;
    }

    .img {
        max-height: 250px;
        max-width: 250px;
        height: 100%
    }
    </style>
</head>

<body style="background-image: url('../assets/img/pko.png');background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center;">
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
    <section style="height: 70px;"></section>
    <div class="container">
        <div class="text-center" style="padding-top:20px; color:#eee;">
            <h2 style="font-size: 36px;">PROFIL CALON</h2>
        </div>
        <hr />
        <div class="row mt-5">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center">
                            <img src="../assets/img/default.png" class="img-responsive">
                        </div>
                    </div>
                    <?php foreach ($data as $row) : ?>
                    <div class="col-md-8">
                        <h3 style="color:#eee">INFORMASI CALON</h3>
                        <table class="table table-striped" style="background: #fff;">
                            <tr>
                                <td width="200px">Nama Calon</td>
                                <td>: <?= $row["nama"]; ?></td>
                            </tr>
                            <tr>
                                <td>Visi</td>
                                <td>: <?= $row["visi"]; ?></td>
                            </tr>
                            <tr>
                                <td>Misi</td>
                                <td>: <?= $row["misi"]; ?></td>
                            </tr>
                            <tr>
                                <td>Periode Pencalonan</td>
                                <td>: <?php echo '2023 / 2024' ?></td>
                            </tr>
                        </table>
                        <div>
                            <a href="sena.php"><button class="btn btn-warning"
                                    style="font-size: 16px;">KEMBALI</button></a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>