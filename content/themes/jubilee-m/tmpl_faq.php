<?php

/** 
 * Template Name: FAQ
 *
 */

$compiler = include('compiler.php');
$data = include('store.php');


// Page ID
$page_ID = get_the_ID();
$data['page']['page_id'] = $page_ID;

echo $compiler->render('tmpl_faq', $data);

// echo '=========================';
// echo '<pre>';/
// print_r($data['page']['layouts']);
// echo '</pre>';

?>