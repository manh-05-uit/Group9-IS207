<?php include("../config/connect.php"); ?>
<?php $offset = $_POST['offset'];
$stmt = $conn->prepare("select * from Album limit 6 offset $offset");
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