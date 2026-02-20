<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package above_workforce
 */

 get_header();
 if ( have_rows( 'page_builder' ) ) :
	 while ( have_rows( 'page_builder' ) ) : the_row();
		 get_template_part( 'template-parts/flex', get_row_layout() );
	 endwhile;
 else :
	 while ( have_posts() ) : the_post(); ?>
		 <section  class="defualt-content">
			 <div class="container">
				 <?php the_content(); ?>
			 </div>
		 </section><?php
	 endwhile;
 endif;
 get_footer();
