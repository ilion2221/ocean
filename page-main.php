<?php
/*
Template Name: page-main
*/

get_header(); ?>
<div class="container">
          <div class="row">
            <div class="col-md-5">
              <div class="main-nav-wrap hidden-sm hidden-xs">
                <div class="main-nav-wrap_inner">
                  <ul class="nav-ul">
                    <?php  get_sidebar();?>
                    <li class="full-catalog"><a href="#"> <span class="text">ПОЛНЫЙ КАТАЛОГ </span><span class="full-c-icon"><span></span><span></span><span></span></span></a></li>
                    
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-15">
              
               
                 <?php 

$images = get_field('slider');
           
if( $images ): ?>
          <div class="home-slider-wrap">       
                 
        <?php foreach( $images as $image ): ?>
         <div class="item"><a href="#"><img src="<?php echo $image['slider-imgs']; ?>" alt="">
        <div class="text"><?php echo $image['slider-text']; ?></div></a></div>   
        <?php endforeach; ?>
        </div>      
<?php endif; ?>
           
              <div class="home-adv-blocks-wrap">
                <div class="home-adv-blocks-wrap_row clearfix">
                       <?php 

                    $topplus = get_field('top-plus');
           
                    if( $topplus ): ?> 
                 <?php foreach( $topplus as $top ): ?>
                  <div class="home-adv-blocks-wrap_col">
                    <div class="home-adv-blocks-wrap_it">
                      <div style="background-image: url(<?php echo $top['top-img']; ?>)" class="home-adv-blocks-wrap_it_bg"></div>
                      <div class="home-adv-blocks-wrap_it-text"><span><?php echo $top['top-text']; ?></span></div>
                    </div>
                  </div>
                  <?php endforeach; ?>  
                    <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="main-partners-block-wrap">
          <div class="container">
            <div class="main-partners-block-wrap_slider">
                <?php 
                    $partners = get_field('partners');
                 if( $partners ): ?> 
            
                <?php foreach( $partners as $partner ): ?>
              <div class="item"><a href="#"><img src="<?php echo $partner['partner-img']; ?>" alt=""></a></div>
                <?php endforeach; ?>  
                 <?php endif; ?>
             
            </div>
          </div>
        </div>
        <div class="main-items-wrap">
          <div class="container">
            <div class="main-items-wrap_title"><span class="text">СПЕЦИАЛЬНЫЕ ПРЕДЛОЖЕНИЯ</span></div>
            <div class="main-items-wrap_items-place hidden-sm hidden-xs">
              <div class="row">
                  
                     <?php echo do_shortcode("[sale_products per_page='5']"); ?>
                         
              </div>
              <div class="main-items-wrap_items-place_more-items-wrap hidden-xs hidden-sm">
                <button id="button_tr" class="btn blu-bd-btn"> <span>ПОКАЗАТЬ ЕЩЁ</span>
                  <svg class="svg-icon arrow-icon">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use>
                  </svg>
                </button>
              </div>
            </div>  
            <div class="main-items-wrap_items-mob-slider visible-xs visible-sm">
              <div class="item">
                <div class="main-items-wrap_items-place_item">
                  <div class="main-items-wrap_items-place_item_img-wrap">
                    <div class="inner-wrap"><a href="#"><img src="img/userfiles/home/item.jpg" alt="">
                        <div class="flag-discount">
                          <svg class="svg-icon item-flag-icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#item-flag-icon"></use>
                          </svg><span class="text">-10%</span>
                        </div></a></div>
                  </div>
                  <div class="main-items-wrap_items-place_item_name-wrap"><span>
                       
                      Краска Tikkurila <br>EURO2 / 9 л</span></div>
                  <div class="main-items-wrap_items-place_item_price-wrap">
                    <div class="old-price"><span>3 500</span></div>
                    <div class="cur-price"><span>2 290</span><span class="rouble">й</span></div>
                  </div>
                  <div class="main-items-wrap_items-place_item_buttons-wrap">
                    <div class="count-btn-wrap">
                      <input type="number" value="1" data-min-value="1"><span class="plus"></span><span class="minus"></span>
                    </div>
                    <div class="to-cart-btn-wrap">
                      <button class="btn blue-btn fw">В КОРЗИНУ</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="main-items-wrap_items-place_item">
                  <div class="main-items-wrap_items-place_item_img-wrap">
                    <div class="inner-wrap"><a href="#"><img src="img/userfiles/home/item.jpg" alt="">
                        <div class="flag-discount">
                          <svg class="svg-icon item-flag-icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#item-flag-icon"></use>
                          </svg><span class="text">-10%</span>
                        </div></a></div>
                  </div>
                  <div class="main-items-wrap_items-place_item_name-wrap"><span>
                       
                      Краска Tikkurila <br>EURO2 / 9 л</span></div>
                  <div class="main-items-wrap_items-place_item_price-wrap">
                    <div class="old-price"><span>3 500</span></div>
                    <div class="cur-price"><span>2 290</span><span class="rouble">й</span></div>
                  </div>
                  <div class="main-items-wrap_items-place_item_buttons-wrap">
                    <div class="count-btn-wrap">
                      <input type="number" value="1" data-min-value="1"><span class="plus"></span><span class="minus"></span>
                    </div>
                    <div class="to-cart-btn-wrap">
                      <button class="btn blue-btn fw">В КОРЗИНУ</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="main-items-wrap_items-place_item">
                  <div class="main-items-wrap_items-place_item_img-wrap">
                    <div class="inner-wrap"><a href="#"><img src="img/userfiles/home/item.jpg" alt="">
                        <div class="flag-discount">
                          <svg class="svg-icon item-flag-icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#item-flag-icon"></use>
                          </svg><span class="text">-10%</span>
                        </div></a></div>
                  </div>
                  <div class="main-items-wrap_items-place_item_name-wrap"><span>
                       
                      Краска Tikkurila <br>EURO2 / 9 л</span></div>
                  <div class="main-items-wrap_items-place_item_price-wrap">
                    <div class="old-price"><span>3 500</span></div>
                    <div class="cur-price"><span>2 290</span><span class="rouble">й</span></div>
                  </div>
                  <div class="main-items-wrap_items-place_item_buttons-wrap">
                    <div class="count-btn-wrap">
                      <input type="number" value="1" data-min-value="1"><span class="plus"></span><span class="minus"></span>
                    </div>
                    <div class="to-cart-btn-wrap">
                      <button class="btn blue-btn fw">В КОРЗИНУ</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="main-items-wrap_items-place_item">
                  <div class="main-items-wrap_items-place_item_img-wrap">
                    <div class="inner-wrap"><a href="#"><img src="img/userfiles/home/item.jpg" alt="">
                        <div class="flag-discount">
                          <svg class="svg-icon item-flag-icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#item-flag-icon"></use>
                          </svg><span class="text">-10%</span>
                        </div></a></div>
                  </div>
                  <div class="main-items-wrap_items-place_item_name-wrap"><span>
                       
                      Краска Tikkurila <br>EURO2 / 9 л</span></div>
                  <div class="main-items-wrap_items-place_item_price-wrap">
                    <div class="old-price"><span>3 500</span></div>
                    <div class="cur-price"><span>2 290</span><span class="rouble">й</span></div>
                  </div>
                  <div class="main-items-wrap_items-place_item_buttons-wrap">
                    <div class="count-btn-wrap">
                      <input type="number" value="1" data-min-value="1"><span class="plus"></span><span class="minus"></span>
                    </div>
                    <div class="to-cart-btn-wrap">
                      <button class="btn blue-btn fw">В КОРЗИНУ</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="main-items-wrap_items-place_item">
                  <div class="main-items-wrap_items-place_item_img-wrap">
                    <div class="inner-wrap"><a href="#"><img src="img/userfiles/home/item.jpg" alt="">
                        <div class="flag-discount">
                          <svg class="svg-icon item-flag-icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#item-flag-icon"></use>
                          </svg><span class="text">-10%</span>
                        </div></a></div>
                  </div>
                  <div class="main-items-wrap_items-place_item_name-wrap"><span>
                       
                      Краска Tikkurila <br>EURO2 / 9 л</span></div>
                  <div class="main-items-wrap_items-place_item_price-wrap">
                    <div class="old-price"><span>3 500</span></div>
                    <div class="cur-price"><span>2 290</span><span class="rouble">й</span></div>
                  </div>
                  <div class="main-items-wrap_items-place_item_buttons-wrap">
                    <div class="count-btn-wrap">
                      <input type="number" value="1" data-min-value="1"><span class="plus"></span><span class="minus"></span>
                    </div>
                    <div class="to-cart-btn-wrap">
                      <button class="btn blue-btn fw">В КОРЗИНУ</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="main-items-wrap">
          <div class="container">
            <div class="main-items-wrap_title"><span class="text">НОВОЕ ПОСТУПЛЕНИЕ</span></div>
            <div class="main-items-wrap_items-place hidden-sm hidden-xs">
              <div class="row">
              <?php echo do_shortcode("[recent_products per_page='5']"); ?>
              </div>
              <div class="main-items-wrap_items-place_more-items-wrap hidden-xs hidden-sm">
                <button class="btn blu-bd-btn fw"> <span>ПОКАЗАТЬ ЕЩЁ</span>
                  <svg class="svg-icon arrow-icon">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-arrow-icon"></use>
                  </svg>
                </button>
              </div>
            </div>
            <div class="main-items-wrap_items-mob-slider visible-xs visible-sm">
              <div class="item">
                <div class="main-items-wrap_items-place_item">
                  <div class="main-items-wrap_items-place_item_img-wrap">
                    <div class="inner-wrap"><a href="#"><img src="img/userfiles/home/item.jpg" alt="">
                        <div class="flag-new">
                          <svg class="svg-icon item-flag-icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#item-flag-icon"></use>
                          </svg><span class="text">new</span>
                        </div></a></div>
                  </div>
                  <div class="main-items-wrap_items-place_item_name-wrap"><span>
                       
                      Краска Tikkurila <br>EURO2 / 9 л</span></div>
                  <div class="main-items-wrap_items-place_item_price-wrap">
                    <div class="old-price"><span>3 500</span></div>
                    <div class="cur-price"><span>2 290</span><span class="rouble">й</span></div>
                  </div>
                  <div class="main-items-wrap_items-place_item_buttons-wrap">
                    <div class="count-btn-wrap">
                      <input type="number" value="1" data-min-value="1"><span class="plus"></span><span class="minus"></span>
                    </div>
                    <div class="to-cart-btn-wrap">
                      <button class="btn blue-btn fw">В КОРЗИНУ</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="main-items-wrap_items-place_item">
                  <div class="main-items-wrap_items-place_item_img-wrap">
                    <div class="inner-wrap"><a href="#"><img src="img/userfiles/home/item.jpg" alt="">
                        <div class="flag-new">
                          <svg class="svg-icon item-flag-icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#item-flag-icon"></use>
                          </svg><span class="text">new</span>
                        </div></a></div>
                  </div>
                  <div class="main-items-wrap_items-place_item_name-wrap"><span>
                       
                      Краска Tikkurila <br>EURO2 / 9 л</span></div>
                  <div class="main-items-wrap_items-place_item_price-wrap">
                    <div class="old-price"><span>3 500</span></div>
                    <div class="cur-price"><span>2 290</span><span class="rouble">й</span></div>
                  </div>
                  <div class="main-items-wrap_items-place_item_buttons-wrap">
                    <div class="count-btn-wrap">
                      <input type="number" value="1" data-min-value="1"><span class="plus"></span><span class="minus"></span>
                    </div>
                    <div class="to-cart-btn-wrap">
                      <button class="btn blue-btn fw">В КОРЗИНУ</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="main-items-wrap_items-place_item">
                  <div class="main-items-wrap_items-place_item_img-wrap">
                    <div class="inner-wrap"><a href="#"><img src="img/userfiles/home/item.jpg" alt="">
                        <div class="flag-new">
                          <svg class="svg-icon item-flag-icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#item-flag-icon"></use>
                          </svg><span class="text">new</span>
                        </div></a></div>
                  </div>
                  <div class="main-items-wrap_items-place_item_name-wrap"><span>
                       
                      Краска Tikkurila <br>EURO2 / 9 л</span></div>
                  <div class="main-items-wrap_items-place_item_price-wrap">
                    <div class="old-price"><span>3 500</span></div>
                    <div class="cur-price"><span>2 290</span><span class="rouble">й</span></div>
                  </div>
                  <div class="main-items-wrap_items-place_item_buttons-wrap">
                    <div class="count-btn-wrap">
                      <input type="number" value="1" data-min-value="1"><span class="plus"></span><span class="minus"></span>
                    </div>
                    <div class="to-cart-btn-wrap">
                      <button class="btn blue-btn fw">В КОРЗИНУ</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="main-items-wrap_items-place_item">
                  <div class="main-items-wrap_items-place_item_img-wrap">
                    <div class="inner-wrap"><a href="#"><img src="img/userfiles/home/item.jpg" alt="">
                        <div class="flag-new">
                          <svg class="svg-icon item-flag-icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#item-flag-icon"></use>
                          </svg><span class="text">new</span>
                        </div></a></div>
                  </div>
                  <div class="main-items-wrap_items-place_item_name-wrap"><span>
                       
                      Краска Tikkurila <br>EURO2 / 9 л</span></div>
                  <div class="main-items-wrap_items-place_item_price-wrap">
                    <div class="old-price"><span>3 500</span></div>
                    <div class="cur-price"><span>2 290</span><span class="rouble">й</span></div>
                  </div>
                  <div class="main-items-wrap_items-place_item_buttons-wrap">
                    <div class="count-btn-wrap">
                      <input type="number" value="1" data-min-value="1"><span class="plus"></span><span class="minus"></span>
                    </div>
                    <div class="to-cart-btn-wrap">
                      <button class="btn blue-btn fw">В КОРЗИНУ</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="main-items-wrap_items-place_item">
                  <div class="main-items-wrap_items-place_item_img-wrap">
                    <div class="inner-wrap"><a href="#"><img src="img/userfiles/home/item.jpg" alt="">
                        <div class="flag-new">
                          <svg class="svg-icon item-flag-icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#item-flag-icon"></use>
                          </svg><span class="text">new</span>
                        </div></a></div>
                  </div>
                  <div class="main-items-wrap_items-place_item_name-wrap"><span>
                       
                      Краска Tikkurila <br>EURO2 / 9 л</span></div>
                  <div class="main-items-wrap_items-place_item_price-wrap">
                    <div class="old-price"><span>3 500</span></div>
                    <div class="cur-price"><span>2 290</span><span class="rouble">й</span></div>
                  </div>
                  <div class="main-items-wrap_items-place_item_buttons-wrap">
                    <div class="count-btn-wrap">
                      <input type="number" value="1" data-min-value="1"><span class="plus"></span><span class="minus"></span>
                    </div>
                    <div class="to-cart-btn-wrap">
                      <button class="btn blue-btn fw">В КОРЗИНУ</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
        $main_yes_no = get_field('about_us_yes_no_main'); 
        if($main_yes_no): ?>
     	
        <div class="container">
            <?php  $about_us_array = get_field('about_us'); ?>
          <div class="main-text-block">
            <div class="main-text-block_title"><span>
                <?php echo $about_us_array['about_us_header'];?> 
                </span></div>
            <div class="main-text-block_text">
                <?php   $about_paragraph = $about_us_array['about_parag']?>
                 <?php foreach( $about_paragraph as $ab_text ): ?>
           
              <p><?php echo $ab_text['about_us_desc'] ?></p>
                <?php endforeach; ?>
            </div>
               <?php if($about_us_array['about_yes_no_button']): ?>
              <?php $about_button = $about_us_array['about_us_button'];?>
            <div class="main-text-block_button-place"><a href="<?php echo $about_button['about_us_link'];?>" class="btn btn blu-bd-btn fw light-blue"><?php echo $about_button['about_us_button_text'];?> </a></div>
              <?php endif; ?>
          </div>
        </div>
       <?php endif; ?>
<?php
get_footer();?>
