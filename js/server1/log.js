jQuery(function($) {
  var lastLine = 0;
  $.get('log1.php', function(data) {
    $.each(data, function(i, v) {
      lastLine = i;
      $('#thePlace').prepend('<span>' + v + '</span>');
    });
    setInterval(function() {
      $.post('log.php', {
        start: lastLine
      }, function(data) {
        $.each(data, function(i, v) {
          $('#thePlace').prepend('<span>' + v + '</span>');
          lastLine = i;
        });
        $('#thePlace').children().slice(500).remove();
      }, 'json');
    }, 2000);

  }, 'json');
});
