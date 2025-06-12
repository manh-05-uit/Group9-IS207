<?php require '../config/connect.php';

$maUsr = $_SESSION['mausr'] ?? null;
$maBaiHat = $_POST['mabaihat'] ?? null;
if (!$maUsr || !$maBaiHat) {
    echo "error"; exit;
}

$stmt = $conn->prepare("SELECT 1 FROM Usr_BaiHat WHERE MaUsr = ? AND MaBaiHat = ?");
$stmt->bind_param("is", $maUsr, $maBaiHat);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $del = $conn->prepare("DELETE FROM Usr_BaiHat WHERE MaUsr = ? AND MaBaiHat = ?");
    $del->bind_param("is", $maUsr, $maBaiHat);
	$del->execute();
	echo "removed";
} else {
	$del = $conn->prepare("INSERT INTO Usr_BaiHat (MaUsr, MaBaiHat) VALUES (?, ?)");
    $del->bind_param("is", $maUsr, $maBaiHat);
	$del->execute();
	echo "added";
}
?>

