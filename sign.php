<?php
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$konfir = $_POST['konfir'];

	// Database connection
	$conn = new mysqli('localhost','root','','web');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
    else {
		$stmt = $conn->prepare("insert into sign_html(nama, email, pass, konfir) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $nama, $email, $pass, $konfir);
		$execval = $stmt->execute();
		echo $execval;
		echo "Terima Kasih Telah Menghubungi Kami";
		$stmt->close();
		$conn->close();
	}
?>