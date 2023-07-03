<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $link = $_POST["link"];
    $spek = $_POST["spek"];
    
    $perintah = "UPDATE tbl_asus SET nama = '$nama', harga = '$harga', link = '$link', spek = '$spek' WHERE id = '$id'";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
    
    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"] = "sukses mengubah data";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "terjadi kesalahan, gagal mengubah data";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Post DATA";
}

echo json_encode($response);
mysqli_close($connect);
?>