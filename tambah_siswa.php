<?php
	require_once ('lib/DBClass.php');
	require_once('lib/m_nationality.php');
	require_once('lib/m_siswa.php');

	$siswa = new Siswa();

	$nationality = new Nationality();
	$data_nation = $nationality->readAllNationality();
?>


<h1>Tambah Data Siswa </h1>
<form action="tambah_siswa.php" method="POST">
	NIS : <br>
	<input type="text" name="in_nis"><br>
	Nama Lengkap: <br>
	<input type="text" name="in_nama"><br>
	Email: <br>
	<input type="text" name="in_email"><br>
	Kewarganegaraan : <br>
	<select name="in_nation"> 
		<option value="">--Pilih Negara</option>
		<?php foreach ($data_nation as $n) { ?>
			<option value="<?php echo $n['id_nationality']; ?>">
				<?php echo $n['nationality']; ?>
			</option>
		<?php } ?>
	</select> <br>

	<input type="submit" name="kirim" value="simpan">
</form>

<?php
	if(isset($_POST['kirim'])){
		$name = $_POST['in_nama'];
		$nis = $_POST['in_nis'];
		$email = $_POST['in_email'];
		$nation = $_POST['in_nation'];

		$tambah = $siswa->createSiswa($nation, $nis, $name, $email, '');
		echo "<br>Data siswa berhasil ditambahkan <br>";
	}
	
?>