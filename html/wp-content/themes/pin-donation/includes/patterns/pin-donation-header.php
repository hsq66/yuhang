<?php
/**
 * Header
 */
return array(
	'title'      => __( 'Header', 'pin-donation' ),
	'categories' => array( 'pin-donation' ),
	'blockTypes' => array( 'core/template-part/pin-donation' ),
	'content'    => '<!-- wp:group {"className":"pin-donation-topbar has-brand-background-color","style":{"spacing":{"padding":{"top":"8px","bottom":"8px","left":"0px","right":"0px"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group pin-donation-topbar has-background has-brand-background-color" style="padding-top:8px;padding-right:0px;padding-bottom:8px;padding-left:0px"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"50%"} -->
<div class="wp-block-column" style="flex-basis:50%"><!-- wp:group {"className":"pin-donation-mail","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","orientation":"horizontal"}} -->
<div class="wp-block-group pin-donation-mail has-background-color has-text-color has-link-color"><!-- wp:image {"id":12,"width":"21px","height":"15px","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"spacing":{"margin":{"right":"15px"}}}} -->
<figure class="wp-block-image size-full is-resized" style="margin-right:15px"><img src="' . get_template_directory_uri() . '/assets/images/icon-mail.png" alt="" class="wp-image-12" style="object-fit:cover;width:21px;height:15px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"left","className":"pin-donation-mail-top","style":{"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|background"},":hover":{"color":{"text":"#282828"}}}}},"textColor":"background"} -->
<p class="has-text-align-left pin-donation-mail-top has-background-color has-text-color has-link-color" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><a href="mailto:info@sitename.com" target="_blank" rel="noreferrer noopener">info@sitename.com</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"100%"} -->
<div class="wp-block-column" style="flex-basis:100%"><!-- wp:group {"className":"pin-donation-mail","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","orientation":"horizontal"}} -->
<div class="wp-block-group pin-donation-mail has-background-color has-text-color has-link-color"><!-- wp:image {"id":45,"scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"spacing":{"margin":{"right":"15px"}}}} -->
<figure class="wp-block-image size-full" style="margin-right:15px"><img src="' . get_template_directory_uri() . '/assets/images/icon-phone.png" alt="" class="wp-image-45" style="object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"left","className":"pin-donation-mail-top","style":{"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}}},"textColor":"background"} -->
<p class="has-text-align-left pin-donation-mail-top has-background-color has-text-color" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px">123 456 7890</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"100%"} -->
<div class="wp-block-column" style="flex-basis:100%"><!-- wp:social-links {"iconColor":"banner","iconColorValue":"#fff","openInNewTab":true,"size":"has-normal-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"0","left":"1rem"}}},"layout":{"type":"flex","justifyContent":"right"}} -->
<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"linkedin"} /-->

<!-- wp:social-link {"url":"#","service":"youtube"} /-->

<!-- wp:social-link {"url":"#","service":"x"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"25px","bottom":"0px","left":"0px","right":"0px"}}},"backgroundColor":"banner","layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group pin-donation-section1 has-banner-background-color has-background" style="padding-top:25px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"15%"} -->
<div class="wp-block-column" style="flex-basis:15%"><!-- wp:group {"className":"pin-donation-logo","style":{"spacing":{"padding":{"top":"5px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group pin-donation-logo" style="padding-top:5px"><!-- wp:site-title {"style":{"color":{"text":"#121212"},"elements":{"link":{"color":{"text":"#121212"}}},"typography":{"fontSize":"28px","fontStyle":"normal","fontWeight":"600"}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"70%"} -->
<div class="wp-block-column" style="flex-basis:70%"><!-- wp:group {"className":"pin-donation-menu","style":{"spacing":{"padding":{"top":"0px","right":"35px"}}},"layout":{"type":"constrained","justifyContent":"right"}} -->
<div class="wp-block-group pin-donation-menu" style="padding-top:0px;padding-right:35px"><!-- wp:navigation {"textColor":"link","overlayBackgroundColor":"background","overlayTextColor":"link","style":{"spacing":{"blockGap":"35px"}},"layout":{"type":"flex","justifyContent":"right"}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"15%","style":{"spacing":{"padding":{"top":"0px","bottom":"0px"}}}} -->
<div class="wp-block-column" style="padding-top:0px;padding-bottom:0px;flex-basis:15%"><!-- wp:group {"className":"pin-donation-header-social","layout":{"type":"constrained"}} -->
<div class="wp-block-group pin-donation-header-social"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"brand","className":"pin-donation-top-button","style":{"border":{"radius":"250px"}},"fontSize":"medium"} -->
<div class="wp-block-button pin-donation-top-button"><a class="wp-block-button__link has-brand-background-color has-background has-medium-font-size has-custom-font-size wp-element-button" href="#" style="border-radius:250px" rel="#">DONATE NOW</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
);