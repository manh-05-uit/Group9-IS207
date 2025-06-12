const BASE_PATH = "/play-music/";
$(document).ready(function () {
	if (!history.state) {
		let relativeUrl = window.location.pathname + window.location.search + window.location.hash;
		let savedUrl = relativeUrl;
		let lastPosition = relativeUrl.length;
		let secondPosition = 0;
		for (let i = 1; i < lastPosition; i++) {
			if (relativeUrl[i] == "/") {
				secondPosition = i;
				break;
			}
		}
		relativeUrl = relativeUrl.slice(secondPosition + 1, lastPosition + 1);
		if (relativeUrl == "") {
			relativeUrl = "index.php";
		}
		const url = relativeUrl.startsWith('/') ? relativeUrl : BASE_PATH + relativeUrl;
		history.replaceState(
			{ page: relativeUrl	},
			"",
			url
		);
	}
});

function loadSite(page, jsonData = {}, method = "POST", push=true) {
	const url = page.startsWith('/') ? page : BASE_PATH + page;
	if (method == "POST") {
		$.post(url, jsonData, function (data, status) {
        $(".main-content").html(data);
        document.title = getPageTitle(page);
        if (push) {
            history.pushState({ page: page, data: data, method: method }, document.title, url);
        }
    });
	} 
	else {
		$.get(url, function (data, status) {
        $(".main-content").html(data);
        document.title = getPageTitle(page.split('?')[0]);
        if (push) {
            history.pushState({ page: page, data: data, method: method }, document.title, url);
        }
		});
	}
}

function getPageTitle(page) {
    switch (page) {
        case "about-us.php": return "Về chúng tôi";
        case "contact.php": return "Liên hệ";
		case "explore.php": return "Khám phá";
        case "index.php": return "Trang chủ";
		case "library.php": return "Thư viên";
		case "profile.php": return "Hồ sơ";
		case "search.php": return "Tìm kiếm";
		case "load-ajax/load-song-in-chart.php": return "Bảng xếp hạng";
		case "load-ajax/load-song-in-type.php": return "Thể loại";
		case "load-ajax/load-song-in-singer.php": return "Ca sĩ";
		case "load-ajax/load-song-in-album.php": return "Album";
        default: return "Trang web";
    }
}

window.onpopstate = function (event) {
    if (event.state && event.state.page) {
        const page = event.state.page;
        const data = event.state.data || {};
        const method = event.state.method || "GET";
        loadSite(page, data, method, false);
    }
};