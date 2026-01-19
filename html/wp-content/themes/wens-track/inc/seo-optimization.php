<?php
/**
 * SEO优化功能
 * 针对钣金行业的搜索引擎优化
 * 
 * @package WENS Track
 */

// 防止直接访问
if (!defined('ABSPATH')) {
    exit;
}

/**
 * 添加Open Graph标签
 */
function wens_track_og_tags() {
    if (is_singular()) {
        global $post;
        
        $og_title = get_the_title();
        $og_description = get_the_excerpt();
        $og_url = get_permalink();
        $og_image = get_the_post_thumbnail_url($post->ID, 'large');
        
        echo '<meta property="og:title" content="' . esc_attr($og_title) . '">' . "\n";
        echo '<meta property="og:description" content="' . esc_attr($og_description) . '">' . "\n";
        echo '<meta property="og:url" content="' . esc_url($og_url) . '">' . "\n";
        echo '<meta property="og:type" content="article">' . "\n";
        
        if ($og_image) {
            echo '<meta property="og:image" content="' . esc_url($og_image) . '">' . "\n";
        }
    }
}
add_action('wp_head', 'wens_track_og_tags', 5);

/**
 * 添加Twitter Card标签
 */
function wens_track_twitter_cards() {
    if (is_singular()) {
        global $post;
        
        $twitter_title = get_the_title();
        $twitter_description = get_the_excerpt();
        $twitter_image = get_the_post_thumbnail_url($post->ID, 'large');
        
        echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
        echo '<meta name="twitter:title" content="' . esc_attr($twitter_title) . '">' . "\n";
        echo '<meta name="twitter:description" content="' . esc_attr($twitter_description) . '">' . "\n";
        
        if ($twitter_image) {
            echo '<meta name="twitter:image" content="' . esc_url($twitter_image) . '">' . "\n";
        }
    }
}
add_action('wp_head', 'wens_track_twitter_cards', 5);

/**
 * 优化标题标签
 */
function wens_track_document_title_parts($title) {
    if (is_front_page()) {
        $title['title'] = '广东宇航金属制品有限公司';
        $title['tagline'] = '专业钣金加工制造 | 精密钣金 | 激光切割 | 金属冲压';
    } elseif (is_singular()) {
        $title['site'] = '宇航金属';
    }
    return $title;
}
add_filter('document_title_parts', 'wens_track_document_title_parts');

/**
 * 添加面包屑导航结构化数据
 */
function wens_track_breadcrumb_schema() {
    if (!is_front_page()) {
        $breadcrumb_schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => array()
        );
        
        // 首页
        $breadcrumb_schema['itemListElement'][] = array(
            '@type' => 'ListItem',
            'position' => 1,
            'name' => '首页',
            'item' => home_url()
        );
        
        // 当前页面
        if (is_singular()) {
            $breadcrumb_schema['itemListElement'][] = array(
                '@type' => 'ListItem',
                'position' => 2,
                'name' => get_the_title(),
                'item' => get_permalink()
            );
        }
        
        echo '<script type="application/ld+json">' . json_encode($breadcrumb_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }
}
add_action('wp_head', 'wens_track_breadcrumb_schema');

/**
 * 产品/服务结构化数据
 */
function wens_track_service_schema() {
    if (is_page()) {
        $service_schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'serviceType' => '钣金加工制造',
            'provider' => array(
                '@type' => 'Organization',
                'name' => '广东宇航金属制品有限公司'
            ),
            'areaServed' => array(
                '@type' => 'Country',
                'name' => '中国'
            ),
            'hasOfferCatalog' => array(
                '@type' => 'OfferCatalog',
                'name' => '钣金加工服务',
                'itemListElement' => array(
                    array(
                        '@type' => 'Offer',
                        'itemOffered' => array(
                            '@type' => 'Service',
                            'name' => '精密钣金加工'
                        )
                    ),
                    array(
                        '@type' => 'Offer',
                        'itemOffered' => array(
                            '@type' => 'Service',
                            'name' => '激光切割服务'
                        )
                    ),
                    array(
                        '@type' => 'Offer',
                        'itemOffered' => array(
                            '@type' => 'Service',
                            'name' => '金属冲压加工'
                        )
                    ),
                    array(
                        '@type' => 'Offer',
                        'itemOffered' => array(
                            '@type' => 'Service',
                            'name' => '钣金折弯焊接'
                        )
                    )
                )
            )
        );
        
        echo '<script type="application/ld+json">' . json_encode($service_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }
}
add_action('wp_head', 'wens_track_service_schema');

/**
 * 优化robots meta标签
 */
function wens_track_robots_meta() {
    if (is_search() || is_404()) {
        echo '<meta name="robots" content="noindex, follow">' . "\n";
    } elseif (is_archive() && !is_category() && !is_tag()) {
        echo '<meta name="robots" content="noindex, follow">' . "\n";
    }
}
add_action('wp_head', 'wens_track_robots_meta', 1);

/**
 * 添加规范链接
 */
function wens_track_canonical_url() {
    if (is_singular()) {
        $canonical_url = get_permalink();
        echo '<link rel="canonical" href="' . esc_url($canonical_url) . '">' . "\n";
    }
}
add_action('wp_head', 'wens_track_canonical_url', 1);

/**
 * 优化摘要长度
 */
function wens_track_excerpt_length($length) {
    return 120;
}
add_filter('excerpt_length', 'wens_track_excerpt_length');

/**
 * 自定义摘要结尾
 */
function wens_track_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'wens_track_excerpt_more');

/**
 * 添加行业关键词到body class
 */
function wens_track_body_classes($classes) {
    $classes[] = 'metal-fabrication';
    $classes[] = 'sheet-metal-processing';
    $classes[] = 'manufacturing-industry';
    return $classes;
}
add_filter('body_class', 'wens_track_body_classes');

/**
 * 优化图片alt属性
 */
function wens_track_image_alt_optimization($attr, $attachment) {
    if (empty($attr['alt'])) {
        $attr['alt'] = get_the_title($attachment->ID) . ' - 宇航金属钣金加工';
    }
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'wens_track_image_alt_optimization', 10, 2);

/**
 * 添加hreflang标签（多语言支持）
 */
function wens_track_hreflang_tags() {
    if (is_front_page()) {
        $current_url = home_url();
        echo '<link rel="alternate" hreflang="zh-CN" href="' . esc_url($current_url) . '">' . "\n";
        echo '<link rel="alternate" hreflang="en" href="' . esc_url($current_url) . '/en/">' . "\n";
        echo '<link rel="alternate" hreflang="x-default" href="' . esc_url($current_url) . '">' . "\n";
    }
}
add_action('wp_head', 'wens_track_hreflang_tags', 1);

/**
 * 移除不必要的头部信息
 */
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);

/**
 * 优化RSS feed
 */
function wens_track_rss_optimization() {
    add_theme_support('automatic-feed-links');
}
add_action('after_setup_theme', 'wens_track_rss_optimization');
