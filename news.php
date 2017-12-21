<?php
/* Template Name: News Page */
get_header(); ?>
<main class="home-page-body news-list-body fullsize-content-wrapper content-centered-wrapper news-list" id="main" role="main">
    <div class="page-title">
        <h1>NEWS AND EVENTS</h1>
    </div> 
    
    <?php
      // set up or arguments for our custom query
      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
      $query_args = array(
        'post_type' => 'news_article',
        'posts_per_page' => 5,
        'paged' => $paged
      );
      // create a new instance of WP_Query
      $the_query = new WP_Query( $query_args );
    ?>

    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); // run the loop ?>
        <div class="article-row content-centered-wrapper"> 
            <div class="news-article viewport-content-wrapper">
               
                <div class="news-info-wrapper content-centered-wrapper">
                    <div class="news-image">
                        <img src="<?php the_field('Image'); ?>" alt="news image">    
                    </div>
                    <div class="news-info">
                        <?php //get_template_part('content','news')?>
                        
                        <div class="news-title">
                            <h2><?php echo the_title(); ?></h2>
                        </div>
                        <div class="news-date">
                            <h4><?php the_field('Date and Location'); ?></h4>
                        </div>
                        <div class="news-excerpt">
                            <p><?php the_excerpt(); ?></p>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="news-excerpt-mobile-link">
                            <div class="news-excerpt-mobile">
                                <p><?php the_excerpt(); ?></p>
                            </div>
                        </a>
                        
                        <a href="<?php the_permalink(); ?>" class="readmore">
                            <div class="readmore-container">    
                                <p>READ MORE</p>
                            </div>      
                        </a>
                    </div>
                </div>
            </div>
        </div>      
    <?php endwhile; ?>

    <?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
      <nav class="prev-next-posts viewport-content-wrapper">
        <div class="next-posts-link">
          <?php echo get_previous_posts_link( 'PREVIOUS' ); // display newer posts link ?>
        </div>
        <div class="prev-posts-link">
          <?php echo get_next_posts_link( 'NEXT', $the_query->max_num_pages ); // display older posts link ?>
        </div>
        
      </nav>
    <?php }

   endif; ?>


</main>







<?php
get_footer();
