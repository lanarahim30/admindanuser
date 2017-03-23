<!DOCTYPE html>
<html>
<head>
		<title>CREATE NEW ACCOUNT</title>
		<link rel='stylesheet' type='text/css' href='thema/<?php echo 'default'; ?>.css' />
		<link rel="stylesheet" type="text/css" href="dist/components/button.css">
		<?php
		require 'koneksi.php';
		if (isset($_POST['submit'])) {
				$id 					= $_POST['1'];
				$pass			 		= $_POST['2'];
				$first_name 			= $_POST['3'];
				$last_name 				= $_POST['4'];
				$jk						= $_POST['5'];
				$regional 				= $_POST['6'];
				$email					= $_POST['7'];
				$clue					= $_POST['8'];
				$privilage				= $_POST['9'];
				if($id!=NULL and $pass!=NULL and $first_name!=NULL and $jk!=NULL and $email!=NULL){
				$quer 					= 	mysql_query("INSERT INTO `login` (`no`, `id`, `first_name`, `last_name`, `regional`, `email`, `jk`, `pass`, `clue`, `privilage`) VALUES (NULL, '$id', '$first_name', '$last_name', '$regional', '$email', '$jk', '$pass', '$clue', '$privilage');");
			if($quer){
					header('location: ./read.php');
			} else{
				?>
				<script type="text/javascript">
					alert("Username Sudah ada atau belum terisi dengan benar");
				</script>
				<?php
			}
				}
				else
				{
				?>
				<script type="text/javascript">
				alert("Masih ada yang kosong!");
				</script>
				<?php
				}
			}
				?>
</head>
<body>
<h2>Cread New Account</h2>
<form method="POST">
<table>
		<tr>
				<td>ID*</td>
				<td><input type="text" name="1"></td>
		</tr>
		<tr>
				<td>Password*</td>
				<td><input type="password" maxlength="10" name="2"></td>
		</tr>
		<tr>
				<td>Nama Depan*</td>
				<td><input type="text" name="3"></td>
		</tr>
		<tr>
				<td>Nama Belakang</td>
				<td><input type="text" name="4"></td>
		</tr>
		<tr>
				<td>Jenis Kelamin*</td>
				<td>
					<input type="radio" name="5" value="Male">Male
					<input type="radio" name="5" value="Female">Female
					<input type="radio" name="5" value="Other">Other
				</td>
		</tr>
		<tr>
				<td>Regional</td>
				<td>
					<select name="6">
						<option value="Jawa Tengah">Jawa Tengah</option>
						<option value="Jawa Timur">Jawa Timur</option>
						<option value="Jawa Barat">Jawa Barat</option>
						<option value="Yogyakarta">Yogyakarta</option>
						<option value="Jakarta">Jakarta</option>
					</select>
				</td>
		</tr>
		<tr>
				<td>Email*</td>
				<td><input type="text" name="7"></td>
		</tr>
		<tr>
				<td>Hak Akses</td>
				<td>
					<select name="9">
						<option value="0">User</option>
						<option value="1">Admin</option>
					</select>
				</td>
		</tr>
		<tr>
				<td>Kata Mutiara</td>
				<td><textarea type="text" cols ="25" rows="7" name="8"></textarea></td>
		</tr>
		<tr>
			<td>
			Tanda(*) harus di isi
			</td>
		</tr>
		<tr>
				<td>
				<input class="ui fluid large teal submit button" type="submit" name="submit" value="SUBMIT">
				</td>
				
		</tr>
		
</table>
</form>
</body>
</html>