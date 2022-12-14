<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package karnavati_university
 */

?>
<?php global $theme_options; ?>
	 <footer class="main_footer">
    <div class="page_container">
      <div class="page_row">
        <div class="col_3">
          <div class="f_block">
            <div class="footer_logo"><a href="<?php echo $theme_options['footer-logo-url']; ?>"><img src="<?php echo $theme_options['footer-logo']['url']; ?>" alt=""></a></div>
            
            <ul class="number_list">
              <li>
                <?php echo $theme_options['footer-first-college-name']; ?>
                <a href="tel:<?php echo $theme_options['footer-first-college-contact-no']; ?>"><?php echo $theme_options['footer-first-college-contact-no']; ?></a>
              </li>
              <li>
                <?php echo $theme_options['footer-second-college-name']; ?>
                <a href="tel:<?php echo $theme_options['footer-second-college-contact-no']; ?>"><?php echo $theme_options['footer-second-college-contact-no']; ?> </a>
              </li>
              <li>
                <?php echo $theme_options['footer-third-college-name']; ?>
                <a href="<?php echo $theme_options['footer-third-college-contact-no-1']; ?>"><?php echo $theme_options['footer-third-college-contact-no-1']; ?></a> /
                <a href="tel:<?php echo $theme_options['footer-third-college-contact-no-2']; ?>"><?php echo $theme_options['footer-third-college-contact-no-2']; ?> </a>
              </li>
              <li>
                <?php echo $theme_options['footer-fourth-college-name']; ?>
                <a href="<?php echo $theme_options['footer-fourth-college-contact-no-1']; ?>"><?php echo $theme_options['footer-fourth-college-contact-no-1']; ?></a> /
                <a href="tel:<?php echo $theme_options['footer-fourth-college-contact-no-2']; ?>"><?php echo $theme_options['footer-fourth-college-contact-no-2']; ?></a>
              </li>
              <li>
                <?php echo $theme_options['footer-fifth-college-name']; ?>
                <a href="tel:<?php echo $theme_options['footer-fifth-college-contact-no-1']; ?>"><?php echo $theme_options['footer-fifth-college-contact-no-1']; ?></a> /
                <a href="tel:<?php echo $theme_options['footer-fifth-college-contact-no-2']; ?>"><?php echo $theme_options['footer-fifth-college-contact-no-2']; ?></a>
              </li>
              <li>
                <?php echo $theme_options['footer-sixth-college-name']; ?>
                <a href="tel:<?php echo $theme_options['footer-sixth-college-contact-no-1']; ?>"><?php echo $theme_options['footer-sixth-college-contact-no-1']; ?></a> /
                <a href="tel:<?php echo $theme_options['footer-sixth-college-contact-no-2']; ?>"><?php echo $theme_options['footer-sixth-college-contact-no-2']; ?></a>
              </li>
              <li>
                <?php echo $theme_options['footer-seventh-college-name']; ?>
                <a href="tel:<?php echo $theme_options['footer-seventh-college-contact-no-1']; ?>"><?php echo $theme_options['footer-seventh-college-contact-no-1']; ?></a> / <a href="tel:<?php echo $theme_options['footer-seventh-college-contact-no-2']; ?>"><?php echo $theme_options['footer-seventh-college-contact-no-2']; ?></a> / <a
                  href="tel:<?php echo $theme_options['footer-seventh-college-contact-no-3']; ?>"><?php echo $theme_options['footer-seventh-college-contact-no-3']; ?></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col_3">
          <div class="f_block">
            <h5>About</h5>
            <?php //The Arguments of the menu
              $args_first = array(
                          'menu' => 'Menu 2',
                          'container' => 'nav',
                          'container_class' => '',
                          'container_id' => '',
                          'menu_class' => 'f_menu',
                          'menu_id' => '',
                          'echo' => true,
                          'fallback_cb' => 'wp_page_menu',
                          'before' => '',
                          'after' => '',
                          'link_before' => '',
                          'link_after' => '',
                          'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                          'item_spacing' => 'preserve',
                          'depth' => 3,
                          'walker' => '',
                          'theme_location' =>   'menu-2'
                      );
            //to display the menu
            wp_nav_menu( $args_first );
            ?>

          </div>
        </div>
        <div class="col_3">
          <div class="f_block">
            <h5>Academics</h5>
            <?php //The Arguments of the menu
              $args_second = array(
                          'menu' => 'Footer Academics',
                          'container' => 'nav',
                          'container_class' => '',
                          'container_id' => '',
                          'menu_class' => 'f_menu',
                          'menu_id' => '',
                          'echo' => true,
                          'fallback_cb' => 'wp_page_menu',
                          'before' => '',
                          'after' => '',
                          'link_before' => '',
                          'link_after' => '',
                          'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                          'item_spacing' => 'preserve',
                          'depth' => 3,
                          'walker' => '',
                          'theme_location' =>   'menu-3'
                      );
            //to display the menu
            wp_nav_menu( $args_second );
            ?>
          </div>
        </div>
        <div class="col_3">
          <div class="f_block">
            <h5>QUICK LINKS</h5>
            <?php //The Arguments of the menu
              $args_third = array(
                          'menu' => 'Footer Quick Links',
                          'container' => 'nav',
                          'container_class' => '',
                          'container_id' => '',
                          'menu_class' => 'f_menu',
                          'menu_id' => '',
                          'echo' => true,
                          'fallback_cb' => 'wp_page_menu',
                          'before' => '',
                          'after' => '',
                          'link_before' => '',
                          'link_after' => '',
                          'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                          'item_spacing' => 'preserve',
                          'depth' => 3,
                          'walker' => '',
                          'theme_location' =>   'menu-4'
                      );
            //to display the menu
            wp_nav_menu( $args_third );
            ?>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer end-->


 
<script>
	if($('.banner_slider').length>0){

    var banner_slider = new Glide('.banner_slider', {
      type: 'carousel',
      autoplay: 3500,
     perView: 1
    });
    banner_slider.mount();
	}
	if($('.f_slider').length>0){
 var f_slider = new Glide('.f_slider', {
  type: 'carousel',
  autoplay: 3200,
  perView: 4,
  gap: 0,
  breakpoints: {
    767: {
      perView: 2
    },
    420: {
      perView: 1
    }
  }
});
f_slider.mount();
	}
	if($('.partner_slider').length>0){
    var partner_slider = new Glide('.partner_slider', {
      type: 'carousel',
      autoplay: 3000,
      perView: 6,
      breakpoints: {
        767: {
          perView: 3
        }
      }
    });
    partner_slider.mount();
	}
	if($('.connect_slider').length>0){
    var connect_slider = new Glide('.connect_slider', {
      type: 'carousel',
      autoplay: 3300,
      perView: 5,
      breakpoints: {
        767: {
          perView: 3
        }
      }
    });
    connect_slider.mount();
	}
	if($('.testimonial_slider').length>0){
    var testimonial_slider = new Glide('.testimonial_slider', {
    type: 'carousel',
    autoplay: 3200,
    perView: 3,
    gap: 0,
    breakpoints: {
      767: {
        perView: 1
      },
      480: {
        perView: 1
      }
    }
  });
  testimonial_slider.mount();
	}
	if($('.placement_slider').length>0){
	var placement_slider = new Glide('.placement_slider', {
    type: 'carousel',
    autoplay: 3200,
    perView: 4,
    gap: 0,
    autoplay: false,
    dragDistance: false,
    breakpoints: {
      767: {
        perView: 2
      },
      480: {
        perView: 2
      }
    }
  });
  placement_slider.mount();
	}
</script>



</body>

</html>