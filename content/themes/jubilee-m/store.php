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
$data['assets']['svg'] = array(
  'logo_main' => file_get_contents($GLOBALS['url'].'/assets/svg/logo-main.svg'),
  'hamburger' => file_get_contents($GLOBALS['url'].'/assets/svg/hamburger.svg'),
);


/* IMAGE Assets */


/* COPY Assets */

/* HEADER INFO Assets */
$data['assets']['header'] = array(
	'left_tag' => get_field('hd_left-tag', 'options'),
	'middle_head' => get_field('hd_middle-headline', 'options'),
	'middle_tag' => get_field('hd_middle-tag', 'options'),
	'right_tag' => get_field('hd_right-tag', 'options'),
);

/* NAVIGATION Assets */
$data['assets']['nav'] = array(
	'mm' => get_field('mm', 'options'),
	'sm' => get_field('sm', 'options'),
);



/* FOOTER MENU Assets */
// left item
$link_1 = get_field('ft_menu_link_1', 'options');
$data['assets']['footer']['left_item'] = array(
	'title' => get_field('ft_menu_title_1', 'options'), 
	'email' => $link_1[0][$link_1[0]['acf_fc_layout'] . '_email'], 
	'link' => $link_1[0][$link_1[0]['acf_fc_layout'] . '_url']
);

// right item
$link_2 = get_field('ft_menu_link_2', 'options');
$data['assets']['footer']['right_item'] = array(
	'title' => get_field('ft_menu_title_2', 'options'),
	'email' => $link_2[0][$link_2[0]['acf_fc_layout'] . '_email'],
	'link' => $link_2[0][$link_2[0]['acf_fc_layout']. '_url']
);

/* SOCIAL MEDIA Assets */
// logos and links
$data['assets']['social'] = array();
$social_menu = get_field('ft_social-logos', 'options');
if($social_menu) {
	foreach($social_menu as $item) {
		$layout = $item['ft_social-logos_svg']['url'];
    $row = array(
    	'icon' => file_get_contents($layout),
    	'link' => $item['ft_social-logos_link'],
    );
    array_push($data['assets']['social'], $row);
	}
}
// hashtag
$data['assets']['hash'] = get_field('ft_hash', 'options');

/* PARTNERS Assets */
//messaging
$data['assets']['partner_message'] = get_field('ft_partner-tag', 'options');

// Repeater
$data['assets']['partners'] = array();
$partners = get_field('ft_partner-logos', 'options');
if($partners) {
	foreach($partners as $partner) {
		$row = array(
			'img' => $partner['ft_partner-logos_img'],
			'link' => $partner['ft_partner-logos_url']
		);
		array_push($data['assets']['partners'], $row);
	}
}


return $data;

?>