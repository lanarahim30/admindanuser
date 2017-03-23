<?php
    //include('koneksi.php) berfungsi untuk mengkoneksikan kodingan dengan localhost
    include('koneksi.php');

    //menginisiasi variabel-variabel yang dikirimkan dari form-->input name
    //fix problem : undefined index...
    if( isset($_POST['nama_pengguna'])  &&
        isset($_POST['kata_sandi'])
      )
    {
        //mendapatkan data dari masuk.php dan memasukkannya ke variabel
        $namapengguna   = $_POST['nama_pengguna'];
        $katasandi      = $_POST['kata_sandi'];

    }else{

        //otomatis mengalihkan ke halaman masuk.php jika terjadi undefined index
        header("location:masuk.php");

    }

    if  (
        empty($namapengguna) || //jika nama_pengguna kosong
        empty($katasandi)       //jika kata_sandi kosong
        )
    {

        //pernyataan yang keluar jika salah satu atau beberapa kemungkinan di atas terjadi
        echo "ada kolom yang belum diisi <a href='login.php'>Kembali ke halaman masuk sistem</a>";

    }else{

        //mengambil informasi dari nama tabel "login" pada kolom "namaPengguna"
        $ambilDataSql     = mysql_query("SELECT * FROM login WHERE id = '$namapengguna'");

        //mengambil informasi dari seluruh kolom namaPengguna
        $cek_namapengguna = mysql_num_rows($ambilDataSql);
        
        //mengecek ketersediaan identitas
        if($cek_namapengguna == 1){//jika nama pengguna sudah terdaftar
            
            //mengecek kecocokan kata sandi
            $ambil_data = mysql_fetch_assoc($ambilDataSql);//mengambil data berupa array
            $cek_kata_sandi   = $ambil_data["pass"];//mengambil data array pada item "pass"
            
            if($katasandi == $cek_kata_sandi){//jika kata sandi cocok dengan username database
               
                //memulai session
                session_start();

                //membuat variabel sesi "pengguna" dengan value $namapengguna
                $_SESSION['pengguna'] = $namapengguna;
				
				if($ambil_data["privilage"]==1)
				{
                //pindahkan user ke halaman index.php
					header("location:read.php");
				}
				else
				{
					header("location:read_user.php");
				}
            }else{
                
                //jika kata sandi tidak cocok
                echo "kata sandi tidak cocok, ulangi kembali <a href='login.php'>Masuk</a>";
            }
        }else{

            //memberitahukan bahwa nama pengguna belum terdaftar
            echo "nama pengguna belum terdaftar, silahkan hubungi admin<a href='login.php'>Kembali</a>";

        }
    }
?>