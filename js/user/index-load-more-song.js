function loadMoreSongAtIndex() {
  const jsonData = { offset: offset };
  offset += 6;

  $.post("load-ajax/load-more-song.php", jsonData, function(data, status) {
    // 1. Chèn HTML
    $(".music-card-list").append(data);
	afterAjaxLoadMusicList();
  });
}
