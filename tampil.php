<?php
	error_reporting(0);
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Data Pembeli</font></center>
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

		<a href="index.php?page=tambah_dp"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>ID</th>
					<th>Nama Pembeli</th>
					<th>Alamat Pembeli</th>
					<th>Nomor Handphone</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>

			
				<?php
				//membuat variabel $no untuk menyimpan nomor urut
				$no = 1;
				$query = $_POST['query'];
				if($query != ''){
					$sql = mysqli_query($koneksi, "SELECT * FROM pembeli WHERE Id LIKE '%".$query."%' OR Nama_Pembeli LIKE '%".$query."%' OR Alamat_Pembeli LIKE '%".$query."%' OR No_Handphone LIKE '%".$query."%'");
				}else{
					//query ke database SELECT tabel pembeli urut berdasarkan id yang paling besar
					$sql = mysqli_query($koneksi, "SELECT * FROM pembeli ORDER BY Id DESC") or die(mysqli_error($koneksi));
				}
				
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['Id'].'</td>
							<td>'.$data['Nama_Pembeli'].'</td>
							<td>'.$data['Alamat_Pembeli'].'</td>
							<td>'.$data['No_Handphone'].'</td>
							<td>
								<a href="index.php?page=edit_dp&Id='.$data['Id'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete.php?Id='.$data['Id'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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
