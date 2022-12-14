<?php
get_header();
?>



    <section class="blog_area">
        <div class="new_tab_btn_sec">
          <div class="page_container">
            <div class="page_row">
              <div class="col_12">
                <div class="h_about_info">
                 <?php
                $args = array(
			'taxonomy' => 'category', //empty string(''), false, 0 don't work, and return empty array
			'orderby' => 'name',
			'order' => 'ASC',
			'hide_empty' => true, //can be 1, '1' too
			'include' => array('265','282','264'), //empty string(''), false, 0 don't work, and return empty array
			'exclude' => 'all', //empty string(''), false, 0 don't work, and return empty array
			'exclude_tree' => 'all', //empty string(''), false, 0 don't work, and return empty array
			'number' => false, //can be 0, '0', '' too
			'offset' => '',
			'fields' => 'all',
			'name' => '',
			'slug' => '',
			'hierarchical' => true, //can be 1, '1' too
			'search' => '',
			'name__like' => '',
			'description__like' => '',
			'pad_counts' => false, //can be 0, '0', '' too
			'get' => '',
			'child_of' => false, //can be 0, '0', '' too
			'childless' => false,
			'cache_domain' => 'core',
			'update_term_meta_cache' => true, //can be 1, '1' too
			'meta_query' => '',
			'meta_key' => array(),
			'meta_value'=> '',
                );
			  ?>
				<div class="d_flex justify_content_center tab_res">
					
				  <ul class="tab_navigation">
						<li class="btntab"><a href="https://magical-leavitt.143-244-131-3.plesk.page/KU/blog/">All Blogs</a></li>
					  <?php
				   $cats = get_terms($args);
				   foreach($cats as $cat) {   
                  ?>
					  <li class="btntab" ><a href="<?php echo get_term_link($cat->term_id); ?>"><?php echo $cat->name; ?></a></li>
					  <?php
   }
?>
                  </ul>
				</div> 
				</div> 
			</div> 
		</div> 
	</div> 
	</div> 
 </section>

    <section class="blog_area">
      <div class="p_shape1"><img src="<?php bloginfo('template_directory'); ?>/images/shape1.webp" alt=""></div>
      <div class="p_shape3"><img src="<?php bloginfo('template_directory'); ?>/images/shape-4.webp" alt=""></div>
        <div class="page_container">
          <div class="heading">
            <h2><span><?php single_term_title(); ?></span></h2>
          </div>
          <div class="page_row">
			  <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
            <div class="col_4">
                <div class="product_page_block">
                    <span></span>
                    <a class="product_block_title" href="<?php the_permalink(); ?>">
                    <h5><?php the_title(); ?></h5>
                    </a>
                    
                    <p><?php the_excerpt(); ?> </p>
        
                    <a class="product_read" href="<?php the_permalink(); ?>">Read More</a>
                </div>
            </div>
			  <?php
    			endwhile;
				endif;
			  ?>
            
        </div>
	</div>
    </section>


     <div class="pagination">
			 

<?php echo paginate_links(); ?>
	      </div>
      


      

    
    <div class="footer_apply">
        <div class="page_container">
          <div class="page_row">
            <div class="col_12">
              <a href="#">Apply for College Admission and Academic Event Registration</a>
            </div> 
          </div> 
        </div> 
      </div>

<?php
get_footer();
?>