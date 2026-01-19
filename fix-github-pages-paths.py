#!/usr/bin/env python3
"""
修复 GitHub Pages 子目录路径问题
将相对路径转换为带 /yuhang/ 前缀的绝对路径
"""

import re

def fix_github_pages_paths(html_content):
    """
    为所有资源路径添加 /yuhang/ 前缀
    """
    # 修复图片路径 - src 和 srcset 开头
    html_content = re.sub(
        r'(src|srcset)="wp-content/',
        r'\1="/yuhang/wp-content/',
        html_content
    )
    
    # 修复 srcset 中逗号后的路径（空格 + wp-content）
    html_content = re.sub(
        r'(\s)wp-content/uploads/',
        r'\1/yuhang/wp-content/uploads/',
        html_content
    )
    
    # 修复 CSS 路径
    html_content = re.sub(
        r"href='assets/",
        r"href='/yuhang/assets/",
        html_content
    )
    
    # 修复 JS 路径
    html_content = re.sub(
        r'src="assets/',
        r'src="/yuhang/assets/',
        html_content
    )
    
    # 修复字体路径
    html_content = re.sub(
        r"url\('assets/",
        r"url('/yuhang/assets/",
        html_content
    )
    
    # 修复 favicon 和 icon 路径
    html_content = re.sub(
        r'href="wp-content/',
        r'href="/yuhang/wp-content/',
        html_content
    )
    
    # 修复 JSON-LD 中的图片路径
    html_content = re.sub(
        r'"logo":"wp-content/',
        r'"logo":"/yuhang/wp-content/',
        html_content
    )
    html_content = re.sub(
        r'"image":"wp-content/',
        r'"image":"/yuhang/wp-content/',
        html_content
    )
    
    return html_content

def main():
    input_file = 'docs/index.html'
    
    print(f"读取文件: {input_file}")
    with open(input_file, 'r', encoding='utf-8') as f:
        content = f.read()
    
    print("修复 GitHub Pages 路径...")
    fixed_content = fix_github_pages_paths(content)
    
    # 统计修复数量
    uploads_count = fixed_content.count('/yuhang/wp-content/uploads/')
    assets_count = fixed_content.count('/yuhang/assets/')
    
    print(f"保存修复后的文件...")
    with open(input_file, 'w', encoding='utf-8') as f:
        f.write(fixed_content)
    
    print(f"\n✅ 完成!")
    print(f"   - 修复了 {uploads_count} 处上传文件路径")
    print(f"   - 修复了 {assets_count} 处资源文件路径")
    print(f"\n所有路径现在都包含 /yuhang/ 前缀")

if __name__ == '__main__':
    main()
