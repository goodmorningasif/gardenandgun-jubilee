<?php

/** 
 * Template Name: Feature
 *
 */


$compiler = include('compiler.php');
$data = include('store.php');

// if(have_rows('feat_flexible')) :
// 	while(have_rows('feat_flexible')): 
// 		the_row();

// 	  $data['feature'] = array(
// 	  	'permalink' => get_permalink(),
// 	  	'title' => get_the_title(),
// 	  	'content' => get_the_content()
// 	  );

// endwhile;endif;

$data['feature'] = get_field('feat_flexible');

echo $compiler->render('tmpl_feature', $data);

echo '=========================';
echo '<pre>';
print_r($data['assets']['nav']);
echo '</pre>';

?>