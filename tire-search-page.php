<?php
/* Template Name: Tire Search Result*/
get_header();
if(!empty($_GET['size'])){
    $query =  $_GET['size'];
}else{
    $query = "null";
}
if(!empty($_GET['genericSize'])){
    $genericSize = $_GET['genericSize'];
}
else{
    $genericSize = "null";
}
?>
    <main class="home-page-body fullsize-content-wrapper content-centered-wrapper site-main" id="main" role="main">
        <section class="search-result-container viewport-content-wrapper content-centered-wrapper">
            <div class="search-result">
                <div class="search-result-header">
                    <h1>
                        FIND YOUR TIRE
                    </h1>
                </div>
                <div class="search-result-sub-header content-centered-wrapper">
                    <p>
                        <script type="text/javascript"> 
                            var quarriedSize = <?php echo $query?>;
                            var genericSize = "<?php echo $genericSize?>";
                        </script>
                        
                        <span class="search-result-quantity"></span> 
                        RESULTS FOR:<span class="search-result-tire-size"></span>
                    </p>
                </div>
            </div>
        </section>
        <section class="search-result-items-container viewport-content-wrapper content-centered-wrapper">
            
        </section>
    </main>
<?php
//get_sidebar();
get_footer();

