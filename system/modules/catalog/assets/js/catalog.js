$(document).ready(function() {
    $('.panel-default').each(function(index, el) {
        if ($(this).find('li.active').length > 0) {
            $(this).find('.panel-collapse').addClass('in');
        };
    });
});