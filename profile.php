<?php include("config/connect.php"); ?>
<?php if (empty($_SESSION)) {
	header("Location: /play-music/log-in.php");
	exit();
} ?>
<?php $page_name="Hồ sơ"; ?>
<?php if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {?>
<h1>Hồ sơ của tôi</h1><br>
<div>
	<?php if (!empty($_SESSION)) {
		$maUsr = $_SESSION['mausr'];
		$stmt = $conn->prepare("select * from Usr where MaUsr = ? limit 1");
		$stmt->bind_param("i", $maUsr);
		$stmt->execute();
		$result = $stmt->get_result();
		while ($row = $result->fetch_assoc()) { ?>
	<div align="center">
		<img src="<?php echo $row['Avatar']; ?>" width="100px" style="border-radius: 50%;">
		<h3 style="margin: 10px 0px 0px 10px;"><?php echo $row['HoTen']; ?></h3>
	</div>
	<div class="profile-form">
		<form method="post">
			<div style="font-weight: bold;">Tên</div>
			<input type="text" name="ten" value="<?php echo $row['HoTen']; ?>" style="width: 100%";/>
			<div style="margin: 5px 0px 5px 0px;">
				<div style="font-weight: bold;">Giới tính</div>
				<?php if ($row['GioiTinh'] == "Nam") { ?>
				<input type="radio" name="gioi-tinh" value="Nam" checked /> Nam
				<input type="radio" name="gioi-tinh" value="Nữ" /> Nữ
				<input type="radio" name="gioi-tinh" value="Tùy chỉnh" /> Tùy chỉnh
				<?php } else if ($row['GioiTinh'] == "Nữ") { ?>
				<input type="radio" name="gioi-tinh" value="Nam" /> Nam
				<input type="radio" name="gioi-tinh" value="Nữ" checked /> Nữ
				<input type="radio" name="gioi-tinh" value="Tùy chỉnh" /> Tùy chỉnh
				<?php } else { ?> 
				<input type="radio" name="gioi-tinh" value="Nam" /> Nam
				<input type="radio" name="gioi-tinh" value="Nữ" /> Nữ
				<input type="radio" name="gioi-tinh" value="Tùy chỉnh" checked /> Tùy chỉnh
				<?php } ?> 
			</div>
			<div align="center" style="margin: 20px 0px 10px 0px;">
				<input type="button" onclick="updateProfile();" value="Cập nhập thông tin"/>
			</div>
		</form>
	</div>		
		<?php }
	} ?>
</div>
<script>
	$(window).scrollTop(0);
	$(".menu").removeClass("menu-active");
	$("#profile-menu").addClass("menu-active");
</script> 
<?php } else { ?>
<?php include("include/user/header.php");?>	
<?php include("include/user/music-control.php");?>
<?php include("include/user/sidebar.php");?>
<div class="main-content">
<h1>Hồ sơ của tôi</h1><br>
<div>
	<?php if (!empty($_SESSION)) {
		$maUsr = $_SESSION['mausr'];
		$stmt = $conn->prepare("select * from Usr where MaUsr = ? limit 1");
		$stmt->bind_param("i", $maUsr);
		$stmt->execute();
		$result = $stmt->get_result();
		while ($row = $result->fetch_assoc()) { ?>
	<div align="center">
		<img src="<?php echo $row['Avatar']; ?>" width="100px" style="border-radius: 50%;">
		<h3 style="margin: 10px 0px 0px 10px;"><?php echo $row['HoTen']; ?></h3>
	</div>
	<div class="profile-form">
		<form method="post">
			<div style="font-weight: bold;">Tên</div>
			<input type="text" name="ten" value="<?php echo $row['HoTen']; ?>" style="width: 100%";/>
			<div style="margin: 5px 0px 5px 0px;">
				<div style="font-weight: bold;">Giới tính</div>
				<?php if ($row['GioiTinh'] == "Nam") { ?>
				<input type="radio" name="gioi-tinh" value="Nam" checked /> Nam
				<input type="radio" name="gioi-tinh" value="Nữ" /> Nữ
				<input type="radio" name="gioi-tinh" value="Tùy chỉnh" /> Tùy chỉnh
				<?php } else if ($row['GioiTinh'] == "Nữ") { ?>
				<input type="radio" name="gioi-tinh" value="Nam" /> Nam
				<input type="radio" name="gioi-tinh" value="Nữ" checked /> Nữ
				<input type="radio" name="gioi-tinh" value="Tùy chỉnh" /> Tùy chỉnh
				<?php } else { ?> 
				<input type="radio" name="gioi-tinh" value="Nam" /> Nam
				<input type="radio" name="gioi-tinh" value="Nữ" /> Nữ
				<input type="radio" name="gioi-tinh" value="Tùy chỉnh" checked /> Tùy chỉnh
				<?php } ?> 
			</div>
			<div align="center" style="margin: 20px 0px 10px 0px;">
				<input type="button" onclick="updateProfile();" value="Cập nhập thông tin"/>
			</div>
		</form>
	</div>		
		<?php }
	} ?>
</div>
<script>
	$(window).scrollTop(0);
	$(".menu").removeClass("menu-active");
	$("#profile-menu").addClass("menu-active");
</script>	
</div>
<?php include("include/user/footer.php");?>	
<?php } ?>