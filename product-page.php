<?php
/* Template Name: product-page */

get_header(); ?>
    <main class="home-page-body fullsize-content-wrapper content-centered-wrapper site-main" id="main" role="main">
        <?php
        while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/content', 'page' );

        endwhile;
        
        $pagename = get_the_title();
        
        ?>
        <script>var productName = '<?php echo $pagename ?>'</script>
        
        <div class="tire-specs-wrapper">
            <div class="spec-tables-container wheel-diameter">
                <table class="tire-spec-table">
                    <tbody>
                        <tr class="table-header-row">
                            <th class="table-header-col">Wheel Diameter</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="spec-tables-container full-specs">
                <table class="tire-spec-table">
                    <tbody>
                        <tr class="table-header-row">
                            <th class="table-header-col">Size</th>
                            <th class="table-header-col">Item Number</th>
                            <th class="table-header-col">Service Index</th>
                            <th class="table-header-col">Sidewall</th>
                            <th class="table-header-col">LR/PR</th>
                            <th class="table-header-col">Tread Depth</th>
                            <th class="table-header-col">Rim Width</th>
                            <th class="table-header-col">Section Width</th>
                            <th class="table-header-col">Overall Diameter</th>
                            <th class="table-header-col">Max Load Single</th>
                            <th class="table-header-col">Approximate Weight</th>
                            <th class="table-header-col">UTQG</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="customer-reviews-container">
            <h1 class="customer-reviews-header">
                Customer Reviews
            </h1>
            <?php echo do_shortcode("[submit-review]"); ?>
            <?php echo do_shortcode("[ultimate-reviews product_name='$pagename']"); ?>
        </div>
    </main>
<?php
//get_sidebar();
get_footer();

