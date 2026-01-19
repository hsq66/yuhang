#!/usr/bin/env python3
"""
修复 CSS 和 JS 路径中的重复 assets 问题
"""

import re

def fix_asset_paths(html_content):
    """
    修复重复的 assets 路径
    assets/wens-track/assets/ -> assets/
    assets/wens-haelo/ -> assets/
    """
    # 修复 wens-track 主题路径
    html_content = re.sub(
        r'assets/wens-track/assets/',
        'assets/',
        html_content
    )
    
    # 修复 wens-track style.css
    html_content = re.sub(
        r'assets/wens-track/style\.css',
        'assets/css/style.css',
        html_content
    )
    
    # 修复 wens-haelo 主题路径
    html_content = re.sub(
        r'assets/wens-haelo/style\.css',
        'assets/css/style.css',
        html_content
    )
    
    # 修复字体路径
    html_content = re.sub(
        r"url\('assets/wens-track/assets/fonts/",
        "url('assets/fonts/",
        html_content
    )
    
    return html_content

def main():
    input_file = 'docs/index.html'
    
    print(f"读取文件: {input_file}")
    with open(input_file, 'r', encoding='utf-8') as f:
        content = f.read()
    
    print("修复 CSS/JS 路径...")
    fixed_content = fix_asset_paths(content)
    
    print(f"保存修复后的文件...")
    with open(input_file, 'w', encoding='utf-8') as f:
        f.write(fixed_content)
    
    print(f"\n✅ 完成!")
    print(f"请检查 {input_file} 并推送到GitHub")

if __name__ == '__main__':
    main()
