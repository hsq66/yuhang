<?php
/**
 * Title: footer
 * Slug: topscene/footer
 * Inserter: no
 */
?>
<!-- wp:group {"metadata":{"name":"Footer-wrapper"},"className":"footer-wrapper","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"background-secondary","layout":{"type":"default"}} -->
<div class="wp-block-group footer-wrapper has-background-secondary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:heading {"textAlign":"center","align":"full","className":"text_mobile","style":{"elements":{"link":{"color":{"text":"var:preset|color|text-primary"}}},"typography":{"fontSize":"6em","fontStyle":"normal","fontWeight":"400"}},"textColor":"text-primary"} -->
<h2 class="wp-block-heading alignfull has-text-align-center text_mobile has-text-primary-color has-text-color has-link-color" style="font-size:6em;font-style:normal;font-weight:400">
    <?php esc_html_e('Let’s Build a Creative<br>Website Today!', 'topscene');?></h2>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","level":5,"style":{"elements":{"link":{"color":{"text":"var:preset|color|text-secondary"}}},"typography":{"fontSize":"16px"}},"textColor":"text-secondary"} -->
<h5 class="wp-block-heading has-text-align-center has-text-secondary-color has-text-color has-link-color" style="font-size:16px"><?php esc_html_e('SERVICES', 'topscene');?></h5>
<!-- /wp:heading -->

<!-- wp:navigation {"ref":657,"textColor":"text-primary","layout":{"type":"flex","justifyContent":"center"}} /-->

<!-- wp:heading {"textAlign":"center","level":5,"style":{"elements":{"link":{"color":{"text":"var:preset|color|text-secondary"}}},"typography":{"fontSize":"16px"}},"textColor":"text-secondary"} -->
<h5 class="wp-block-heading has-text-align-center has-text-secondary-color has-text-color has-link-color" style="font-size:16px"><?php esc_html_e('PAGES', 'topscene');?></h5>
<!-- /wp:heading -->

<!-- wp:navigation {"ref":657,"textColor":"text-primary","layout":{"type":"flex","justifyContent":"center"}} /-->

<!-- wp:social-links {"iconColor":"background-secondary","iconColorValue":"#010002","iconBackgroundColor":"text-secondary","iconBackgroundColorValue":"#FA962C","openInNewTab":true,"layout":{"type":"flex","orientation":"horizontal","justifyContent":"center","flexWrap":"wrap"}} -->
<ul class="wp-block-social-links has-icon-color has-icon-background-color"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"linkedin"} /-->

<!-- wp:social-link {"url":"#","service":"x"} /--></ul>
<!-- /wp:social-links -->

<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|text-primary"}}}},"textColor":"text-primary"} -->
<p class="has-text-align-center has-text-primary-color has-text-color has-link-color"><?php /* Translators: 1. is the start of a 'mark' HTML element, 2. is the end of a 'mark' HTML element, 3. is the start of a 'mark' HTML element, 4. is the end of a 'mark' HTML element */ 
echo sprintf( esc_html__( '%1$s©%2$s %3$sTopscene.%4$s All Rights Reserved.', 'topscene' ), '<mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-text-secondary-color">', '</mark>', '<mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-text-secondary-color">', '</mark>' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->