<?php 
//注册菜单
if(!function_exists('specs_register_nav_menu')){
	function specs_register_nav_menu() {
		register_nav_menus(
			array(
				'primary'	=>	'头部主菜单', // Register the Primary menu
				// Copy and paste the line above right here if you want to make another menu,
				// just change the 'primary' to another name
			)
		);
	}
}
add_action( 'after_setup_theme', 'specs_register_nav_menu' );
class Bootstrap_Walker extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() )
    {
        $tabs = str_repeat("\t", $depth);
        // If we are about to start the first submenu, we need to give it a dropdown-menu class
        if ($depth == 0 || $depth == 1) { //really, level-1 or level-2, because $depth is misleading here (see note above)
            $output .= "\n{$tabs}<ul class=\"dropdown-menu\">\n";
        } else {
            $output .= "\n{$tabs}<ul>\n";
        }
    }
    function end_lvl( &$output, $depth = 0, $args = array() )
    {
        if ($depth == 0) { // This is actually the end of the level-1 submenu ($depth is misleading here too!)
            // we don't have anything special for Bootstrap, so we'll just leave an HTML comment for now
            $output .= '<!--.dropdown-->';
        }
        $tabs = str_repeat("\t", $depth);
        $output .= "\n{$tabs}</ul>\n";
    }
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
    {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        /* If this item has a dropdown menu, add the 'dropdown' class for Bootstrap */
        if ($item->hasChildren) {
            $classes[] = 'dropdown';
            // level-1 menus also need the 'dropdown-submenu' class
            if($depth == 1) {
                $classes[] = 'dropdown-submenu';
            }
        }
        /* This is the stock Wordpress code that builds the <li> with all of its attributes */
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';
        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $item_output = $args->before;
        /* If this item has a dropdown menu, make clicking on this link toggle it */
        if ($item->hasChildren && $depth == 0) {
            $item_output .= '<a'. $attributes .' class="dropdown-toggle" data-toggle="dropdown">';
        } else {
            $item_output .= '<a'. $attributes .'>';
        }
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        /* Output the actual caret for the user to click on to toggle the menu */
        if ($item->hasChildren && $depth == 0) {
            $item_output .= '<i class="icon-angle-down"></i></a>';
        } else {
            $item_output .= '</a>';
        }
        $item_output .= $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        return;
    }
    /* Close the <li>
     * Note: the <a> is already closed
     * Note 2: $depth is "correct" at this level
     */
    function end_el ( &$output, $item, $depth = 0, $args = array() )
    {
        $output .= '</li>';
        return;
    }
    /* Add a 'hasChildren' property to the item
     * Code from: http://wordpress.org/support/topic/how-do-i-know-if-a-menu-item-has-children-or-is-a-leaf#post-3139633
     */
    function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {
        // check whether this item has children, and set $item->hasChildren accordingly
        $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);
        // continue with normal behavior
        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}
//改变菜单输出样式以适应Bootstrap菜单
class themeslug_walker_nav_menu extends Walker_Nav_Menu {
    // add classes to ul sub-menus
    function start_lvl( &$output, $depth ) {
        // depth dependent classes
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        // build html
        $output .= "\n" . $indent . '<ul class="dropdown-menu">' . "\n";
    }
    // add main/sub classes to li's and links
    function start_el( &$output, $item, $depth, $args ) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
        // passed classes
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
        // build html
        $output .= $indent . '<li class="' . $class_names . '">';
        // link attributes
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ! empty( $item->data_toggle ) ? ' data-toggle="'   . esc_attr( $item->data_toggle ) .'"' : '';
        $attributes .= ! empty( $item->a_class ) ? ' class="'   . esc_attr( $item->a_class ) .'"' : '';
        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );
        // build html
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}
//修改拥有二级菜单的顶级菜单项
add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
function add_menu_parent_class( $items ) {
	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}
	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'dropdown';
			$item->title = $item->title.'<b class="caret"></b>';
			$item->a_class = 'dropdown-toggle';
			//$item->data_toggle = 'dropdown';
		}
	}
	return $items;
}
//添加active为当前激活的菜单CSS类
function current_menu_class( $classes ) {
     if ( in_array('current-menu-item', $classes ) OR in_array( 'current-menu-ancestor', $classes ) )
          $classes[] = 'active';
     return $classes;
}
add_filter( 'nav_menu_css_class', 'current_menu_class' );
//站点标题
function twentytwelve_wp_title( $title, $sep ) {
    global $paged, $page;
    if ( is_feed() )
        return $title;
    $title .= get_bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";
    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );
    return $title;
}
add_filter( 'wp_title', 'twentytwelve_wp_title', 10, 2 );
//分页
function specs_pages($range = 5){
    global $paged, $wp_query;
    if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
    if($max_page > 1){if(!$paged){$paged = 1;}
	echo "<ul class='pagination pull-right'>";
        if($paged != 1){
            echo "<li><a href='" . get_pagenum_link(1) . "' class='extend' title='首页'>&laquo;</a></li>";
        }
        if($paged>1) echo '<li><a href="' . get_pagenum_link($paged-1) .'" class="prev" title="上一页">&lt;</a></li>';
        if($max_page > $range){
            if($paged < $range){
                for($i = 1; $i <= ($range + 1); $i++){
                    echo "<li"; if($i==$paged)echo " class='active'";echo "><a href='" . get_pagenum_link($i) ."'>$i</a></li>";
                }
            }
            elseif($paged >= ($max_page - ceil(($range/2)))){
                for($i = $max_page - $range; $i <= $max_page; $i++){
                    echo "<li";
                    if($i==$paged)
                        echo " class='active'";echo "><a href='" . get_pagenum_link($i) ."'>$i</a></li>";
                }
            }
            elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
                for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){
                    echo "<li";
                    if($i==$paged)echo " class='active'";
                    echo "><a href='" . get_pagenum_link($i) ."'>$i</a></li>";
                }
            }
        }
        else{
            for($i = 1; $i <= $max_page; $i++){
                echo "<li";
                if($i==$paged)echo " class='active'";
                echo "><a href='" . get_pagenum_link($i) ."'>$i</a></li>";
            }
        }
        if($paged<$max_page) echo '<li><a href="' . get_pagenum_link($paged+1) .'" class="next" title="下一页">&gt;</a></li>';
        if($paged != $max_page){
            echo "<li><a href='" . get_pagenum_link($max_page) . "' class='extend' title='尾页'>&raquo;</a></li>";
        }
        echo "</ul>";
	}
}
//注册侧边栏
function my_widgets() {
		register_sidebar(array(
			'name' => 'sidebar1',
			'description' => __('主题侧边栏'),
			'before_widget' => '<div id="%1$s" class="box %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<div class="box-heading"><h2>',
			'after_title' => '</h2></div>'
		));
	}
	add_action( 'widgets_init', 'my_widgets' );	
 ?>