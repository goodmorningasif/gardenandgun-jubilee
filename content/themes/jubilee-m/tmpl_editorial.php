<?php

/** 
 * Template Name: Editorial
 *
 */


$compiler = include('compiler.php');
$data = include('store.php');

// Page ID
$page_ID = get_the_ID();
$data['page']['page_id'] = $page_ID;

$data['page']['layouts']['edit_copy'] = array();
$data['page']['layouts']['edit_sec-head'] = array();
$data['page']['layouts']['edit_image-grid'] = array();
$data['page']['layouts']['calendar'] = array();

// Layouts
if(have_rows('edit_flexible', $page_ID)) :
  while(have_rows('edit_flexible', $page_ID)) :
  	the_row();


  // edit_copy section layout
  if(get_row_layout() === 'edit_copy') :
  	$normal = true;
    if(get_sub_field('add_image') || get_sub_field('make_full')) :
    	$normal = false;
    endif;
    $data['page']['layouts']['edit_copy'] = array(
    	'add_image' => get_sub_field('add_image'),
    	'make_full' => get_sub_field('make_full'),
    	'normal' => $normal,
    	'headline' => get_sub_field('headline'),
    	'para' => get_sub_field('para'),
    	'image' => get_sub_field('image'),
    	'image_caption' => get_sub_field('image_caption'),
    );
    // array_push($data['page']['layouts']['edit_copy'], $thisData);
  endif;

  if(get_row_layout() === 'edit_sec-head') :
  	$thisData = array(
  		'sectional' => get_sub_field('sectional'),
  		'headline' => get_sub_field('headline'),
  	);
    array_push($data['page']['layouts']['edit_sec-head'], $thisData);
  endif;

  if(get_row_layout() === 'edit_image-grid') :
  	$thisData = array(
  		'grid_link' => get_sub_field('grid_link'),
  		'image' => get_sub_field('image'),
  		'image_headline' => get_sub_field('image_headline'),
  		'copy_header' => get_sub_field('copy_header'),
  		'paragraph' => get_sub_field('paragraph'),
  		'link' => get_sub_field('link'),
  		'link_title' => get_sub_field('link_title'),

  	);
    array_push($data['page']['layouts']['edit_image-grid'], $thisData);
  endif;

  if(get_row_layout() === 'calendar') :
  	if(have_rows('content', $page_ID)):
  		while(have_rows('content', $page_ID)):
  			the_row();

  		    if(get_row_layout() === 'calendar_day') :
				  	$thisData = array(
				  		'date' => get_sub_field('day'),
				  	);
				    array_push($data['page']['layouts']['calendar'], $thisData);
			    endif;

  		    if(get_row_layout() === 'calendar_item') :
				  	$thisData = array(
              'special' => get_sub_field('special_programming'),
              'headline' => get_sub_field('headline'),
              'time' => get_sub_field('time'),
              'description' => get_sub_field('description'),
              'link_title' => get_sub_field('link_title'),
              'link' => get_sub_field('link'),
				  	);
				    array_push($data['page']['layouts']['calendar'], $thisData);
			    endif;

  	endwhile; endif;
  endif;

endwhile;endif;

echo $compiler->render('tmpl_editorial', $data);

echo '=========================';
echo '<pre>';
print_r($data['page']['layouts']);
echo '</pre>';

?>