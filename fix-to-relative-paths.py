#!/usr/bin/env python3
"""
将绝对路径改回相对路径
相对路径在GitHub Pages和本地都能正常工作
"""

import re

def fix_to_relative_paths(html_content):
    """
    将 /yuhang/ 开头的绝对路径改为相对路径
    """
    # 修复所有 /yuhang/wp-content/ 路径（包括srcset中的）
    html_content = re.sub(
        r'/yuhang/wp-content/',
        r'wp-content/',
        html_content
    )
    
    # 修复所有 /yuhang/assets/ 路径
    html_content = re.sub(
        r'/yuhang/assets/',
        r'assets/',
        html_content
    )
    
    return html_content

def main():
    input_file = 'docs/index.html'
    
    print(f"读取文件: {input_file}")
    with open(input_file, 'r', encoding='utf-8') as f:
        content = f.read()
    
    print("将绝对路径改为相对路径...")
    fixed_content = fix_to_relative_paths(content)
    
    print(f"保存修复后的文件...")
    with open(input_file, 'w', encoding='utf-8') as f:
        f.write(fixed_content)
    
    print(f"\n✅ 完成!")
    print(f"所有路径现在都是相对路径，在GitHub Pages和本地都能正常工作")

if __name__ == '__main__':
    main()
