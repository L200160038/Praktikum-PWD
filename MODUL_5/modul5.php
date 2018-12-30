<?php 
	$koneksi=mysqli_connect('localhost','root','','informatika') ;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Data mahasiswa</title>
	</head>
	<body>
		<center>
			<h3>Masukkan data Mahasiswa</h3>
			<form method="POST" action="modul5.php">
				<table border="0" width="30%">
					<tr>
						<td width="25%">NIM</td>
						<td width="5%">:</td>
						<td width="65%"><input type="text" name="NIM" size="10"></td>
					</tr>
					<tr>
						<td width="25%">Nama</td>
						<td width="5%">:</td>
						<td width="65"><input type="text" name="Nama" size="30"></td>
					</tr>
					<tr>
						<td width="25%">Kelas</td>
						<td width="5%">:</td>
						<td width="65%"><input type="radio" name="Kelas" value="A" checked="A" >A
						<input type="radio" name="Kelas" value="B">B<input type="radio" name="Kelas" value="C">C </td>
					</tr>
					<tr>
						<td width="25%">Alamat</td>
						<td width="5%">:</td>
						<td width="65%"><input type="text" name="Alamat" size="40"></td>
					</tr>
				</table>
				<input type="submit" name="submit" value="Masukkan">
			</form>

			<?php
				error_reporting(E_ALL ^ E_NOTICE);
				$NIM=$_POST['NIM'];
				$Nama=$_POST['Nama'];
				$Kelas=$_POST['Kelas'];
				$Alamat=$_POST['Alamat'];
				$submit=$_POST['submit'];
				$input= "insert into mahasiswa (nim, nama, kelas, alamat) value ('$NIM','$Nama','$Kelas','$Alamat')";
				if ($submit){
					if($NIM==''){
						echo "</br> nim tidak boleh kosong, diisi dulu";
					}
					elseif ($Nama=='') {
						# code...
						echo "</br> Nama tidak boleh kosong, diisi dulu";
					}
					elseif ($Alamat=='') {
						# code...
						echo "</br> alamat tidak boleh kosong, diisi dulu";
					}
					else{
						mysqli_query($koneksi, $input);
						echo "</br>Data berhasil dimasukkan";
					}
				}
			?>
			<hr>
			<h3>Data mahasiswa</h3>
			<table border="1" width="50%">
				<tr>
					<td align="center"><b>NIM</b></td>
					<td align="center"><b>Nama</b></td>
					<td align="center"><b>Kelas</b></td>
					<td align="center"><b>Alamat</b></td>
					<td align="center"><b>Kategori</b></td>
				</tr>

				<?php
					$cari="select * from mahasiswa order by nim";
					$hasil=mysqli_query($koneksi, $cari);
					while ($data=mysqli_fetch_row($hasil)) {
						echo "
						<tr>
						<td width='20%'>$data[0]</td>
						<td width='30%'>$data[1]</td>
						<td width='10%'>$data[2]</td>
						<td width='30%'>$data[3]</td>
						<td width='30%'>
							<a href='modul5.php?id=$data[0]'>Ubah</a>
						</td>
						</tr>";
					}
				?>
			</table>




			<?php
				$id = $_GET['id'];
				$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$id' ");
				$data = mysqli_fetch_row($query);
				
				$NIM=$_POST['NIM'];
				$Nama=$_POST['Nama'];
				$Kelas=$_POST['Kelas'];
				$Alamat=$_POST['Alamat'];
				$submit2=$_POST['ubah'];
				$query = "
						UPDATE mahasiswa
						SET nim='$NIM', nama='$Nama', kelas='$Kelas', alamat='$Alamat'
						WHERE nim='$NIM'
					";
				if ($submit2){
					if($NIM==''){
						echo "</br> nim tidak boleh kosong, diisi dulu";
					}
					elseif ($Nama=='') {
						# code...
						echo "</br> Nama tidak boleh kosong, diisi dulu";
					}
					elseif ($Alamat=='') {
						# code...
						echo "</br> alamat tidak boleh kosong, diisi dulu";
					}
					else{
						mysqli_query($koneksi, $query);
						echo "</br>Data berhasil diubah";
					}
				}
			?>
			<br><br><hr>
			<h1>Form Edit</h1>
			<form method="POST" action="modul5.php">
				<table border="0" width="30%">
					<tr>
						<td width="25%">NIM</td>
						<td width="5%">:</td>
						<td width="65%">
							<input type="text" name="NIM" size="10"
								<?php
									echo "value = '$data[0]'";
								?>
							>
						</td>
					</tr>
					<tr>
						<td width="25%">Nama</td>
						<td width="5%">:</td>
						<td width="65">
							<input type="text" name="Nama" size="30"
								<?php
									echo "value = '$data[1]'";
								?>
							>
						</td>
					</tr>
					<tr>
						<td width="25%">Kelas</td>
						<td width="5%">:</td>
						<td width="65%">
							<input type="radio" name="Kelas" value="A" 
								<?php if ($data[2] == "A") {
									echo "checked";
								} ?>
							>A
							<input type="radio" name="Kelas" value="B"
								<?php if ($data[2] == "B") {
									echo "checked";
								} ?>
							>B
							<input type="radio" name="Kelas" value="C"
								<?php if ($data[2] == "C") {
									echo "checked";
								} ?>
							>C </td>
					</tr>
					<tr>
						<td width="25%">Alamat</td>
						<td width="5%">:</td>
						<td width="65%">
							<input type="text" name="Alamat" size="40"
								<?php
									echo "value = '$data[3]'";
								?>
							>
						</td>
					</tr>
				</table>
				<input type="submit" name="ubah" value="Ubah">
			</form>
		</center>
	</body>
</html>