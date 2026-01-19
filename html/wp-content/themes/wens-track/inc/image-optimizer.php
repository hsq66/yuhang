<?php
/**
 * 图片优化工具
 * 批量压缩和转换现有图片
 * 
 * 使用方法：访问 /wp-admin/admin.php?page=image-optimizer
 */

// 防止直接访问
if (!defined('ABSPATH')) {
    exit;
}

// 添加管理菜单
function wens_track_image_optimizer_menu() {
    add_management_page(
        '图片优化工具',
        '图片优化',
        'manage_options',
        'image-optimizer',
        'wens_track_image_optimizer_page'
    );
}
add_action('admin_menu', 'wens_track_image_optimizer_menu');

// 优化页面
function wens_track_image_optimizer_page() {
    ?>
    <div class="wrap">
        <h1>图片优化工具</h1>
        <p>优化网站中的所有图片，提升加载速度</p>
        
        <div class="card">
            <h2>优化选项</h2>
            <form method="post" action="">
                <?php wp_nonce_field('optimize_images', 'optimize_nonce'); ?>
                
                <table class="form-table">
                    <tr>
                        <th scope="row">压缩质量</th>
                        <td>
                            <select name="quality">
                                <option value="90">高质量 (90%)</option>
                                <option value="85" selected>推荐 (85%)</option>
                                <option value="80">标准 (80%)</option>
                                <option value="75">高压缩 (75%)</option>
                            </select>
                            <p class="description">推荐使用85%，平衡质量和文件大小</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">生成WebP</th>
                        <td>
                            <label>
                                <input type="checkbox" name="generate_webp" value="1" checked>
                                自动生成WebP格式（更小的文件大小）
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">优化范围</th>
                        <td>
                            <label>
                                <input type="radio" name="scope" value="all" checked>
                                所有图片
                            </label><br>
                            <label>
                                <input type="radio" name="scope" value="recent">
                                最近上传（30天内）
                            </label>
                        </td>
                    </tr>
                </table>
                
                <p class="submit">
                    <input type="submit" name="optimize_images" class="button button-primary" value="开始优化">
                </p>
            </form>
        </div>
        
        <?php
        // 处理优化请求
        if (isset($_POST['optimize_images']) && check_admin_referer('optimize_images', 'optimize_nonce')) {
            wens_track_process_image_optimization();
        }
        ?>
        
        <div class="card">
            <h2>优化建议</h2>
            <ul>
                <li><strong>JPEG图片</strong>：适合照片，推荐85%质量</li>
                <li><strong>PNG图片</strong>：适合图标和透明图，会自动优化</li>
                <li><strong>WebP格式</strong>：比JPEG小30%，比PNG小80%，推荐启用</li>
                <li><strong>响应式图片</strong>：自动为不同设备生成合适尺寸</li>
            </ul>
        </div>
        
        <div class="card">
            <h2>当前统计</h2>
            <?php wens_track_display_image_stats(); ?>
        </div>
    </div>
    
    <style>
        .card {
            background: #fff;
            border: 1px solid #ccd0d4;
            border-radius: 4px;
            padding: 20px;
            margin: 20px 0;
        }
        .optimization-progress {
            background: #f0f0f1;
            border-radius: 4px;
            padding: 15px;
            margin: 15px 0;
        }
        .progress-bar {
            background: #2271b1;
            height: 30px;
            border-radius: 4px;
            transition: width 0.3s ease;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }
    </style>
    <?php
}

// 处理图片优化
function wens_track_process_image_optimization() {
    $quality = isset($_POST['quality']) ? intval($_POST['quality']) : 85;
    $generate_webp = isset($_POST['generate_webp']);
    $scope = isset($_POST['scope']) ? $_POST['scope'] : 'all';
    
    // 获取图片
    $args = array(
        'post_type' => 'attachment',
        'post_mime_type' => array('image/jpeg', 'image/jpg', 'image/png'),
        'post_status' => 'inherit',
        'posts_per_page' => -1,
    );
    
    if ($scope === 'recent') {
        $args['date_query'] = array(
            array(
                'after' => '30 days ago',
            ),
        );
    }
    
    $images = get_posts($args);
    $total = count($images);
    $optimized = 0;
    $saved_bytes = 0;
    
    echo '<div class="optimization-progress">';
    echo '<h3>正在优化图片...</h3>';
    echo '<div style="background: #f0f0f1; height: 30px; border-radius: 4px; overflow: hidden;">';
    echo '<div class="progress-bar" style="width: 0%;">0%</div>';
    echo '</div>';
    echo '<p id="progress-text">准备中...</p>';
    echo '</div>';
    
    echo '<script>
        var progressBar = document.querySelector(".progress-bar");
        var progressText = document.getElementById("progress-text");
    </script>';
    
    foreach ($images as $index => $image) {
        $file_path = get_attached_file($image->ID);
        
        if (!file_exists($file_path)) {
            continue;
        }
        
        $original_size = filesize($file_path);
        
        // 优化图片
        $optimized_size = wens_track_optimize_single_image($file_path, $quality, $generate_webp);
        
        if ($optimized_size) {
            $optimized++;
            $saved_bytes += ($original_size - $optimized_size);
        }
        
        // 更新进度
        $progress = round((($index + 1) / $total) * 100);
        echo '<script>
            progressBar.style.width = "' . $progress . '%";
            progressBar.textContent = "' . $progress . '%";
            progressText.textContent = "已处理 ' . ($index + 1) . ' / ' . $total . ' 张图片";
        </script>';
        
        // 刷新输出
        if (ob_get_level() > 0) {
            ob_flush();
        }
        flush();
    }
    
    $saved_mb = round($saved_bytes / 1024 / 1024, 2);
    
    echo '<div class="notice notice-success">';
    echo '<p><strong>优化完成！</strong></p>';
    echo '<p>共处理 ' . $total . ' 张图片，成功优化 ' . $optimized . ' 张</p>';
    echo '<p>节省空间：' . $saved_mb . ' MB</p>';
    echo '</div>';
}

// 优化单张图片
function wens_track_optimize_single_image($file_path, $quality, $generate_webp) {
    $mime_type = mime_content_type($file_path);
    
    // 加载图片
    $image = null;
    if ($mime_type === 'image/jpeg' || $mime_type === 'image/jpg') {
        $image = @imagecreatefromjpeg($file_path);
    } elseif ($mime_type === 'image/png') {
        $image = @imagecreatefrompng($file_path);
    }
    
    if (!$image) {
        return false;
    }
    
    // 保存优化后的图片
    if ($mime_type === 'image/jpeg' || $mime_type === 'image/jpg') {
        imagejpeg($image, $file_path, $quality);
    } elseif ($mime_type === 'image/png') {
        // PNG压缩级别 0-9
        $png_quality = round((100 - $quality) / 10);
        imagepng($image, $file_path, $png_quality);
    }
    
    // 生成WebP
    if ($generate_webp && function_exists('imagewebp')) {
        $webp_path = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $file_path);
        imagewebp($image, $webp_path, $quality);
    }
    
    imagedestroy($image);
    
    return filesize($file_path);
}

// 显示图片统计
function wens_track_display_image_stats() {
    $images = get_posts(array(
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'post_status' => 'inherit',
        'posts_per_page' => -1,
    ));
    
    $total_size = 0;
    $webp_count = 0;
    
    foreach ($images as $image) {
        $file_path = get_attached_file($image->ID);
        if (file_exists($file_path)) {
            $total_size += filesize($file_path);
            
            // 检查WebP
            $webp_path = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $file_path);
            if (file_exists($webp_path)) {
                $webp_count++;
            }
        }
    }
    
    $total_mb = round($total_size / 1024 / 1024, 2);
    
    echo '<table class="widefat">';
    echo '<tr><td><strong>图片总数</strong></td><td>' . count($images) . ' 张</td></tr>';
    echo '<tr><td><strong>总大小</strong></td><td>' . $total_mb . ' MB</td></tr>';
    echo '<tr><td><strong>WebP图片</strong></td><td>' . $webp_count . ' 张</td></tr>';
    echo '<tr><td><strong>平均大小</strong></td><td>' . (count($images) > 0 ? round($total_mb / count($images), 2) : 0) . ' MB/张</td></tr>';
    echo '</table>';
}
