<?php include("../../config/connect.php"); ?>
<?php if (empty($_SESSION) || (!empty($_SESSION) && $_SESSION['role'] != "admin")) {
	header("Location: /play-music/log-in.php");
	exit();
} ?>
<?php $page_name="Thêm ca sĩ"; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $ten = $_POST['ten'];
    $gt = $_POST['gt'];
	
	$stmt = $conn->prepare("select * from CaSi where MaCaSi = ?");
	$stmt->bind_param("s", $id);
	$stmt->execute();
	$result = $stmt->get_result();
	$singerExist = ($result->num_rows > 0);
	if (!$singerExist) {
		$picPath = '';
		if ($_FILES['picture']['name']) {
			$picPath = 'media/image/singer/picture/' . basename($_FILES['picture']['name']);
			move_uploaded_file($_FILES['picture']['tmp_name'], "../../$picPath");
			$picPath = '/play-music/' . $picPath;
		}

		$bannerPath = '';
		if ($_FILES['banner']['name']) {
			$bannerPath = 'media/image/singer/banner/' . basename($_FILES['banner']['name']);
			move_uploaded_file($_FILES['banner']['tmp_name'], "../../$bannerPath");
			$bannerPath = '/play-music/' . $bannerPath;
		}

		$stmt = $conn->prepare("INSERT INTO casi (MaCaSi, TenCaSi, Picture, Banner, GioiThieu) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $id, $ten, $picPath, $bannerPath, $gt);
		$stmt->execute();
		header("Location: add-singer.php?message=success");
		exit;
	} else {
		header("Location: add-singer.php?message=fail");
		exit;
	}
}
?>
<?php include("../include/header.php");?>	
<?php include("../include/sidebar.php");?>
<div class="main-content">
	<span class="fa-solid fa-arrow-left"></span><span>&nbsp</span>
	<a href="../singer-manage.php">Quay lại trang Quản lý ca sĩ</a><br><br>
    <h2>Thêm ca sĩ</h2>
    <form method="POST" enctype="multipart/form-data">
        Mã ca sĩ: <input type="text" name="id" required><br>
        Tên ca sĩ: <input type="text" name="ten" required><br>
		<div class="form-group">
        Ảnh đại diện: <input type="file" name="picture" required>
		</div>
		<div class="form-group">
        Ảnh banner: <input type="file" name="banner" required>
		</div>
		<div class="form-group">
        Giới thiệu:
		</div>
		<div class="form-group">
			<textarea name="gt" rows="5" cols="50" required></textarea>
		</div>
        <input type="submit" value="Thêm">
    </form>
	<br>
	<?php if (!empty($_GET) && $_GET['message'] == "fail") echo "<div class=\"text-warning\">Thêm không thành công</div>"; ?>
	<?php if (!empty($_GET) && $_GET['message'] == "success") echo "<div class=\"text-success\">Thêm thành công</div>"; ?>
</div>
<script>
	$(".menu").removeClass("menu-active");
	$(".singer-menu").addClass("menu-active");
</script>
<?php include("../include/footer.php");?>
