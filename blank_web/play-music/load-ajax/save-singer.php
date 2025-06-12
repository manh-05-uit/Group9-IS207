<?php include("../config/connect.php") ?>
<?php
	if (!empty($_SESSION) && !empty($_POST)) {
		$macs = $_POST['macs'];
		$maUsr = $_SESSION['mausr'];
		$stmt = $conn->prepare("select * from Usr_CaSi where MaUsr = ? and MaCaSi = ?");
		$stmt->bind_param("is", $maUsr, $macs);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) {
			$stmt = $conn->prepare("delete from Usr_CaSi where MaUsr = ? and MaCaSi = ?");
			$stmt->bind_param("is", $maUsr, $macs);
			$stmt->execute();
			echo "removed";
		} else {
			$stmt = $conn->prepare("insert into Usr_CaSi values (?, ?)");
			$stmt->bind_param("is", $maUsr, $macs);
			$stmt->execute();
			echo "added";
		}
	} else {
		echo "error";
	}
?>