<?php 
add_theme_support('post-thumbnails');

add_image_size('large', 1700, '', true); 
add_image_size('medium', 500, '', true); 
add_image_size('small', 250, 250, true); 
add_image_size('small-square', 500, 500, true);
add_image_size('med_square', 700, 700, true); 
add_image_size('small_tall', 193, 290, true); 
add_image_size('small_wide', 419, 240, array( 'left', 'top' ) ); 
add_image_size('header', 763, 583, array( 'left', 'top' ) ); 

add_image_size('singleHead', 1700, 500, true); 
