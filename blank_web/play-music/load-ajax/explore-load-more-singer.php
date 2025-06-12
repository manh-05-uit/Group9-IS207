<?php include("../config/connect.php"); ?>
<?php $offset = $_POST['offset'];
$stmt = $conn->prepare("select * from CaSi limit 6 offset $offset");
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