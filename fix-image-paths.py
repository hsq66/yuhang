#!/usr/bin/env python3
"""
修复 docs/index.html 中的所有图片和资源路径
将绝对URL转换为相对路径以支持GitHub Pages部署
"""

import re

def fix_paths(html_content):
    """
    替换所有指向 yuhang2023.com 的绝对URL为相对路径
    """
    # 替换 wp-content/uploads 路径
    html_content = re.sub(
        r'https://yuhang2023\.com/wp-content/uploads/',
        'wp-content/uploads/',
        html_content
    )
    
    # 替换 wp-content/themes 路径
    html_content = re.sub(
        r'https://yuhang2023\.com/wp-content/themes/',
        'assets/',
        html_content
    )
    
    # 替换 wp-includes 路径（如果有）
    html_content = re.sub(
        r'https://yuhang2023\.com/wp-includes/',
        'assets/wp-includes/',
        html_content
    )
    
    return html_content

def main():
    input_file = 'docs/index.html'
    
    print(f"读取文件: {input_file}")
    with open(input_file, 'r', encoding='utf-8') as f:
        content = f.read()
    
    print("修复路径...")
    fixed_content = fix_paths(content)
    
    # 统计替换次数
    uploads_count = len(re.findall(r'wp-content/uploads/', fixed_content))
    themes_count = len(re.findall(r'assets/(?:css|js|fonts|images)/', fixed_content))
    
    print(f"保存修复后的文件...")
    with open(input_file, 'w', encoding='utf-8') as f:
        f.write(fixed_content)
    
    print(f"\n✅ 完成!")
    print(f"   - 修复了 {uploads_count} 个上传文件路径")
    print(f"   - 修复了主题资源路径")
    print(f"\n请检查 {input_file} 并推送到GitHub")

if __name__ == '__main__':
    main()
