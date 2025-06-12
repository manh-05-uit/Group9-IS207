<div class="sidebar">
	<div class="side-toggle-logo">
		<div class="logo">
			<a href="/play-music/index.php">
				<img src="/play-music/media/image/items/logo.png" width="150px"/>
			</a>
		</div>
	</div>
	<div class="side-menu">
		<ul>
			<li><a class="dashboard-menu menu" href="/play-music/admin/dashboard.php">Dashboard</a></li>
			<li><a class="song-menu menu" href="/play-music/admin/song-manage.php">Quản lý bài hát</a></li>
			<li><a class="singer-menu menu" href="/play-music/admin/singer-manage.php">Quản lý ca sĩ</a></li>
			<li><a class="link-song-singer-menu menu" href="/play-music/admin/song-singer-link.php">Liên kết bài hát ca sĩ</a></li>
			<li><a class="album-menu menu" href="/play-music/admin/album-manage.php">Quản lý Album</a></li>
			<li><a class="usr-menu menu" href="/play-music/admin/usr-manage.php">Quản lý người dùng</a></li>
			<?php if (isset($_SESSION['role']) && ($_SESSION["role"] == "admin" || $_SESSION["role"] == "user")) {?>
			<li><a href="../log-out.php">Đăng xuất</a></li>
			<?php } ?>
		</ul>
	</div>
</div>
<div class="column">