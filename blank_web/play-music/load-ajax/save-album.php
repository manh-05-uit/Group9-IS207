<?php include("../config/connect.php") ?>
<?php
	if (!empty($_SESSION) && !empty($_POST)) {
		$maAlbum = $_POST['maalbum'];
		$maUsr = $_SESSION['mausr'];
		$stmt = $conn->prepare("select * from Usr_Album where MaUsr = ? and MaAlbum = ?");
		$stmt->bind_param("is", $maUsr, $maAlbum);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) {
			$stmt = $conn->prepare("delete from Usr_Album where MaUsr = ? and MaAlbum = ?");
			$stmt->bind_param("is", $maUsr, $maAlbum);
			$stmt->execute();
			echo "removed";
		} else {
			$stmt = $conn->prepare("insert into Usr_Album value (?, ?)");
			$stmt->bind_param("is", $maUsr, $maAlbum);
			$stmt->execute();
			echo "added";
		}
	} else {
		echo "error";
	}
?>