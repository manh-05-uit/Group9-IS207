<?php include("../config/connect.php") ?>
<?php $offset = $_POST['offset'];
$stmt = $conn->prepare("select * from BangXepHang limit 6 offset $offset");
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
	<div class="text-warning" style="padding: 10px;">Bạn đã xem hết các bảng xếp hạng!</div>
</div>				
<?php } ?>