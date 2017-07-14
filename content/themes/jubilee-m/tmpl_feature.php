<?php

$compiler = include('compiler.php');
$data = include('store.php');

return $compiler->render('tmpl_feature', $data);


?>