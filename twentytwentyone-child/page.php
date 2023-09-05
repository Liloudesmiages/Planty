<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()?>/style.css">
<?php wp_head(); ?>    
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?> 
 <?php get_header(); ?>  
 <div class="content"><?php the_content(); ?></div>
 <?php get_footer(); ?> 
 