<?php

    // calling the header.php
    get_header(); 

?> 

<!-- generated with category.php -->

<!-- Checking if this is the blog -->
<?php /* If this is a category archive */ if(is_category(array('news','latest', 'updates', 'blog', 'notable'))):	 ?>	

<!-- This IS the blog! So run the following -->

	<!-- begin post -->    
	<div id="content">
		<div class="notable">	  	 
	<?php if (have_posts()): ?>  

						 
		<h2 class="pagetitle"><?php echo single_cat_title(); ?></h2> <!--CATEGORY TITLE-->
	  
			<?php while (have_posts()) : the_post(); ?>     
		
				<div class="notable-post">
					
					<!--POST TITLE-->		
					<h2 class="post-title"><a title="'<?php the_title_attribute(); ?>', posted on <?php the_time('F jS, Y') ?>" href="<?php the_permalink() ?>"><?php the_title(''); ?></a></h2> 
					<!--END POST TITLE-->

					<h4><?php the_date('F d, Y', '', ''); ?></h4>
					<?php the_content('continue...'); ?>
			
					<h5><?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)'), __(''), __('')); ?> <?php the_tags('| Tags: ',', ',''); ?> <?php edit_post_link('edit this', '<span class="edit-link">', '</span>'); ?> <!--USER EDIT LINK--></h5>
				</div><!-- .notable-post -->
	
			<?php endwhile; ?>  

		<div class="prevnext" align="center"><div class="prevnext_left"><?php next_posts_link('older posts') ?></div><!--.prevnext_left--> <div class="prevnext_right"><?php previous_posts_link('newer posts') ?></div><!--.prevnext_right--></div><!-- .prevnext --> 
			 
			</div><!-- .notable -->	
		<div id="sidebar">
			<ul>
			<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar') ) ; ?> 
			</ul>

		</div><!-- #sidebar -->			  
		
		</div>	<!-- #content -->
			 
		<?php else : // if there are posts ?>  	  
			<h2 class="center">Page not found</h2> 	 
			
		<?php endif; ?> 		    		   
<!-- end post -->  





<?php else: ?>
<!-- This is NOT the blog. Run the following -->  
	<div id="content" class="entry <?php $cat = get_the_category(); $cat = $cat[0]; echo $cat->category_nicename; ?>">  	  	 
		<?php if (have_posts()) : ?>  		     
			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>     
			<?php /* If this is a category archive */ if (is_category()) { ?>				 		 
				<h2 class="pagetitle"><?php echo single_cat_title(); ?></h2> 
				<div id="category-description"><?php echo category_description(3); ?></div><!--#category-description--> 
			
			<?php /* If this is an author archive */ } elseif (is_author()) { ?> 		  
				<h2 class="pagetitle">Artist Archive</h2>  		    
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?> 		  
			<?php /*if this is a year archive */ } elseif (is_archive()) { ?>
				<h2 class="pagetitle"><?php wp_title(''); ?></h2>
				<div class="entry"></div><!-- .entry --><!-- why is this here? -->	
			
			<?php } ?>   		  		  

		
		
		
		<div class="entrycat"> 
		
		
		
		<div class="img-container">
		<?php while (have_posts()) : the_post(); ?> 
			
			<div class="img-frame">
				
				<a title="'<?php the_title_attribute(); ?>', <?php the_time('Y') ?>" href="<?php the_permalink() ?>">
				
				
				
				
				<?php 
				
				
				#If there is a post thumbnail , it will display. If not it is the thumb function. These
				# can be edited in the functions.php file.
				
				if(has_post_thumbnail()){
					the_post_thumbnail();
				}
				else{
			
				
				echo get_thumb($post->ID); 
			}
				
			
				
				
				?>
				
				
				
				</a> 
				<br />
				<div class="img-frame-caption"><a title="'<?php the_title_attribute(); ?>', <?php the_time('Y') ?>" href="<?php the_permalink() ?>"><?php the_title('' ); ?></a>
				</div><!-- .img-frame-caption -->
			</div><!-- .img-frame -->
		
		<?php endwhile; ?>   
		
		</div><!-- .img-container -->
		</div><!-- .entrycat -->
	
		
		<div class="entry">  
		<!--Removing Previous/Next until ticket 380 is fixed http://dev.eyebeam.org/projects/wpfolio/ticket/380
		<div class="prevnext" align="center"><?php next_posts_link('Previous') ?> <?php previous_posts_link('Next') ?></div>-->
		</div><!-- .entry -->
		
		</div> <!-- #content .entry -->	   				
	<?php else : // have posts ?>  	  
		<h2 class="center">Page not found</h2> 	 	 	 
	<?php endif; // have posts ?> 
		
		<?php wp_link_pages(); ?>
  
<!-- end post -->     


<?php endif; // end if we are in particular categories ?>




<?php     

	// calling footer.php
    get_footer();

?>