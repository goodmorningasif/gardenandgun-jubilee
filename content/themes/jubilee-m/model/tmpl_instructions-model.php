<?php

// Page ID
$page_ID = get_the_ID();
$data['page']['page_id'] = $page_ID;
$data['page']['inst'] = array();

// Instruction Repeater
if(have_rows('inst_rep', $page_ID)) :
  while(have_rows('inst_rep', $page_ID)) :
  	the_row();

  
  $thisData = array(
  	'image' => get_sub_field('image'),
  	'copy' => get_sub_field('instructions'),
  );

  array_push($data['page']['inst'], $thisData);

endwhile;endif;