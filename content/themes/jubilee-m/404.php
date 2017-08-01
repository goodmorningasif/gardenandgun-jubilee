<?php
/**
 * Footer
 *
 * Contans footer assets.
 *
 * @link G&G Jubilee
 *
 * @package G&G Jubilee
 * @subpackage Wordpress
 * @since 1.0
 * @version 1.0
 */

$compiler = include('compiler.php');
$data = include('store.php');

$data['404'] = array(
	'icon' => file_get_contents($GLOBALS['url'].'/assets/svg/fox.svg'),
	'title' => file_get_contents($GLOBALS['url'].'/assets/svg/404.svg'),
);

echo $compiler->render('404', $data);

// echo '=========================';
// echo '<pre>';
// print_r($data['404']);
// echo '</pre>';

?>
