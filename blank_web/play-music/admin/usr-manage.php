<?php include("../config/connect.php"); ?>
<?php if (empty($_SESSION) || (!empty($_SESSION) && $_SESSION['role'] != "admin")) {
	header("Location: /play-music/log-in.php");
	exit();
} ?>
<?php $page_name="Quản lý người dùng"; ?>
<?php include("include/header.php");?>	
<?php include("include/sidebar.php");?>
<div class="main-content">
	<h1>Danh sách người dùng</h1><br/>
	<span class="fa-solid fa-plus"></span><span>&nbsp</span>
    <a href="usr-manage-task/add-usr.php">Thêm người dùng</a><br><br>
	<table border="1" cellpadding="5">
		<thead>
			<tr>
				<th>ID</th><th>Username</th><th>Họ tên</th><th>Ảnh</th><th>Giới tính</th><th>Ngày sinh</th><th>Vai trò</th><th>Hành động</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		$maUsr = $_SESSION['mausr'];
		$stmt=$conn->prepare("select * from Usr where MaUsr <> ?");
		$stmt->bind_param("i", $maUsr);
		$stmt->execute();
		$result = $stmt->get_result();
		while($row = $result->fetch_assoc()): ?>
		
			<tr>
				<td><?= $row['MaUsr'] ?></td>
				<td><?= $row['Username'] ?></td>
				<td><?= $row['HoTen'] ?></td>
				<td><img src="<?= $row['Avatar'] ?>" width="60" style="border-radius: 50%;"></td>
				<td><?= $row['GioiTinh'] ?></td>
				<td><?= $row['NgaySinh'] ?></td>
				<td><?= $row['Role'] ?></td>
				<td>
					<a href="usr-manage-task/edit-usr.php?id=<?= $row['MaUsr'] ?>">Sửa</a> |
					<a href="usr-manage-task/delete-usr.php?id=<?= $row['MaUsr'] ?>">Xóa</a>
				</td>
			</tr>
		<?php endwhile; ?>
		</tbody>
	</table>
</div>
<script>
	$(".menu").removeClass("menu-active");
	$(".usr-menu").addClass("menu-active");
</script>
<?php include("include/footer.php");?>	
