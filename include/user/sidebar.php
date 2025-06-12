<div class="sidebar">
	<div class="side-toggle-logo">
		<div class="toggle">
			<span class="fa-solid fa-bars" style="font-size: 30px;"><span>
		</div>
		<div class="logo" onclick="loadSite('index.php');">
			<a>
				<img src="/play-music/media/image/items/logo.png" width="150px"/>
			</a>
		</div>
	</div>
	<div class="side-menu">
		<ul>
			<li><a class="index-menu menu" onclick="loadSite('index.php');"><span class="fa-solid fa-house" style="margin-right:15px;"></span>Trang chủ</a></li>
			<li><a class="explore-menu menu" onclick="loadSite('explore.php');"><span class="fa-solid fa-compass" style="margin-right:15px;"></span> Khám phá</a></li>
			<?php if (isset($_SESSION['role']) && ($_SESSION["role"] == "admin" || $_SESSION["role"] == "user")) {?>
			<li><a class="library-menu menu" onclick="loadSite('library.php');"><span class="fa-solid fa-heart" style="margin-right:15px;"></span> Thư viên</a></li>
			<?php } ?>
			<li class="small-screen-menu"><a class="about-us-menu menu" onclick="loadSite('about-us.php');"><span class="fa-solid fa-globe" style="margin-right:15px;"></span> Về chúng tôi</a></li>
			<li class="small-screen-menu"><a class="contact-menu menu" onclick="loadSite('contact.php');"><span class="fa-solid fa-phone" style="margin-right:15px;"></span> Liên hệ</a></li>
			<?php if (isset($_SESSION['role']) && ($_SESSION["role"] == "admin" || $_SESSION["role"] == "user")) {?>
			<li><a href="log-out.php"><span class="fa-solid fa-person-running" style="margin-right:15px;"></span> Đăng xuất</a></li>
			<?php } ?>
			<?php if (!isset($_SESSION['role'])) {?>
			<li class="small-screen-menu"><a href="log-in.php"><span class="fa-solid fa-arrow-right-to-bracket" style="margin-right:15px;"></span> Đăng nhập</a></li>
			<li class="small-screen-menu"><a href="sign-up.php"><span class="fa-solid fa-user-plus" style="margin-right:15px;"></span> Đăng ký</a></li>
			<?php } ?>
		</ul>
	</div>
</div>
<div class="sidebar-collapse">
	<div class="side-collapse-toggle">
		<div class="toggle">
			<span class="fa-solid fa-bars" style="font-size: 30px;"><span>
		</div>
	</div>
	<div class="side-collapse-menu">
		<ul>
			<li><a class="index-menu menu" onclick="loadSite('index.php');"><span class="fa-solid fa-house" style="margin-right:15px;"></span></a></li>
			<li><a class="explore-menu menu" onclick="loadSite('explore.php');"><span class="fa-solid fa-compass" style="margin-right:15px;"></span></a></li>
			<?php if (isset($_SESSION['role']) && ($_SESSION["role"] == "admin" || $_SESSION["role"] == "user")) {?>
			<li><a class="library-menu menu" onclick="loadSite('library.php');"><span class="fa-solid fa-heart" style="margin-right:15px;"></span></a></li>
			<li><a href="log-out.php"><span class="fa-solid fa-person-running" style="margin-right:15px;"></span></a></li>
			<?php } ?>
		</ul>
	</div>
</div>
<div class="column">