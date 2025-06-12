<?php include("../config/connect.php") ?>
<?php $mabh = $_POST['mabh'];
	$view = 0;
	$stmt = $conn->prepare("select SoLuotPhat from BaiHat where MaBaiHat = ?");
	$stmt->bind_param("s", $mabh);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
		$view = $row['SoLuotPhat'];
	}
	$view = $view + 1;
	$stmt = $conn->prepare("update BaiHat set SoLuotPhat = ? where MaBaiHat = ?");
	$stmt->bind_param("is", $view, $mabh);
	$stmt->execute();
?>