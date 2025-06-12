<?php include("../config/connect.php") ?>
<?php
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	if (!empty($_SESSION) && !empty($_POST)) {
	$mabh = $_POST['mabh'];
	$maUsr = $_SESSION['mausr'];
	$date = date("Y-m-d H:i:s");
	$stmt = $conn->prepare("insert into LichSu value (?, ?, ?)");
	$stmt->bind_param("iss", $maUsr, $mabh, $date);
	$stmt->execute();
	}
?>