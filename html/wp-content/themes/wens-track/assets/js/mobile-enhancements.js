/**
 * 移动端增强脚本
 * 广东宇航金属制品有限公司
 * 提升移动端用户体验
 */

(function() {
    'use strict';

    // 检测是否为移动设备
    const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    const isTouch = 'ontouchstart' in window || navigator.maxTouchPoints > 0;

    /**
     * 1. 平滑滚动优化
     */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#' || href === '#0') return;
                
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

    /**
     * 2. 触摸反馈增强
     */
    function initTouchFeedback() {
        if (!isTouch) return;

        const touchElements = document.querySelectorAll('a, button, .wp-block-button__link');
        
        touchElements.forEach(element => {
            element.addEventListener('touchstart', function() {
                this.style.opacity = '0.7';
            }, { passive: true });

            element.addEventListener('touchend', function() {
                setTimeout(() => {
                    this.style.opacity = '1';
                }, 150);
            }, { passive: true });

            element.addEventListener('touchcancel', function() {
                this.style.opacity = '1';
            }, { passive: true });
        });
    }

    /**
     * 3. 图片懒加载增强
     */
    function initLazyLoadEnhancement() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        
                        // 添加加载动画
                        img.style.opacity = '0';
                        img.style.transition = 'opacity 0.3s ease';
                        
                        img.addEventListener('load', function() {
                            this.style.opacity = '1';
                        });
                        
                        observer.unobserve(img);
                    }
                });
            }, {
                rootMargin: '50px 0px',
                threshold: 0.01
            });

            document.querySelectorAll('img[loading="lazy"]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    }

    /**
     * 4. 移动端导航优化
     */
    function initMobileNavigation() {
        const navToggle = document.querySelector('.wp-block-navigation__responsive-container-open');
        const navContainer = document.querySelector('.wp-block-navigation__responsive-container');
        const navClose = document.querySelector('.wp-block-navigation__responsive-container-close');

        if (navToggle && navContainer) {
            // 防止背景滚动
            const preventScroll = (isOpen) => {
                if (isOpen) {
                    document.body.style.overflow = 'hidden';
                    document.body.style.position = 'fixed';
                    document.body.style.width = '100%';
                } else {
                    document.body.style.overflow = '';
                    document.body.style.position = '';
                    document.body.style.width = '';
                }
            };

            // 监听菜单打开
            const observer = new MutationObserver((mutations) => {
                mutations.forEach((mutation) => {
                    if (mutation.attributeName === 'class') {
                        const isOpen = navContainer.classList.contains('is-menu-open');
                        preventScroll(isOpen);
                    }
                });
            });

            observer.observe(navContainer, {
                attributes: true,
                attributeFilter: ['class']
            });

            // 点击菜单项后关闭菜单
            const menuLinks = navContainer.querySelectorAll('a');
            menuLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (navClose) {
                        navClose.click();
                    }
                });
            });
        }
    }

    /**
     * 5. 表单输入优化
     */
    function initFormEnhancements() {
        const inputs = document.querySelectorAll('input, textarea');
        
        inputs.forEach(input => {
            // 聚焦时滚动到视图
            input.addEventListener('focus', function() {
                setTimeout(() => {
                    this.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }, 300);
            });

            // 添加输入验证反馈
            if (input.hasAttribute('required')) {
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
            }
        });
    }

    /**
     * 6. 视口高度修正（解决移动端地址栏问题）
     */
    function initViewportFix() {
        const setVH = () => {
            const vh = window.innerHeight * 0.01;
            document.documentElement.style.setProperty('--vh', `${vh}px`);
        };

        setVH();
        window.addEventListener('resize', setVH);
        window.addEventListener('orientationchange', setVH);
    }

    /**
     * 7. 性能监控
     */
    function initPerformanceMonitoring() {
        if ('PerformanceObserver' in window) {
            // 监控最大内容绘制
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

            // 监控首次输入延迟
            const fidObserver = new PerformanceObserver((list) => {
                const entries = list.getEntries();
                entries.forEach(entry => {
                    console.log('FID:', entry.processingStart - entry.startTime);
                });
            });

            try {
                fidObserver.observe({ entryTypes: ['first-input'] });
            } catch (e) {
                // 浏览器不支持
            }
        }
    }

    /**
     * 8. 返回顶部按钮
     */
    function initBackToTop() {
        // 创建返回顶部按钮
        const backToTopBtn = document.createElement('button');
        backToTopBtn.innerHTML = '↑';
        backToTopBtn.className = 'back-to-top';
        backToTopBtn.setAttribute('aria-label', '返回顶部');
        backToTopBtn.style.cssText = `
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #024caa;
            color: white;
            border: none;
            font-size: 24px;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        `;

        document.body.appendChild(backToTopBtn);

        // 显示/隐藏按钮
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopBtn.style.opacity = '1';
                backToTopBtn.style.visibility = 'visible';
            } else {
                backToTopBtn.style.opacity = '0';
                backToTopBtn.style.visibility = 'hidden';
            }
        }, { passive: true });

        // 点击返回顶部
        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    /**
     * 9. 电话号码点击拨打优化
     */
    function initPhoneLinks() {
        const phoneNumbers = document.querySelectorAll('a[href^="tel:"]');
        phoneNumbers.forEach(link => {
            link.style.cssText = `
                color: #024caa;
                text-decoration: none;
                font-weight: 600;
            `;
        });
    }

    /**
     * 10. 图片加载失败处理
     */
    function initImageErrorHandling() {
        document.querySelectorAll('img').forEach(img => {
            img.addEventListener('error', function() {
                this.style.display = 'none';
                console.warn('图片加载失败:', this.src);
            });
        });
    }

    /**
     * 初始化所有功能
     */
    function init() {
        // 等待DOM加载完成
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initAll);
        } else {
            initAll();
        }
    }

    function initAll() {
        initSmoothScroll();
        initTouchFeedback();
        initLazyLoadEnhancement();
        initMobileNavigation();
        initFormEnhancements();
        initViewportFix();
        initBackToTop();
        initPhoneLinks();
        initImageErrorHandling();

        // 仅在开发环境启用性能监控
        if (window.location.hostname === 'localhost' || window.location.hostname.includes('dev')) {
            initPerformanceMonitoring();
        }

        // 添加加载完成标记
        document.body.classList.add('mobile-enhancements-loaded');
        
        console.log('移动端增强功能已加载');
    }

    // 启动
    init();

})();
