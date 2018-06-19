  <?php
      /*
      Template Name: Статьи
      Template Post Type: post, page
      */
      ?>
      <?php
      get_header();

      ?>
     <?php	
		$catid = null;
		if (isset($_GET['catid'])) {
			$catid = $_GET['catid'];
		}
      ?>
      
 <div class="container-fluid">
                <div class="row">
         <div class="font_news">
      		<div class="container box-container">
      			<!--<div class="patch-man">Блог «Истинный путь человека»</div>
      				<div class="shop-title">Гипертония - лечение народными <br>средствами</div>
      		        -->
			<?php echo do_shortcode('[xyz-ihs snippet="Stati-text"]'); ?>
      		</div>
      	</div>
              </div>
  </div>
           
       <div class="block">

            <div class="container">
              <div class="row">

				<div class="col-xs-12 col-sm-3 articles-menu">
					<ul>
                        <!--echo '<li><a href="/article?catid=' . $category->term_id . '" title="' . sprintf( __( "Смотреть всё для: %s" ), $category->name ) . '" ' . '>' . $category->name.'</a></li> ';-->
					<?php
						$args = array('parent' => 54);
						$categories = get_categories( $args );
						foreach($categories as $category) { ?>
						    <li>
                                <a style="font-size: 20px;" href="/article?catid=<?= $category->term_id ?>"
                                   title="<?= sprintf( __( "Смотреть всё для: %s" ), $category->name ) ?>"><?= $category->name ?></a>
                                <ul style="padding-left: 15px; padding-bottom: 20px; padding-top: 10px;">
                                    <?php
                                    $posts_args = array('category' => $category->term_id);
                                    $posts = get_posts( $posts_args );
                                    foreach($posts as $post) { ?>
                                        <li style="padding-top: 3px; padding-bottom: 3px;">
                                            <a  style="font-size: 16px;" href="<?php  the_permalink($post->ID); ?>"><?= $post->post_title ?></a>
                                        </li>
                                    <?php }
                                    ?>
                                    <li style="padding-top: 3px; padding-bottom: 3px;">
                                        <a  style="font-size: 16px;" href="/article?catid=<?= $category->term_id ?>">Перейти к остальным статьям этой категории</a>
                                    </li>
                                </ul>
                            </li>
						<?php }
					?>					
                    </ul>
				</div>
              <div class="col-xs-12 col-sm-9 articles">
              
		         <?php 
					$args = "post_type=post&cat=54,58,59";
					if ($catid != null) {
						$args = "post_type=post&cat=" . $catid;
					}
				$price = query_posts($args);
		        $count =1;
		        foreach ($price as $post):
		          the_post();?>
			<!--Новый вывод данных-->
                    <?php if(in_category('premium')) { ?>
                  <div class="row novosti-wrapper" style="box-shadow: 0 0 36px 0 rgba(40, 137, 101, 0.6); position: relative;">
                      <a href="<?php the_permalink(); ?>" style="position: absolute; top:0; left: 0; width: 100%; height: 100%; z-index: 1;"></a>
                      <span class="premium-title">Премиум</span>
                <?php } else { ?>
                    <div class="row novosti-wrapper" style="position: relative">
                        <a href="<?php the_permalink(); ?>" style="position: absolute; top:0; left: 0; width: 100%; height: 100%; z-index: 1;"></a>
                <?php } ?>
			    <?php if (get_the_post_thumbnail(get_the_ID()) != "") { ?>
			    <div class="col-md-3 col-sm-3 col-xs-12 text-center">
			        <div class="about imgprev">
                                    <?php the_post_thumbnail('full',array('class' => 'img-responsive')); ?>
                                </div>
			    </div>
			    <div class="col-md-9 col-sm-9 col-xs-12">
			        <div class="blogi-zagolovok">
                                   <a href="<?php the_permalink(); ?>"><?= $post->post_title; ?></a>
				</div>
	                        <div class="blogi-date">
				    <?
				        $date = new DateTime($post->post_date);
                                        echo $date->Format('d.m.Y');
				    ?>
	                        </div>
	                        <div class="blogi-introtext">
				    <?  $text=$post->post_content;				    
				        $string = strip_tags($text);
                                        $string = substr($string, 0, 300);
                                        $string = rtrim($string, "!,.-");
                                        $string = substr($string, 0, strrpos($string, ' '));
                                        echo $string."… ";

				    ?>
                                </div>
				<div class="post-footer to-left" style="position: relative; z-index: 2;">
                         <div class="button-love to-left top">
                    <p class="love-text">Нравится ли вам это?<?php if(function_exists('wp_ulike')) wp_ulike('get'); ?></p>

                  </div>
                        <div class="post-links to-right"> 
                          <span class="comments">
                          <!--  <i class="fa fa-comment-o" aria-hidden="true"></i><a href="#" class="hover-link number-comment">0</a>  -->
                         </span>
                         <span class="more"> <a href="<?php the_permalink(); ?>" class="link hover-link">Подробнее</a></span>
                       </div>
                     </div>
			    </div>
			    <? } else { ?>
			    <div class="col-md-12 col-sm-12 col-xs-12">
			        <div class="blogi-zagolovok">
                                   <a href="<?php the_permalink(); ?>"><?= $post->post_title; ?></a>
				</div>
	                        <div class="blogi-date">
				    <?
				        $date = new DateTime($post->post_date);
                                        echo $date->Format('d.m.Y');
				    ?>
	                        </div>
	                        <div class="blogi-introtext">
				    <?  $text=$post->post_content;				    
				        $string = strip_tags($text);
                                        $string = substr($string, 0, 300);
                                        $string = rtrim($string, "!,.-");
                                        $string = substr($string, 0, strrpos($string, ' '));
                                        echo $string."… ";

				    ?>
                                </div>
				<div class="post-footer to-left"  style="position: relative; z-index: 2;">
                         <div class="button-love to-left top">
                    <p class="love-text">Нравится ли вам это?<?php if(function_exists('wp_ulike')) wp_ulike('get'); ?></p>

                  </div>
                        <div class="post-links to-right"> 
                          <span class="comments">
                          <!--  <i class="fa fa-comment-o" aria-hidden="true"></i><a href="#" class="hover-link number-comment">0</a>  -->
                         </span>
                         <span class="more"> <a href="<?php the_permalink(); ?>" class="link hover-link">Подробнее</a></span>
                       </div>
                     </div>
			    </div>
			    <? } ?>
			</div>
			<!--Новый вывод данных-->
                 <?php if ($count % 2 === 0 ) {
          echo '<div class="clearfix visible-sm"></div>';
        }
        $count++;
        ?>
        <?php
        endforeach;
        wp_reset_query();?>
  
             </div>

             </div>
             </div>
             </div>  
           </div>
        </div>

        <?php

      get_footer();