<?php 
		  		$term = get_field('blog');
                $Query = new WP_Query(array(
                  'post_type'=> 'post',
                  'posts_per_page'=>3,        //-1 stands for all
                  'order_by'=> 'date',     
                  'meta_key' => '',
                  'meta_value' => '',
                  'order'=> 'ASC',
				  'tax_query' => array(
        							array(
            							'taxonomy' => 'category',   // taxonomy name
            							'field' => 'term_id',           // term_id, slug or name 
            							'terms' =>  $term,                  // term id, term slug or term name
       									 )
    								  )
                   
                					));
			
				if($Query -> have_posts()):

    			while($Query -> have_posts()): $Query -> the_post();
        			
        		?>


<div>
  <?php the_date('F j, Y');?>
  <h2><?php the_category(); ?></h2>
  <h1><?php the_title(); ?></h1>
  <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_post_meta('_wp_attachment_image_alt', true ); ?>">
  <p><?php the_excerpt(); the_content(); wp_trim_word(the_content(), 40)?></p>
  <a href="<?php the_permalink(); ?>"></a>
</div>

                 <?php
    endwhile;

else:
    "No Administrative Offices Found. Try again later";
endif;
wp_reset_postdata();
?>



<?php /*......pagination.......  */ ?>


              <?php
         
                $Query = new WP_Query(array(
                  'post_type'=> 'post',
                       //-1 stands for all
          'paged' => get_query_var( 'paged' ),
                  'order_by'=> '',     
                  'meta_key' => '',
                  'meta_value' => '',
                  'order'=> 'ASC',
                          ));
          $wp_query = $Query;
          $total_pages = $wp_query->max_num_pages;
          if ( $total_pages > 1) {
          $the_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          
          $pagination = array(
          'base' => @add_query_arg('paged','%#%'),
          'format' => '?paged=%#%',
          'mid-size' => 1,
          'current' => $the_paged,
          'total' => $total_pages,
          'prev_next' => True,
          'prev_text' => __( '<< Previous' ),
          'next_text' => __( 'Next >>' )
        );
      } 
      
        if($Query -> have_posts()):

          while($Query -> have_posts()): $Query -> the_post();
              
            ?>



            <div class="col_4">
                                <div class="product_page_block">
                                    <span><?php echo get_the_date( 'F j, Y' ); ?></span>
                                    <a class="product_block_title" href="#">
                                    <h5><?php the_title(); ?></h5>
                                    </a>
                                    
                                    <p> <?php the_excerpt(); ?></p>
                        
                                    <a class="product_read" href="<?php the_permalink(); ?>">Read More</a>
                                </div>
                            </div>
              
  <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else: ?>
        <p>No entries</p>
    <?php endif; ?>
    
                           
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <div class="pagination">
<?php echo paginate_links($pagination); ?>
        </div>       
      </section>
