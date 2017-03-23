<!DOCTYPE html>
<html>
<head>
		<title>UPDATE ACCOUNT</title>
		<link rel='stylesheet' type='text/css' href='thema/<?php echo 'default'; ?>.css' />
		<link rel="stylesheet" type="text/css" href="dist/components/button.css">
		<?php
		require 'koneksi.php';
	
		if (isset($_POST['submit'])) {
				$no						= $_POST['0'];
				$id 					= $_POST['1'];
				$pass			 		= $_POST['2'];
				$first_name 			= $_POST['3'];
				$last_name 				= $_POST['4'];
				$jk						= $_POST['5'];
				$regional 				= $_POST['6'];
				$email					= $_POST['7'];
				$clue					= $_POST['8'];
				$privilage				= $_POST['9'];
			if($no!=NULL and $id!=NULL and $pass!=NULL and $first_name!=NULL and $jk!=NULL and $email!=NULL){
				$quer = mysql_query("UPDATE login SET id='$id', pass='$pass', first_name='$first_name', last_name='$last_name', jk='$jk', regional='$regional', email='$email', clue='$clue', privilage='$privilage' WHERE no='$no';");
			if($quer){
					header('location: ./read.php');
			} else{
				echo "GAGAL UPDATE" ;
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
		if (isset($_GET['id'])) {
				$id = $_GET['id'];
		$query = mysql_query("SELECT * FROM login WHERE no ='$id'");
			$hasil = mysql_fetch_array($query);
			?>
			
		<script type="text/javascript">
			function validasi_input(form){
			if (form.1.value == ""){
			alert("Username masih kosong!");
			form.username.focus();
			return (false);
			}
			return (true);
			}
		</script>	
			
		</head>
		<body>
		<h2>Edit Account</h2>
		<form method="POST">
		
		
		
		
				<input type="hidden" name="0" value="<?php echo $hasil[0] ?>">
<table>
		<tr>
				<td>ID*</td>
				<td><input type="text" name="1" value="<?php echo $hasil[1] ?>"></td>
		</tr>
		<tr>
				<td>Password*</td>
				<td><input type="password" maxlength="10" name="2" value="<?php echo $hasil[7] ?>"></td>
		</tr>
		<tr>
				<td>Nama Depan*</td>
				<td><input type="text" name="3" value="<?php echo $hasil[2] ?>"></td>
		</tr>
		<tr>
				<td>Nama Belakang</td>
				<td><input type="text" name="4" value="<?php echo $hasil[3] ?>"></td>
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
					<select name="6"  value="<?php echo $hasil[4] ?>">
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
				<td><input type="text" name="7" value="<?php echo $hasil[5] ?>"></td>
		</tr>
		<tr>
				<td>Hak Akses</td>
				<td>
					<select name="9" value="<?php echo $hasil[9] ?>">
						<option value="0">User</option>
						<option value="1">Admin</option>
					</select>
				</td>
		</tr>
		<tr>
				<td>Kata Mutiara</td>
				<td><textarea type="text" cols ="25" rows="7" name="8" value="<?php echo $hasil[8] ?>"></textarea></td>
		</tr>
		<tr>
			<td>
			Tanda(*) harus di isi
			</td>
		</tr>

<tr>
		<td><input class="ui fluid large teal submit button" type="submit" name="submit" value="PERBARUHI"></td>
</tr>
							</table>
							<?php }?>
		</form>
		</body>
		</html>