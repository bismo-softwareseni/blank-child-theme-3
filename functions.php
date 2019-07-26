<?php
    //-- enqueue parent style
    function ssBlankChildAddParentStyle() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    }
    add_action( 'wp_enqueue_scripts', 'ssBlankChildAddParentStyle' );
?>