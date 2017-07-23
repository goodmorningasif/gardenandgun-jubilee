<?php

/** 
 * Template Name: Feature
 *
 */


$compiler = include('compiler.php');
$data = include('store.php');

$page_ID = get_the_ID();

$data['page']['page_id'] = $page_ID;

$data['page']['gallery'] = array(
	'toggle' => get_field('enable_gallery', $page_ID),
	'images' => get_field('gallery', $page_ID)
);

$data['page']['layouts'] = get_field('feat_flexible', $page_ID);

echo $compiler->render('tmpl_feature', $data);

echo '=========================';
echo '<pre>';
print_r($data['page']['layouts']);
echo '</pre>';

?>