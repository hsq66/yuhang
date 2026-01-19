/**
 * 高级视觉和性能增强
 * 专业级交互效果
 */

(function() {
    'use strict';
    
    // ========================================
    // 性能优化 - 防抖和节流
    // ========================================
    
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
    
    function throttle(func, limit) {
        let inThrottle;
        return function(...args) {
            if (!inThrottle) {
                func.apply(this, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    }
    
    // ========================================
    // 图片懒加载增强
    // ========================================
    
    function initLazyLoading() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        
                        // 加载图片
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.classList.add('loaded');
                            delete img.dataset.src;
                        }
                        
                        // 标记为已加载
                        img.classList.add('loaded');
                        observer.unobserve(img);
                    }
                });
            }, {
                rootMargin: '50px 0px',
                threshold: 0.01
            });
            
            // 观察所有图片
            document.querySelectorAll('img[loading="lazy"]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    }
    
    // ========================================
    // 滚动动画（安全版 - 不影响默认显示）
    // ========================================
    
    function initScrollAnimations() {
        // 完全禁用滚动动画，避免白屏问题
        // 如果需要动画，可以手动为特定元素添加类
        return;
        
        /* 以下代码已禁用
        if ('IntersectionObserver' in window) {
            const animationObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });
            
            // 只对非首屏元素添加动画
            const viewportHeight = window.innerHeight;
            document.querySelectorAll('.wp-block-group, .wp-block-post, .wp-block-image').forEach((el, index) => {
                const rect = el.getBoundingClientRect();
                const isInViewport = rect.top < viewportHeight && rect.bottom > 0;
                
                // 首屏元素直接显示，不添加动画
                if (isInViewport) {
                    el.classList.add('visible');
                    return;
                }
                
                // 非首屏元素添加动画
                if (index % 3 === 0) {
                    el.classList.add('fade-in-animation');
                } else if (index % 3 === 1) {
                    el.classList.add('slide-in-left-animation');
                } else {
                    el.classList.add('slide-in-right-animation');
                }
                animationObserver.observe(el);
            });
        }
        */
    }
    
    // ========================================
    // 导航栏滚动效果
    // ========================================
    
    function initHeaderScroll() {
        const header = document.getElementById('header');
        if (!header) return;
        
        const handleScroll = throttle(() => {
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        }, 100);
        
        window.addEventListener('scroll', handleScroll, { passive: true });
    }
    
    // ========================================
    // 返回顶部按钮
    // ========================================
    
    function initBackToTop() {
        // 创建按钮
        const button = document.createElement('button');
        button.className = 'back-to-top';
        button.innerHTML = '↑';
        button.setAttribute('aria-label', '返回顶部');
        document.body.appendChild(button);
        
        // 显示/隐藏逻辑
        const handleScroll = throttle(() => {
            if (window.scrollY > 300) {
                button.classList.add('visible');
            } else {
                button.classList.remove('visible');
            }
        }, 100);
        
        window.addEventListener('scroll', handleScroll, { passive: true });
        
        // 点击滚动到顶部
        button.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    // ========================================
    // 加载进度条（已禁用 - 避免视觉干扰）
    // ========================================
    
    function initLoadingBar() {
        // 禁用加载进度条，避免视觉干扰
        return;
    }
    
    // ========================================
    // 图片加载优化（简化版 - 确保可见）
    // ========================================
    
    function optimizeImages() {
        document.querySelectorAll('img').forEach(img => {
            // 确保所有图片立即可见
            img.style.opacity = '1';
            img.classList.add('loaded');
            
            // 如果图片已经加载完成
            if (img.complete && img.naturalHeight !== 0) {
                return;
            }
            
            // 监听加载事件
            img.addEventListener('load', function() {
                this.style.opacity = '1';
                this.classList.add('loaded');
            });
            
            img.addEventListener('error', function() {
                this.style.opacity = '1';
                this.classList.add('loaded');
                console.warn('图片加载失败:', this.src);
            });
        });
    }
    
    // ========================================
    // 平滑锚点跳转
    // ========================================
    
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#') return;
                
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    const headerOffset = 80;
                    const elementPosition = target.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                    
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }
    
    // ========================================
    // 外部链接处理
    // ========================================
    
    function initExternalLinks() {
        document.querySelectorAll('a[href^="http"]').forEach(link => {
            if (!link.href.includes(window.location.hostname)) {
                link.setAttribute('target', '_blank');
                link.setAttribute('rel', 'noopener noreferrer');
                
                // 添加外部链接图标
                if (!link.querySelector('.external-icon')) {
                    const icon = document.createElement('span');
                    icon.className = 'external-icon';
                    icon.innerHTML = ' ↗';
                    icon.style.fontSize = '0.8em';
                    icon.style.opacity = '0.6';
                    link.appendChild(icon);
                }
            }
        });
    }
    
    // ========================================
    // 表单增强
    // ========================================
    
    function enhanceForms() {
        // 自动聚焦第一个输入框
        const firstInput = document.querySelector('form input:not([type="hidden"]):not([type="submit"])');
        if (firstInput && window.innerWidth > 768) {
            firstInput.focus();
        }
        
        // 输入验证反馈
        document.querySelectorAll('input[required], textarea[required]').forEach(input => {
            input.addEventListener('blur', function() {
                if (this.value.trim() === '') {
                    this.style.borderColor = '#ef4444';
                } else {
                    this.style.borderColor = '#10b981';
                }
            });
            
            input.addEventListener('input', function() {
                if (this.value.trim() !== '') {
                    this.style.borderColor = '#10b981';
                }
            });
        });
    }
    
    // ========================================
    // 性能监控
    // ========================================
    
    function monitorPerformance() {
        if ('PerformanceObserver' in window) {
            // 监控最大内容绘制 (LCP)
            const lcpObserver = new PerformanceObserver((list) => {
                const entries = list.getEntries();
                const lastEntry = entries[entries.length - 1];
                console.log('LCP:', lastEntry.renderTime || lastEntry.loadTime);
            });
            
            try {
                lcpObserver.observe({ entryTypes: ['largest-contentful-paint'] });
            } catch (e) {
                // 浏览器不支持
            }
            
            // 监控首次输入延迟 (FID)
            const fidObserver = new PerformanceObserver((list) => {
                list.getEntries().forEach((entry) => {
                    console.log('FID:', entry.processingStart - entry.startTime);
                });
            });
            
            try {
                fidObserver.observe({ entryTypes: ['first-input'] });
            } catch (e) {
                // 浏览器不支持
            }
        }
        
        // 页面加载完成时间
        window.addEventListener('load', () => {
            setTimeout(() => {
                const perfData = performance.timing;
                const pageLoadTime = perfData.loadEventEnd - perfData.navigationStart;
                console.log('页面加载时间:', pageLoadTime + 'ms');
            }, 0);
        });
    }
    
    // ========================================
    // 键盘导航增强
    // ========================================
    
    function enhanceKeyboardNav() {
        // 显示焦点轮廓（仅键盘导航时）
        let isUsingKeyboard = false;
        
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Tab') {
                isUsingKeyboard = true;
                document.body.classList.add('keyboard-nav');
            }
        });
        
        document.addEventListener('mousedown', () => {
            isUsingKeyboard = false;
            document.body.classList.remove('keyboard-nav');
        });
        
        // ESC键关闭模态框
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                const modal = document.querySelector('.modal.open');
                if (modal) {
                    modal.classList.remove('open');
                }
            }
        });
    }
    
    // ========================================
    // 触摸设备优化
    // ========================================
    
    function optimizeTouchDevices() {
        if ('ontouchstart' in window) {
            document.body.classList.add('touch-device');
            
            // 移除hover效果
            const style = document.createElement('style');
            style.textContent = `
                .touch-device *:hover {
                    /* 禁用触摸设备的hover效果 */
                }
            `;
            document.head.appendChild(style);
            
            // 添加触摸反馈
            document.querySelectorAll('a, button, .wp-block-button__link').forEach(el => {
                el.addEventListener('touchstart', function() {
                    this.style.opacity = '0.7';
                }, { passive: true });
                
                el.addEventListener('touchend', function() {
                    this.style.opacity = '1';
                }, { passive: true });
            });
        }
    }
    
    // ========================================
    // 网络状态监控
    // ========================================
    
    function monitorNetworkStatus() {
        if ('connection' in navigator) {
            const connection = navigator.connection || navigator.mozConnection || navigator.webkitConnection;
            
            function updateConnectionStatus() {
                const effectiveType = connection.effectiveType;
                console.log('网络类型:', effectiveType);
                
                // 慢速网络时优化
                if (effectiveType === 'slow-2g' || effectiveType === '2g') {
                    document.body.classList.add('slow-connection');
                    // 可以禁用某些动画或减少图片质量
                }
            }
            
            connection.addEventListener('change', updateConnectionStatus);
            updateConnectionStatus();
        }
        
        // 在线/离线状态
        window.addEventListener('online', () => {
            console.log('网络已连接');
            document.body.classList.remove('offline');
        });
        
        window.addEventListener('offline', () => {
            console.log('网络已断开');
            document.body.classList.add('offline');
            alert('网络连接已断开，部分功能可能无法使用');
        });
    }
    
    // ========================================
    // 初始化所有功能
    // ========================================
    
    function init() {
        // DOM加载完成后执行
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', init);
            return;
        }
        
        console.log('🚀 开始初始化增强功能...');
        
        try {
            // 初始化各项功能
            initLazyLoading();
            console.log('✓ 懒加载已初始化');
            
            initScrollAnimations();
            console.log('✓ 滚动动画已初始化（已禁用）');
            
            initHeaderScroll();
            console.log('✓ 导航栏滚动已初始化');
            
            initBackToTop();
            console.log('✓ 返回顶部按钮已初始化');
            
            initLoadingBar();
            console.log('✓ 加载进度条已初始化（已禁用）');
            
            optimizeImages();
            console.log('✓ 图片优化已完成');
            
            initSmoothScroll();
            console.log('✓ 平滑滚动已初始化');
            
            initExternalLinks();
            console.log('✓ 外部链接已处理');
            
            enhanceForms();
            console.log('✓ 表单增强已完成');
            
            enhanceKeyboardNav();
            console.log('✓ 键盘导航已增强');
            
            optimizeTouchDevices();
            console.log('✓ 触摸设备已优化');
            
            console.log('✨ 所有增强功能已加载完成');
        } catch (error) {
            console.error('❌ 初始化错误:', error);
        }
    }
    
    // 启动
    init();
    
})();
