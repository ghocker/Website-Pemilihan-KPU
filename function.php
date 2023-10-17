<?php 
$conn = mysqli_connect("localhost", "root", "", "kpu");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data,$id){
    global $conn;
    $nama = (stripslashes($data["nama"]));
    $npp = (stripslashes($data["npp"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $kelas = (stripslashes($data["kelas"]));
    $result = mysqli_query($conn, "SELECT username FROM akun WHERE username = '$npp'");
    if (mysqli_fetch_assoc($result)){
        echo "<script>
        alert('username sudah terdaftar')
        </script>";
        return false;
    }
    mysqli_query($conn, "INSERT INTO akun VALUES ('$id','$nama','$npp','$kelas','$password','FALSE')");
    return mysqli_affected_rows($conn);
} 

function pilih($data, $hak){
    global $conn;
    $id = $data;
    $calon = $hak;
    $query = "UPDATE akun SET sena = '$calon', keterangan = 'TRUE' WHERE username = '$id' ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function pilih2($data, $hak){
    global $conn;
    $id = $data;
    $calon = $hak;
    $query = "UPDATE akun SET wasena = '$calon', keterangan = 'TRUE' WHERE username = '$id' ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function recovery($data){
    global $conn;
    $a = $data;
    $query = "UPDATE akun SET sena = '', wasena = '', keterangan = 'FALSE' WHERE username = '$a'";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function hapus($data){
    global $conn;
    $a = $data;
    $query = "DELETE FROM akun WHERE username = '$a'";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
?>