<?php include("../config/connect.php");?>
<?php if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {?>
<?php $mabxh = $_GET['mabxh'];
$sql = "select * from BangXepHang where MaBXH = '$mabxh'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) { ?>

	<div class="banner"> 
		<img src="<?php echo $row['Banner']; ?>"/>
		<div class="banner-content">
			<div class="photo-in-sm-screen">
				<img src="<?php echo $row['Picture']; ?>">
			</div>
			<div style="padding-left: 10px;">
				<h1 style="margin-right: 10px;">Album <?php echo $row['TenBXH']; ?></h1>
				<p style="padding-right: 10px;"><?php echo $row['GioiThieu']; ?><p>
			</div>
		</div>
	</div>
	
<?php }
$stmt = $conn->prepare("select * from BaiHat as bh, BaiHat_BXH as bh_bxh where bh.MaBaiHat = bh_bxh.MaBaiHat
and bh_bxh.MaBXH = ? order by bh.SoLuotPhat desc");
$stmt->bind_param("s", $mabxh);
$stmt->execute();
$result = $stmt->get_result();?>
<?php if ($result->num_rows > 0) { ?>
	<table>
		<thead>
			<tr>
				<th>Bài hát</th>
				<th>Ca sĩ</th>
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
			<tr class="music-playlist" data-src="<?php echo $row['Audio']; ?>" data-img="<?php echo $row['Picture']; ?>" data-title="<?php echo $row['TenBH'];?>" data-singer="<?php echo $song_singer; ?>">
				<td>
					<div style="display: flex;">
						<div style="padding-top: 5px;">
							<img src="<?php echo $row['Picture'];?>" width="40px" height="40px" style="border-radius: 5px;">
						</div>
						<div style="padding: 15px 0px 0px 10px;">
							<?php echo $row['TenBH']; ?> - <?php echo $row['SoLuotPhat']; ?> lượt phát
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
<script>
		offsetType = 6;
		offsetSinger = 6;
		offsetAlbum = 6;
		$(window).scrollTop(0);
		$(".menu").removeClass("menu-active");
		$(".index-menu").addClass("menu-active");
</script>
<?php } else { ?>
<?php $page_name = "Bảng xếp hạng"; ?>
<?php include("../include/user/header.php");?>	
<?php include("../include/user/music-control.php");?>
<?php include("../include/user/sidebar.php");?>
<div class="main-content">
<?php $mabxh = $_GET['mabxh'];
$sql = "select * from BangXepHang where MaBXH = '$mabxh'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) { ?>

	<div class="banner"> 
		<img src="<?php echo $row['Banner']; ?>"/>
		<div class="banner-content">
			<div class="photo-in-sm-screen">
				<img src="<?php echo $row['Picture']; ?>">
			</div>
			<div style="padding-left: 10px;">
				<h1 style="margin-right: 10px;">Album <?php echo $row['TenBXH']; ?></h1>
				<p style="padding-right: 10px;"><?php echo $row['GioiThieu']; ?><p>
			</div>
		</div>
	</div>
	
<?php }
$stmt = $conn->prepare("select * from BaiHat as bh, BaiHat_BXH as bh_bxh where bh.MaBaiHat = bh_bxh.MaBaiHat
and bh_bxh.MaBXH = ? order by bh.SoLuotPhat desc");
$stmt->bind_param("s", $mabxh);
$stmt->execute();
$result = $stmt->get_result();?>
<?php if ($result->num_rows > 0) { ?>
	<table>
		<thead>
			<tr>
				<th>Bài hát</th>
				<th>Ca sĩ</th>
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
			<tr class="music-playlist" data-src="<?php echo $row['Audio']; ?>" data-img="<?php echo $row['Picture']; ?>" data-title="<?php echo $row['TenBH'];?>" data-singer="<?php echo $song_singer; ?>">
				<td>
					<div style="display: flex;">
						<div style="padding-top: 5px;">
							<img src="<?php echo $row['Picture'];?>" width="40px" height="40px" style="border-radius: 5px;">
						</div>
						<div style="padding: 15px 0px 0px 10px;">
							<?php echo $row['TenBH']; ?> - <?php echo $row['SoLuotPhat']; ?> lượt phát
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
<script>
		offsetType = 6;
		offsetSinger = 6;
		offsetAlbum = 6;
		$(window).scrollTop(0);
		$(".menu").removeClass("menu-active");
		$(".index-menu").addClass("menu-active");
</script>
</div>
<?php include("../include/user/footer.php");?>	
<?php } ?>