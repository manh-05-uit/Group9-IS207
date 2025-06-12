function updateProfile() {
	let ten = $('input[name="ten"]').val();
	let gioitinh = $('input[name="gioi-tinh"]:checked').val();
	$.post("/play-music/load-ajax/update-profile.php", {ten: ten, gioitinh: gioitinh}, function(data, status) {
		loadSite("profile.php");
		$(".updated-account").text(data);
	});
}