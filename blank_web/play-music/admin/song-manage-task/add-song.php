<?php include("../../config/connect.php"); ?>
<?php if (empty($_SESSION) || (!empty($_SESSION) && $_SESSION['role'] != "admin")) {
	header("Location: /play-music/log-in.php");
	exit();
} ?>
<?php $page_name="Thêm bài hát"; ?>
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $ten = $_POST['ten'];
    $luotphat = $_POST['luotphat'];
    $album = $_POST['album'];
	$stmt = $conn->prepare("select * from BaiHat where MaBaiHat = ?");
	$stmt->bind_param("s", $id);
	$stmt->execute();
	$result = $stmt->get_result();
	$songExist = ($result->num_rows > 0);
	
	$stmt = $conn->prepare("select * from Album where MaAlbum = ?");
	$stmt->bind_param("s", $album);
	$stmt->execute();
	$result = $stmt->get_result();
	$albumExist = ($result->num_rows > 0);
	
	if (!$songExist && $albumExist) { 
		// Xử lý upload ảnh
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
		
		
		$stmt = $conn->prepare("INSERT INTO baihat (MaBaiHat, TenBH, Picture, Audio, SoLuotPhat, MaAlbum) VALUES (?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssis", $id, $ten, $picPath, $audioPath, $luotphat, $album);
		$stmt->execute();
		header("Location: add-song.php?message=success");
		exit();
	} else {
		header("Location: add-song.php?message=fail");
		exit();
	}
}
?>
<?php include("../include/header.php");?>	
<?php include("../include/sidebar.php");?>
<div class="main-content">
	<span class="fa-solid fa-arrow-left"></span><span>&nbsp</span>
	<a href="../song-manage.php">Quay lại trang Quản lý bài hát</a><br><br>
	<h1>Thêm bài hát</h1>
    <form method="POST" enctype="multipart/form-data">
        Mã bài hát: <input type="text" name="id" required><br>
        Tên bài hát: <input type="text" name="ten" required><br>
		<div class="form-group">
			Ảnh đại diện: <input type="file" name="picture" required><br>
		</div>
		<div class="form-group">
        Audio: <input type="file" name="audio" required><br>
		</div>
		<div class="form-group">
        Số lượt phát: <input type="number" name="luotphat" value="0"><br>
		</div>
        Mã album: <input type="text" name="album"><br>
        <input type="submit" value="Thêm"/>
    </form>
	<br>
	<?php if (!empty($_GET) && $_GET['message'] == "fail") echo "<div class=\"text-warning\">Thêm không thành công</div>"; ?>
	<?php if (!empty($_GET) && $_GET['message'] == "success") echo "<div class=\"text-success\">Thêm thành công</div>"; ?>
</div>
<script>
	$(".menu").removeClass("menu-active");
	$(".song-menu").addClass("menu-active");
</script>
<?php include("../include/footer.php");?>