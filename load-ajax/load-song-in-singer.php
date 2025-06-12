<?php include("../config/connect.php"); ?>
<?php if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {?>

<?php $macs = $_GET['macs'];
$sql = "select * from CaSi where MaCaSi = '$macs'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) { ?>
	<div>
		<div class="singer-name-in-banner">
			<div style="margin-right: 10px; font-size: 200%; font-weight: bold;"><?php echo $row['TenCaSi']; ?></div>
			<div class="save-singer" data-macs="<?php echo $row['MaCaSi']; ?>">
				<?php if (!empty($_SESSION)) {
					$stmt = $conn->prepare("select * from Usr_CaSi where MaUsr = ? and MaCaSi = ?");
					$maUsr = $_SESSION['mausr'];
					$stmt->bind_param("is", $maUsr, $macs);
					$stmt->execute();
					$result2 = $stmt->get_result();
					if ($result2->num_rows > 0) { ?>
				<span style="font-size: 30px; color: var(--button-color);" class="fa-solid fa-heart"></span>
					<?php } else { ?>
				<span style="font-size: 30px;" class="fa-solid fa-heart"></span>
					<?php }
				} else { ?>
				<span style="font-size: 30px;" class="fa-solid fa-heart"></span>
				<?php } ?>
			</div>
		</div>
		<p style="padding: 10px;"><?php echo $row['GioiThieu']; ?><p>
	</div>
	<div class="banner"> 
		<img src="<?php echo $row['Banner']; ?>"/>
		<div class="banner-content">
			<div></div>
			<div></div>
		</div>
	</div>
<?php }
$stmt = $conn->prepare("select * from BaiHat as bh, BaiHat_CaSi as bh_cs where bh.MaBaiHat = bh_cs.MaBaiHat
and bh_cs.MaCaSi= ?");
$stmt->bind_param("s", $macs);
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
		$(".explore-menu").addClass("menu-active");
</script>

<?php } else { ?>
<?php $page_name = "Ca sĩ"; ?>
<?php include("../include/user/header.php");?>	
<?php include("../include/user/music-control.php");?>
<?php include("../include/user/sidebar.php");?>
<div class="main-content">

<?php $macs = $_GET['macs'];
$sql = "select * from CaSi where MaCaSi = '$macs'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) { ?>
	<div>
		<div class="singer-name-in-banner">
			<div style="margin-right: 10px; font-size: 200%; font-weight: bold;"><?php echo $row['TenCaSi']; ?></div>
			<div class="save-singer" data-macs="<?php echo $row['MaCaSi']; ?>">
				<?php if (!empty($_SESSION)) {
					$stmt = $conn->prepare("select * from Usr_CaSi where MaUsr = ? and MaCaSi = ?");
					$maUsr = $_SESSION['mausr'];
					$stmt->bind_param("is", $maUsr, $macs);
					$stmt->execute();
					$result2 = $stmt->get_result();
					if ($result2->num_rows > 0) { ?>
				<span style="font-size: 30px; color: var(--button-color);" class="fa-solid fa-heart"></span>
					<?php } else { ?>
				<span style="font-size: 30px;" class="fa-solid fa-heart"></span>
					<?php }
				} else { ?>
				<span style="font-size: 30px;" class="fa-solid fa-heart"></span>
				<?php } ?>
			</div>
		</div>
		<p style="padding: 10px;"><?php echo $row['GioiThieu']; ?><p>
	</div>
	<div class="banner"> 
		<img src="<?php echo $row['Banner']; ?>"/>
		<div class="banner-content">
			<div></div>
			<div></div>
		</div>
	</div>
<?php }
$stmt = $conn->prepare("select * from BaiHat as bh, BaiHat_CaSi as bh_cs where bh.MaBaiHat = bh_cs.MaBaiHat
and bh_cs.MaCaSi= ?");
$stmt->bind_param("s", $macs);
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
		$(".explore-menu").addClass("menu-active");
</script>

</div>
<?php include("../include/user/footer.php");?>	
<?php } ?>