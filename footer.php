<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Milestar
 */

?>
<div id="footer">
	<div id="footer-upper-section" class="secondary">
		<div id="footer-centered-content">
			<div id="footer-upper-menu01" class="footer-column">
				<?php
					if(is_active_sidebar('footer-upper-menu01')){
						dynamic_sidebar('footer-upper-menu01');
					}
				?>
			</div>
			<div id="footer-upper-menu02" class="footer-column">
				<?php
					if(is_active_sidebar('footer-upper-menu02')){
						dynamic_sidebar('footer-upper-menu02');
					}
				?>
			</div>
			<div id="footer-upper-menu03" class="footer-column">
				<?php
					if(is_active_sidebar('footer-upper-menu03')){
						dynamic_sidebar('footer-upper-menu03');
					}
				?>
			</div>
			<div id="footer-upper-menu04" class="footer-column">
				<?php
					if(is_active_sidebar('footer-upper-menu04')){
						dynamic_sidebar('footer-upper-menu04');
					}
				?>
			</div>
			<div id="footer-upper-menu05" class="footer-column">
				<?php
					if(is_active_sidebar('footer-upper-menu05')){
						dynamic_sidebar('footer-upper-menu05');
					}
				?>
			</div>
			<div id="footer-upper-menu06" class="footer-column">
				<?php
					if(is_active_sidebar('footer-upper-menu06')){
						dynamic_sidebar('footer-upper-menu06');
					}
				?>
			</div>
			<div id="footer-upper-menu07" class="footer-column">
				<?php
					if(is_active_sidebar('footer-upper-menu07')){
						dynamic_sidebar('footer-upper-menu07');
					}
				?>
			</div>
			<div id="footer-upper-menu08" class="footer-column">
				<?php
					if(is_active_sidebar('footer-upper-menu08')){
						dynamic_sidebar('footer-upper-menu08');
					}
				?>
			</div>
		</div>
	</div>
	<div id="footer-bottom-section">
		<div id="footer-centered-content">
			<div id="search-box" class="search-input">
				<?php
					if(is_active_sidebar('search-box')){
						dynamic_sidebar('search-box');
					}
				?>
			</div>
			<div class="social-media-container">
				<a href="https://www.instagram.com/milestar.tires/" target="_blank" class="instagram-icon"></a>
				<a href="https://www.facebook.com/milestartires/" target="_blank" class="facebook-icon"></a>
			</div>
			<div class="ms-logo">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 726.9 91.3"><path class="no-fill" d="M617.8 75.2h-4.9v4.4h3.6c1.6 0 2.8-0.1 3.7-0.3 1.3-0.3 2-1 2-2C622.2 75.9 620.7 75.2 617.8 75.2z"/><path class="no-fill" d="M684 30.2c-6.2 0-10.2 0.1-10.2 0.1v9.3c0 0 4.7 0 10.2 0C693.2 39.5 693.5 30.2 684 30.2z"/><path class="no-fill" d="M722.1 15.8c0-0.2-0.1-0.3-0.2-0.5 -0.1-0.1-0.2-0.3-0.4-0.3 -0.2-0.1-0.5-0.1-1-0.1h-1.2v1.9h1.3c0.6 0 1-0.1 1.2-0.3C722 16.3 722.1 16.1 722.1 15.8z"/><polygon class="no-fill" points="593.3 42.9 608 42.9 600.5 27.3 "/><path class="no-fill" d="M723.3 12.9c-0.8-0.4-1.6-0.6-2.5-0.6 -0.8 0-1.7 0.2-2.5 0.6 -0.8 0.4-1.4 1-1.9 1.8 -0.5 0.8-0.7 1.6-0.7 2.4 0 0.8 0.2 1.6 0.7 2.4 0.4 0.8 1.1 1.3 1.9 1.8 0.8 0.4 1.6 0.6 2.5 0.6 0.9 0 1.7-0.2 2.5-0.6 0.8-0.4 1.4-1 1.9-1.8 0.4-0.8 0.7-1.6 0.7-2.4 0-0.8-0.2-1.6-0.7-2.4C724.7 13.9 724.1 13.3 723.3 12.9zM722.4 20.2l-0.6-1c-0.5-0.8-0.8-1.2-1.1-1.4 -0.2-0.1-0.5-0.2-0.8-0.2h-0.6v2.6h-1V14h2.2c0.8 0 1.3 0.1 1.7 0.2 0.3 0.1 0.6 0.3 0.8 0.6 0.2 0.3 0.3 0.6 0.3 0.9 0 0.5-0.2 0.8-0.5 1.2 -0.3 0.3-0.8 0.5-1.3 0.6 0.2 0.1 0.4 0.2 0.5 0.3 0.3 0.2 0.6 0.7 1 1.2l0.8 1.2H722.4z"/><path class="white-fill" d="M0 73.3h159.3V0H0V73.3zM4 4.6h150.7v64.6h-3.9l-77.7-45H64l-10.9 7 -23.3-8.4L24.3 24 4 34V4.6zM4 44.7l25.3-11.9 27 10 12.9-9.2 28.8 36H4V44.7z"/><polygon points="217.6 40.4 207.4 21.3 173.4 21.3 173.4 58.4 198.9 58.4 198.9 36.3 211.3 58.2 224.1 58.2 236.6 35.5 236.6 58.2 260.8 58.2 260.8 21.4 228.4 21.4 "/><rect x="273.2" y="21.4" width="27.8" height="37.4"/><polygon points="341.2 21.3 313.7 21.3 313.9 58.2 364.5 58.2 364.5 46.6 341.2 46.6 "/><polygon points="371.6 58.2 430.5 58.2 430.5 49.3 398.8 49.3 398.8 45.2 430.5 45.2 430.5 36.9 398.8 36.9 398.8 32.8 430.6 32.8 430.6 21.4 371.6 21.4 "/><path class="white-fill" d="M486.4 37c-8.2-0.5-14.1 0-19-0.3 -3.9-0.2-3.9-5.1 1-5.2 15-0.4 28.1 1.2 28.1 1.2V21.5c0 0-37.6-1.9-50.2 1.9 -6.9 2.1-8.6 5.3-8.8 10.1 -0.1 4.8 3.9 8.9 12.7 10.1 5.1 0.7 10.6 0.6 16.8 0.1 6.3-0.4 8.2 4 0.9 5.5 -7.3 1.5-27.2-1.9-27.2-1.9v9.9c0 0 41 2.7 49.9-0.8 6.8-2.6 8.5-5.7 8.4-9.6C498.7 42 495.2 37.5 486.4 37z"/><polygon class="white-fill" points="547.1 57.9 547.1 34.1 565.2 34.1 565.2 21.4 502.5 21.4 502.5 34.1 521.3 34.1 521.3 57.9 "/><path class="white-fill" d="M580.7 21.3L560 58.2l27.5-0.1 3.6-6.2h19.4l2.6 6.2h28l-20.2-36.8H580.7zM593.3 42.9l7.2-15.5 7.4 15.5H593.3z"/><path class="white-fill" d="M674 43.9L688.2 58h32.3l-22.4-16c0 0 19.8 1.6 19.8-9.5 0-11.1-25.4-11.1-25.4-11.1H648V58H674V43.9zM673.8 30.3c0 0 4-0.1 10.2-0.1 9.5 0 9.1 9.4 0 9.4 -5.5 0-10.2 0-10.2 0V30.3z"/><path class="white-fill" d="M721.9 17.8c-0.1-0.1-0.3-0.2-0.5-0.3 0.6 0 1-0.2 1.3-0.6 0.3-0.3 0.5-0.7 0.5-1.2 0-0.3-0.1-0.6-0.3-0.9 -0.2-0.3-0.5-0.5-0.8-0.6 -0.3-0.1-0.9-0.2-1.7-0.2h-2.2v6.2h1v-2.6h0.6c0.4 0 0.7 0.1 0.8 0.2 0.3 0.2 0.6 0.7 1.1 1.4l0.6 1h1.3l-0.8-1.2C722.5 18.4 722.2 18 721.9 17.8zM720.5 16.7h-1.3v-1.9h1.2c0.5 0 0.9 0 1 0.1 0.2 0.1 0.3 0.2 0.4 0.3 0.1 0.1 0.2 0.3 0.2 0.5 0 0.3-0.1 0.5-0.3 0.7C721.5 16.7 721.1 16.7 720.5 16.7z"/><path class="white-fill" d="M726.1 14.2c-0.5-0.9-1.3-1.6-2.3-2.1 -1-0.5-2-0.7-3-0.7 -1 0-2 0.2-3 0.7 -1 0.5-1.7 1.2-2.3 2.1 -0.5 0.9-0.8 1.9-0.8 2.9 0 1 0.3 1.9 0.8 2.9 0.5 0.9 1.3 1.6 2.2 2.1 1 0.5 2 0.8 3 0.8 1 0 2-0.3 3-0.8 1-0.5 1.7-1.2 2.2-2.1 0.5-0.9 0.8-1.9 0.8-2.9C726.9 16.1 726.6 15.1 726.1 14.2zM725.2 19.4c-0.4 0.8-1.1 1.3-1.9 1.8 -0.8 0.4-1.6 0.6-2.5 0.6 -0.9 0-1.7-0.2-2.5-0.6 -0.8-0.4-1.4-1-1.9-1.8 -0.4-0.8-0.7-1.6-0.7-2.4 0-0.8 0.2-1.6 0.7-2.4 0.5-0.8 1.1-1.4 1.9-1.8 0.8-0.4 1.6-0.6 2.5-0.6 0.8 0 1.7 0.2 2.5 0.6 0.8 0.4 1.4 1 1.9 1.8 0.4 0.8 0.7 1.6 0.7 2.4C725.9 17.9 725.6 18.7 725.2 19.4z"/><polygon class="ms-orange-fill" points="29.8 22.8 53.1 31.2 64 24.1 73.2 24.1 150.9 69.2 154.8 69.2 154.8 4.6 4 4.6 4 34 24.3 24 "/><polygon points="69.2 33.7 56.3 42.9 29.3 32.9 4 44.7 4 69.7 98 69.7 "/><polygon class="white-fill" points="530 76.7 540.8 76.7 540.8 90.9 557.2 90.9 557.2 76.7 568.2 76.7 568.2 69.3 530 69.3 "/><rect x="573.5" y="69.3" class="white-fill" width="16.6" height="21.5"/><path class="white-fill" d="M633.6 80.9c3.2-1.1 4.7-2.9 4.7-5.5 0-2.4-1.5-4.1-4.5-5.1 -1.9-0.7-4.4-1-7.5-1h-29.5v21.5h16l-0.3-7.2h0.4l8.5 7.2h18.5L627.2 82C630.1 81.8 632.2 81.5 633.6 80.9zM620.2 79.3c-0.9 0.2-2.2 0.3-3.7 0.3h-3.6v-4.4h4.9c3 0 4.4 0.7 4.4 2.1C622.2 78.4 621.5 79 620.2 79.3z"/><polygon class="white-fill" points="644.2 90.9 679.2 90.9 679.2 85.4 659.8 85.4 659.8 83.1 679.2 83.1 679.2 78.2 659.8 78.2 659.8 75.8 679.2 75.8 679.2 69.3 644.2 69.3 "/><path class="white-fill" d="M716.6 79.1c-1.8-0.6-5.1-0.8-10.1-0.8h-1.9c-2.6 0-3.9-0.4-3.9-1.3 0-0.5 0.4-0.8 1.1-1 1-0.2 2.7-0.4 5-0.4 1.8 0 4 0.1 6.5 0.2 2.5 0.1 4.6 0.3 6.3 0.4v-6.4c-6-0.6-11.3-0.9-16.1-0.9 -5.9 0-10.4 0.4-13.3 1.2 -3.8 1-5.6 3-5.6 6 0 1.4 0.3 2.6 1 3.6 1.1 1.6 3 2.6 5.6 2.9 1.9 0.3 5.1 0.4 9.5 0.3 1.6 0 2.6 0.1 3.1 0.3 0.6 0.2 0.9 0.5 0.9 1 0 0.5-0.3 0.8-1 1 -0.8 0.2-2.5 0.3-5.2 0.3 -4.4 0-8.5-0.2-12.3-0.5v5.4c7 0.5 12.8 0.8 17.6 0.8 5.8 0 10-0.5 12.7-1.5 2.9-1.1 4.4-3 4.4-5.6C720.8 81.6 719.4 79.9 716.6 79.1z"/></svg>
			</div>
		</div>
	</div>
	<div id="copyright-legal">
		<div id="footer-centered-content">
			<div class="copyright">Copyright 2017 Tireco, Inc. All rights reserved.</div>
			<div class="legal"><a href="privacy">Privacy Policy</a> &#124; <a href="terms">Terms and Conditions</a> &#124; <a href="disclaimer">Disclaimer Information</a></div>
		</div>
	</div>
</div>

<?php
if (is_front_page() ) :
    ?><script type="text/javascript"> var fileStructure = ''</script><?php
    echo "<script type='text/javascript' src='wp-content/themes/milestar-tires/js/main.js'></script>";
    echo "<script src='wp-content/themes/milestar-tires/owlcarousel/owl.carousel.min.js'></script>";
    echo "<script src='wp-content/themes/milestar-tires/js/front-page.js'></script>";
    echo "<script src='wp-content/themes/milestar-tires/js/footer.js'></script>";
elseif( is_page('news-article')):   
    if ( ! $paged || $paged < 2 ) {
         ?><script type="text/javascript"> var fileStructure = '../'</script><?php
        echo "<script type='text/javascript' src='../wp-content/themes/milestar-tires/js/main.js'></script>";
        echo "<script src='../wp-content/themes/milestar-tires/js/footer.js'></script>";
    } else {
        ?><script type="text/javascript"> var fileStructure = '../../../'</script><?php
        echo "<script type='text/javascript' src='../../../wp-content/themes/milestar-tires/js/main.js'></script>";
        echo "<script src='../../../wp-content/themes/milestar-tires/js/footer.js'></script>";
    }    
elseif( is_singular('news_article') ):
    ?><script type="text/javascript"> var fileStructure = '../../'</script><?php
    echo "<script type='text/javascript' src='../../wp-content/themes/milestar-tires/js/main.js'></script>";
    echo "<script src='../../wp-content/themes/milestar-tires/js/footer.js'></script>";
elseif( is_page('tire-search-result')):   
    ?><script type="text/javascript"> var fileStructure = '../'</script><?php
    echo "<script type='text/javascript' src='../wp-content/themes/milestar-tires/js/main.js'></script>";
    echo "<script type='text/javascript' src='../wp-content/themes/milestar-tires/js/tire-search-result.js'></script>";
    echo "<script src='../wp-content/themes/milestar-tires/js/footer.js'></script>";
elseif( has_parent('passenger-tires') || has_parent('light-truck-tires') || has_parent('commercial-lt-tires')):
    ?><script type="text/javascript"> var fileStructure = '../../'</script><?php
	echo "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' integrity='sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa' crossorigin='anonymous'></script>";
    echo "<script type='text/javascript' src='../../wp-content/themes/milestar-tires/js/main.js'></script>";    
    echo "<script type='text/javascript' src='../../wp-content/themes/milestar-tires/js/product-details.js'></script>";
    echo "<script type='text/javascript' src='../../wp-content/themes/milestar-tires/js/product-specs.js'></script>";
    echo "<script src='../../wp-content/themes/milestar-tires/js/footer.js'></script>";
elseif( is_page('contact-us')):   
    ?><script type="text/javascript"> var fileStructure = '../'</script><?php
    echo "<script type='text/javascript' src='../wp-content/themes/milestar-tires/js/main.js'></script>";    
    echo "<script type='text/javascript' src='../wp-content/themes/milestar-tires/js/contact-us.js'></script>";    
elseif( has_parent('tires-101') || has_parent('warranty')):  
    ?><script type="text/javascript"> var fileStructure = '../../'</script><?php
    echo "<script type='text/javascript' src='../../wp-content/themes/milestar-tires/js/main.js'></script>";  
else: 
    //is_page('warranty') included.
    ?><script type="text/javascript"> var fileStructure = '../'</script><?php
    echo "<script type='text/javascript' src='../wp-content/themes/milestar-tires/js/main.js'></script>";
    echo "<script src='../wp-content/themes/milestar-tires/js/footer.js'></script>";
endif; ?>
<?php wp_footer(); ?>
</body>
</html>
