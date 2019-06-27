<?php 
		include 'database.php';  // jika beda sesuai dengan config anda

		if(isset($_POST['submit'])){
			
			$namabrg = $_POST['namabrg'];
			$harga = $_POST['harga'];
				$spesifikasi = $_POST['spesifikasi'];
			$ekstensi_diperbolehkan	= array('png','jpg');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, '../gambar/'.$nama);
					$query = mysqli_query($koneksi, "INSERT INTO barang(namabrg, harga, spesifikasi, foto) VALUES('$namabrg', '$harga', '$spesifikasi', '$nama')");
					if($query){
						echo ' 
						 <script>
        					alert("Berhasil Ditambahkan!");
        					window.location = "../input.php"
      					 </script>';
					}else{
						echo '<script>
        					alert("Gagal Ditambahkan!");
        					window.location = "../admin/page/konseling.php"
      					 	</script>';
					}
				}else{
					echo '<script>
        					alert("File Terlalu Besar!!!");
        					
      					 </script>';
				}
			}
			else{
				echo '<script>
        					alert(Ekstensi File Tidak Diperbolehkan!!);
        			  </script>';
			}
		}
		?>
