<?php include("../config/connect.php"); ?>
<?php if (!empty($_POST) && !empty($_SESSION)) {
	$maUsr = $_SESSION["mausr"];
	$ten = $_POST["ten"];
	$gioitinh = $_POST["gioitinh"];
	$stmt = $conn->prepare("update Usr set HoTen = ?, GioiTinh = ? where MaUsr = ?");
	$stmt->bind_param("ssi", $ten, $gioitinh, $maUsr);
	$stmt->execute();
	if ($stmt->affected_rows > 0) {
		echo $ten;
	}
}?>