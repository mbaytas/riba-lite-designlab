jQuery( document ).ready( function() {

    /* === <header> === */
    wp.customize(
        'rl_header_bg_color',
        function (value) {
            value.bind(
                function (to) {
                    jQuery('body.rl-colors header.site-header').css('background-color', to);
                }
            );
        }
    );

    /* === <logo> === */
    wp.customize(
        'rl_header_text_logo_color',
        function (value) {
            value.bind(
                function (to) {
                    jQuery('body.rl-colors .site-header .site-branding').css('color', to);
                }
            );
        }
    );

    /* === <headings> === */
    wp.customize(
        'rl_heading_h1_color',
        function (value) {
            value.bind(
                function (to) {
                    jQuery('body.rl-colors h1').css('color', to);
                }
            );
        }
    );

    wp.customize(
        'rl_heading_h2_color',
        function (value) {
            value.bind(
                function (to) {
                    jQuery('body.rl-colors h2').css('color', to);
                }
            );
        }
    );

    wp.customize(
        'rl_heading_h3_color',
        function (value) {
            value.bind(
                function (to) {
                    jQuery('body.rl-colors h3').css('color', to);
                }
            );
        }
    );

    wp.customize(
        'rl_heading_h4_color',
        function (value) {
            value.bind(
                function (to) {
                    jQuery('body.rl-colors h4').css('color', to);
                }
            );
        }
    );

    wp.customize(
        'rl_heading_h5_color',
        function (value) {
            value.bind(
                function (to) {
                    jQuery('body.rl-colors h5').css('color', to);
                }
            );
        }
    );

    wp.customize(
        'rl_heading_h6_color',
        function (value) {
            value.bind(
                function (to) {
                    jQuery('body.rl-colors h6').css('color', to);
                }
            );
        }
    );

    wp.customize(
        'rl_heading_p_color',
        function (value) {
            value.bind(
                function (to) {
                    jQuery('body.rl-colors p').css('color', to);
                }
            );
        }
    );






    /* === <links> === */

    wp.customize(
        'rl_link_color',
        function (value) {
            value.bind(
                function (to) {
                    jQuery('body.rl-colors a').css('color', to);
                }
            );
        }
    );

    wp.customize(
        'rl_link_color_hover',
        function (value) {
            value.bind(
                function (to) {
                    jQuery('body.rl-colors a:hover').css('color', to);
                }
            );
        }
    );


}); // jQuery