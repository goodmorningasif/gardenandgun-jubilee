<?php

// Page ID
$page_ID = get_the_ID();
$data['page']['page_id'] = $page_ID;

// Gallery 
$data['page']['gallery'] = array(
	'toggle' => get_field('enable_gallery', $page_ID),
	'images' => get_field('gallery', $page_ID)
);

// Signup Form
$signup = get_field('signup', $page_ID);
if ($signup) {
  if ($signup['enable_signup']) {
    $data['page']['signup'] = array(
      'headline' => $signup['form_head'],
      'tagline' => $signup['form_tag']
    );
  }
}

// Layouts
if(have_rows('feat_flexible', $page_ID)) :
  while(have_rows('feat_flexible', $page_ID)) :
  	the_row();

    // Image-to-copy Layout
    if(get_row_layout() === 'feat_img-cp') :
    	$copy_icon = get_sub_field('feat_img-cp_copy-icon');
      $data['page']['layouts']['img_cp'] = array(
      	'img' => get_sub_field('feat_img-cp_img'),
        'img_head' => get_sub_field('feat_img-cp_img-headline'),
        'img_cap' => get_sub_field('feat_img-cp_img-caption'),
        'copy_icon' => file_get_contents($copy_icon['url']),
        'copy_sect' => get_sub_field('feat_img-cp_sectional'),
        'copy_head' => get_sub_field('feat_img-cp_copy-headline'),
        'copy_para' => get_sub_field('feat_img-cp_para'),
      );
    endif;
    
    // Copy-to-image Layout
    if(get_row_layout() === 'feat_cp-img') :
    	$copy_icon = get_sub_field('feat_cp-img_copy-icon');
      $data['page']['layouts']['cp_img'] = array(
      	'img' => get_sub_field('feat_cp-img_image'),
        'img_head' => get_sub_field('feat_cp-image-image-headline'),
        'img_cap' => get_sub_field('feat_cp-image-image-caption'),
        'copy_icon' => file_get_contents($copy_icon['url']),
        'copy_sect' => get_sub_field('feat_cp-img_sectional'),
        'copy_head' => get_sub_field('feat_cp-img_copy-headline'),
        'copy_para' => get_sub_field('feat_cp-img_para'),
      );
    endif;

     // 3-columm layout
     if(get_row_layout() === 'feat_3-col') :
    	$cta_icon = get_sub_field('feat_3-col_middle_cta-icon');
	    $cta_title = get_sub_field('feat_3-col_middle_cta-title');
      $data['page']['layouts']['3_col'] = array(
      	'left_col' => array(
	      	'img' => get_sub_field('feat_3-col_left-img'),
	      	'img_head' => get_sub_field('feat_3-col_left-img-headline'),
	      	'img_cap' => get_sub_field('feat_3-col_left-img-caption'),
	      	'copy' => get_sub_field('feat_3-col_left_column_text')
      	),
      	'img_row' => array(
      		'middle' => array(
		      	'img' => get_sub_field('feat_3-col_middle-img'),
		      	'img_head' => get_sub_field('feat_3-col_middle-img-headline'),
		      	'img_cap' => get_sub_field('feat_3-col_middle-img-caption'),
      		),
      		'right' => array(
		      	'img' => get_sub_field('feat_3-col_3rd-col-img'),
		      	'img_head' => get_sub_field('feat_3-col_3rd-col-img-headline'),
		      	'img_cap' => get_sub_field('feat_3-col_3rd-col-img-caption'),
      		),
      	),
      	'cta' => array(
      		'icon' => file_get_contents($cta_icon['url']),
      		'title' => file_get_contents($cta_title['url']),
      		'text' => get_sub_field('feat_3-col_middle_cta-text'),
      		'link' => get_sub_field('feat_3-col_middle_cta-link'),
      	),
      	'bottom_img' => array(
	      	'img' => get_sub_field('feat_3-col_middle_img2'),
	      	'img_head' => get_sub_field('feat_3-col_middle-img2-headline'),
	      	'img_cap' => get_sub_field('feat_3-col_middle-img2-caption'),
      	),
      );
    endif;   

endwhile;endif;