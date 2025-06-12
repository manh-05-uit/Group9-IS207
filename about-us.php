<?php include("config/connect.php");
$page_name="Về chúng tôi";?>
<?php if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {?>
<h1>Về chúng tôi</h1>
<p style="margin-top: 10px;">Đến với website này của chúng tôi, bạn sẽ được bài nhạc tuyệt vời nhất, giúp bạn có thể thư giãn sau những giờ làm việc căng thẳng.<p>
<div align="center" style="padding: 10px;">
	<img class="image-in-simple-site" src="media/image/items/about-us-image-1.png" style="border-radius: 10px; width: 65%">
</div>
<p style="margin-top: 10px;">Sau khi đăng nhập, bạn có thể tạo những playlist bài hát yêu thích cho chính mình.<p>
<div align="center" style="padding: 10px;">
	<img class="image-in-simple-site" src="media/image/items/about-us-image-2.png" style="border-radius: 10px; width: 65%">
</div>
<p style="margin-top: 10px;">Nếu bạn vẫn chưa có tài khoản, hãy đăng ký nhé.<p>
<script>
	$(window).scrollTop(0);
	$(".menu").removeClass("menu-active");
	$(".about-us-menu").addClass("menu-active");
</script>
<?php } else { ?>
<?php include("include/user/header.php");?>	
<?php include("include/user/music-control.php");?>
<?php include("include/user/sidebar.php");?>
<div class="main-content">
	<h1>Về chúng tôi</h1>
	<p style="margin-top: 10px;">Đến với website này của chúng tôi, bạn sẽ được bài nhạc tuyệt vời nhất, giúp bạn có thể thư giãn sau những giờ làm việc căng thẳng.<p>
	<div align="center" style="padding: 10px;">
		<img class="image-in-simple-site" src="media/image/items/about-us-image-1.png" style="border-radius: 10px;">
	</div>
	<p style="margin-top: 10px;">Sau khi đăng nhập, bạn có thể tạo những playlist bài hát yêu thích cho chính mình.<p>
	<div align="center" style="padding: 10px;">
		<img class="image-in-simple-site" src="media/image/items/about-us-image-2.png" style="border-radius: 10px;">
	</div>
	<p style="margin-top: 10px;">Nếu bạn vẫn chưa có tài khoản, hãy đăng ký nhé.<p>
	<script>
		$(window).scrollTop(0);
		$(".menu").removeClass("menu-active");
		$(".about-us-menu").addClass("menu-active");
	</script>	
</div>
<?php include("include/user/footer.php");?>	
<?php } ?>