<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id_toko dari URL
		if(isset($_GET['Id_Toko'])){
			//membuat variabel $id_toko untuk menyimpan id_toko dari GET id_toko di URL
			$Id_Toko = $_GET['Id_Toko'];

			//query ke database SELECT tabel toko berdasarkan id_toko = $id_toko
			$select = mysqli_query($koneksi, "SELECT * FROM toko WHERE Id_Toko='$Id_Toko'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID Toko tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$Nama_Toko			  = $_POST['Nama_Toko'];
			$Alamat_Toko	= $_POST['Alamat_Toko'];
			$No_Telp	= $_POST['No_Telp'];

			$sql = mysqli_query($koneksi, "UPDATE toko SET Nama_Toko='$Nama_Toko', Alamat_Toko='$Alamat_Toko', No_Telp='$No_Telp' WHERE Id_Toko='$Id_Toko'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_dt";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_dt&Id_Toko=<?php echo $Id_Toko; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Id_Toko</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Id_Toko" class="form-control" size="4" value="<?php echo $data['Id_Toko']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Toko</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama_Toko" class="form-control" value="<?php echo $data['Nama_Toko']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat Toko</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Alamat_Toko" class="form-control" value="<?php echo $data['Alamat_Toko']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nomor Telephone</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="No_Telp" class="form-control" value="<?php echo $data['No_Telp']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_dt" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
