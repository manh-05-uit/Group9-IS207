<?php include("../../config/connect.php"); ?>
<?php if (empty($_SESSION) || (!empty($_SESSION) && $_SESSION['role'] != "admin")) {
	header("Location: /play-music/log-in.php");
	exit();
} ?>
<?php $page_name="Thêm người dùng"; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $hoten = $_POST["hoten"];
    $gioitinh = $_POST["gioitinh"];
    $ngaysinh = $_POST["ngaysinh"];

    $avatar = '';
    if ($_FILES["avatar"]["name"]) {
        $avatar = 'media/image/avatar/' . basename($_FILES["avatar"]["name"]);
        move_uploaded_file($_FILES["avatar"]["tmp_name"], "../../$avatar");
		$avatar = '/play-music/' . $avatar; 
    }

    $stmt = $conn->prepare("INSERT INTO usr (Username, Password, Role, Avatar, HoTen, GioiTinh, NgaySinh) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $username, $password, $role, $avatar, $hoten, $gioitinh, $ngaysinh);
    $stmt->execute();
    header("Location: add-usr.php?message=success");
    exit();
}
?>
<?php include("../include/header.php");?>	
<?php include("../include/sidebar.php");?>
<div class="main-content">
	<span class="fa-solid fa-arrow-left"></span><span>&nbsp</span>
	<a href="../usr-manage.php">Quay lại trang Quản lý người dùng</a><br><br>
    <h1>Thêm người dùng</h1>
    <form method="POST" enctype="multipart/form-data">
        Username: <input type="text" name="username" required><br>
        Mật khẩu: <input type="password" name="password" required><br>
        Vai trò:
        <select name="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select><br>
        Họ tên: <input type="text" name="hoten"><br>
        Giới tính:
        <select name="gioitinh">
            <option value="">-- chọn --</option>
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select><br>
		<div class="form-group" style="margin-top: 10px;">
        Ngày sinh: <input type="date" name="ngaysinh">
		</div>
		<div class="form-group">
        Ảnh đại diện: <input type="file" name="avatar">
		</div>
        <input type="submit" value="Thêm">
    </form>
	<br>
	<?php if (!empty($_GET) && $_GET['message'] == "fail") echo "<div class=\"text-warning\">Thêm không thành công</div>"; ?>
	<?php if (!empty($_GET) && $_GET['message'] == "success") echo "<div class=\"text-success\">Thêm thành công</div>"; ?>
</div>
<script>
	$(".menu").removeClass("menu-active");
	$(".usr-menu").addClass("menu-active");
</script>
<?php include("../include/footer.php");?>
