<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

/**
 * If you are installing Timber as a Composer dependency in your theme, you'll need this block
 * to load your dependencies and initialize Timber. If you are using Timber via the WordPress.org
 * plug-in, you can safely delete this block.
 */
$composer_autoload = __DIR__ . '/../vendor/autoload.php';
if ( file_exists( $composer_autoload ) ) {
	require_once $composer_autoload;
	$timber = new Timber\Timber();
}

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if ( ! class_exists( 'Timber' ) ) {

	add_action(
		'admin_notices',
		function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		}
	);

	add_filter(
		'template_include',
		function( $template ) {
			return get_stylesheet_directory() . '/static/no-timber.html';
		}
	);
	return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array( 'templates', 'views' );

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Timber\Site {
	/** Add timber support. */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
		add_filter( 'timber/context', array( $this, 'add_to_context' ) );
		add_filter( 'timber/twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		parent::__construct();

		register_nav_menus([
			'header-navigation' => 'Header navigation',
			'footer-navigation' => 'Footer navigation'
		]);

		// ACF Global Options
		if (function_exists('acf_add_options_page')) {
			acf_add_options_page();
		}

		// Enqueue assets
		function _mghd_enqueue_assets() {
			// Enqueue styles
			wp_enqueue_style(
				'styles',
				get_template_directory_uri() . '/dist/assets/main.css',
				false,
				filemtime(get_template_directory() . '/dist/assets/main.css')
			);
			
			// Enqueue scripts
			wp_enqueue_script(
				'app',
				get_stylesheet_directory_uri() . '/dist/assets/main.js',
				['jquery'],
				filemtime(get_stylesheet_directory() . '/dist/assets/main.js'),
				true
			);
		}
		add_action('wp_enqueue_scripts', '_mghd_enqueue_assets');

		// Return an asset's path
		function asset($path) {
			return trailingslashit(get_template_directory_uri()) . 'dist/assets/' . $path;
		}

		// Disable Gutenberg
		add_filter('use_block_editor_for_post', '__return_false', 10);

		// Add the excerpt to pages
		add_post_type_support('page', 'excerpt');

		// Remove heading options from ALL text editors
		// Source: https://support.advancedcustomfields.com/forums/topic/wysiwyg-formatselect/
		add_filter('tiny_mce_before_init', function($settings) {
			$settings['block_formats'] = 'Paragraph=p;Heading=h2;Subheading=h3';
			return $settings;
		});
	}
	/** This is where you can register custom post types. */
	public function register_post_types() {

	}
	/** This is where you can register custom taxonomies. */
	public function register_taxonomies() {

	}

	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context( $context ) {
		$context['site'] = $this;
		$context['header_navigation'] = new Timber\Menu('header-navigation');
		$context['footer_navigation'] = new Timber\Menu('footer-navigation');
		$context['options'] = get_fields('option');

		return $context;
	}

	public function theme_supports() {
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

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support( 'menus' );
	}

	/** This Would return 'foo bar!'.
	 *
	 * @param string $text being 'foo', then returned 'foo bar!'.
	 */
	public function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}

	/** This is where you can add your own functions to twig.
	 *
	 * @param string $twig get extension.
	 */
	public function add_to_twig( $twig ) {
		$twig->addExtension( new Twig\Extension\StringLoaderExtension() );
		$twig->addFilter( new Twig\TwigFilter( 'myfoo', array( $this, 'myfoo' ) ) );
		return $twig;
	}

}

new StarterSite();

// Legacy
require __DIR__ . '/../hungertv-custom/hungertv-add-custom-post-types.php';

// Source: hunger-tv-legacy theme
function hungertv_parse_credits($credits, $wrap_in_aside="true") {
    $lines = "";
    if (strpos($credits, '@@@') !== false) {
      $lines = explode("\n", str_replace("\n\n", "\n", trim($credits)));
      for ($i = 0; $i < count($lines); $i++) {
        if (strpos($credits, '@@@') !== false && trim($lines[$i]) != "") {
          $lines[$i] = '<b>' . str_replace("@@@", '</b> ', $lines[$i]);
        }
      }
      if ($wrap_in_aside){
        return '<aside class="credits" data-lines="' . count($lines) .'"><span>' . implode('<br/>', $lines) . "</span></aside>";
      }else{
        return '<span>' . implode('<br/>', $lines) . "</span>";
      }

    }
  }
