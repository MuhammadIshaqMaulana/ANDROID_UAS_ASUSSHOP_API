<?php
require("koneksi.php");

$perintah = "SELECT * FROM tbl_asus";
$eksekusi = mysqli_query($connect, $perintah);

$cek = mysqli_affected_rows($connect);
if($cek > 0){
    $response["kode"] = 1;
    $response["pesan"] = "Data Tersedia";
    $response["data"] = array();
    
    while($get = mysqli_fetch_object($eksekusi)){
        $var["id"] = $get -> id;
        $var["nama"] = $get -> nama;
        $var["harga"] = $get -> harga;
        $var["link"] = $get -> link;
        $var["spek"] = $get -> spek;
        //$var["deskripsi_lengkap"] = $get -> deskripsi_lengkap;
        
        array_push($response["data"], $var);
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Data Tidak Tersedia";
}
echo json_encode($response);
mysqli_close($connect);
?>