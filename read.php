<!DOCTYPE html>
<html>
<head>
		<title>Tugas MasBro</title>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <link rel='stylesheet' type='text/css' href='thema/<?php echo 'default'; ?>.css' />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Login Example - Semantic</title>
  <link rel="stylesheet" type="text/css" href="dist/components/reset.css">
  <link rel="stylesheet" type="text/css" href="dist/components/site.css">
  <link rel="stylesheet" type="text/css" href="dist/components/table.css">
  <link rel="stylesheet" type="text/css" href="dist/components/container.css">
  <link rel="stylesheet" type="text/css" href="dist/components/grid.css">
  <link rel="stylesheet" type="text/css" href="dist/components/header.css">
  <link rel="stylesheet" type="text/css" href="dist/components/image.css">
  <link rel="stylesheet" type="text/css" href="dist/components/menu.css">

  <link rel="stylesheet" type="text/css" href="dist/components/divider.css">
  <link rel="stylesheet" type="text/css" href="dist/components/segment.css">
  <link rel="stylesheet" type="text/css" href="dist/components/form.css">
  <link rel="stylesheet" type="text/css" href="dist/components/input.css">
  <link rel="stylesheet" type="text/css" href="dist/components/button.css">
  <link rel="stylesheet" type="text/css" href="dist/components/list.css">
  <link rel="stylesheet" type="text/css" href="dist/components/message.css">
  <link rel="stylesheet" type="text/css" href="dist/components/icon.css">

  <style type="text/css">
    body {
      background-color: #DFDFDF;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
  </style>
  
</head>
<body>
<menu class="ui menu"><h2>Data Account</h2></menu>
<table class="ui striped right aligned table">
<tr>
		<th>No</th>
		<th>ID</th>
		<th>Nama Depan</th>
		<th>Nama Belakang</th>
		<th>Jenis Kelamin</th>
		<th>Regional</th>
		<th>Email</th>
		<th>Kata Mutiara</th>
		<th>Hak Akses</th>
		<th>Aksi</th>
</tr>
		<?php
				require 'koneksi.php';
				$no = 1;
				$query = mysql_query("SELECT * FROM login");
				while ($hasil = mysql_fetch_array($query)) { ?>
				<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $hasil[1]?></td>
				<td><?php echo $hasil[2]?></td>
				<td><?php echo $hasil[3]?></td>
				<td><?php echo $hasil[6]?></td>
				<td><?php echo $hasil[4]?></td>
				<td><?php echo $hasil[5]?></td>
				<td><?php echo $hasil[8]?></td>
				<td>
				<?php 
				if($hasil[9]==1)
				{
					echo "Admin";
				}
				else
				{
					echo "User";
				}
				?>
				</td>
				<td> 
				<a class="ui mini button"href="update.php?id=<?php echo $hasil[0]?>">Perbaruhi</a>
				</td>
				<td>
				<a class="ui mini button"href="delete.php?id=<?php echo $hasil[0]?>">Menghapus</a>
				</td>
				</tr>
<?php }?>
		</table>
		<td><a class="ui primary button" href="create.php">Buat data baru</td>
		<td><a class="ui secondary button" href="login.html">Keluar</td>

</body>
</html>