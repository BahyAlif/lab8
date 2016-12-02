<?php
	require_once ('lib/DBClass.php');
	require_once('lib/m_siswa.php');

	$siswa = new Siswa();
//        echo "<pre>";
//        print_r($_FILES);
//        echo '</pre>';
        
        $data_foto = '';
        if($_FILES['in_foto']['error'] == 0){
            if(!copy($_FILES['in_foto']['tmp_name'], 'img/'.$_POST['in_nis'].'.png')){
                $data_foto = '';
                exit('Error upload File');
            }else{
                $data_foto = 'img/'.$_POST['in_nis'].'.png';
                echo 'Upload file berhasil <br>';
            }
        }

	if(isset($_POST['kirim'])){
		$data_input = array(
			'input_name' => $_POST['in_nama'], 
			'input_email' => $_POST['in_email'], 
			'input_nation' => $_POST['in_nation'],
			'foto' => $data_foto,
			);
		$id = $_GET['a'];

		$update = $siswa->updateSiswa($id, $data_input);

		echo "<br>Data siswa berhasil diubah <br>";
	}
	
?>

<a href="d_siswa.php?id=<?php echo $id; ?>">Detail siswa</a>