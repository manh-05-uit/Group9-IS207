<?php include("../../config/connect.php"); ?>
<?php
$id = $_GET["id"];
$stmt = $conn->prepare("DELETE FROM LichSu WHERE MaUsr = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM Usr_Album WHERE MaUsr = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM Usr_BaiHat WHERE MaUsr = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM Usr_CaSi WHERE MaUsr = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM Usr WHERE MaUsr = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: ../usr-manage.php");
exit;
?>
