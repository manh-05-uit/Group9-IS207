<?php include("../config/connect.php") ?>
<?php 
$offset = $_POST['offset'];
$sql = "SELECT * FROM BaiHat order by SoLuotPhat desc LIMIT 6 offset {$offset}";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
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
	} ?>
<div class="music-card music-playlist" data-src="<?php echo $row['Audio']; ?>" data-img="<?php echo $row['Picture']; ?>" data-title="<?php echo $row['TenBH'];?>" data-singer="<?php echo $song_singer; ?>" 
data-mabaihat=<?php echo $row['MaBaiHat']; ?>>
	<div class="music-card-picture">
		<img src="<?php echo $row['Picture']; ?>" width="100%" />
	</div>
	<div class="music-card-content">
		<div class="song-title"><?php echo $row['TenBH']; ?></div>
		<div class="song-singer"><?php echo $song_singer; ?></div>
		<div class="view"><?php echo $row['SoLuotPhat']; ?> lượt phát</div>
	</div>
</div>
<?php }
}  else { ?>
<div class="music-card" style="padding: 10px">
	<div class="text-warning">Bạn đã xem hết tất cả bài hát trong CSDL của chúng tôi</div>
</div>
<?php } ?>
