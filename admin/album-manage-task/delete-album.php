<?php include("../../config/connect.php"); ?>
<?php
$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM LichSu WHERE MaBaiHat in (select MaBaiHat from BaiHat where MaAlbum = ?)");
$stmt->bind_param("s", $id);
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM BaiHat_CaSi WHERE MaBaiHat in (select MaBaiHat from BaiHat where MaAlbum = ?)");
$stmt->bind_param("s", $id);
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM BaiHat_BXH WHERE MaBaiHat in (select MaBaiHat from BaiHat where MaAlbum = ?)");
$stmt->bind_param("s", $id);
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM BaiHat_TheLoai WHERE MaBaiHat in (select MaBaiHat from BaiHat where MaAlbum = ?)");
$stmt->bind_param("s", $id);
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM Usr_BaiHat WHERE MaBaiHat in (select MaBaiHat from BaiHat where MaAlbum = ?)");
$stmt->bind_param("s", $id);
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM BaiHat WHERE MaAlbum = ?");
$stmt->bind_param("s", $id);
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM Usr_Album WHERE MaAlbum = ?");
$stmt->bind_param("s", $id);
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM Album WHERE MaAlbum = ?");
$stmt->bind_param("s", $id);
$stmt->execute();

header("Location: ../album-manage.php");
exit;
?>
