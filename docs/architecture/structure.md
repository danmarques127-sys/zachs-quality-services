# Project Structure

This project follows a clear and production-oriented static architecture,
designed for SEO, portability, and compatibility with Apache / cPanel hosting.

---

## Root

The root directory contains only files that must be publicly accessible
or are required by browsers, crawlers, and hosting platforms.

- `index.html`  
  Homepage entry point.

- `robots.txt`  
  Search engine crawling rules.

- `sitemap.xml`  
  XML sitemap for SEO indexing.

- `site.webmanifest`  
  PWA and install metadata.

- `browserconfig.xml`  
  Windows tile configuration.

- `.htaccess`  
  Apache configuration (cache, headers, routing behavior).

---

## Pages

All secondary HTML pages live under the `/pages` directory.
This keeps the root clean while preserving predictable URLs.

/pages/
├── about.html
├── contact.html
├── quote.html
├── reviews.html
├── industries.html
│
├── services/
│ └── *.html
│
└── gallery/
└── *.html


Notes:
- Pages are static and file-based.
- No client-side routing or SPA behavior is used.
- URLs remain clean and SEO-friendly.
- `index.html` is intentionally kept at root.

---

## Assets

All static assets are centralized under `/assets` and referenced
using absolute paths for consistency across environments.



/assets/
├── css/
│ └── style.css
│
├── js/
│ └── script.js
│
├── images/
│ └── *
│
└── favicons/
└── *


Asset rules:
- No duplicated or nested folders (`images/images`, `icons/icons`)
- Assets are optimized before commit
- Cache behavior is controlled via `.htaccess`

---

## Documentation

Project documentation is isolated from runtime files.



/docs/
├── architecture/
│ ├── overview.md
│ ├── structure.md
│ ├── routing-and-links.md
│ ├── assets-and-media.md
│ └── deployment.md
│
└── SECURITY.md


This separation ensures:
- Clean public surface
- Clear engineering documentation
- No documentation exposed unintentionally in production
