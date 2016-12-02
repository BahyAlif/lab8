<?php
	//Nama: dedi styawan
	//Nim: 14.11.7933
	require_once ('lib/DBClass.php');
	require_once('lib/m_nationality.php');
	require_once('lib/m_siswa.php');

		$id = $_GET['a'];

		if(!is_numeric($id)){
			exit('Acces Forbidden');
		}

		$siswa = new Siswa();
		$data_siswa = $siswa->readSiswa($id);

		$nation = new Nationality();
		$data_nation = $nation->readAllNationality();

		if(empty($data_siswa)){
			exit('Siswa not found');
		}

		$dt = $data_siswa[0];
?>

<h1>Edit Data Siswa </h1>
<form action="result_edit_siswa.php?a=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
	NIS : <br>
	<input type="text" name="in_nis" value="<?php echo $dt['nis']; ?>" readOnly="true"><br>
	Nama Lengkap: <br>
	<input type="text" name="in_nama" value="<?php echo $dt['full_name']; ?>"><br>
	Email: <br>
	<input type="text" name="in_email" value="<?php echo $dt['email']; ?>"><br>
	Kewarganegaraan : <br>
	<select name="in_nation"> 
		<option value="">--Pilih Negara</option>
		<?php foreach ($data_nation as $n) { ?>
			<option value="<?php echo $n['id_nationality'];?>"  <?php echo ($dt['id_nationality'] == $n['id_nationality']) ?'selected' : '' ?>>
				<?php echo $n['nationality']; ?>
			</option>
		<?php } ?>
	</select> <br>
        
        Foto : <input type="file" name="in_foto" id="in_foto"><br>       
	<input type="submit" name="kirim" value="simpan">
</form>
