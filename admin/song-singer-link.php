<?php include("../config/connect.php"); ?>
<?php if (empty($_SESSION) || (!empty($_SESSION) && $_SESSION['role'] != "admin")) {
	header("Location: /play-music/log-in.php");
	exit();
} ?>
<?php
	if (!empty($_POST)) {
		$mabh = $_POST['mabh'];
		$macs = $_POST['macs'];
		$stmt = $conn->prepare("select * from BaiHat_CaSi where MaBaiHat = ? and MaCaSi = ?");
		$stmt->bind_param("ss", $mabh, $macs);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result -> num_rows > 0) {
			$message="fail";
			header("Location: song-singer-link.php?message=fail");
			exit();
		} else {
			$stmt = $conn->prepare("select * from BaiHat where MaBaiHat = ?");
			$stmt->bind_param("s", $mabh);
			$stmt->execute();
			$result = $stmt->get_result();
			$songExist = ($result->num_rows > 0);
			$stmt = $conn->prepare("select * from CaSi where MaCaSi = ?");
			$stmt->bind_param("s", $macs);
			$stmt->execute();
			$result = $stmt->get_result();
			$singerExist = ($result->num_rows > 0);
			if ($songExist && $singerExist) {
				$stmt = $conn->prepare("insert into BaiHat_CaSi values (?, ?)");
				$stmt->bind_param("ss", $mabh, $macs);
				$stmt->execute();
				header("Location: song-singer-link.php?message=success");
				exit();
			} else {
				$message="fail";
				header("Location: song-singer-link.php?message=fail");
				exit();
			}
		}
	}
?>
<?php $page_name="Bài hát và ca sĩ"; ?>
<?php include("include/header.php");?>	
<?php include("include/sidebar.php");?>
<div class="main-content">
	<h1>Liên kết bài hát với ca sĩ</h1><br/>
	<form action="#" method="post">
		<div>Nhập mã bài hát</div>
		<input type="text" name="mabh" placeholder="Mã bài hát"/> <br>
		<div>Nhập mã ca sĩ</div>
		<input type="text" name="macs" placeholder="Mã ca sĩ"/> <br>
		<input type="submit" value="Gửi"/>
	</form>
	<br>
    <?php if (!empty($_GET) && $_GET['message'] == "fail") echo "<div class=\"text-warning\">Thêm không thành công</div>"; ?>
	<?php if (!empty($_GET) && $_GET['message'] == "success") echo "<div class=\"text-success\">Thêm thành công</div>"; ?>
</div>
<script>
	$(".menu").removeClass("menu-active");
	$(".link-song-singer-menu").addClass("menu-active");
</script>
<?php include("include/footer.php");?>	