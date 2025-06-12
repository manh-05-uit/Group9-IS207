<?php
	include("config/connect.php");
	$page_name="Đăng kí";
	if (isset($_SESSION['role'])) {
		if ($_SESSION["role"] == "admin") {
			header("Location: admin/dashboard.php");
			exit;
		}
		if ($_SESSION["role"] == "user") {
			header("Location: index.php");
			exit;
		}
	}
	$success = "";
	$error = "";
	$sticky_fullname = "";
	$sticky_username = "";
	$sticky_password = "";
	$sticky_repassword = "";
	if (!empty($_GET) && $_GET['success'] == 1) {
		$success = "Đăng ký thành công! <a href='log-in.php'>Đăng nhập ngay</a>";
	}
	if (!empty($_POST) && $_POST["submit"]=="Đăng ký") {
		$hoten = $_POST['fullname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		$sticky_fullname = $hoten;
		$sticky_username = $username;
		$sticky_password = $password;
		$sticky_repassword = $repassword;
		if ($password !== $repassword) {
			$error = "Mật khẩu nhập lại không khớp!";
		} else {
			$stmt = $conn->prepare("select * from Usr where Username = ?");
			$stmt->bind_param("s", $username);
			$stmt->execute();
			$result = $stmt->get_result();
			if ($result->num_rows > 0) {
				$error = "Tên đăng nhập đã tồn tại! Vui lòng thử lại.";
			} else {
				$stmt = $conn->prepare("insert into Usr (Username, Password, Role, Avatar, HoTen) VALUES (?, ?, ?, ?, ?)");
				$role = "user";
				$avatar = "/play-music/media/image/avatar/a0.png";
				$stmt->bind_param("sssss", $username, $password, $role, $avatar, $hoten);
				if ($stmt->execute()) {
					header('Location: sign-up.php?success=1');
					exit();
				} else {
					$error = "Có lỗi xảy ra, vui lòng thử lại.";
				}
			}
		}
	}
?>
<?php include("include/sign-up-and-log-in/header.php");?>
<div class="main-content-sign-up">
	<div class="form-sign-up">
		<h1 align="center">Đăng ký</h1>
		<div style="margin: 10px 0px;">
			<?php
				if (strlen($success) > 0) echo '<div class="text-success">' . $success . '</div>';
				if (strlen($error) > 0) echo '<div class="text-warning">' . $error . '</div>';
			?>
		</div>
		<form action="sign-up.php" method="post">
			<div class="form-group">
				<span>Họ tên</span><br/>
				<input type="text" required name="fullname" 
				value="<?php if (strlen($sticky_fullname) > 0) echo $sticky_fullname?>"
				placeholder="Họ tên" style="width:100%;"/>
			</div>				
			<div class="form-group">
				<span>Tên đăng nhập</span><br/>
				<input type="text" required name="username" 
				value="<?php if (strlen($sticky_username) > 0) echo $sticky_username?>"
				placeholder="Tên đăng nhập" style="width:100%;"/>
			</div>
			<div class="form-group">
				<span>Mật khẩu</span><br/>
				<input type="password" required name="password" 
				value="<?php if (strlen($sticky_password) > 0) echo $sticky_password?>"
				placeholder="Mật khẩu" style="width:100%;"/>
			</div>
			<div class="form-group">
				<span>Xác nhận mật khẩu</span><br/>
				<input type="password" required name="repassword" 
				value="<?php if (strlen($sticky_repassword) > 0) echo $sticky_repassword?>"
				placeholder="Xác nhận mật khẩu" style="width:100%;"/>
			</div>
			<div class="form-group" align="center" style="width:100%;">
				<input type="submit" name="submit" value="Đăng ký" />
			</div>
		</form>
		<div align="center">
			Bạn đã có tài khoản. <a href="log-in.php">Đăng nhập</a>
		</div>
		<div align="center">
			<a href="index.php">Quay về trang chủ</a><br/><br/>
			<i style="font-size: 0.75em;"><a href="#">Chính sách bảo mật</a> và <a href="#">Điều khoản dịch vụ</a><br></i>
		</div>
	</div>
</div>
<?php include("include/sign-up-and-log-in/footer.php");?>