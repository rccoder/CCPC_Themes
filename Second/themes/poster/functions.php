<?php

include( get_template_directory() . '/classes/PosterMenuWalker.php' );

class PosterTheme{
    private $_actions = array(
        'after_setup_theme',
        'wp_enqueue_scripts',
        'widgets_init',
        'init'
    );
    private $_filters = array();

    function __construct(){
        // Register actions
        foreach($this->_actions as $action){
            if(is_array($action)){
                add_action($action[0], array($this, $action[0]), $action[1], $action[2]);
            }else{
                add_action($action, array($this, $action));
            }
        }
        // Register filters
        foreach($this->_filters as $filter){
            if(is_array($filter)){
                add_filter($filter[0], array($this, $filter[0]), $filter[1], $filter[2]);
            }else{
                add_filter($filter, array($this, $filter));
            }
        }
    }

    /* Actions */
    function after_setup_theme(){
        load_theme_textdomain('poster', get_template_directory() . '/languages');

        add_theme_support( 'post-thumbnails' );
        add_image_size('-poster-featured-slide', 848, 475, true);
        add_image_size('-poster-featured-large', 848, 250, true);

        register_nav_menu( 'primary', '头部主菜单' );
    }
    function wp_enqueue_scripts(){
        $tpl_uri = get_template_directory_uri();
        wp_register_script('poster-bootstrap', $tpl_uri . '/static/bootstrap/js/bootstrap.min.js', array(), '1.0', true);

        wp_enqueue_script('jquery');
        wp_enqueue_script('poster-bootstrap');

        wp_register_style('poster-bootstrap', $tpl_uri . '/static/bootstrap/css/bootstrap.min.css');
        wp_register_style('poster-ionicons', $tpl_uri . '/static/ionicons/css/ionicons.min.css');

        wp_register_style('poster-app', $tpl_uri . '/static/css/blue.css');
        wp_register_style('poster-typo', $tpl_uri . '/static/css/typo.css');

        wp_enqueue_style('poster-bootstrap');
        wp_enqueue_style('poster-ionicons');
        wp_enqueue_style('poster-app');
        wp_enqueue_style('poster-typo');
    }

    // Register widgets
    function widgets_init() {
        register_sidebar(array(
            'id' => 'sidebar',
            'name' => '主侧边栏',
            'description' => __('所有页面共用的侧边栏。所有挂件必须设置标题。', 'poster'),
            'before_widget' => '<div id="%1$s" class="box %2$s">',
            'after_widget' => '</div></div>',
            'before_title' => '<div class="box-heading"><h2>',
            'after_title' => '</h2></div><div class="box-content">'
        ));
    }

    function init(){
        register_post_type( 'poster_slide', array(
            'labels' => array(
                'name' => __( 'Slides', 'poster' ),
                'singular_name' => __( 'Slide', 'poster' )
            ),
            'public'      => true,
            'has_archive' => true,
            'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        ));
    }

    /* Filters */
    
    // 分页
    static function paginavi(){
        global $wp_query;

        $inf = 999999;

        $args = array(
            'base'         => str_replace($inf, '%#%', get_pagenum_link($inf)),
            'total'        => $wp_query->max_num_pages,
            'current'      => max( 1, get_query_var('paged') ),
            'prev_text'    => _x('« 上一页', 'pagination', 'poster'),
            'next_text'    => _x('下一页 »', 'pagination', 'poster'),
            'type'         => 'array',
        );
        $pagi =  paginate_links( $args );
        if ($wp_query->max_num_pages > 1) : ?>
            <ul class="pagination">
                <?php foreach ( $pagi as $page ) {
                    $class = $page == $args['current'] ? 'class="active"' : '';
                    printf('<li %s>%s</li>', $class, $page);
                } ?>
            </ul>
    <?php
        endif;
    }
}

$poster_theme = new PosterTheme();

 ?>
