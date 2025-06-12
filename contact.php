<?php include("config/connect.php");
$page_name="Liên hệ";?>
<?php if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {?>
<h1>Liên hệ</h1>
<p style="margin-top: 10px;">Các thành viên của nhóm<p>
<div class="contact-list">
	<div class="contact-card">
		<div class="contact-picture">
			<img src="media/image/items/contact-image-4.png">
		</div>
		<div class="contact-content">
			<p>Nguyễn Tấn Mạnh</p>
			<p>MSSV: 23520916</p>
		</div>
	</div>
	<div class="contact-card">
		<div class="contact-picture">
			<img src="media/image/items/contact-image-2.png">
		</div>
		<div class="contact-content">
			<p>Nguyễn Lê Bảo Anh</p>
			<p>MSSV: 23520061</p>
		</div>
	</div>
	<div class="contact-card">
		<div class="contact-picture">
			<img src="media/image/items/contact-image-3.png">
		</div>
		<div class="contact-content">
			<p>Trần Bảo Hiếu</p>
			<p>MSSV: 23520493</p>
		</div>
	</div>
	<div class="contact-card">
		<div class="contact-picture">
			<img src="media/image/items/contact-image-1.png">
		</div>
		<div class="contact-content">
			<p>Lê Cao Trí</p>
			<p>MSSV: 23521638</p>
		</div>
	</div>
</div>
<p style="margin-top: 10px;">Chúng tôi là những sinh viên đến từ UIT<p>
<div align="center" style="padding: 10px;">
	<img class="image-in-simple-site" src="media/image/items/contact-image-bg.png" style="border-radius: 10px; width: 65%">
</div>
<script>
	$(window).scrollTop(0);
	$(".menu").removeClass("menu-active");
	$(".contact-menu").addClass("menu-active");
</script>
<?php } else { ?>
<?php include("include/user/header.php");?>	
<?php include("include/user/music-control.php");?>
<?php include("include/user/sidebar.php");?>
<div class="main-content">	
	<h1>Liên hệ</h1>
	<p style="margin-top: 10px;">Các thành viên của nhóm<p>
	<div class="contact-list">
		<div class="contact-card">
			<div class="contact-picture">
				<img src="media/image/items/contact-image-4.png">
			</div>
			<div class="contact-content">
				<p>Nguyễn Tấn Mạnh</p>
				<p>MSSV: 23520916</p>
			</div>
		</div>
		<div class="contact-card">
			<div class="contact-picture">
				<img src="media/image/items/contact-image-2.png">
			</div>
			<div class="contact-content">
				<p>Nguyễn Lê Bảo Anh</p>
				<p>MSSV: 23520061</p>
			</div>
		</div>
		<div class="contact-card">
			<div class="contact-picture">
				<img src="media/image/items/contact-image-3.png">
			</div>
			<div class="contact-content">
				<p>Trần Bảo Hiếu</p>
				<p>MSSV: 23520493</p>
			</div>
		</div>
		<div class="contact-card">
			<div class="contact-picture">
				<img src="media/image/items/contact-image-1.png">
			</div>
			<div class="contact-content">
				<p>Lê Cao Trí</p>
				<p>MSSV: 23521638</p>
			</div>
		</div>
	</div>
	<p style="margin-top: 10px;">Chúng tôi là những sinh viên đến từ UIT<p>
	<div align="center" style="padding: 10px;">
		<img class="image-in-simple-site" src="media/image/items/contact-image-bg.png" style="border-radius: 10px;">
	</div>
	<script>
		$(window).scrollTop(0);
		$(".menu").removeClass("menu-active");
		$(".contact-menu").addClass("menu-active");
	</script>	
</div>
<?php include("include/user/footer.php");?>	
<?php } ?>