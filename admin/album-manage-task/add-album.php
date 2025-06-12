<?php include("../../config/connect.php"); ?>
<?php if (empty($_SESSION) || (!empty($_SESSION) && $_SESSION['role'] != "admin")) {
	header("Location: /play-music/log-in.php");
	exit();
} ?>
<?php $page_name="Thêm Album"; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $ten = $_POST['ten'];
    $gt = $_POST['gt'];
	$stmt = $conn->prepare("select * from Album where MaAlbum = ?");
	$stmt->bind_param("s", $id);
	$stmt->execute();
	$result = $stmt->get_result();
	$albumExist = ($result->num_rows > 0);
	if (!$albumExist) { 
		$picPath = '';
		if ($_FILES['picture']['name']) {
			$picPath = 'media/image/album/picture/' . basename($_FILES['picture']['name']);
			move_uploaded_file($_FILES['picture']['tmp_name'], "../../$picPath");
			$picPath = '/play-music/' . $picPath;
		}

		$bannerPath = '';
		if ($_FILES['banner']['name']) {
			$bannerPath = 'media/image/album/banner/' . basename($_FILES['banner']['name']);
			move_uploaded_file($_FILES['banner']['tmp_name'], "../../$bannerPath");
			$bannerPath = '/play-music/' . $bannerPath;
		}

		$stmt = $conn->prepare("INSERT INTO album (MaAlbum, TenAlbum, Picture, Banner, GioiThieu) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $id, $ten, $picPath, $bannerPath, $gt);
		$stmt->execute();
		header("Location: add-album.php?message=success");
		exit();
	} else {
		header("Location: add-album.php?message=fail");
		exit();
	}
}
?>
<?php include("../include/header.php");?>	
<?php include("../include/sidebar.php");?>
<div class="main-content">
	<span class="fa-solid fa-arrow-left"></span><span>&nbsp</span>
	<a href="../album-manage.php">Quay lại trang Quản lý Album</a><br><br>
    <h1>Thêm album</h1>
    <form method="POST" enctype="multipart/form-data">
        Mã album: <input type="text" name="id" required><br>
        Tên album: <input type="text" name="ten" required><br>
		<div class="form-group">
        Ảnh đại diện: <input type="file" name="picture">
		</div>
		<div class="form-group">
        Ảnh banner: <input type="file" name="banner">
		</div>
        Giới thiệu:
		<div class="form-group" style="margin-top: 5px;">
        <textarea name="gt" rows="5" cols="50"></textarea>
		</div>
        <input type="submit" value="Thêm">
    </form>
	<br>
	<?php if (!empty($_GET) && $_GET['message'] == "fail") echo "<div class=\"text-warning\">Thêm không thành công</div>"; ?>
	<?php if (!empty($_GET) && $_GET['message'] == "success") echo "<div class=\"text-success\">Thêm thành công</div>"; ?>
</div>
<script>
	$(".menu").removeClass("menu-active");
	$(".album-menu").addClass("menu-active");
</script>
<?php include("../include/footer.php");?>
