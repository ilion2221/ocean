<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ocean
 */
                   wp_nav_menu( array(
	                    'menu_class'=>'false',
                        'menu_id' => 'nav1',
                        'container' => 'false',
                        'theme_location'=>'left-sidebar',
                        'container_class' => 'false',  
                        'container_id'    => 'false',
                        'items_wrap' => '%3$s',
                        'walker' => new My_Walker_Nav_Menu
                        ) );
                
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>

