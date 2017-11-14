<?php
    /**
     * Remove unwanted admin menu links
     */
    function pn_menu_page_removing() {
        remove_menu_page('edit-comments.php');
        remove_menu_page('edit.php');
    }
    add_action('admin_menu', 'pn_menu_page_removing');

    function pn_remove_admin_bar_links() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('new-post');
        $wp_admin_bar->remove_menu('new-user');
    }
    add_action( 'wp_before_admin_bar_render', 'pn_remove_admin_bar_links' );


    /**
     * Remove custom post type templates from pages templates list 
     * @param  [type] $templates [description]
     * @return [type]            [description]
     */
    function pn_remove_page_templates($templates) {
        global $CONFIG;

        foreach ($CONFIG['post_types'] as $slug => $item) {
            unset($templates['single-' . $slug . '.php']);
            unset($templates['taxonomy-' . $item['taxonomy'] . '.php']);
        }

        return $templates;
    }
    add_filter('theme_page_templates', 'pn_remove_page_templates');


    /**
     * Remove paragraph saying excerpt is optional
     */
    function admin_css() {
        echo '<style type="text/css">
                  #postexcerpt #excerpt + p, #add-post-type-post { display: none; }
                </style>';
    }
    add_action('admin_head', 'admin_css');
?>