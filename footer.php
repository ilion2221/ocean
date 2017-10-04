<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ocean
 */

?>
    <footer>
        <div class="footer_top-line">
          <div class="container clearfix">
            <div class="footer_top-line_logo"><a href="<?php echo get_home_url(); ?>">
                <img src="<?php echo get_template_directory_uri() ?>/img/template/footer-logo.png" alt=''></a></div>
            <div class="footer_top-line_nav clearfix hidden-xs">
              <?php 
                        wp_nav_menu( array(
	                    'menu_class'=>'false',
                        'menu_id' => 'nav1',
                        'container' => 'false',
                        'theme_location'=>'bottom',
                        'container_class' => 'false',  
                        'container_id'    => 'false'
                        ) );
                ?>
              <?php 
                        wp_nav_menu( array(
	                    'menu_class'=>'false',
                        'menu_id' => 'nav2',
                        'container' => 'false',
                        'theme_location'=>'bottom1',
                        'container_class' => 'false',  
                        'container_id'    => 'false'
                        ) );
                      ?>
                <?php 
                        wp_nav_menu( array(
	                    'menu_class'=>'',
                        'menu_id' => 'nav3',
                        'container' => 'false',
                        'theme_location'=>'bottom2',
                        'container_class' => 'false',  
                        'container_id'    => 'false'
                        ) );
                      ?>
                            
            </div>
             <div class="footer_top-line_pay hidden-xs hidden-sm"><span> <img src="<?php echo get_template_directory_uri() ?>/img/userfiles/pay-logos/1.png" alt=""></span><span> <img src="<?php echo get_template_directory_uri() ?>/img/userfiles/pay-logos/2.png" alt=""></span><span> <img src="<?php echo get_template_directory_uri() ?>/img/userfiles/pay-logos/3.png" alt=""></span><span> <img src="<?php echo get_template_directory_uri() ?>/img/userfiles/pay-logos/4.png" alt=""></span><span> <img src="<?php echo get_template_directory_uri() ?>/img/userfiles/pay-logos/5.png" alt=""></span></div>
          </div>
        </div>
        <div class="footer_bottom-line">
          <div class="container clearfix">
            <div class="footer_bottom-line_copy"><span><?php echo get_option('copy'); ?></span></div>
            <div class="footer_bottom-line_contacts"><a href="#">
                <svg class="svg-icon loc-icon">
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#loc-icon"></use>
                </svg><span class="text"><?php echo get_option('adress'); ?></span></a><a href="#">
                <svg class="svg-icon tel-icon">
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#tel-icon"></use>
                </svg><span class="text"><?php echo get_option('phone'); ?></span></a><a href="#">
                <svg class="svg-icon mail-icon">
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#mail-icon"></use>
                </svg><span class="text"><?php echo get_option('mail'); ?></span></a></div>
          </div>
        </div>
      </footer><a href="#" class="go-to-top">
        <svg class="svg-icon arrow-icon">
          <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use>
        </svg></a>
    </div>
    <div id="mob-menu-left" tabindex="-1" role="dialog" class="modal fade left mob-menu-left hidden-lg hidden-md">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="main-nav-wrap">
            <div class="main-nav-wrap_inner">
              <ul class="nav-ul">
                <li class="full-catalog"><a href="#" data-dismiss="modal" aria-label="Close"> <span class="text">КАТАЛОГ </span><span class="full-c-icon"><span></span><span></span><span></span></span></a></li>
                <li><a href="#"> <span class="text">СТРОИТЕЛЬНЫЕ МАТЕРИАЛЫ</span>
                    <svg class="svg-icon arrow-icon">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use>
                    </svg></a></li>
                <li><a href="#"> <span class="text">ВАННАЯ КОМНАТА</span>
                    <svg class="svg-icon arrow-icon">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use>
                    </svg></a></li>
                <li><a href="#"> <span class="text">ДВЕРИ</span>
                    <svg class="svg-icon arrow-icon">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use>
                    </svg></a></li>
                <li><a href="#"> <span class="text">ОКНА</span>
                    <svg class="svg-icon arrow-icon">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use>
                    </svg></a></li>
                <li><a href="#"> <span class="text">СКОБЯНЫЕ ИЗДЕЛИЯ</span>
                    <svg class="svg-icon arrow-icon">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use>
                    </svg></a></li>
                <li><a href="#"> <span class="text">НАПОЛЬНЫЕ ПОКРЫТИЯ</span>
                    <svg class="svg-icon arrow-icon">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use>
                    </svg></a></li>
                <li><a href="#"> <span class="text">ОТДЕЛОЧНЫЕ МАТЕРИАЛЫ</span>
                    <svg class="svg-icon arrow-icon">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use>
                    </svg></a></li>
                <li><a href="#"> <span class="text">ИНСТРУМЕНТЫ </span>
                    <svg class="svg-icon arrow-icon">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use>
                    </svg></a></li>
                <li><a href="#"> <span class="text">ЛАКОКРАСОЧНЫЕ МАТЕРИАЛЫ </span>
                    <svg class="svg-icon arrow-icon">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use>
                    </svg></a></li>
                <li><a href="#"> <span class="text">ПЛИТКА </span>
                    <svg class="svg-icon arrow-icon">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use>
                    </svg></a></li>
                <li><a href="#"> <span class="text">КРЕПЁЖ </span>
                    <svg class="svg-icon arrow-icon">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use>
                    </svg></a></li>
                <li><a href="#"> <span class="text">ИНЖЕНЕРНАЯ САНТЕХНИКА </span>
                    <svg class="svg-icon arrow-icon">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use>
                    </svg></a></li>
                <li><a href="#"> <span class="text">ЭЛЕКТРОТОВАРЫ </span>
                    <svg class="svg-icon arrow-icon">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use>
                    </svg></a></li>
                <li><a href="#"> <span class="text">ОТДЕЛОЧНЫЕ МАТЕРИАЛЫ </span>
                    <svg class="svg-icon arrow-icon">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use>
                    </svg></a></li>
                <li><a href="#"> <span class="text">ИНСТРУМЕНТЫ </span>
                    <svg class="svg-icon arrow-icon">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use>
                    </svg></a></li>
                <li><a href="#"> <span class="text">ИНЖЕНЕРНАЯ САНТЕХНИКА </span>
                    <svg class="svg-icon arrow-icon">
                      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use>
                    </svg></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="mob-menu-right" tabindex="-1" role="dialog" class="modal fade right mob-menu-right hidden-lg hidden-md">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="main-nav-wrap">
            <div class="main-nav-wrap_inner">
              <ul class="nav-ul">
                <li class="full-catalog"><a href="#" data-dismiss="modal" aria-label="Close"> <span class="text">МЕНЮ </span><span class="full-c-icon"><span></span><span></span><span></span></span></a></li>
                <li><a href="#"> <span class="text">ГЛАВНАЯ            </span></a></li>
                <li><a href="#"> <span class="text">ОПЛАТА</span></a></li>
                <li><a href="#"> <span class="text">ДОСТАВКА</span></a></li>
                <li><a href="#"> <span class="text">СКИДКИ</span></a></li>
                <li><a href="#"> <span class="text">КОНТАКТЫ</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
   
<?php wp_footer(); ?>
  </body>
</html>