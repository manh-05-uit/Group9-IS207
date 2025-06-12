<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $page_name?></title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="/play-music/css/user/style.css"/>
		<script src="/play-music/js/jquery.js"></script>
		<script src="https://kit.fontawesome.com/ea4bf411d0.js" crossorigin="anonymous"></script>
		<script src="/play-music/js/user/storaged-theme.js"></script>
		<script src="/play-music/js/user/switch-theme.js"></script>
	</head>
	<body>
		<div class="search-sm-screen" >
			<div align="right" class="exit-search" style="font-size: 25px; padding: 5px 10px 0px 0px;">
				<span class="fa-solid fa-xmark"></span>
			</div>
			<div align="center">
				<input type="text" class="search-sm" placeholder="Tìm kiếm bài hát và ca sĩ" style="width: 90%;"/>
			</div>
			<div align="center">
				<input type="button" class="search-sm-go" value="Tìm" style="width: 30%;"/>
			</div>
		</div>
		<div class="nav-bar">
			<div class="top-toggle-logo">
				<div class="toggle">
					<span id="toggle-icon" class="fa-solid fa-bars" style="font-size: 30px;"><span>
				</div>
				<div class="logo" onclick="loadSite('index.php');">
					<a>
						<img src="/play-music/media/image/items/logo.png" width="150px"/>
					</a>
				</div>
			</div>
			<div class="top-search">
				<input type="text" class="search" placeholder="Tìm kiếm bài hát và ca sĩ"/>
				<div class="search-icon" align="right">
					<span class="fa-solid fa-search" style="font-size: 25px"></span>
				</div>
			</div>
			<div class="top-menu">
				<ul>
					<li><a class="about-us-menu menu" onclick="loadSite('about-us.php');">Về chúng tôi</a></li>
					<li><a class="contact-menu menu" onclick="loadSite('contact.php');">Liên hệ</a></li>
				</ul>
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
					<span class="fa-solid fa-sun" style="font-size: 25px"></span>
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
								<div class="name updated-account"><?php echo $row["HoTen"];?></div>
								<?php }
							}?>
						</div>
						<ul>
							<?php if (!empty($_SESSION) && $_SESSION['role'] == "admin") { ?>
							<li><a href="/play-music/admin/dashboard.php">Dashboard</a></li>
							<?php } ?>
							<li><a id="profile-menu" class="menu" onclick="loadSite('profile.php');">Hồ sơ</a></li>
							<li><a href="log-out.php">Đăng xuất</a><li>
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
					<span class="fa-solid fa-sun" style="font-size: 25px"></span>
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