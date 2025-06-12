function loadMoreTypeAtExplore() {
  const jsonData = { offset: offsetType };
  offsetType += 6;

  $.post("load-ajax/explore-load-more-type.php", jsonData, function(data, status) {
    // 1. Chèn HTML
    $(".type-list").append(data);
  });
}