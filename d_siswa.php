<?php
	//Nama: dedi styawan
	//Nim: 14.11.7933
	require_once('lib/DBClass.php');
	require_once('lib/m_siswa.php');

	$id = $_GET['id'];
	if(!is_numeric($id)){
		exit("Acces Forbiden");
	}

	$siswa = new Siswa();
	$data = $siswa->readSiswa($id);

	if(empty($data)){
		echo "Data not found";
	}else{
		$dt = $data[0];
		/*print_r($dt);*/
	}
	
	
?>

<table border="1">
	<tr>
		<th>ID</th>
		<td><?php echo $dt['id_siswa']; ?> </td>
	</tr>
	<tr>
		<th>Full name</th>
		<td><?php echo $dt['full_name']; ?></td>
	</tr>
	<tr>
		<th>Nationality</th>
		<td><?php echo $dt['nationality']; ?></td>
	</tr>
</table>

<br>
<br>
<a href="siswa.php">Kembali </a>

