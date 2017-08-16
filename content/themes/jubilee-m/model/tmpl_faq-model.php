<?php 

// Page ID
$page_ID = get_the_ID();
$data['page']['page_id'] = $page_ID;
$data['page']['page_title'] = get_the_title();

$data['page']['faq'] = array();

if(have_rows('faq', $page_ID)) :
  while(have_rows('faq', $page_ID)) :
  	the_row();

  $thisData = array(
  	'question' => get_sub_field('question'),
  	'answer' => get_sub_field('answer'),
  );
  array_push($data['page']['faq'], $thisData);

endwhile; endif; 