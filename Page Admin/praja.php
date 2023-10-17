<?php 
require '../function.php';
$kt = '';
$tombol = '';
$count = 0;
$keyword = $_GET["keyword"];
$query = "SELECT * FROM akun 
        WHERE
        nama LIKE '%$keyword%' OR
        username LIKE '%$keyword%' OR
        kelas LIKE '%$keyword%'
        ";
$data = query($query);

?>

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
                <a href=""><button class="btn btn-<?= $tombol; ?>" style="font-size: 16px;"><?= $kt; ?></button></a>
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