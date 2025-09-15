jQuery(function () {
    console.log('Init Labsolute');

    // add an extra option to the sidebar
    jQuery('[data-extraitem]').each(function (item) {
        let key_value = jQuery(this).attr('data-extraitem').split(';');
        jQuery('ul', this).append('<li class="cat-item"><a href="' + key_value[1] + '">' + key_value[0] + '</a></li>');
    });

    // make a sidebar sticky when we scroll to high
    const sticky_element_holder = jQuery('[data-position=sticky] .elementor-widget-wrap');
    const sticky_elements       = jQuery('[data-position=sticky] .elementor-widget-wrap > div');
    const side_width            = sticky_element_holder.width();
    const header_height         = jQuery('header').outerHeight( true );
    const doc                   = document.documentElement.clientHeight ? document.documentElement : document.body;

    let total_side_height = 0;
    sticky_elements.each(function () {
        total_side_height += jQuery(this).outerHeight(true);
    })
    const max_scroll = total_side_height - jQuery(window).height() + header_height;

    jQuery(window).scroll(function () {
        if (jQuery(doc).scrollTop() > max_scroll) {
            sticky_element_holder.addClass('position_stick');
            sticky_element_holder.height(total_side_height);
            sticky_element_holder.width(side_width);
        } else {
            jQuery(sticky_element_holder).removeClass('position_stick');
        }
    });
});