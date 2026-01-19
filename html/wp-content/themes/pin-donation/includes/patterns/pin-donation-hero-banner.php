<?php
/**
 * Hero Banner
 */
return array(
	'title'      => __( 'Hero Banner', 'pin-donation' ),
	'categories' => array( 'pin-donation' ),
	'blockTypes' => array( 'core/template-part/pin-donation' ),
	'content'    => '<!-- wp:group {"className":"pin-donation-banner","style":{"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}}},"backgroundColor":"foreground","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group pin-donation-banner has-foreground-background-color has-background" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:image {"id":537,"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":{"topLeft":"0px","topRight":"0px","bottomLeft":"0px","bottomRight":"0px"}}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="'.esc_url(get_template_directory_uri()).'/assets/images/banner-img.jpg" alt="" class="wp-image-537" style="border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"pin-donation-banner-content","layout":{"type":"constrained"}} -->
<div class="wp-block-group pin-donation-banner-content"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"57px","fontStyle":"normal","fontWeight":"600"},"spacing":{"padding":{"right":"240px","left":"240px"}}},"textColor":"background","fontFamily":"playfair-display"} -->
<h1 class="wp-block-heading has-text-align-center has-background-color has-text-color has-playfair-display-font-family" style="padding-right:240px;padding-left:240px;font-size:57px;font-style:normal;font-weight:600">Helps People life and Their<br>Formation</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"align":"wide","style":{"typography":{"fontSize":"17px","fontStyle":"normal","fontWeight":"500"},"spacing":{"margin":{"top":"35px"},"blockGap":"0"},"border":{"radius":"250px"}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons alignwide has-custom-font-size" style="border-radius:250px;margin-top:35px;font-size:17px;font-style:normal;font-weight:500"><!-- wp:button {"textAlign":"center","backgroundColor":"background","textColor":"primary","className":"pin-donation-discover-button","style":{"spacing":{"padding":{"left":"1.5rem","right":"1.5rem","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"radius":"250px"},"typography":{"fontSize":"15px","fontStyle":"normal","fontWeight":"600"}},"fontFamily":"poppins"} -->
<div class="wp-block-button pin-donation-discover-button"><a class="wp-block-button__link has-primary-color has-background-background-color has-text-color has-background has-poppins-font-family has-text-align-center has-custom-font-size wp-element-button" href="#" style="border-radius:250px;padding-top:var(--wp--preset--spacing--30);padding-right:1.5rem;padding-bottom:var(--wp--preset--spacing--30);padding-left:1.5rem;font-size:15px;font-style:normal;font-weight:600">DISCOVER MORE</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
);