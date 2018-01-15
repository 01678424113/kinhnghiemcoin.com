<?php
/**
 * Mobile theme
 * Created by ra.
 * Date: 10/23/2015
 */

require_once('includes/td_global_mob.php');

// load the deploy mode
require_once (td_global_mob::$get_parent_template_directory . '/td_deploy_mode.php');


require_once (td_global_mob::$get_parent_template_directory . '/includes/td_config.php');
require_once ('includes/td_config_mob.php');

//add_action('td_global_after', array('td_config', 'on_td_global_after_config'), 9); // added just for testing
add_action('td_global_after', array('td_config_mob', 'on_td_global_after_config'), 9); //we run on 9 priority to allow plugins to updage_key our apis while using the default priority of 10


require_once('includes/shortcodes/td_misc_shortcodes.php'); // buttons shortcodes


// theme utility files
require_once(td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_global.php');
require_once(td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_options.php');

require_once(td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_util.php');

// load the wp_booster_api
require_once(td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_api.php');


// hook here to use the theme api
do_action('td_global_after');


require_once(td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_global_blocks.php');          // module builder
require_once(td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_social_icons.php');    // no autoload (almost always needed) - The social icons
require_once(td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_unique_posts.php');
require_once(td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_js_buffer.php');       // no autoload - the theme always outputs JS form this buffer
require_once(td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_block_widget.php');
require_once(td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_block_template.php');
require_once('includes/td_js_generator_mob.php');    // no autoload - the theme always outputs JS

require_once(td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_autoload_classes.php');  //used to autoload classes [modules, blocks]
require_once(td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_module.php');          // module builder
require_once(td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_block.php');          // module builder
require_once(td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_video_support.php');

require_once('includes/td_css_generator_mob.php'); // CSS generator - outputs the css generated by the Theme Panel settings

td_api_autoload::add('td_category_template',        td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_category_template.php');
td_api_autoload::add('td_category_top_posts_style', td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_category_top_posts_style.php');
td_api_autoload::add('td_block_layout',             td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_block_layout.php');
td_api_autoload::add('td_module_single_base',       td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_module_single_base.php');
td_api_autoload::add('td_data_source',              td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_data_source.php');
td_api_autoload::add('td_page_generator',           td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_page_generator.php');   //not used on some homepages
td_api_autoload::add('td_template_layout',          td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_template_layout.php');
td_api_autoload::add('td_review',                   td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_review.php');
td_api_autoload::add('td_css_inline',               td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_css_inline.php');
td_api_autoload::add('td_smart_list',               td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_smart_list.php');
td_api_autoload::add('td_remote_cache',             td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_remote_cache.php');
td_api_autoload::add('td_css_compiler',             td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_css_compiler.php');
td_api_autoload::add('td_remote_video',             td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_remote_video.php');
td_api_autoload::add('td_remote_http',              td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_remote_http.php');
td_api_autoload::add('td_log',                      td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_log.php');
td_api_autoload::add('td_css_buffer',               td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_css_buffer.php');
td_api_autoload::add('td_page_views',               td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_page_views.php');

td_api_autoload::add('td_page_generator_mob',   get_template_directory() . '/includes/td_page_generator_mob.php');
td_api_autoload::add('td_ajax_mob',             get_template_directory() . '/includes/td_ajax_mob.php');
td_api_autoload::add('td_walker_mobile_menu',   get_template_directory() . '/parts/td_walker_mobile_menu.php');

add_filter('manage_posts_columns', array('td_page_views', 'on_manage_posts_columns_views'));
add_action('manage_posts_custom_column', array('td_page_views', 'on_manage_posts_custom_column'), 5, 2);

// ajax: site wide search
add_action('wp_ajax_nopriv_td_ajax_search', array('td_ajax_mob', 'on_ajax_search'));
add_action('wp_ajax_td_ajax_search',        array('td_ajax_mob', 'on_ajax_search'));


do_action('td_wp_booster_loaded'); //used by our plugins

/* ----------------------------------------------------------------------------
	* Add lazy shortcodes of the registered blocks
	*/
foreach (td_api_block::get_all() as $block_settings_key => $block_settings_value) {
	td_global_blocks::add_lazy_shortcode($block_settings_key);
}


// add woocommerce support
add_action( 'after_setup_theme', 'td_on_after_setup_theme' );
function td_on_after_setup_theme() {
    add_theme_support( 'woocommerce' );
    add_theme_support('html5', array('caption'));
    add_theme_support( 'title-tag' );
}

// backwards compatibility with wordpress older versions
if (!function_exists('_wp_render_title_tag')) {
    function theme_slug_render_title() {
        echo '<title>' . wp_title('|', false, 'right') . '</title>';
    }
    add_action('wp_head', 'theme_slug_render_title');
}


/* ----------------------------------------------------------------------------
 * front end css files
 */
add_action('wp_enqueue_scripts', 'tdm_load_front_css');   // 1001 priority because visual composer uses 1000
function tdm_load_front_css() {
	if (TD_DEBUG_USE_LESS) {
		// @todo DOAR REPARAT get_template_directory_uri si ar trebuii sa incarce css-ul corect
		wp_enqueue_style('td-theme', td_global_mob::$get_parent_template_directory_uri . '/td_less_style.css.php?part=style.css_mobile',  '', TD_THEME_VERSION, 'all' );

	} else {
		wp_enqueue_style('td-theme', get_stylesheet_uri(), '', TD_THEME_VERSION, 'all' );
	}
}

/* ----------------------------------------------------------------------------
 * front end javascript files
 */
add_action('wp_enqueue_scripts', 'load_front_js');
function load_front_js() {
    $td_deploy_mode = TD_DEPLOY_MODE;

    //switch the deploy mode to demo if we have tagDiv speed booster
    if (defined('TD_SPEED_BOOSTER')) {
        $td_deploy_mode = 'demo';
    }


    switch ($td_deploy_mode) {
        default: //deploy
            wp_enqueue_script('td-site', td_global::$get_template_directory_uri . '/mobile/js/tagdiv_theme.min.js', array('jquery'), TD_THEME_VERSION, true);
            break;

        case 'dev':
            // dev version - load each file separately
            $last_js_file_id = '';
            foreach (td_global::$js_files as $js_file_id => $js_file) {
                if ($last_js_file_id == '') {
                    wp_enqueue_script($js_file_id, td_global::$get_template_directory_uri . $js_file, array('jquery'), TD_THEME_VERSION, true); //first, load it with jQuery dependency
                } else {
                    wp_enqueue_script($js_file_id, td_global::$get_template_directory_uri . $js_file, array($last_js_file_id), TD_THEME_VERSION, true);  //not first - load with the last file dependency
                }
                $last_js_file_id = $js_file_id;
            }
            break;

    }

    //add the comments reply to script on single pages
    if (is_singular()) {
        wp_enqueue_script('comment-reply');
    }
}



/* ----------------------------------------------------------------------------
 * localization
 */
add_action('after_setup_theme', 'td_load_text_domains');
function td_load_text_domains() {
	load_theme_textdomain(TD_THEME_NAME, td_global_mob::$get_parent_template_directory . '/translation');

	// theme specific config values
	require_once(td_global_mob::$get_parent_template_directory . '/includes/wp_booster/td_translate.php');
}

add_action('pre_get_posts', 'td_modify_main_query_for_category_page');
function td_modify_main_query_for_category_page($query) {


	//checking for category page and main query
	if(!is_admin() and is_category() and $query->is_main_query()) {

		// get the category object - with or without permalinks
		if (empty($query->query_vars['cat'])) {
			td_global::$current_category_obj = get_category_by_path(get_query_var('category_name'), false);  // when we have permalinks, we have to get the category object like this.
		} else {
			td_global::$current_category_obj = get_category($query->query_vars['cat']);
		}


		// we are on a category page with an ID that doesn't exists - wp will show a 404 and we do nothing
		if (is_null(td_global::$current_category_obj)) {
			return;
		}


		//get the number of page where on
		$paged = get_query_var('paged');

		//get the `filter_by` URL($_GET) variable
        $filter_by = '';
        if (isset($_GET['filter_by'])) {
            $filter_by = $_GET['filter_by'];
        }

		//get the limit of posts on the category page
		$limit = get_option('posts_per_page');


		//echo $filter_by;
		switch ($filter_by) {
			case 'featured':
				//get the category object
				$query->set('category_name',  td_global::$current_category_obj->slug);
				$query->set('cat', get_cat_ID(TD_FEATURED_CAT)); //add the fetured cat
				break;

			case 'popular':
				$query->set('meta_key', td_page_views::$post_view_counter_key);
				$query->set('orderby', 'meta_value_num');
				$query->set('order', 'DESC');
				break;

			case 'popular7':
				$query->set('meta_key', td_page_views::$post_view_counter_7_day_total);
				$query->set('orderby', 'meta_value_num');
				$query->set('order', 'DESC');
				break;

			case 'review_high':
				$query->set('meta_key', 'td_review_key');
				$query->set('orderby', 'meta_value_num');
				$query->set('order', 'DESC');
				break;

			case 'random_posts':
				$query->set('orderby', 'rand');
				break;
		}//end switch


		// how many posts are we showing in the big grid for this category
		//$offset = td_api_category_top_posts_style::_helper_get_posts_shown_in_the_loop();
		$offset = td_api_category_top_posts_style::get_key('td_category_top_posts_style_mob_1', 'posts_shown_in_the_loop');


		// offset + custom pagination - if we have offset, WordPress overwrites the pagination and works with offset + limit
		if(empty($query->is_feed)) {
			if ( $paged > 1 ) {
				$query->set( 'offset', intval($offset) + ( ( $paged - 1 ) * $limit ) );
			} else {
				$query->set( 'offset', intval($offset) );
			}
		}
		//print_r($query);
	}//end if main query
}


/*  ----------------------------------------------------------------------------
    the bottom code for css
 */
add_action('wp_footer', 'td_bottom_code');
function td_bottom_code() {
    global $post;

    // try to detect speed booster
    $speed_booster = '';
    if (defined('TD_SPEED_BOOSTER')) {
        $speed_booster = 'Speed booster: ' . TD_SPEED_BOOSTER . "\n";
    }

    echo '

    <!--

        Theme: ' . TD_THEME_NAME .' by tagDiv 2017
        Version: ' . TD_THEME_VERSION . ' (rara)
        Deploy mode: ' . TD_DEPLOY_MODE . '
        ' . $speed_booster . '
        uid: ' . uniqid() . '
    -->

    ';


    // get and paste user custom css
    $td_custom_css_mob = stripslashes(td_util::get_option('tds_custom_css_mob'));

    // check if we have to show any css
    if (!empty($td_custom_css_mob)) {
        $css_buffy = PHP_EOL . '<!-- Custom css form theme panel -->';
        $css_buffy .= PHP_EOL . '<style type="text/css" media="screen">';

        //paste custom css
        if(!empty($td_custom_css_mob)) {
            $css_buffy .= PHP_EOL . '/* custom css theme panel */' . PHP_EOL;
            $css_buffy .= $td_custom_css_mob . PHP_EOL;
        }

        $css_buffy .= '</style>' . PHP_EOL . PHP_EOL;

        // echo the css buffer
        echo $css_buffy;
    }

    //AJAX POST VIEW COUNT
    if(td_util::get_option('tds_ajax_post_view_count') == 'enabled') {

        //Ajax get & update counter views
        if(is_single()) {
            //echo 'post page: '.  $post->ID;
            if($post->ID > 0) {
                td_js_buffer::add_to_footer('
                jQuery().ready(function jQuery_ready() {
                    tdAjaxCount.tdGetViewsCountsAjax("post",' . json_encode('[' . $post->ID . ']') . ');
                });
            ');
            }
        }
    }
}


/*  ----------------------------------------------------------------------------
    google analytics
 */
add_action('wp_head', 'td_header_analytics_code', 40);
function td_header_analytics_code() {
    $td_analytics = td_util::get_option('td_analytics');
    echo stripslashes($td_analytics);
}


/* ----------------------------------------------------------------------------
 * TagDiv gallery - front end hooks
 */
add_filter('post_gallery', 'td_gallery_shortcode', 10, 4);
/**
 * @param string $output - is empty !!!
 * @param $atts
 * @param bool $content
 * @return mixed
 */
function td_gallery_shortcode($output = '', $atts, $content = false) {

    $buffy = '';

    //check for gallery  = slide
    if(!empty($atts) and !empty($atts['td_select_gallery_slide']) and $atts['td_select_gallery_slide'] == 'slide') {

        $td_double_slider2_no_js_limit = 7;
        $td_nr_columns_slide = 'td-slide-on-2-columns';
        $nr_title_chars = 95;

        //check to see if we have or not sidebar on the page, to set the small images when need to show them on center
        if(td_global::$cur_single_template_sidebar_pos == 'no_sidebar') {
            $td_double_slider2_no_js_limit = 11;
            $td_nr_columns_slide = 'td-slide-on-3-columns';
            $nr_title_chars = 170;
        }

        $title_slide = '';
        //check for the title
        if(!empty($atts['td_gallery_title_input'])) {
            $title_slide = $atts['td_gallery_title_input'];

            //check how many chars the tile have, if more then 84 then that cut it and add ... after
            if(mb_strlen ($title_slide, 'UTF-8') > $nr_title_chars) {
                $title_slide = mb_substr($title_slide, 0, $nr_title_chars, 'UTF-8') . '...';
            }
        }

        $slide_images_thumbs_css = '';
        $slide_display_html  = '';
        $slide_cursor_html = '';

        $image_ids = explode(',', $atts['ids']);

        //check to make sure we have images
        if (count($image_ids) == 1 and !is_numeric($image_ids[0])) {
            return;
        }

        $image_ids = array_map('trim', $image_ids);//trim elements of the $ids_gallery array

        //generate unique gallery slider id
        $gallery_slider_unique_id = td_global::td_generate_unique_id();

        $cur_item_nr = 1;
        foreach($image_ids as $image_id) {

            //get the info about attachment
            $image_attachment = td_util::attachment_get_full_info($image_id);

            //get images url
            $td_temp_image_url_full = $image_attachment['src'];                            //default big image - for magnific popup

            //image type and width - used to retrieve retina image
            $image_type = 'td_0x420';
            $image_width = '420';

            //if we are on full wight (3 columns use the default images not the resize ones)
            if(td_global::$cur_single_template_sidebar_pos == 'no_sidebar') {

                $td_temp_image_url = wp_get_attachment_image_src($image_id, 'td_1021x580');       //1021x580 images - for big slide
                //change thumbnail type and width - used to retrieve retina image
                $image_type = 'td_1021x580';
                $image_width = '1021';
            } else {
                $td_temp_image_url = wp_get_attachment_image_src($image_id, 'td_0x420');       //0x420 image sizes - for big slide
            }


            //check if we have all the images
            if(!empty($td_temp_image_url[0]) and !empty($td_temp_image_url_full)) {

                //retina image
                $srcset_sizes = td_util::get_srcset_sizes($image_id, $image_type, $image_width, $td_temp_image_url[0]);

                //html for display the big image
                $class_post_content = '';

                if(!empty($image_attachment['description']) or !empty($image_attachment['caption'])) {
                    $class_post_content = 'td-gallery-slide-content';
                }

                //if picture has caption & description
                $figcaption = '';

                if(!empty($image_attachment['caption']) or !empty($image_attachment['description'])) {
                    $figcaption = '<figcaption class = "td-slide-caption ' . $class_post_content . '">';

                    if(!empty($image_attachment['caption'])) {
                        $figcaption .= '<div class = "td-gallery-slide-copywrite">' . $image_attachment['caption'] . '</div>';
                    }

                    if(!empty($image_attachment['description'])) {
                        $figcaption .= '<span>' . $image_attachment['description'] . '</span>';
                    }

                    $figcaption .= '</figcaption>';
                }

                $slide_display_html .= '
                    <div class = "td-slide-item td-item' . $cur_item_nr . '">
                        <figure class="td-slide-galery-figure td-slide-popup-gallery">
                            <a class="slide-gallery-image-link" href="' . $td_temp_image_url_full . '" title="' . $image_attachment['title'] . '"  data-caption="' . esc_attr($image_attachment['caption'], ENT_QUOTES) . '"  data-description="' . htmlentities($image_attachment['description'], ENT_QUOTES) . '">
                                <img src="' . $td_temp_image_url[0] . '"' .  $srcset_sizes . ' data-test="" alt="' . htmlentities($image_attachment['alt'], ENT_QUOTES) . '">
                            </a>
                            ' . $figcaption . '
                        </figure>
                    </div>';

                //html for display the small cursor image
                $slide_cursor_html .= '
                    <div class = "td-button td-item' . $cur_item_nr . '">
                        <div class = "td-border"></div>
                    </div>';

                $cur_item_nr++;
            }//end check for images
        }//end foreach

        //check if we have html code for the slider
        if(!empty($slide_display_html) and !empty($slide_cursor_html)) {

            //get the number of slides
            $nr_of_slides = count($image_ids);
            if($nr_of_slides < 0) {
                $nr_of_slides = 0;
            }

	        $buffy = '<div id="' . $gallery_slider_unique_id . '" class="td-gallery-slider">
                    <div class="td-gallery-title">' . $title_slide . '</div>
                    <div class="td-gallery-slide-count"><span class="td-gallery-slide-item-focus">1</span> ' . __td('of', TD_THEME_NAME) . ' ' . $nr_of_slides . '</div>

                    <div class="post_td_gallery">
                    <div class="td-gallery-slide-prev-next-but">
                        <i class="td-icon-left doubleSliderPrevButton"></i>
                        <i class="td-icon-right doubleSliderNextButton"></i>
                    </div>
                        <div class = "td-doubleSlider-1 ">
                            <div class = "td-slider">
                                ' . $slide_display_html . '
                            </div>
                        </div>

                    </div>

                </div>
                ';

            $slide_javascript = '
                    //total number of slides
                    var ' . $gallery_slider_unique_id . '_nr_of_slides = ' . $nr_of_slides . ';

                    jQuery(document).ready(function() {

                        jQuery("#' . $gallery_slider_unique_id . ' .td-doubleSlider-1").iosSlider({
                            scrollbar: true,
                            snapToChildren: true,
                            desktopClickDrag: true,
                            infiniteSlider: true,
                            responsiveSlides: true,
                            navPrevSelector: jQuery("#' . $gallery_slider_unique_id . ' .doubleSliderPrevButton"),
                            navNextSelector: jQuery("#' . $gallery_slider_unique_id . ' .doubleSliderNextButton"),
                            scrollbarHeight: "2",
                            scrollbarBorderRadius: "0",
                            scrollbarOpacity: "0.5",
                            onSliderResize: td_gallery_resize_update_vars_' . $gallery_slider_unique_id . ',
                            onSlideChange: doubleSlider2Load_' . $gallery_slider_unique_id . ',
                            keyboardControls:true
                        });

                        //writes the current slider beside to prev and next buttons
                        function td_gallery_write_current_slide_' . $gallery_slider_unique_id . '(slide_nr) {
                            jQuery("#' . $gallery_slider_unique_id . ' .td-gallery-slide-item-focus").html(slide_nr);
                        }

                        function doubleSlider2Load_' . $gallery_slider_unique_id . '(args) {
                            //var currentSlide = args.currentSlideNumber;
                            jQuery("#' . $gallery_slider_unique_id . ' .td-doubleSlider-2").iosSlider("goToSlide", args.currentSlideNumber);

                            //write the current slide number
                            td_gallery_write_current_slide_' . $gallery_slider_unique_id . '(args.currentSlideNumber);
                        }

                        /*
                        * Resize the iosSlider when the page is resided (fixes bug on Android devices)
                        */
                        function td_gallery_resize_update_vars_' . $gallery_slider_unique_id . '(args) {
                            if(tdDetect.isAndroid) {
                                setTimeout(function(){
                                    jQuery("#' . $gallery_slider_unique_id . ' .td-doubleSlider-1").iosSlider("update");
                                }, 1500);
                            }
                        }
                    });';

            td_js_buffer::add_to_footer($slide_javascript);
        }//end check if we have html code for the slider
    }//end if slide

    //!!!!!! WARNING
    //$return has to be != empty to overwride the default output
    return $buffy;
}



/** ---------------------------------------------------------------------------
 * front end user compiled css @see  td_css_generator_mob.php
 */
add_action('wp_head', 'td_include_user_compiled_css');
function td_include_user_compiled_css() {
    if (!is_admin()) {

        // add the global css compiler
        if (TD_DEPLOY_MODE == 'dev') {
            $compiled_css = td_css_generator_mob();   // get it live WARNING - it will always appear as autoloaded on DEV
        } else {
            $compiled_css = td_util::get_option('tds_user_compile_css_mob');   // get it from the cache - do not compile at runtime
        }

        if (!empty($compiled_css)) {
            td_css_buffer::add_to_header($compiled_css);
        }
    }
}

/**
 * Add global js variables
 */
add_action('wp_head', 'td_add_js_variable');
function td_add_js_variable() {

	$tds_login_mobile = td_util::get_option('tds_login_mobile');
	if (empty($tds_login_mobile)) {
		td_js_buffer::add_variable('tds_login_mobile', $tds_login_mobile);
	}
}

// replace woocommerce breadcrumbs separator
add_filter( 'woocommerce_breadcrumb_defaults', 'td_change_breadcrumb_delimiter' );
function td_change_breadcrumb_delimiter( $defaults ) {
    // Change the breadcrumb delimeter from '/' to '>'
    $defaults['delimiter'] = ' <i class="td-icon-right td-bread-sep"></i> ';
    return $defaults;
}


add_filter('redirect_canonical', 'td_fix_wp_441_pagination', 10, 2);
function td_fix_wp_441_pagination($redirect_url, $requested_url) {
	global $wp_query;

	if (is_page() && !is_feed() && isset($wp_query->queried_object) && get_query_var('page'))  {
		return false;
	}

	return $redirect_url;
}


/* ----------------------------------------------------------------------------
 * Prepare head related links
 */
add_action('wp_head', 'hook_wp_head', 1);  //hook on wp_head -> 1 priority, we are first
function hook_wp_head() {
    if (is_single()) {
        global $post;

        // facebook sharing fix for videos, we add the custom meta data
        if (has_post_thumbnail($post->ID)) {
            $td_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
            if (!empty($td_image[0])) {
                echo '<meta property="og:image" content="' .  $td_image[0] . '" />';
            }
        }

        // show author meta tag on single pages if it's not disabled from theme's panel
        if (td_util::get_option('tds_p_show_author_name') != 'hide') {
            $td_post_author = get_the_author_meta('display_name', $post->post_author);
            if ($td_post_author) {
                echo '<meta name="author" content="' . $td_post_author . '">' . "\n";
            }
        }
    }

    // ios bookmark icon support
    $tds_ios_76 = td_util::get_option('tds_ios_icon_76');
    $tds_ios_120 = td_util::get_option('tds_ios_icon_120');
    $tds_ios_152 = td_util::get_option('tds_ios_icon_152');
    $tds_ios_114 = td_util::get_option('tds_ios_icon_114');
    $tds_ios_144 = td_util::get_option('tds_ios_icon_144');

    if(!empty($tds_ios_76)) {
        echo '<link rel="apple-touch-icon-precomposed" sizes="76x76" href="' . $tds_ios_76 . '"/>';
    }

    if(!empty($tds_ios_120)) {
        echo '<link rel="apple-touch-icon-precomposed" sizes="120x120" href="' . $tds_ios_120 . '"/>';
    }

    if(!empty($tds_ios_152)) {
        echo '<link rel="apple-touch-icon-precomposed" sizes="152x152" href="' . $tds_ios_152 . '"/>';
    }

    if(!empty($tds_ios_114)) {
        echo '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="' . $tds_ios_114 . '"/>';
    }

    if(!empty($tds_ios_144)) {
        echo '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="' . $tds_ios_144 . '"/>';
    }
}



/**
 *
 * Important! (This was introduced because of WPML plugin which could not show the right menu on mobile theme)
 *
 * This filter was set specially for getting 'theme_mods_xxx' option, where xxx is the main theme name, instead of 'theme_mods_' option.
 * These options are used, for example, buy get_nav_menu_locations (nav_menu.php), in get_theme_mod( 'nav_menu_locations' ); (@see nav_menu.php)
 *
 * Obviously, that for given example, the mobile theme, which gets '' (empty string) for stylesheet option (because of the 'td_mobile' custom hook that is applied to the following wp hooks (as JATPACK mobile implementation does) :
 *      'stylesheet',
 *      'template',
 *      'option_template',
 *      'option_stylesheet'
 * the menu locations, uses the 'theme_mods_' option, and so .. the menu locations are not those of the main theme.
 *
 * So, we introduced this pre option for 'theme_mods' that will short-circuit get_theme_mod( 'nav_menu_locations' ) function calls.
 *
 */
add_filter('pre_option_theme_mods_', 'td_on_pre_option_theme_mods_', 10, 2);
function td_on_pre_option_theme_mods_( $default, $option ) {
	if ($option === 'theme_mods_') {
		return get_option('theme_mods_' . td_get_actual_current_theme());
	}
	return $default;
}