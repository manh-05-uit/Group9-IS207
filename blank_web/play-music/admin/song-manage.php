<?php include("../config/connect.php"); ?>
<?php if (empty($_SESSION) || (!empty($_SESSION) && $_SESSION['role'] != "admin")) {
	header("Location: /play-music/log-in.php");
	exit();
} ?>
<?php $page_name="Quản lý bài hát"; ?>
<?php include("include/header.php");?>	
<?php include("include/sidebar.php");?>
<div class="main-content">
	<h1>Danh sách bài hát</h1><br/>
	<span class="fa-solid fa-plus"></span><span>&nbsp</span>
    <a href="song-manage-task/add-song.php">Thêm bài hát mới</a><br><br>
	<table border="1" cellpadding="5">
		<thead>
			<tr>
				<th>Mã</th><th>Tên</th><th>Ảnh</th><th>Audio</th><th>Lượt phát</th><th>Album</th><th>Hành động</th>
			</tr>
		</thead>
		<tbody>
		<?php $result = $conn->query("SELECT * FROM baihat");
		while($row = $result->fetch_assoc()): ?>
		
			<tr>
				<td><?= $row['MaBaiHat'] ?></td>
				<td><?= $row['TenBH'] ?></td>
				<td><img src="<?= $row['Picture'] ?>" width="60"></td>
				<td><?php echo $row['Audio']; ?></td>
				<td><?= $row['SoLuotPhat'] ?></td>
				<td><?= $row['MaAlbum'] ?></td>
				<td>
					<a href="song-manage-task/edit-song.php?id=<?= $row['MaBaiHat'] ?>">Sửa</a> |
					<a href="song-manage-task/delete-song.php?id=<?= $row['MaBaiHat'] ?>">Xóa</a>
				</td>
			</tr>
		<?php endwhile; ?>
		</tbody>
	</table>
</div>
<script>
	$(".menu").removeClass("menu-active");
	$(".song-menu").addClass("menu-active");
</script>
<?php include("include/footer.php");?>	