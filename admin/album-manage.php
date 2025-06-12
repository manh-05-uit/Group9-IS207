<?php include("../config/connect.php"); ?>
<?php if (empty($_SESSION) || (!empty($_SESSION) && $_SESSION['role'] != "admin")) {
	header("Location: /play-music/log-in.php");
	exit();
} ?>
<?php $page_name="Quản lý Album"; ?>
<?php include("include/header.php");?>	
<?php include("include/sidebar.php");?>
<div class="main-content">
	<h1>Danh sách album</h1><br>
    <span class="fa-solid fa-plus"></span><span>&nbsp</span>
	<a href="album-manage-task/add-album.php">Thêm album mới</a><br><br>
	<table border="1" cellpadding="5">
		<thead>
			<tr>
				<th>Mã</th><th>Tên</th><th>Ảnh</th><th>Banner</th><th>Giới thiệu</th><th>Hành động</th>
			</tr>
		</thead>
		<tbody>
		<?php $result = $conn->query("SELECT * FROM album");
		while($row = $result->fetch_assoc()): ?>
		
			<tr>
				<td><?= $row['MaAlbum'] ?></td>
				<td><?= $row['TenAlbum'] ?></td>
				<td><img src="<?= $row['Picture'] ?>" width="60"></td>
				<td><img src="<?= $row['Banner'] ?>" width="100"></td>
				<td><?= mb_substr($row['GioiThieu'], 0, 50) . '...' ?></td>
				<td>
					<a href="album-manage-task/edit-album.php?id=<?= $row['MaAlbum'] ?>">Sửa</a> |
					<a href="album-manage-task/delete-album.php?id=<?= $row['MaAlbum'] ?>">Xóa</a>
				</td>
			</tr>
		<?php endwhile; ?>
		</tbody>
	</table>
</div>
<script>
	$(".menu").removeClass("menu-active");
	$(".album-menu").addClass("menu-active");
</script>
<?php include("include/footer.php");?>
