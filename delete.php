<?php
require 'koneksi.php';
if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = mysql_query("DELETE FROM login WHERE no ='$id'");
		if($query){
				echo "Sukses Hapus";
				header('location: ./read.php');
		}else{
				echo "Gagal Hapus";
				header('location: ./read.php');
		}
}
?>