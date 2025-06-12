<?php
    include("config/connect.php");
	$page_name="Quên mật khẩu";
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
	$sticky_hoten = "";
	$sticky_username = "";
    if (!empty($_POST) && $_POST["submit"]=="Xác nhận") {
		$hoten = $_POST['hoten'];
        $username = $_POST['username'];
		$sticky_hoten = $hoten;
		$sticky_username = $username;
		$password = "";
		$stmt = $conn->prepare("select * from Usr where Username = ? and HoTen = ?");
		$stmt->bind_param("ss", $username, $hoten);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$forgot_password = $row["Password"];
			}
			$success = "Đây là mật khẩu của bạn: ";
		} else {
			$error = "Họ tên và tài khoản không đúng! Vui lòng thử lại.";
		}
    }
?>
<?php include("include/sign-up-and-log-in/header.php");?>
<div class="main-content-sign-up">
	<div class="form-sign-up">
		<h1 align="center">Quên mật khẩu</h1>
		<div style="margin-bottom: 20px;">
			<i>Hãy nhập thông tin chính xác và nhấn xác nhận để được cấp lại mật khẩu.</i>
		</div>
		<form action="forgot-password.php" method="post">
			<div class="form-group">
				<span>Họ tên</span><br/>
				<input type="text" required name="hoten" 
				value="<?php if (strlen($sticky_hoten) > 0) echo $sticky_hoten;?>" 
				placeholder="Họ tên" style="width:100%;"/>
			</div>
			<div class="form-group">
				<span>Tên đăng nhập</span><br/>
				<input type="text" required name="username" 
				value="<?php if (strlen($sticky_username) > 0) echo $sticky_username;?>" 
				placeholder="Tên đăng nhập" style="width:100%;"/>
			</div>
			<div class="form-group" align="center" style="width:100%;">
				<input type="submit" name="submit" value="Xác nhận"/>
			</div>
		</form>
		<div align="center" style="margin: 10px 0px;">
			<?php
				if (strlen($success) > 0) echo '<div class="text-success">' . $success . $forgot_password . '</div>';
				if (strlen($error) > 0) echo '<div class="text-warning">' . $error . '</div>';
			?>
		</div>
		<div align="center">
			Đã có mật khẩu. <a href="log-in.php">Quay về trang đăng nhập</a>
		</div>
		<div align="center">
			<a href="index.php">Quay về trang chủ</a><br/><br/>
			<i style="font-size: 0.75em;"><a href="#">Chính sách bảo mật</a> và <a href="#">Điều khoản dịch vụ</a><br></i>
		</div>
	</div>
</div>
<?php include("include/sign-up-and-log-in/footer.php");?>