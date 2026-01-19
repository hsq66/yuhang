# GitHub Pages 配置说明

## 当前状态

✅ 网站内容已构建到 `docs/` 目录
✅ 代码已推送到GitHub仓库
❌ GitHub Pages尚未配置

## 配置步骤

### 方法1：使用docs文件夹部署（推荐，最简单）

1. 打开GitHub仓库页面：https://github.com/hsq66/yuhang

2. 点击 **Settings**（设置）

3. 在左侧菜单中找到 **Pages**

4. 在 "Build and deployment" 部分：
   - **Source**: 选择 "Deploy from a branch"
   - **Branch**: 选择 "main"
   - **Folder**: 选择 "/docs"（不是 /root）

5. 点击 **Save**（保存）

6. 等待1-2分钟，页面会显示网站地址：
   ```
   Your site is live at https://hsq66.github.io/yuhang/
   ```

### 方法2：使用GitHub Actions部署（需要额外配置）

如果想使用GitHub Actions自动构建，需要：

1. 将 `yuhang-hugo/.github/` 文件夹移动到仓库根目录：
   ```bash
   # 在项目根目录执行
   mkdir .github
   mkdir .github\workflows
   copy yuhang-hugo\.github\workflows\hugo.yml .github\workflows\
   ```

2. 修改工作流文件中的路径（如果需要）

3. 在GitHub仓库设置中：
   - Settings → Pages
   - Source: 选择 "GitHub Actions"

4. 推送代码后会自动触发构建

## 推荐方案

**使用方法1（docs文件夹部署）**，因为：
- ✅ 配置最简单
- ✅ 无需额外设置
- ✅ 已经有构建好的文件
- ✅ 每次本地构建后推送即可

## 验证部署

配置完成后，访问以下地址验证：
- https://hsq66.github.io/yuhang/

如果看到404错误，请等待1-2分钟后刷新。

## 更新网站流程

以后更新网站内容时：

1. 修改内容（编辑 `yuhang-hugo/themes/yuhang/layouts/index.html` 或其他文件）

2. 重新构建：
   ```bash
   cd yuhang-hugo
   hugo --destination ../docs --cleanDestinationDir
   ```

3. 提交并推送：
   ```bash
   git add .
   git commit -m "更新网站内容"
   git push origin main
   ```

4. 等待1-2分钟，GitHub Pages会自动更新

## 故障排查

### 问题1：404 Not Found
- **原因**: GitHub Pages还在部署中
- **解决**: 等待1-5分钟后刷新

### 问题2：样式丢失
- **原因**: baseURL配置不正确
- **解决**: 检查 `hugo.toml` 中的 `baseURL = "https://hsq66.github.io/yuhang/"`

### 问题3：图片不显示
- **原因**: 图片路径不正确
- **解决**: 确保图片在 `docs/images/` 目录中

## 当前文件状态

```
docs/
├── index.html          ✅ 已生成（包含实际企业内容）
├── about/              ✅ 已生成
├── products/           ✅ 已生成
├── contact/            ✅ 已生成
├── css/                ✅ 已生成（6个文件）
├── js/                 ✅ 已生成（1个文件）
├── images/             ✅ 已生成（7个文件）
├── index.xml           ✅ 已生成
├── sitemap.xml         ✅ 已生成
└── .nojekyll           ✅ 已生成
```

所有文件都已准备就绪，只需在GitHub上配置Pages即可！

## 下一步

请按照上面的"方法1"步骤在GitHub上配置Pages，然后告诉我结果。
