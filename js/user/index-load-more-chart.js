function loadMoreChartAtIndex() {
  const jsonData = { offset: offsetChart };
  offsetChart += 6;

  $.post("load-ajax/load-more-chart.php", jsonData, function(data, status) {
    // 1. Chèn HTML
    $(".chart-list").append(data);
  });
}