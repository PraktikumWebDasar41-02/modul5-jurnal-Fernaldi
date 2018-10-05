<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
	<form method="POST">
		<table>
		<tr>
			<td>NIM</td>
			<td><input type="text" name="nim"></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama"></td>
		</tr>	
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" placeholder="contoh@gmail.com"></td>
		</tr>
		<tr>
			<td><input type="submit" name="kirim"></td>
		</tr>
		</table>
	</form>
</body>
</html>

<?php 
include "1.php";

if (isset($_POST['kirim'])) {
	if (strlen($_POST['nim'])==10 && $_POST['nim']!="") {
		$nim=$_POST['nim'];
	}else{
		echo "Masukkan 10 Angka!";
	}

	if (strlen($_POST['nama'])==20 && $_POST['nama']=="") {
		echo "Masukkan Nama anda";
	}else{
		$nama= $_POST['nama'];
	}

	if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)&& $_POST['email']!=""){
		echo "Email Anda kurang";
	}else{
		$email = $_POST['email'];
	}

	if(isset($nim) && isset($nama) && isset($email)){
		session_start();
		$_SESSION['nimm'] = $nim;
		$sq = mysqli_query($conn,"INSERT INTO t_jurnal1(NIM,Nama,Email) VALUES ('$nim','$nama','$email')");
		if (isset($sq)) {
			echo "Data Tidak Valid";
			header("Location:komen.php");

		}else{
			echo "Data Tidak Tersimpan";
		}
	}

}

?>