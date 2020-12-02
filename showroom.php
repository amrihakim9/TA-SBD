<?php
	error_reporting(0);
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Showroom Motor Tangerang</font></center>
		<hr>

		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
                    <th>NO.</th>
                    <th>Nama_Pembeli</th>
                    <th>Nama Motor</th>
                    <th>Merk Motor</th>
                    <th>Alamat Toko</th>
                    <th>Alamat_Pembeli</th>
				</tr>
			</thead>
			<tbody>
                <?php
                $no =1;
                $query = "SELECT * FROM motor 
                INNER JOIN toko ON motor.Id_Motor = toko.Id_Toko
                INNER JOIN pembeli ON motor.Id_Motor = pembeli.Id";
                $sql_m = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
                while ($data = mysqli_fetch_array($sql_m)) { ?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$data['Nama_Pembeli']?></td> 
                        <td><?=$data['Nama_Motor']?></td>
                        <td><?=$data['Merk_Motor']?></td>
                        <td><?=$data['Alamat_Toko']?></td>
                        <td><?=$data['Alamat_Pembeli']?></td>   
                    </tr>         
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>