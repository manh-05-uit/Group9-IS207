<?php include("config/connect.php"); ?>
<?php if (empty($_SESSION)) {
	header("Location: /play-music/log-in.php");
	exit();
}?>
<?php $page_name="Thư viện";?>
<?php if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {?>
<h1>Thư viện</h1>
<div class="tab-buttons">
	<button class="tab-button active" data-tab="lichsu">Lịch sử nghe</button>
	<button class="tab-button" data-tab="baihat">Bài hát</button>
	<button class="tab-button" data-tab="nghesi">Nghệ sĩ</button>
	<button class="tab-button" data-tab="album">Album</button>
</div>
<div class="tab-wrapper">
	<div class="tab-content active" id="lichsu">
    <h3>Lịch sử nghe</h3><br>
	<?php $stmt = $conn->prepare("select * from BaiHat as bh, LichSu as ls where bh.MaBaiHat = ls.MaBaiHat and ls.MaUsr = ? 
	order by Ngay desc limit 20");
	$maUsr = $_SESSION['mausr'];
	$stmt->bind_param("i", $maUsr);
	$stmt->execute();
	$result = $stmt->get_result();?>
<?php if ($result->num_rows > 0) { ?>
	<table>
		<thead>
			<tr>
				<th>Bài hát</th>
				<th>Ca Sĩ</th>
				<th>Album</th>
				<th>Ngày</th>
			</tr>
		</thead>
		<tbody>
<?php while ($row = $result->fetch_assoc()) { ?>
<?php $mabh = $row['MaBaiHat'];
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
		}
		$sql3 = "select TenAlbum from Album as al, BaiHat as bh where al.MaAlbum = bh.MaAlbum and bh.MaBaiHat = '$mabh'";
		$result_album = $conn->query($sql3);
		$i = 1;
		$number_rows = $result_album->num_rows;
		$album_list = "";
		while ($row_album = $result_album->fetch_assoc()) {
		  $album_list .= $row_album['TenAlbum'];
		  if ($i < $number_rows) {
			$album_list .= ", ";
			$i++;
		  }
		} ?>
			<tr class="music-playlist" data-src="<?php echo $row['Audio']; ?>" data-img="<?php echo $row['Picture']; ?>" data-title="<?php echo $row['TenBH'];?>" data-singer="<?php echo $song_singer; ?>" 
			data-mabaihat="<?php echo $row['MaBaiHat']; ?>">
				<td>
					<div style="display: flex;">
						<div style="padding-top: 5px;">
							<img src="<?php echo $row['Picture'];?>" width="40px" height="40px" style="border-radius: 5px;">
						</div>
						<div style="padding: 15px 0px 0px 10px;">
							<?php echo $row['TenBH']; ?>
						</div>
					</div>
					<div class="extra-info"><i><?php echo $song_singer; ?> - <?php echo $album_list; ?></i></div>
				</td>
				<td>
					<div style="padding-top: 15px;">
						<?php echo $song_singer; ?>
					</div>
				</td>
				<td><div style="padding-top: 15px;"><?php echo $album_list; ?></div></td>
				<td><div style="padding-top: 15px;"><?php echo $row['Ngay']; ?></div></td>
			</tr>
<?php }	?>
		</tbody>
	</table>
<?php }	?>
	</div>
	<div class="tab-content" id="baihat">
	<h3>Bài hát yêu thích</h3><br>
   <?php 
	$stmt = $conn->prepare("select * from BaiHat as bh, Usr_BaiHat as ubh where bh.MaBaiHat = ubh.MaBaiHat and ubh.MaUsr = ?");
	$maUsr = $_SESSION['mausr'];
	$stmt->bind_param("i", $maUsr);
	$stmt->execute();
	$result = $stmt->get_result();?>
<?php if ($result->num_rows > 0) { ?>
	<table>
		<thead>
			<tr>
				<th>Bài hát</th>
				<th>Ca Sĩ</th>
				<th>Album</th>
			</tr>
		</thead>
		<tbody>
<?php while ($row = $result->fetch_assoc()) { ?>
<?php $mabh = $row['MaBaiHat'];
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
		}
		$sql3 = "select TenAlbum from Album as al, BaiHat as bh where al.MaAlbum = bh.MaAlbum and bh.MaBaiHat = '$mabh'";
		$result_album = $conn->query($sql3);
		$i = 1;
		$number_rows = $result_album->num_rows;
		$album_list = "";
		while ($row_album = $result_album->fetch_assoc()) {
		  $album_list .= $row_album['TenAlbum'];
		  if ($i < $number_rows) {
			$album_list .= ", ";
			$i++;
		  }
		}		?>
			<tr class="music-playlist" data-src="<?php echo $row['Audio']; ?>" data-img="<?php echo $row['Picture']; ?>" data-title="<?php echo $row['TenBH'];?>" data-singer="<?php echo $song_singer; ?>" 
			data-mabaihat="<?php echo $row['MaBaiHat']; ?>">
				<td>
					<div style="display: flex;">
						<div style="padding-top: 5px;">
							<img src="<?php echo $row['Picture'];?>" width="40px" height="40px" style="border-radius: 5px;">
						</div>
						<div style="padding: 15px 0px 0px 10px;">
							<?php echo $row['TenBH']; ?>
						</div>
					</div>
					<div class="extra-info"><i><?php echo $song_singer; ?> - <?php echo $album_list; ?></i></div>
				</td>
				<td>
					<div style="padding-top: 15px;">
						<?php echo $song_singer; ?>
					</div>
				</td>
				<td><div style="padding-top: 15px;"><?php echo $album_list; ?></div></td>
			</tr>
<?php }	?>
		</tbody>
	</table>
<?php }	?>
	</div>
	<div class="tab-content" id="nghesi">
    <h3>Nghệ sĩ yêu thích</h3><br>
    <div class="singer-list">
<?php $stmt = $conn->prepare("select * from CaSi as cs, Usr_Casi as ucs where cs.MaCaSi = ucs.MaCaSi and ucs.MaUsr = ?");
		$maUsr = $_SESSION['mausr'];
		$stmt->bind_param("i", $maUsr);
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
			<div class="singer-content text-warning">Không có ca sĩ nào được tìm thấy</div>
		</div>				
		<?php } ?>
	</div>
	</div>
	<div class="tab-content" id="album">
    <h3>Album</h3><br>
    <div class="album-list">
		<?php 
$stmt = $conn->prepare("select * from Album as al, Usr_Album as ual where al.MaAlbum = ual.MaAlbum and ual.MaUsr = ?");
$maUsr = $_SESSION['mausr'];
$stmt->bind_param("i", $maUsr);
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
			<div class="album-content text-warning">Không có album nào được tìm thấy</div>
		</div>				
		<?php } ?>
	</div>
	</div>
</div>
<script>
	$(".tab-button").click(function() {
		const tabId = $(this).data("tab");

		// Đổi nút active
		$(".tab-button").removeClass("active");
		$(this).addClass("active");

		// Ẩn/hiện nội dung tab
		$(".tab-content").removeClass("active");
		$("#" + tabId).addClass("active");
	});
</script>
<script>
	$(window).scrollTop(0);
	$(".menu").removeClass("menu-active");
	$(".library-menu").addClass("menu-active");
</script>
<?php } else { ?>
<?php include("include/user/header.php");?>	
<?php include("include/user/music-control.php");?>
<?php include("include/user/sidebar.php");?>
<div class="main-content">
	<h1>Thư viện</h1>
	<div class="tab-buttons">
	<button class="tab-button active" data-tab="lichsu">Lịch sử nghe</button>
	<button class="tab-button" data-tab="baihat">Bài hát</button>
	<button class="tab-button" data-tab="nghesi">Nghệ sĩ</button>
	<button class="tab-button" data-tab="album">Album</button>
	</div>
	<div class="tab-wrapper">
		<div class="tab-content active" id="lichsu">
		<h3>Lịch sử nghe</h3><br>
	   <?php $stmt = $conn->prepare("select * from BaiHat as bh, LichSu as ls where bh.MaBaiHat = ls.MaBaiHat and ls.MaUsr = ?
	   order by Ngay desc limit 20");
	   $maUsr = $_SESSION['mausr'];
		$stmt->bind_param("i", $maUsr);
	$stmt->execute();
	$result = $stmt->get_result();?>
	<?php if ($result->num_rows > 0) { ?>
		<table>
			<thead>
				<tr>
					<th>Bài hát</th>
					<th>Ca Sĩ</th>
					<th>Album</th>
					<th>Ngày</th>
				</tr>
			</thead>
			<tbody>
	<?php while ($row = $result->fetch_assoc()) { ?>
	<?php $mabh = $row['MaBaiHat'];
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
			}
	$sql3 = "select TenAlbum from Album as al, BaiHat as bh where al.MaAlbum = bh.MaAlbum and bh.MaBaiHat = '$mabh'";
			$result_album = $conn->query($sql3);
			$i = 1;
			$number_rows = $result_album->num_rows;
			$album_list = "";
			while ($row_album = $result_album->fetch_assoc()) {
			  $album_list .= $row_album['TenAlbum'];
			  if ($i < $number_rows) {
				$album_list .= ", ";
				$i++;
			  }
			}		?>
				<tr class="music-playlist" data-src="<?php echo $row['Audio']; ?>" data-img="<?php echo $row['Picture']; ?>" data-title="<?php echo $row['TenBH'];?>" data-singer="<?php echo $song_singer; ?>" 
				data-mabaihat="<?php echo $row['MaBaiHat']; ?>">
					<td>
						<div style="display: flex;">
							<div style="padding-top: 5px;">
								<img src="<?php echo $row['Picture'];?>" width="40px" height="40px" style="border-radius: 5px;">
							</div>
							<div style="padding: 15px 0px 0px 10px;">
								<?php echo $row['TenBH']; ?>
							</div>
						</div>
						<div class="extra-info"><i><?php echo $song_singer; ?> - <?php echo $album_list; ?></i></div>
					</td>
					<td>
						<div style="padding-top: 15px;">
							<?php echo $song_singer; ?>
						</div>
					</td>
					<td><div style="padding-top: 15px;"><?php echo $album_list; ?></div></td>
					<td><div style="padding-top: 15px;"><?php echo $row['Ngay']; ?></div></td>
				</tr>
	<?php }	?>
			</tbody>
		</table>
	<?php }	?>
	  </div>
	  <div class="tab-content" id="baihat">
	  <h3>Bài hát yêu thích</h3><br>
	   <?php 
	$stmt = $conn->prepare("select * from BaiHat as bh, Usr_BaiHat as ubh where bh.MaBaiHat = ubh.MaBaiHat and ubh.MaUsr = ?");
	   $maUsr = $_SESSION['mausr'];
		$stmt->bind_param("i", $maUsr);
	$stmt->execute();
	$result = $stmt->get_result();?>
	<?php if ($result->num_rows > 0) { ?>
		<table>
			<thead>
				<tr>
					<th>Bài hát</th>
					<th>Ca Sĩ</th>
					<th>Album</th>
				</tr>
			</thead>
			<tbody>
	<?php while ($row = $result->fetch_assoc()) { ?>
	<?php $mabh = $row['MaBaiHat'];
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
			}
	$sql3 = "select TenAlbum from Album as al, BaiHat as bh where al.MaAlbum = bh.MaAlbum and bh.MaBaiHat = '$mabh'";
			$result_album = $conn->query($sql3);
			$i = 1;
			$number_rows = $result_album->num_rows;
			$album_list = "";
			while ($row_album = $result_album->fetch_assoc()) {
			  $album_list .= $row_album['TenAlbum'];
			  if ($i < $number_rows) {
				$album_list .= ", ";
				$i++;
			  }
			}		?>
				<tr class="music-playlist" data-src="<?php echo $row['Audio']; ?>" data-img="<?php echo $row['Picture']; ?>" data-title="<?php echo $row['TenBH'];?>" data-singer="<?php echo $song_singer; ?>" 
				data-mabaihat="<?php echo $row['MaBaiHat']; ?>">
					<td>
						<div style="display: flex;">
							<div style="padding-top: 5px;">
								<img src="<?php echo $row['Picture'];?>" width="40px" height="40px" style="border-radius: 5px;">
							</div>
							<div style="padding: 15px 0px 0px 10px;">
								<?php echo $row['TenBH']; ?>
							</div>
						</div>
						<div class="extra-info"><i><?php echo $song_singer; ?> - <?php echo $album_list; ?></i></div>
					</td>
					<td>
						<div style="padding-top: 15px;">
							<?php echo $song_singer; ?>
						</div>
					</td>
					<td><div style="padding-top: 15px;"><?php echo $album_list; ?></div></td>
				</tr>
	<?php }	?>
			</tbody>
		</table>
	<?php }	?>
		</div>
		<div class="tab-content" id="nghesi">
		<h3>Nghệ sĩ yêu thích</h3><br>
		<div class="singer-list">
	<?php $stmt = $conn->prepare("select * from CaSi as cs, Usr_Casi as ucs where cs.MaCaSi = ucs.MaCaSi and ucs.MaUsr = ?");
			$maUsr = $_SESSION['mausr'];
			$stmt->bind_param("i", $maUsr);
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
				<div class="singer-content text-warning">Không có ca sĩ nào được tìm thấy</div>
			</div>				
			<?php } ?>
		</div>
		</div>
		<div class="tab-content" id="album">
		<h3>Album</h3><br>
		<div class="album-list">
			<?php 
	$stmt = $conn->prepare("select * from Album as al, Usr_Album as ual where al.MaAlbum = ual.MaAlbum and ual.MaUsr = ?");
	$maUsr = $_SESSION['mausr'];
	$stmt->bind_param("i", $maUsr);
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
				<div class="album-content text-warning">Không có album nào được tìm thấy</div>
			</div>				
			<?php } ?>
		</div>
	</div>
</div>
<script>
	$(".tab-button").click(function() {
		const tabId = $(this).data("tab");

		// Đổi nút active
		$(".tab-button").removeClass("active");
		$(this).addClass("active");

		// Ẩn/hiện nội dung tab
		$(".tab-content").removeClass("active");
		$("#" + tabId).addClass("active");
	});
</script>	
<script>
	$(window).scrollTop(0);
	$(".menu").removeClass("menu-active");
	$(".library-menu").addClass("menu-active");
</script>
</div>
<?php include("include/user/footer.php");?>	
<?php } ?>