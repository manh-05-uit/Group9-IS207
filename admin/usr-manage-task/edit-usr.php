<?php include("../../config/connect.php"); ?>
<?php if (empty($_SESSION) || (!empty($_SESSION) && $_SESSION['role'] != "admin")) {
	header("Location: /play-music/log-in.php");
	exit();
} ?>
<?php $page_name="Sửa thông tin người dùng"; ?>
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = $_POST['maUsr'];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $hoten = $_POST["hoten"];
    $gioitinh = $_POST["gioitinh"];
    $ngaysinh = $_POST["ngaysinh"];

    $avatar = $user['Avatar'];
    if ($_FILES["avatar"]["name"]) {
        $avatar = 'media/image/avatar/' . basename($_FILES["avatar"]["name"]);
        move_uploaded_file($_FILES["avatar"]["tmp_name"], "../../$avatar");
		$avatar = '/play-music/' . $avatar; 
    }

    $stmt = $conn->prepare("UPDATE usr SET Username=?, Password=?, Role=?, Avatar=?, HoTen=?, GioiTinh=?, NgaySinh=? WHERE MaUsr=?");
    $stmt->bind_param("sssssssi", $username, $password, $role, $avatar, $hoten, $gioitinh, $ngaysinh, $id);
    $stmt->execute();
    header("Location: edit-usr.php?message=success&&id=" . $id);
    exit;
}
?>
<?php include("../include/header.php");?>	
<?php include("../include/sidebar.php");?>
<div class="main-content">
	<?php $id = $_GET["id"];
	$stmt = $conn->prepare("SELECT * FROM usr WHERE MaUsr = ?");
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$user = $stmt->get_result()->fetch_assoc();?>
	<span class="fa-solid fa-arrow-left"></span><span>&nbsp</span>
	<a href="../usr-manage.php">Quay lại trang Quản lý người dùng</a><br><br>
    <h2>Sửa thông tin người dùng</h2>
    <form method="POST" enctype="multipart/form-data">
		<input type="hidden" name="maUsr" value="<?php echo $id; ?>" />
        Username: <input type="text" name="username" value="<?= $user['Username'] ?>" required><br>
        Mật khẩu: <input type="text" name="password" value="<?= $user['Password'] ?>" required><br>
        Vai trò:
        <select name="role">
            <option value="user" <?= $user['Role'] == 'user' ? 'selected' : '' ?>>User</option>
            <option value="admin" <?= $user['Role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
        </select><br>
        Họ tên: <input type="text" name="hoten" value="<?= $user['HoTen'] ?>"><br>
        Giới tính:
        <select name="gioitinh">
            <option value="">-- chọn --</option>
            <option value="Nam" <?= $user['GioiTinh'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
            <option value="Nữ" <?= $user['GioiTinh'] == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
        </select><br>
		<div class="form-group" style="margin-top: 10px;">
        Ngày sinh: <input type="date" name="ngaysinh" value="<?= $user['NgaySinh'] ?>">
		</div>
		<div class="form-group">
        Ảnh đại diện: <input type="file" name="avatar"> (Hiện tại: <?= $user['Avatar'] ?>)
		</div>
        <input type="submit" value="Cập nhập"/>
    </form>
	<br>
	<?php if (isset($_GET['message'])) {
		if ($_GET['message'] == "fail") {
			echo "<div class=\"text-warning\">Cập nhập không thành công</div>";
		}
	} ?>
	<?php if (isset($_GET['message'])) {
		if ($_GET['message'] == "success") {
			echo "<div class=\"text-success\">Cập nhập thành công</div>";
		}
	} ?>
</div>
<script>
	$(".menu").removeClass("menu-active");
	$(".usr-menu").addClass("menu-active");
</script>
<?php include("../include/footer.php");?>
