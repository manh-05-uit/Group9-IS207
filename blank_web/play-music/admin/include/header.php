<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $page_name?></title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="/play-music/css/admin/style.css"/>
		<script src="/play-music/js/jquery.js"></script>
		<script src="https://kit.fontawesome.com/ea4bf411d0.js" crossorigin="anonymous"></script>
		<!--
		<script src="/play-music/js/user/storaged-theme.js"></script>
		<script src="/play-music/js/user/switch-theme.js"></script>
		-->
	</head>
	<body>
		<div class="nav-bar">
			<div class="top-toggle-logo">
				<div class="logo">
					<a href="/play-music/index.php">
						<img src="/play-music/media/image/items/logo.png" width="150px"/>
					</a>
				</div>
			</div>
			<div class="top-search">
			</div>
			<div class="top-menu">
			</div>
			<div class="top-button-login">
				<?php if (isset($_SESSION['role']) && ($_SESSION["role"] == "admin" || $_SESSION["role"] == "user")) {
					$sql = "select Avatar from Usr where Username = '{$_SESSION['username']}'";
					$result = $conn->query($sql);
					$avatar = "";
					while ($row = $result->fetch_assoc()) {
						$avatar = $row['Avatar'];
					}?>
				<div class="dark-mode">
				</div>
				<div class="login-item">			
					<img onclick="showLoginDropdownMenu();" src="<?php echo $avatar;?>" width="40px" style="border-radius: 50%;"/>
					<div class="login-dropdown-menu">
						<div class="login-account">
							<?php $username = $_SESSION['username'];
							$stmt = $conn->prepare("select HoTen from Usr where Username = ? limit 1");
							$stmt->bind_param("s", $username);
							$stmt->execute();
							$result = $stmt->get_result();
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) { ?>
								<div><img src="<?php echo $avatar;?>" width="40px" style="border-radius: 50%;"/></div>
								<div class="name"><?php echo $row["HoTen"];?></div>
								<?php }
							}?>
						</div>
						<ul>
							<li><a href="/play-music/index.php">Trang chủ</a><li>
							<li><a id="profile-menu" class="menu" href="/play-music/profile.php">Hồ sơ</a></li>
							<li><a href="/play-music/log-out.php">Đăng xuất</a><li>
						</ul>
						<div style="height:10px;">
							
						</div>
					</div>
					<script>
						function showLoginDropdownMenu() {
							$(".login-dropdown-menu").toggle();
						}
					</script>						
				</div>
				<div>
				</div>
				<?php } else { ?>
				<div class="dark-mode">
				</div>
				<div class="button-item">
					<input type="button" onclick="location.href='log-in.php'" class="button-secondary" value="Đăng nhập"/>
				</div>
				<div class="button-item">
					<input type="button" onclick="location.href='sign-up.php'" value="Đăng ký"/>
				</div>							
				<?php } ?>
			</div>
		</div>