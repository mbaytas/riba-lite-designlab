jQuery(document).ready(function() {
    if( jQuery('.chosen-select').length ) {

        jQuery('.chosen-select').each(function() {
            jQuery(this).chosen({
                search_contains: true,
                width: '100%'
            });
        });
    }
});
