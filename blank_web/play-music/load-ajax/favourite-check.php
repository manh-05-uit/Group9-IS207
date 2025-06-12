<?php
require '../config/connect.php';

$maUsr = $_SESSION['mausr'] ?? null;
$maBaiHat = $_POST['mabaihat'] ?? null;

if (!$maUsr || !$maBaiHat) {
    echo "0"; exit;
}

$stmt = $conn->prepare("SELECT 1 FROM usr_baihat WHERE MaUsr = ? AND MaBaiHat = ?");
$stmt->bind_param("is", $maUsr, $maBaiHat);
$stmt->execute();
$result = $stmt->get_result();
echo ($result->num_rows > 0) ? "1" : "0";
?>