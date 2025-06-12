<?php include("../../config/connect.php"); ?>
<?php
$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM Usr_BaiHat WHERE MaBaiHat = ?");
$stmt->bind_param("s", $id);
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM BaiHat_TheLoai WHERE MaBaiHat = ?");
$stmt->bind_param("s", $id);
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM LichSu WHERE MaBaiHat = ?");
$stmt->bind_param("s", $id);
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM BaiHat_BXH WHERE MaBaiHat = ?");
$stmt->bind_param("s", $id);
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM BaiHat_CaSi WHERE MaBaiHat = ?");
$stmt->bind_param("s", $id);
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM BaiHat WHERE MaBaiHat = ?");
$stmt->bind_param("s", $id);
$stmt->execute();
header("Location: ../song-manage.php");
exit;
?>	