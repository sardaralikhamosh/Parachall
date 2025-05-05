# Parachall - A Modern WordPress Theme

Parachall is a clean, responsive WordPress theme built with Bootstrap 5, designed for versatility and performance. Perfect for blogs, business websites, and portfolios.

## Features

-  **Bootstrap 5 Integration** - Fully responsive layout with modern components
- **Customizer Options** - Easy customization through WordPress Customizer
- **Mobile-First Design** - Perfectly responsive on all devices
- **Performance Optimized** - Clean code for fast loading times
- **Featured Images Support** - Beautiful post thumbnails throughout
- **Custom Template Parts** - Modular design for easy customization
- **Translation Ready** - Full support for multilingual sites

## Installation

### Method 1: WordPress Admin
1. Download the [latest release](https://github.com/sardaralikhamosh/Parachall/releases/latest) as ZIP
2. Go to WordPress Admin → Appearance → Themes → Add New
3. Click "Upload Theme" and select the ZIP file
4. Activate the theme

### Method 2: Manual Installation
```bash
cd wp-content/themes/
git clone https://github.com/sardaralikhamosh/Parachall.git
```

### Requirements
- WordPress 6.0+
- PHP 7.4+
- MySQL 5.7+

## Theme Structure

```
parachall/
├── assets/               # Static assets
│   ├── css/              # Additional CSS files
│   ├── js/               # JavaScript files
│   └── images/           # Theme images
├── bootstrap/            # Bootstrap framework
│   ├── css/              # Bootstrap CSS
│   └── js/               # Bootstrap JS
├── inc/                  # Theme includes
│   ├── custom-header.php # Custom header implementation
│   ├── template-tags.php # Template tag functions
│   └── template-functions.php # Theme functions
├── template-parts/       # Template partials
│   ├── content-none.php  # No content template
│   ├── content-page.php  # Page content template
│   ├── content-search.php # Search results template
│   └── content-single.php # Single post template
├── 404.php               # 404 error template
├── archive.php           # Archive template
├── comments.php          # Comments template
├── footer.php            # Footer template
├── functions.php         # Theme functions
├── header.php            # Header template
├── index.php             # Main template
├── page.php              # Page template
├── README.md             # This file
├── screenshot.png        # Theme screenshot
├── search.php            # Search template
├── single.php            # Single post template
└── style.css             # Main stylesheet
```

## Customization

### Customizer Options
Access via **Appearance → Customize**:
- **Site Identity**: Logo, title, tagline
- **Colors**: Primary color scheme
- **Header Image**: Custom header background
- **Menus**: Navigation setup
- **Widgets**: Sidebar and footer widgets
- **Additional CSS**: Custom styling

### Child Theme
For customizations, create a child theme:

1. Create `wp-content/themes/parachall-child/`
2. Add `style.css` with:
   ```css
   /*
   Theme Name: Parachall Child
   Template: parachall
   */
   @import url("../parachall/style.css");
   
   /* Your custom CSS below */
   ```
3. Add `functions.php` to enqueue parent styles

## Development

### Setup
```bash
git clone https://github.com/sardaralikhamosh/Parachall.git
cd Parachall
npm install
```

### Build Commands
```bash
npm run dev    # Development watch mode
npm run build  # Production build
```

### Coding Standards
- Follows [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
- Uses PHP_CodeSniffer with WPCS rules
- All text domains use 'parachall'
- Proper escaping and sanitization throughout

## Support

For support and contributions:
- [Open an Issue](https://github.com/sardaralikhamosh/Parachall/issues)
- Email: sardaralikhamosh@example.com

## License

GNU General Public License v2 or later. See [LICENSE](LICENSE).

## Changelog

### 1.0.0 (Current)
- Initial release
- Bootstrap 5 integration
- Responsive template structure
- Customizer implementation

---

**Contribution Guidelines**  
We welcome contributions! Please:
1. Fork the repository
2. Create a feature branch
3. Submit a pull request

**Credits**  
- [Bootstrap](https://getbootstrap.com/)
- [WordPress Theme Development](https://developer.wordpress.org/themes/)
- [Underscores](https://underscores.me/) (inspiration)

**Author:** 
**Sardar Ali Khamosh**  
📧 [Email](mailto:sardaralikhamosh@gmail.com)  
🌐 [LinkedIn](https://linkedin.com/in/sardaralikhamosh)  
🐙 [GitHub Profile](https://github.com/sardaralikhamosh)

🌐 [Website](https://shinisa.com/)

![Theme Screenshot](https://github.com/sardaralikhamosh/Parachall/blob/main/screenshot.png)
---
