<?php
function cptui_register_my_cpts() {

	/**
	 * Post Type: ブレンド ハーブティー.
	 */

	$labels = array(
		"name" => __( "ブレンド ハーブティー", "custom-post-type-ui" ),
		"singular_name" => __( "ハーブティー", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "ブレンド ハーブティー", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => " 各 ¥600
全品ポットサービスでご提供いたします。

ハーブのお持ち帰りもできます。
30~50g (約20杯分) 各 ¥1,000",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "harbal_tea", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail", "excerpt" ),
	);

	register_post_type( "harbal_tea", $args );

	/**
	 * Post Type: 今月のシングル・オリジンコーヒー.
	 */

	$labels = array(
		"name" => __( "今月のシングル・オリジンコーヒー", "custom-post-type-ui" ),
		"singular_name" => __( "シングルオリジン", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "今月のシングル・オリジンコーヒー", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "店頭での浅・中煎りの受注焙煎、15分ほどでいたします。
深煎りは焙煎済み、または予約焙煎となります。",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "single_origin", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail", "excerpt" ),
		"taxonomies" => array( "roast_grade" ),
	);

	register_post_type( "single_origin", $args );

	/**
	 * Post Type: ワルツ オリジナル・ブレンド.
	 */

	$labels = array(
		"name" => __( "ワルツ オリジナル・ブレンド", "custom-post-type-ui" ),
		"singular_name" => __( "ワルツ オリジナル・ブレンド", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "ワルツ オリジナル・ブレンド", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "blend", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail", "excerpt" ),
		"taxonomies" => array( "roast_grade" ),
	);

	register_post_type( "blend", $args );

	/**
	 * Post Type: ニュース.
	 */

	$labels = array(
		"name" => __( "ニュース", "custom-post-type-ui" ),
		"singular_name" => __( "ニュース", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "ニュース", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "news", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "news", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );


function cptui_register_my_taxes() {

	/**
	 * Taxonomy: 焙煎度合い.
	 */

	$labels = array(
		"name" => __( "焙煎度合い", "custom-post-type-ui" ),
		"singular_name" => __( "焙煎度合い", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "焙煎度合い", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'roast_grade', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "roast_grade",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		);
	register_taxonomy( "roast_grade", array( "single_origin", "blend" ), $args );

	/**
	 * Taxonomy: 個別ハーブ.
	 */

	$labels = array(
		"name" => __( "個別ハーブ", "custom-post-type-ui" ),
		"singular_name" => __( "個別ハーブ", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "個別ハーブ", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'harb_type', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "harb_type",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		);
	register_taxonomy( "harb_type", array( "harbal_tea" ), $args );

	/**
	 * Taxonomy: 豆の産地.
	 */

	$labels = array(
		"name" => __( "豆の産地", "custom-post-type-ui" ),
		"singular_name" => __( "豆の産地", "custom-post-type-ui" ),
		"menu_name" => __( "豆の産地", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "豆の産地", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'blend_type', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "blend_type",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		);
	register_taxonomy( "blend_type", array( "single_origin", "blend" ), $args );
}
add_action( 'init', 'cptui_register_my_taxes' );

?>
