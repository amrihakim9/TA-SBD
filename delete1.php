<?php
//include file config.php
include('config.php');

//jika benar mendapatkan GET id_motor dari URL
if(isset($_GET['Id_Motor'])){
	//membuat variabel $id_motor yang menyimpan nilai dari $_GET['id_motor']
	$Id_Motor = $_GET['Id_Motor'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id_motor yang sama dengan variabel $id_motor
	$cek = mysqli_query($koneksi, "SELECT * FROM motor WHERE Id_Motor='$Id_Motor'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id_motor=$id_motor
		$del = mysqli_query($koneksi, "DELETE FROM motor WHERE Id_Motor='$Id_Motor'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php?page=tampil_dm";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php?page=tampil_dm";</script>';
		}
	}else{
		echo '<script>alert("ID Motor tidak ditemukan di database."); document.location="index.php?page=tampil_dm";</script>';
	}
}else{
	echo '<script>alert("ID Motor tidak ditemukan di database."); document.location="index.php?page=tampil_dm";</script>';
}

?>
