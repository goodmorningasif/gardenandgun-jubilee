<?php

/** 
 * Template Name: Feature
 *
 */


$compiler = include('compiler.php');
$data = include('store.php');

// Template-specific Data
require_once('model/tmpl_feature-model.php');


echo $compiler->render('tmpl_feature', $data);

// echo '=========================';
// echo '<pre>';
// print_r($data['assets']);
// echo '</pre>';

?>