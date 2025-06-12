function loadMoreAlbumAtExplore() {
  const jsonData = { offset: offsetAlbum };
  offsetAlbum += 6;

  $.post("load-ajax/explore-load-more-album.php", jsonData, function(data, status) {
    // 1. Chèn HTML
    $(".album-list").append(data);
  });
}