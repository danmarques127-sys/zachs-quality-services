<div align="center">

# Zach's Quality Services

**Official website · Commercial Cleaning · Massachusetts**

Commercial and janitorial cleaning services for businesses across Massachusetts.

[**Visit Website**](https://zachsqualityservices.com/) · [**GitHub Repository**](https://github.com/danmarques127-sys/zachs-quality-services)

</div>

<p align="center">
  <img alt="HTML5" src="https://img.shields.io/badge/HTML5-E34F26?style=flat-square&logo=html5&logoColor=white">
  <img alt="CSS3" src="https://img.shields.io/badge/CSS3-1572B6?style=flat-square&logo=css&logoColor=white">
  <img alt="JavaScript" src="https://img.shields.io/badge/JavaScript-F7DF1E?style=flat-square&logo=javascript&logoColor=black">
  <img alt="PHP" src="https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white">
  <img alt="Responsive design" src="https://img.shields.io/badge/Responsive-Design-087E8B?style=flat-square">
  <img alt="SEO" src="https://img.shields.io/badge/SEO-Optimized-238636?style=flat-square">
  <img alt="Apache and cPanel" src="https://img.shields.io/badge/Apache%20%2F%20cPanel-Hosting-D22128?style=flat-square&logo=apache&logoColor=white">
</p>

<p align="center">
  <img alt="MySQL" src="https://img.shields.io/badge/Database-MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white">
  <img alt="GitHub Actions" src="https://img.shields.io/badge/CI-GitHub%20Actions-2088FF?style=flat-square&logo=githubactions&logoColor=white">
</p>

---

## Overview

The website includes commercial cleaning services, service-area and industry information, reviews, photo and video galleries, quote requests and a PHP/MySQL-based Tips & Insights publishing system.

## Technology Stack

| Layer | Technologies |
| --- | --- |
| Frontend | HTML5, CSS3, vanilla JavaScript |
| Content | PHP-powered articles and content management |
| Hosting | Apache / cPanel-compatible PHP hosting |
| SEO | Semantic metadata, sitemap, responsive pages |
| Source control | Git and GitHub |

## Project Structure

- `index.html` — homepage and featured services.
- `pages/about.html`, `pages/industries.html` — company and industries served.
- `pages/services/` — janitorial, day porter, medical, disinfection, floor and carpet services.
- `pages/gallery/`, `pages/reviews.html` — project media and customer reviews.
- `pages/contact.html`, `pages/quote.html` — contact and quote pages.
- `tips.php`, `tip.php` — public tips index and article routes.
- `server/` — PHP article administration, MySQL configuration, schema and setup notes.
- `assets/css/`, `assets/js/`, `assets/images/` — frontend assets and media.
- `.github/workflows/html-check.yml` — HTML validation workflow.
- `robots.txt`, `sitemap.xml`, `site.webmanifest` — SEO and browser metadata.

## Tips & Insights / Blog

The Tips & Insights system uses PHP and MySQL. Public routes are `/tips.php` and `/tip.php?id=1`; administrator login and article management live under `/server/`. Hosting credentials are read from environment variables, never from the committed repository. See [server/README.md](server/README.md) for the required configuration and [server/schema.sql](server/schema.sql) for the proposed database schema. Production operation remains dependent on a configured database and live validation.

## Deployment

Static pages can be previewed on a static host; the PHP blog needs a PHP/MySQL-capable host (such as appropriately configured Apache/cPanel). Preserve the repository paths, configure database and admin environment variables, enforce HTTPS, protect uploads, and test all public and admin routes. GitHub Pages cannot run PHP.

### Release Checklist

1. Back up the existing production site and persistent data.
2. Verify assets, internal links, navigation and mobile layout.
3. Test contact and quote forms with non-sensitive submissions.
4. Verify HTTPS, canonical URLs, metadata, robots.txt and sitemap.xml.
5. Test public articles and authenticated publishing on PHP-enabled hosting.
6. Check error logs, access controls and backup restoration procedures.

## Security

Restrict article creation and editing to authenticated administrators, validate CSRF tokens and limit media uploads. Configure `ZACHS_DB_*` and `ZACHS_ADMIN_*` values securely on the hosting environment, not in Git. Verify the protected upload directory and live login/logout flow before treating the publishing system as production-ready.

**Never commit passwords, secrets, private keys, live configuration files, database dumps or administrator credentials.**

## SEO & Maintenance

Validate links, galleries, image and video loading, contact and quote forms, canonical tags, sitemap and mobile layout. See [docs/architecture](docs/architecture/) and [docs/SECURITY](docs/SECURITY).

## Maintainer & Ownership

Maintained at [danmarques127-sys](https://github.com/danmarques127-sys). See [LICENSE](LICENSE) for repository terms. Business branding, media and content must not be reused without the applicable permissions.
