# 广东宇航金属制品有限公司官方网站

这是使用Hugo静态网站生成器构建的企业官方网站。

## 🚀 特性

- ✅ 完全静态化，加载速度极快
- ✅ 响应式设计，完美支持移动端
- ✅ SEO优化，搜索引擎友好
- ✅ 自动部署到GitHub Pages
- ✅ 免费托管，无需服务器

## 📦 技术栈

- **Hugo**: 静态网站生成器
- **GitHub Pages**: 免费托管
- **GitHub Actions**: 自动化部署

## 🛠️ 本地开发

### 前置要求

- 安装Hugo Extended版本 (>= 0.120.0)
- Git

### 安装Hugo

**Windows (使用Chocolatey):**
```bash
choco install hugo-extended
```

**macOS (使用Homebrew):**
```bash
brew install hugo
```

**Linux:**
```bash
# 下载并安装
wget https://github.com/gohugoio/hugo/releases/download/v0.121.0/hugo_extended_0.121.0_linux-amd64.deb
sudo dpkg -i hugo_extended_0.121.0_linux-amd64.deb
```

### 运行开发服务器

```bash
cd yuhang-hugo
hugo server -D
```

访问 http://localhost:1313 查看网站

### 构建生产版本

```bash
cd yuhang-hugo
hugo --minify
```

构建的静态文件将输出到 `public/` 目录

## 📝 内容管理

### 添加新页面

```bash
hugo new content/新页面名称.md
```

### 编辑现有页面

直接编辑 `content/` 目录下的Markdown文件

### 修改配置

编辑 `hugo.toml` 文件修改网站配置

## 🎨 自定义主题

主题文件位于 `themes/yuhang/` 目录：

- `layouts/`: HTML模板
- `static/css/`: CSS样式文件
- `static/js/`: JavaScript文件
- `static/images/`: 图片资源

## 🚀 部署

### 自动部署

推送代码到GitHub的main分支，GitHub Actions会自动构建并部署到GitHub Pages。

### 手动部署

1. 构建网站：`hugo --minify`
2. 将 `public/` 目录的内容部署到任何静态托管服务

## 📄 许可证

MIT License

## 📞 联系方式

- **公司**: 广东宇航金属制品有限公司
- **邮箱**: info@example.com
- **电话**: +86 0123456789
