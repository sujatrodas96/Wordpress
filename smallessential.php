<?php $term = get_field('testimonial_student'); ?>	
				          <?php $term_name = get_term( $term )->name; ?>
						  <?php $term_id = get_the_ID()->term_id; ?>
						  
                          <h2><span><?php echo $term_name; ?></span></h2>



 <!-- Relationship-->

 <?php
$featured_posts = get_sub_field('course_name');
if( $featured_posts ): ?>
    <?php foreach( $featured_posts as $post ): 
        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>
              <li>
              	<span><img src="<?php the_field('icon'); ?> ?>" alt=""></span> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </li>
              <?php endforeach; ?>
				 <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
<?php endif; ?>   

<!---END-->

<!--Related Post-->

 <?php
		$related_query = new WP_Query(array(
    	'post_type' => 'post',
    	'category__in' => wp_get_post_categories(get_the_ID()),
    	'post__not_in' => array(get_the_ID()),
    	'posts_per_page' => 3,
    	'orderby' => 'date',
		));
			?>
			  <?php if ($related_query->have_posts()) { ?>
        		<?php while ($related_query->have_posts()) { ?>

            		<?php $related_query->the_post(); ?>
       			 
                       <div class="col_4">
              <div class="product_page_block">
                <span><?php echo get_the_date( 'F j, Y' ); ?></span>
                <a class="product_block_title" href="#">
                  <h5><?php the_title(); ?></h5>
                </a>
                <p><?php the_excerpt(); ?></p>
                
                <a class="product_read" href="<?php the_permalink(); ?>">Read More</a>
              </div>
            </div>
			  <?php } ?>
    			<?php wp_reset_postdata(); ?>
				<?php } ?>

 <!--END-->            



 <!--Recent Post-->

 	<?php
	$recent_posts = wp_get_recent_posts(array(
		'category'         => 0,
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'numberposts' => 3, // Number of recent posts thumbnails to display
		'post_type'        => 'post',
		'post_status'      => 'publish' // Show only the published posts
	));
	foreach( $recent_posts as $post_item ) : ?>
                            <li><?php echo get_the_time('F j, Y', $post_item['ID']); ?>
                                <a href="<?php echo get_permalink($post_item['ID']) ?>"><?php echo get_the_post_thumbnail($post_item['ID'], 'full'); ?><?php echo $post_item['post_title'] ?></a>
                                 </li>
							<?php endforeach; ?>

  <!--END-->


  <!--Repeater-->

   <?php

            // Check rows exists.
                    if( have_rows('semester') ):
                      $count = 0;
                // Loop through rows.
                    while( have_rows('semester') ) : the_row();
                  ?>
        <div class="syllabus_content">
          <h4 <?php 
             if ($count==0) {
               ?> class="active"<?php 
             }
           ?>><span><?php echo get_sub_field('semester_number'); ?></span></h4>
          <div class="syll_info <?php 
             if ($count==0) {
               ?>active<?php } ?>">
            <?php echo get_sub_field('semester_content'); ?>
          </div>
        </div>
          <?php
                // End loop.
           $count++;
                    endwhile;

            // No value.
            // else :
                // Do something...
                 endif;

              ?>

               <?php

            // Check rows exists.
                    if( have_rows('areas_of_mastery') ):
                   
                // Loop through rows.
                    while( have_rows('areas_of_mastery') ) : the_row();
                  ?>
          <li>
            <span><?php 
                  $image = get_sub_field('areas_of_mastery_image');
                  if( !empty( $image ) ): ?>
                      <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                  <?php endif; ?></span> <?php echo get_sub_field('areas_of_mastery_title'); ?>
                </li>
                  <?php
                // End loop.

                endwhile;

            // No value.
            // else :
                // Do something...
            endif;

        ?>

        <!--END-->

        <!--For Redux Plugin -->

        <?php require_once ( dirname(__FILE__) . '/config.php' ); ?>

        <!--END-->
