<?php 
/** 
 * Templeate for displaying art custom post type entries
 */
?>
<article id="post-<?php the_ID();?>" <?php post_class();?>>
    <div class="entry-img">
        <img src="<?php the_field('Image'); ?>" alt="news image">
    </div>
    <div class="article-content-wrapper">
        <div class="article-content">
            <div class="article-title">            
                <h1 class="entry-title">
                   <?php  the_title(); ?>    
                </h1>
            </div>
            <div class="location">
                <p>
                    <?php the_field('Date and Location'); ?>
                </p>
            </div>
            <div class="article-text">
                <p>
                    <?php the_field('Article'); ?>
                </p>
            </div>
        </div>    
    </div>
</article>


