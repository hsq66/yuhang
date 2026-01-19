# 广东宇航金属制品有限公司 - Hugo静态网站

这是广东宇航金属制品有限公司的官方网站，使用Hugo静态网站生成器构建。

## 网站信息

- **公司名称**: 广东宇航金属制品有限公司
- **主营业务**: 专业钣金加工、精密钣金制造、金属冲压、激光切割、钣金折弯、焊接加工服务
- **网站地址**: https://hsq66.github.io/yuhang/

## 最新更新 (2026-01-19)

✅ **已完成WordPress到Hugo的内容迁移**
- 从原WordPress网站 (https://yuhang2023.com) 提取了实际的企业内容
- 更新了首页，包含以下真实内容：
  - 企业口号："以智能制造为驱动，建设数字化、自动化、高效的现代钣金工厂"
  - 车间加工中心介绍
  - 厂区办公楼展示
  - 主要设备详情（激光切割、管材加工、精密折弯、焊接成型）
  - 公司文化价值观
- 所有内容均与原WordPress网站保持一致

## 技术栈

- **静态网站生成器**: Hugo Extended v0.152.2
- **主题**: 自定义主题 (yuhang)
- **部署平台**: GitHub Pages
- **自动部署**: GitHub Actions
- **源网站**: WordPress (https://yuhang2023.com)

## 本地开发

### 前置要求

- Hugo Extended 版本 (推荐 v0.121.0 或更高)
- Git

### 安装Hugo

#### Windows
```bash
# 使用Chocolatey
choco install hugo-extended

# 或下载二进制文件
# https://github.com/gohugoio/hugo/releases
```

#### macOS
```bash
brew install hugo
```

#### Linux
```bash
# Ubuntu/Debian
sudo apt-get install hugo

# 或使用snap
sudo snap install hugo
```

### 运行开发服务器

```bash
# 克隆仓库
git clone https://github.com/hsq66/yuhang.git
cd yuhang/yuhang-hugo

# 启动开发服务器
hugo server -D

# 网站将在 http://localhost:1313 运行
```

### 构建生产版本

```bash
# 构建网站到 public/ 目录
hugo

# 或构建到 docs/ 目录用于GitHub Pages
hugo --destination ../docs --cleanDestinationDir
```

## 网站结构

```
yuhang-hugo/
├── archetypes/          # 内容模板
├── assets/              # 资源文件（待处理）
├── content/             # 网站内容（Markdown文件）
│   ├── _index.md       # 首页内容
│   ├── about.md        # 关于我们
│   ├── products.md     # 产品介绍
│   └── contact.md      # 联系我们
├── data/                # 数据文件
├── layouts/             # 布局模板（如果需要覆盖主题）
├── static/              # 静态文件（直接复制到输出）
│   └── .nojekyll       # GitHub Pages配置
├── themes/              # 主题目录
│   └── yuhang/         # 自定义主题
│       ├── layouts/    # 模板文件
│       │   ├── _default/baseof.html  # 基础模板
│       │   ├── index.html            # 首页模板（已更新为实际内容）
│       │   └── partials/             # 部分模板
│       └── static/     # 主题静态资源
│           ├── css/    # 样式文件
│           ├── js/     # JavaScript文件
│           └── images/ # 图片资源
├── public/              # 构建输出目录（不提交到Git）
├── hugo.toml           # Hugo配置文件
└── README.md           # 本文件
```

## 内容说明

### 首页内容

首页展示了广东宇航金属制品有限公司的核心信息：

1. **Hero区域**: 企业愿景和使命
2. **车间加工中心**: 企业简介和一站式服务说明
3. **厂区办公楼**: 办公环境展示
4. **主要设备**: 
   - 激光切割设备及应用
   - 管材加工设备及应用
   - 精密折弯设备及应用
   - 焊接成型设备及应用
5. **公司文化**: 企业价值观

### 图片资源

所有图片位于 `themes/yuhang/static/images/` 目录：
- `one.jpg` - Hero背景图
- `two.jpg` - 车间加工中心
- `three.jpg` - 厂区办公楼
- `four.jpg` - 激光切割设备
- `five.jpg` - 管材加工设备
- `six.jpg` - 折弯设备
- `seven.jpg` - 焊接设备

## 内容管理

### 添加新页面

```bash
# 创建新页面
hugo new about.md

# 编辑内容
# content/about.md
```

### 修改首页

首页内容主要在模板文件中定义：
- 编辑 `themes/yuhang/layouts/index.html` 来修改首页布局和内容
- 编辑 `content/_index.md` 来修改首页元数据

### 修改导航菜单

编辑 `hugo.toml` 文件中的 `[menu]` 部分：

```toml
[menu]
  [[menu.main]]
    name = "首页"
    url = "/"
    weight = 1
  [[menu.main]]
    name = "公司介绍"
    url = "/about/"
    weight = 2
```

## 部署

网站通过GitHub Actions自动部署到GitHub Pages。每次推送到main分支时，都会自动触发构建和部署流程。

### 手动部署

如果需要手动部署：

```bash
# 构建网站
hugo --destination ../docs --cleanDestinationDir

# 提交更改
git add .
git commit -m "更新网站内容"
git push origin main
```

## 自定义

### 修改样式

主题的CSS文件位于 `themes/yuhang/static/css/` 目录：

- `style.css` - 主样式文件
- `desktop-visual.css` - 桌面端视觉样式
- `mobile-visual.css` - 移动端视觉样式
- `responsive.css` - 响应式样式
- `advanced-enhancements.css` - 高级增强样式
- `performance.css` - 性能优化样式

### 修改模板

主题的模板文件位于 `themes/yuhang/layouts/` 目录：

- `_default/baseof.html` - 基础模板
- `partials/header.html` - 页头
- `partials/footer.html` - 页脚
- `index.html` - 首页模板（包含实际企业内容）

## 迁移说明

本网站从WordPress迁移到Hugo静态网站生成器，主要优势：

1. **性能提升**: 静态HTML文件，加载速度更快
2. **安全性**: 无数据库，无PHP，减少安全风险
3. **维护简单**: 无需服务器维护，无需数据库备份
4. **版本控制**: 所有内容使用Git管理
5. **免费托管**: 使用GitHub Pages免费托管
6. **自动部署**: 推送代码即自动部署

## 联系方式

- **邮箱**: info@example.com
- **地址**: 广东省 某某市 某某区

## 许可证

版权所有 © 2026 广东宇航金属制品有限公司。保留所有权利。
