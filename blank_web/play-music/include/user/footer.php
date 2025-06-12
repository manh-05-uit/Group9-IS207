		<div class="footer">
			Bản quyền &copy; Nhóm Phát triển ứng dụng Web
		</div>
	</div>
	<script>
      $('.toggle').click(function() {
        if ($(".sidebar").css("display") == "none") {
          $(".sidebar").removeClass("sidebar-display-no");
          $(".sidebar-collapse").removeClass("sidebar-collapse-display-yes");
          $(".sidebar").addClass("sidebar-display-yes");
          $(".sidebar-collapse").addClass("sidebar-collapse-display-no");
          $(".main-content").removeClass("main-content-collapse-sm-screen");
          $(".main-content").removeClass("main-content-collapse-lg-screen");
		  $(".footer").removeClass("footer-collapse-sm-screen");
          $(".footer").removeClass("footer-collapse-lg-screen");
          $(".nav-bar").css("z-index", "1");
          $(".sidebar").css("z-index", "2");
          $(".sidebar-collapse").css("z-index", "2");
        } else {
          $(".sidebar").removeClass("sidebar-display-yes");
          $(".sidebar-collapse").removeClass("sidebar-collapse-display-no");
          $(".sidebar").addClass("sidebar-display-no");
          $(".sidebar-collapse").addClass("sidebar-collapse-display-yes");
          if ($("#sidebar-collapse").css("width") != "0px") {
            $(".main-content").addClass("main-content-collapse-lg-screen");
			$(".footer").addClass("footer-collapse-lg-screen");
          } else {
            $(".footer").css("margin-left", "0px");
            $(".main-content").addClass("main-content-collapse-sm-screen");
			$(".footer").addClass("footer-collapse-sm-screen");
          }
          $(".nav-bar").css("z-index", "1");
          $(".sidebar").css("z-index", "2");
          $(".sidebar-collapse").css("z-index", "2");
        }
      });
    </script>
    <script>
      $(window).on('scroll', function() {
        let scrollTop = $(window).scrollTop();
        if (scrollTop > 0) {
          $(".nav-bar").css("z-index", "2");
          $(".sidebar").css("z-index", "1");
          $(".sidebar-collapse").css("z-index", "1");
        } else {
          $(".nav-bar").css("z-index", "1");
          $(".sidebar").css("z-index", "2");
          $(".sidebar-collapse").css("z-index", "2");
        }
      });    
    </script>
      <script>
      $(window).on('resize', function () {
        if ($(window).width() <= 576) {
          $('.sidebar').removeClass('sidebar-display-yes');
          $('.sidebar').addClass('sidebar-display-no');
        } else if ($('.sidebar-collapse').css("display") == "none") {
          $('.sidebar').removeClass('sidebar-display-no');
          $('.sidebar').addClass('sidebar-display-yes');
        }
      });
    </script>    
    <script>
let musicList = []; // Danh sách gốc
let currentIndex = -1;

let isShuffle = false;
let shuffledList = []; // Danh sách trộn
let shuffledIndex = 0;

let isRepeating = false;
$("#repeat").click(function () {
			isRepeating = !isRepeating; // Đảo trạng thái
			$("#player")[0].loop = isRepeating; // Bật/tắt lặp bài
			// Thay đổi giao diện nút (tuỳ chọn)
			if (isRepeating) {
				$("#repeat").html("<span class=\"fa-solid fa-repeat\" style=\"color: var(--button-color);\"></span>"); // hoặc đổi màu nền, thêm icon
			} else {
				$("#repeat").html("<span class=\"fa-solid fa-repeat\"></span>");
			}
		});
function rebuildMusicList() {
  musicList = [];
  $(".music-playlist").each(function () {
    musicList.push({
      src: $(this).data("src"),
      img: $(this).data("img"),
      title: $(this).data("title"),
      singer: $(this).data("singer")
    });
  });
}
$(document).ready(function () {
  rebuildMusicList();
});
function playAtIndex(index) {
  if (index < 0 || index >= musicList.length) return;
  const song = musicList[index];
  currentIndex = index;

  if (isShuffle) {
    shuffledIndex = shuffledList.indexOf(index);
  }

  $("#player").attr("src", song.src)[0].play();
  $("#song-picture").attr("src", song.img);
  $("#song-content").html(`<div style="padding-bottom: 7px"><b>${song.title}</b></div><p>${song.singer}</p>`);
  $("#pause").html(`<span class="fa-solid fa-pause"></span>`);
}
$(document).on("click", ".music-playlist", function () {
	rebuildMusicList();
  let index = $(".music-playlist").index(this);
  currentIndex = index;
  if (isShuffle) {
    shuffledIndex = shuffledList.indexOf(currentIndex);
  }
  playAtIndex(currentIndex);
});
function shuffleArray(array) {
  let copy = [...array];
  for (let i = copy.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [copy[i], copy[j]] = [copy[j], copy[i]];
  }
  return copy;
}

$("#random").click(function () {
  isShuffle = !isShuffle;
  if (isShuffle) {
    const allIndexes = musicList.map((_, i) => i);
    const filtered = allIndexes.filter(i => i !== currentIndex);
    shuffledList = shuffleArray(filtered);
    shuffledList.unshift(currentIndex);
    shuffledIndex = 0;
    $(this).html(`<span class="fa-solid fa-random" style="color: var(--button-color);"></span>`);
  } else {
    $(this).html(`<span class="fa-solid fa-random"></span>`);
  }
});
function playNextSong() {
  if (isShuffle) {
    shuffledIndex++;
    if (shuffledIndex >= shuffledList.length) {
      shuffledIndex = 0;
    }
    playAtIndex(shuffledList[shuffledIndex]);
  } else {
    let next = currentIndex + 1;
    if (next >= musicList.length) next = 0;
    playAtIndex(next);
  }
}

$("#player").on("ended", function () {
  if (isRepeating) {
    this.currentTime = 0;
    this.play();
  } else {
    playNextSong();
  }
});

const audio = $("#player")[0];
      
      // Phát nhạc hoặc tạm dừng
      $("#pause").click(function() {
        if (audio.paused) {
          audio.play();
          this.innerHTML = "<span class=\"fa-solid fa-pause\"></span>";
        } else {
          audio.pause();
          this.innerHTML = "<span class=\"fa-solid fa-play\"></span>";
        }
      });
      
      // Cập nhập tiến trình khi nhạc chạy
      function formatTime(seconds) {
        let m = Math.floor(seconds / 60);
        let s = Math.floor(seconds % 60);
        return m.toString().padStart(2, '0') + ":" + s.toString().padStart(2, '0');
      }
      audio.ontimeupdate = function() {
        if (!isNaN(audio.duration)) {
          let progress = (audio.currentTime / audio.duration) * 100;
          $("#time-bar").val(progress);
          $("#current-time").text(formatTime(audio.currentTime));
          $("#full-time").text(formatTime(audio.duration));
        }
      };
	  // Cập nhập khi người dùng kéo thanh tiến trình
      $("#time-bar").on("input", function() {
        let newTime = (this.value / 100) * audio.duration;
        audio.currentTime = newTime;
      });
      let currentVolume = $("#volume-bar")[0].value;
      // Thay đổi âm lượng
      $("#volume-bar").on("input", function() {
        audio.volume = this.value / 100;
        currentVolume = this.value;
        if (this.value > 50) {
          $("#volume-icon").html("<span class=\"fa-solid fa-volume-up\" style=\"font-size: 30px;\"></span>");
        } else if (this.value > 0) {
          $("#volume-icon").html("<span class=\"fa-solid fa-volume-down\" style=\"font-size: 30px;\"></span>");
        } else {
          $("#volume-icon").html("<span class=\"fa-solid fa-volume-mute\" style=\"font-size: 30px;\"></span>");
        }
      });
	  $("#volume-icon").click(function() {
        if ($("#volume-bar")[0].value > 0) {
          $(this).html("<span class=\"fa-solid fa-volume-mute\" style=\"font-size: 30px;\"></span>");
          $("#volume-bar")[0].value = 0;
          audio.volume = $("#volume-bar")[0].value / 100;
        } else {
          $("#volume-bar")[0].value = currentVolume;
          audio.volume = $("#volume-bar")[0].value / 100;
          if (currentVolume > 50) {
            $(this).html("<span class=\"fa-solid fa-volume-up\" style=\"font-size: 30px;\"></span>");
          } else {
            $(this).html("<span class=\"fa-solid fa-volume-down\" style=\"font-size: 30px;\"></span>");
          }
        }
      });
	  // Forward: bài tiếp theo
      $("#forward").click(function () {
		if (isShuffle) {
			if (shuffledIndex < shuffledList.length - 1) {
				shuffledIndex ++;
			playAtIndex(shuffledList[shuffledIndex]);
			} else {
				shuffledIndex = 0;
				playAtIndex(shuffledList[shuffledIndex]);
			}
		} else {
        if (currentIndex < musicList.length - 1) {
          playAtIndex(currentIndex + 1);
        } else {
			currentIndex = 0;
			playAtIndex(currentIndex);
		}
		}
      });

      // Backward: bài trước đó
      $("#backward").click(function () {
		 if (isShuffle) {
			if (shuffledIndex > 0) {
				shuffledIndex --;
			playAtIndex(shuffledList[shuffledIndex]);
			} else {
				shuffledIndex = shuffledList.length - 1;
				playAtIndex(shuffledList[shuffledIndex]);
			}
		} else {
			if (currentIndex > 0) {
          playAtIndex(currentIndex - 1);
        } else {
			currentIndex = musicList.length - 1;
			playAtIndex(currentIndex);
		}
		}
      });
	  function afterAjaxLoadMusicList() {
  rebuildMusicList(); // Cập nhật danh sách bài hát mới

  if (isShuffle) {
    const allIndexes = musicList.map((_, i) => i);
    const filtered = allIndexes.filter(i => i !== currentIndex);
    shuffledList = shuffleArray(filtered);
    shuffledList.unshift(currentIndex);
    shuffledIndex = 0;
  }
}

	</script>
	<script>
      let offset = 6;
	  let offsetChart = 6;
	  let offsetType = 6;
	  let offsetSinger = 6;
	  let offsetAlbum = 6;
    </script>
    <script src="/play-music/js/user/index-load-more-song.js"></script>
	<script src="/play-music/js/user/index-load-more-chart.js"></script>
	<script src="/play-music/js/user/explore-load-more-type.js"></script>
	<script src="/play-music/js/user/explore-load-more-singer.js"></script>
	<script src="/play-music/js/user/explore-load-more-album.js"></script>
	<script src="/play-music/js/user/update-profile.js"></script>
	<script src="/play-music/js/user/load-site.js"></script>
	<script>
	let currentMaBaiHat = null;

$(document).on("click", ".music-playlist", function () {
    currentMaBaiHat = $(this).data("mabaihat");
	$.post("/play-music/load-ajax/save-history.php", {mabh: currentMaBaiHat}, function(data, status) {
		}
	);
	$.post("/play-music/load-ajax/increase-view.php", {mabh: currentMaBaiHat}, function(data, status) {
		}
	);
    $.post("/play-music/load-ajax/favourite-check.php", { mabaihat: currentMaBaiHat }, function (res) {
        if (res === "1") {
            $("#heart span").css("color", "var(--button-color)");
        } else {
            $("#heart span").css("color", "var(--text-color)");
        }
    });
});
$("#heart").on("click", function () {
    if (!currentMaBaiHat) return;
    $.post("/play-music/load-ajax/toggle-favourite.php", { mabaihat: currentMaBaiHat }, function (res) {
		res=res.trim();
        if (res == "added") {
            $("#heart span").css("color", "var(--button-color)");
        } else {
            $("#heart span").css("color", "var(--text-color)");
        }
    });
});

$(document).on("click", ".save-singer", function() {
	macs = $(this).data("macs");
	$.post("/play-music/load-ajax/save-singer.php", { macs: macs }, function(data, status) {
		data = data.trim();
		if (data == "added") {
			$(".save-singer span").css("color", "var(--button-color)");
		} else {
			$(".save-singer span").css("color", "var(--text-color)");
		}
	});
});

$(document).on("click", ".save-album", function() {
	maalbum = $(this).data("maalbum");
	$.post("/play-music/load-ajax/save-album.php", { maalbum: maalbum }, function(data, status) {
		data = data.trim();
		if (data == "added") {
			$(".save-album span").css("color", "var(--button-color)");
		} else {
			$(".save-album span").css("color", "var(--text-color)");
		}
	});
});

</script>
<script>
  $(document).on("click", "tbody tr",function () {
      $('tbody tr').removeClass('active');
      $(this).addClass('active');
    });
</script>
<script>
	$(".search").on("keypress", function(e) {
		if (e.key === "Enter") {
			let keyword = $(this).val().trim();
			loadSite("search.php?keyword=" + keyword, {}, "GET");
		}
	});
	
	$(".search-icon").click(function() {
		$(".search-sm-screen").toggle();
	});
	$(".search-sm-go").click(function() {
		let keyword = $(".search-sm").val().trim();
		loadSite("search.php?keyword=" + keyword, {}, "GET");
		$(".search-sm-screen").hide();
	});
	$(".exit-search").click(function() {
		$(".search-sm-screen").hide();
	});
</script>
	</body>
</html>