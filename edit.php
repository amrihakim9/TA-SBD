<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['Id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$Id = $_GET['Id'];

			//query ke database SELECT tabel pembeli berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM pembeli WHERE Id='$Id'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
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
			$Nama_Pembeli			  = $_POST['Nama_Pembeli'];
			$Alamat_Pembeli	= $_POST['Alamat_Pembeli'];
			$No_Handphone	= $_POST['No_Handphone'];

			$sql = mysqli_query($koneksi, "UPDATE pembeli SET Nama_Pembeli='$Nama_Pembeli', Alamat_Pembeli='$Alamat_Pembeli', No_Handphone='$No_Handphone' WHERE Id='$Id'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_dp";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_dp&Id=<?php echo $Id; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Id</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Id" class="form-control" size="4" value="<?php echo $data['Id']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pembeli</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama_Pembeli" class="form-control" value="<?php echo $data['Nama_Pembeli']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat Pembeli</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Alamat_Pembeli" class="form-control" value="<?php echo $data['Alamat_Pembeli']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nomor Handphone</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="No_Handphone" class="form-control" value="<?php echo $data['No_Handphone']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_dp" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
