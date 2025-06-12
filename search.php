<?php include("config/connect.php");
$page_name="Tìm kiếm";?>
<?php if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {?>
<h1>Trang tìm kiếm</h1><br>
<?php if (!empty($_GET['keyword'])) {
	$keyword = $_GET['keyword'];
	$savedKeyword = $keyword; ?>
	<h3>Kết quả tìm kiếm bài hát cho từ khóa "<i><?php echo $savedKeyword; ?>"</i></h3>
	<?php $keyword = '%' . $keyword . '%'; ?>
			<?php $stmt = $conn->prepare("SELECT * FROM BaiHat where TenBH like ? order by SoLuotPhat desc");
		$stmt->bind_param("s", $keyword);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) { ?>
    <div class="music-card-list" id="musicCardList">
		<?php while ($row = $result->fetch_assoc()) {
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
	<?php } else { ?>
			<div class="text-warning">Không tìm thấy bài hát cho từ khóa trên</div>
		<?php } ?>
	<br>
	<h3>Kết quả tìm kiếm ca sĩ cho từ khóa "<i><?php echo $savedKeyword; ?></i>"</h3>
	<?php $stmt = $conn->prepare("select * from CaSi where TenCaSi like ?");
		$stmt->bind_param("s", $keyword);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) { ?>
	<div class="singer-list"> 
			<?php while ($row = $result->fetch_assoc()) { ?>
		<div class="singer-card" onclick="loadSite('load-ajax/load-song-in-singer.php?macs=<?php echo $row['MaCaSi']; ?>',
		{}, 'GET', true);">
			<div class="singer-picture">
				<img src="<?php echo $row["Picture"];?>">
			</div>
			<div class="singer-content"><?php echo $row["TenCaSi"]; ?></div>
		</div>		
			<?php } ?>
			</div>
		<?php } else { ?>
			<div class="text-warning">Không tìm thấy ca sĩ cho từ khóa trên</div>		
		<?php } ?>
	</div>
<?php } ?>
<script>
	$(window).scrollTop(0);
	$(".menu").removeClass("menu-active");
</script> 
<?php } else { ?>
<?php include("include/user/header.php");?>	
<?php include("include/user/music-control.php");?>
<?php include("include/user/sidebar.php");?>
<div class="main-content">
<h1>Trang tìm kiếm</h1>
<?php if (!empty($_GET['keyword'])) {
    $keyword = '%' . $_GET['keyword'] . '%'; ?>
    <div class="music-card-list" id="musicCardList">
		<?php $stmt = $conn->prepare("SELECT * FROM BaiHat where TenBH like ? order by SoLuotPhat desc");
		$stmt->bind_param("s", $keyword);
		$stmt->execute();
		$result = $stmt->get_result();
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
<?php } ?>
<script>
	$(window).scrollTop(0);	
	$(".menu").removeClass("menu-active");
</script>
</div>
<?php include("include/user/footer.php");?>	
<?php } ?>