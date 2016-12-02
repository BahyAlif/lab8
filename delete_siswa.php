<?php
	require_once ('lib/DBClass.php');
	require_once('lib/m_siswa.php');

	$id = $_GET['a'];

	if(!is_numeric($id)){
		exit('Acces Forbidden');
	}

	$siswa = new siswa();
	$data = $siswa->deleteSiswa($id);

	if(empty($data)){
		echo "Data berhasil di hapus";
	}
?>


<br>
<a href="siswa.php"> Kembali </a>