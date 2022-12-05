<!DOCTYPE html>
<html>
<head>
<title>Menghitung Jumlah Array Di PHP By Dumet School</title>
</head>
<body>
<H1>Form Jabatan</H1>
	
		Nama :
		<input type="text" name="nama_lengkap">
		<br>
		
        <?php
			$jabatan = array ("Manager","Supervisor","Cashier","Sales Executive","acounting");
			$jabs = count($jabatan); // ini adalah kode menghitung array
            echo $jabs;

            $nama1 = " nih ";
            $nama2 = "Charles";
            $nama = $nama1 . $nama2;
            echo $nama;
		?>
</body>
</html>