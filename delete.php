<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
    
    $perintah = "DELETE FROM tbl_asus WHERE id = '$id'";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
    
    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"] = "sukses menghapus data";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "terjadi kesalahan, gagal menghapus data";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Post DATA";
}

echo json_encode($response);
mysqli_close($connect);
?>