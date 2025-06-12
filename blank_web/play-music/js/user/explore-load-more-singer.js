function loadMoreSingerAtExplore() {
  const jsonData = { offset: offsetSinger };
  offsetSinger += 6;

  $.post("load-ajax/explore-load-more-singer.php", jsonData, function(data, status) {
    // 1. Chèn HTML
    $(".singer-list").append(data);
  });
}