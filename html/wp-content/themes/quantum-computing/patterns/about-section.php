<?php
 /**
  * Title: About Section
  * Slug: quantum-computing/about-section
  */
?>

<!-- wp:group {"className":"about-sec","layout":{"type":"constrained","contentSize":"70%"}} -->
<div class="wp-block-group about-sec"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"32px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontFamily":"orbitron"} -->
<h2 class="wp-block-heading has-text-align-center has-background-color has-text-color has-link-color has-orbitron-font-family" style="font-size:32px;font-style:normal;font-weight:600"><?php esc_html_e('About','quantum-computing'); ?> <mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-primary-color"><?php esc_html_e('Us','quantum-computing'); ?></mark></h2>
<!-- /wp:heading --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":null,"className":"about-col","style":{"border":{"top":{"width":"1px"},"bottom":{"width":"1px"}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<div class="wp-block-columns about-col" style="border-top-width:1px;border-bottom-width:1px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"top","width":"30%","className":"about-row1 wow fadeInLeft","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"0","right":"0","left":"0px"}}}} -->
<div class="wp-block-column is-vertically-aligned-top about-row1 wow fadeInLeft" style="padding-top:var(--wp--preset--spacing--50);padding-right:0;padding-bottom:0;padding-left:0px;flex-basis:30%"><!-- wp:image {"id":45,"width":"auto","height":"400px","sizeSlug":"full","linkDestination":"none","className":"about-img-left","style":{"border":{"radius":"30px"},"spacing":{"margin":{"right":"0","left":"0","top":"0","bottom":"0"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border about-img-left" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0"><img src="<?php echo esc_url(get_parent_theme_file_uri( '/assets/images/about.png' )); ?>" alt="" class="wp-image-45" style="border-radius:30px;width:auto;height:400px"/></figure>
<!-- /wp:image -->

<!-- wp:buttons {"className":"about-btn","style":{"spacing":{"padding":{"top":"0","bottom":"0","right":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons about-btn" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:button {"backgroundColor":"secbackground","textColor":"foreground","style":{"typography":{"fontSize":"15px","fontStyle":"normal","fontWeight":"500"},"border":{"radius":"40px"},"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"fontFamily":"poppins"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-foreground-color has-secbackground-background-color has-text-color has-background has-link-color has-poppins-font-family has-custom-font-size wp-element-button" href="#" style="border-radius:40px;padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);font-size:15px;font-style:normal;font-weight:500"><?php esc_html_e('More About Us ','quantum-computing'); ?><img class="wp-image-52" style="width: 10px;" src="<?php echo esc_url(get_parent_theme_file_uri( '/assets/images/project-arrow.png' )); ?>" alt=""></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"40%","className":"about-row2 wow fadeInDown","style":{"border":{"left":{"width":"1px"},"right":{"width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60","right":"var:preset|spacing|60"}}}} -->
<div class="wp-block-column about-row2 wow fadeInDown" style="border-right-width:1px;border-left-width:1px;padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60);flex-basis:40%"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:columns {"className":"packages-col","style":{"border":{"radius":"20px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"secaccent"} -->
<div class="wp-block-columns packages-col has-secaccent-background-color has-background" style="border-radius:20px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|border-color"}}},"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"400"}},"textColor":"border-color","fontFamily":"poppins"} -->
<p class="has-text-align-left has-border-color-color has-text-color has-link-color has-poppins-font-family" style="font-size:18px;font-style:normal;font-weight:400"><?php esc_html_e('Packages Download','quantum-computing'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:paragraph {"className":"package-no","style":{"elements":{"link":{"color":{"text":"var:preset|color|secbackground"}}},"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"400"}},"textColor":"secbackground","fontFamily":"orbitron"} -->
<p class="package-no has-secbackground-color has-text-color has-link-color has-orbitron-font-family" style="font-size:18px;font-style:normal;font-weight:400"><?php esc_html_e('500','quantum-computing'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secbackground"}}},"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"400"}},"textColor":"secbackground","fontFamily":"orbitron"} -->
<p class="has-secbackground-color has-text-color has-link-color has-orbitron-font-family" style="font-size:18px;font-style:normal;font-weight:400"><?php esc_html_e('K+','quantum-computing'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"className":"client-col","style":{"border":{"radius":"20px"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"-10px","bottom":"0"}}},"backgroundColor":"primary"} -->
<div class="wp-block-columns client-col has-primary-background-color has-background" style="border-radius:20px;margin-top:-10px;margin-bottom:0;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|border-color"}}},"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"400"}},"textColor":"border-color","fontFamily":"poppins"} -->
<p class="has-text-align-left has-border-color-color has-text-color has-link-color has-poppins-font-family" style="font-size:18px;font-style:normal;font-weight:400"><?php esc_html_e('Happy Clients','quantum-computing'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:paragraph {"className":"package-no","style":{"elements":{"link":{"color":{"text":"var:preset|color|secbackground"}}},"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"400"}},"textColor":"secbackground","fontFamily":"orbitron"} -->
<p class="package-no has-secbackground-color has-text-color has-link-color has-orbitron-font-family" style="font-size:18px;font-style:normal;font-weight:400"><?php esc_html_e('12540','quantum-computing'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secbackground"}}},"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"400"}},"textColor":"secbackground","fontFamily":"orbitron"} -->
<p class="has-secbackground-color has-text-color has-link-color has-orbitron-font-family" style="font-size:18px;font-style:normal;font-weight:400">+</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"className":"description-col","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"-10px","bottom":"0"}},"border":{"radius":"20px"}},"backgroundColor":"seconadry"} -->
<div class="wp-block-columns description-col has-seconadry-background-color has-background" style="border-radius:20px;margin-top:-10px;margin-bottom:0;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"300"},"elements":{"link":{"color":{"text":"var:preset|color|border-color"}}}},"textColor":"border-color","fontFamily":"poppins"} -->
<p class="has-border-color-color has-text-color has-link-color has-poppins-font-family" style="font-size:16px;font-style:normal;font-weight:300"><?php esc_html_e('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.&nbsp;','quantum-computing'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom","width":"30%","className":"about-row3 wow fadeInRight","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"0","right":"0"}}}} -->
<div class="wp-block-column is-vertically-aligned-bottom about-row3 wow fadeInRight" style="padding-top:var(--wp--preset--spacing--50);padding-right:0;padding-bottom:var(--wp--preset--spacing--50);padding-left:0;flex-basis:30%"><!-- wp:image {"id":135,"width":"auto","height":"400px","sizeSlug":"full","linkDestination":"none","className":"tab-content","style":{"border":{"radius":"30px"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border tab-content" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0"><img src="<?php echo esc_url(get_parent_theme_file_uri( '/assets/images/about-tab1.png' )); ?>" alt="" class="wp-image-135" style="border-radius:30px;width:auto;height:400px"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":144,"width":"auto","height":"400px","sizeSlug":"full","linkDestination":"none","className":"tab-content","style":{"border":{"radius":"30px"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border tab-content" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0"><img src="<?php echo esc_url(get_parent_theme_file_uri( '/assets/images/projects-2.png' )); ?>" alt="" class="wp-image-144" style="border-radius:30px;width:auto;height:400px"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":197,"width":"auto","height":"400px","sizeSlug":"full","linkDestination":"none","className":"tab-content","style":{"border":{"radius":"30px"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<figure class="wp-block-image size-full is-resized has-custom-border tab-content" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0"><img src="<?php echo esc_url(get_parent_theme_file_uri( '/assets/images/projects-1.png' )); ?>" alt="" class="wp-image-197" style="border-radius:30px;width:auto;height:400px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"blog-tabs","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"left":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group blog-tabs" style="margin-top:0;margin-bottom:0;padding-left:var(--wp--preset--spacing--50)"><!-- wp:buttons {"className":"main-tab","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-buttons main-tab" style="margin-top:0;margin-bottom:0"><!-- wp:button {"textAlign":"left","textColor":"secbackground","className":"tab-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|secbackground"}}},"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"400"},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"border":{"radius":"0px","top":{"width":"0px","style":"none"},"right":{"width":"0px","style":"none"},"bottom":{"width":"1px","color":"#f6f7fa"},"left":{"width":"0px","style":"none"}}},"fontFamily":"poppins"} -->
<div class="wp-block-button tab-title"><a class="wp-block-button__link has-secbackground-color has-text-color has-link-color has-poppins-font-family has-text-align-left has-custom-font-size wp-element-button" style="border-radius:0px;border-top-style:none;border-top-width:0px;border-right-style:none;border-right-width:0px;border-bottom-color:#f6f7fa;border-bottom-width:1px;border-left-style:none;border-left-width:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-size:14px;font-style:normal;font-weight:400"><?php esc_html_e('Unbreakable Data Security','quantum-computing'); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"textAlign":"left","textColor":"secbackground","className":"tab-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|secbackground"}}},"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"400"},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"border":{"radius":"0px","top":{"width":"0px","style":"none"},"right":{"width":"0px","style":"none"},"bottom":{"width":"1px","color":"#f6f7fa"},"left":{"width":"0px","style":"none"}}},"fontFamily":"poppins"} -->
<div class="wp-block-button tab-title"><a class="wp-block-button__link has-secbackground-color has-text-color has-link-color has-poppins-font-family has-text-align-left has-custom-font-size wp-element-button" style="border-radius:0px;border-top-style:none;border-top-width:0px;border-right-style:none;border-right-width:0px;border-bottom-color:#f6f7fa;border-bottom-width:1px;border-left-style:none;border-left-width:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-size:14px;font-style:normal;font-weight:400"><?php esc_html_e('Future-Proof Encryption','quantum-computing'); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"textAlign":"left","textColor":"secbackground","className":"tab-title","style":{"elements":{"link":{"color":{"text":"var:preset|color|secbackground"}}},"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"400"},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"border":{"radius":"0px","top":{"width":"0px","style":"none"},"right":{"width":"0px","style":"none"},"bottom":{"width":"1px","color":"#f6f7fa"},"left":{"width":"0px","style":"none"}}},"fontFamily":"poppins"} -->
<div class="wp-block-button tab-title"><a class="wp-block-button__link has-secbackground-color has-text-color has-link-color has-poppins-font-family has-text-align-left has-custom-font-size wp-element-button" style="border-radius:0px;border-top-style:none;border-top-width:0px;border-right-style:none;border-right-width:0px;border-bottom-color:#f6f7fa;border-bottom-width:1px;border-left-style:none;border-left-width:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-size:14px;font-style:normal;font-weight:400"><?php esc_html_e('Secure Key Distribution','quantum-computing'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->