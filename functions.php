<?php
/*
Author: Eddie Machado
URL: http://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, etc.
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/bones.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function bones_ahoy() {

  //Allow editor style.
  add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

  // let's get language support going, if you need it
  load_theme_textdomain( 'bonestheme', get_template_directory() . '/library/translation' );

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  require_once( 'library/custom-post-type.php' );

  // launching operation cleanup
  add_action( 'init', 'bones_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'bones_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'bones_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  bones_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'bones_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'bones_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'bones_excerpt_more' );

} /* end bones ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'bones_ahoy' );

/**
 * Enqueue scripts and styles.
 */

 /*=====================================================here still doesnt work =====================*/
function waltz_scripts() {

  if( is_front_page() ) {
    wp_enqueue_style('hero', get_template_directory_uri() . '/library/css/hero.css' );
  }
  if( is_home() ) {
    wp_enqueue_style('index', get_template_directory_uri() . '/library/css/index.css' );
  }
  if( is_page('menu') || is_page('access') ) {
    wp_enqueue_style('menu', get_template_directory_uri() . '/library/css/menu.css' );
  }
  if( is_single() ) {
    wp_enqueue_style('single', get_template_directory_uri() . '/library/css/single.css' );
  }
  if( is_single() || is_single('single_origin') || is_single('harbal_tea') || is_single('blend') ) {
    wp_enqueue_style('style', get_template_directory_uri() . '/library/css/icomoon/style.css' );
  }
  if( !is_front_page() || !is_page('menu') || !is_page('access') ) {
    wp_enqueue_style('news', get_template_directory_uri() . '/library/css/news.css' );
  }

  if (get_post_type() === 'single_origin' && is_single() ||
      get_post_type() === 'harbal_tea' && is_single() ||
      get_post_type() === 'blend' && is_single()) {
    wp_enqueue_style('single-custom', get_template_directory_uri() . '/library/css/single-custom.css' );
	} 

}
add_action( 'wp_enqueue_scripts', 'waltz_scripts' );

/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'bones-thumb-600' => __('600px by 150px'),
        'bones-thumb-300' => __('300px by 100px'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* THEME CUSTOMIZE *********************/

/* 
  A good tutorial for creating your own Sections, Controls and Settings:
  http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722
  
  Good articles on modifying the default options:
  http://natko.com/changing-default-wordpress-theme-customization-api-sections/
  http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162
  
  To do:
  - Create a js for the postmessage transport method
  - Create some sanitize functions to sanitize inputs
  - Create some boilerplate Sections, Controls and Settings
*/

function bones_theme_customizer($wp_customize) {
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections 

  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');
  
  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action( 'customize_register', 'bones_theme_customizer' );

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar( array(
		'name'          => esc_html__( '検索バー', 'waltz' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'ここには検索フォーム以外、追加できません。', 'waltz' ),
		'before_widget' => '<section id="%1$s" class="%2$s">',
		'after_widget'  => '</section>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'サイドバー', 'waltz' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'サイドバーに表示したいアイテムを、ここで追加できます。', 'waltz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="sidebar-title"><h3><span>',
		'after_title'   => '</span></h3></div>',
  ) );
  register_sidebar( array(
		'name'          => esc_html__( 'フッター', 'waltz' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'フッターに表示したいアイテムを、ここで追加できます。', 'waltz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s footer__contents">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer__contents__title"><h4><span>',
		'after_title'   => '</span></h4></div>',
  ) );
  register_sidebar( array(
		'name'          => esc_html__( 'ブログ用サイドバー', 'waltz' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'ブログのページのサイドバーに表示したいアイテムを、ここで追加できます。', 'waltz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="sidebar-title"><h3><span>',
		'after_title'   => '</span></h3></div>',
  ) );

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'bonestheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!


/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds.
*/


register_nav_menus( array(
  'main-menu' => 'メインメニュー',
  'banner-list' => 'バナーリスト',
) );

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu
{   
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
		    $slug = get_post_field( 'post_name', get_post($item) );
        $output .= '<li itemprop="name">';
        $item_output .= '<a itemprop="url" href="'. $item->url .'"><p class="slug">' .$item->attr_title . '</p><span>'. $item->title . '</span></a>';
        $output .= apply_filters('walker_nav_menu_start_el',
                                  $item_output,
                                  $item,
                                  $depth,
								                  $args);
	  }
}

class Custom_Walker_Banner_List extends Walker_Nav_Menu
{   
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
		  $thumb_url = get_the_post_thumbnail_url($item);
        $output .= '<li class="banner-list">';
        $item_output .= '<img src="'.$thumb_url.'" alt="'. $item->title . '"><a class="banner-description" href="'. $item->url .'"><h3>'. $item->title . '</h3></a><p>記事を読む</p>';
        $output .= apply_filters('walker_nav_menu_start_el',
                                  $item_output,
                                  $item,
                                  $depth,
								                  $args);
	  }
}

// REMOVE 'Archive' FROM THE ARCHIVE TITLE
add_filter( 'get_the_archive_title', function ($title) {
  if (is_category()) {
      $title = single_cat_title('',false);
  } elseif (is_tag()) {
      $title = single_tag_title('',false);
  } elseif (is_tax()) {
      $title = single_term_title('',false);
  } elseif (is_post_type_archive() ){
    $title = post_type_archive_title('',false);
  } elseif (is_date()) {
      $title = get_the_time('Y年n月');
  } elseif (is_search()) {
      $title = '検索結果：'.esc_html( get_search_query(false) );
  } elseif (is_404()) {
      $title = '「404」ページが見つかりません';
  } else {

  }
    return $title;
});

// BREADCRUMB
if ( ! function_exists( 'custom_breadcrumb' ) ) {
  function custom_breadcrumb() {

    // トップページでは何も出力しないように
    if ( is_front_page() ) return false;

    //そのページのWPオブジェクトを取得
    $wp_obj = get_queried_object();

    echo '<div id="breadcrumb">'.  //id名などは任意で
      '<ul>'.
        '<li>'.
          '<a href="'. esc_url( home_url() ) .'"><span>ホーム</span></a>'.
        '</li>';

    if ( is_attachment() ) {

      /**
       * 添付ファイルページ ( $wp_obj : WP_Post )
       * ※ 添付ファイルページでは is_single() も true になるので先に分岐
       */
      $post_title = apply_filters( 'the_title', $wp_obj->post_title );
      echo ' &nbsp;&gt;&nbsp;<li><span>'. esc_html( $post_title ) .'</span></li>';

    } elseif ( is_single() ) {

      /**
       * 投稿ページ ( $wp_obj : WP_Post )
       */
      $post_id    = $wp_obj->ID;
      $post_type  = $wp_obj->post_type;
      $post_title = apply_filters( 'the_title', $wp_obj->post_title );

      // カスタム投稿タイプかどうか
      if ( $post_type !== 'post' ) {

        $the_tax = "";  //そのサイトに合わせて投稿タイプごとに分岐させて明示的に指定してもよい

        // 投稿タイプに紐づいたタクソノミーを取得 (投稿フォーマットは除く)
        $tax_array = get_object_taxonomies( $post_type, 'names');
        foreach ($tax_array as $tax_name) {
            if ( $tax_name !== 'post_format' ) {
                $the_tax = $tax_name;
                break;
            }
        }

        $post_type_link = esc_url( get_post_type_archive_link( $post_type ) );
        $post_type_label = esc_html( get_post_type_object( $post_type )->label );

        //カスタム投稿タイプ名の表示
        echo ' &nbsp;&gt;&nbsp;<li>'.
              '<a href="'. $post_type_link .'">'.
                '<span>'. $post_type_label .'</span>'.
              '</a>'.
            '</li>';

        } else {

          $the_tax = 'category';  //通常の投稿の場合、カテゴリーを表示

        }

        // 投稿に紐づくタームを全て取得
        $terms = get_the_terms( $post_id, $the_tax );

        // タクソノミーが紐づいていれば表示
        if ( $terms !== false ) {

          $child_terms  = array();  // 子を持たないタームだけを集める配列
          $parents_list = array();  // 子を持つタームだけを集める配列

          //全タームの親IDを取得
          foreach ( $terms as $term ) {
            if ( $term->parent !== 0 ) {
              $parents_list[] = $term->parent;
            }
          }

          //親リストに含まれないタームのみ取得
          foreach ( $terms as $term ) {
            if ( ! in_array( $term->term_id, $parents_list ) ) {
              $child_terms[] = $term;
            }
          }

          // 最下層のターム配列から一つだけ取得
          $term = $child_terms[0];

          if ( $term->parent !== 0 ) {

            // 親タームのIDリストを取得
            $parent_array = array_reverse( get_ancestors( $term->term_id, $the_tax ) );

            foreach ( $parent_array as $parent_id ) {
              $parent_term = get_term( $parent_id, $the_tax );
              $parent_link = esc_url( get_term_link( $parent_id, $the_tax ) );
              $parent_name = esc_html( $parent_term->name );
              echo ' &nbsp;&gt;&nbsp;<li>'.
                    '<a href="'. $parent_link .'">'.
                      '<span>'. $parent_name .'</span>'.
                    '</a>'.
                  '</li>';
            }
          }

          $term_link = esc_url( get_term_link( $term->term_id, $the_tax ) );
          $term_name = esc_html( $term->name );
          // 最下層のタームを表示
          echo ' &nbsp;&gt;&nbsp;<li>'.
                '<a href="'. $term_link .'">'.
                  '<span>'. $term_name .'</span>'.
                '</a>'.
              '</li>';
        }

        // 投稿自身の表示
        echo ' &nbsp;&gt;&nbsp;<li><span>'. esc_html( strip_tags( $post_title ) ) .'</span></li>';

    } elseif ( is_page() || is_home() ) {

      /**
       * 固定ページ ( $wp_obj : WP_Post )
       */
      $page_id    = $wp_obj->ID;
      $page_title = apply_filters( 'the_title', $wp_obj->post_title );

      // 親ページがあれば順番に表示
      if ( $wp_obj->post_parent !== 0 ) {
        $parent_array = array_reverse( get_post_ancestors( $page_id ) );
        foreach( $parent_array as $parent_id ) {
          $parent_link = esc_url( get_permalink( $parent_id ) );
          $parent_name = esc_html( get_the_title( $parent_id ) );
          echo ' &nbsp;&gt;&nbsp;<li>'.
                '<a href="'. $parent_link .'">'.
                  '<span>'. $parent_name .'</span>'.
                '</a>'.
              '</li>';
        }
      }
      // 投稿自身の表示
      echo ' &nbsp;&gt;&nbsp;<li><span>'. esc_html( strip_tags( $page_title ) ) .'</span></li>';

    } elseif ( is_post_type_archive() ) {

      /**
       * 投稿タイプアーカイブページ ( $wp_obj : WP_Post_Type )
       */
      echo ' &nbsp;&gt;&nbsp;<li><span>'. esc_html( $wp_obj->label ) .'</span></li>';

    } elseif ( is_date() ) {

      /**
       * 日付アーカイブ ( $wp_obj : null )
       */
      $year  = get_query_var('year');
      $month = get_query_var('monthnum');
      $day   = get_query_var('day');

      if ( $day !== 0 ) {
        //日別アーカイブ
        echo ' &nbsp;&gt;&nbsp;<li>'.
              '<a href="'. esc_url( get_year_link( $year ) ) .'"><span>'. esc_html( $year ) .'年</span></a>'.
            '</li>'.
            ' &nbsp;&gt;&nbsp;<li>'.
              '<a href="'. esc_url( get_month_link( $year, $month ) ) . '"><span>'. esc_html( $month ) .'月</span></a>'.
            '</li>'.
            ' &nbsp;&gt;&nbsp;<li>'.
              '<span>'. esc_html( $day ) .'日</span>'.
            '</li>';

      } elseif ( $month !== 0 ) {
        //月別アーカイブ
        echo ' &nbsp;&gt;&nbsp;<li>'.
              '<a href="'. esc_url( get_year_link( $year ) ) .'"><span>'. esc_html( $year ) .'年</span></a>'.
            '</li>'.
            ' &nbsp;&gt;&nbsp;<li>'.
              '<span>'. esc_html( $month ) .'月</span>'.
            '</li>';

      } else {
        //年別アーカイブ
        echo ' &nbsp;&gt;&nbsp;<li><span>'. esc_html( $year ) .'年</span></li>';

      }

    } elseif ( is_author() ) {

      /**
       * 投稿者アーカイブ ( $wp_obj : WP_User )
       */
      echo ' &nbsp;&gt;&nbsp;<li><span>'. esc_html( $wp_obj->display_name ) .' の執筆記事</span></li>';

    } elseif ( is_archive() ) {

      /**
       * タームアーカイブ ( $wp_obj : WP_Term )
       */
      $term_id   = $wp_obj->term_id;
      $term_name = $wp_obj->name;
      $tax_name  = $wp_obj->taxonomy;

      /* ここでタクソノミーに紐づくカスタム投稿タイプを出力しても良いでしょう。 */

      // 親ページがあれば順番に表示
      if ( $wp_obj->parent !== 0 ) {

        $parent_array = array_reverse( get_ancestors( $term_id, $tax_name ) );
        foreach( $parent_array as $parent_id ) {
          $parent_term = get_term( $parent_id, $tax_name );
          $parent_link = esc_url( get_term_link( $parent_id, $tax_name ) );
          $parent_name = esc_html( $parent_term->name );
          echo ' &nbsp;&gt;&nbsp;<li>'.
                '<a href="'. $parent_link .'">'.
                  '<span>'. $parent_name .'</span>'.
                '</a>'.
              '</li>';
        }
      }

      // ターム自身の表示
      echo ' &nbsp;&gt;&nbsp;<li>'.
            '<span>'. esc_html( $term_name ) .'</span>'.
          '</li>';


    } elseif ( is_search() ) {

      /**
       * 検索結果ページ
       */
      echo ' &nbsp;&gt;&nbsp;<li><span>「'. esc_html( get_search_query() ) .'」で検索した結果</span></li>';

    
    } elseif ( is_404() ) {

      /**
       * 404ページ
       */
      echo ' &nbsp;&gt;&nbsp;<li><span>お探しの記事は見つかりませんでした。</span></li>';

    } else {

      /**
       * その他のページ（無いと思うけど一応）
       */
      echo ' &nbsp;&gt;&nbsp;<li><span>'. esc_html( get_the_title() ) .'</span></li>';

    }

    echo '</ul></div>';  // 冒頭に合わせた閉じタグ

  }
}

function twpp_change_excerpt_length( $length ) {
  $length = 50;

  if ( is_home() ) {
    $length = 200;
  } 

  return $length; 
}
add_filter( 'excerpt_length', 'twpp_change_excerpt_length', 999 );


function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">もっと読む</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );


 /**
 * Related posts
 * 
 * @global object $post
 * @param array $args
 * @return
 */
function wcr_related_posts($args = array()) {
  global $post;

  // default args
  $args = wp_parse_args($args, array(
      'post_id' => !empty($post) ? $post->ID : '',
      'taxonomy' => 'category',
      'limit' => 3,
      'post_type' => !empty($post) ? $post->post_type : 'post',
      'orderby' => 'date',
      'order' => 'DESC'
  ));

  // check taxonomy
  if (!taxonomy_exists($args['taxonomy'])) {
      return;
  }

  // post taxonomies
  $taxonomies = wp_get_post_terms($args['post_id'], $args['taxonomy'], array('fields' => 'ids'));

if (empty($taxonomies)) {
      return;
  }

  // query
  $related_posts = get_posts(array(
      'post__not_in' => (array) $args['post_id'],
      'post_type' => $args['post_type'],
      'tax_query' => array(
          array(
              'taxonomy' => $args['taxonomy'],
              'field' => 'term_id',
              'terms' => $taxonomies
          ),
      ),
      'posts_per_page' => $args['limit'],
      'orderby' => $args['orderby'],
      'order' => $args['order']
  ));

  include( locate_template('template-parts/content-related-posts.php', false, false) );

  wp_reset_postdata();
}

 /**
 * Related posts for custom post types　-- harbal tea
 *
 * 
 * @global object $post
 * @param array $args
 * @return
 */
function tea_related_posts($args = array()) {
  global $post;

  // default args
  $args = wp_parse_args($args, array(
      'post_id' => !empty($post) ? $post->ID : '',
      'taxonomy' => 'harb_type',
      'limit' => 3,
      'post_type' => !empty($post) ? $post->post_type : 'harbal_tea',
      'orderby' => 'date',
      'order' => 'DESC'
  ));

  // check taxonomy
  if (!taxonomy_exists($args['taxonomy'])) {
      return;
  }

  // post taxonomies
  $taxonomies = wp_get_post_terms($args['post_id'], $args['taxonomy'], array('fields' => 'ids'));

if (empty($taxonomies)) {
      return;
  }

  // query
  $related_posts = get_posts(array(
      'post__not_in' => (array) $args['post_id'],
      'post_type' => $args['post_type'],
      'tax_query' => array(
          array(
              'taxonomy' => $args['taxonomy'],
              'field' => 'term_id',
              'terms' => $taxonomies
          ),
      ),
      'posts_per_page' => $args['limit'],
      'orderby' => $args['orderby'],
      'order' => $args['order']
  ));

  include( locate_template('template-parts/content-related-posts.php', false, false) );

  wp_reset_postdata();
}

 /**
 * Related posts for custom post types　-- single origin
 *
 * 
 * @global object $post
 * @param array $args
 * @return
 */
function single_o_related_posts($args = array()) {
  global $post;

  // default args
  $args = wp_parse_args($args, array(
      'post_id' => !empty($post) ? $post->ID : '',
      'taxonomy' => 'roast_grade',
      'limit' => 3,
      'post_type' => !empty($post) ? $post->post_type : array('single_origin', 'blend'),
      'orderby' => 'date',
      'order' => 'DESC'
  ));
  $tax = get_object_taxonomies( $args );

  // check taxonomy
  if (!taxonomy_exists($args['taxonomy'])) {
      return;
  }

  // post taxonomies
  $taxonomies = wp_get_post_terms($args['post_id'], $args['taxonomy'], array('fields' => 'ids'));

if (empty($taxonomies)) {
      return;
  }

  // query
  $related_posts = get_posts(array(
      'post__not_in' => (array) $args['post_id'],
      'post_type' => array('single_origin', 'blend'),
      'tax_query' => array(
          array(
              'taxonomy' => $args['taxonomy'],
              'field' => 'term_id',
              'terms' => $taxonomies
          ),
      ),
      'posts_per_page' => $args['limit'],
      'orderby' => $args['orderby'],
      'order' => $args['order']
  ));

  include( locate_template('template-parts/content-related-posts.php', false, false) );

  wp_reset_postdata();
}


/* DON'T DELETE THIS CLOSING TAG */ ?>
