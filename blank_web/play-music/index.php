<?php include("config/connect.php");
$page_name="Trang chủ";?>
<?php if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {?>
	<h1 onclick="loadAboutUsSite();">Những bài hát thịnh hành</h1>
	<div class="music-card-list" id="musicCardList">
		<?php $sql = "SELECT * FROM BaiHat order by SoLuotPhat desc LIMIT 6";
		$result = $conn->query($sql);
		while ($row = $result->fetch_assoc()) {
			$mabh = $row['MaBaiHat'];
			$sql2 = "SELECT cs.TenCaSi FROM CaSi cs JOIN BaiHat_CaSi bhcs ON cs.MaCaSi = bhcs.MaCaSi WHERE bhcs.MaBaiHat = '$mabh'";
			$result_casi = $conn->query($sql2);
			$i = 1;
			$number_rows = $result_casi->num_rows;
			$song_singer = "";
			while ($row_casi = $result_casi->fetch_assoc()) {
			  $song_singer .= $row_casi['TenCaSi'];
			  if ($i < $number_rows) {
				$song_singer .= ", ";
				$i++;
			  }
			}?>
		<div class="music-card music-playlist" data-src="<?php echo $row['Audio']; ?>" data-img="<?php echo $row['Picture']; ?>" data-title="<?php echo $row['TenBH'];?>" data-singer="<?php echo $song_singer; ?>" 
		data-mabaihat=<?php echo $row['MaBaiHat']; ?>>
			<div class="music-card-picture">
				<img src="<?php echo $row['Picture']; ?>" width="100%" />
			</div>
			<div class="music-card-content">
				<div class="song-title"><?php echo $row['TenBH'] ?></div>
				<div class="song-singer"><?php echo $song_singer ?></div>
				<div class="view"><?php echo $row['SoLuotPhat']; ?> lượt phát</div>
			</div>
		</div>
	  <?php } ?>
	</div>
	<div align="center"><a onclick="loadMoreSongAtIndex();">Xem thêm</a></div>
	<h1>Bảng xếp hạng nổi bật</h1>
	<div class="chart-list">
		<?php $stmt = $conn->prepare("select * from BangXepHang limit 6 offset 0");
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) { 
			while ($row = $result->fetch_assoc()) { ?>
		<div class="chart-card" onclick="loadSite('load-ajax/load-song-in-chart.php?mabxh=<?php echo $row['MaBXH']; ?>', {}, 'GET', true);">
			<div class="chart-picture">
				<img src="<?php echo $row["Picture"];?>">
			</div>
			<div class="chart-content"><?php echo $row["TenBXH"]; ?></div>
		</div>		
			<?php }
		} else { ?>
		<div class="chart-card">
			<div class="chart-picture">
				<img src="" alt="Bảng xếp hạng">
			</div>
			<div class="chart-content">Không có bảng xếp hạng nào ở đây!</div>
		</div>				
		<?php } ?>
	</div>
	<div align="center"><a onclick="loadMoreChartAtIndex();">Xem thêm</a></div>
	<script>
		//offset
		offset = 6;
		offsetChart = 6;
		$(window).scrollTop(0);
		$(".menu").removeClass("menu-active");
		$(".index-menu").addClass("menu-active");
	</script>
<?php } else { ?>
<?php include("include/user/header.php");?>	
<?php include("include/user/music-control.php");?>
<?php include("include/user/sidebar.php");?>
<div class="main-content">
	<h1 onclick="loadAboutUsSite();">Những bài hát thịnh hành</h1>
	<div class="music-card-list" id="musicCardList">
		<?php $sql = "SELECT * FROM BaiHat order by SoLuotPhat desc LIMIT 6";
		$result = $conn->query($sql);
		while ($row = $result->fetch_assoc()) {
			$mabh = $row['MaBaiHat'];
			$sql2 = "SELECT cs.TenCaSi FROM CaSi cs JOIN BaiHat_CaSi bhcs ON cs.MaCaSi = bhcs.MaCaSi WHERE bhcs.MaBaiHat = '$mabh'";
			$result_casi = $conn->query($sql2);
			$i = 1;
			$number_rows = $result_casi->num_rows;
			$song_singer = "";
			while ($row_casi = $result_casi->fetch_assoc()) {
			  $song_singer .= $row_casi['TenCaSi'];
			  if ($i < $number_rows) {
				$song_singer .= ", ";
				$i++;
			  }
			}?>
		<div class="music-card music-playlist" data-src="<?php echo $row['Audio']; ?>" data-img="<?php echo $row['Picture']; ?>" data-title="<?php echo $row['TenBH'];?>" data-singer="<?php echo $song_singer; ?>" 
		data-mabaihat=<?php echo $row['MaBaiHat']; ?>>
			<div class="music-card-picture">
				<img src="<?php echo $row['Picture']; ?>" width="100%" />
			</div>
			<div class="music-card-content">
				<div class="song-title"><?php echo $row['TenBH'] ?></div>
				<div class="song-singer"><?php echo $song_singer ?></div>
				<div class="view"><?php echo $row['SoLuotPhat']; ?> lượt phát</div>
			</div>
		</div>
	  <?php } ?>
	</div>
	<div align="center"><a onclick="loadMoreSongAtIndex();">Xem thêm</a></div>
	<h1>Bảng xếp hạng nổi bật</h1>
	<div class="chart-list">
		<?php $stmt = $conn->prepare("select * from BangXepHang limit 6 offset 0");
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) { 
			while ($row = $result->fetch_assoc()) { ?>
		<div class="chart-card" onclick="loadSite('load-ajax/load-song-in-chart.php?mabxh=<?php echo $row['MaBXH']; ?>', {}, 'GET', true);">
			<div class="chart-picture">
				<img src="<?php echo $row["Picture"];?>">
			</div>
			<div class="chart-content"><?php echo $row["TenBXH"]; ?></div>
		</div>		
			<?php }
		} else { ?>
		<div class="chart-card">
			<div class="chart-picture">
				<img src="" alt="Bảng xếp hạng">
			</div>
			<div class="chart-content">Không có bảng xếp hạng nào ở đây!</div>
		</div>				
		<?php } ?>
	</div>
	<div align="center"><a onclick="loadMoreChartAtIndex();">Xem thêm</a></div>
	<script>
		$(window).scrollTop(0);
		$(".menu").removeClass("menu-active");
		$(".index-menu").addClass("menu-active");
	</script>
</div>
<?php include("include/user/footer.php");?>	
<?php } ?>