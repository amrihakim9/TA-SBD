<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$Id_Toko			= $_POST['Id_Toko'];
			$Nama_Toko			= $_POST['Nama_Toko'];
			$Alamat_Toko	= $_POST['Alamat_Toko'];
			$No_Telp		= $_POST['No_Telp'];

			$cek = mysqli_query($koneksi, "SELECT * FROM toko WHERE Id_Toko='$Id_Toko'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO toko(Id_Toko, Nama_Toko, Alamat_Toko, No_Telp) VALUES('$Id_Toko', '$Nama_Toko', '$Alamat_Toko', '$No_Telp')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_dt";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, ID Toko sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah_dt" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Id_Toko</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="Id_Toko" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Toko</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama_Toko" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat Toko</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Alamat_Toko" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nomor Telephone</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="No_Telp" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
