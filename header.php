<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Milestar
 */



?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="profile" href="http://gmpg.org/xfn/11">

<?php 

    add_action('wp_enqueue_scripts','load_js');

    function load_js(){

        wp_enqueue_script('jquery');

    }

    function has_parent($parentId)  {

    $url = get_permalink();

    if (strpos($url, $parentId) !== false)

        // echo 'true';

        return true;

};



?>



<?php

if (is_front_page() ) :

    echo "<link rel='stylesheet' href='wp-content/themes/milestar-tires/owlcarousel/assets/owl.carousel.min.css'>";

    echo "<link rel='stylesheet' href='wp-content/themes/milestar-tires/owlcarousel/assets/owl.theme.default.min.css'>";

elseif( is_page('news-article')):   

     if ( ! $paged || $paged < 2 ) {

         // This is not a paginated page (or it's simply the first page of a paginated page/post)

         echo "<link rel='stylesheet' href='../wp-content/themes/milestar-tires/newslist.css'>";

     } else {

         // This is a paginated page.

         echo "<link rel='stylesheet' href='../../../wp-content/themes/milestar-tires/newslist.css'>";

     }    

elseif( is_singular('news_article') ):

    echo "<link rel='stylesheet' href='../../wp-content/themes/milestar-tires/newsarticle.css'>";

elseif( is_page('tire-search-result')):

    echo "<link rel='stylesheet' href='../wp-content/themes/milestar-tires/tire-search-result.css'>";

elseif( is_page('commercial') || is_page('passenger-tires') || is_page('light-truck-tires') ||is_page('commercial-lt-tires')):

    echo "<link rel='stylesheet' href='../wp-content/themes/milestar-tires/commercial-tbr.css'>";

elseif( is_page('warranty')):

    echo "<link rel='stylesheet' href='../wp-content/themes/milestar-tires/warranty.css'>";

elseif( is_page('disclaimer') || is_page('privacy') || is_page('terms') || is_page('standard-limited-mileage-warranty') || is_page('standard-limited-warranty') || is_page('warranty-claim-form') || is_page('tire-installation-form') || is_page('casing-warranty') || is_page('mounting-and-rotation')):

    echo "<link rel='stylesheet' href='../../wp-content/themes/milestar-tires/warranty.css'>";

elseif( is_page('tires-101')):

    echo "<link rel='stylesheet' href='../wp-content/themes/milestar-tires/tires-101.css'>";

elseif( is_page('aboutus')):

    echo "<link rel='stylesheet' href='../wp-content/themes/milestar-tires/about-us.css'>";

elseif(has_parent('tires-101') || has_parent('warranty')):

    echo "<link rel='stylesheet' href='../../wp-content/themes/milestar-tires/tires-101.css'>";

elseif( is_page('contact-us')):

    echo "<link rel='stylesheet' href='../wp-content/themes/milestar-tires/contact-us.css'>";   

elseif( is_page('dealer-result')):

    echo "<link rel='stylesheet' href='../wp-content/themes/milestar-tires/search-result.css'>";   

elseif( has_parent('passenger-tires') || has_parent('light-truck-tires') || has_parent('commercial-lt-tires') || has_parent('commercial')):

    echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>";

    echo "<link rel='stylesheet' href='../../wp-content/themes/milestar-tires/product-details.css'>";

    echo "<link rel='stylesheet' href='../../wp-content/themes/milestar-tires/product-specs-table.css'>";

    echo "<link rel='stylesheet' href='../../wp-content/themes/milestar-tires/search.css'>";

else: 

    echo "<link rel='stylesheet' href='../wp-content/themes/milestar-tires/newslist.css'>";

    echo "<link rel='stylesheet' href='../../wp-content/themes/milestar-tires/search.css'>";

endif;

    



?>



<?php wp_head(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50600467-2', 'auto');
  ga('send', 'pageview');

</script>



</head>



<body <?php body_class(); ?>>



	<header id="masthead" class="site-header header" role="banner">

        <section class="fullsize-content-wrapper upper-header">

            <div class="viewport-content-wrapper mobile">

                <div class="logo-container">

                    <a class="content-centered-wrapper logo" href="/index.php">

                        <div class="logo-img"></div>               

                    </a>

                </div>

                <div class="navbar-container">

                    <div class="content-centered-wrapper main-navigation" id="site-navigation" role="navigation">

                        <?php wp_nav_menu( array('container_class'=> 'content-centered-wrapper fullsize-content-wrapper', 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'menu_class' => 'navbar' ) ); ?>

                        <?php //if (function_exists(clean_custom_menus())) clean_custom_menus(); ?>

                    </div>

                </div>

                <div class="mobile-divider">

                    <div class="logo-menu-divider"></div>

                </div>

                <div class="navbar-menu">

                    <?php 

                    if (is_front_page() ) :

                    ?><img src="img/menu.png" alt="MENU"><?php 

                    elseif( is_page('news-article')):   

                        if ( ! $paged || $paged < 2 ) {

                            ?><img src="../img/menu.png" alt=""><?php 

                        } else {

                            ?><img src="../../../img/menu.png" alt=""><?php 

                        }  

                    elseif(is_singular('news_article')):

                        ?><img src="../../img/menu.png" alt=""><?php 

                    elseif(has_parent('passenger-tires') || has_parent('light-truck-tires') || has_parent('commercial-lt-tires')):

                        ?><img src="../../img/menu.png" alt=""><?php 

                    elseif(has_parent('tires-101') || has_parent('warranty')):

                        ?><img src="../../img/menu.png" alt=""><?php 

                    else: 

                    ?><img src="../img/menu.png" alt="MENU"><?php 

                    endif;

                    ?>                    

                </div>

            </div>

        </section>

        <section class="fullsize-content-wrapper lower-header">

            <div class="viewport-content-wrapper">

                <div class="content-centered-wrapper search-options">

                    <div class="search-options-item right-align">

                        <div class="search-option-item-container">

                            <div class="search-type">

                                <p>

                                    FIND YOUR TIRES        

                                </p>

                            </div>

                            <div class="search-input-container vehicle-search vehicle">

                                <div class="search-btn">

                                    <p>

                                        VEHICLE                                        

                                    </p>

                                </div>

                            </div>

                            <div class="search-input-container vehicle-search size">

                                <div class="search-btn">

                                    <P>

                                        SIZE

                                    </P>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="search-options-divider"></div>

                    <div class="search-options-item left-align">

                        <div class="search-option-item-container">                            

                            <div class="search-type">

                                <p>

                                    FIND A DEALER    

                                </p>

                            </div>

                            <div class="search-input-container dealer-search">

                                <a href="dealer-result" class="search-page-link">

                                    <div class="search-btn">

                                        <P>

                                            SEARCH

                                        </P>

                                    </div>

                                </a>

                            </div>

                            <!--

                            <div class="search-input-container input-container">

                                <input type="text" class="search-input-zip" placeholder="ZIP CODE">

                            </div>

                            <div class="search-input-container input-container">

                                <select name="distance" id="distance-options" class="search-select-options">

                                    <option value="">DISTANCE</option>

                                    <option value="">5 Miles</option>

                                    <option value="">10 Miles</option>

                                    <option value="">15 Miles</option>

                                    <option value="">20 Miles</option>

                                    <option value="">25 Miles</option>

                                </select>

                            </div>

                            -->

                            

                            

                            

                        </div>

                    </div>

                </div>

            </div>

        </section>

        

        <div class="mobile-menu">

            <?php wp_nav_menu( array('menu' => 'Mobile Header') ); ?>

        </div>





	</header><!-- #masthead -->

    <section class="find-tire-options hidden">

        <div class="fullsize-content-wrapper content-centered-wrapper">

            <div class="viewport-content-wrapper content-centered-wrapper">

                <div class="content-centered-wrapper vehicle-search-options-container">

                    <ul class="vehicle-search-options-list">

                        <li class="vehicle-search-option year-option">

                            <div id="vehicle-year" class="search-select-options">

                                <div class="select-option-wrapper">

                                    <p>YEAR</p>

                                    <span>

                                    <?php 

                                    if( is_page('news-article')):   

                                        if ( ! $paged || $paged < 2 ) {

                                            ?><img src="../img/drop_down.png" alt=""><?php 

                                        } else {

                                            ?><img src="../../../img/drop_down.png" alt=""><?php 

                                        }  

                                    elseif(is_singular('news_article')):

                                        ?><img src="../../img/drop_down.png" alt=""><?php 

                                    elseif(is_front_page()):

                                        ?><img src="img/drop_down.png" alt=""><?php 

                                    elseif(has_parent('passenger-tires') || has_parent('light-truck-tires') || has_parent('commercial-lt-tires')):

                                        ?><img src="../../img/drop_down.png" alt=""><?php 

                                    elseif(has_parent('tires-101') || has_parent('warranty')):

                                        ?><img src="../../img/drop_down.png" alt=""><?php 

                                    else: 

                                        ?><img src="../img/drop_down.png" alt=""><?php 

                                    endif;

                                    ?>

                                   </span>    

                                </div>

                            </div>

                        </li>

                        <li class="vehicle-search-option">

                            <div id="vehicle-make" class="search-select-options">

                                <div class="select-option-wrapper">

                                    <p>MAKE</p>

                                    <span>

                                    <?php 

                                    if( is_page('news-article')):   

                                        if ( ! $paged || $paged < 2 ) {

                                            ?><img src="../img/drop_down.png" alt=""><?php 

                                        } else {

                                            ?><img src="../../../img/drop_down.png" alt=""><?php 

                                        } 

                                    elseif(is_singular('news_article')):

                                        ?><img src="../../img/drop_down.png" alt=""><?php 

                                    elseif(is_front_page()):

                                        ?><img src="img/drop_down.png" alt=""><?php 

                                    elseif(has_parent('passenger-tires') || has_parent('light-truck-tires') || has_parent('commercial-lt-tires')):

                                        ?><img src="../../img/drop_down.png" alt=""><?php

                                    elseif(has_parent('tires-101') || has_parent('warranty')):

                                        ?><img src="../../img/drop_down.png" alt=""><?php

                                    else: 

                                        ?><img src="../img/drop_down.png" alt=""><?php 

                                    endif;

                                    ?>

                                   </span>    

                                </div>

                            </div>

                        </li>

                        <li class="vehicle-search-option">

                            <div id="vehicle-model" class="search-select-options">

                                <div class="select-option-wrapper">

                                    <p>MODEL</p>

                                    <span>

                                    <?php 

                                    if( is_page('news-article')):   

                                        if ( ! $paged || $paged < 2 ) {

                                            ?><img src="../img/drop_down.png" alt=""><?php 

                                        } else {

                                            ?><img src="../../../img/drop_down.png" alt=""><?php 

                                        }  

                                    elseif(is_singular('news_article')):

                                        ?><img src="../../img/drop_down.png" alt=""><?php 

                                    elseif(is_front_page()):

                                        ?><img src="img/drop_down.png" alt=""><?php

                                    elseif(has_parent('passenger-tires') || has_parent('light-truck-tires') || has_parent('commercial-lt-tires')):

                                        ?><img src="../../img/drop_down.png" alt=""><?php

                                    elseif(has_parent('tires-101') || has_parent('warranty')):

                                        ?><img src="../../img/drop_down.png" alt=""><?php

                                    else: 

                                        ?><img src="../img/drop_down.png" alt=""><?php 

                                    endif;

                                    ?>

                                   </span>    

                                </div>

                            </div>

                        </li>

                        <li class="vehicle-search-option">

                            <div id="vehicle-trim" class="search-select-options">

                                <div class="select-option-wrapper">

                                    <p>TRIM</p>

                                    <span>

                                    <?php 

                                    if( is_page('news-article')):   

                                        if ( ! $paged || $paged < 2 ) {

                                            ?><img src="../img/drop_down.png" alt=""><?php 

                                        } else {

                                            ?><img src="../../../img/drop_down.png" alt=""><?php 

                                        }  

                                    elseif(is_singular('news_article')):

                                        ?><img src="../../img/drop_down.png" alt=""><?php 

                                    elseif(is_front_page()):

                                        ?><img src="img/drop_down.png" alt=""><?php

                                    elseif(has_parent('passenger-tires') || has_parent('light-truck-tires') || has_parent('commercial-lt-tires')):

                                        ?><img src="../../img/drop_down.png" alt=""><?php

                                    elseif(has_parent('tires-101') || has_parent('warranty')):

                                        ?><img src="../../img/drop_down.png" alt=""><?php

                                    else: 

                                        ?><img src="../img/drop_down.png" alt=""><?php 

                                    endif;

                                    ?>

                                   </span>

                                </div>

                            </div>

                        </li>

                        <li class="vehicle-search-option">

                            <div id="vehicle-find-tire-submit" class="find-tire-submit">

                                <p>

                                    FIND TIRES    

                                </p>

                            </div>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </section>

    <section class="size-search-options hidden">

        <div class="fullsize-content-wrapper content-centered-wrapper">

            <div class="viewport-content-wrapper content-centered-wrapper">

                <div class="content-centered-wrapper size-search-options-container">

                    <ul class="size-search-options-list">

                        <li class="size-search-option">

                            <div id="size-width" class="search-select-options">

                                <div class="select-option-wrapper">

                                    <p>WIDTH</p>

                                    <span>

                                    <?php 

                                    if( is_page('news-article')):   

                                        if ( ! $paged || $paged < 2 ) {

                                            ?><img src="../img/drop_down.png" alt=""><?php 

                                        } else {

                                            ?><img src="../../../img/drop_down.png" alt=""><?php 

                                        }  

                                    elseif(is_singular('news_article')):

                                        ?><img src="../../img/drop_down.png" alt=""><?php 

                                    elseif(is_front_page()):

                                        ?><img src="img/drop_down.png" alt=""><?php

                                    elseif(has_parent('passenger-tires') || has_parent('light-truck-tires') || has_parent('commercial-lt-tires')):

                                        ?><img src="../../img/drop_down.png" alt=""><?php

                                    elseif(has_parent('tires-101') || has_parent('warranty')):

                                        ?><img src="../../img/drop_down.png" alt=""><?php

                                    else: 

                                        ?><img src="../img/drop_down.png" alt=""><?php 

                                    endif;

                                    ?>

                                   </span> 

                                </div>

                            </div>

                        </li>

                        <li class="size-search-option">

                            <div id="size-ratio" class="search-select-options">

                                <div class="select-option-wrapper">

                                    <p>RATIO</p>

                                    <span>

                                    <?php 

                                    if( is_page('news-article')):   

                                        if ( ! $paged || $paged < 2 ) {

                                            ?><img src="../img/drop_down.png" alt=""><?php 

                                        } else {

                                            ?><img src="../../../img/drop_down.png" alt=""><?php 

                                        }  

                                    elseif(is_singular('news_article')):

                                        ?><img src="../../img/drop_down.png" alt=""><?php 

                                    elseif(is_front_page()):

                                        ?><img src="img/drop_down.png" alt=""><?php

                                    elseif(has_parent('passenger-tires') || has_parent('light-truck-tires') || has_parent('commercial-lt-tires')):

                                        ?><img src="../../img/drop_down.png" alt=""><?php

                                    elseif(has_parent('tires-101') || has_parent('warranty')):

                                        ?><img src="../../img/drop_down.png" alt=""><?php

                                    else: 

                                        ?><img src="../img/drop_down.png" alt=""><?php 

                                    endif;

                                    ?>

                                   </span>   

                                </div>

                            </div>

                        </li>

                        <li class="size-search-option">

                            <div id="size-rim" class="search-select-options">

                                <div class="select-option-wrapper">

                                    <p>RIM</p>

                                    <span>

                                    <?php 

                                    if( is_page('news-article')):   

                                        if ( ! $paged || $paged < 2 ) {

                                            ?><img src="../img/drop_down.png" alt=""><?php 

                                        } else {

                                            ?><img src="../../../img/drop_down.png" alt=""><?php 

                                        }  

                                    elseif(is_singular('news_article')):

                                        ?><img src="../../img/drop_down.png" alt=""><?php 

                                    elseif(is_front_page()):

                                        ?><img src="img/drop_down.png" alt=""><?php

                                    elseif(has_parent('passenger-tires') || has_parent('light-truck-tires') || has_parent('commercial-lt-tires')):

                                        ?><img src="../../img/drop_down.png" alt=""><?php

                                    elseif(has_parent('tires-101') || has_parent('warranty')):

                                        ?><img src="../../img/drop_down.png" alt=""><?php

                                    else: 

                                        ?><img src="../img/drop_down.png" alt=""><?php 

                                    endif;

                                    ?>

                                   </span>

                                </div>

                            </div>

                        </li>

                        <li class="size-search-option">

                            <div id="size-find-tire-submit" class="find-tire-submit">

                                <p>

                                    FIND TIRES    

                                </p>

                            </div>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </section>