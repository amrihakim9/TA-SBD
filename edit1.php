<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id_motor dari URL
		if(isset($_GET['Id_Motor'])){
			//membuat variabel $id_motor untuk menyimpan id_motor dari GET id_motor di URL
			$Id_Motor = $_GET['Id_Motor'];

			//query ke database SELECT tabel motor berdasarkan id_motor = $id_motor
			$select = mysqli_query($koneksi, "SELECT * FROM motor WHERE Id_Motor='$Id_Motor'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID Motor tidak ada dalam database.</div>';
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
			$Nama_Motor			  = $_POST['Nama_Motor'];
			$Merk_Motor	= $_POST['Merk_Motor'];
			$Jenis_Motor	= $_POST['Jenis_Motor'];

			$sql = mysqli_query($koneksi, "UPDATE motor SET Nama_Motor='$Nama_Motor', Merk_Motor='$Merk_Motor', Jenis_Motor='$Jenis_Motor' WHERE Id_Motor='$Id_Motor'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_dm";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_dm&Id_Motor=<?php echo $Id_Motor; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Id_Motor</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Id_Motor" class="form-control" size="4" value="<?php echo $data['Id_Motor']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Motor</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama_Motor" class="form-control" value="<?php echo $data['Nama_Motor']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Merk Motor</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Merk_Motor" class="form-control" value="<?php echo $data['Merk_Motor']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Motor</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Jenis_Motor" class="form-control" value="<?php echo $data['Jenis_Motor']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_dm" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
