<?php
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$pesan = $_POST['pesan'];

	// Database connection
	$conn = new mysqli('localhost','root','','web');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
    else {
		$stmt = $conn->prepare("insert into kontak_html(nama, email, pesan) values(?, ?, ?)");
		$stmt->bind_param("sss", $nama, $email, $pesan);
		$execval = $stmt->execute();
		echo $execval;
		echo "Terima Kasih Telah Menghubungi Kami";
		$stmt->close();
		$conn->close();
	}
?>