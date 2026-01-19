<?php
/**
 * From the Blog
 */
return array(
	'title'      => __( 'From the Blog', 'pin-donation' ),
	'categories' => array( 'pin-donation' ),
	'blockTypes' => array( 'core/template-part/pin-donation' ),
	'content'    => '<!-- wp:group {"className":"pin-donation-section4","style":{"spacing":{"padding":{"top":"80px","right":"0px","left":"0px","bottom":"90px"}},"color":{"background":"#ffffff"}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group pin-donation-section4 has-background" style="background-color:#ffffff;padding-top:80px;padding-right:0px;padding-bottom:90px;padding-left:0px"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"33%","style":{"border":{"right":{"color":"#e7edf1","width":"1px"},"top":[],"bottom":[],"left":[]}}} -->
<div class="wp-block-column" style="border-right-color:#e7edf1;border-right-width:1px;flex-basis:33%"><!-- wp:group {"style":{"spacing":{"padding":{"top":"90px","bottom":"50px"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="padding-top:90px;padding-bottom:50px"><!-- wp:image {"id":260,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="'.esc_url(get_template_directory_uri()).'/assets/images/about-blog.png" alt="" class="wp-image-260"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":4,"style":{"typography":{"fontSize":"22px","fontStyle":"normal","fontWeight":"500"}},"fontFamily":"poppins"} -->
<h4 class="wp-block-heading has-poppins-font-family" style="font-size:22px;font-style:normal;font-weight:500">From the Blog</h4>
<!-- /wp:heading -->

<!-- wp:heading {"style":{"typography":{"fontSize":"45px","fontStyle":"normal","fontWeight":"600"},"spacing":{"padding":{"top":"10px","bottom":"25px"}}},"fontFamily":"playfair-display"} -->
<h2 class="wp-block-heading has-playfair-display-font-family" style="padding-top:10px;padding-bottom:25px;font-size:45px;font-style:normal;font-weight:600">Stay Up to Date<br>with Our Charity<br>Articles</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"bottom":"60px"}}}} -->
<p style="padding-bottom:60px">Fusce at quam mauris. Serutrum tem<br>por tempor andy Suspe ndisse vestib<br>ulu justod turpis cursus quissating ins<br>agittis lacustepui.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"pin-donation-button-postall","style":{"typography":{"fontSize":"17px"},"spacing":{"padding":{"top":"0px","bottom":"0px","right":"40px"},"margin":{"bottom":"90px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons has-custom-font-size pin-donation-button-postall" style="margin-bottom:90px;padding-top:0px;padding-right:40px;padding-bottom:0px;font-size:17px"><!-- wp:button {"backgroundColor":"brand","width":100,"className":"is-style-fill","style":{"spacing":{"padding":{"top":"15px","bottom":"15px"}},"border":{"radius":"250px"}}} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-fill"><a class="wp-block-button__link has-brand-background-color has-background wp-element-button" href="#" style="border-radius:250px;padding-top:15px;padding-bottom:15px">VIEW ALL POSTS</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"60%","style":{"spacing":{"padding":{"left":"90px","top":"90px"}}}} -->
<div class="wp-block-column" style="padding-top:90px;padding-left:90px;flex-basis:60%"><!-- wp:group {"className":"pin-donation-post-list","layout":{"type":"constrained"}} -->
<div class="wp-block-group pin-donation-post-list"><!-- wp:latest-posts {"postsToShow":3,"displayPostContent":true,"excerptLength":20,"displayFeaturedImage":true,"featuredImageAlign":"left","featuredImageSizeSlug":"medium","featuredImageSizeWidth":230,"featuredImageSizeHeight":227,"style":{"spacing":{"margin":{"right":"0","left":"0"}}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
);