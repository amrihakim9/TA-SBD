<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$Id			= $_POST['Id'];
			$Nama_Pembeli			= $_POST['Nama_Pembeli'];
			$Alamat_Pembeli	= $_POST['Alamat_Pembeli'];
			$No_Handphone		= $_POST['No_Handphone'];

			$cek = mysqli_query($koneksi, "SELECT * FROM pembeli WHERE Id='$Id'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO pembeli(Id, Nama_Pembeli, Alamat_Pembeli, No_Handphone) VALUES('$Id', '$Nama_Pembeli', '$Alamat_Pembeli', '$No_Handphone')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_dp";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, ID sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah_dp" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Id</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="Id" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pembeli</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama_Pembeli" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat Pembeli</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Alamat_Pembeli" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nomor Handphone</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="No_Handphone" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
