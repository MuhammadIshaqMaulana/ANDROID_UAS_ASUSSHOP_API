<?php
require("koneksi.php");


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $link = $_POST["link"];
    $spek = $_POST["spek"];
    
    $perintah = "INSERT INTO tbl_asus(nama, harga, link, spek) VALUES('$nama', '$harga', '$link', '$spek')";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
    
    if($cek > 0){
        $response["kode"] = 1;
        $response["pesan"] = "sukses menyimpan data";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "terjadi kesalahan, gagal menyimpan data";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Post DATA";
}

echo json_encode($response);
mysqli_close($connect);
?>