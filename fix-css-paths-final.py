#!/usr/bin/env python3
"""
修复CSS路径：将主题CSS路径指向正确的assets目录
"""

def main():
    with open('docs/index.html', 'r', encoding='utf-8') as f:
        content = f.read()
    
    # 修复CSS路径
    content = content.replace('wp-content/themes/wens-track/assets/', 'assets/')
    content = content.replace('wp-content/themes/wens-haelo/style.css', 'assets/css/style.css')
    content = content.replace('wp-content/themes/wens-track/style.css', 'assets/css/style.css')
    
    with open('docs/index.html', 'w', encoding='utf-8') as f:
        f.write(content)
    
    print("✅ CSS路径已修复")

if __name__ == '__main__':
    main()
