# Zach's Quality Services — Website

Source code for the official website of **Zach's Quality Services**, a commercial cleaning and janitorial services company serving businesses in Massachusetts.

**Production website:** https://zachsqualityservices.com/  
**Repository:** https://github.com/danmarques127-sys/zachs-quality-services  
**Default branch:** `main`

## Overview

The website presents commercial cleaning services, company information, customer reviews, project photography and videos, and contact / quote-request options. The public-facing site is primarily built with static HTML, CSS and vanilla JavaScript.

## Website sections

- `index.html` — homepage and service overview.
- `pages/about.html` — company information.
- `pages/industries.html` — industries served.
- `pages/services/` — individual cleaning-service pages, including janitorial, day porter, clinical cleaning, floor care, carpet cleaning, post-construction cleaning, disinfection and refinishing.
- `pages/gallery/` — project photography and videos across multiple gallery pages.
- `pages/reviews.html` — customer reviews.
- `pages/contact.html` and `pages/quote.html` — contact and quote-request pages.
- `assets/css/style.css` — shared styling.
- `assets/js/script.js` — browser-side interactions.
- `assets/images/` and `assets/favicons/` — project media and brand assets.
- `server/` — PHP pages and configuration example for an additional content-management feature; these are **not** executable on static-only hosting.
- `docs/architecture/` — supplementary architecture and deployment notes.
- `robots.txt`, `sitemap.xml`, `site.webmanifest` — SEO and browser metadata.
- `.github/workflows/html-check.yml` — repository validation workflow.

## Technology

- HTML5, CSS3 and vanilla JavaScript for the primary website.
- PHP and MySQL dependencies in the optional `server/` area.
- Apache/cPanel-compatible production deployment, subject to server configuration.
- GitHub Pages may serve as a **static preview**, but it does not execute PHP.

There is no frontend build process required for the static pages.

## Deployment

### Static preview

Deploy the repository's `main` branch from its root using a static host such as GitHub Pages. Verify relative asset paths and nested-page navigation under the preview subpath. PHP endpoints and database-backed features must be tested separately on a PHP-capable host.

### Production — Apache / cPanel

1. Back up the existing website and configuration before deploying.
2. Copy the site files to the intended web root, preserving their directory structure.
3. Verify the server's PHP and MySQL requirements before enabling any `server/` endpoints. Keep live database credentials outside version control.
4. Configure HTTPS, redirects and server access rules at the hosting layer.
5. Check the homepage and each service, gallery, review, contact and quote page.
6. Verify that CSS, JavaScript, images and videos resolve correctly from nested routes.
7. Test the real form destination(s), error handling and delivery using non-sensitive test data.
8. Validate `/robots.txt`, `/sitemap.xml`, canonical URLs and social-sharing metadata against the production domain.
9. Check navigation and page layouts on mobile and desktop; monitor browser-console and server errors after deployment.

**Note:** the PHP files under `server/` reference `config.php`, while the repository supplies `server/config.example.php` only. The example is a template, not a ready-to-run production configuration. Do not assume the optional admin/content feature is operational without completing and testing its authentication, configuration and upload protections.

## Security and configuration

Never commit passwords, API tokens, database credentials, private keys, live `.env` files or database dumps. Store secrets on the host using appropriate access restrictions. The `.gitignore` excludes common local configuration files but **does not** remove secrets already committed in Git history.

Before deploying or enabling PHP endpoints:

- Verify authentication and authorization, including direct access to administrative URLs.
- Review file-upload validation, MIME checks, file size limits and executable-file restrictions.
- Disable detailed error display in production.
- Use least-privilege database credentials and keep backups of persistent data.
- Rotate any credential suspected of exposure.

See `docs/SECURITY` for the project's vulnerability-reporting guidance.

## SEO and maintenance

Keep the canonical production domain consistent across page metadata, structured data, sitemap entries and social previews. Update services and gallery content with permission from the business. Optimize large media files where practical and check accessibility, page loading and broken links before each release.

The codebase's architecture notes are in [docs/architecture](docs/architecture/). Existing documentation may describe intended configurations; verify these against the live hosting environment.

## Ownership and license

The project is maintained under [danmarques127-sys](https://github.com/danmarques127-sys). See [LICENSE](LICENSE) for the applicable terms. Public repository visibility does not grant permission to reuse protected branding, media or other content beyond those terms.
