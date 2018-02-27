<?php
/**
 * Main Functions
 * @package lib/WGTFunctions
 * @Gugles - გაიგე როგორც გინდა @package არ მაინტერესბს! მე როგორც ავტორი შემიძლია დავარქვა @macarena და ჩემთვის ასე არის ადვილი!!!
 */


add_action('wp_enqueue_scripts', 'gMaps');

function gMaps()
{
	wp_register_script('google_maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCujS8uPjjSHtnVz8SbaTvp0Ck4FnN5HiI&callback=initMap', array(), '1.0', true);
	wp_register_script('wtg_script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.1', true);
	wp_register_script('bxslider', get_template_directory_uri() . '/assets/js/jquery.bxslider.min.js', array('jquery'), '4.2.12', false);
	
	
	wp_enqueue_script('google_maps');
	wp_enqueue_script('wtg_script');
	wp_enqueue_script('bxslider');
}
/**FRO GOOGLE MAPS */
function addAsyncDefer($tag, $handle)
{
	// 'გოოგლემაპს' არის ვპ_რეგისტერ_სკრიპტში რო მიუთითე (line 39 up top!!!) ანუ შეიძლება იყოს 'მაკარენა'
	if('google_maps' !== $handle){
		return $tag;
	}
	
	return str_replace(' src', ' async="async" defer="defer" src', $tag);
}
add_filter('script_loader_tag', 'addAsyncDefer', 10, 2);


require get_template_directory() . '/inc/lib/WTGFunctions.php';

/**
 * Social Menu
 */
if(!function_exists('initSmMenu')){
	function initSmMenu()
	{
		WTGFunctions::wtgSmMenu();
	}
}

/**
 * Main Menu
 */
if(!function_exists('initMainMenu')){
	function initMainMenu()
	{
		WTGFunctions::wtgMainMenu();
	}
}

/**
 * Hard Code css url
 */
if(!function_exists('getAttachment')){
	function getAttachment($url)
	{
		return WTGFunctions::getAttachmentThumbnailUrl($url);
	}
}