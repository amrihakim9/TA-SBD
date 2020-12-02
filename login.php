<?php

    ob_start();
    session_start();
    if(isset($_SESSION['akun_username'])) header("location: index.php");
    include "config.php";

    /* PROSES LOGIN */
    if(isset($_POST['submit_login'])) {
    	$username = $_POST['username'];
    	$password = md5($_POST['password']);
    	$sql_login = mysqli_query($koneksi, "SELECT * FROM akun WHERE username = '$username' AND password = '$password'");

    	if(mysqli_num_rows($sql_login)>0) {
        $row_akun = mysqli_fetch_array($sql_login);
        $_SESSION['akun_id'] = $row_akun['id'];
    		$_SESSION['akun_username'] = $row_akun['username'];
    		header("location: index.php");
    	}else {
    		header("location: login.php?gagal_login");
    	}
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="assets/images/favicon1.png" type="image/ico" />

    <title> Sistem Informasi TOKO MOTOR </title>

    <link href="assets/css/style.css" rel="stylesheet">
  </head>
  <body>
  <div class="col-md-4 col-md-offset-4 form-login">

      <div class="outter-form-login">
        <div class="logo-login">
            <em class="glyphicon glyphicon-user"></em>
        </div>
<form action="" method="post">
     <table>
     <tr>
	       <td colspan="2">
         <div class="form-group">
              <h1 class="text-center title-login">Sistem Informasi Toko Motor</h1>
        </div>
	       </td>
	  </tr>
	  <tr>
	       <td>
         <div class="form-group">
              <input type="text" name="username" value="" placeholder="Username" required autocomplete="off" autofocus> 
         </div>
	       </td>
	  </tr>
	  <tr>
	       <td>
	            <input type="password" name="password" value="" placeholder="Password" required>
	       </td>
    </tr>
      </div>
    <?php

    if(isset($_GET['gagal_login'])) {?>
    <tr>
        <td>
            <div>
                <p>Maaf, Username / Password yang anda masukkan salah</p>
            </div>
        </td>
    </tr>
    <?php }
    
    ?>
	  <tr>
	       <td colspan="2">
	            <input type="submit" class="btn btn-block btn-custom-green" value="Submit" name="submit_login">
	        </td>
	   </tr>
     </table>
</form>
  </html>
    </body>
<?php

    mysqli_close($koneksi);
    ob_end_flush();

?>
