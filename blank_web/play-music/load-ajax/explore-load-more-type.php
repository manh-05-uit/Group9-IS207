<?php include("../config/connect.php"); ?>
<?php $offset = $_POST['offset']; 
$stmt = $conn->prepare("select * from TheLoai limit 6 offset $offset");
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
	<div class="type-content text-warning">
		Không có thể loại
	</div>
</div>
<?php } ?>