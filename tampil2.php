<?php
	error_reporting(0);
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Data Toko</font></center>
		<hr>

		</div class="row">
            <div class="col-md-12">
              <form action="" method="POST">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Search..." name="query" autocomplete="off" autofocus> 
                  <div class="input-group-append">
                  <input class="btn btn-primary" type="submit" name="submit" value="Search" />
                  </div>
                </div>
              </form>

		<a href="index.php?page=tambah_dt"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>ID Toko</th>
					<th>Nama Toko</th>
					<th>Alamat Toko</th>
					<th>Nomor Telephone</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>

			
				<?php
				//membuat variabel $no untuk menyimpan nomor urut
				$no = 1;
				$query = $_POST['query'];
				if($query != ''){
					$sql = mysqli_query($koneksi, "SELECT * FROM toko WHERE Id_Toko LIKE '%".$query."%' OR Nama_Toko LIKE '%".$query."%' OR Alamat_Toko LIKE '%".$query."%' OR No_Telp LIKE '%".$query."%'");
				}else{
					//query ke database SELECT tabel toko urut berdasarkan id_toko yang paling besar
					$sql = mysqli_query($koneksi, "SELECT * FROM toko ORDER BY Id_Toko DESC") or die(mysqli_error($koneksi));
				}
				
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['Id_Toko'].'</td>
							<td>'.$data['Nama_Toko'].'</td>
							<td>'.$data['Alamat_Toko'].'</td>
							<td>'.$data['No_Telp'].'</td>
							<td>
								<a href="index.php?page=edit_dt&Id_Toko='.$data['Id_Toko'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete2.php?Id_Toko='.$data['Id_Toko'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
	</div>
