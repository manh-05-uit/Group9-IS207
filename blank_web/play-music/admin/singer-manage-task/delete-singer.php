<?php include("../../config/connect.php"); ?>
<?php
$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM Usr_CaSi WHERE MaCaSi = ?");
$stmt->bind_param("s", $id);
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM BaiHat_CaSi WHERE MaCaSi = ?");
$stmt->bind_param("s", $id);
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM CaSi WHERE MaCaSi = ?");
$stmt->bind_param("s", $id);
$stmt->execute();

header("Location: ../singer-manage.php");
exit;
?>
