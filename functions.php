<?php
/**
 * ocean functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ocean
 */

if ( ! function_exists( 'ocean_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ocean_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ocean, use a find and replace
		 * to change 'ocean' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ocean', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'ocean' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ocean_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'woocommerce' );
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'ocean_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ocean_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ocean_content_width', 640 );
}
add_action( 'after_setup_theme', 'ocean_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ocean_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ocean' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ocean' ),
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ocean_widgets_init' );

/**
Menu
*/
register_nav_menus(array(
	'top'    => 'Верхнее меню', 
    'left-sidebar' => 'Menu category',
	'bottom' => 'Нижнее меню' , 
    'bottom1' => 'Нижнее меню1',
    'bottom2' => 'Нижнее меню2' 
));
/**
 * Enqueue scripts and styles.
 */
function ocean_scripts() {
	wp_enqueue_style( 'ocean-style', get_stylesheet_uri() );
    wp_enqueue_style( 'ocean-botstrap-select.min', get_template_directory_uri() . '/css/bootstrap-select.min.css' );
    wp_enqueue_style( 'ocean-owl.carousel', get_template_directory_uri() . '/css/owl.carousel.css' );
    wp_enqueue_style( 'ocean-owl.theme', get_template_directory_uri() . '/css/owl.theme.css' );
    wp_enqueue_style( 'ocean-owl.carousel', get_template_directory_uri() . '/css/owl.carousel.css' );
    wp_enqueue_style( 'ocean-owl.transitions', get_template_directory_uri() . '/css/owl.transitions.css' );
    
    wp_enqueue_script( 'ocean-jquery-latest', 'http://code.jquery.com/jquery-latest.min.js', array(), null, true );
    wp_enqueue_script( 'ocean-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), null, true );
    wp_enqueue_script( 'ocean-owl.carousel.min', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), null, true );
    wp_enqueue_script( 'ocean-main-order-script', get_template_directory_uri() . '/js/main-order-script.js', array(), null, true );
    wp_enqueue_script( 'ocean-main', get_template_directory_uri() . '/js/main.js', array(), null, true );
    wp_enqueue_script( 'ocean-jquery.validate.min', get_template_directory_uri() . '/js/jquery.validate.min.js', array(), null, true );
    wp_enqueue_script( 'ocean-jquery.ui.touch-punch.min', get_template_directory_uri() . '/js/jquery.ui.touch-punch.min.js', array(), null, true );
    wp_enqueue_script( 'ocean-jquery.mask.min', get_template_directory_uri() . '/js/jquery.mask.min.js', array(), null, true );
    wp_enqueue_script( 'ocean-jquery-ui', get_template_directory_uri() . '/js/jquery-ui.js', array(), null, true );
	wp_enqueue_script( 'ocean-bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array(), null, true );
	wp_enqueue_script( 'ocean-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), null, true );
	wp_enqueue_script( 'ocean-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'ocean-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ocean_scripts' );

add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

function change_existing_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'RUB': $currency_symbol = ' руб.'; break;
     }
     return $currency_symbol;
}

if ( ! function_exists( 'cart_link' ) ) {
 function cart_link() {
 ?>
<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" ><svg class="svg-icon cart-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#cart-icon"></use></svg><span class="text hidden-xs" ><?php echo sprintf (_n( '%d т.', '%d т.', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></span></a>
 <?php
 }
}
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
 ob_start();
 ?>
 <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'Перейти в корзину' ); ?>"><svg class="svg-icon cart-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#cart-icon"></use></svg><span class="text hidden-xs" ><?php echo sprintf (_n( '%d т.', '%d т.', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></span></a> 
 <?php $fragments['a.cart-contents'] = ob_get_clean();
 return $fragments;
}
/**
Function Custom product
*/




function woocommerce_template_loop_product_title() {
		echo '<div class="main-items-wrap_items-place_item_name-wrap"><span>' . get_the_title() . '</span></div>';
   
	}
/**Remove link*/
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
add_action( 'woocommerce_shop_loop_link_open_1', 'woocommerce_template_loop_product_link_open_1', 10 );
function woocommerce_template_loop_product_link_open_1() {
	echo '<a href="' . get_the_permalink() . '">';
}
/**Close link*/
add_action( 'woocommerce_ocean_close_link', 'woocommerce_template_loop_product_link_close_1', 10 );
if (  ! function_exists( 'woocommerce_template_loop_product_link_close_1' ) ) {
    /**
    * Show the product title in the product loop. By default this is an H3.
    */
    function woocommerce_template_loop_product_link_close_1() {
        echo '</a>';
    }
}

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash()', 10 );
add_action( 'woocommerce_shop_loop_sale_flash_1', 'woocommerce_show_product_loop_sale_flash', 10 );

$gost = array(
   "Є"=>"EH","І"=>"I","і"=>"i","№"=>"#","є"=>"eh",
   "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G","Д"=>"D",
   "Е"=>"E","Ё"=>"JO","Ж"=>"ZH",
   "З"=>"Z","И"=>"I","Й"=>"JJ","К"=>"K","Л"=>"L",
   "М"=>"M","Н"=>"N","О"=>"O","П"=>"P","Р"=>"R",
   "С"=>"S","Т"=>"T","У"=>"U","Ф"=>"F","Х"=>"KH",
   "Ц"=>"C","Ч"=>"CH","Ш"=>"SH","Щ"=>"SHH","Ъ"=>"'",
   "Ы"=>"Y","Ь"=>"","Э"=>"EH","Ю"=>"YU","Я"=>"YA",
   "а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d",
   "е"=>"e","ё"=>"jo","ж"=>"zh",
   "з"=>"z","и"=>"i","й"=>"jj","к"=>"k","л"=>"l",
   "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
   "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"kh",
   "ц"=>"c","ч"=>"ch","ш"=>"sh","щ"=>"shh","ъ"=>"",
   "ы"=>"y","ь"=>"","э"=>"eh","ю"=>"yu","я"=>"ya",
   "—"=>"-","«"=>"","»"=>"","…"=>""
  );

$iso = array(
   "Є"=>"YE","І"=>"I","Ѓ"=>"G","і"=>"i","№"=>"#","є"=>"ye","ѓ"=>"g",
   "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G","Д"=>"D",
   "Е"=>"E","Ё"=>"YO","Ж"=>"ZH",
   "З"=>"Z","И"=>"I","Й"=>"J","К"=>"K","Л"=>"L",
   "М"=>"M","Н"=>"N","О"=>"O","П"=>"P","Р"=>"R",
   "С"=>"S","Т"=>"T","У"=>"U","Ф"=>"F","Х"=>"X",
   "Ц"=>"C","Ч"=>"CH","Ш"=>"SH","Щ"=>"SHH","Ъ"=>"'",
   "Ы"=>"Y","Ь"=>"","Э"=>"E","Ю"=>"YU","Я"=>"YA",
   "а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d",
   "е"=>"e","ё"=>"yo","ж"=>"zh",
   "з"=>"z","и"=>"i","й"=>"j","к"=>"k","л"=>"l",
   "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
   "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"x",
   "ц"=>"c","ч"=>"ch","ш"=>"sh","щ"=>"shh","ъ"=>"",
   "ы"=>"y","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",
   "—"=>"-","«"=>"","»"=>"","…"=>""
  );
 
function sanitize_title_with_translit($title) {
	global $gost, $iso;
	$rtl_standard = get_option('rtl_standard');
	switch ($rtl_standard) {
		case 'off':
		    return $title;		
		case 'gost':
		    return strtr($title, $gost);
		default: 
		    return strtr($title, $iso);
	}
}

add_action('sanitize_title', 'sanitize_title_with_translit', 0);

function register_menu_page_setting() {
add_menu_page('Настройки Темы2', 'Настройки темы', 6, 'setings_page.php', 'themes_setings');
}

add_action('admin_menu', 'register_menu_page_setting');
function themes_setings(){
?>
<div class="wrap">
<h2>Настройки темы</h2>

<form method="post" action="options.php" enctype="multipart/form-data">
    <?php settings_fields( 'nedw-settings-group' ); ?>
<table class="form-table">
  <tr valign="top">
 <th scope="row">Логотип</th> 
<td><? if(get_option('logo')){?><img src="<?php echo get_option('logo'); ?>" alt="Logo" /><br><?}?><input type="file" name="logo"/></td>
 </tr>
 <tr valign="top">
 <th scope="row">Телефон:</th>
 <td><input style="width: 500px" type="text" name="phone" value="<?php echo get_option('phone'); ?>"/></td>
 </tr>
 <tr valign="top">
 <th scope="row">Email:</th>
 <td><input style="width: 500px" type="text" name="mail" value="<?php echo get_option('mail'); ?>"/></td>
 </tr>
 <tr valign="top">
 <th scope="row">Адрес:</th>
 <td><input style="width: 500px" type="text" name="adress" value="<?php echo get_option('adress'); ?>"/></td>
 </tr> <tr valign="top">
 <th scope="row">Copyright:</th>
 <td><input style="width: 500px" type="text" name="copy" value="<?php echo get_option('copy'); ?>"/></td>
 </tr>
 </table>
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>
<?php
}

add_action( 'admin_init', 'register_nedwsettings' );
function register_nedwsettings() {
	register_setting( 'nedw-settings-group', 'logo', 'validate_setting' );
    register_setting( 'nedw-settings-group', 'footlogo' );
	register_setting( 'nedw-settings-group', 'phone' );
	register_setting( 'nedw-settings-group', 'mail' );
	register_setting( 'nedw-settings-group', 'adress' );
	register_setting( 'nedw-settings-group', 'copy' );
}

function validate_setting($plugin_options) { 
	$keys = array_keys($_FILES); 
	$i = 0; 
	foreach ( $_FILES as $image ) {   // if a files was upload   
	if ($image['size']) {     // if it is an image     
	if ( preg_match('/(jpg|jpeg|png|gif)$/', $image['type']) ) {       
	$override = array('test_form' => false);       // save the file, and store an array, containing its location in $file       
	$file = wp_handle_upload( $image, $override );       
	$plugin_options = $file['url'];     } else {       // Not an image.        
	$options = get_option('logo');       
	$plugin_options = $options;       // Die and let the user know that they made a mistake.       
	wp_die('No image was uploaded.');     }   }   // Else, the user didn't upload a file.   // Retain the image that's already on file.   
	else {     $options = get_option('logo');     
	$plugin_options = $options;   }   
	$i++; } 
	return $plugin_options;}

class My_Walker_Nav_Menu extends Walker_Nav_Menu {
function start_lvl( &$output, $depth =0, $args = array() ) {
		// depth dependent classes
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
			( $display_depth == 1 ? 'nav-ul_second-lvl_ul' : '' )
			);
		$class_names = implode( ' ', $classes );

		// build html
		$output .= "\n" . $indent . ( $depth % 2 ? '' : '<ul class="' . $class_names . '">' . "\n" ) ;
	}

	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat( $t, $depth );
		$output .= ( $depth % 2 ? '' : "$indent</ul>{$n}") ;
	}
     function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0  ) {
		global $wp_query;
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

		// depth dependent classes
		$depth_classes = array(
			( $depth == 0 ? 'w-ul' : '' ),
			( $depth == 1 ? 'title' : '' )
			
		);
		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

		// passed classes
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

		// build html
		$output .= $indent . ( $depth == 1 ? '<br>' : '' ) . '<li  class="' . $depth_class_names . '">';

		// link attributes
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
         
		$attributes .= '' . ( $depth > 0 ? '' : '' ) . '"';
        $title = apply_filters( 'the_title', $item->title, $item->ID );
         
		$item_output = $args->before;
	$item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before;
    $item_output .= '' . ( $depth == 0 ? '<span class="text">' : '' ); 
	$item_output .=  $title;
    $item_output .= '' . ( $depth == 0 ? "</span>"  : '' );
    $item_output .= '' . ( $depth == 0 ? '<svg class="svg-icon arrow-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use></svg> ' : '' );
    $item_output .= $args->link_after;
	$item_output .= '</a>';
    $item_output .=  ( $depth == 0 ? "<ul class='nav-ul_second-lvl-wrap clearfix'><li>"  : '' );
     
	$item_output .= $args->after;


		// build html
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
         
	}
public function end_el( &$output, $item, $depth = 0, $args = array() ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$output .= ( $depth == 0 ? "</ul ></li>"  : '' ) .  "</li>{$n}";
	}

}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

