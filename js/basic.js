//funcion para crear iframe modal
$(document).on('click', 'a.link', function(e) {
  $.modal('<iframe src="' + $(this).attr('href') + '" height="550" width="980">', {
    closeHTML: "<a href='#' style='position:absolute; right:10px; top:10px;'><img src='images/x.png'></a>",
    overlayClose: true
  });
  return false;
});
