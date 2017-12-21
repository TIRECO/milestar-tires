<?php
/* Template Name: front-page */

get_header(); ?>
    <main class="home-page-body fullsize-content-wrapper content-centered-wrapper site-main" id="main" role="main">
        <?php
        while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/content', 'page' );

        endwhile; // End of the loop.
        ?>
        <div class="slider-wrapper">
        <?php 
            $dirPath = "img/product-lineup/*";
            $folders = glob($dirPath, GLOB_ONLYDIR);
            $count = 1;
            foreach($folders as $folder){
                $folderName = substr($folder,strripos($folder,'/')+3);
                $images = glob($folder.'/'.'*.png'); ?>
                <div class='owl-carousel <?php echo $folderName; if($count > 1):echo ' hidden'; endif;?>'>                
                <?php
                $count = $count + 1;                
                foreach($images as $image) {                    
                    $imgName = substr($image, strripos($image,"/")+1);
                    $strLen = strlen($imgName);
                    $lastPos =  strripos($imgName,'.');
                    $productName = substr($imgName,strpos($imgName," "),$lastPos-strpos($imgName," "));
                    $productTitle = str_replace("+","/",str_replace("_"," ",$productName));
                    $productPageLink = substr($productName,1);
                    echo '<div class="carousel-item-container">
                            <img src="'.$image.'" class="carousel-image carousel-item" />
                            <div class="product-name carousel-item"><p>'.$productTitle.'</p></div>
                          </div>';
                }
                ?>
                </div>            
            <?php        
            }
        ?>
        </div>
    </main>
<?php
//get_sidebar();
get_footer();

