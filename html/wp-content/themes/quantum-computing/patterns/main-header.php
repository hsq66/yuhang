<?php
 /**
  * Title: Main Header
  * Slug: quantum-computing/main-header
  */
?>


<!-- wp:group {"className":"header-wrap","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"constrained","contentSize":"80%"}} -->
<div class="wp-block-group header-wrap" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:columns {"verticalAlignment":"center","className":"lower-header","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}},"border":{"radius":"99px"}}} -->
<div class="wp-block-columns are-vertically-aligned-center lower-header" style="border-radius:99px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--30)"><!-- wp:column {"verticalAlignment":"center","width":"25%","className":"header-logo-box","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<div class="wp-block-column is-vertically-aligned-center header-logo-box" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:25%"><!-- wp:site-title {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secbackground"}}},"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"25px"}},"textColor":"secbackground","fontFamily":"orbitron"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"60%","className":"header-menu-box"} -->
<div class="wp-block-column is-vertically-aligned-center header-menu-box" style="flex-basis:60%"><!-- wp:navigation {"textColor":"background","style":{"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"400"}},"fontFamily":"poppins"} -->
    
<!-- wp:navigation-link {"label":"Home","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"About","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Services","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Pages","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Blog","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- /wp:navigation --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"20%","className":"header-button-box"} -->
<div class="wp-block-column is-vertically-aligned-center header-button-box" style="flex-basis:20%"><!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"secbackground","className":"hdr-btn1","style":{"typography":{"fontSize":"14px","fontStyle":"normal","fontWeight":"400"},"spacing":{"padding":{"left":"0","right":"0","top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|secbackground"}}},"border":{"width":"0px","style":"none"}},"fontFamily":"poppins"} -->
<div class="wp-block-button hdr-btn1"><a class="wp-block-button__link has-secbackground-color has-text-color has-link-color has-poppins-font-family has-custom-font-size wp-element-button" style="border-style:none;border-width:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-size:14px;font-style:normal;font-weight:400"><img class="wp-image-18" style="width: 20px;" src="<?php echo esc_url(get_parent_theme_file_uri( '/assets/images/account.png' )); ?>" alt=""><?php esc_html_e('Create Account','quantum-computing'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
