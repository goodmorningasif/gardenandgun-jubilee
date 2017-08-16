<?php

/** 
 * Template Name: Editorial
 *
 */


$compiler = include('compiler.php');
$data = include('store.php');

// Template-specific Data
require_once('model/tmpl_editorial-model.php');


echo $compiler->render('tmpl_editorial', $data);

// echo '=========================';
// echo '<pre>';
// print_r($data['page']);
// echo '</pre>';

?>