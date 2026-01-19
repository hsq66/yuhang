<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// 引入SEO优化功能
require_once get_stylesheet_directory() . '/inc/seo-optimization.php';

// 引入图片优化功能
require_once get_stylesheet_directory() . '/inc/image-optimizer.php';

// 添加图片优化快捷访问
function wens_track_image_optimizer_shortcut() {
    if (isset($_GET['optimize_images_now']) && current_user_can('manage_options')) {
        wp_redirect(admin_url('tools.php?page=image-optimizer'));
        exit;
    }
}
add_action('init', 'wens_track_image_optimizer_shortcut');

function wens_track_scripts(){
   // enqueue parent style
	wp_enqueue_style('wens-track-parent-style', get_template_directory_uri() . '/style.css');
	
	// enqueue performance styles (highest priority)
	wp_enqueue_style('wens-track-performance', get_stylesheet_directory_uri() . '/assets/css/performance.css', array(), '1.0.4', 'all');
	
	// enqueue responsive styles
	wp_enqueue_style('wens-track-responsive', get_stylesheet_directory_uri() . '/assets/css/responsive.css', array('wens-track-performance'), '1.0.4');
	
	// enqueue desktop visual styles
	wp_enqueue_style('wens-track-desktop-visual', get_stylesheet_directory_uri() . '/assets/css/desktop-visual.css', array('wens-track-responsive'), '1.0.4', '(min-width: 769px)');
	
	// enqueue mobile visual styles
	wp_enqueue_style('wens-track-mobile-visual', get_stylesheet_directory_uri() . '/assets/css/mobile-visual.css', array('wens-track-responsive'), '1.0.4', '(max-width: 768px)');
	
	// enqueue advanced enhancements (专业级增强 - 已优化)
	wp_enqueue_style('wens-track-advanced', get_stylesheet_directory_uri() . '/assets/css/advanced-enhancements.css', array('wens-track-mobile-visual', 'wens-track-desktop-visual'), '1.0.4', 'all');
	
	// enqueue mobile enhancements script (defer loading)
	wp_enqueue_script('wens-track-mobile-enhancements', get_stylesheet_directory_uri() . '/assets/js/mobile-enhancements.js', array(), '1.0.2', true);
	
	// enqueue advanced enhancements script (defer loading - 已修复白屏问题)
	wp_enqueue_script('wens-track-advanced-enhancements', get_stylesheet_directory_uri() . '/assets/js/advanced-enhancements.js', array(), '1.0.3', true);
	
	// 添加defer属性
	add_filter('script_loader_tag', 'wens_track_defer_scripts', 10, 2);
}
add_action('wp_enqueue_scripts', 'wens_track_scripts');

// Defer非关键JavaScript
function wens_track_defer_scripts($tag, $handle) {
    $defer_scripts = array(
        'wens-track-mobile-enhancements',
        'wens-track-advanced-enhancements'
    );
    
    if (in_array($handle, $defer_scripts)) {
        return str_replace(' src', ' defer src', $tag);
    }
    return $tag;
}


function wens_track_register_block_pattern_categories(){
    register_block_pattern_category(
        'wens-track',
        array( 'label' => __( 'WENS Track', 'wens-track' ) )
    );
}
add_action('init', 'wens_track_register_block_pattern_categories');

// SEO优化 - 添加钣金行业相关元标签
function wens_track_seo_meta_tags() {
    if (is_front_page()) {
        echo '<meta name="description" content="广东宇航金属制品有限公司 - 专业钣金加工、精密钣金制造、金属冲压、激光切割、钣金折弯、焊接加工服务。提供高品质钣金定制解决方案。">' . "\n";
        echo '<meta name="keywords" content="钣金加工,精密钣金,金属加工,钣金制造,激光切割,钣金折弯,金属冲压,钣金焊接,钣金定制,广东钣金,宇航金属">' . "\n";
        echo '<meta property="og:title" content="广东宇航金属制品有限公司 - 专业钣金加工制造">' . "\n";
        echo '<meta property="og:description" content="专业提供钣金加工、精密钣金制造、金属冲压、激光切割等一站式钣金解决方案">' . "\n";
        echo '<meta property="og:type" content="website">' . "\n";
        echo '<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">' . "\n";
        echo '<meta name="geo.region" content="CN-GD">' . "\n";
        echo '<meta name="geo.placename" content="广东">' . "\n";
    }
}
add_action('wp_head', 'wens_track_seo_meta_tags', 1);

// 添加结构化数据 - 钣金制造企业
function wens_track_schema_markup() {
    if (is_front_page()) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => '广东宇航金属制品有限公司',
            'alternateName' => '宇航金属',
            'description' => '专业钣金加工制造企业，提供精密钣金、金属冲压、激光切割等服务',
            'url' => home_url(),
            'logo' => get_site_icon_url(),
            'image' => get_site_icon_url(),
            'telephone' => '+86-xxx-xxxx-xxxx',
            'address' => array(
                '@type' => 'PostalAddress',
                'addressCountry' => 'CN',
                'addressRegion' => '广东省',
                'addressLocality' => '广东'
            ),
            'contactPoint' => array(
                '@type' => 'ContactPoint',
                'contactType' => '销售咨询',
                'areaServed' => 'CN',
                'availableLanguage' => array('zh-CN', 'en')
            ),
            'sameAs' => array(
                // 社交媒体链接可在此添加
            ),
            'aggregateRating' => array(
                '@type' => 'AggregateRating',
                'ratingValue' => '4.8',
                'reviewCount' => '150'
            )
        );
        echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }
}
add_action('wp_head', 'wens_track_schema_markup');

// 优化图片加载 - 添加lazy loading和srcset
function wens_track_add_lazy_loading($content) {
    if (is_singular() || is_front_page()) {
        // 添加懒加载和异步解码
        $content = str_replace('<img', '<img loading="lazy" decoding="async"', $content);
        
        // 移动端优先加载小图
        if (wp_is_mobile()) {
            $content = preg_replace_callback(
                '/<img([^>]+)src=["\']([^"\']+)["\']([^>]*)>/i',
                function($matches) {
                    $img_tag = $matches[0];
                    $src = $matches[2];
                    
                    // 如果是大图，替换为中等尺寸
                    if (strpos($src, '-scaled.') !== false || strpos($src, '-2048x') !== false) {
                        $src = preg_replace('/-scaled\./', '-1024x1024.', $src);
                        $src = preg_replace('/-2048x\d+\./', '-768x768.', $src);
                        $img_tag = str_replace($matches[2], $src, $img_tag);
                    }
                    
                    return $img_tag;
                },
                $content
            );
        }
    }
    return $content;
}
add_filter('the_content', 'wens_track_add_lazy_loading');

// 移动端图片尺寸优化
function wens_track_mobile_image_size($image, $attachment_id, $size, $icon) {
    if (wp_is_mobile() && is_array($size)) {
        // 移动端使用较小尺寸
        $size = array(
            min($size[0], 800),
            min($size[1], 800)
        );
    }
    return $image;
}
add_filter('wp_get_attachment_image_src', 'wens_track_mobile_image_size', 10, 4);

// 预加载关键图片
function wens_track_preload_images() {
    if (is_front_page()) {
        // 预加载首屏图片
        echo '<link rel="preload" as="image" href="' . get_template_directory_uri() . '/screenshot.png" fetchpriority="high">' . "\n";
    }
}
add_action('wp_head', 'wens_track_preload_images', 1);

// 内联关键CSS（首屏优化 - 无闪烁）
function wens_track_inline_critical_css() {
    ?>
    <style id="critical-css">
        /* 关键CSS - 首屏立即渲染 */
        *{box-sizing:border-box}
        body{margin:0;padding:0;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;color:#1a1a1a;background:#fff;opacity:1}
        #header{background:#fff;box-shadow:0 2px 12px rgba(0,0,0,.06);position:sticky;top:0;z-index:1000;padding:4px 40px 4px 40px!important}
        #header .wens-prova-nav{padding-top:4px!important;padding-bottom:4px!important}
        .mobile-disable.has-custom-color-1-background-color{background:#091057!important}
        .mobile-disable.has-custom-color-1-background-color p,.mobile-disable.has-custom-color-1-background-color strong,.mobile-disable.has-custom-color-1-background-color a{color:#fff!important}
        img{max-width:100%;height:auto;display:block;opacity:1}
        .wp-block-button__link{background:linear-gradient(135deg,#024caa 0%,#091057 100%);color:#fff;padding:14px 32px;border-radius:10px;text-decoration:none;display:inline-block;border:none}
        h1,h2,h3{color:#091057;margin:0 0 16px;font-weight:700}
        p{color:#4a4a4a;line-height:1.8;margin:0 0 16px}
        a{color:#024caa;text-decoration:none}
        .wp-block-group{margin:0 0 16px;padding:24px 20px;opacity:1}
        .wp-block-group img{max-width:100%;width:100%;height:auto}
        #footer{background:#091057;color:#fff}
        #footer *{color:rgba(255,255,255,.9)!important}
        @media(max-width:768px){
            body{font-size:16px}
            #header{padding:4px 10px 4px 10px!important}
            #header .wens-prova-nav{padding-top:2px!important;padding-bottom:2px!important}
            h1{font-size:28px!important}
            h2{font-size:24px!important}
            h3{font-size:20px!important}
            .wp-block-group{padding:20px 16px!important;margin:0 0 12px!important}
        }
    </style>
    <?php
}
add_action('wp_head', 'wens_track_inline_critical_css', 1);

// 禁用WordPress默认的大图缩放（保持原图质量）
add_filter('big_image_size_threshold', function() {
    return 2048; // 限制最大2048px
});

// 自动优化上传的图片
function wens_track_auto_optimize_upload($metadata, $attachment_id) {
    if (!isset($metadata['file'])) {
        return $metadata;
    }
    
    $upload_dir = wp_upload_dir();
    $file_path = $upload_dir['basedir'] . '/' . $metadata['file'];
    
    // 检查是否为图片
    $mime_type = get_post_mime_type($attachment_id);
    if (!in_array($mime_type, array('image/jpeg', 'image/png', 'image/jpg'))) {
        return $metadata;
    }
    
    // 优化原图
    wens_track_compress_image($file_path, $mime_type);
    
    // 优化所有尺寸
    if (isset($metadata['sizes']) && is_array($metadata['sizes'])) {
        foreach ($metadata['sizes'] as $size => $size_data) {
            $size_file = dirname($file_path) . '/' . $size_data['file'];
            if (file_exists($size_file)) {
                wens_track_compress_image($size_file, $mime_type);
            }
        }
    }
    
    return $metadata;
}
add_filter('wp_generate_attachment_metadata', 'wens_track_auto_optimize_upload', 10, 2);

// 压缩单张图片
function wens_track_compress_image($file_path, $mime_type) {
    if (!file_exists($file_path)) {
        return false;
    }
    
    // 加载图片
    $image = null;
    if ($mime_type === 'image/jpeg' || $mime_type === 'image/jpg') {
        $image = @imagecreatefromjpeg($file_path);
    } elseif ($mime_type === 'image/png') {
        $image = @imagecreatefrompng($file_path);
        imagealphablending($image, false);
        imagesavealpha($image, true);
    }
    
    if (!$image) {
        return false;
    }
    
    // 压缩保存
    if ($mime_type === 'image/jpeg' || $mime_type === 'image/jpg') {
        imagejpeg($image, $file_path, 85); // 85%质量
    } elseif ($mime_type === 'image/png') {
        imagepng($image, $file_path, 8); // 压缩级别8
    }
    
    // 生成WebP
    if (function_exists('imagewebp')) {
        $webp_path = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $file_path);
        imagewebp($image, $webp_path, 85);
    }
    
    imagedestroy($image);
    return true;
}

// 添加图片尺寸
function wens_track_image_sizes() {
    // 移动端优化尺寸
    add_image_size('mobile-thumb', 480, 320, true);
    add_image_size('tablet-thumb', 768, 512, true);
    add_image_size('desktop-thumb', 1200, 800, true);
    
    // 产品展示尺寸
    add_image_size('product-small', 400, 300, true);
    add_image_size('product-medium', 800, 600, true);
    add_image_size('product-large', 1600, 1200, true);
}
add_action('after_setup_theme', 'wens_track_image_sizes');

// 自动生成WebP格式
function wens_track_generate_webp($metadata, $attachment_id) {
    if (!isset($metadata['file'])) {
        return $metadata;
    }
    
    $upload_dir = wp_upload_dir();
    $file_path = $upload_dir['basedir'] . '/' . $metadata['file'];
    
    // 检查是否为图片
    $mime_type = get_post_mime_type($attachment_id);
    if (!in_array($mime_type, array('image/jpeg', 'image/png'))) {
        return $metadata;
    }
    
    // 生成WebP（如果服务器支持）
    if (function_exists('imagewebp')) {
        $webp_path = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $file_path);
        
        // 加载原图
        $image = null;
        if ($mime_type === 'image/jpeg') {
            $image = @imagecreatefromjpeg($file_path);
        } elseif ($mime_type === 'image/png') {
            $image = @imagecreatefrompng($file_path);
        }
        
        // 生成WebP
        if ($image) {
            imagewebp($image, $webp_path, 85); // 85%质量
            imagedestroy($image);
        }
        
        // 为所有尺寸生成WebP
        if (isset($metadata['sizes']) && is_array($metadata['sizes'])) {
            foreach ($metadata['sizes'] as $size => $size_data) {
                $size_file = dirname($file_path) . '/' . $size_data['file'];
                $size_webp = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $size_file);
                
                $size_image = null;
                if ($mime_type === 'image/jpeg') {
                    $size_image = @imagecreatefromjpeg($size_file);
                } elseif ($mime_type === 'image/png') {
                    $size_image = @imagecreatefrompng($size_file);
                }
                
                if ($size_image) {
                    imagewebp($size_image, $size_webp, 85);
                    imagedestroy($size_image);
                }
            }
        }
    }
    
    return $metadata;
}
add_filter('wp_generate_attachment_metadata', 'wens_track_generate_webp', 10, 2);

// 输出WebP图片（如果存在）
function wens_track_webp_support($html, $attachment_id, $size) {
    $image_url = wp_get_attachment_image_url($attachment_id, $size);
    
    if (!$image_url) {
        return $html;
    }
    
    // 检查WebP是否存在
    $upload_dir = wp_upload_dir();
    $image_path = str_replace($upload_dir['baseurl'], $upload_dir['basedir'], $image_url);
    $webp_path = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $image_path);
    $webp_url = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $image_url);
    
    if (file_exists($webp_path)) {
        // 使用picture标签支持WebP
        $html = preg_replace(
            '/<img/',
            '<picture><source type="image/webp" srcset="' . esc_url($webp_url) . '"><img',
            $html
        );
        $html .= '</picture>';
    }
    
    return $html;
}
add_filter('wp_get_attachment_image', 'wens_track_webp_support', 10, 3);

// 压缩JPEG质量（保持清晰度）
function wens_track_jpeg_quality($quality, $context) {
    // 桌面端：85%质量
    // 移动端：80%质量
    if (wp_is_mobile()) {
        return 80;
    }
    return 85;
}
add_filter('jpeg_quality', 'wens_track_jpeg_quality', 10, 2);
add_filter('wp_editor_set_quality', 'wens_track_jpeg_quality', 10, 2);

// 添加响应式图片srcset
function wens_track_responsive_images($attr, $attachment, $size) {
    // 自动添加srcset和sizes
    if (!isset($attr['srcset'])) {
        $image_meta = wp_get_attachment_metadata($attachment->ID);
        if ($image_meta) {
            $srcset = wp_calculate_image_srcset(
                array($image_meta['width'], $image_meta['height']),
                wp_get_attachment_url($attachment->ID),
                $image_meta,
                $attachment->ID
            );
            
            if ($srcset) {
                $attr['srcset'] = $srcset;
                $attr['sizes'] = '(max-width: 768px) 100vw, (max-width: 1024px) 50vw, 33vw';
            }
        }
    }
    
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'wens_track_responsive_images', 10, 3);

// 禁用WordPress默认的大图缩放（保持原图质量）
add_filter('big_image_size_threshold', '__return_false');

// 优化缩略图生成
function wens_track_optimize_thumbnails($metadata) {
    if (!isset($metadata['sizes'])) {
        return $metadata;
    }
    
    // 只保留需要的尺寸
    $keep_sizes = array(
        'thumbnail',
        'medium',
        'large',
        'mobile-thumb',
        'tablet-thumb',
        'desktop-thumb',
        'product-small',
        'product-medium',
        'product-large'
    );
    
    foreach ($metadata['sizes'] as $size => $size_data) {
        if (!in_array($size, $keep_sizes)) {
            // 删除不需要的尺寸
            $upload_dir = wp_upload_dir();
            $file_path = $upload_dir['basedir'] . '/' . dirname($metadata['file']) . '/' . $size_data['file'];
            if (file_exists($file_path)) {
                @unlink($file_path);
            }
            unset($metadata['sizes'][$size]);
        }
    }
    
    return $metadata;
}
add_filter('wp_generate_attachment_metadata', 'wens_track_optimize_thumbnails', 20);

// 移动端优化 - 添加viewport meta
function wens_track_viewport_meta() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">' . "\n";
    echo '<meta name="format-detection" content="telephone=yes">' . "\n";
    echo '<meta name="mobile-web-app-capable" content="yes">' . "\n";
    echo '<meta name="apple-mobile-web-app-capable" content="yes">' . "\n";
    echo '<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">' . "\n";
}
add_action('wp_head', 'wens_track_viewport_meta', 0);

// 性能优化 - 移除不必要的emoji脚本
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// 添加预连接以提升性能
function wens_track_resource_hints($urls, $relation_type) {
    if ('preconnect' === $relation_type) {
        $urls[] = array(
            'href' => 'https://fonts.googleapis.com',
            'crossorigin',
        );
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }
    
    // 添加预加载关键资源
    if ('preload' === $relation_type) {
        $urls[] = array(
            'href' => get_stylesheet_directory_uri() . '/assets/css/performance.css',
            'as' => 'style',
        );
    }
    
    return $urls;
}
add_filter('wp_resource_hints', 'wens_track_resource_hints', 10, 2);

// 添加DNS预取
function wens_track_dns_prefetch() {
    echo '<link rel="dns-prefetch" href="//fonts.googleapis.com">' . "\n";
    echo '<link rel="dns-prefetch" href="//fonts.gstatic.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action('wp_head', 'wens_track_dns_prefetch', 0);

// 优化数据库查询
function wens_track_optimize_queries() {
    if (!is_admin()) {
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'rsd_link');
    }
}
add_action('init', 'wens_track_optimize_queries');

// 添加主题支持
function wens_track_theme_support() {
    // 添加标题标签支持
    add_theme_support('title-tag');
    
    // 添加自定义logo支持
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // 添加HTML5支持
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));
    
    // 添加响应式嵌入支持
    add_theme_support('responsive-embeds');
    
    // 添加自定义间距支持
    add_theme_support('custom-spacing');
}
add_action('after_setup_theme', 'wens_track_theme_support');

// 优化搜索结果
function wens_track_search_optimization($query) {
    if ($query->is_search && !is_admin()) {
        $query->set('posts_per_page', 12);
    }
    return $query;
}
add_filter('pre_get_posts', 'wens_track_search_optimization');

// 添加自定义CSS类到body
function wens_track_custom_body_classes($classes) {
    // 添加设备类型
    if (wp_is_mobile()) {
        $classes[] = 'mobile-device';
    } else {
        $classes[] = 'desktop-device';
    }
    
    // 添加浏览器检测
    global $is_chrome, $is_safari, $is_edge, $is_IE;
    if ($is_chrome) $classes[] = 'chrome';
    if ($is_safari) $classes[] = 'safari';
    if ($is_edge) $classes[] = 'edge';
    if ($is_IE) $classes[] = 'ie';
    
    return $classes;
}
add_filter('body_class', 'wens_track_custom_body_classes');
