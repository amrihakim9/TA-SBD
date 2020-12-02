<?php
//include file config.php
include('config.php');

//jika benar mendapatkan GET id_toko dari URL
if(isset($_GET['Id_Toko'])){
	//membuat variabel $id_toko yang menyimpan nilai dari $_GET['id_toko']
	$Id_Toko = $_GET['Id_Toko'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id_toko yang sama dengan variabel $id_toko
	$cek = mysqli_query($koneksi, "SELECT * FROM toko WHERE Id_Toko='$Id_Toko'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id_toko=$id_toko
		$del = mysqli_query($koneksi, "DELETE FROM toko WHERE Id_Toko='$Id_Toko'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php?page=tampil_dp";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php?page=tampil_dp";</script>';
		}
	}else{
		echo '<script>alert("ID Toko tidak ditemukan di database."); document.location="index.php?page=tampil_dp";</script>';
	}
}else{
	echo '<script>alert("ID Toko tidak ditemukan di database."); document.location="index.php?page=tampil_dp";</script>';
}

?>
