jQuery(function () {
    var $ = jQuery.noConflict();

    //function to load users
    function load_users(page, sender) {
        var outter_wrap = $(sender).closest('.uitems'),
            cat = outter_wrap.data("cat");

        outter_wrap.addClass('loading');
        $.ajax({
            url: objjs.ajax_url,
            type: 'GET',
            data: {
                'action': cat, //staff, manager or staff_manager
                'p': page
            },
            dataType: 'json',
            success: function (data) {
                var content_html = '<div class=\'row\'>';
                $.each(data.items, function (x, y) {
                    content_html += y;
                });
                content_html += '</div>';
                outter_wrap.html(content_html);
                outter_wrap.append(data.pagination);
                outter_wrap.removeClass('loading');
            }
        })
    }

    //user pagination
    $('body').on('click', '.page-numbers li a', function (e) {
        e.preventDefault();

        var paged = $(this).html(),
            pagination_wrapper = $('.page-numbers'),
            current_page = pagination_wrapper.find('li span.current').html();

        //check if link is next or prev
        if ($(this).hasClass('prev')) {
            paged = parseInt(current_page, 10) - 1;
        } else if ($(this).hasClass('next')) {
            paged = parseInt(current_page, 10) + 1;
        }

        load_users(paged, $(this));
    });
});

