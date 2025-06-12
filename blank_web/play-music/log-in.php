<?php
    include("config/connect.php");
	$page_name="Đăng nhập";
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
    $error = "";
	$sticky_username = "";
	$sticky_password = "";
    if (!empty($_POST) && $_POST["submit"]=="Đăng nhập") {
        $username = $_POST['username'];
        $password = $_POST['password'];
		$sticky_username = $username;
		$sticky_password = $password;
		$stmt = $conn->prepare("select * from Usr where Username = ? and Password = ?");
		$stmt->bind_param("ss", $username, $password);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$_SESSION['username'] = $row["Username"];
				$_SESSION['role'] = $row["Role"];
				$_SESSION['mausr'] = $row["MaUsr"];
			}
			if ($_SESSION["role"] == "admin") {
				header("Location: admin/dashboard.php");
				exit;
			}
			if ($_SESSION["role"] == "user") {
				header("Location: index.php");
				exit;
			}
		} else {
			$error = "Tài khoản và mật khẩu không đúng! Vui lòng thử lại.";
		}
    }
?>
<?php include("include/sign-up-and-log-in/header.php");?>
<div class="main-content-sign-up">
	<div class="form-sign-up">
		<h1 align="center">Đăng nhập</h1>
		<div style="margin: 10px 0px;">
			<?php
				if (strlen($error) > 0) echo '<div class="text-warning">' . $error . '</div>';
			?>
		</div>
		<form action="log-in.php" method="post">				
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
			<div class="form-group" align="right">
				<a href="forgot-password.php">Quên mật khẩu?</a>
			</div>
			<div class="form-group" align="center" style="width:100%;">
				<input type="submit" name="submit" value="Đăng nhập" />
			</div>
		</form>
		<div align="center">
			Bạn chưa có tài khoản. <a href="sign-up.php">Đăng ký</a>
		</div>
		<div align="center">
			<a href="index.php">Quay về trang chủ</a><br/><br/>
			<i style="font-size: 0.75em;"><a href="#">Chính sách bảo mật</a> và <a href="#">Điều khoản dịch vụ</a><br></i>
		</div>
	</div>
</div>
<?php include("include/sign-up-and-log-in/footer.php");?>