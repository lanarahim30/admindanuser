<?php
		$host = "localhost";
		$user = "root";
		$pass = "";
		$dbnm = "tugas_kelas";
		$conn = mysql_connect ($host, $user, $pass);
		if ($conn) {
			$buka = mysql_select_db ($dbnm);
			if (!$buka) {
				die ("Database tidak ditemukan");
			}
			else{
				
			}
		} else {
		die ("Server MySQL tidak terhubung");
		}
?>