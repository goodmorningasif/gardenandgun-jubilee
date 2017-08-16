<?php

/** 
 * Template Name: Instructions
 *
 */

$compiler = include('compiler.php');
$data = include('store.php');

// Template-specific Data
require_once('model/tmpl_instructions-model.php');

echo $compiler->render('tmpl_instructions', $data);


// echo '=========================';
// echo '<pre>';
// print_r($data['page']['inst']);
// echo '</pre>';

?>