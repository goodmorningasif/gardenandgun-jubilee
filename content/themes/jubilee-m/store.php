<?php 

/* BASE Assets */
$data = array(
	'wp_title' => wp_title('', false, 'right'),
	'wp_head' => output_buffer_contents(wp_head),
	'wp_footer' => output_buffer_contents(wp_footer),
	'template_directory_uri' => get_template_directory_uri(),
	'stylesheet_url' => get_bloginfo('stylesheet_url'),
	'home_url' => esc_url( home_url('/')),
	'blog_title' => get_bloginfo('name', 1),
	'charset' => get_bloginfo('charset'),
	'body_class' => output_buffer_contents(body_class),
	'pages' => get_pages(),
	'categories' => get_categories('show_count=0&title_li=&hide_empty=0&exclude=1'),
);

foreach ($data['pages'] as $page) {
	$page->permalink = get_permalink($page->ID);
}

foreach($data['categories'] as $category) {
	$category->link = get_category_link($category->term_id);
}

/* SVG Assets */
$data['assets']['svg']['logo_main' ] = output_buffer_contents(function(){
  echo file_get_contents($GLOBALS['url'].'/assets/svg/logo-main.svg');
});  
$data['assets']['svg']['hamburger'] = output_buffer_contents(function(){
	echo file_get_contents($GLOBALS['url'].'/assets/svg/hamburger.svg');
});

/* COPY Assets */
$data['assets']['copy']['partner_message'] = output_buffer_contents(function(){
	echo get_field('ft_partner-tag', 'options'); 
});

$data['assets']['partners'] = array();
$partners = get_field('ft_partner-logos', 'options');

if($partners) {
	foreach($partners as $partner) {
		$tuple = array('img' => $partner['ft_partner-logos_img'],'link' => $partner['ft_partner-logos_url']);
		array_push($data['assets']['partners'], $tuple);
	}
}

return $data;

?>