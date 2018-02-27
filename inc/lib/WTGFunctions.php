<?php

class WTGFunctions
{
	public static $instance;
	const TEXT_DOMAIN = 'wtg';
	
	/**
	 * WGTFunctions constructor.
	 */
	public function __construct()
	{
		$this->actions();
	}
	
	private function actions()
	{
		add_action('wp_enqueue_scripts', array($this, 'wtgScripts'));
		add_action('init', array($this, 'wtgMenus'));
		add_action('after_setup_theme', array($this, 'supports'));
		// Custom Wines
		add_action('init', array($this, 'wtgPostTypes'));
		// Custom Sliders
		add_action('init', array($this, 'customSlider'));
	}
	
	/**
	 *@Gugles Custom Post type
	 */
	public function wtgPostTypes()
	{
		$labels = array(
			'name' => _x('Delikatesy', self::TEXT_DOMAIN),
			'singular_name' => _x('Delikates', self::TEXT_DOMAIN),
			'menu_name' => _x('Delikatesy', self::TEXT_DOMAIN),
			'name_admin_bar' => _x('Delikatesy', self::TEXT_DOMAIN),
			'add_new' => __('Dodaj Nowy', self::TEXT_DOMAIN),
			'add_new_item' => __('Dodaj Nowy Artyków', self::TEXT_DOMAIN),
			'new_item' => __('Nowe Artykówy', self::TEXT_DOMAIN),
			'all_items' => __('Wszystkie Delikatesy', self::TEXT_DOMAIN),
			'search_items' => __('Szukaj Produkty', self::TEXT_DOMAIN),
			'parent_item_colon' => __('Parent Delikatesy', self::TEXT_DOMAIN),
			'not_found' => __('Nie ma takiego produktu', self::TEXT_DOMAIN),
			'not_found_in_trash' => __('Nie znaleziono produktów', self::TEXT_DOMAIN)
		);
		
		$args = array(
			'labels' => $labels,
			'description' => __('Opis', self::TEXT_DOMAIN),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array(
				'slug' => 'winotoskanii',
			),
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => true,
			'menu_position' => 6,
			'supports' => array(
				'title', 'editor', 'thumbnail',
			),
			'taxonomies' => array('category')
		);
		
		register_post_type('winotoskanii', $args);
	}
	
	public function customSlider()
	{
		$labels = array(
			'name' => _x('Przewijancę banery', self::TEXT_DOMAIN),
			'singular_name' => _x('Banery', self::TEXT_DOMAIN),
			'menu_name' => _x('Banery', self::TEXT_DOMAIN),
			'name_admin_bar' => _x('Banery', self::TEXT_DOMAIN),
			'add_new' => __('Dodaj Nowy Baner', self::TEXT_DOMAIN),
			'add_new_item' => __('Dodaj Nowy Banery', self::TEXT_DOMAIN),
			'new_item' => __('Nowe Banery', self::TEXT_DOMAIN),
			'all_items' => __('Wszystkie Banery', self::TEXT_DOMAIN),
			'search_items' => __('Szukaj Banerów', self::TEXT_DOMAIN),
			'parent_item_colon' => __('Parent Baner', self::TEXT_DOMAIN),
			'not_found' => __('Nie ma takiego Baneru', self::TEXT_DOMAIN),
			'not_found_in_trash' => __('Nie znaleziono Banerów', self::TEXT_DOMAIN)
		);
		
		$args = array(
			'labels' => $labels,
			'description' => __('Opis', self::TEXT_DOMAIN),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array(
				'slug' => 'banery',
			),
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => true,
			'menu_position' => 6,
			'supports' => array(
				'title', 'editor', 'thumbnail',
			),
			'taxonomies' => array('category')
		);
		
		register_post_type('banery', $args);
	}
	
	/**
	 * @ThemeSupports
	 */
	public function supports()
	{
		add_theme_support('post-thumbnails');
		add_theme_support('title-tag');
		
		add_image_size('wtg-front', 435, 530, true);
		add_image_size('slider', 1170, 480, true);
	}
	
	/**
	 * Scripts
	 */
	public function wtgScripts()
	{
		wp_register_style('wgt_style', get_template_directory_uri() . '/assets/css/style.css', array('wgt_normalize'), '1.0');
		// Normalize
		wp_register_style('wgt_normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), '7.0.0');
		// Awesome Fonts
		wp_register_style('wgt_awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), '4.7.0');
		wp_register_style('wgt_awesome_2', get_template_directory_uri() . '/assets/css/fontawesome-all.css', array(), '5.0.6');
		wp_register_style('bx_css', get_template_directory_uri() . '/assets/css/jquery.bxslider.min.css', array(), '1.0');
		
		// Google Font
		wp_register_style('wgt_google_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700|Raleway:400,700,900', array(), '1.0.0');
		
		
		wp_enqueue_style('wgt_style');
		wp_enqueue_style('wgt_normalize');
		wp_enqueue_style('wgt_awesome');
		wp_enqueue_style('wgt_awesome_2');
		wp_enqueue_style('bx_css');
		wp_enqueue_style('wgt_google_fonts');
	}
	
	/**
	 * Menus
	 */
	public function wtgMenus()
	{
		register_nav_menus(
			array(
				'wtg-header-menu' => __('WTG Header Menu', self::TEXT_DOMAIN),
				'wtg-social-menu' => __('SM Menu', self::TEXT_DOMAIN),
				'footer-menu' => __('Footer Menu', self::TEXT_DOMAIN),
			)
		);
	}
	
	/**
	 * Main Menu
	 */
	public static function wtgMainMenu()
	{
		$menu = array(
			'theme-location' => 'wtg-header-menu',
			'container' => 'nav',
			'container_class' => 'site-nav',
		);
		
		wp_nav_menu($menu);
	}
	
	/**
	 * SM Menu
	 */
	public static function wtgSmMenu()
	{
		$sm = array(
			'theme_location' => 'wtg-social-menu',
			'container' => 'nav',
			'container_class' => 'socials',
			'link_before' => '<span class="sr-text">',
			'link_after' => '</span>',
		);
		
		wp_nav_menu($sm);
	}
	
	
	/**
	 * @param $url
	 * @return string
	 * @sometimes Hard Code is useful
	 * @Gugles მიხედე შენს საქმეს! თუ ჩემი კოდი არ მოგწონს გააჯვი!!!
	 */
	public static function getAttachmentThumbnailUrl($url)
	{
		return 'style=background-image:url(' . esc_url($url) . ')';
	}
	
	public static function init()
	{
		if(null == self::$instance){
			self::$instance = new self();
		}
		
		return self::$instance;
	}
}

WTGFunctions::init();