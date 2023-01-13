<?php
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$judul = $_POST['judul'];
    $gambar = $_POST['gambar'];
    $video = $_POST['video'];
    $alat_bahan = $_POST['alat_bahan'];
    $langkah = $_POST['langkah'];

	// Database connection
	$conn = new mysqli('localhost','root','','web');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
    else {
		$stmt = $conn->prepare("insert into form_html(nama, email, judul, gambar, video, alat_bahan, langkah) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssss", $nama, $email, $judul, $gambar, $video, $alat_bahan, $langkah);
		$execval = $stmt->execute();
		echo $execval;
		echo "Terima Kasih Telah Menghubungi Kami";
		$stmt->close();
		$conn->close();
	}
?>