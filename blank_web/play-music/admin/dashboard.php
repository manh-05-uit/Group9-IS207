<?php include("../config/connect.php"); ?>
<?php if (empty($_SESSION) || (!empty($_SESSION) && $_SESSION['role'] != "admin")) {
	header("Location: /play-music/log-in.php");
	exit();
} ?>
<?php $page_name="Dashboard"; ?>
<?php include("include/header.php");?>	
<?php include("include/sidebar.php");?>
<div class="main-content">
	<?php
		$maUsr = $_SESSION['mausr'];
		$stmt = $conn->prepare("select * from Usr where MaUsr = ?");
		$stmt->bind_param("i", $maUsr);
		$stmt->execute();
		$result = $stmt->get_result();
		while ($row = $result->fetch_assoc()) {
			echo "<h1>Chào mừng quản trị viên <i>{$row['HoTen']}</i> đã quay trở lại</h1>";
		}
	?>
	<br/>
	<div align="center">
		<img src="/play-music/media/image/items/about-us-image-1.png" style="border-radius: 20px;"/>
	</div>
</div>
<script>
	$(".menu").removeClass("menu-active");
	$(".dashboard-menu").addClass("menu-active");
</script>
<?php include("include/footer.php");?>	