<?php include("config/connect.php");
$page_name="Khám phá";?>
<?php if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {?>
<h1>Khám phá</h1><br>
	<h3>Thể loại</h3>
	<div class="type-list">
		<?php $stmt = $conn->prepare("select * from TheLoai limit 6 offset 0");
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) { ?>
		<div class="type-card" onclick="loadSite('load-ajax/load-song-in-type.php?matl=<?php echo $row['MaTheLoai']; ?>',
		{}, 'GET', true);">
			<div class="type-picture" style="background-color: <?php echo $row["Color"]; ?>;">
			</div>
			<div class="type-content">
			<?php echo $row["TenTheLoai"]; ?>
			</div>
		</div>		
			<?php }
		} else { ?>
		<div class="type-card">
			<div class="type-picture" style="background-color: #CCCCCC;">
			</div>
			<div class="type-content">
				Không có thể loại
			</div>
		</div>
		<?php } ?>
	</div> 
	<div align="center"><a onclick="loadMoreTypeAtExplore();">Xem thêm</a></div><br><br>
	<h3>Ca sĩ nổi bật</h3>
	<div class="singer-list">
		<?php $stmt = $conn->prepare("select * from CaSi limit 6 offset 0");
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) { 
			while ($row = $result->fetch_assoc()) { ?>
		<div class="singer-card" onclick="loadSite('load-ajax/load-song-in-singer.php?macs=<?php echo $row['MaCaSi']; ?>',
		{}, 'GET', true);">
			<div class="singer-picture">
				<img src="<?php echo $row["Picture"];?>">
			</div>
			<div class="singer-content"><?php echo $row["TenCaSi"]; ?></div>
		</div>		
			<?php }
		} else { ?>
		<div class="singer-card">
			<div class="singer-picture">
				<img src="" alt="Ảnh ca sĩ">
			</div>
			<div class="singer-content">Không có ca sĩ nào được tìm thấy</div>
		</div>				
		<?php } ?>
	</div>
	<div align="center"><a onclick="loadMoreSingerAtExplore();">Xem thêm</a></div><br><br>
	<h3>Album nổi bật</h3>
	<div class="album-list">
		<?php $stmt = $conn->prepare("select * from Album limit 6 offset 0");
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) { 
			while ($row = $result->fetch_assoc()) { ?>
		<div class="album-card" onclick="loadSite('load-ajax/load-song-in-album.php?maAlbum=<?php echo $row['MaAlbum']; ?>',
		{}, 'GET', true);">
			<div class="album-picture">
				<img src="<?php echo $row["Picture"];?>">
			</div>
			<div class="album-content"><?php echo $row["TenAlbum"]; ?></div>
		</div>		
			<?php }
		} else { ?>
		<div class="album-card">
			<div class="album-picture">
				<img src="" alt="Ảnh album">
			</div>
			<div class="album-content">Không có album nào được tìm thấy</div>
		</div>				
		<?php } ?>
	</div>
	<div align="center"><a onclick="loadMoreAlbumAtExplore();">Xem thêm</a></div><br><br>
	<script>
		offsetType = 6;
		offsetSinger = 6;
		offsetAlbum = 6;
		$(window).scrollTop(0);
		$(".menu").removeClass("menu-active");
		$(".explore-menu").addClass("menu-active");
	</script>	 
<?php } else { ?>
<?php include("include/user/header.php");?>	
<?php include("include/user/music-control.php");?>
<?php include("include/user/sidebar.php");?>
<div class="main-content">
	<h1>Khám phá</h1><br>
	<h3>Thể loại</h3>
	<div class="type-list">
		<?php $stmt = $conn->prepare("select * from TheLoai limit 6 offset 0");
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) { ?>
		<div class="type-card" onclick="loadSite('load-ajax/load-song-in-type.php?matl=<?php echo $row['MaTheLoai']; ?>',
		{}, 'GET', true);">
			<div class="type-picture" style="background-color: <?php echo $row["Color"]; ?>;">
			</div>
			<div class="type-content">
			<?php echo $row["TenTheLoai"]; ?>
			</div>
		</div>		
			<?php }
		} else { ?>
		<div class="type-card">
			<div class="type-picture" style="background-color: #CCCCCC;">
			</div>
			<div class="type-content">
				Không có thể loại
			</div>
		</div>
		<?php } ?>
	</div> 
	<div align="center"><a onclick="loadMoreTypeAtExplore();">Xem thêm</a></div><br><br>
	<h3>Ca sĩ nổi bật</h3>
	<div class="singer-list">
		<?php $stmt = $conn->prepare("select * from CaSi limit 6 offset 0");
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) { 
			while ($row = $result->fetch_assoc()) { ?>
		<div class="singer-card" onclick="loadSite('load-ajax/load-song-in-singer.php?macs=<?php echo $row['MaCaSi']; ?>',
		{}, 'GET', true);">
			<div class="singer-picture">
				<img src="<?php echo $row["Picture"];?>">
			</div>
			<div class="singer-content"><?php echo $row["TenCaSi"]; ?></div>
		</div>		
			<?php }
		} else { ?>
		<div class="singer-card">
			<div class="singer-picture">
				<img src="" alt="Ảnh ca sĩ">
			</div>
			<div class="singer-content">Không có ca sĩ nào được tìm thấy</div>
		</div>				
		<?php } ?>
	</div>
	<div align="center"><a onclick="loadMoreSingerAtExplore();">Xem thêm</a></div><br><br>
	<h3>Album nổi bật</h3>
	<div class="album-list">
		<?php $stmt = $conn->prepare("select * from Album limit 6 offset 0");
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) { 
			while ($row = $result->fetch_assoc()) { ?>
		<div class="album-card" onclick="loadSite('load-ajax/load-song-in-album.php?maAlbum=<?php echo $row['MaAlbum']; ?>',
		{}, 'GET', true);">
			<div class="album-picture">
				<img src="<?php echo $row["Picture"];?>">
			</div>
			<div class="album-content"><?php echo $row["TenAlbum"]; ?></div>
		</div>		
			<?php }
		} else { ?>
		<div class="album-card">
			<div class="album-picture">
				<img src="" alt="Ảnh album">
			</div>
			<div class="album-content">Không có album nào được tìm thấy</div>
		</div>				
		<?php } ?>
	</div>
	<div align="center"><a onclick="loadMoreAlbumAtExplore();">Xem thêm</a></div><br><br>
	<script>
		$(window).scrollTop(0);
		$(".menu").removeClass("menu-active");
		$(".explore-menu").addClass("menu-active");
	</script>	

</div>
<?php include("include/user/footer.php");?>	
<?php } ?>