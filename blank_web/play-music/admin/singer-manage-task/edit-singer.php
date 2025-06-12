<?php include("../../config/connect.php"); ?>
<?php if (empty($_SESSION) || (!empty($_SESSION) && $_SESSION['role'] != "admin")) {
	header("Location: /play-music/log-in.php");
	exit();
} ?>
<?php $page_name="Sửa thông tin ca sĩ"; ?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$id = $_POST['macs'];
    $ten = $_POST['ten'];
    $gt = $_POST['gt'];

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

    $stmt = $conn->prepare("UPDATE casi SET TenCaSi=?, Picture=?, Banner=?, GioiThieu=? WHERE MaCaSi=?");
    $stmt->bind_param("sssss", $ten, $picPath, $bannerPath, $gt, $id);
    $stmt->execute();
    header("Location: edit-singer.php?message=success&&id=" . $id);
    exit();
}
?>
<?php include("../include/header.php");?>	
<?php include("../include/sidebar.php");?>
<div class="main-content">
<?php 
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM casi WHERE MaCaSi = ?");
$stmt->bind_param("s", $id);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc(); ?>
	<span class="fa-solid fa-arrow-left"></span><span>&nbsp</span>
	<a href="../singer-manage.php">Quay lại trang Quản lý ca sĩ</a><br><br>
    <h1>Sửa thông tin ca sĩ</h1>
    <form method="POST" enctype="multipart/form-data">
		<input type="hidden" name="macs" value="<?php echo $id; ?>"> 
        Tên ca sĩ: <input type="text" name="ten" value="<?= $row['TenCaSi'] ?>" required><br>
		<div class="form-group">
        Ảnh đại diện: <input type="file" name="picture"> (Hiện tại: <?= $row['Picture'] ?>)
		</div>
		<div class="form-group">
        Ảnh banner: <input type="file" name="banner"> (Hiện tại: <?= $row['Banner'] ?>)
		</div>
        Giới thiệu:<br>
		<div class="form-group" style="margin-top: 5px;">
			<textarea name="gt" rows="5" cols="50"><?= $row['GioiThieu'] ?></textarea>
		</div>
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
	$(".singer-menu").addClass("menu-active");
</script>
<?php include("../include/footer.php");?>
