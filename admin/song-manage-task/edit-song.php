<?php include("../../config/connect.php"); ?>
<?php if (empty($_SESSION) || (!empty($_SESSION) && $_SESSION['role'] != "admin")) {
	header("Location: /play-music/log-in.php");
	exit();
} ?>
<?php $page_name="Sửa thông tin bài hát"; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$id = $_POST['mabh'];
    $ten = $_POST['ten'];
    $luotphat = $_POST['luotphat'];
    $album = $_POST['album'];
	
	$stmt = $conn->prepare("select * from Album where MaAlbum = ?");
	$stmt->bind_param("s", $album);
	$stmt->execute();
	$result = $stmt->get_result();
	$albumExist = ($result->num_rows > 0);
	
	if ($albumExist) { 
		$picPath = '';
		if ($_FILES['picture']['name']) {
			$picPath = 'media/image/hit/picture/' . basename($_FILES['picture']['name']);
			move_uploaded_file($_FILES['picture']['tmp_name'], "../../$picPath");
			$picPath = '/play-music/' . $picPath;
		}

		// Xử lý upload audio
		$audioPath = '';
		if ($_FILES['audio']['name']) {
			$audioPath = 'media/audio/hit/' . basename($_FILES['audio']['name']);
			move_uploaded_file($_FILES['audio']['tmp_name'], "../../$audioPath");
			$audioPath = '/play-music/' . $audioPath;
		}

		$stmt = $conn->prepare("UPDATE baihat SET TenBH=?, Picture=?, Audio=?, SoLuotPhat=?, MaAlbum=? WHERE MaBaiHat=?");
		$stmt->bind_param("sssiss", $ten, $picPath, $audioPath, $luotphat, $album, $id);
		$stmt->execute();
		header("Location: edit-song.php?message=success&&id=" . $id);
		exit();
	} else {
		header("Location: edit-song.php?message=fail&&id=" .$id);
		exit();
	} 
}
?>
<?php include("../include/header.php");?>	
<?php include("../include/sidebar.php");?>
<div class="main-content">
	<?php
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM BaiHat WHERE MaBaiHat = ?");
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();?>
	<span class="fa-solid fa-arrow-left"></span><span>&nbsp</span>
	<a href="../song-manage.php">Quay lại trang Quản lý bài hát</a><br><br>
	<h1>Sửa thông tin bài hát</h1>
    <form method="POST" enctype="multipart/form-data">
		<input type="hidden" name="mabh" value="<?php echo $id; ?>"/>
        Tên bài hát: <input type="text" name="ten" value="<?php echo $row['TenBH']; ?>" required><br>
		<div class="form-group">
			Ảnh: <input type="file" name="picture" required> (Hiện tại: <?php echo $row['Picture']; ?>)<br>
		</div>
		<div class="form-group">
			Audio: <input type="file" name="audio" required> (Hiện tại: <?php echo $row['Audio']; ?>)<br>
		</div>
        Số lượt phát: <input type="number" name="luotphat" value="<?php echo $row['SoLuotPhat']; ?>"><br>
        Mã album: <input type="text" name="album" value="<?php echo $row['MaAlbum']; ?>"><br>
        <input type="submit" value="Cập nhập"/>
    </form>
	<br>
	<?php if (isset($_GET['message'])) {
		if ($_GET['message'] == "fail") {
			echo "<div class=\"text-warning\">Cập nhập không thành công</div>";
		}
	} ?>
	<?php if (isset($_GET['message'])) {
		if ($_GET['message'] == "success") {
			echo "<div class=\"text-success\">Cập nhập thành công</div>";
		}
	} ?>
</div>
<script>
	$(".menu").removeClass("menu-active");
	$(".song-menu").addClass("menu-active");
</script>
<?php include("../include/footer.php");?>