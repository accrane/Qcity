<?php
/**
 * Template Name: Submit Business
 */
acf_form_head();
// sanitize inputs
add_filter('acf/update_value', 'wp_kses_post', 10, 1);

get_header(); ?>

	<div id="primary" class="">
		<div id="content" role="main" class="wrapper">

			<?php while ( have_posts() ) : the_post(); 
			
			$right = get_field('right_content');
			?>
            
            <header class="archive-header">
				<div class="border-title">
                    <h1><?php the_title(); ?></h1>
                </div><!-- border title -->
				</header><!-- .archive-header -->
				
                <div class="column-left">
                	<div class="entry-content">
                    	<?php the_content(); ?>
                	</div><!-- entry-content -->
                </div><!-- column left -->
                
                <div class="column-right">
                	<div class="entry-content">
                    	<h5>SIGN-UP HERE</h5>
               <?php //the_content(); 
			   $return = get_bloginfo('url') . '/business-directory/business-directory-sign-up/business-directory-pay/';
			   //echo $return;
                $formArg = array (
					'id' => 'acf-business-form',
					'post_id'	=> 'new_post',
					'post_title' => true,
					'return' => $return,
					
					'form' => true,
					'fields' => array(
						'email',
						'phone',
						'website',
						'category',
						'business_thumbnail',
						'business_photo',
						'address'
						
					),
					'post_content' => true,
					'new_post'		=> array(
						'post_type'		=> 'business_listing',
						'post_status'		=> 'pending',
						'post_title'    => 'Title',
						//'tax_input'      => 'standard'
						),
					'submit_value'		=> 'Submit a Business'
					);
                
                acf_form($formArg);
				
                ?>
                	</div><!-- entry-content -->
                </div><!-- column left -->
                
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>