
<?php

function Alpha_bootstrapping(){

load_theme_textdomain("Alpha");
add_theme_support("post_thumbnails");
add_theme_support("title_tag");

register_nav_menu("top-menu",__("Top Menu","Alpha"));
register_nav_menu("footer-menu",__("Footer Menu","Alpha"));
}
 add_action("after_setup-theme","Alpha_bootstrapping");

function Alpha_assets(){

    wp_enqueue_style("alpha", get_stylesheet_uri());
	wp_enqueue_style("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
	wp_enqueue_style("featherlight-css", "//cdn.rawgit.com/noelboss/featherlight/1.7.14/release/featherlight.min.css");
	wp_enqueue_script("featherlight-js", "//cdn.rawgit.com/noelboss/featherlight/1.7.14/release/featherlight.min.js", array("jquery"), "0.0.1", true);
}
add_action("wp_enqueue_scripts","Alpha_assets");

function Alpha_sidebar(){
  register_sidebar(array(
  	  'name'   =>__('Single Post Sidebar', 'Alpha'),
	  'id'     => 'sidebar-1',
	  'description' =>__('Right Sidebar','Alpha'),
	  'before_widget' => '<section id="%1$s" class="widget %2$s">',
	  'after_widget' => '</section>',
	  'before_title' => '<h2 class="widget-title">',
	  'after-title' => '</h2>',
       )

  );

	register_sidebar(array(
			'name'   =>__('Footer Left', 'Alpha'),
			'id'     => 'footer-left',
			'description' =>__('Widgetized Area On The Left Sidebar','Alpha'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '',
			'after-title' => '',
		)

	);

	register_sidebar(array(
			'name'   =>__('Footer Right', 'Alpha'),
			'id'     => 'footer-right',
			'description' =>__('Widgetized Area On The Right Sidebar','Alpha'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '',
			'after-title' => '',
		)

	);


}
add_action("widgets_init","Alpha_sidebar");

function Alpha_protected_title_change() {

return "%s";
}
add_filter("protected_title_format","Alpha_protected_title_change");