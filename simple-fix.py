#!/usr/bin/env python3
"""
最简单的修复：只替换域名为相对路径
"""

def main():
    with open('docs/index.html', 'r', encoding='utf-8') as f:
        content = f.read()
    
    # 只做一件事：把绝对URL改成相对路径
    content = content.replace('https://yuhang2023.com/wp-content/', 'wp-content/')
    content = content.replace('https://yuhang2023.com/wp-includes/', 'wp-includes/')
    
    with open('docs/index.html', 'w', encoding='utf-8') as f:
        f.write(content)
    
    print("✅ 完成")

if __name__ == '__main__':
    main()
