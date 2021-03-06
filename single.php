<?php

    // calling the header.php
    get_header(); 

?> 

<!-- generated with single.php -->

<!-- Checking if this is a single blog post -->
<?php /* If this is in the blog category */ if(in_category(array('news','latest', 'updates', 'blog', 'notable'))):	 ?>	

<!-- This IS a single blog post! So run the following -->

	<div id="content">
		<div class="notable">	  	 
	  
		<!-- begin post -->    
		<?php 	if (! empty($display_stats) ) { 		get_stats(1); 		echo "<br />"; 	} 	else if (($posts & empty($display_stats)) ) : foreach ($posts as $post) : the_post(); ?>   

			<div class="notable-post">
				
					<!-- START PREVIOUS/NEXT BUTTONS --> 

					<!--Removing Previous/Next until ticket 380 is fixed http://dev.eyebeam.org/projects/wpfolio/ticket/380 
					<div class="prevnext">
					<?php next_post_link('%link', 'newer', TRUE); ?> <?php previous_post_link('%link', 'older', TRUE); ?>
					</div> .prevnext -->

					<!-- END PREVIOUS/NEXT BUTTONS -->
				
				<!--POST TITLE-->		
				<h2 class="post-title"><a title="'<?php the_title_attribute(); ?>', posted on <?php the_time('F jS, Y') ?>" href="<?php the_permalink() ?>"><?php the_title(''); ?></a></h2> 
				<!--END POST TITLE-->

				<h4><?php the_date('F d, Y', '', ''); ?></h4>
				<?php the_content('continue...'); ?>
				
				<?php wp_link_pages(); ?>
		
				<h5><?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)'), __(''), __('')); ?> <?php the_tags('| Tags: ',', ',''); ?> | More: <?php the_category(', '); ?> <?php edit_post_link('edit this', '<span class="edit-link">', '</span>'); ?> <!--USER EDIT LINK--></h5>
			</div><!-- .notable-post -->
     
		<?php comments_template(); ?> 	  

		</div><!-- .notable --> 

		<div id="sidebar">
			<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar') ) ; ?> 

		</div><!-- #sidebar -->

	</div><!-- #content -->

<!-- <?php trackback_rdf(); ?> -->    
<?php endforeach; else: ?> <?php _e('Sorry, no posts matched your criteria.'); ?>
<?php endif; ?>    

<!-- end post-->     

<?php else: ?>
	
	
	

<!-- This is NOT a single blog post. (So it's a portflio post/single art work) Run the following -->

<div id="content">  
<!-- begin post -->    
<?php 	if (! empty($display_stats) ) { 		get_stats(1); 		echo "<br />"; 	} 	else if (($posts & empty($display_stats)) ) : foreach ($posts as $post) : the_post(); ?>   

	<div class="entry <?php $cat = get_the_category(); $cat = $cat[0]; echo $cat->category_nicename; ?>">   

			<!-- START PREVIOUS/NEXT BUTTONS --> 

			<!--Removing Previous/Next until ticket 380 is fixed http://dev.eyebeam.org/projects/wpfolio/ticket/380 
			<div class="prevnext">
			<?php next_post_link('%link', 'newer', TRUE); ?> <?php previous_post_link('%link', 'older', TRUE); ?>
			</div> .prevnext -->

			<!-- END PREVIOUS/NEXT BUTTONS -->    

	<?php the_content(); ?>   
	</div> <!-- .entry --> 		    

	<?php wp_link_pages(); ?>
	
<div class="post-bottom-title">   
<b><?php the_title(); ?></b>  | <a href="<?php the_permalink() ?>" title="Permalink"><?php the_time('Y') ?></a> | <?php the_category(', '); ?> <?php echo get_the_term_list($post->ID, 'media', '| Media: ', ', ', ''); ?> <?php the_tags('| Tags: ',', ',''); ?>  <?php comments_popup_link(__('| Comments (0)'), __('| Comments (1)'), __('| Comments (%)'), __(''), __('')); ?>

<?php edit_post_link('edit this', '<br /><br /><span class="edit-link">', '</span>'); ?> <!--USER EDIT LINK-->
</div><!-- .post-bottom-title -->
     
<?php comments_template(); ?> 	  
 
</div><!-- #content -->

<!-- <?php trackback_rdf(); ?> -->    
<?php endforeach; else: ?> <?php _e('Sorry, no posts matched your criteria.'); ?>
<?php endif; ?>    

<!-- end post-->

<?php endif; // end if we are in particular categories ?>

<?php     

	// calling footer.php
    get_footer();

?>