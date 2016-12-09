<?php

//Nama: Muhamad Bahy alif 
//NIM: 14.11.7984
	require_once ('lib/DBClass.php');
	require_once('lib/m_siswa.php');
	require_once('lib/age.php');

	$siswa = new Siswa();
	$data = $siswa->readAllSiswa();


	/*print '<pre>';
	print_r ($data);
	print '</pre>';	*/

	$no = 0;

?>

<table border = "1">
	<tr>
		<th> NO </th>
		<th> NIK </th>
		<th> FULL NAME </th>
		<th> Date Of Birth</th>
		<th> Age </th>
		<th> NATIONALITY </th>
		<th> Detail </th>
		<th> Edit </th>
		<th> Delete </th>
	</tr>
	<?php foreach ($data as $a){ ?>

	<tr>
		<td> <?php echo $no++; ?></td>
		<td> <?php echo $a['id_siswa']; ?></td>
		<td> <?php echo $a['full_name']; ?></td>
		<td> <?php echo $a['date_ob']; ?></td>
		<td>
		<?php 
			$age2 = new age($a['date_ob']);
			echo $age2->getUmur();
		 ?> 
		 </td>
		<td> <?php echo $a['nationality']; ?></td>
		<td> <a href="d_siswa.php?id= <?php echo $a['id_siswa']; ?>" >Detail </a> </td>

		<td>
			<a href="edit_siswa.php?a=<?php echo $a['id_siswa']; ?> ">Edit</a>
		</td>

		<td>
			<a href="delete_siswa.php?a=<?php echo $a['id_siswa']; ?> "> Hapus </a>
		</td>

	</tr> 
	<?php } ?>


</table>
