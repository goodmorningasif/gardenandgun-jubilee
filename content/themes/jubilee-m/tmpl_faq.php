<?php

/** 
 * Template Name: FAQ
 *
 */

$compiler = include('compiler.php');
$data = include('store.php');


// Template-specific Data
require_once('model/tmpl_faq-model.php');


echo $compiler->render('tmpl_faq', $data);

// echo '=========================';
// echo '<pre>';
// print_r($data['page']);
// echo '</pre>';

?>